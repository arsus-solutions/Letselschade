<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Letsleschade') }}</title>
		<link rel="icon" href="{{ url('assets/images/logo.png') }}" />

        <!-- Google tag (gtag.js) --> 
        <script async src="https://www.googletagmanager.com/gtag/js?id=AW-11561362909"></script> 
        <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'AW-11561362909'); </script> 

        @if (session('success_msg'))
            <!-- Event snippet for Leadformulier indienen conversion page --> 
            <script> 
                gtag('event', 'conversion', { 'send_to': 'AW-11561362909/K7m6CLzNi4caEN3L8Ygr', 'value': 1.0, 'currency': 'EUR' }); 
            </script> 
		@endif

        <!-- Fonts -->
        @vite(['resources/js/app.js', 'resources/sass/app.scss', 'resources/css/app.css'])
    </head>
    <body class="font-sans antialiased bg-sky-950">
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
                            <a
                                href="/"
                                class="text-xl font-black"
                                >Letselschade Claimen</a
                            >
                        </h1>
                        <h3 class="text-white">
                            Doe de letselschadetest en ontdek<br>de hoogte van uw
                            schadevergoeding
                        </h3>
                    </div>
                    @include('layout.navigation')
                </div>
            </header>
            <main>
                @yield('content')
            </main>
            <footer class="py-12 px-24">
                <div class="text-white">
                    <div class="footer">
                        <div>
                            <div class="flex items-center">
                                <a href="/">
                                    <img
                                        src="/assets/images/logo.png"
                                        class="block mx-auto mb-3"
                                    />
                                </a>
                                <h1
                                    class="font-logo sm:text-4xl relative"
                                >
                                    <a href="/" class="text-amber-400"
                                        >Letselschade Claimen</a
                                    >
                                </h1>
                            </div>
                            <a href="{{ url('algemene-voorwaarden') }}" class="text-slate-400">Algemene voorwaarden</a>
                        </div>
                        <div class="lg:flex gap-10">
                            <div class="max-lg:mb-5">
                                <p><strong>Aard van ongeval</strong></p>
                                <ul>
                                    <li>
                                        <a href="letselschadetest/1-verkeersongeval">Verkeersongeval</a>
                                    </li>
                                    <li>
                                        <a href="letselschadetest/2-bedrijfsongeval">Bedrijfsongeval</a>
                                    </li>
                                    <li>
                                        <a href="letselschadetest/5-dieren">Ongeval door dieren</a>
                                    </li>
                                    <li>
                                        <a href="letselschadetest/7-wegdek">Ongeval door gebrek wegdek</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="max-lg:mb-5">
                                <p><strong>Schade verhalen</strong></p>
                                <ul>
                                    @foreach (__('claimables') as $i=>$item)
                                    @if ($i < 4)
                                    <li>
                                        <a
                                            href="/letselschadeclaimen/{{ $item['slug'] }}"
                                            class="text-white"
                                        >{!! $item['name'] !!}</a>
                                    </li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div>
                            <p class="mb-3">
                                Alle rechten voorbehouden. Niets van deze website mag zonder nadrukkelijke toestemming en duidelijke bronvermelding geheel of gedeeltelijk worden vermenigvuldigd in welke wijze dan ook. Letselschadeclaimen.nl hanteert expliciet een 'zero-tolerance' beleid.
                            </p>
                        </div>
                    </div>
                    <p class="text-center mt-12">
                        Copyright &copy; 2009-{{ \Carbon\Carbon::now()->year }} Letselschadeclaimen.nl is een onderdeel van Letselschadebegeleiding B.V, te Breda KvK. Nummer.60256974
                    </p>
                </div>
            </footer>
        </div>
    </body>
</html>
