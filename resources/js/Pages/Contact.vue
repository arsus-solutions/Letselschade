<template>
    <Head>
        <title>Contact</title>
        <meta name="description" content="Letselschade description" />
    </Head>
    <GuestLayout>
        <div class="container mx-auto">
            <img
                src="/assets/images/pand-header.jpg"
                alt="Pand"
                class="mx-auto mt-8 border-8 -rotate-1 border-white shadow-xl"
            />
        </div>
        <div class="pt-12 pb-14 px-6">
            <div class="container mx-auto">
                <div class="lg:grid grid-cols-2 gap-5">
                    <div class="max-lg:mb-5">
                        <h2 class="font-bold text-slate-700 text-3xl mb-3">
                            Wanneer heb ik recht op een letselschadevergoeding?
                        </h2>
                        <p class="text-2xl">
                            Wilt u weten of u in aanmerking komt voor een
                            letselschadevergoeding? Dan kunt u het beste de
                            letselschade test invullen. Hierna zal een
                            letselschade-expert (kosteloos) bekijken wat de
                            mogelijkheden zijn voor het verhalen van de door uw
                            schade op de tegenpartij.
                        </p>
                        <p class="text-2xl">
                            Wij zijn een onafhankelijke organisatie en werken
                            met geregistreerde letselschade-experts.
                        </p>
                        <h2 class="font-bold text-slate-700 text-3xl mb-3">
                            Neem contact met ons op
                        </h2>
                        <p class="text-2xl">
                            Dit kunt u telefonisch doen, per e-mail, of u vult
                            de letselschade test in voor een indicatie van uw
                            letselschade/Smartengeld en wat precies de
                            juridische mogelijkheden zijn.
                        </p>
                        <p class="text-3xl text-green-900 mt-5">
                            <i class="fas fa-phone"></i> 088 0767676
                        </p>
                    </div>
                    <div>
                        <h3
                            class="text-3xl font-title text-center text-blue-900 font-bold"
                        >
                            Contact formulier
                        </h3>
                        <ContactForm />
                    </div>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>

<script>
import { Head, Link } from "@inertiajs/vue3";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import ContactForm from "./Forms/ContactForm.vue";

export default {
    name: "Home",
    components: { Head, Link, ContactForm, GuestLayout },
    data() {
        return {};
    },
};
</script>
