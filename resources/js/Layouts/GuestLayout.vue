<script setup>
import { Link } from "@inertiajs/vue3";
import MenuNav from "@/Layouts/MenuNav.vue";
import { computed } from "vue";
import { usePage } from "@inertiajs/vue3";

const page = usePage();
const year = computed(() => page.props.yearNow);
</script>

<template>
    <div class="wrapper">
        <header>
            <div class="header">
                <a href="/">
                    <img
                        src="/assets/images/logo/sm.png"
                        class="drop-shadow-lg"
                    />
                </a>
                <div>
                    <h1>
                        <a href="/" class="text-white text-xl font-black"
                            >Letselschade Claimen</a
                        >
                    </h1>
                    <h3 class="text-white">
                        Doe de letselschadetest en ontdek<br />de hoogte van uw
                        schadevergoeding
                    </h3>
                </div>
                <menu-nav />
            </div>
        </header>

        <main>
            <slot />
        </main>

        <footer class="py-12 px-24">
            <div class="text-white">
                <div class="footer">
                    <div class="flex gap-3 items-center">
                        <Link href="/">
                            <img
                                src="/assets/images/logo.png"
                                class="block mx-auto mb-3"
                            />
                        </Link>
                        <h1
                            class="font-logo sm:text-3xl relative"
                            data-text="Letselschade Claimen"
                        >
                            <Link href="/" class="">Letselschade Claimen</Link>
                        </h1>
                    </div>
                    <div class="col-span-2">
                        <p class="mb-3">
                            Alle rechten voorbehouden. Niets van deze website
                            mag zonder nadrukkelijke toestemming en duidelijke
                            bronvermelding geheel of gedeeltelijk worden
                            vermenigvuldigd in welke wijze dan ook.
                            Letselschadeclaimen.nl hanteert expliciet een
                            'zero-tolerance' beleid.
                        </p>
                        <p>
                            Copyright &copy; 2009-{{ year }}
                            Letselschadeclaimen.nl is een onderdeel van
                            Letselschadebegeleiding B.V, te Breda KvK.
                            Nummer.60256974
                        </p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</template>
