@extends('layout.web')

@section('content')
<div class="lg:grid grid-cols-2 gap-5">
    <div class="p-14">
        <div class="flex gap-3 justify-start">
            <div
                class="p-5 bg-white rounded-lg 2xl:text-2xl font-title shadow-lg xl:inline-block xl:w-1/4 flex-grow"
            >
                <p>
                    Bent u betrokken geweest bij een
                    verkeersongeval? Of tijdens het openbaar
                    vervoer.
                </p>
            </div>
            <div
                class="p-5 rounded-lg text-white 2xl:text-2xl font-title shadow-lg xl:inline-block xl:w-1/4 flex-grow"
            >
                <p>
                    Heeft u een ongeluk gehad op het werk? Of van of
                    naar uw werk met een bepaalde opdracht?
                </p>
            </div>
        </div>
        <div class="mt-3 flex gap-3">
            <div
                class="mb-3 p-5 text-white rounded-lg 2xl:text-2xl font-title shadow-lg xl:inline-block xl:w-1/4 flex-grow"
            >
                <p>
                    Bent u door een hond gebeten of betrokken bij
                    een ander diergerelateerd ongeval, zoals
                    paardrijden?
                </p>
            </div>
            <div
                class="mb-3 p-5 bg-white rounded-lg 2xl:text-2xl font-title shadow-lg xl:inline-block xl:w-1/4 flex-grow"
            >
                <p>
                    Heeft u letsel opgelopen in de sportschool door
                    een defect apparaat?
                </p>
            </div>
        </div>
        <div
            class="mt-2 p-5 text-white rounded-lg 2xl:text-2xl font-title shadow-lg"
        >
            <p>
                Met een aantal korte vragen kunnen wij u adviseren
                over de mogelijkheden tot het gratis verhalen van uw
                opgelopen letselschade.
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
      <h2 class="font-logo mb-2 text-3xl text-blue-900">
          Aansprakelijkheid
      </h2>
      <p class="text-2xl text-white">
          In dit onderdeel kijken we naar de situatie van het ongeval en
          in hoeverre er een aansprakelijke tegenpartij bestaat op wie de
          schade verhaald kan worden.
      </p>
  </div>
</div>
<div class="py-10 px-24 bg-white" id="step1-categories">
  <div class="container mx-auto">
      <p
          class="font-black max-md:text-center mb-3"
          v-if="!letselschade.category"
      >
          Kies &eacute;&eacute;n van deze voorbeelden
      </p>
      @include('pages.partials.categories')
  </div>
</div>
@endsection