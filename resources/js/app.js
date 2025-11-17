import "./bootstrap";

const inertiaAppElement = document.getElementById("app");
import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/vue3";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";
import { ZiggyVue } from "../../vendor/tightenco/ziggy";

if (inertiaAppElement) {
    const appName = import.meta.env.VITE_APP_NAME || "Letselschadeclaimen";

    createInertiaApp({
        title: (title) => `${title} - ${appName}`,
        resolve: (name) =>
            resolvePageComponent(
                `./Pages/${name}.vue`,
                import.meta.glob("./Pages/**/*.vue")
            ),
        setup({ el, App, props, plugin }) {
            return createApp({ render: () => h(App, props) })
                .use(plugin)
                .use(ZiggyVue)
                .mount(el);
        },
        progress: {
            color: "#4B5563",
        },
    });
} else {
    const menuToggle = document.getElementById("btn-menu-opener");
    const navMenu = document.querySelector("ul.navigation");
    menuToggle.addEventListener("click", () => {
        if (window.getComputedStyle(navMenu).display === "none") {
            navMenu.style.display = "block"; // Show the content if it's hidden
        } else {
            navMenu.style.display = "none"; // Hide the content if it's visible
        }
    });

    // Google Consent Mode & Cookie Banner
    (function() {
        // Initialize Google Consent Mode
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        
        // Set default consent to denied (GDPR requirement)
        gtag('consent', 'default', {
            'ad_storage': 'denied',
            'ad_user_data': 'denied',
            'ad_personalization': 'denied',
            'analytics_storage': 'denied'
        });

        // Initialize Google Tag
        gtag('js', new Date());
        gtag('config', 'AW-10859171119');

        // Cookie management functions
        const COOKIE_NAME = 'letselschade_cookie_consent';
        const COOKIE_EXPIRY = 365; // days

        function setCookie(name, value, days) {
            const expires = new Date();
            expires.setTime(expires.getTime() + (days * 24 * 60 * 60 * 1000));
            document.cookie = `${name}=${value};expires=${expires.toUTCString()};path=/;SameSite=Lax`;
        }

        function getCookie(name) {
            const nameEQ = name + "=";
            const ca = document.cookie.split(';');
            for(let i = 0; i < ca.length; i++) {
                let c = ca[i];
                while (c.charAt(0) === ' ') c = c.substring(1, c.length);
                if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length, c.length);
            }
            return null;
        }

        function updateGoogleConsent(analytics, marketing) {
            gtag('consent', 'update', {
                'analytics_storage': analytics ? 'granted' : 'denied',
                'ad_storage': marketing ? 'granted' : 'denied',
                'ad_user_data': marketing ? 'granted' : 'denied',
                'ad_personalization': marketing ? 'granted' : 'denied'
            });
        }

        function saveConsentPreferences(analytics, marketing) {
            const preferences = {
                analytics: analytics,
                marketing: marketing,
                timestamp: Date.now()
            };
            setCookie(COOKIE_NAME, JSON.stringify(preferences), COOKIE_EXPIRY);
            updateGoogleConsent(analytics, marketing);
            hideBanner();
        }

        function loadConsentPreferences() {
            const cookieValue = getCookie(COOKIE_NAME);
            if (cookieValue) {
                try {
                    const preferences = JSON.parse(cookieValue);
                    updateGoogleConsent(preferences.analytics, preferences.marketing);
                    return preferences;
                } catch (e) {
                    return null;
                }
            }
            return null;
        }

        function showBanner() {
            const banner = document.getElementById('cookie-banner');
            if (banner) {
                banner.style.display = 'block';
            }
        }

        function hideBanner() {
            const banner = document.getElementById('cookie-banner');
            const modal = document.getElementById('cookie-settings-modal');
            if (banner) banner.style.display = 'none';
            if (modal) modal.style.display = 'none';
        }

        function showSettingsModal() {
            const modal = document.getElementById('cookie-settings-modal');
            if (modal) {
                modal.style.display = 'flex';
                
                // Load current preferences
                const preferences = loadConsentPreferences();
                if (preferences) {
                    document.getElementById('analytics-cookies').checked = preferences.analytics;
                    document.getElementById('marketing-cookies').checked = preferences.marketing;
                }
            }
        }

        function hideSettingsModal() {
            const modal = document.getElementById('cookie-settings-modal');
            if (modal) modal.style.display = 'none';
        }

        // Initialize when DOM is ready
        function initializeCookieBanner() {
            // Check if user already has preferences
            const existingPreferences = loadConsentPreferences();
            
            if (!existingPreferences) {
                // Show banner if no preferences exist
                showBanner();
            }

            // Event listeners
            const acceptAllBtn = document.getElementById('cookie-accept-all');
            const rejectAllBtn = document.getElementById('cookie-reject-all');
            const settingsBtn = document.getElementById('cookie-settings');
            const saveSettingsBtn = document.getElementById('cookie-save-settings');
            const closeModalBtn = document.getElementById('cookie-modal-close');

            if (acceptAllBtn) {
                acceptAllBtn.addEventListener('click', function() {
                    saveConsentPreferences(true, true);
                });
            }

            if (rejectAllBtn) {
                rejectAllBtn.addEventListener('click', function() {
                    saveConsentPreferences(false, false);
                });
            }

            if (settingsBtn) {
                settingsBtn.addEventListener('click', function() {
                    showSettingsModal();
                });
            }

            if (saveSettingsBtn) {
                saveSettingsBtn.addEventListener('click', function() {
                    const analytics = document.getElementById('analytics-cookies').checked;
                    const marketing = document.getElementById('marketing-cookies').checked;
                    saveConsentPreferences(analytics, marketing);
                });
            }

            if (closeModalBtn) {
                closeModalBtn.addEventListener('click', function() {
                    hideSettingsModal();
                });
            }

            // Close modal when clicking outside
            const modal = document.getElementById('cookie-settings-modal');
            if (modal) {
                modal.addEventListener('click', function(e) {
                    if (e.target === modal) {
                        hideSettingsModal();
                    }
                });
            }
        }

        // Wait for DOM to be ready
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initializeCookieBanner);
        } else {
            initializeCookieBanner();
        }

        // Expose function to manually show banner (for privacy policy links)
        window.showCookieSettings = showSettingsModal;
    })();
}
