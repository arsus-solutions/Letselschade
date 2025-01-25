<template>
    <div class="py-10 max-md:px-5">
        <div class="md:px-24">
            <h2 class="font-logo mb-2 text-3xl text-blue-900">
                Aansprakelijkheid
                <span v-if="letselschade.category"
                    >- {{ letselschade.category }}</span
                >
            </h2>
            <p class="text-2xl text-white">
                In dit onderdeel kijken we naar de situatie van het ongeval en
                in hoeverre er een aansprakelijke tegenpartij bestaat op wie de
                schade verhaald kan worden.
            </p>
        </div>
    </div>
    <div class="py-10" id="step1-categories">
        <div class="max-md:px-10 md:px-24">
            <p
                class="text-slate-500 italic max-md:text-center mb-3"
                v-if="!letselschade.category"
            >
                Kies &eacute;&eacute;n van deze voorbeelden
            </p>
            <Categories />
        </div>
    </div>
    <div v-if="letselschade.category" class="max-md:px-5 md:px-24 bg-white">
        <div
            v-if="
                letselschade.category === 'verkeersongeval' ||
                letselschade.category === 'bedrijfsongeval'
            "
            class="py-10"
        >
            <div class="pb-2" id="step1-erkenning">
                <div>
                    <div class="md:flex items-center">
                        <p
                            :class="
                                'text-3xl font-title flex-shrink-0' +
                                (invalidFields.length &&
                                invalidFields.includes('erkenning')
                                    ? ' text-red-700 error-field'
                                    : '')
                            "
                        >
                            <label for="erkenning_0">{{
                                questions.erkenning
                            }}</label>
                        </p>
                        <div class="flex-grow mx-2 relative">
                            <div
                                class="absolute inset-0 flex items-center max-md:hidden"
                                aria-hidden="true"
                            >
                                <div
                                    :class="
                                        'w-full border-t' +
                                        (invalidFields.length &&
                                        invalidFields.includes('erkenning')
                                            ? ' border-red-700 error-field'
                                            : ' border-gray-300')
                                    "
                                ></div>
                            </div>
                            <div class="relative lg:flex justify-end">
                                <radio-group
                                    :options="jaNee"
                                    @update:selectedValue="handleRadio"
                                    :selectedValue="letselschade.erkenning"
                                    variable="erkenning"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-14" id="step1-aansprakelijkheid">
            <div class="md:grid grid-cols-2 gap-8">
                <textarea
                    :class="
                        'w-full h-64 rounded pb-5' +
                        (invalidFields.length &&
                        invalidFields.includes('toelichting_aansprakelijkheid')
                            ? ' border-red-700 error-field'
                            : ' border-slate-200')
                    "
                    :placeholder="questions.toelichting_aansprakelijkheid"
                    v-model="letselschade.toelichting_aansprakelijkheid"
                ></textarea>
                <div>
                    <p
                        :class="
                            'text-3xl font-title mb-3' +
                            (invalidFields.length &&
                            invalidFields.includes('wanneer_ongeval')
                                ? ' text-red-700 error-field'
                                : '')
                        "
                    >
                        {{ questions.wanneer_ongeval }}
                    </p>
                    <label
                        v-for="(ong, i) in wanneer_ongevals"
                        :key="i"
                        :for="`ong_${i}`"
                        class="block mb-3 text-xl"
                    >
                        <checkbox
                            type="radio"
                            :checked="letselschade.wanneer_ongeval === ong"
                            name="wanneer_ongeval"
                            :value="ong"
                            :id="`ong_${i}`"
                            class="mr-3"
                            v-model:checked="letselschade.wanneer_ongeval"
                            @change="() => scrollTo('step1-eerder_verhaal')"
                        />
                        {{ ong }}
                    </label>
                </div>
            </div>
        </div>
        <div class="pb-7" id="step1-eerder_verhaal">
            <div>
                <div class="lg:flex items-center">
                    <p
                        :class="
                            'text-3xl font-title flex-shrink-0' +
                            (invalidFields.length &&
                            invalidFields.includes('eerder_verhaal')
                                ? ' text-red-700 error-field'
                                : '')
                        "
                    >
                        <label for="eerder_verhaal_0">
                            {{ questions.eerder_verhaal }}</label
                        >
                    </p>
                    <div class="flex-grow mx-2 relative">
                        <div
                            class="absolute inset-0 lg:flex items-center max-md:hidden"
                            aria-hidden="true"
                        >
                            <div
                                :class="
                                    'w-full border-t' +
                                    (invalidFields.length &&
                                    invalidFields.includes('eerder_verhaal')
                                        ? ' border-red-700 error-field'
                                        : ' border-gray-300')
                                "
                            ></div>
                        </div>
                        <div class="relative lg:flex justify-end">
                            <radio-group
                                :options="jaNee"
                                @update:selectedValue="handleRadio"
                                :selectedValue="letselschade.eerder_verhaal"
                                variable="eerder_verhaal"
                                @change="() => scrollTo('step1-manier')"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="pb-7" v-if="letselschade.category === 'bedrijfsongeval'">
            <div>
                <div class="lg:flex items-center" id="step1-durf">
                    <p
                        :class="
                            'text-3xl font-title flex-shrink-0' +
                            (invalidFields.length &&
                            invalidFields.includes('durf_aansprakelijk')
                                ? ' text-red-700 error-field'
                                : '')
                        "
                    >
                        <label for="durf_aansprakelijk_0">
                            {{ questions.durf_aansprakelijk }}</label
                        >
                    </p>
                    <div class="flex-grow mx-2 relative">
                        <div
                            class="absolute inset-0 flex items-center max-md:hidden"
                            aria-hidden="true"
                        >
                            <div
                                :class="
                                    'w-full border-t' +
                                    (invalidFields.length &&
                                    invalidFields.includes('durf_aansprakelijk')
                                        ? ' border-red-700 error-field'
                                        : ' border-gray-300')
                                "
                            ></div>
                        </div>
                        <div class="relative lg:flex justify-end">
                            <radio-group
                                :options="jaNee"
                                @update:selectedValue="handleRadio"
                                :selectedValue="letselschade.durf_aansprakelijk"
                                variable="durf_aansprakelijk"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <Transition name="slide-fade-down">
            <div
                class="pb-5 border rounded-xl p-8 shadow-lg"
                v-if="letselschade.eerder_verhaal === 1"
            >
                <div id="step1-manier">
                    <p
                        :class="
                            'text-3xl font-title mb-3' +
                            (invalidFields.length &&
                            invalidFields.includes('manier_verhaal')
                                ? ' text-red-700 error-field'
                                : '')
                        "
                    >
                        {{ questions.manier_verhaal }}
                    </p>
                    <label
                        v-for="(ver, i) in manier_verhalen"
                        :key="i"
                        :for="`verhaal_${i}`"
                        class="block mb-3 text-xl"
                    >
                        <checkbox
                            type="radio"
                            :checked="letselschade.manier_verhaal === ver"
                            name="manier_verhaal"
                            :value="ver"
                            :id="`verhaal_${i}`"
                            class="mr-3"
                            v-model:checked="letselschade.manier_verhaal"
                            @change="() => scrollTo('manier_wrapper')"
                        />
                        {{ ver }}
                    </label>
                </div>
            </div>
        </Transition>
        <Transition name="slide-fade-down">
            <div
                class="pb-5 border rounded-xl p-8 shadow-lg"
                v-if="
                    letselschade.eerder_verhaal === 0 ||
                    letselschade.manier_verhaal === 'Zelfstandig' ||
                    letselschade.manier_verhaal === 'Op een andere manier'
                "
            >
                <div id="step1-juridisch">
                    <p
                        :class="
                            'text-3xl font-title mb-3' +
                            (invalidFields.length &&
                            invalidFields.includes('juridische_hulp')
                                ? ' text-red-700 error-field'
                                : '')
                        "
                    >
                        {{ questions.juridische_hulp }}
                    </p>
                    <label
                        v-for="(jh, i) in juridische_hulpen"
                        :key="i"
                        :for="`hulp_${i}`"
                        class="block mb-3 text-xl"
                    >
                        <checkbox
                            type="radio"
                            :checked="letselschade.juridische_hulp === jh"
                            name="juridische_hulp"
                            :value="jh"
                            :id="`hulp_${i}`"
                            class="mr-3"
                            v-model:checked="letselschade.juridische_hulp"
                        />
                        {{ jh }}
                    </label>
                </div>
            </div>
        </Transition>
        <div id="manier_wrapper">
            <Transition name="slide-fade-down">
                <div
                    v-if="
                        letselschade.eerder_verhaal === 1 &&
                        (letselschade.manier_verhaal ===
                            'Via rechtsbijstandsverzekering' ||
                            letselschade.manier_verhaal ===
                                'Via letselschadebureau' ||
                            letselschade.manier_verhaal === 'Via advocaat')
                    "
                    class="mt-5"
                >
                    <div class="" id="step1-reden">
                        <div class="lg:grid grid-cols-2 gap-5">
                            <div>
                                <h3 class="font-title text-3xl mb-3">
                                    Bent u ergens ontevreden over?
                                </h3>
                                <p class="pb-5">
                                    Ontevredenheid over een schadebehandelaar is
                                    geen onbekend verschijnsel. U bezoekt deze
                                    website waarschijnlijk omdat u met vragen
                                    zit. Hieronder kunt u deze aangeven waar u
                                    mee zit. Een second opinion of overname van
                                    uw zaak door een van onze betrouwbare
                                    experts behoort ook tot de mogelijkheden.
                                </p>
                                <textarea
                                    :class="
                                        'w-full h-64 rounded pb-5' +
                                        (invalidFields.length &&
                                        invalidFields.includes(
                                            'reden_ontevreden'
                                        )
                                            ? ' border-red-700 error-field'
                                            : ' border-slate-200')
                                    "
                                    :placeholder="questions.reden_ontevreden"
                                    v-model="letselschade.reden_ontevreden"
                                ></textarea>
                            </div>
                            <div>
                                <h3 class="font-title text-3xl mb-3">
                                    Kan een ander mij wel helpen?
                                </h3>
                                <p class="pb-5">
                                    Een overname van uw zaak door onze experts
                                    is kosteloos. Er zal vooraf een gesprek
                                    plaatsvinden over de zaak en mogelijke
                                    overname. Met een schriftelijke machtiging
                                    kan een zaak door ons worden overgenomen.
                                    Bij een overname hoeft u zich geen zorgen te
                                    maken over kosten of uw huidige behandelaar;
                                    uw recht tot overname is wettelijk bepaald.
                                </p>
                                <div>
                                    <p
                                        :class="
                                            'text-3xl font-title mb-3' +
                                            (invalidFields.length &&
                                            invalidFields.includes(
                                                'interesse_overname_secondopinion'
                                            )
                                                ? ' text-red-700 error-field'
                                                : '')
                                        "
                                    >
                                        {{
                                            questions.interesse_overname_secondopinion
                                        }}
                                    </p>
                                    <label
                                        v-for="(
                                            so, i
                                        ) in interesse_overname_secondopinions"
                                        :key="i"
                                        :for="`secondOpinion_${i}`"
                                        class="block mb-3 text-xl"
                                    >
                                        <checkbox
                                            type="radio"
                                            :checked="
                                                letselschade.interesse_overname_secondopinion ===
                                                so
                                            "
                                            name="interesse_overname_secondopinion"
                                            :value="so"
                                            :id="`secondOpinion_${i}`"
                                            class="mr-3"
                                            v-model:checked="
                                                letselschade.interesse_overname_secondopinion
                                            "
                                        />
                                        {{ so }}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </Transition>
        </div>
        <div
            class="pb-8 pt-5"
            v-if="
                letselschade.erkenning === 0 ||
                letselschade.category === 'dieren' ||
                letselschade.category === 'wegdek'
            "
        >
            <Transition name="slide-fade-down">
                <div
                    v-if="letselschade.category !== 'bedrijfsongeval'"
                    id="step1-datategenpartij"
                >
                    <div class="lg:flex items-center">
                        <p class="text-3xl font-title flex-shrink-0">
                            <label for="data_tegenpartij_0">
                                {{ questions.data_tegenpartij }}</label
                            >
                        </p>
                        <div class="flex-grow mx-2 relative">
                            <div
                                class="absolute inset-0 flex items-center max-md:hidden"
                                aria-hidden="true"
                            >
                                <div
                                    class="w-full border-t border-gray-300"
                                ></div>
                            </div>
                            <div class="relative lg:flex justify-end">
                                <radio-group
                                    :options="jaNee"
                                    @update:selectedValue="handleRadio"
                                    :selectedValue="
                                        letselschade.data_tegenpartij
                                    "
                                    variable="data_tegenpartij"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </Transition>
            <Transition name="slide-fade-down">
                <div
                    class="mt-5"
                    v-if="letselschade.category !== 'bedrijfsongeval'"
                >
                    <div class="lg:flex items-center" id="step1-politie">
                        <p class="text-3xl font-title flex-shrink-0">
                            <label for="politie_0">
                                {{ questions.politie }}</label
                            >
                        </p>
                        <div class="flex-grow mx-2 relative">
                            <div
                                class="absolute inset-0 lg:flex items-center max-md:hidden"
                                aria-hidden="true"
                            >
                                <div
                                    :class="
                                        'w-full border-t' +
                                        (invalidFields.length &&
                                        invalidFields.includes('politie')
                                            ? ' border-red-700 error-field'
                                            : ' border-gray-300')
                                    "
                                ></div>
                            </div>
                            <div class="relative lg:flex justify-end">
                                <radio-group
                                    :options="jaNee"
                                    @update:selectedValue="handleRadio"
                                    :selectedValue="letselschade.politie"
                                    variable="politie"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </Transition>
            <Transition name="slide-fade-down">
                <div
                    class="mt-5"
                    v-if="
                        letselschade.category === 'bedrijfsongeval' ||
                        letselschade.category === 'wegdek'
                    "
                >
                    <div class="lg:flex items-center" id="step1-inspectie">
                        <p
                            :class="
                                'text-3xl font-title flex-shrink-0' +
                                (invalidFields.length &&
                                invalidFields.includes('politie_inspectie')
                                    ? ' text-red-700 error-field'
                                    : '')
                            "
                        >
                            <label for="politie_inspectie_0">
                                {{ questions.politie_inspectie }}</label
                            >
                        </p>
                        <div class="flex-grow mx-2 relative">
                            <div
                                class="absolute inset-0 flex items-center max-md:hidden"
                                aria-hidden="true"
                            >
                                <div
                                    :class="
                                        'w-full border-t' +
                                        (invalidFields.length &&
                                        invalidFields.includes(
                                            'politie_inspectie'
                                        )
                                            ? ' border-red-700 error-field'
                                            : ' border-gray-300')
                                    "
                                ></div>
                            </div>
                            <div class="relative lg:flex justify-end">
                                <radio-group
                                    :options="jaNee"
                                    @update:selectedValue="handleRadio"
                                    :selectedValue="
                                        letselschade.politie_inspectie
                                    "
                                    variable="politie_inspectie"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </Transition>
        </div>
    </div>
