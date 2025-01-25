<template>
    <div class="py-10 max-md:px-5">
        <div class="">
            <h2 class="font-logo mb-2 text-3xl text-blue-900">
                Arbeidsongeschiktheid
            </h2>
            <p class="text-2xl">
                In dit onderdeel bekijken we een eventuele
                arbeidsongeschiktheid. Indien u door een ongeval gedeeltelijk of
                volledig arbeidsongeschikt raakt kan dit uiteraard nadelige
                gevolgen hebben voor uw inkomen en huishoudelijke situatie. Ook
                deze gevolgen van een ongeval kunnen geclaimd worden bij de
                tegenpartij.
            </p>
        </div>
        <div class="py-5">
            <div class="">
                <div class="border rounded-lg shadow-lg p-5 mb-8">
                    <p
                        :class="
                            'text-3xl font-title mb-3' +
                            (invalidFields.length &&
                            invalidFields.includes('arbeidsongeschiktheid')
                                ? ' text-red-700 error-field'
                                : '')
                        "
                    >
                        {{ questions.arbeidsongeschiktheid }}
                    </p>
                    <label
                        v-for="(ao, i) in arbeidsongeschiktheden"
                        :key="i"
                        :for="`ao_${i}`"
                        class="block mb-3 text-xl"
                    >
                        <checkbox
                            type="radio"
                            :checked="letselschade.arbeidsongeschiktheid === ao"
                            name="arbeidsongeschiktheid"
                            :value="ao"
                            :id="`ao_${i}`"
                            class="mr-3"
                            v-model:checked="letselschade.arbeidsongeschiktheid"
                            @change="() => scrollTo('step3-huis')"
                        />
                        {{ ao }}
                    </label>
                </div>

                <div
                    v-if="
                        letselschade.arbeidsongeschiktheid !== 'Geen' &&
                        letselschade.arbeidsongeschiktheid !== null
                    "
                >
                    <div class="lg:flex items-center mb-8">
                        <p
                            :class="
                                'text-3xl font-title flex-shrink-0' +
                                (invalidFields.length &&
                                invalidFields.includes('duur_ao')
                                    ? ' text-red-700 error-field'
                                    : '')
                            "
                        >
                            <label for="duur_ao_0">
                                {{ questions.duur_ao }}</label
                            >
                        </p>
                        <div class="flex-grow mx-2 relative">
                            <div
                                class="absolute inset-0 flex items-center max-md:hidden"
                                aria-hidden="true"
                            >
                                <div
                                    :class="
                                        'w-full border-t border-gray-300' +
                                        (invalidFields.length &&
                                        invalidFields.includes('duur_ao')
                                            ? ' border-red-700 error-field'
                                            : ' border-gray-300')
                                    "
                                ></div>
                            </div>
                            <div class="relative lg:flex justify-end">
                                <radio-group
                                    :options="jaNee"
                                    @update:selectedValue="handleRadio"
                                    :selectedValue="letselschade.duur_ao"
                                    variable="duur_ao"
                                />
                            </div>
                        </div>
                    </div>
                </div>

                <div
                    class="border rounded-lg shadow-lg p-5 mb-8"
                    id="step3-huis"
                >
                    <p
                        :class="
                            'text-3xl font-title mb-3' +
                            (invalidFields.length &&
                            invalidFields.includes('huishoudelijk')
                                ? ' text-red-700 error-field'
                                : '')
                        "
                    >
                        {{ questions.huishoudelijk }}
                    </p>
                    <label
                        v-for="(huis, i) in huishouden"
                        :key="i"
                        :for="`huis_${i}`"
                        class="block mb-3 text-xl"
                    >
                        <checkbox
                            type="radio"
                            :checked="letselschade.huishoudelijk === huis"
                            name="huishoudelijk"
                            :value="huis"
                            :id="`huis_${i}`"
                            class="mr-3"
                            v-model:checked="letselschade.huishoudelijk"
                            @change="() => scrollTo('step3-leeftijd')"
                        />
                        {{ huis }}
                    </label>
                </div>

                <div>
                    <div
                        class="lg:flex items-center mb-8"
                        id="step3-zelfstandig"
                    >
                        <p
                            :class="
                                'text-3xl font-title flex-shrink-0' +
                                (invalidFields.length &&
                                invalidFields.includes('zelfstandig')
                                    ? ' text-red-700 error-field'
                                    : '')
                            "
                        >
                            <label for="zelfstandig_0">
                                {{ questions.zelfstandig }}</label
                            >
                        </p>
                        <div class="flex-grow mx-2 relative">
                            <div
                                class="absolute inset-0 flex items-center max-md:hidden"
                                aria-hidden="true"
                            >
                                <div
                                    :class="
                                        'w-full border-t border-gray-300' +
                                        (invalidFields.length &&
                                        invalidFields.includes('zelfstandig')
                                            ? ' border-red-700 error-field'
                                            : ' border-gray-300')
                                    "
                                ></div>
                            </div>
                            <div class="relative lg:flex justify-end">
                                <radio-group
                                    :options="jaNee"
                                    @update:selectedValue="handleRadio"
                                    :selectedValue="letselschade.zelfstandig"
                                    variable="zelfstandig"
                                />
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <div
                        class="border rounded-lg shadow-lg p-5 mb-8"
                        id="step3-leeftijd"
                    >
                        <p
                            :class="
                                'text-3xl font-title mb-3' +
                                (invalidFields.length &&
                                invalidFields.includes('leeftijdsgroep')
                                    ? ' text-red-700 error-field'
                                    : '')
                            "
                        >
                            {{ questions.leeftijdsgroep }}
                        </p>
                        <label
                            v-for="(lg, i) in leeftijdsgroepen"
                            :key="i"
                            :for="`leeftijdsgroep_${i}`"
                            class="block mb-3 text-xl"
                        >
                            <checkbox
                                type="radio"
                                :checked="letselschade.leeftijdsgroep === lg"
                                name="leeftijdsgroep"
                                :value="lg"
                                :id="`leeftijdsgroep_${i}`"
                                class="mr-3"
                                v-model:checked="letselschade.leeftijdsgroep"
                            />
                            {{ lg }}
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Categories from "../../Partials/Categories.vue";
import RadioGroup from "@/Components/RadioGroup.vue";
import Checkbox from "@/Components/Checkbox.vue";

export default {
    name: "Step 3",
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
        invalidFields: {
            type: Array,
            required: true,
        },
        questions: {
            type: Object,
            required: true,
        },
    },
    created() {},
    emits: ["update:selectedValue", "scroll-to"],
    watch: {
        invalidFields(newValue, oldValue) {
            console.log(newValue);
        },
    },
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
            arbeidsongeschiktheden: [
                "Volledig",
                "Gedeeltelijk/ herstellend",
                "Geen",
            ],
            huishouden: [
                "Ja blijvend",
                "Ja langer dan 3 maanden",
                "Ja korter dan 3 maanden",
                "Nee",
            ],
            leeftijdsgroepen: [
                "Jonger dan 18",
                "Tussen 18 - 25",
                "Tussen 26 - 50",
                "Tussen 51 - 67",
                "Ouder dan 67",
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
