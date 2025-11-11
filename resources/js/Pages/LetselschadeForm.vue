<template>
    <Head>
        <title>Letselschadetest</title>
        <meta
            name="description"
            content="Vul stap voor stap uw gegevens in voor een gratis en vrijblijvende beoordeling van uw letselschade."
        />
    </Head>
    <GuestLayout>
        <div id="top"></div>
        <div class="pt-12 pb-14 mb-12 lg:ps-6 bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900">
            <div>
                <div class="lg:grid grid-cols-3 gap-8 place-items-center">
                    <div class="max-lg:mb-5 col-span-2 max-lg:mx-5 me-14 ms-24">
                        <h2 class="font-bold font-title text-teal-400 text-3xl mb-3">
                            Start Hier om uw Letselschade te Claimen
                        </h2>
                        <p class="text-2xl text-white">
                            Met een paar eenvoudige vragen kunnen wij u helpen bepalen welke stappen u kunt nemen om uw letselschade gratis te verhalen. Selecteer eerst het type ongeval waarbij u betrokken was:
                        </p>
                    </div>
                    <div class="flex justify-end">
                        <img
                            src="/assets/images/letselschade.jpg"
                            alt="Letselschade"
                            class="rounded-s-lg shadow-lg"
                        />
                    </div>
                </div>
            </div>
        </div>
        <div class="container mx-auto">
        
            <!-- Success/Error Messages -->
            <div v-if="successMessage" class="alert alert-success">
                <i class="fas fa-check-circle"></i>
                {{ successMessage }}
            </div>
            
            <div v-if="errorMessage" class="alert alert-error">
                <i class="fas fa-exclamation-triangle"></i>
                {{ errorMessage }}
            </div>
        </div>

        <div class="contact-form application-form px-24">
            <div id="form-top"></div>
            <div class="form-wizard bg-white p-12 rounded-lg">
                <!-- Wizard Header -->
                <div class="form-wizard-header">
                    <h2 class="font-bold text-xl mb-2">
                        <i class="fas fa-clipboard-list me-5"></i>
                        Vul stap voor stap uw gegevens in voor een gratis en vrijblijvende beoordeling
                    </h2>
                    
                    <!-- Progress Bar -->
                    <div class="progress-container">
                        <div class="progress-bar">
                            <div class="progress-line">
                                <div class="progress-line-fill" :style="{ width: progressPercentage + '%' }"></div>
                            </div>
                            <div 
                                v-for="step in 6" 
                                :key="step"
                                class="progress-step" 
                                :class="{ 'active': currentStep === step, 'completed': currentStep > step }"
                                @click="goToStep(step)"
                            >
                                <div class="progress-step-circle">{{ step }}</div>
                                <div class="progress-step-label">{{ getStepLabel(step) }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <form @submit.prevent="submitForm" id="application-form" novalidate>
                    <!-- Required fields for WebreactionController -->
                    <input type="hidden" name="postal_code_id" value="1000">
                    <input type="hidden" name="postal_code_letters" value="AA">
                    <input type="hidden" name="house_number" value="1">
                    
                    <!-- Stap 1 - Soort ongeval -->
                    <Transition name="slide-fade-left">
                        <div v-show="currentStep === 1" class="form-step active">
                            <div class="step-indicator">
                                <i class="fas fa-info-circle"></i>
                                Stap 1 van 6
                            </div>
                            <h3><i class="fas fa-car-crash"></i> Stap 1 – Soort ongeval</h3>
                            
                            <div class="form-group">
                                <label><i class="fas fa-question-circle"></i> Waarmee had u te maken?</label>
                                <div class="radio-group">
                                    <label 
                                        v-for="option in accidentTypes" 
                                        :key="option.value"
                                        class="radio-option"
                                        :class="{ 'selected': formData.soort_ongeval === option.value }"
                                    >
                                        <input 
                                            type="radio" 
                                            v-model="formData.soort_ongeval" 
                                            :value="option.value"
                                            @change="validateField('soort_ongeval')"
                                        >
                                        <div class="radio-card">
                                            <i :class="option.icon + ' radio-icon'"></i>
                                            <span class="radio-text">{{ option.label }}</span>
                                        </div>
                                    </label>
                                </div>
                                <div v-if="errors.soort_ongeval" class="field-error">
                                    <i class="fas fa-exclamation-circle"></i> {{ errors.soort_ongeval }}
                                </div>
                            </div>
                            
                            <!-- Navigation -->
                            <div class="form-navigation">
                                <SecondaryButton type="button" :disabled="true">
                                    <i class="fas fa-arrow-left"></i>
                                    Vorige
                                </SecondaryButton>
                                <SecondaryButton type="button" @click="goToStep(2)">
                                    Volgende
                                    <i class="fas fa-arrow-right"></i>
                                </SecondaryButton>
                            </div>
                        </div>
                    </Transition>

                    <!-- Stap 2 - Gebeurtenis -->
                    <Transition name="slide-fade-left">
                        <div v-show="currentStep === 2" class="form-step">
                            <div class="step-indicator">
                                <i class="fas fa-info-circle"></i>
                                Stap 2 van 6
                            </div>
                            <h3><i class="fas fa-calendar-alt"></i> Stap 2 – Gebeurtenis</h3>
                            
                            <div class="form-group">
                                <label for="ongeval_datum"><i class="fas fa-calendar"></i> Datum van het ongeval *</label>
                                <input 
                                    type="date" 
                                    id="ongeval_datum" 
                                    v-model="formData.ongeval_datum" 
                                    :max="maxDate"
                                    @blur="validateField('ongeval_datum')"
                                    @click="openDatePicker"
                                    @focus="openDatePicker"
                                >
                                <small class="field-help">Selecteer de datum waarop het ongeval heeft plaatsgevonden (vandaag of eerder)</small>
                                <div v-if="errors.ongeval_datum" class="field-error">
                                    <i class="fas fa-exclamation-circle"></i> {{ errors.ongeval_datum }}
                                </div>
                            </div>

                            <div class="form-group">
                                <label><i class="fas fa-users"></i> Is de tegenpartij bekend?</label>
                                <div class="radio-group">
                                    <label 
                                        v-for="option in tegenpartijOptions" 
                                        :key="option.value"
                                        class="radio-option"
                                        :class="{ 'selected': formData.tegenpartij === option.value }"
                                    >
                                        <input 
                                            type="radio" 
                                            v-model="formData.tegenpartij" 
                                            :value="option.value"
                                        >
                                        <div class="radio-card">
                                            <i :class="option.icon + ' radio-icon'"></i>
                                            <span class="radio-text">{{ option.label }}</span>
                                        </div>
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label><i class="fas fa-clock"></i> Wilt u snel geholpen worden?</label>
                                <div class="radio-group">
                                    <label 
                                        v-for="option in snelHulpOptions" 
                                        :key="option.value"
                                        class="radio-option"
                                        :class="{ 'selected': formData.snel_hulp === option.value }"
                                    >
                                        <input 
                                            type="radio" 
                                            v-model="formData.snel_hulp" 
                                            :value="option.value"
                                        >
                                        <div class="radio-card">
                                            <i :class="option.icon + ' radio-icon'"></i>
                                            <span class="radio-text">{{ option.label }}</span>
                                        </div>
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="letsel_beschrijving"><i class="fas fa-heartbeat"></i> Korte omschrijving letsel *</label>
                                <textarea 
                                    id="letsel_beschrijving" 
                                    v-model="formData.letsel_beschrijving" 
                                    rows="3" 
                                    placeholder="Beschrijf kort het opgelopen letsel"
                                    @blur="validateField('letsel_beschrijving')"
                                ></textarea>
                                <div v-if="errors.letsel_beschrijving" class="field-error">
                                    <i class="fas fa-exclamation-circle"></i> {{ errors.letsel_beschrijving }}
                                </div>
                            </div>
                            
                            <!-- Navigation -->
                            <div class="form-navigation">
                                <SecondaryButton type="button" @click="goToStep(1)">
                                    <i class="fas fa-arrow-left"></i>
                                    Vorige
                                </SecondaryButton>
                                <SecondaryButton type="button" @click="goToStep(3)">
                                    Volgende
                                    <i class="fas fa-arrow-right"></i>
                                </SecondaryButton>
                            </div>
                        </div>
                    </Transition>

                    <!-- Stap 3 - Schade -->
                    <Transition name="slide-fade-left">
                        <div v-show="currentStep === 3" class="form-step">
                            <div class="step-indicator">
                                <i class="fas fa-info-circle"></i>
                                Stap 3 van 6
                            </div>
                            <h3><i class="fas fa-exclamation-triangle"></i> Stap 3 – Schade</h3>
                            
                            <div class="form-group">
                                <label><i class="fas fa-chart-line"></i> Hoe ernstig is de schade?</label>
                                <div class="radio-group">
                                    <label 
                                        v-for="option in schadeErnstOptions" 
                                        :key="option.value"
                                        class="radio-option"
                                        :class="{ 'selected': formData.schade_ernst === option.value }"
                                    >
                                        <input 
                                            type="radio" 
                                            v-model="formData.schade_ernst" 
                                            :value="option.value"
                                        >
                                        <div class="radio-card" :class="option.cardClass">
                                            <i :class="option.icon + ' radio-icon'"></i>
                                            <span class="radio-text">{{ option.label }}</span>
                                        </div>
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="schade_omschrijving"><i class="fas fa-file-alt"></i> Korte omschrijving schade *</label>
                                <textarea 
                                    id="schade_omschrijving" 
                                    v-model="formData.schade_omschrijving" 
                                    rows="3" 
                                    placeholder="Beschrijf kort de opgelopen schade"
                                    @blur="validateField('schade_omschrijving')"
                                ></textarea>
                                <div v-if="errors.schade_omschrijving" class="field-error">
                                    <i class="fas fa-exclamation-circle"></i> {{ errors.schade_omschrijving }}
                                </div>
                            </div>

                            <!-- Navigation -->
                            <div class="form-navigation">
                                <SecondaryButton type="button" @click="goToStep(2)">
                                    <i class="fas fa-arrow-left"></i>
                                    Vorige
                                </SecondaryButton>
                                <SecondaryButton type="button" @click="goToStep(4)">
                                    Volgende
                                    <i class="fas fa-arrow-right"></i>
                                </SecondaryButton>
                            </div>
                        </div>
                    </Transition>

                    <!-- Stap 4 - Arbeid & persoonlijke situatie -->
                    <Transition name="slide-fade-left">
                        <div v-show="currentStep === 4" class="form-step">
                            <div class="step-indicator">
                                <i class="fas fa-info-circle"></i>
                                Stap 4 van 6
                            </div>
                            <h3><i class="fas fa-briefcase"></i> Stap 4 – Persoonlijke situatie</h3>

                            <div class="form-group">
                                <label for="leeftijd"><i class="fas fa-birthday-cake"></i> Uw leeftijd *</label>
                                <input 
                                    type="number" 
                                    id="leeftijd" 
                                    v-model="formData.leeftijd" 
                                    min="18" 
                                    max="100" 
                                    placeholder="Bijvoorbeeld: 35"
                                    @blur="validateField('leeftijd')"
                                >
                                <div v-if="errors.leeftijd" class="field-error">
                                    <i class="fas fa-exclamation-circle"></i> {{ errors.leeftijd }}
                                </div>
                            </div>
                            
                            <!-- Navigation -->
                            <div class="form-navigation">
                                <SecondaryButton type="button" @click="goToStep(3)">
                                    <i class="fas fa-arrow-left"></i>
                                    Vorige
                                </SecondaryButton>
                                <SecondaryButton type="button" @click="goToStep(5)">
                                    Volgende
                                    <i class="fas fa-arrow-right"></i>
                                </SecondaryButton>
                            </div>
                        </div>
                    </Transition>

                    <!-- Stap 5 - Extra hulp -->
                    <Transition name="slide-fade-left">
                        <div v-show="currentStep === 5" class="form-step">
                            <div class="step-indicator">
                                <i class="fas fa-info-circle"></i>
                                Stap 5 van 6
                            </div>
                            <h3><i class="fas fa-hands-helping"></i> Stap 5 – Extra hulp</h3>
                            
                            <!-- Benefit Highlight -->
                            <div class="benefit-highlight">
                                <i class="fas fa-home"></i>
                                Direct gratis advies en bezoek aan huis van een van onze experts
                            </div>
                            
                            <div class="form-group">
                                <label><i class="fas fa-plus-circle"></i> Welke extra hulp heeft u nodig?</label>
                                <div class="checkbox-group-multiple">
                                    <label 
                                        v-for="option in extraHulpOptions" 
                                        :key="option.value"
                                        class="checkbox-option"
                                    >
                                        <input 
                                            type="checkbox" 
                                            :value="option.value" 
                                            v-model="formData.extra_hulp"
                                        >
                                        <div class="checkbox-card">
                                            <i :class="option.icon + ' checkbox-icon'"></i>
                                            <span class="checkbox-text">{{ option.label }}</span>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            
                            <!-- Navigation -->
                            <div class="form-navigation">
                                <SecondaryButton type="button" @click="goToStep(4)">
                                    <i class="fas fa-arrow-left"></i>
                                    Vorige
                                </SecondaryButton>
                                <SecondaryButton type="button" @click="goToStep(6)">
                                    Volgende
                                    <i class="fas fa-arrow-right"></i>
                                </SecondaryButton>
                            </div>
                        </div>
                    </Transition>

                    <!-- Stap 6 - Contactgegevens -->
                    <Transition name="slide-fade-left">
                        <div v-show="currentStep === 6" class="form-step">
                            <div class="step-indicator">
                                <i class="fas fa-info-circle"></i>
                                Stap 6 van 6 - Laatste stap!
                            </div>
                            <h3><i class="fas fa-address-book"></i> Stap 6 – Contactgegevens</h3>
                            
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="firstname"><i class="fas fa-user"></i> Voornaam *</label>
                                    <input 
                                        type="text" 
                                        id="firstname" 
                                        v-model="formData.firstname" 
                                        placeholder="Voornaam"
                                        @blur="validateField('firstname')"
                                    >
                                    <div v-if="errors.firstname" class="field-error">
                                        <i class="fas fa-exclamation-circle"></i> {{ errors.firstname }}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="lastname"><i class="fas fa-user"></i> Achternaam *</label>
                                    <input 
                                        type="text" 
                                        id="lastname" 
                                        v-model="formData.lastname" 
                                        placeholder="Achternaam"
                                        @blur="validateField('lastname')"
                                    >
                                    <div v-if="errors.lastname" class="field-error">
                                        <i class="fas fa-exclamation-circle"></i> {{ errors.lastname }}
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label for="telephone"><i class="fas fa-phone"></i> Telefoonnummer *</label>
                                    <input 
                                        type="tel" 
                                        id="telephone" 
                                        v-model="formData.telephone" 
                                        placeholder="088 076 76 76"
                                        @blur="validateField('telephone')"
                                    >
                                    <div v-if="errors.telephone" class="field-error">
                                        <i class="fas fa-exclamation-circle"></i> {{ errors.telephone }}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email"><i class="fas fa-envelope"></i> E-mailadres *</label>
                                    <input 
                                        type="email" 
                                        id="email" 
                                        v-model="formData.email" 
                                        placeholder="uw@email.nl"
                                        @blur="validateField('email')"
                                    >
                                    <div v-if="errors.email" class="field-error">
                                        <i class="fas fa-exclamation-circle"></i> {{ errors.email }}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="availableTime"><i class="fas fa-clock"></i> Wanneer bent u het beste te bereiken? *</label>
                                <select 
                                    id="availableTime" 
                                    v-model="formData.availableTime"
                                    @change="validateField('availableTime')"
                                >
                                    <option value="">Selecteer tijd</option>
                                    <option v-for="time in availableTimes" :key="time.value" :value="time.value">
                                        {{ time.label }}
                                    </option>
                                </select>
                                <div v-if="errors.availableTime" class="field-error">
                                    <i class="fas fa-exclamation-circle"></i> {{ errors.availableTime }}
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="details"><i class="fas fa-comment"></i> Eventuele vragen en/of opmerkingen</label>
                                <textarea 
                                    id="details" 
                                    v-model="formData.details" 
                                    rows="3" 
                                    placeholder="Heeft u nog vragen of opmerkingen?"
                                ></textarea>
                            </div>

                            <!-- Privacy en Newsletter -->
                            <div class="form-group checkbox-group required-checkbox">
                                <label class="checkbox-label">
                                    <input 
                                        type="checkbox" 
                                        v-model="formData.privacy_akkoord"
                                        @change="validateField('privacy_akkoord')"
                                    >
                                    <span class="checkmark"></span>
                                    Ik ga akkoord met de <a href="/privacy" target="_blank" class="privacy-link">privacyverklaring</a> *
                                </label>
                                <div v-if="errors.privacy_akkoord" class="field-error">
                                    <i class="fas fa-exclamation-circle"></i> {{ errors.privacy_akkoord }}
                                </div>
                            </div>
                            
                            <div class="form-group checkbox-group">
                                <label class="checkbox-label">
                                    <input type="checkbox" v-model="formData.newsletter">
                                    <span class="checkmark"></span>
                                    Ik wil op de hoogte blijven van letselschade nieuws (optioneel)
                                </label>
                            </div>

                            <!-- Navigation -->
                            <div class="form-navigation">
                                <SecondaryButton type="button" @click="goToStep(5)">
                                    <i class="fas fa-arrow-left"></i>
                                    Vorige
                                </SecondaryButton>
                                <SecondaryButton type="submit" :disabled="loading">
                                    <i v-if="loading" class="fas fa-spinner fa-spin"></i>
                                    <i v-else class="fas fa-paper-plane"></i>
                                    Vraag gratis en vrijblijvend hulp aan
                                </SecondaryButton>
                            </div>
                        </div>
                    </Transition>
                </form>
            </div>
        </div>
    </GuestLayout>
</template>

<script>
import { Head } from "@inertiajs/vue3";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";

export default {
    name: "LetselschadeForm",
    components: {
        Head,
        GuestLayout,
        SecondaryButton,
    },
    props: {
        selectedCategory: {
            type: String,
            default: null
        }
    },
    data() {
        return {
            currentStep: 1,
            loading: false,
            successMessage: '',
            errorMessage: '',
            errors: {},
            formData: {
                soort_ongeval: '',
                ongeval_datum: '',
                tegenpartij: '',
                snel_hulp: '',
                letsel_beschrijving: '',
                schade_ernst: '',
                schade_omschrijving: '',
                leeftijd: '',
                extra_hulp: [],
                firstname: '',
                lastname: '',
                telephone: '',
                email: '',
                availableTime: '',
                details: '',
                privacy_akkoord: false,
                newsletter: false
            },
            accidentTypes: [
                { value: 'verkeer', label: 'Letsel verkeersongeval', icon: 'fas fa-car' },
                { value: 'bedrijf', label: 'Letsel Bedrijfsongeval', icon: 'fas fa-building' },
                { value: 'dier', label: 'Letsel veroorzaakt door dieren', icon: 'fas fa-paw' },
                { value: 'wegdek', label: 'Letsel door slecht wegdek', icon: 'fas fa-road' },
                { value: 'sportschool', label: 'Letsel op sportschool', icon: 'fas fa-dumbbell' }
            ],
            tegenpartijOptions: [
                { value: 'ja', label: 'Ja', icon: 'fas fa-check-circle' },
                { value: 'nee', label: 'Nee / Onbekend', icon: 'fas fa-question-circle' }
            ],
            snelHulpOptions: [
                { value: 'ja', label: 'Ja, graag direct contact', icon: 'fas fa-phone-alt' },
                { value: 'nee', label: 'Nee, alleen informatie', icon: 'fas fa-info-circle' }
            ],
            schadeErnstOptions: [
                { value: 'licht', label: 'Licht', icon: 'fas fa-thumbs-up', cardClass: 'damage-light' },
                { value: 'matig', label: 'Matig', icon: 'fas fa-exclamation-triangle', cardClass: 'damage-moderate' },
                { value: 'ernstig', label: 'Ernstig', icon: 'fas fa-exclamation-circle', cardClass: 'damage-severe' }
            ],
            extraHulpOptions: [
                { value: 'huishouding', label: 'Hulp in de huishouding', icon: 'fas fa-home' },
                { value: 'kinderopvang', label: 'Opvang voor de kinderen', icon: 'fas fa-baby' },
                { value: 'huisbezoek', label: 'Bezoek aan huis', icon: 'fas fa-user-tie' }
            ],
            availableTimes: [
                { value: '9', label: '09:00' },
                { value: '10', label: '10:00' },
                { value: '11', label: '11:00' },
                { value: '12', label: '12:00' },
                { value: '13', label: '13:00' },
                { value: '14', label: '14:00' },
                { value: '15', label: '15:00' },
                { value: '16', label: '16:00' },
                { value: '17', label: '17:00' }
            ]
        };
    },
    mounted() {
        // If a category is pre-selected, set it and start at step 2
        if (this.selectedCategory) {
            this.formData.soort_ongeval = this.selectedCategory;
            this.currentStep = 2;
        }
    },
    computed: {
        progressPercentage() {
            return ((this.currentStep - 1) / 5) * 100;
        },
        maxDate() {
            return new Date().toISOString().split('T')[0];
        }
    },
    methods: {
        getStepLabel(step) {
            const labels = {
                1: 'Soort ongeval',
                2: 'Gebeurtenis',
                3: 'Schade',
                4: 'Arbeid',
                5: 'Extra hulp',
                6: 'Contact'
            };
            return labels[step] || '';
        },
        validateField(field) {
            this.errors[field] = '';
            
            switch(field) {
                case 'soort_ongeval':
                    if (!this.formData.soort_ongeval) {
                        this.errors.soort_ongeval = 'Selecteer een soort ongeval';
                    }
                    break;
                case 'ongeval_datum':
                    if (!this.formData.ongeval_datum) {
                        this.errors.ongeval_datum = 'Selecteer een datum';
                    } else {
                        const selectedDate = new Date(this.formData.ongeval_datum);
                        const today = new Date();
                        if (selectedDate > today) {
                            this.errors.ongeval_datum = 'De datum kan niet in de toekomst liggen';
                        }
                    }
                    break;
                case 'letsel_beschrijving':
                    if (!this.formData.letsel_beschrijving.trim()) {
                        this.errors.letsel_beschrijving = 'Beschrijf uw letsel';
                    }
                    break;
                case 'schade_omschrijving':
                    if (!this.formData.schade_omschrijving.trim()) {
                        this.errors.schade_omschrijving = 'Beschrijf de schade';
                    }
                    break;
                case 'leeftijd':
                    const age = parseInt(this.formData.leeftijd);
                    if (!age || age < 18 || age > 100) {
                        this.errors.leeftijd = 'Voer een geldige leeftijd in (18-100 jaar)';
                    }
                    break;
                case 'firstname':
                    if (!this.formData.firstname.trim()) {
                        this.errors.firstname = 'Voornaam is verplicht';
                    }
                    break;
                case 'lastname':
                    if (!this.formData.lastname.trim()) {
                        this.errors.lastname = 'Achternaam is verplicht';
                    }
                    break;
                case 'email':
                    if (!this.formData.email.trim()) {
                        this.errors.email = 'E-mailadres is verplicht';
                    } else if (!this.isValidEmail(this.formData.email)) {
                        this.errors.email = 'Voer een geldig e-mailadres in';
                    }
                    break;
                case 'telephone':
                    if (!this.formData.telephone.trim()) {
                        this.errors.telephone = 'Telefoonnummer is verplicht';
                    } else if (!this.isValidPhone(this.formData.telephone)) {
                        this.errors.telephone = 'Voer een geldig telefoonnummer in';
                    }
                    break;
                case 'availableTime':
                    if (!this.formData.availableTime) {
                        this.errors.availableTime = 'Selecteer een tijd';
                    }
                    break;
                case 'privacy_akkoord':
                    if (!this.formData.privacy_akkoord) {
                        this.errors.privacy_akkoord = 'U moet akkoord gaan met de privacyverklaring';
                    }
                    break;
            }
        },
        isValidEmail(email) {
            return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
        },
        isValidPhone(phone) {
            return /^[\d\s\+\-\(\)]{10,}$/.test(phone);
        },
        validateCurrentStep() {
            this.errors = {};
            let isValid = true;
            
            switch(this.currentStep) {
                case 1:
                    this.validateField('soort_ongeval');
                    if (this.errors.soort_ongeval) isValid = false;
                    break;
                case 2:
                    this.validateField('ongeval_datum');
                    this.validateField('letsel_beschrijving');
                    if (this.errors.ongeval_datum || this.errors.letsel_beschrijving) isValid = false;
                    break;
                case 3:
                    this.validateField('schade_omschrijving');
                    if (this.errors.schade_omschrijving) isValid = false;
                    break;
                case 4:
                    this.validateField('leeftijd');
                    if (this.errors.leeftijd) isValid = false;
                    break;
                case 6:
                    this.validateField('firstname');
                    this.validateField('lastname');
                    this.validateField('email');
                    this.validateField('telephone');
                    this.validateField('availableTime');
                    this.validateField('privacy_akkoord');
                    if (this.errors.firstname || this.errors.lastname || this.errors.email || 
                        this.errors.telephone || this.errors.availableTime || this.errors.privacy_akkoord) {
                        isValid = false;
                    }
                    break;
            }
            
            return isValid;
        },
        goToStep(step) {
            if (step < 1 || step > 6) return;
            
            // Validate current step before moving forward
            if (step > this.currentStep) {
                if (!this.validateCurrentStep()) {
                    this.scrollToFirstError();
                    return;
                }
            }
            
            this.currentStep = step;
            this.errorMessage = '';
            this.scrollToTop();
            console.log('fields', this.formData);
            
        },
        scrollToTop() {
            this.$nextTick(() => {
                const topElement = document.getElementById('form-top');
                if (topElement) {
                    topElement.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            });
        },
        scrollToFirstError() {
            this.$nextTick(() => {
                const firstError = document.querySelector('.field-error');
                if (firstError) {
                    firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }
            });
        },
        openDatePicker() {
            // Trigger the date picker to open
            this.$nextTick(() => {
                const dateInput = document.getElementById('ongeval_datum');
                if (dateInput) {
                    dateInput.showPicker();
                }
            });
        },
        async submitForm() {
            this.errorMessage = '';
            this.successMessage = '';
            
            if (!this.validateCurrentStep()) {
                this.scrollToFirstError();
                return;
            }
            
            this.loading = true;
            
            try {
                // Prepare form data
                const formData = new FormData();
                
                // Add form data
                Object.keys(this.formData).forEach(key => {
                    if (key === 'extra_hulp' && Array.isArray(this.formData[key])) {
                        this.formData[key].forEach(item => {
                            formData.append('extra_hulp[]', item);
                        });
                    } else {
                        formData.append(key, this.formData[key]);
                    }
                });
                
                // Add required hidden fields
                formData.append('postal_code_id', '1000');
                formData.append('postal_code_letters', 'AA');
                formData.append('house_number', '1');
                
                const response = await axios.post('/webreactie', formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data',
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    }
                });
                
                if (response.data.success) {
                    this.successMessage = 'Uw aanvraag is succesvol verzonden! Wij nemen zo snel mogelijk contact met u op.';
                    // Reset form
                    this.formData = {
                        soort_ongeval: this.selectedCategory || '',
                        ongeval_datum: '',
                        tegenpartij: '',
                        snel_hulp: '',
                        letsel_beschrijving: '',
                        schade_ernst: '',
                        schade_omschrijving: '',
                        leeftijd: '',
                        extra_hulp: [],
                        firstname: '',
                        lastname: '',
                        telephone: '',
                        email: '',
                        availableTime: '',
                        details: '',
                        privacy_akkoord: false,
                        newsletter: false
                    };
                    this.currentStep = this.selectedCategory ? 2 : 1;
                } else {
                    this.errorMessage = response.data.message || 'Er is een fout opgetreden bij het verzenden van het formulier.';
                }
            } catch (error) {
                console.error('Form submission error:', error);
                if (error.response && error.response.data) {
                    if (error.response.status === 422) {
                        // Validation errors
                        const validationErrors = error.response.data.errors;
                        this.errorMessage = 'Controleer de volgende velden: ' + Object.values(validationErrors).flat().join(', ');
                    } else {
                        this.errorMessage = error.response.data.message || 'Er is een serverfout opgetreden.';
                    }
                } else {
                    this.errorMessage = 'Er is een netwerkfout opgetreden. Controleer uw internetverbinding.';
                }
            } finally {
                this.loading = false;
            }
        }
    }
};
</script>

