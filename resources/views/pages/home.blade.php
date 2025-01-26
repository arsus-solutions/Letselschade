@extends('layout.web')

@section('content')
    @include('pages.partials.banner')
    {{-- <div class="p-24 max-md:px-5 bg-white">
        <p class="text-xl font-title italic font-bold">
            Als u door een ongeval te maken krijgt met tijdelijk of blijvend letsel dan kan dat grote financiële gevolgen hebben. Het is dan verstandig om in contact te komen met een letselschade expert die de schade voor u gaat verhalen.
        </p>
    </div> --}}
    <div class="p-24 bg-white">
        <div>
            <div class="lg:grid grid-cols-3 gap-5 place-items-center">
                <div class="max-lg:mb-5 col-span-2">
                    <h2 class="font-bold text-3xl mb-3 font-title">
                        Wat is Letselschade en Waarom De Test Doen?
                    </h2>
                    <p class="text-xl">
                        Een ongeval kan grote financiële gevolgen hebben, zeker als u te maken krijgt met tijdelijk of blijvend letsel. Het is belangrijk om snel actie te ondernemen. Door het invullen van de
                        <a href="/letselschadetest"
                            >letselschadetest</a
                        >
                        zet u direct de eerste stap naar het verhalen van uw schade. Wij geven u binnen enkele minuten een indicatie van uw mogelijke schadevergoeding – volledig gratis en vrijblijvend.
                    </p>
                    <h3 class="text-2xl font-title">Waarom Nu Claimen, Zelfs Bij Lichte Klachten?</h3>
                    <p class="text-xl">Ook bij lichte klachten is het verstandig om een claim in te dienen. Als de klachten verdwijnen, is dat alleen maar goed. Maar als ze verergeren, heeft u uw rechten alvast veiliggesteld. Wacht dus niet en start vandaag nog met de test!</p>
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
                    <h2 class="font-title text-3xl mb-3">
                        Niet Tevreden met Uw Huidige Letselschadebehandelaar?
                    </h2>
                    <p class="text-2xl">
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
                    <h2 class="font-bold text-slate-700 text-3xl mb-3">
                        Wat kost het?
                    </h2>
                    <p class="text-2xl">
                        Bij ons hoeft u <strong>niets te betalen</strong>. De juridische kosten worden volledig vergoed door de tegenpartij, zoals vastgelegd in de Nederlandse wet. U ontvangt de beste juridische hulp, zonder kosten of risico&rsquo;s voor u.
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
            <a href="{{ url('letselschadetest') }}" class="underline">Start de Letselschadetest</a> nu en ontdek uw mogelijke schadevergoeding zonder enige verplichting. Het is makkelijk, snel en geheel gratis!
        </h3>
    </div>
@endsection