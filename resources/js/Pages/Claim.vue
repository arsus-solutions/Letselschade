<template>
    <Head>
        <title>Letselschade Claimen</title>
        <meta name="description" content="Letselschade description" />
    </Head>
    <GuestLayout>
        <div class="pt-12 pb-14 px-6">
            <div class="container mx-auto">
                <div class="lg:grid grid-cols-3 gap-5">
                    <div class="max-lg:mb-5 col-span-2">
                        <h2 class="font-bold text-slate-700 text-3xl mb-3">
                            Wat is letselschade?
                        </h2>
                        <p class="text-2xl">
                            Letselschade ontstaat wanneer u door een ongeval of
                            andere gebeurtenis lichamelijke en/of geestelijke
                            schade oploopt. Dit kan variëren van een whiplash of
                            botbreuken tot psychisch letsel door een
                            traumatische gebeurtenis.
                        </p>
                    </div>
                    <div class="flex justify-end items-center">
                        <img
                            src="/assets/images/letselschade_persoon.jpg"
                            alt="Letselschade"
                            class="border-4 border-white rounded-md shadow-lg lg:rotate-3"
                        />
                    </div>
                </div>
            </div>
        </div>
        <div class="py-16 px-6 bg-slate-300">
            <div class="container mx-auto">
                <h2
                    class="text-right font-title font-bold text-slate-700 text-5xl mb-5"
                >
                    Welke schades kunt u verhalen?
                </h2>
                <div class="lg:grid grid-cols-3 gap-8">
                    <div>
                        <img
                            src="/assets/images/letselschade_botbreuk.jpg"
                            alt="Letselschade"
                            class="border-4 border-white rounded-md shadow-lg lg:-rotate-3"
                        />
                    </div>
                    <div class="col-span-2 flex items-center">
                        <ul class="flex flex-wrap gap-1 justify-center">
                            <li v-for="(item, k) in claimables" :key="k">
                                <a
                                    :href="`/letselschadeclaimen/${item.slug}`"
                                    class="px-5 py-3 block rounded border-3 border-slate-500 text-white shadow-md bg-gradient-to-br from-slate-500 to-sky-900 hover:from-slate-600 hover:to-sky-950 hover:border-slate-600"
                                    v-html="item.name"
                                ></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-16 px-6">
            <div class="container mx-auto">
                <div class="lg:grid grid-cols-3 gap-5">
                    <div class="col-span-2">
                        <h2 class="font-bold text-slate-700 text-3xl mb-3">
                            Wie kan u het beste helpen?
                        </h2>
                        <p class="text-2xl">
                            Een gespecialiseerde letselschade-expert is
                            essentieel voor een juiste inschatting en
                            afhandeling van uw schadevergoeding. Onze deskundige
                            experts begeleiden u persoonlijk tijdens het hele
                            traject. Onze experts zijn geregistreerd bij het
                            NiVRe
                        </p>
                    </div>
                    <div class="flex justify-end items-center">
                        <img
                            src="/assets/images/letselschade_juridisch.jpg"
                            alt="Letselschade"
                            class="border-4 border-white rounded-md shadow-lg rotate-1"
                        />
                    </div>
                </div>
            </div>
        </div>
        <div class="py-16 px-6 bg-slate-300">
            <div class="container mx-auto">
                <div class="lg:grid grid-cols-3 gap-5">
                    <div class="flex items-center">
                        <img
                            src="/assets/images/gratis-letselschade-claimen.jpg"
                            alt="Letselschade"
                            class="border-4 border-white rounded-md shadow-lg -rotate-1"
                        />
                    </div>
                    <div class="col-span-2">
                        <h2 class="font-bold text-slate-700 text-3xl mb-3">
                            Wat kost juridische bijstand?
                        </h2>
                        <p class="text-2xl">
                            Als u een letselschadeclaim heeft waarbij er een
                            aansprakelijke tegenpartij is, dan zal de
                            letselschade-expert in overleg met u bepalen dat er
                            geen nota aan u wordt gestuurd, maar dat hij zijn
                            honorarium op de schuldige of diens
                            verzekeringsmaatschappij zal verhalen van de
                            schuldige. U hoeft dus geen dure advocaatkosten te
                            betalen of voor te schieten. Dit honorarium is
                            onderdeel van uw schadeclaim en wordt dan ook niet
                            in mindering gebracht op uw schadevergoeding.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-16 px-6">
            <div class="container mx-auto">
                <div class="lg:grid grid-cols-2 gap-5">
                    <div>
                        <h2 class="font-bold text-slate-700 text-3xl mb-3">
                            Hoe werkt het?
                        </h2>
                        <p class="text-2xl">
                            U kunt door het invullen van de letselschadetest
                            aangeven wat voor letsel u heeft opgelopen.
                            Vervolgens neemt de letselschade-expert contact met
                            u op. Indien u dit wenst komt de expert bij u thuis
                            langs om de situatie te bespreken en verder te
                            overleggen hoe en welke schade hij voor u kan
                            claimen. Onze experts hebben voldoen aan de hoogste
                            eisen van vakbekwaamheid en zijn geregestreerd bij
                            het NiVRE.
                        </p>
                    </div>
                    <div>
                        <h2 class="font-bold text-slate-700 text-3xl mb-3">
                            Wat is de aard van uw ongeval?
                        </h2>
                        <Categories />
                    </div>
                </div>
            </div>
        </div>
        <div class="py-16 px-6 bg-slate-300">
            <div class="container mx-auto">
                <div class="lg:grid grid-cols-3 gap-5">
                    <div>
                        <img
                            src="/assets/images/letselschade_rolstoel.jpg"
                            alt="Letselschade"
                            class="border-4 border-white rounded-md shadow-lg -rotate-1"
                        />
                    </div>
                    <div class="col-span-2">
                        <h2 class="font-bold text-slate-700 text-3xl mb-3">
                            Waarom Letselschade Claimen?
                        </h2>
                        <p class="text-2xl">
                            Wij bieden een snelle, eenvoudige manier om uw
                            letselschade te verhalen en facturereren
                            rechtstreeks aan de tegenpartij. Onze
                            gespecialiseerde experts staan klaar om u te helpen
                            en voldoen aan de hoogste eisen van vakbekwaamheid.
                        </p>
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
    name: "Claim",
    components: { Head, Link, HomeBanner, Categories, GuestLayout },
    props: {
        claimables: {
            type: Array,
            required: true,
        },
    },
};
</script>
