<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Letsleschade') }}</title>
        <link rel="icon" href="{{ url('assets/images/logo.png') }}" />

        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=AW-10859171119"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', 'AW-10859171119');
        </script>

        @if (session('success_msg'))
            <!-- Event snippet for Leadformulier indienen conversion page -->
            <script>
                gtag('event', 'conversion', {
                    'send_to': 'AW-11561362909/K7m6CLzNi4caEN3L8Ygr',
                    'value': 1.0,
                    'currency': 'EUR'
                });
            </script>
        @endif

        <!-- Fonts -->
        @vite(['resources/js/app.js', 'resources/sass/app.scss', 'resources/css/app.css'])
        @stack('styles')
    </head>
    <body class="font-sans antialiased bg-slate-50">
        <!-- Top Bar with Trust Indicators -->
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
                        <a href="tel:0612345678" class="font-semibold text-white hover:text-teal-400 transition-colors">06 123 456 78</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Header -->
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
                    @include('layout.navigation')
                </div>
            </div>
        </header>

        <!-- Main Content Wrapper -->
        <div class="min-h-screen bg-gradient-to-b from-slate-50 to-slate-100">
            @yield('banner')
            <main class="container mx-auto px-4 py-8 lg:py-12">
                @yield('content')
            </main>
        </div>

        <!-- Footer -->
        <footer class="bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 text-white relative overflow-hidden">
            <!-- Decorative Background Elements -->
            <div class="absolute inset-0 opacity-5">
                <div class="absolute top-0 left-1/4 w-96 h-96 bg-teal-500 rounded-full blur-3xl"></div>
                <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-orange-500 rounded-full blur-3xl"></div>
            </div>

            <div class="container mx-auto px-4 py-12 lg:py-16 relative z-10">
                <!-- Top Footer Section -->
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 mb-12">
                    <!-- Brand Column -->
                    <div class="lg:col-span-4">
                        <div class="flex items-center gap-4 mb-6">
                            <img
                                src="/assets/images/logo.png"
                                alt="Logo"
                                class="h-16 w-auto"
                            />
                            <div>
                                <h2 class="text-2xl font-bold text-white">
                                    Letselschade Claimen
                                </h2>
                                <p class="text-teal-400 text-sm font-semibold">Uw partner in letselschade</p>
                            </div>
                        </div>
                        
                        <p class="text-slate-300 mb-6 leading-relaxed">
                            Gespecialiseerd in het claimen van uw rechtmatige schadevergoeding. Met jarenlange ervaring en een persoonlijke aanpak zorgen wij voor het beste resultaat.
                        </p>

                        <!-- Trust Badges -->
                        <div class="flex flex-wrap gap-3 mb-6">
                            <div class="bg-white/10 backdrop-blur-sm px-4 py-2 rounded-lg border border-teal-500/30">
                                <span class="flex items-center gap-2 text-sm text-white">
                                    <i class="fa-solid fa-award text-teal-400"></i>
                                    <span>No Cure No Pay</span>
                                </span>
                            </div>
                            <div class="bg-white/10 backdrop-blur-sm px-4 py-2 rounded-lg border border-teal-500/30">
                                <span class="flex items-center gap-2 text-sm text-white">
                                    <i class="fa-solid fa-star text-orange-400"></i>
                                    <span>15+ jaar ervaring</span>
                                </span>
                            </div>
                        </div>

                        <a
                            href="{{ url('algemene-voorwaarden') }}"
                            class="inline-flex items-center gap-2 text-slate-400 hover:text-teal-400 transition-colors group"
                        >
                            <i class="fa-solid fa-file-contract group-hover:scale-110 transition-transform"></i>
                            <span class="border-b border-transparent group-hover:border-teal-400">Algemene voorwaarden</span>
                        </a>
                    </div>

                    <!-- Quick Links -->
                    <div class="lg:col-span-8">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                            <!-- Accident Types -->
                            <div>
                                <h3 class="text-lg font-bold mb-4 flex items-center gap-2 text-white">
                                    <div class="w-8 h-8 bg-gradient-to-br from-teal-500 to-cyan-600 rounded-lg flex items-center justify-center">
                                        <i class="fa-solid fa-triangle-exclamation text-white text-sm"></i>
                                    </div>
                                    Aard van ongeval
                                </h3>
                                <ul class="space-y-3">
                                    <li>
                                        <a href="letselschadetest/verkeer" class="group flex items-start gap-3 text-slate-300 hover:text-white transition-all">
                                            <i class="fa-solid fa-car-burst text-orange-400 mt-1 group-hover:scale-110 transition-transform"></i>
                                            <span class="group-hover:translate-x-1 transition-transform">Verkeersongeval</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="letselschadetest/bedrijf" class="group flex items-start gap-3 text-slate-300 hover:text-white transition-all">
                                            <i class="fa-solid fa-hard-hat text-orange-400 mt-1 group-hover:scale-110 transition-transform"></i>
                                            <span class="group-hover:translate-x-1 transition-transform">Bedrijfsongeval</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="letselschadetest/dier" class="group flex items-start gap-3 text-slate-300 hover:text-white transition-all">
                                            <i class="fa-solid fa-paw text-orange-400 mt-1 group-hover:scale-110 transition-transform"></i>
                                            <span class="group-hover:translate-x-1 transition-transform">Ongeval door dieren</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="letselschadetest/wegdek" class="group flex items-start gap-3 text-slate-300 hover:text-white transition-all">
                                            <i class="fa-solid fa-road text-orange-400 mt-1 group-hover:scale-110 transition-transform"></i>
                                            <span class="group-hover:translate-x-1 transition-transform">Ongeval door gebrek wegdek</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <!-- Claim Types -->
                            <div>
                                <h3 class="text-lg font-bold mb-4 flex items-center gap-2 text-white">
                                    <div class="w-8 h-8 bg-gradient-to-br from-orange-500 to-orange-600 rounded-lg flex items-center justify-center">
                                        <i class="fa-solid fa-hand-holding-dollar text-white text-sm"></i>
                                    </div>
                                    Schade verhalen
                                </h3>
                                <ul class="space-y-3">
                                    @foreach (__('claimables') as $i=>$item)
                                        @if ($i < 4)
                                            <li>
                                                <a href="/letselschadeclaimen/{{ $item['slug'] }}" class="group flex items-start gap-3 text-slate-300 hover:text-white transition-all">
                                                    <i class="fa-solid fa-circle-check text-teal-400 mt-1 group-hover:scale-110 transition-transform"></i>
                                                    <span class="group-hover:translate-x-1 transition-transform">{!! $item['name'] !!}</span>
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>

                            <!-- Contact Info -->
                            <div>
                                <h3 class="text-lg font-bold mb-4 flex items-center gap-2 text-white">
                                    <div class="w-8 h-8 bg-gradient-to-br from-teal-500 to-cyan-600 rounded-lg flex items-center justify-center">
                                        <i class="fa-solid fa-headset text-white text-sm"></i>
                                    </div>
                                    Contact
                                </h3>
                                <ul class="space-y-4">
                                    <li>
                                        <a href="tel:0612345678" class="group flex items-start gap-3 text-slate-300 hover:text-white transition-all">
                                            <i class="fa-solid fa-phone text-orange-400 mt-1"></i>
                                            <div>
                                                <div class="text-xs text-slate-400">Bel ons direct</div>
                                                <div class="font-semibold group-hover:text-orange-400 transition-colors">06 123 456 78</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="mailto:info@letselschadeclaimen.nl" class="group flex items-start gap-3 text-slate-300 hover:text-white transition-all">
                                            <i class="fa-solid fa-envelope text-teal-400 mt-1"></i>
                                            <div>
                                                <div class="text-xs text-slate-400">E-mail ons</div>
                                                <div class="font-semibold group-hover:text-teal-400 transition-colors">info@letselschadeclaimen.nl</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="flex items-start gap-3 text-slate-300">
                                        <i class="fa-solid fa-clock text-teal-400 mt-1"></i>
                                        <div>
                                            <div class="text-xs text-slate-400">Bereikbaar</div>
                                            <div class="font-semibold text-white">24/7</div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
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
                        <p class="text-sm text-slate-400 leading-relaxed">
                            Alle rechten voorbehouden. Niets van deze website mag zonder nadrukkelijke toestemming en duidelijke bronvermelding geheel of gedeeltelijk worden vermenigvuldigd in welke wijze dan ook. Letselschadeclaimen.nl hanteert expliciet een 'zero-tolerance' beleid.
                        </p>
                    </div>
                </div>

                <!-- Bottom Bar -->
                <div class="border-t border-slate-700/50 pt-8 text-center">
                    <p class="text-sm text-slate-400">
                        <i class="fa-regular fa-copyright mr-1"></i>
                        2009-{{ \Carbon\Carbon::now()->year }} 
                        <span class="text-white font-semibold mx-1">Letselschadeclaimen.nl</span>
                        is een onderdeel van
                        <span class="text-teal-400 font-semibold mx-1">Letselschadebegeleiding B.V</span>
                        <span class="hidden sm:inline">te Breda</span>
                        <span class="mx-2 text-slate-600">|</span>
                        KvK. Nummer 60256974
                    </p>
                </div>
            </div>
        </footer>

        <!-- Optional: Floating CTA Button -->
        <a href="/letselschadetest" class="fixed bottom-6 right-6 z-50 group">
            <div class="bg-gradient-to-r from-orange-500 to-orange-600 text-white px-6 py-4 rounded-full shadow-2xl flex items-center gap-3 hover:scale-105 transition-transform duration-300">
                <span class="font-bold hidden sm:inline">Start Gratis Test</span>
                <i class="fa-solid fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
            </div>
            <div class="absolute inset-0 bg-orange-500 rounded-full blur-xl opacity-50 animate-pulse"></div>
        </a>
        @stack('scripts')
    </body>
</html>