<style scoped>
/* Add the CSS styles from your original form here */
.contact-form {
    margin: 0 auto;
}

.progress-container {
    margin-bottom: 30px;
}

.progress-bar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    position: relative;
}

.progress-line {
    position: absolute;
    top: 35%;
    left: 0;
    right: 0;
    height: 2px;
    background-color: #e5e7eb;
    z-index: 1;
}

.progress-line-fill {
    height: 100%;
    background-color: #10b981;
    transition: width 0.3s ease;
}

.progress-step {
    display: flex;
    flex-direction: column;
    align-items: center;
    cursor: pointer;
    z-index: 2;
    background: white;
    padding: 10px;
}

.progress-step-circle {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background-color: #e5e7eb;
    color: #6b7280;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    margin-bottom: 5px;
    transition: all 0.3s ease;
}

.progress-step.active .progress-step-circle {
    background-color: #10b981;
    color: white;
}

.progress-step.completed .progress-step-circle {
    background-color: #10b981;
    color: white;
}

.progress-step-label {
    font-size: 0.75rem;
    color: #6b7280;
    text-align: center;
}

.progress-step.active .progress-step-label {
    color: #10b981;
    font-weight: bold;
}

.form-step {
    display: block;
}

.step-indicator {
    background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
    padding: 12px 24px;
    border-radius: 8px;
    margin-bottom: 24px;
    color: #475569;
    font-weight: 600;
    font-size: 0.9rem;
    border: 1px solid #e2e8f0;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    display: flex;
    align-items: center;
    gap: 8px;
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    font-weight: bold;
    margin-bottom: 10px;
    color: #374151;
}

