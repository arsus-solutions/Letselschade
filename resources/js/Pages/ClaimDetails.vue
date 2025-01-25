<template>
    <Head>
        <title>Letselschade Claimen - {{ title }}</title>
        <meta name="description" content="Letselschade description" />
    </Head>
    <GuestLayout>
        <div class="pt-12 pb-14 px-6">
            <div class="container mx-auto">
                <div class="lg:grid grid-cols-3 gap-5">
                    <div class="max-lg:mb-5 col-span-2">
                        <h2
                            class="font-bold text-slate-700 text-3xl mb-3"
                            v-html="title"
                        ></h2>
                        <div class="text-2xl mb-5" v-html="content"></div>
                        <a
                            href="/letselschadeclaimen"
                            class="px-5 py-3 block rounded border-3 border-slate-500 text-white shadow-md bg-gradient-to-br from-slate-500 to-sky-900 hover:from-slate-600 hover:to-sky-950 hover:border-slate-600 mb-3 inline-block"
                            >Terug naar letselschadeclaimen</a
                        >
                    </div>
                    <div class="">
                        <ul>
                            <li v-for="(item, k) in claimables" :key="k">
                                <a
                                    :href="`/letselschadeclaimen/${item.slug}`"
                                    v-html="item.name"
                                    :class="
                                        (item.slug === slug
                                            ? 'from-slate-600 to-sky-950 '
                                            : 'from-slate-500 to-sky-900 ') +
                                        `px-5 py-3 block rounded border-3 border-slate-500 text-white shadow-md bg-gradient-to-br hover:from-slate-600 hover:to-sky-950 hover:border-slate-600 mb-3`
                                    "
                                ></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>

<script>
import { Head, Link } from "@inertiajs/vue3";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import HomeBanner from "./Partials/HomeBanner.vue";
import Categories from "./Partials/Categories.vue";

export default {
    name: "ClaimDetails",
    components: { Head, Link, HomeBanner, Categories, GuestLayout },
    props: {
        claimables: {
            type: Array,
            required: true,
        },
        title: {
            type: String,
            required: true,
        },
        slug: {
            type: String,
            required: true,
        },
        content: {
            type: String,
            required: true,
        },
    },
};
</script>
