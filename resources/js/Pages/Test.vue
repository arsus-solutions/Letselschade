<template>
    <Head>
        <title>Letselschade</title>
        <meta
            name="description"
            content="In dit onderdeel kijken we naar de situatie van het ongeval en in hoeverre er een aansprakelijke tegenpartij bestaat op wie de schade verhaald kan worden."
        />
    </Head>
    <GuestLayout>
        <div id="top"></div>
        <form @submit.prevent="submit">
            <Transition name="slide-fade-left">
                <div ref="step-1" v-if="currentStep === 1">
                    <step1
                        :letselschade="letselschade"
                        :invalidFields="invalidFields"
                        :questions="questions"
                        @update:selectedValue="handleRadio"
                        @scroll-to="scrollTo"
                    />
                    <div
                        class="px-24 py-10 bg-white"
                        v-if="letselschade.category"
                    >
                        <div class="flex justify-end max-md:px-5">
                            <secondary-button @click="goTo(2)">
                                Volgende <i class="fas fa-arrow-right ml-3"></i>
                            </secondary-button>
                        </div>
                    </div>
                </div>
            </Transition>
            <Transition name="slide-fade-left">
                <div
                    ref="step-2"
                    v-if="currentStep === 2"
                    class="md:p-24 bg-white"
                >
                    <step2
                        :letselschade="letselschade"
                        :invalidFields="invalidFields"
                        :questions="questions"
                        @update:selectedValue="handleRadio"
                        @scroll-to="scrollTo"
                    />
                    <div class="flex justify-between py-8 max-md:px-5">
                        <secondary-button @click="goTo(1)">
                            <i class="fas fa-arrow-left mr-3"></i> Vorige
                        </secondary-button>
                        <secondary-button @click="goTo(3)">
                            Volgende <i class="fas fa-arrow-right ml-3"></i>
                        </secondary-button>
                    </div>
                </div>
            </Transition>
            <Transition name="slide-fade-left">
                <div
                    ref="step-3"
                    v-if="currentStep === 3"
                    class="md:p-24 bg-white"
                >
                    <step3
                        :letselschade="letselschade"
                        :invalidFields="invalidFields"
                        :questions="questions"
                        @update:selectedValue="handleRadio"
                        @scroll-to="scrollTo"
                    />
                    <div class="flex justify-between py-8 max-md:px-5">
                        <secondary-button @click="goTo(2)">
                            <i class="fas fa-arrow-left mr-3"></i> Vorige
                        </secondary-button>
                        <secondary-button @click="goTo(4)">
                            Volgende <i class="fas fa-arrow-right ml-3"></i>
                        </secondary-button>
                    </div>
                </div>
            </Transition>
            <Transition name="slide-fade-left">
                <div
                    ref="step-4"
                    v-if="currentStep === 4"
                    class="md:p-24 bg-white"
                >
                    <step4
                        :webreaction="webreaction"
                        :invalidFields="invalidFields"
                        @update:selectedValueWebreaction="
                            handleRadioWebreaction
                        "
                        @update:selectedOption="handleRadioWebreaction"
                        @scroll-to="scrollTo"
                    />
                    <div class="flex justify-between py-8 max-md:px-5">
                        <secondary-button @click="goTo(3)">
                            <i class="fas fa-arrow-left mr-3"></i> Vorige
                        </secondary-button>
                        <secondary-button @click="goTo(5)" :disable="loading">
                            Klik hier voor uw uitslag
                            <i
                                class="fas fa-spinner fa-spin-pulse ml-3"
                                v-if="loading"
                            ></i>
                            <i class="fas fa-check ml-3" v-else></i>
                        </secondary-button>
                    </div>
                </div>
            </Transition>
            <Transition name="slide-fade-left">
                <div
                    ref="step-5"
                    v-if="currentStep === 5"
                    class="md:p-24 bg-white"
                >
                    <step5
                        :webreaction="webreaction"
                        :letselschade="letselschade"
                        :questions="questions"
                    />
                </div>
            </Transition>
        </form>
    </GuestLayout>
