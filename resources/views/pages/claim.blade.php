@extends('layout.web')

@section('content')
<div class="pt-12 pb-14 px-6">
  <div class="container mx-auto">
      <div class="lg:grid grid-cols-3 gap-5">
          <div class="max-lg:mb-5 col-span-2 mx-24 p-24 bg-white rounded-xl">
              <h2
                  class="font-bold text-slate-700 text-3xl mb-3"
              >{!! $title !!}</h2>
              <div class="text-2xl mb-5" v-html="content">{!! $content !!}</div>
              <a
                  href="/letselschadeclaimen"
                  class="px-5 py-3 rounded border-3 border-slate-500 text-white shadow-md bg-gradient-to-br from-slate-500 to-sky-900 hover:from-slate-600 hover:to-sky-950 hover:border-slate-600 mb-3"
                  >Terug naar letselschadeclaimen</a
              >
          </div>
          <div class="">
              <ul>
                @foreach ($claimables as $item)
                  <li>
                      <a
                          href="{{ ('/letselschadeclaimen/' . $item['slug']) }}"
                          class="
                              {{ $item['slug'] === $slug
                                  ? 'from-slate-600 to-sky-950 '
                                  : 'from-slate-500 to-sky-900 ' }}px-5 py-3 block rounded border-3 border-slate-500 text-white shadow-md bg-gradient-to-br hover:from-slate-600 hover:to-sky-950 hover:border-slate-600 mb-3
                          "
                      >{!! $item['name'] !!}</a>
                  </li>
                @endforeach
              </ul>
          </div>
      </div>
  </div>
</div>
@endsection