.form-step h3 {
    font-size: 1.5rem;
    font-weight: 700;
    color: #1e293b;
    margin-bottom: 32px;
    padding-bottom: 16px;
    border-bottom: 2px solid #e2e8f0;
    display: flex;
    align-items: center;
    gap: 12px;
}

.form-step h3 i {
    color: #10b981;
    font-size: 1.3rem;
}

@media (max-width: 768px) {
    .step-indicator {
        padding: 10px 16px;
        font-size: 0.85rem;
        margin-bottom: 20px;
    }
    
    .form-step h3 {
        font-size: 1.25rem;
        margin-bottom: 24px;
        padding-bottom: 12px;
        gap: 8px;
    }
    
    .form-step h3 i {
        font-size: 1.1rem;
    }
}

.radio-group {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 15px;
    margin-bottom: 10px;
}

@media (min-width: 1280px) {
    .radio-group {
        grid-template-columns: repeat(5, 1fr);
    }
}

.radio-option {
    cursor: pointer;
}

.radio-option input[type="radio"] {
    display: none;
}

.radio-card {
    border: 2px solid #e5e7eb;
    border-radius: 8px;
    padding: 20px;
    text-align: center;
    transition: all 0.3s ease;
    background: white;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 10px;
    height: 100%;
    min-height: 120px;
}

