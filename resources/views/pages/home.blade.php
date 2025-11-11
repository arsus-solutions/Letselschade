@extends('layout.web')

@section('banner')
    @include('pages.partials.banner')
@endsection

@section('content')
    <div class="p-24 bg-white">
        <div>
            <div class="lg:grid grid-cols-3 gap-5 place-items-center">
                <div class="max-lg:mb-5 col-span-2">
                    <h2 class="font-bold text-slate-900 text-3xl mb-3 font-title">
                        Wat is Letselschade en Waarom De Test Doen?
                    </h2>
                    <p class="text-xl text-slate-700">
                        Een ongeval kan grote financiële gevolgen hebben, zeker als u te maken krijgt met tijdelijk of blijvend letsel. Het is belangrijk om snel actie te ondernemen. Door het invullen van de
                        <a href="/letselschadetest" class="text-teal-600 hover:text-teal-700 underline font-semibold">letselschadetest</a>
                        zet u direct de eerste stap naar het verhalen van uw schade. Wij geven u binnen enkele minuten een indicatie van uw mogelijke schadevergoeding – volledig gratis en vrijblijvend.
                    </p>
                    <h3 class="text-2xl font-title text-slate-900 mt-6">Waarom Nu Claimen, Zelfs Bij Lichte Klachten?</h3>
                    <p class="text-xl text-slate-700">Ook bij lichte klachten is het verstandig om een claim in te dienen. Als de klachten verdwijnen, is dat alleen maar goed. Maar als ze verergeren, heeft u uw rechten alvast veiliggesteld. Wacht dus niet en start vandaag nog met de test!</p>
                </div>
                <div class="flex items-center justify-end">
                    <img
                        src="/assets/images/bike.jpg"
                        alt="Letselschade"
                        class="border-4 border-white rounded-md shadow-lg lg:rotate-3"
                    />
                </div>
            </div>
        </div>
    </div>
    <div class="p-24 bg-white">
        <div class="container mx-auto">
            <div class="lg:grid grid-cols-3 gap-8 place-items-center">
                <div class="flex items-center">
                    <img
                        src="/assets/images/advice.jpg"
                        alt="Letselschade"
                        class="border-4 border-white rounded-md shadow-lg lg:-rotate-3"
                    />
                </div>
                <div class="col-span-2">
                    <h2 class="font-title text-slate-900 text-3xl mb-3">
                        Niet Tevreden met Uw Huidige Letselschadebehandelaar?
                    </h2>
                    <p class="text-2xl text-slate-700">
                        Bent u al in behandeling bij een andere letselschadespecialist, maar niet tevreden over hoe uw zaak verloopt? Misschien duurt het te lang, is het letselschadebedrag te laag, of is de communicatie onvoldoende. Wij kunnen uw zaak eenvoudig overnemen en ervoor zorgen dat u krijgt waar u recht op heeft – met heldere communicatie en maximale inzet.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="p-24 bg-white">
        <div class="container mx-auto">
            <div class="lg:grid grid-cols-3 gap-5 place-items-center">
                <div class="col-span-2">
                    <h2 class="font-bold text-slate-900 text-3xl mb-3">
                        Wat kost het?
                    </h2>
                    <p class="text-2xl text-slate-700">
                        Bij ons hoeft u <strong class="text-teal-600">niets te betalen</strong>. De juridische kosten worden volledig vergoed door de tegenpartij, zoals vastgelegd in de Nederlandse wet. U ontvangt de beste juridische hulp, zonder kosten of risico&rsquo;s voor u.
                    </p>
                </div>
                <img
                    src="/assets/images/free.jpg"
                    alt="Letselschade"
                    class="border-4 border-white rounded-md shadow-lg rotate-12"
                />
            </div>
        </div>
    </div>
    <div class="p-24 text-white">
        <h3 class="font-title text-3xl mb-3 text-center">
            <a href="{{ url('letselschadetest') }}" class="underline hover:text-teal-400 transition-colors">Start de Letselschadetest</a> nu en ontdek uw mogelijke schadevergoeding zonder enige verplichting. Het is makkelijk, snel en geheel gratis!
        </h3>
    </div>
@endsection