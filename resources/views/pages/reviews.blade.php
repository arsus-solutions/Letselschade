@extends('layout.web')

@section('title', 'Reviews - Letselschade Claimen')

@section('banner')
<!-- Hero Section -->
    <div class="py-16 lg:py-20 bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900">
        <div class="container mx-auto px-4">
            <div class="max-w-3xl mx-auto text-center">
                <h1 class="text-4xl lg:text-5xl font-black text-white mb-4 leading-tight">Wat onze cliënten zeggen</h1>
                <p class="text-xl text-slate-300">Lees de ervaringen van mensen die wij hebben geholpen bij hun letselschadezaak</p>
            </div>
        </div>
    </div>
@endsection

@section('content')
<div class="bg-slate-50">
    <!-- Reviews List -->
    <div class="container mx-auto px-4 py-12">
        <div class="max-w-4xl mx-auto">
            @if($reviews->count() > 0)
                <div class="space-y-6">
                    @foreach($reviews as $review)
                        <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 p-6 border-l-4 border-teal-500">
                            <div class="flex items-start gap-4">
                                <!-- Avatar Circle -->
                                <div class="flex-shrink-0">
                                    <div class="w-12 h-12 bg-gradient-to-br from-teal-500 to-teal-600 rounded-full flex items-center justify-center text-white font-bold text-lg">
                                        {{ strtoupper(substr($review['name'], 0, 1)) }}
                                    </div>
                                </div>
                                
                                <!-- Review Content -->
                                <div class="flex-1">
                                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2 mb-3">
                                        <h3 class="text-lg font-semibold text-slate-800">{{ $review['name'] }}</h3>
                                        <span class="text-sm text-slate-500">{{ $review['date'] }}</span>
                                    </div>
                                    
                                    <!-- Star Rating -->
                                    <div class="flex gap-1 mb-3">
                                        @for($i = 0; $i < 5; $i++)
                                            <svg class="w-5 h-5 fill-current text-orange-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                            </svg>
                                        @endfor
                                    </div>
                                    
                                    <!-- Comment -->
                                    <p class="text-slate-700 leading-relaxed">{{ $review['comment'] }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-8">
                    {{ $reviews->links() }}
                </div>
            @else
                <div class="bg-white rounded-lg shadow-md p-8 text-center">
                    <p class="text-slate-600">Er zijn momenteel geen reviews beschikbaar.</p>
                </div>
            @endif
        </div>
    </div>

    <!-- CTA Section -->
    <div class="border-t-4 border-teal-500 py-12">
        <div class="container mx-auto px-4">
            <div class="max-w-3xl mx-auto text-center">
                <h2 class="text-3xl font-bold mb-4">Ook letselschade opgelopen?</h2>
                <p class="text-xl text-slate-800 mb-6">Laat ons u helpen, net zoals wij deze cliënten hebben geholpen.</p>
                <a href="{{ route('contact') }}" class="bg-gradient-to-r from-orange-500 to-orange-600 text-white font-bold rounded-lg hover:from-orange-600 hover:to-orange-700 transition-all duration-200 shadow-lg hover:shadow-xl whitespace-nowrap px-8 py-3">
                    Neem contact op
                </a>
            </div>
        </div>
    </div>
</div>
@endsection