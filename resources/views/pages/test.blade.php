@extends('layout.web')

@section('content')
<div class="test lg:grid grid-cols-2 gap-5">
    <div class="px-14">
        <h2 class="text-3xl font-black">Start Hier om uw Letselschade te Claimen</h2>
        <p class="text-xl text-white">Met een paar eenvoudige vragen kunnen wij u helpen bepalen welke stappen u kunt nemen om uw letselschade <strong>gratis</strong> te verhalen. Selecteer eerst het type ongeval waarbij u betrokken was:</p>
        <div class="lg:flex gap-3 justify-start">
            <div
                class="block bg-white"
            >
                <h3><a href="{{ url('letselschadetest/1-verkeersongeval') }}" class="underline">Verkeersongeval</a></h3>
                <p>
                    Was u betrokken bij een verkeersongeval, inclusief incidenten in het openbaar vervoer?
                </p>
            </div>
            <div
                class="block text-white"
            >
            <h3><a href="{{ url('letselschadetest/2-bedrijfsongeval') }}" class="underline">Bedrijfsongeval</a></h3>
                <p>
                    Heeft u een ongeluk gehad tijdens het werk, of onderweg van of naar uw werk voor een werkgerelateerde taak?
                </p>
            </div>
        </div>
        <div class="mt-3 lg:flex gap-3">
            <div
                class="block text-white"
            >
            <h3><a href="{{ url('letselschadetest/5-dieren') }}" class="underline">Ongeval door dieren</a></h3>
                <p>
                    Bent u door een hond gebeten of betrokken bij een ongeval met een ander dier, zoals tijdens paardrijden?
                </p>
            </div>
            <div
                class="block bg-white"
            >
            <h3><a href="{{ url('letselschadetest/7-wegdek') }}" class="underline">Ongeval op wegdek</a></h3>
                <p>
                    Heeft u letsel opgelopen door een slecht onderhouden of gebrekkig wegdek?
                </p>
            </div>
        </div>
        <div
            class="mt-2 p-5 text-white rounded-lg 2xl:text-2xl font-title shadow-lg"
        >
            <p>
                Na uw keuze zullen wij enkele korte vragen stellen om u gericht advies te geven over de mogelijkheden om uw letselschade <strong>kosteloos</strong> te verhalen.
            </p>
        </div>
    </div>
    <div class="flex justify-end">
        <img
            src="/assets/images/accidentwork.jpg"
            alt="Letselschade"
            class="rounded-s-lg shadow-lg"
        />
    </div>
</div>

<div class="py-10 px-24 max-md:px-5">
  <div class="container mx-auto">
      <h2 class="font-logo mb-2 text-3xl">
          Aansprakelijkheid
      </h2>
      <p class="text-2xl text-white">
        Om uw claim in te dienen, kijken we naar de aansprakelijkheid. We onderzoeken de situatie van het ongeval en bepalen of er een aansprakelijke partij is op wie we de schade kunnen verhalen. Kies hieronder het type ongeval waarbij u betrokken was:
      </p>
  </div>
</div>
<div class="py-10 px-24 bg-white" id="step1-categories">
  <div class="container mx-auto">
      <h5
          class="font-black max-md:text-center mb-3"
          v-if="!letselschade.category"
      >
      Selecteer het type ongeval:
      </h5>
      @include('pages.partials.categories')
      <p class="mt-5 italic font-title text-lg">Door nu te kiezen, zet u de eerste stap richting uw schadevergoeding. Het is makkelijk, snel en geheel vrijblijvend!</p>
  </div>
</div>
@endsection