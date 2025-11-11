<div class="banner bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 py-16 lg:py-20">
  <div class="container mx-auto px-6">
    <div class="lg:grid lg:grid-cols-2 gap-12 items-center">
      
      <!-- Left Column: Content -->
      <div>
        <!-- Main Heading -->
        <h1 class="text-4xl lg:text-5xl font-black text-white mb-4 leading-tight">
          Start de letselschadetest
        </h1>
        <p class="text-xl text-slate-300 mb-8">
          Ontdek binnen enkele minuten wat uw schadevergoeding kan zijn. Volledig gratis en vrijblijvend.
        </p>

        <!-- Benefits List with Better Spacing -->
        <div class="space-y-4 mb-10">
          <div class="flex items-start gap-3">
            <div class="flex-shrink-0 w-8 h-8 rounded-full bg-teal-500/20 flex items-center justify-center">
              <i class="fa-solid fa-bolt text-teal-400 text-sm"></i>
            </div>
            <div class="text-white">
              <strong class="text-teal-400">Snel</strong> - Onze letselschade-expert neemt direct contact met u op.
            </div>
          </div>

          <div class="flex items-start gap-3">
            <div class="flex-shrink-0 w-8 h-8 rounded-full bg-teal-500/20 flex items-center justify-center">
              <i class="fa-solid fa-check-circle text-teal-400 text-sm"></i>
            </div>
            <div class="text-white">
              <strong class="text-teal-400">Makkelijk</strong> - Slechts een paar korte vragen.
            </div>
          </div>

          <div class="flex items-start gap-3">
            <div class="flex-shrink-0 w-8 h-8 rounded-full bg-teal-500/20 flex items-center justify-center">
              <i class="fa-solid fa-envelope text-teal-400 text-sm"></i>
            </div>
            <div class="text-white">
              <strong class="text-teal-400">Direct resultaat</strong> - Ontvang de uitslag direct via e-mail.
            </div>
          </div>

          <div class="flex items-start gap-3">
            <div class="flex-shrink-0 w-8 h-8 rounded-full bg-teal-500/20 flex items-center justify-center">
              <i class="fa-solid fa-shield-halved text-teal-400 text-sm"></i>
            </div>
            <div class="text-white">
              <strong class="text-teal-400">Gratis en vrijblijvend</strong> - Geen verplichtingen, enkel advies op maat.
            </div>
          </div>

          <div class="flex items-start gap-3">
            <div class="flex-shrink-0 w-8 h-8 rounded-full bg-teal-500/20 flex items-center justify-center">
              <i class="fa-solid fa-map-location-dot text-teal-400 text-sm"></i>
            </div>
            <div class="text-white">
              <strong class="text-teal-400">Landelijke dekking</strong> - Wij staan overal in Nederland voor u klaar.
            </div>
          </div>
        </div>

        <!-- Subheading for Categories -->
        <h3 class="text-lg font-semibold text-white mb-4">
          Kies uw ongevalstype om te beginnen:
        </h3>
        
        @include('pages.partials.categories')
      </div>

      <!-- Right Column: Image -->
      <div class="flex justify-center lg:justify-end mt-8 lg:mt-0">
        <div class="relative">
          <div class="absolute inset-0 bg-teal-500/20 rounded-2xl blur-3xl"></div>
          <img
            src="/assets/images/bedrijfsongeval.png"
            alt="Letselschade Test"
            class="relative rounded-2xl shadow-2xl border-4 border-white/10 max-w-full h-auto"
          />
        </div>
      </div>

    </div>
  </div>
</div>