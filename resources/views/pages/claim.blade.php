@extends('layout.web')

@section('banner')
<div class="py-16 lg:py-20 bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900">
  <div class="container mx-auto px-6">
      <div class="max-w-4xl">
          <h1 class="text-4xl lg:text-5xl font-black text-white mb-4 leading-tight">
              {!! $title !!}
          </h1>
          <p class="text-xl text-slate-300">
              Alles wat u moet weten over het claimen van deze schade
          </p>
      </div>
  </div>
</div>
@endsection

@section('content')
<div class="py-12">
  <div class="container mx-auto px-6">
      <div class="lg:grid lg:grid-cols-12 gap-8">
          
          <!-- Main Content -->
          <div class="lg:col-span-8">
              <div class="bg-white rounded-2xl shadow-lg p-8 lg:p-12">
                  <!-- Content -->
                  <div class="prose prose-lg max-w-none">
                      <div class="text-xl text-slate-700 leading-relaxed space-y-4">
                          {!! $content !!}
                      </div>
                  </div>

                  <!-- Back Button -->
                  <div class="mt-12 pt-8 border-t border-slate-200">
                      <a
                          href="/letselschadeclaimen"
                          class="inline-flex items-center gap-2 px-6 py-3 bg-slate-100 text-slate-700 rounded-lg hover:bg-teal-500 hover:text-white transition-all duration-200 font-semibold group"
                      >
                          <i class="fa-solid fa-arrow-left group-hover:-translate-x-1 transition-transform"></i>
                          <span>Terug naar overzicht</span>
                      </a>
                  </div>
              </div>
          </div>

          <!-- Sidebar -->
          <div class="lg:col-span-4 mt-8 lg:mt-0">
              <div class="bg-white rounded-2xl shadow-lg p-6 sticky top-24">
                  <h3 class="text-xl font-bold text-slate-900 mb-4 flex items-center gap-2">
                      <i class="fa-solid fa-list-check text-teal-500"></i>
                      Alle schades
                  </h3>
                  <ul class="space-y-2">
                      @foreach ($claimables as $item)
                      <li>
                          <a
                              href="{{ '/letselschadeclaimen/' . $item['slug'] }}"
                              class="block px-4 py-3 rounded-lg font-medium transition-all duration-200 {{ $item['slug'] === $slug ? 'bg-teal-500 text-white shadow-md' : 'text-slate-700 hover:bg-teal-50 hover:text-teal-600' }}"
                          >
                              <i class="fa-solid fa-{{ $item['slug'] === $slug ? 'check-circle' : 'circle' }} mr-2"></i>
                              {!! $item['name'] !!}
                          </a>
                      </li>
                      @endforeach
                  </ul>

                  <!-- CTA in Sidebar -->
                  <div class="mt-6 pt-6 border-t border-slate-200">
                      <a
                          href="/letselschadetest"
                          class="block w-full px-6 py-4 bg-gradient-to-r from-orange-500 to-orange-600 text-white text-center font-bold rounded-lg hover:from-orange-600 hover:to-orange-700 transition-all duration-200 shadow-lg hover:shadow-xl"
                      >
                          <i class="fa-solid fa-clipboard-check mr-2"></i>
                          Start de test
                      </a>
                  </div>
              </div>
          </div>

      </div>
  </div>
</div>
@endsection