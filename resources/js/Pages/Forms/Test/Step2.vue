<template>
    <div class="py-10 max-md:px-5">
        <div class="">
            <h2 class="font-logo mb-2 text-3xl text-blue-900">Schade</h2>
            <p class="text-2xl">
                De gevolgen van een ongeval/letsel bepalen de hoogte van de
                schade. Met deze vragen krijgen we een globaal beeld van de
                schade.
            </p>
        </div>
        <div class="py-5 max-md:px-5">
            <div class="">
                <div class="lg:grid grid-cols-2 gap-5">
                    <div class="border rounded-lg shadow-lg p-5 mb-8">
                        <p
                            :class="
                                'text-3xl font-title mb-3' +
                                (invalidFields.length &&
                                invalidFields.includes('soort_letsel')
                                    ? ' text-red-700 error-field'
                                    : '')
                            "
                        >
                            {{ questions.soort_letsel }}
                        </p>
                        <label
                            v-for="(sl, i) in soort_letsels"
                            :key="i"
                            :for="`soort_letsel_${i}`"
                            class="block mb-3 text-xl"
                        >
                            <checkbox
                                type="radio"
                                :checked="letselschade.soort_letsel === sl"
                                name="soort_letsel"
                                :value="sl"
                                :id="`soort_letsel_${i}`"
                                class="mr-3"
                                v-model:checked="letselschade.soort_letsel"
                                @change="() => scrollTo('step2-omschrijving')"
                            />
                            {{ sl }}
                        </label>
                    </div>
                    <textarea
                        id="step2-omschrijving"
                        :class="
                            'w-full rounded mb-5 shadow-lg max-md:h-60' +
                            (invalidFields.length &&
                            invalidFields.includes('omschrijving_letsel')
                                ? ' border-red-700 error-field'
                                : ' border-slate-200')
                        "
                        placeholder="Omschrijf uw opgelopen letsel"
                        v-model="letselschade.omschrijving_letsel"
                    ></textarea>
                </div>

                <div class="lg:grid grid-cols-2 gap-5">
                    <div class="border rounded-lg shadow-lg p-5 mb-8">
                        <p
                            :class="
                                'text-3xl font-title mb-3' +
                                (invalidFields.length &&
                                invalidFields.includes('behandeling')
                                    ? ' text-red-700 error-field'
                                    : '')
                            "
                        >
                            {{ questions.behandeling }}
                        </p>
                        <label
                            v-for="(beh, i) in behandelingen"
                            :key="i"
                            :for="`behandeling_${i}`"
                            class="block mb-3 text-xl"
                        >
                            <checkbox
                                type="radio"
                                :checked="letselschade.behandeling === beh"
                                name="behandeling"
                                :value="beh"
                                :id="`behandeling_${i}`"
                                class="mr-3"
                                v-model:checked="letselschade.behandeling"
                                @change="() => scrollTo('step2-opgelopen')"
                            />
                            {{ beh }}
                        </label>
                    </div>
                    <div
                        class="border rounded-lg shadow-lg p-5 mb-8"
                        id="step2-opgelopen"
                    >
                        <p
                            :class="
                                'text-3xl font-title mb-3' +
                                (invalidFields.length &&
                                invalidFields.includes('opgelopen_schade')
                                    ? ' text-red-700 error-field'
                                    : '')
                            "
                        >
                            {{ questions.opgelopen_schade }}
                        </p>
                        <label
                            v-for="(os, i) in opgelopen_schades"
                            :key="i"
                            :for="`os_${i}`"
                            class="block mb-3 text-xl"
                        >
                            <checkbox
                                type="radio"
                                :checked="letselschade.opgelopen_schade === os"
                                name="opgelopen_schade"
                                :value="os"
                                :id="`os_${i}`"
                                class="mr-3"
                                v-model:checked="letselschade.opgelopen_schade"
                            />
                            {{ os }}
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Categories from "../../Partials/Categories.vue";
import Checkbox from "@/Components/Checkbox.vue";

export default {
    name: "Step 2",
    components: {
        Categories,
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
        scrollTo: {
            type: Function,
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
            soort_letsels: [
                "Licht (herstel korter dan 3 maanden)",
                "Middel",
                "Zwaar (herstel langer dan 6 maanden of blijvend)",
            ],
            behandelingen: [
                "Niet onder behandeling geweest",
                "1 keer of minimaal behandeld",
                "Nog onder behandeling",
            ],
            opgelopen_schades: [
                "Minder dan € 1.000,-",
                "€ 1.000,- tot € 10.000,-",
                "Meer dan € 10.000,-",
                "Geen idee",
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
