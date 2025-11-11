<template>
    <div class="lg:ml-10">
        <!-- Mobile Menu Toggle -->
        <div class="menu-toggle-wrapper absolute right-7 top-8 lg:hidden z-50">
            <button
                class="py-3 px-5 border-2 border-teal-500 text-slate-900 bg-white rounded-lg hover:bg-teal-50 active:bg-teal-100 transition-colors shadow-md"
                @click="isOpen = !isOpen"
            >
                <i class="fas fa-bars text-xl"></i>
            </button>
        </div>

        <!-- Navigation -->
        <nav ref="webNav" class="main flex items-center justify-between gap-6">
            <ul
                class="navigation hidden lg:flex items-center gap-2"
                :class="{ 'max-lg:block': isOpen, 'max-lg:hidden': !isOpen }"
            >
                <li v-for="menu in menus" :key="menu.slug">
                    <NavLink
                        :href="menu.slug"
                        :active="isActiveLink(menu.slug)"
                        class="block px-4 py-2 rounded-lg font-medium transition-all duration-200"
                        :class="isActiveLink(menu.slug) 
                            ? 'bg-teal-500 text-white shadow-md hover:bg-teal-600' 
                            : 'text-slate-700 hover:text-teal-600 hover:bg-teal-50'"
                    >
                        {{ menu.name }}
                    </NavLink>
                </li>
            </ul>

            <!-- Phone Number CTA -->
            <a
                href="tel:0880767676"
                class="phone flex items-center gap-2 px-6 py-2.5 bg-gradient-to-r from-orange-500 to-orange-600 text-white font-bold rounded-lg hover:from-orange-600 hover:to-orange-700 transition-all duration-200 shadow-lg hover:shadow-xl whitespace-nowrap"
            >
                <i class="fas fa-phone"></i>
                <span class="hotline">088 - 076 76 76</span>
            </a>
        </nav>
    </div>
</template>

<script>
import NavLink from "@/Components/NavLink.vue";
import { usePage } from "@inertiajs/vue3";

export default {
    name: "MenuNav",
    components: { NavLink },
    created() {
        const page = usePage();
        this.activeLink = page.props.activeLink || '';
    },
    data() {
        return {
            activeLink: "",
            isOpen: false,
            menus: [
                {
                    slug: "/",
                    name: "Home",
                },
                {
                    slug: "/letselschadetest",
                    name: "Letselschadetest",
                },
                {
                    slug: "/letselschadeclaimen",
                    name: "Letselschade Claimen",
                },
                {
                    slug: "/contact",
                    name: "Contact",
                },
            ],
        };
    },
    methods: {
        isActiveLink(slug) {
            if (slug === '/') {
                return this.activeLink === '/' || this.activeLink === '';
            }
            // For letselschadetest, match both exact and sub-routes
            if (slug === '/letselschadetest') {
                return this.activeLink.startsWith('letselschadetest');
            }
            // For other routes, match exact or startsWith
            return this.activeLink === slug || this.activeLink.startsWith(slug + '/');
        }
    }
};
</script>

<style scoped>
/* Mobile menu styles */
@media (max-width: 1023px) {
    .navigation.max-lg\\:block {
        display: block;
        position: absolute;
        top: 100%;
        right: 0;
        background: white;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        border-radius: 0.5rem;
        padding: 1rem;
        margin-top: 0.5rem;
        min-width: 200px;
    }
    
    .navigation.max-lg\\:block li {
        margin-bottom: 0.5rem;
    }
    
    .navigation.max-lg\\:block li:last-child {
        margin-bottom: 0;
    }
}
</style>