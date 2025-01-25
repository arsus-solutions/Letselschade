<template>
    <div class="py-10 max-md:px-5">
        <div class="">
            <h2 class="font-logo mb-2 text-3xl text-blue-900">
                Letselschade Test verstuurd!
            </h2>
            <p class="text-2xl mb-2">
                Bedankt voor het inzenden van uw gegevens over uw ongeval. Wij
                gaan zo spoedig mogelijk en zo zorgvuldig mogelijk uw situatie
                nader bekijken.
            </p>
            <p class="text-2xl">
                Een letselschade specialist/advocaat neemt daarna per mail of
                telefonisch contact op om u juridisch advies te geven. Wij
                wijzen er nogmaals op dat een gesprek vrijblijvend is en zonder
                kosten.
            </p>
        </div>
        <div class="py-5">
            <div class="">
                <div class="bg-white rounded-lg p-8 shadow-lg">
                    <h4 class="text-3xl font-title">Letselschade Test</h4>
                    <template
                        v-for="(item, index) in letselschadeArray"
                        :key="index"
                    >
                        <div
                            class="lg:grid grid-cols-2 gap-5 py-2 border-b border-slate-300"
                            v-if="item.value !== null && item.value !== ''"
                        >
                            <strong>{{ questions[item.key] }}</strong>
                            <span class="max-md:block">{{
                                item.value === 1
                                    ? "Ja"
                                    : item.value === 0
                                    ? "Nee"
                                    : item.value
                            }}</span>
                        </div>
                    </template>
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
        questions: {
            type: Object,
            required: true,
        },
    },
    created() {},
    data() {
        return {};
    },
    computed: {
        letselschadeArray() {
            return Object.entries(this.letselschade).map(([key, value]) => {
                return { key, value };
            });
        },
    },
    methods: {},
};
</script>