</template>

<script>
import Categories from "../../Partials/Categories.vue";
import RadioGroup from "@/Components/RadioGroup.vue";
import Checkbox from "@/Components/Checkbox.vue";

export default {
    name: "Step 1",
    components: {
        Categories,
        RadioGroup,
        Checkbox,
    },
    props: {
        letselschade: {
            type: Object,
            required: true,
        },
        questions: {
            type: Object,
            required: true,
        },
        invalidFields: {
            type: Array,
            required: true,
        },
    },
    created() {
        if (this.letselschade.category) {
            this.$nextTick(() => {
                this.scrollTo("step1-aansprakelijkheid");
            });
        }
    },
    emits: ["update:selectedValue", "scroll-to"],
    watch: {},
    data() {
        return {
            jaNee: [
                {
                    label: "Ja",
                    value: 1,
                },
                {
                    label: "Nee",
                    value: 0,
                },
            ],
            wanneer_ongevals: [
                "Korter dan 1 maand geleden",
                "Maximaal 1 jaar geleden",
                "Tussen 1 en 3 jaar geleden",
                "Langer dan 3 jaar geleden",
            ],
            manier_verhalen: [
                "Via rechtsbijstandsverzekering",
                "Via letselschadebureau",
                "Via advocaat",
                "Zelfstandig",
                "Op een andere manier",
            ],
            juridische_hulpen: [
                "Ja",
                "Ja, zo spoedig mogelijk",
                "Ik wil eerst meer informatie",
            ],
            interesse_overname_secondopinions: [
                "Een overname",
                "Een second opinion",
                "Meer informatie",
            ],
        };
    },
    methods: {
        handleRadio(model, value) {
            this.$emit("update:selectedValue", model, value);
        },
        scrollTo(div) {
            this.$emit("scroll-to", div);
        },
    },
};
</script>
