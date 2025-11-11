@extends('layout.web')

@section('content')
<div class="min-h-screen bg-sky-950 py-8">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-amber-400 mb-4">Letselschade Aanvraag</h1>
            <p class="text-slate-300">Vul het onderstaande formulier in om uw letselschade aanvraag te starten</p>
        </div>

        <!-- Progress Bar -->
        <div class="mb-8">
            <div class="flex items-center justify-between mb-4">
                <div v-for="step in 6" :key="step" class="flex items-center">
                    <div :class="[
                        'w-8 h-8 rounded-full flex items-center justify-center text-sm font-medium',
                        currentStep >= step ? 'bg-green-500 text-white' : 'bg-slate-600 text-slate-300'
                    ]">
                        @{{ step }}
                    </div>
                    <div v-if="step < 6" :class="[
                        'w-16 h-1 mx-2',
                        currentStep > step ? 'bg-green-500' : 'bg-slate-600'
                    ]"></div>
                </div>
            </div>
            <div class="text-center text-slate-300">
                Stap @{{ currentStep }} van 6: @{{ getStepTitle(currentStep) }}
            </div>
        </div>

        <!-- Form -->
        <div class="bg-white rounded-lg shadow-lg p-6">
            <form @submit.prevent="submitForm" id="application-form" novalidate>
                @csrf
                
                <!-- Step 1: Soort ongeval -->
                <div v-show="currentStep === 1" class="step-content">
                    <h2 class="text-xl font-semibold text-slate-700 mb-4">Wat voor ongeval heeft u gehad?</h2>
                    <div class="space-y-3">
                        <label v-for="option in accidentTypes" :key="option.value" class="flex items-center p-3 border rounded-lg cursor-pointer hover:bg-slate-50" :class="{ 'border-green-500 bg-green-50': formData.soort_ongeval === option.value }">
                            <input type="radio" v-model="formData.soort_ongeval" :value="option.value" class="mr-3" @change="validateField('soort_ongeval')">
                            <span class="text-slate-700">@{{ option.label }}</span>
                        </label>
                    </div>
                    <div v-if="errors.soort_ongeval" class="text-red-500 text-sm mt-2">@{{ errors.soort_ongeval }}</div>
                </div>

                <!-- Step 2: Datum ongeval -->
                <div v-show="currentStep === 2" class="step-content">
                    <h2 class="text-xl font-semibold text-slate-700 mb-4">Wanneer heeft het ongeval plaatsgevonden?</h2>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">Datum ongeval</label>
                            <input type="date" v-model="formData.ongeval_datum" class="w-full p-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" @blur="validateField('ongeval_datum')">
                            <div v-if="errors.ongeval_datum" class="text-red-500 text-sm mt-1">@{{ errors.ongeval_datum }}</div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">Is de tegenpartij bekend?</label>
                            <div class="space-y-2">
                                <label class="flex items-center">
                                    <input type="radio" v-model="formData.tegenpartij" value="ja" class="mr-2">
                                    <span>Ja</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="radio" v-model="formData.tegenpartij" value="nee" class="mr-2">
                                    <span>Nee</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Step 3: Letsel beschrijving -->
                <div v-show="currentStep === 3" class="step-content">
                    <h2 class="text-xl font-semibold text-slate-700 mb-4">Beschrijf uw letsel</h2>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">Beschrijf uw letsel</label>
                            <textarea v-model="formData.letsel_beschrijving" rows="4" class="w-full p-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" placeholder="Beschrijf uw letsel zo gedetailleerd mogelijk..." @blur="validateField('letsel_beschrijving')"></textarea>
                            <div v-if="errors.letsel_beschrijving" class="text-red-500 text-sm mt-1">@{{ errors.letsel_beschrijving }}</div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">Hoe ernstig is de schade?</label>
                            <select v-model="formData.schade_ernst" class="w-full p-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">
                                <option value="">Selecteer ernst</option>
                                <option value="licht">Licht</option>
                                <option value="matig">Matig</option>
                                <option value="ernstig">Ernstig</option>
                                <option value="zeer_ernstig">Zeer ernstig</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">Schade omschrijving</label>
                            <textarea v-model="formData.schade_omschrijving" rows="3" class="w-full p-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" placeholder="Beschrijf de schade..."></textarea>
                        </div>
                    </div>
                </div>

                <!-- Step 4: Persoonlijke gegevens -->
                <div v-show="currentStep === 4" class="step-content">
                    <h2 class="text-xl font-semibold text-slate-700 mb-4">Uw persoonlijke gegevens</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">Voornaam *</label>
                            <input type="text" v-model="formData.firstname" class="w-full p-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" @blur="validateField('firstname')">
                            <div v-if="errors.firstname" class="text-red-500 text-sm mt-1">@{{ errors.firstname }}</div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">Achternaam *</label>
                            <input type="text" v-model="formData.lastname" class="w-full p-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" @blur="validateField('lastname')">
                            <div v-if="errors.lastname" class="text-red-500 text-sm mt-1">@{{ errors.lastname }}</div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">E-mailadres *</label>
                            <input type="email" v-model="formData.email" class="w-full p-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" @blur="validateField('email')">
                            <div v-if="errors.email" class="text-red-500 text-sm mt-1">@{{ errors.email }}</div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">Telefoonnummer *</label>
                            <input type="tel" v-model="formData.telephone" class="w-full p-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" @blur="validateField('telephone')">
                            <div v-if="errors.telephone" class="text-red-500 text-sm mt-1">@{{ errors.telephone }}</div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">Leeftijd</label>
                            <input type="number" v-model="formData.leeftijd" min="0" max="120" class="w-full p-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">Wanneer bent u het beste te bereiken?</label>
                            <input type="time" v-model="formData.availableTime" class="w-full p-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">
                        </div>
                    </div>
                </div>

                <!-- Step 5: Extra informatie -->
                <div v-show="currentStep === 5" class="step-content">
                    <h2 class="text-xl font-semibold text-slate-700 mb-4">Extra informatie</h2>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">Heeft u extra hulp nodig?</label>
                            <div class="space-y-2">
                                <label v-for="option in extraHulpOptions" :key="option" class="flex items-center">
                                    <input type="checkbox" :value="option" v-model="formData.extra_hulp" class="mr-2">
                                    <span>@{{ option }}</span>
                                </label>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">Eventuele vragen en/of opmerkingen</label>
                            <textarea v-model="formData.details" rows="4" class="w-full p-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" placeholder="Heeft u nog vragen of opmerkingen?"></textarea>
                        </div>
                    </div>
                </div>

                <!-- Step 6: Privacy en verzending -->
                <div v-show="currentStep === 6" class="step-content">
                    <h2 class="text-xl font-semibold text-slate-700 mb-4">Privacy en verzending</h2>
                    <div class="space-y-4">
                        <div>
                            <label class="flex items-start">
                                <input type="checkbox" v-model="formData.privacy_akkoord" class="mr-3 mt-1" @change="validateField('privacy_akkoord')">
                                <span class="text-sm text-slate-700">Ik ga akkoord met de privacyverklaring en geef toestemming voor het verwerken van mijn gegevens *</span>
                            </label>
                            <div v-if="errors.privacy_akkoord" class="text-red-500 text-sm mt-1">@{{ errors.privacy_akkoord }}</div>
                        </div>
                        <div>
                            <label class="flex items-start">
                                <input type="checkbox" v-model="formData.newsletter" class="mr-3 mt-1">
                                <span class="text-sm text-slate-700">Ik wil graag op de hoogte gehouden worden van relevante updates via e-mail</span>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Navigation Buttons -->
                <div class="flex justify-between mt-8">
                    <button type="button" @click="goToStep(currentStep - 1)" v-if="currentStep > 1" class="px-6 py-3 bg-slate-500 text-white rounded-lg hover:bg-slate-600 transition-colors">
                        Vorige
                    </button>
                    <div v-else></div>
                    
                    <button type="button" @click="goToStep(currentStep + 1)" v-if="currentStep < 6" class="px-6 py-3 bg-green-500 text-white rounded-lg hover:bg-green-600 transition-colors">
                        Volgende
                    </button>
                    <button type="submit" v-if="currentStep === 6" class="px-6 py-3 bg-green-500 text-white rounded-lg hover:bg-green-600 transition-colors">
                        Verzenden
                    </button>
                </div>
            </form>

            <!-- Success Message -->
            <div v-if="successMessage" class="mt-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                @{{ successMessage }}
            </div>

            <!-- Error Message -->
            <div v-if="errorMessage" class="mt-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">
                @{{ errorMessage }}
            </div>
        </div>
    </div>
