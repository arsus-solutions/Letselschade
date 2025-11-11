<script setup>
import { Link } from "@inertiajs/vue3";
import MenuNav from "@/Layouts/MenuNav.vue";
import { computed } from "vue";
import { usePage } from "@inertiajs/vue3";

const page = usePage();
const year = computed(() => page.props.yearNow);
</script>

<template>
    <div class="min-h-screen bg-gradient-to-b from-slate-50 to-slate-100">
        <!-- Top Bar -->
        <div class="bg-gradient-to-r from-slate-900 via-slate-800 to-slate-900 text-white py-2 border-b border-teal-500/20">
            <div class="container mx-auto px-4">
                <div class="flex flex-wrap items-center justify-between text-sm">
                    <div class="flex items-center gap-6">
                        <span class="flex items-center gap-2">
                            <i class="fa-solid fa-shield-halved text-teal-400"></i>
                            <span class="hidden sm:inline text-white">100% No Cure, No Pay</span>
                        </span>
                        <span class="flex items-center gap-2">
                            <i class="fa-solid fa-clock text-teal-400"></i>
                            <span class="hidden md:inline text-white">24/7 Bereikbaar</span>
                        </span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i class="fa-solid fa-phone text-orange-500"></i>
                        <a href="tel:0880767676" class="font-semibold text-white hover:text-teal-400 transition-colors">088 - 076 76 76</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Header -->
        <header class="bg-white shadow-md sticky top-0 z-50 border-b-4 border-teal-500">
            <div class="container mx-auto px-4">
                <div class="flex items-center justify-between">
                    <!-- Logo & Brand -->
                    <div class="flex items-center gap-4 lg:gap-6">
                        <a href="/" class="group flex-shrink-0">
                            <div class="relative">
                                <div class="absolute inset-0 bg-teal-500/20 rounded-full blur-xl group-hover:bg-teal-500/30 transition-all"></div>
                                <img
                                    src="/assets/images/logo/sm.png"
                                    alt="Letselschade Claimen Logo"
                                    class="h-14 lg:h-16 w-auto relative z-10 drop-shadow-lg transform group-hover:scale-105 transition-transform duration-300"
                                />
                            </div>
                        </a>
                        <div>
                            <h1 class="text-xl lg:text-2xl font-bold text-slate-900 leading-tight">
                                <a href="/" class="hover:text-teal-600 transition-colors">
                                    Letselschade Claimen
                                </a>
                            </h1>
                            <p class="text-sm lg:text-base text-slate-600 mt-0.5">
                                <i class="fa-solid fa-check-circle text-teal-500 mr-1"></i>
                                Gratis advies & maximale schadevergoeding
                            </p>
                        </div>
                    </div>

                    <!-- Navigation -->
                    <menu-nav />
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main>
            <slot />
        </main>

        <!-- Footer -->
        <footer class="mt-14 bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 text-white relative overflow-hidden">
            <!-- Decorative Background -->
            <div class="absolute inset-0 opacity-5">
                <div class="absolute top-0 left-1/4 w-96 h-96 bg-teal-500 rounded-full blur-3xl"></div>
                <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-orange-500 rounded-full blur-3xl"></div>
            </div>

            <div class="container mx-auto px-4 py-12 lg:py-16 relative z-10">
                <!-- Footer Content -->
                <div class="flex flex-col md:flex-row gap-8 items-start mb-8">
                    <div class="flex items-center gap-4">
                        <Link href="/">
                            <img
                                src="/assets/images/logo.png"
                                alt="Logo"
                                class="h-16 w-auto"
                            />
                        </Link>
                        <div>
                            <h2 class="text-2xl font-bold text-white">
                                <Link href="/">Letselschade Claimen</Link>
                            </h2>
                            <p class="text-teal-400 text-sm font-semibold">Uw partner in letselschade</p>
                        </div>
                    </div>
                </div>

                <!-- Legal Notice -->
                <div class="border-t border-slate-700/50 pt-8 mb-8">
                    <div class="bg-white/5 backdrop-blur-sm rounded-lg p-6 border border-slate-700/30">
                        <h4 class="text-sm font-bold text-white mb-3 flex items-center gap-2">
                            <i class="fa-solid fa-scale-balanced text-teal-400"></i>
                            Juridische informatie
                        </h4>
                        <p class="text-sm text-slate-400 leading-relaxed mb-4">
                            Alle rechten voorbehouden. Niets van deze website mag zonder nadrukkelijke toestemming en duidelijke bronvermelding geheel of gedeeltelijk worden vermenigvuldigd in welke wijze dan ook. Letselschadeclaimen.nl hanteert expliciet een 'zero-tolerance' beleid.
                        </p>
                        <p class="text-sm text-slate-400">
                            <i class="fa-regular fa-copyright mr-1"></i>
                            2009-{{ year }} 
                            <span class="text-white font-semibold mx-1">Letselschadeclaimen.nl</span>
                            is een onderdeel van
                            <span class="text-teal-400 font-semibold mx-1">Letselschadebegeleiding B.V</span>
                            te Breda
                            <span class="mx-2 text-slate-600">|</span>
                            KvK. Nummer 60256974
                        </p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</template>

<style scoped>
/* Add any additional scoped styles if needed */
</style>