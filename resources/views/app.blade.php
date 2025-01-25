<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title inertia>{{ config('app.name', 'Letsleschade') }}</title>
		<link rel="icon" href="{{ url('assets/images/logo.png') }}" />

        <!-- Google tag (gtag.js) --> 
        <script async src="https://www.googletagmanager.com/gtag/js?id=AW-11561362909"></script> 
        <script> 
            window.dataLayer = window.dataLayer || []; 
            function gtag(){
                dataLayer.push(arguments);
            } 
            gtag('js', new Date()); 
            gtag('config', 'AW-11561362909'); 
        </script> 

        <!-- Scripts -->
        @routes
        @vite(['resources/js/app.js', 'resources/sass/app.scss', "resources/js/Pages/{$page['component']}.vue"])
        @inertiaHead
    </head>
    <body class="font-sans antialiased bg-sky-950">
        @inertia
    </body>
</html>
