<section
    x-data="{
        slides: [
            {
                titleId: 'Kebun Kopi di Ketinggian',
                titleEn: 'High-Elevation Coffee Estates',
                descId: 'Cari tahu bagaimana asal usul cita rasa luar biasa dari tanah vulkanik Indonesia.',
                descEn: 'Discover the volcanic origins behind the extraordinary flavor of Indonesian coffee.',
                image: 'https://images.unsplash.com/photo-1509042239860-f550ce710b93?q=80&w=800'
            },
            {
                titleId: 'Proses Pasca-Panen Unik',
                titleEn: 'Unique Post-Harvest Processes',
                descId: 'Fermentasi anaerobik terkontrol menghasilkan profil rasa buah tropis yang kaya.',
                descEn: 'Controlled anaerobic fermentation yields rich tropical fruit flavor profiles.',
                image: 'https://images.unsplash.com/photo-1447933601403-0c6688de566e?q=80&w=800'
            },
            {
                titleId: 'Uji Cita Rasa Q-Grader',
                titleEn: 'Strict Q-Grader Curation',
                descId: 'Setiap batch dievaluasi oleh pencicip berlisensi untuk menjamin skor SCA 88+.',
                descEn: 'Every batch is evaluated by licensed cuppers to guarantee an SCA score of 88+.',
                image: 'https://images.unsplash.com/photo-1514432324607-a09d9b4aefdd?q=80&w=800'
            }
        ],
        activeSlide: 0,
        videoModalOpen: false,
        next() {
            this.activeSlide = (this.activeSlide + 1) % this.slides.length;
        },
        prev() {
            this.activeSlide = (this.activeSlide - 1 + this.slides.length) % this.slides.length;
        },
        init() {
            setInterval(() => {
                this.next();
            }, 8000);
        }
    }"
    class="relative min-h-screen bg-gradient-to-b from-black via-primary-green/90 to-primary-green overflow-hidden flex flex-col justify-between"
>
    <!-- Background overlay image with dark tint -->
    <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?q=80&w=1600')] bg-cover bg-center opacity-10 mix-blend-overlay"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-32 pb-16 w-full my-auto">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <!-- Left Column: Content -->
            <div class="lg:col-span-7 text-left space-y-8">
                <span class="inline-flex items-center gap-2 px-4 py-1.5 text-xs font-semibold tracking-[0.2em] uppercase bg-accent-gold/10 border border-accent-gold/20 text-accent-gold rounded-full">
                    <span class="w-1.5 h-1.5 rounded-full bg-accent-gold animate-pulse"></span>
                    {{ t('Ekspor Kopi Spesialti B2B', 'B2B Specialty Coffee Export') }}
                </span>

                <h1 class="font-display text-4xl sm:text-5xl md:text-6xl font-bold text-white leading-[1.1] tracking-tight">
                    {{ t('Kopi Nusantara spesialti murni, siap ke seluruh dunia.', 'Indonesian specialty coffee, ready for the world.') }}
                </h1>

                <p class="text-base sm:text-lg text-white/80 leading-relaxed max-w-2xl font-light">
                    {{ t(
                        'Kami mendampingi roastery dan importir kopi di seluruh dunia — menghadirkan lot mikro pilihan langsung dari perkebunan Gayo, lereng vulkanis Batur, dan dataran tinggi Jawa Barat. Setiap biji melewati seleksi ketat, dikemas hermetis, dan siap dengan skor SCA 88+.',
                        'We partner with coffee roasteries and importers worldwide — bringing select micro-lots directly from Gayo highlands, volcanic slopes of Batur, and West Java mountains. Every bean passes strict selection, hermetically packaged, and ready with SCA 88+ score.'
                    ) }}
                </p>

                <div class="flex flex-wrap gap-4 pt-4">
                    <a
                        href="/catalog"
                        class="px-8 py-4 bg-accent-gold hover:bg-accent-gold/90 text-primary-green font-bold rounded-xl transition-all duration-300 shadow-lg shadow-accent-gold/20 text-sm tracking-wider uppercase"
                    >
                        {{ t('Lihat Katalog & Penawaran', 'View Catalog & Offerings') }}
                    </a>
                    <button
                        @click="videoModalOpen = true"
                        class="px-8 py-4 border border-white/30 hover:border-white text-white hover:bg-white/10 font-bold rounded-xl transition-all duration-300 text-sm tracking-wider uppercase inline-flex items-center gap-2"
                    >
                        <svg class="w-5 h-5 text-accent-gold" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd" />
                        </svg>
                        {{ t('Video Proses Roasting', 'Roasting Process Video') }}
                    </button>
                </div>

                <!-- Features list below buttons -->
                <div class="flex flex-wrap items-center gap-x-8 gap-y-3 pt-6 border-t border-white/10">
                    <div class="flex items-center gap-2 text-white/70 text-sm">
                        <svg class="w-4 h-4 text-accent-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                        </svg>
                        <span>{{ t('Setiap Lot Traceable', 'Every Lot Traceable') }}</span>
                    </div>
                    <div class="flex items-center gap-2 text-white/70 text-sm">
                        <svg class="w-4 h-4 text-accent-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                        </svg>
                        <span>{{ t('Kadar Air Terjaga', 'Controlled Moisture') }}</span>
                    </div>
                    <div class="flex items-center gap-2 text-white/70 text-sm">
                        <svg class="w-4 h-4 text-accent-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                        </svg>
                        <span>{{ t('Sampel DHL ke Seluruh Dunia', 'DHL Samples Worldwide') }}</span>
                    </div>
                </div>
            </div>

            <!-- Right Column: Interactive Card Slider -->
            <div class="lg:col-span-5 w-full">
                <div class="bg-white/10 backdrop-blur-md border border-white/10 rounded-3xl p-6 shadow-2xl relative">
                    <template x-for="(slide, idx) in slides" :key="idx">
                        <div
                            x-show="activeSlide === idx"
                            x-transition:enter="transition ease-out duration-500"
                            x-transition:enter-start="opacity-0 scale-95"
                            x-transition:enter-end="opacity-100 scale-100"
                            class="space-y-6"
                        >
                            <!-- Image Container -->
                            <div class="aspect-[4/3] rounded-2xl overflow-hidden relative group">
                                <img
                                    :src="slide.image"
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
                                    alt=""
                                >
                                <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent"></div>
                            </div>

                            <!-- Text Content -->
                            <div class="space-y-2 text-white">
                                <h3 class="font-display text-xl font-bold text-accent-gold" x-text="appLocale === 'en' ? slide.titleEn : slide.titleId"></h3>
                                <p class="text-sm text-white/80 leading-relaxed font-light min-h-[3rem]" x-text="appLocale === 'en' ? slide.descEn : slide.descId"></p>
                            </div>
                        </div>
                    </template>

                    <!-- Navigation Rows -->
                    <div class="flex items-center justify-between pt-6 border-t border-white/10 mt-6">
                        <!-- Dot Indicators -->
                        <div class="flex gap-2">
                            <template x-for="(slide, idx) in slides" :key="idx">
                                <button
                                    @click="activeSlide = idx"
                                    class="w-2.5 h-2.5 rounded-full transition-all duration-300"
                                    :class="activeSlide === idx ? 'bg-accent-gold scale-125' : 'bg-white/30 hover:bg-white/50'"
                                ></button>
                            </template>
                        </div>

                        <!-- Left / Right Arrows -->
                        <div class="flex gap-2">
                            <button
                                @click="prev()"
                                class="w-9 h-9 rounded-full border border-white/20 text-white hover:bg-white/15 hover:border-white/40 flex items-center justify-center transition-all"
                                aria-label="Previous slide"
                            >
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                </svg>
                            </button>
                            <button
                                @click="next()"
                                class="w-9 h-9 rounded-full border border-white/20 text-white hover:bg-white/15 hover:border-white/40 flex items-center justify-center transition-all"
                                aria-label="Next slide"
                            >
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- YouTube Video Modal -->
    <div
        x-show="videoModalOpen"
        x-cloak
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-50 flex items-center justify-center bg-black/95 p-4"
        @click.self="videoModalOpen = false"
    >
        <div class="relative w-full max-w-4xl shadow-2xl">
            <button
                @click="videoModalOpen = false"
                class="absolute -top-12 right-0 text-white/70 hover:text-white transition-colors p-2"
                aria-label="Close modal"
            >
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
            <div class="aspect-video rounded-2xl overflow-hidden bg-black border border-white/10">
                <iframe
                    src="https://www.youtube.com/embed/N6BJVM5tvnw"
                    class="w-full h-full"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen
                ></iframe>
            </div>
        </div>
    </div>