@media (max-width: 768px) {
    .radio-card {
        flex-direction: row;
        text-align: left;
        padding: 15px;
        gap: 15px;
        min-height: 80px;
    }
}

.radio-option.selected .radio-card {
    border-color: #10b981;
    background-color: #f0fdf4;
}

.radio-icon {
    font-size: 2rem;
    color: #6b7280;
    flex-shrink: 0;
}

@media (max-width: 768px) {
    .radio-icon {
        font-size: 1.5rem;
    }
}

.radio-option.selected .radio-icon {
    color: #10b981;
}

.radio-text {
    font-weight: bold;
    color: #374151;
    flex: 1;
}

@media (max-width: 768px) {
    .radio-text {
        font-size: 0.9rem;
    }
}

.checkbox-group-multiple {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 15px;
}

@media (min-width: 1280px) {
    .checkbox-group-multiple {
        grid-template-columns: repeat(5, 1fr);
    }
}

.checkbox-option {
    cursor: pointer;
}

.checkbox-option input[type="checkbox"] {
    display: none;
}

.checkbox-card {
    border: 2px solid #e5e7eb;
    border-radius: 8px;
    padding: 20px;
    text-align: center;
    transition: all 0.3s ease;
    background: white;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 10px;
    height: 100%;
    min-height: 120px;
}

