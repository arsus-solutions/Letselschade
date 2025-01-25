@extends('layout.web')

@section('content')
    @include('pages.partials.banner')
    <div class="p-24 max-md:px-5">
        <p class="text-xl font-title text-white italic font-bold">
            Als u door een ongeval te maken krijgt met tijdelijk of blijvend letsel dan kan dat grote financiële gevolgen hebben. Het is dan verstandig om in contact te komen met een letselschade expert die de schade voor u gaat verhalen.
        </p>
    </div>
    <div class="p-24 bg-white">
        <div>
            <div class="lg:grid grid-cols-3 gap-5 place-items-center">
                <div class="max-lg:mb-5 col-span-2">
                    <h2 class="font-bold text-slate-700 text-3xl mb-3">
                        Wat te doen bij letselschade?
                    </h2>
                    <p class="text-2xl">
                        Door direct de
                        <a href="/letselschadetest"
                            >letselschadetest</a
                        >
                        in te vullen zet u de door u te vorderen schade
                        direct in werking. Zonder (verplichtingen) Er wordt
                        door ons een indicatie worden gegeven van de
                        letselschadevergoeding.
                    </p>
                    <p class="text-2xl">Wij geven u als belangrijke tip mee ook als u lichte klachten heeft toch te claimen. Immers, als de klachten over gaan dan is dit alleen maar prettig. Maar als de klachten erger worden dan hebben wij uw wettelijke rechten gereserveerd.</p>
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
                    <h2 class="font-bold text-3xl mb-3">
                        Ik ben niet tevreden over mijn huidige behandelaar
                    </h2>
                    <p class="text-2xl">
                        Het kan voorkomen dat uw letselschadezaak al in behandeling is bij een letselschade advocaat/jurist/specialist, letselschadekantoor of rechtsbijstandverzekering en dat u hier niet tevreden over bent. Vaak horen wij dat de communicatie slecht verloopt, de claim te lang duurt, het letselschadebedrag te laag is of dat er andere klachten zijn. U kunt ervoor kiezen om uw zaak over te laten nemen door een van onze letselschade-experts. Zij zullen het maximale uit uw claim halen en zorgen dat u krijgt waar u recht op heeft en dit op een prettige aanspreekbare manier.
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
                        U hoeft niets te betalen, omdat de juridische kosten geheel worden vergoed door de tegenpartij. Dit is in de Nederlandse wet zo geregeld. <br>Bij ons betaalt u geen vergoeding in welk geval dan ook.
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
@endsection