</section>

<!-- Stats Bar Section (White Background below dark Hero) -->
<section class="bg-white py-12 border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-5 gap-8">
            <div class="space-y-1">
                <div class="font-display text-3xl sm:text-4xl font-extrabold text-primary-green">12+</div>
                <div class="text-[11px] font-bold text-accent-gold uppercase tracking-wider">{{ t('Tahun Pengalaman', 'Years Export Experience') }}</div>
                <p class="text-xs text-brand-gray">{{ t('Melayani Jepang, AS & Uni Eropa', 'Serving Japan, USA & EU') }}</p>
            </div>
            <div class="space-y-1 md:border-l md:border-gray-100 md:pl-6">
                <div class="font-display text-3xl sm:text-4xl font-extrabold text-primary-green">85+</div>
                <div class="text-[11px] font-bold text-accent-gold uppercase tracking-wider">{{ t('Brand Mitra', 'Roastery Partners') }}</div>
                <p class="text-xs text-brand-gray">{{ t('Hubungan dagang langsung', 'Direct trade partnership') }}</p>
            </div>
            <div class="space-y-1 md:border-l md:border-gray-100 md:pl-6">
                <div class="font-display text-3xl sm:text-4xl font-extrabold text-primary-green">18+</div>
                <div class="text-[11px] font-bold text-accent-gold uppercase tracking-wider">{{ t('Origin Kopi', 'Coffee Origins') }}</div>
                <p class="text-xs text-brand-gray">{{ t('Tanah vulkanik terbaik', 'Premium volcanic soils') }}</p>
            </div>
            <div class="space-y-1 md:border-l md:border-gray-100 md:pl-6 col-span-1">
                <div class="font-display text-3xl sm:text-4xl font-extrabold text-primary-green">450+ Ton</div>
                <div class="text-[11px] font-bold text-accent-gold uppercase tracking-wider">{{ t('Kopi Terkapalkan', 'Coffee Shipped') }}</div>
                <p class="text-xs text-brand-gray">{{ t('100% kemasan hermetis', '100% hermetic packaging') }}</p>
            </div>
            <div class="space-y-1 md:border-l md:border-gray-100 md:pl-6 col-span-2 md:col-span-1">
                <div class="font-display text-3xl sm:text-4xl font-extrabold text-primary-green">88.5+</div>
                <div class="text-[11px] font-bold text-accent-gold uppercase tracking-wider">{{ t('Skor Cupping SCA', 'SCA Cupping Score') }}</div>
                <p class="text-xs text-brand-gray">{{ t('Lolos kurasi Q-Grader', 'Certified Q-Grader curations') }}</p>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        window.appLocale = '{{ app()->getLocale() }}';
    });
</script>