</template>

<script>
import { Head, Link, usePage } from "@inertiajs/vue3";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";

import Step1 from "./Forms/Test/Step1.vue";
import Step2 from "./Forms/Test/Step2.vue";
import Step3 from "./Forms/Test/Step3.vue";
import Step4 from "./Forms/Test/Step4.vue";
import Step5 from "./Forms/Test/Step5.vue";

export default {
    name: "Home",
    components: {
        Head,
        Link,
        usePage,
        GuestLayout,
        PrimaryButton,
        SecondaryButton,
        Step1,
        Step2,
        Step3,
        Step4,
        Step5,
    },
    created() {
        const page = usePage();
        const slug = page.props.selectedCategory;
        if (slug) {
            const catData = slug.split("-");
            this.webreaction.lead_type_id = parseInt(catData[0]);
            this.letselschade.category = catData[1];
        }
    },
    data() {
        return {
            currentStep: 1,
            invalidFields: [],
            loading: false,
            letselschade: {
                category: null,
                erkenning: null,
                toelichting_aansprakelijkheid: "",
                wanneer_ongeval: null,
                eerder_verhaal: null,
                durf_aansprakelijk: null,
                manier_verhaal: null,
                juridische_hulp: null,
                data_tegenpartij: null,
                politie_inspectie: null,
                reden_ontevreden: "",
                interesse_overname_secondopinion: null,
                soort_letsel: null,
                omschrijving_letsel: "",
                behandeling: null,
                opgelopen_schade: null,
                arbeidsongeschiktheid: null,
                duur_ao: null,
                huishoudelijk: null,
                zelfstandig: null,
                leeftijdsgroep: null,
            },
            questions: {
                category: "Wat is de aard van uw ongeval?",
                erkenning: "Is er aansprakelijkheid erkend?",
                toelichting_aansprakelijkheid: "Wat is er precies gebeurd?",
                wanneer_ongeval: "Wanneer vond het ongeval plaats?",
                eerder_verhaal: "Heeft u geprobeerd de schade te claimen?",
                durf_aansprakelijk:
                    "Vindt u het goed als uw werkgever aansprakelijk wordt gesteld?",
                manier_verhaal: "Hoe heeft u de schade geprobeerd te claimen?",
                juridische_hulp: "Heeft u interesse in kosteloze hulp?",
                data_tegenpartij: "Zijn de gegevens van de tegenpartij bekend?",
                politie: "Is de politie ter plaatse geweest?",
                politie_inspectie:
                    "Is de politie of arbeidsinspectie ter plaatse geweest?",
                reden_ontevreden: "Waar bent u ontevreden over?",
                interesse_overname_secondopinion: "Waar heeft u interesse in?",
                soort_letsel: "Hoe ernstig is het letsel?",
                omschrijving_letsel: "Omschrijf uw opgelopen letsel",
                behandeling: "Bent u al onder medische behandeling (geweest)?",
                opgelopen_schade:
                    "Kunt u een indicatie geven van de tot nu toe opgelopen schade?",
                arbeidsongeschiktheid:
                    "Is er sprake van arbeidsongeschiktheid?",
                duur_ao:
                    "Is de arbeidsongeschiktheid blijvend of langer dan 6 maanden?",
                huishoudelijk:
                    "Is er behoefte aan huishoudelijke hulp? (ingehuurd of door familie/vrienden)",
                zelfstandig: "Bent u zelfstandig ondernemer?",
                leeftijdsgroep: "In welke leeftijdsgroep valt u?",
            },
            webreaction: {
                webmodule_id: 1,
                lead_webreaction_type_id: 1,
                domain_name: "",
                lead_type_id: 0,
                gender: "m",
                firstname: "",
                lastname: "",
                postal_code_id: "",
                postal_code_letters: "",
                house_number: "",
                email: "",
                telephone: "",
                availableTime: "09:00",
                details: "",
            },
            testResults: null,
        };
    },
    methods: {
        handleRadio(model, value) {
            this.letselschade[model] = value;
        },
        handleRadioWebreaction(model, value) {
            this.webreaction[model] = value;
        },
        scrollTo(div) {
            const scrollToDiv = document.getElementById(div);

            if (scrollToDiv) {
                scrollToDiv.scrollIntoView({
                    behavior: "smooth",
                    block: "center",
                });
            }
        },
        validateStep1() {
            const invalids = [];

            if (!this.letselschade.category) {
                invalids.push("category");
            }
            if (
                (this.letselschade.category === "verkeersongeval" ||
                    this.letselschade.category === "bedrijfsongeval") &&
                this.letselschade.erkenning === null
            ) {
                invalids.push("erkenning");
            }
            if (
                this.letselschade.category === "bedrijfsongeval" &&
                this.letselschade.durf_aansprakelijk === null
            ) {
                invalids.push("durf_aansprakelijk");
            }
            if (this.letselschade.toelichting_aansprakelijkheid === "") {
                invalids.push("toelichting_aansprakelijkheid");
            }
            if (!this.letselschade.wanneer_ongeval) {
                invalids.push("wanneer_ongeval");
            }
            if (this.letselschade.eerder_verhaal === null) {
                invalids.push("eerder_verhaal");
            } else {
                if (
                    this.letselschade.eerder_verhaal === 1 &&
                    !this.letselschade.manier_verhaal
                ) {
                    invalids.push("manier_verhaal");
                }
                if (
                    (this.letselschade.eerder_verhaal === 0 ||
                        this.letselschade.manier_verhaal === "Zelfstandig" ||
                        this.letselschade.manier_verhaal ===
                            "Op een andere manier") &&
                    !this.letselschade.juridische_hulp
                ) {
                    invalids.push("juridische_hulp");
                }
                if (
                    this.letselschade.eerder_verhaal === 1 &&
                    (this.letselschade.manier_verhaal ===
                        "Via rechtsbijstandsverzekering" ||
                        this.letselschade.manier_verhaal ===
                            "Via letselschadebureau" ||
                        this.letselschade.manier_verhaal === "Via advocaat")
                ) {
                    if (this.letselschade.reden_ontevreden === "") {
                        invalids.push("reden_ontevreden");
                    }
                    if (
                        this.letselschade.interesse_overname_secondopinion ===
                        null
                    ) {
                        invalids.push("interesse_overname_secondopinion");
                    }
                }

                if (
                    this.letselschade.erkenning === 0 ||
                    this.letselschade.category === "dieren" ||
                    this.letselschade.category === "wegdek"
                ) {
                    if (
                        (this.letselschade.category === "bedrijfsongeval" ||
                            this.letselschade.category === "wegdek") &&
                        this.letselschade.politie_inspectie === null
                    ) {
                        invalids.push("politie_inspectie");
                    }
                }
            }

            if (
                this.letselschade.erkenning === 0 ||
                this.letselschade.category === "dieren" ||
                this.letselschade.category === "wegdek"
            ) {
                if (
                    this.letselschade.category !== "bedrijfsongeval" &&
                    this.letselschade.data_tegenpartij === null
                ) {
                    invalids.push("data_tegenpartij");
                }

                if (
                    this.letselschade.category !== "bedrijfsongeval" &&
                    this.letselschade.politie === null
                ) {
                    invalids.push("politie");
                }
            }

            this.invalidFields.push(...invalids);
        },
        validateStep2() {
            const invalids = [];

            if (this.letselschade.soort_letsel === null) {
                invalids.push("soort_letsel");
            }

            if (this.letselschade.omschrijving_letsel === "") {
                invalids.push("omschrijving_letsel");
            }

            if (this.letselschade.behandeling === null) {
                invalids.push("behandeling");
            }

            if (this.letselschade.opgelopen_schade === null) {
                invalids.push("opgelopen_schade");
            }

            this.invalidFields.push(...invalids);
        },
        validateStep3() {
            const invalids = [];

            if (this.letselschade.arbeidsongeschiktheid === null) {
                invalids.push("arbeidsongeschiktheid");
            }

            if (
                this.letselschade.arbeidsongeschiktheid !== "Geen" &&
                this.letselschade.arbeidsongeschiktheid !== null &&
                this.letselschade.duur_ao === null
            ) {
                invalids.push("duur_ao");
            }

            if (this.letselschade.huishoudelijk === null) {
                invalids.push("huishoudelijk");
            }

            if (this.letselschade.zelfstandig === null) {
                invalids.push("zelfstandig");
            }

            if (this.letselschade.leeftijdsgroep === null) {
                invalids.push("leeftijdsgroep");
            }
        },
        validateStep4() {
            const invalids = [];

            if (this.webreaction.firstname === "") {
                invalids.push("firstname");
            }

            if (this.webreaction.lastname === "") {
                invalids.push("lastname");
            }

            if (this.webreaction.lastname === "") {
                invalids.push("lastname");
            }

            if (this.webreaction.postal_code_id === "") {
                invalids.push("postal_code_id");
            }

            if (this.webreaction.postal_code_letters === "") {
                invalids.push("postal_code_letters");
            }

            if (this.webreaction.house_number === "") {
                invalids.push("house_number");
            }

            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            const phonePattern = /^[+-]?[0-9\s-]+$/;
            if (
                this.webreaction.email === "" ||
                !emailPattern.test(this.webreaction.email)
            ) {
                invalids.push("email");
            }

            if (
                this.webreaction.telephone === "" ||
                !phonePattern.test(this.webreaction.telephone) ||
                this.webreaction.telephone.length < 8 ||
                this.webreaction.telephone.length > 15
            ) {
                invalids.push("telephone");
            }

            this.invalidFields.push(...invalids);
        },
        scrollToTop() {
            const divTop = document.getElementById("top");
            divTop.scrollIntoView({
                behavior: "smooth",
                block: "center",
            });
        },
        goTo(step) {
            this.invalidFields = [];
            switch (this.currentStep) {
                case 1:
                    this.validateStep1();
                    break;
                case 2:
                    this.validateStep2();
                    break;
                case 3:
                    this.validateStep3();
                    break;
                case 4:
                    this.validateStep4();
                    break;

                default:
                    break;
            }

            if (this.invalidFields.length === 0) {
                if (this.currentStep === 4) {
                    this.submit();
                } else {
                    this.currentStep = step;
                    this.$nextTick(() => {
                        this.scrollToTop();
                    });
                }
            } else {
                this.$nextTick(() => {
                    const errorDiv = document.querySelector(".error-field");
                    if (errorDiv) {
                        errorDiv.scrollIntoView({
                            behavior: "smooth",
                            block: "center",
                        });
                    }
                });
            }
        },
        trackConversion() {
            // Fire the conversion event when the button is clicked
            console.log("track conversion is triggered");
            window.gtag("event", "conversion", {
                send_to: "AW-11561362909/K7m6CLzNi4caEN3L8Ygr",
                value: 1.0,
                currency: "EUR",
            });
        },
        submit() {
            this.loading = true;
            console.log("webreaction", this.webreaction);
            const data = {};

            for (const key in this.questions) {
                if (this.letselschade[key] !== null) {
                    let answer = this.letselschade[key];
                    if (this.letselschade[key] === 1) {
                        answer = "Ja";
                    }
                    if (this.letselschade[key] === 0) {
                        answer = "Nee";
                    }
                    data[this.questions[key]] = answer;
                }
            }

            this.testResults = data;

            const apiURL = "/webreactie";
            this.webreaction.json_details = this.testResults;
            const postData = this.webreaction;

            axios
                .post(apiURL, postData)
                .then((response) => {
                    console.log("Data sent successfully:", response.data);
                    this.trackConversion();
                    this.currentStep = 5;
                    this.$nextTick(() => {
                        this.scrollToTop();
                    });
                })
                .catch((error) => {
                    console.error("Error sending data:", error); // Handle any error
                })
                .finally(() => {
                    this.loading = false;
                });
        },
    },
};
</script>
