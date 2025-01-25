@extends('layout.web')

@section('content')
<div class="pt-12 pb-14 lg:ps-6">
  <div>
      <div class="lg:grid grid-cols-3 gap-8 place-items-center">
          <div class="max-lg:mb-5 col-span-2 max-lg:mx-5 me-14 ms-24">
              <h2 class="font-bold font-title text-amber-400 text-3xl mb-3">
                  Wat is letselschade?
              </h2>
              <p class="text-2xl text-white">
                Letselschade ontstaat wanneer u door een ongeval of andere gebeurtenis lichamelijke en/of geestelijke schade oploopt. Dit kan variëren van een whiplash of botbreuken tot psychisch letsel door een traumatische gebeurtenis. Ook als u denkt het valt wel mee, claim  toch want anders kunt u de schade later niet meer verhalen. Wij zorgen ervoor dat uw schade gemeld wordt en dat eventuele verjaring gestuit is.
              </p>
          </div>
          <div class="flex justify-end">
              <img
                  src="/assets/images/letselschade.jpg"
                  alt="Letselschade"
                  class="rounded-s-lg shadow-lg"
              />
          </div>
      </div>
  </div>
</div>
<div class="max-lg:px-5 p-24">
  <div>
      <h2
          class="text-center font-black text-white text-xl mb-5"
      >
          Welke schades kunt u verhalen?
      </h2>
        <div class="flex items-center">
            <ul class="flex flex-wrap gap-1 justify-center">
            @foreach ($claimables as $item)
            <li>
                <a
                    href="/letselschadeclaimen/{{ $item['slug'] }}"
                    class="px-5 py-3 block rounded-xl border-2 border-amber-400 text-white shadow-md hover:border-white"
                >{!! $item['name'] !!}</a>
            </li>
            @endforeach
            </ul>
        </div>
  </div>
</div>
<div class="max-lg:px-5 p-24 bg-white">
  <div>
      <div class="lg:grid grid-cols-3 gap-5 place-items-center">
          <div class="col-span-2">
              <h2 class="font-bold text-slate-700 text-3xl mb-3">
                  Wie kan u het beste helpen?
              </h2>
              <div class="relative inline-block">
                <p class="text-2xl">
                    Een gespecialiseerde letselschade-expert is essentieel voor een juiste inschatting en afhandeling van uw schadevergoeding. 
                </p>
                <p class="text-2xl">
                    Bij Letselschade Claimen heeft u contact wij u met deskundige letselschade-expert die u persoonlijk begeleidt tijdens het hele traject. 
                </p>
                  <div class="text-2xl">Onze experts zijn ingeschreven bij het 
                  <div class="py-1 cursor-pointer text-blue-600 underline inline-block relative group">
                    NIVRE
                    <!-- Popover Content -->
                    <div class="absolute left-1/2 transform -translate-x-1/2 z-10 hidden mt-2 w-72 p-3 bg-gray-100 border border-gray-200 rounded-md shadow-lg group-hover:block">
                      <h4 class="font-bold text-slate-700 text-lg mb-2">Personenschade NIVRE</h4>
                      <p class="text-sm text-gray-700">
                        Het Register van de branche “Personenschade” bestaat uit gekwalificeerde experts die het proces begeleiden van letsel- en schade.
                      </p>
                    </div>
                  </div>.
                </div>
              </div>              
          </div>
          <div class="flex justify-end items-center">
              <img
                  src="/assets/images/expert.jpg"
                  alt="Letselschade"
                  class="border-4 border-white rounded-md shadow-lg rotate-1"
              />
          </div>
      </div>
  </div>
</div>
<div class="max-lg:px-5 p-24 bg-white">
  <div>
      <div class="lg:grid grid-cols-3 gap-5 place-items-center">
          <div class="flex items-center">
              <img
                  src="/assets/images/juridische.jpg"
                  alt="Letselschade"
                  class="border-4 border-white rounded-md shadow-lg -rotate-1"
              />
          </div>
          <div class="col-span-2">
              <h2 class="font-bold text-slate-700 text-3xl mb-3">
                Wat is juridische bijstand?
              </h2>
              <p class="text-2xl">Als u een letselschadeclaim heeft waarbij er een aansprakelijke tegenpartij is, dan zal de letselschade-expert in overleg met u bepalen dat er geen nota aan u wordt gestuurd, maar dat hij zijn honorarium op de verzekeringsmaatschappij van de schuldige zal verhalen. U hoeft dus geen dure advocaatkosten te betalen of voor te schieten. Dit  honorarium is een onderdeel van uw schadeclaim en wordt dan ook niet in mindering gebracht op uw schadevergoeding.
              </p>
          </div>
      </div>
  </div>
</div>
<div class="max-lg:px-5 p-24 bg-white">
  <div>
      <div class="lg:grid grid-cols-2 gap-5 place-items-center">
          <div>
              <h2 class="font-bold text-slate-700 text-3xl mb-3">
                  Hoe werkt het?
              </h2>
              <p class="text-2xl">
                U kunt door het invullen van de letselschade-test aangeven wat voor letsel u heeft opgelopen. Vervolgens neemt de  letselschade-expert  vrijblijvend contact met u op.  Indien u dit wenst komt de expert  bij u thuis langs om de situatie te bespreken en verder te overleggen hoe en welke schade hij voor u kan claimen. Onze letselschade-experts  voldoen aan de hoogste eisen  vakbekwaamheid en zijn geregistreerd bij het NIVRE.
              </p>
          </div>
          <div>
              <h2 class="font-bold text-slate-700 text-3xl mb-3">
                  Wat is de aard van uw ongeval?
              </h2>
              @include('pages.partials.categories')
          </div>
      </div>
  </div>
</div>
<div class="max-lg:px-5 p-24 bg-white">
  <div>
      <div class="lg:grid grid-cols-3 gap-5 place-items-center">
          <div>
              <img
                  src="/assets/images/waarom.jpg"
                  alt="Letselschade"
                  class="border-4 border-white rounded-md shadow-lg -rotate-1"
              />
          </div>
          <div class="col-span-2">
              <h2 class="font-bold text-slate-700 text-3xl mb-3">
                  Waarom Letselschade Claimen? <span class="flex gap-3 float-right m-3 text-yellow-600">
                    @for ($i = 0; $i < 5; $i++)
                    <i class="fa-solid fa-star"></i>
                    @endfor
                </span>
              </h2>
              <p class="text-2xl">
                Wij bieden een snelle, eenvoudige manier om uw letselschade te verhalen en facturen rechtstreeks aan de tegenpartij. Onze letselschade-expert staat klaar om u te helpen . Met de hoogste waardering van klant tevredenheid. 
              </p>
          </div>
      </div>
  </div>
</div>
@endsection