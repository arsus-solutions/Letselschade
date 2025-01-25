<template>
    <Head>
        <title>Letselschade</title>
        <meta
            name="description"
            content="Doe de Letselschade test en ontdek de hoogte van uw schadevergoeding"
        />
    </Head>
    <GuestLayout>
        <HomeBanner />
        <div class="py-10 max-md:px-5">
            <div class="container mx-auto">
                <p class="text-2xl font-title text-blue-900 italic font-bold">
                    Als u door een ongeval te maken krijgt met tijdelijk of
                    blijvend letsel dan kan dat grote financiële gevolgen
                    hebben. Het is dan verstandig om in contact te komen met een
                    letselschade expert die de schade voor u gaat verhalen.
                </p>
            </div>
        </div>
        <div class="pt-12 pb-14 px-6 bg-slate-300">
            <div class="container mx-auto">
                <div class="lg:grid grid-cols-3 gap-5">
                    <div class="max-lg:mb-5 col-span-2">
                        <h2 class="font-bold text-slate-700 text-3xl mb-3">
                            Wat te doen bij letselschade?
                        </h2>
                        <p class="text-2xl">
                            Door direct de
                            <Link href="/letselschadetest"
                                >letselschadetest</Link
                            >
                            in te vullen zet u de door u te vorderen schade
                            direct in werking. Zonder (verplichtingen) Er wordt
                            door ons een indicatie worden gegeven van de
                            letselschadevergoeding.
                        </p>
                    </div>
                    <div class="flex items-center justify-end">
                        <img
                            src="/assets/images/letselschade-na-ongeval.jpg"
                            alt="Letselschade"
                            class="border-4 border-white rounded-md shadow-lg lg:rotate-3"
                        />
                    </div>
                </div>
            </div>
        </div>
        <div class="py-16 px-6">
            <div class="container mx-auto">
                <h2 class="font-bold text-slate-700 text-3xl mb-3">
                    Ik ben niet tevreden over mijn huidige behandelaar
                </h2>
                <div class="lg:grid grid-cols-3 gap-8">
                    <div class="flex items-center">
                        <img
                            src="/assets/images/letselschadezaak-overnemen.jpg"
                            alt="Letselschade"
                            class="border-4 border-white rounded-md shadow-lg lg:-rotate-3"
                        />
                    </div>
                    <div class="col-span-2 flex items-center">
                        <p class="text-2xl">
                            Het kan voorkomen dat uw letselschadezaak al in
                            behandeling is bij een letselschade
                            advocaat/jurist/specialist, letselschadekantoor of
                            rechtsbijstandverzekering en dat u hier niet
                            tevreden over bent. Vaak horen wij dat de
                            communicatie slecht verloopt, de claim te lang
                            duurt, het letselschadebedrag te laag is of dat er
                            andere klachten zijn. U kunt ervoor kiezen om uw
                            zaak over te laten nemen door een van onze
                            letselschade-experts. Zij zullen het maximale uit uw
                            claim halen en zorgen dat u krijgt waar u recht op
                            heeft en dit op een prettige aanspreekbare manier.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-16 px-6 bg-slate-300">
            <div class="container mx-auto">
                <div class="lg:grid grid-cols-3 gap-5">
                    <div class="col-span-2">
                        <h2 class="font-bold text-slate-700 text-3xl mb-3">
                            Wat kost het?
                        </h2>
                        <p class="text-2xl">
                            U hoeft u niets te betalen, omdat de juridische
                            kosten geheel worden vergoed door de tegenpartij.
                            Dit is in de Nederlandse wet zo geregeld. Er zijn
                            echter een paar kantoren die gebruik maken van uw
                            kwetsbare situatie en die dan komen met de term no
                            cure no pay. Zij stellen dan voor dat als u een
                            vergoeding krijgt dat u dan een percentage aan hun
                            afstaat. Wij vinden het goed om u daarvoor te
                            waarschuwen. Bij ons betaald u geen vergoeding in
                            welk geval dan ook.
                        </p>
                    </div>
                    <div class="flex items-center justify-end">
                        <img
                            src="/assets/images/gratis-letselschade-claimen.jpg"
                            alt="Letselschade"
                            class="border-4 border-white rounded-md shadow-lg rotate-12"
                        />
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
    name: "Home",
    components: { Head, Link, HomeBanner, Categories, GuestLayout },
    data() {
        return {};
    },
};
</script>