@media (max-width: 768px) {
    .checkbox-card {
        flex-direction: row;
        text-align: left;
        padding: 15px;
        gap: 15px;
        min-height: 80px;
    }
}

.checkbox-option input[type="checkbox"]:checked + .checkbox-card {
    border-color: #10b981;
    background-color: #f0fdf4;
}

.checkbox-icon {
    font-size: 2rem;
    color: #6b7280;
    flex-shrink: 0;
}

@media (max-width: 768px) {
    .checkbox-icon {
        font-size: 1.5rem;
    }
}

.checkbox-option input[type="checkbox"]:checked + .checkbox-card .checkbox-icon {
    color: #10b981;
}

.checkbox-text {
    font-weight: bold;
    color: #374151;
    flex: 1;
}

@media (max-width: 768px) {
    .checkbox-text {
        font-size: 0.9rem;
    }
}

.form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
}

input, textarea, select {
    width: 100%;
    padding: 12px;
    border: 2px solid #e5e7eb;
    border-radius: 5px;
    font-size: 1rem;
    transition: border-color 0.3s ease;
}

input:focus, textarea:focus, select:focus {
    outline: none;
    border-color: #10b981;
}

.field-error {
    color: #dc2626;
    font-size: 0.875rem;
    margin-top: 5px;
    display: flex;
    align-items: center;
    gap: 5px;
}

