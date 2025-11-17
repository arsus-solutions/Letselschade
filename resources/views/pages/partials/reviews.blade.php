<div>
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto">
            <!-- Section Header -->
            <div class="text-center mb-10">
                <h2 class="text-3xl md:text-4xl font-bold text-slate-800 mb-4">Wat onze cliënten zeggen</h2>
                <p class="text-lg text-slate-600">Lees de ervaringen van mensen die wij hebben geholpen</p>
            </div>

            <!-- Swiper Slider -->
            <div class="swiper reviewsSwiper">
                <div class="swiper-wrapper pb-12">
                    @foreach($reviews as $review)
                        <div class="swiper-slide">
                            <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 p-6 border-l-4 border-teal-500 h-full">
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
                        </div>
                    @endforeach
                </div>
                
                <!-- Navigation buttons -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                
                <!-- Pagination -->
                <div class="swiper-pagination"></div>
            </div>
        </div>
        <a href="{{ url('reviews') }}" class="mt-8 inline-block text-teal-600 hover:text-teal-800 font-medium">Bekijk alle reviews &rarr;</a>
    </div>
</div>

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<style>
    .swiper-button-next,
    .swiper-button-prev {
        color: #0d9488;
        width: 44px;
        height: 44px;
        background: white;
        border-radius: 50%;
        box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);
    }
    
    .swiper-button-next:after,
    .swiper-button-prev:after {
        font-size: 20px;
        font-weight: bold;
    }
    
    .swiper-button-next:hover,
    .swiper-button-prev:hover {
        background: #0d9488;
        color: white;
    }
    
    .swiper-pagination-bullet {
        background: #cbd5e1;
        opacity: 1;
        width: 12px;
        height: 12px;
    }
    
    .swiper-pagination-bullet-active {
        background: #0d9488;
    }
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const swiper = new Swiper('.reviewsSwiper', {
            slidesPerView: 1,
            spaceBetween: 20,
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                768: {
                    slidesPerView: 2,
                    spaceBetween: 24,
                }
            }
        });
    });
</script>
@endpush