</div>

<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
const { createApp } = Vue;

createApp({
    data() {
        return {
            currentStep: 1,
            formData: {
                soort_ongeval: '',
                ongeval_datum: '',
                tegenpartij: '',
                letsel_beschrijving: '',
                schade_ernst: '',
                schade_omschrijving: '',
                firstname: '',
                lastname: '',
                email: '',
                telephone: '',
                leeftijd: '',
                availableTime: '',
                extra_hulp: [],
                details: '',
                privacy_akkoord: false,
                newsletter: false
            },
            errors: {},
            successMessage: '',
            errorMessage: '',
            accidentTypes: [
                { value: 'verkeer', label: 'Verkeersongeval' },
                { value: 'bedrijf', label: 'Bedrijfsongeval' },
                { value: 'dier', label: 'Dierongeval' },
                { value: 'wegdek', label: 'Wegdekongeval' },
                { value: 'sportschool', label: 'Sportschoolongeval' }
            ],
            extraHulpOptions: [
                'Juridisch advies',
                'Medische behandeling',
                'Psychologische hulp',
                'Financiële compensatie',
                'Revalidatie'
            ]
        }
    },
    methods: {
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
                    }
                    break;
                case 'letsel_beschrijving':
                    if (!this.formData.letsel_beschrijving) {
                        this.errors.letsel_beschrijving = 'Beschrijf uw letsel';
                    }
                    break;
                case 'firstname':
                    if (!this.formData.firstname) {
                        this.errors.firstname = 'Voornaam is verplicht';
                    }
                    break;
                case 'lastname':
                    if (!this.formData.lastname) {
                        this.errors.lastname = 'Achternaam is verplicht';
                    }
                    break;
                case 'email':
                    if (!this.formData.email) {
                        this.errors.email = 'E-mailadres is verplicht';
                    } else if (!this.isValidEmail(this.formData.email)) {
                        this.errors.email = 'Voer een geldig e-mailadres in';
                    }
                    break;
                case 'telephone':
                    if (!this.formData.telephone) {
                        this.errors.telephone = 'Telefoonnummer is verplicht';
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
        goToStep(step) {
            if (step < 1 || step > 6) return;
            
            // Validate current step before moving
            if (step > this.currentStep) {
                this.validateCurrentStep();
                if (Object.keys(this.errors).length > 0) {
                    return;
                }
            }
            
            this.currentStep = step;
            this.errorMessage = '';
        },
        validateCurrentStep() {
            this.errors = {};
            
            switch(this.currentStep) {
                case 1:
                    this.validateField('soort_ongeval');
                    break;
                case 2:
                    this.validateField('ongeval_datum');
                    break;
                case 3:
                    this.validateField('letsel_beschrijving');
                    break;
                case 4:
                    this.validateField('firstname');
                    this.validateField('lastname');
                    this.validateField('email');
                    this.validateField('telephone');
                    break;
                case 6:
                    this.validateField('privacy_akkoord');
                    break;
            }
        },
        getStepTitle(step) {
            const titles = {
                1: 'Soort ongeval',
                2: 'Datum ongeval',
                3: 'Letsel beschrijving',
                4: 'Persoonlijke gegevens',
                5: 'Extra informatie',
                6: 'Privacy en verzending'
            };
            return titles[step] || '';
        },
        async submitForm() {
            this.errorMessage = '';
            this.successMessage = '';
            
            // Validate all required fields
            this.validateCurrentStep();
            if (Object.keys(this.errors).length > 0) {
                this.errorMessage = 'Controleer de verplichte velden';
                return;
            }
            
            try {
                // Create FormData
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
                
                // Get CSRF token
                const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
                
                const response = await axios.post('/webreactie', formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data',
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    }
                });
                
                if (response.data.success) {
                    this.successMessage = 'Uw aanvraag is succesvol verzonden! Wij nemen zo snel mogelijk contact met u op.';
                    // Reset form
                    this.formData = {
                        soort_ongeval: '',
                        ongeval_datum: '',
                        tegenpartij: '',
                        letsel_beschrijving: '',
                        schade_ernst: '',
                        schade_omschrijving: '',
                        firstname: '',
                        lastname: '',
                        email: '',
                        telephone: '',
                        leeftijd: '',
                        availableTime: '',
                        extra_hulp: [],
                        details: '',
                        privacy_akkoord: false,
                        newsletter: false
                    };
                    this.currentStep = 1;
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
            }
        }
    }
}).mount('#application-form');
</script>
@endsection