.field-help {
    color: #6b7280;
    font-size: 0.875rem;
    margin-top: 5px;
}

.checkbox-group {
    margin-bottom: 20px;
}

.checkbox-label {
    display: flex;
    align-items: center;
    cursor: pointer;
    gap: 10px;
}

.checkbox-label input[type="checkbox"] {
    width: auto;
    margin: 0;
}

.benefit-highlight {
    background-color: #f0fdf4;
    border: 2px solid #10b981;
    border-radius: 8px;
    padding: 20px;
    margin-bottom: 20px;
    text-align: center;
    font-weight: bold;
    color: #065f46;
}

.form-navigation {
    display: flex;
    justify-content: space-between;
    margin-top: 30px;
    padding-top: 20px;
    border-top: 1px solid #e5e7eb;
}

.alert {
    padding: 15px;
    border-radius: 5px;
    margin-bottom: 20px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.alert-success {
    background-color: #f0fdf4;
    border: 1px solid #10b981;
    color: #065f46;
}

.alert-error {
    background-color: #fef2f2;
    border: 1px solid #dc2626;
    color: #991b1b;
}

.slide-fade-left-enter-active {
    transition: all 0.3s ease-out;
}

.slide-fade-left-leave-active {
    transition: all 0.3s ease-in;
}

.slide-fade-left-enter-from {
    transform: translateX(30px);
    opacity: 0;
}

.slide-fade-left-leave-to {
    transform: translateX(-30px);
    opacity: 0;
}
</style>
