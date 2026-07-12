<section
    x-data="{
        images: [
            'https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?q=80&w=1200',
            'https://images.unsplash.com/photo-1447933601403-0c6688de566e?q=80&w=1200',
            'https://images.unsplash.com/photo-1509042239860-f550ce710b93?q=80&w=1200'
        ],
        activeSlide: 0,
        videoModalOpen: false,
        init() {
            setInterval(() => {
                this.activeSlide = (this.activeSlide + 1) % this.images.length;
            }, 5000);
        }
    }"
    class="relative min-h-screen overflow-hidden bg-black"
>
    @foreach ([
        'https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?q=80&w=1200',
        'https://images.unsplash.com/photo-1447933601403-0c6688de566e?q=80&w=1200',
        'https://images.unsplash.com/photo-1509042239860-f550ce710b93?q=80&w=1200'
    ] as $i => $img)
    <div
        class="absolute inset-0 bg-cover bg-center transition-opacity duration-1000"
        :class="activeSlide === {{ $i }} ? 'opacity-100' : 'opacity-0'"
        style="background-image: url('{{ $img }}')"
    ></div>
    @endforeach

    <div class="absolute inset-0 bg-gradient-to-r from-black/60 to-black/30"></div>

    <div class="relative z-10 flex flex-col min-h-screen">
        <div class="flex-1 flex flex-col items-center justify-center px-4 sm:px-6 text-center text-white">
            <span class="inline-block px-4 py-1.5 mb-6 text-xs font-medium tracking-[0.2em] uppercase border border-white/30 rounded-full">
                {{ t('Ekspor Kopi Spesialti B2B', 'B2B Specialty Coffee Export') }}
            </span>

            <h1 class="font-display text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-bold max-w-4xl leading-tight mb-4">
                {{ t('Kopi Nusantara spesialti murni, siap ke seluruh dunia.', 'Indonesian specialty coffee, ready for the world.') }}
            </h1>

            <p class="text-base sm:text-lg md:text-xl text-white/70 mb-10">
                Direct-Trade. Traceable. Competition Grade.
            </p>

            <div class="flex flex-col sm:flex-row gap-4 mb-20">
                <a
                    href="/catalog"
                    class="px-8 py-3.5 bg-primary-green hover:bg-primary-green/90 text-white font-semibold rounded-lg transition-all duration-300"
                >
                    {{ t('Lihat Katalog & Penawaran', 'View Catalog & Offerings') }}
                </a>
                <button
                    @click="videoModalOpen = true"
                    class="px-8 py-3.5 border border-accent-gold text-accent-gold hover:bg-accent-gold hover:text-white font-semibold rounded-lg transition-all duration-300"
                >
                    {{ t('Video Proses Roasting', 'Roasting Process Video') }}
                </button>
            </div>
        </div>

        <div class="pb-12 px-4 sm:px-6">
            <div class="grid grid-cols-3 gap-8 max-w-lg mx-auto">
                <div class="text-center">
                    <div class="text-2xl sm:text-3xl lg:text-4xl font-bold font-display text-white">8+</div>
                    <div class="text-xs sm:text-sm text-white/60 mt-1 tracking-wider uppercase">
                        {{ t('Lots Tersedia', 'Lots Available') }}
                    </div>
                </div>
                <div class="text-center border-x border-white/20">
                    <div class="text-2xl sm:text-3xl lg:text-4xl font-bold font-display text-white">88+</div>
                    <div class="text-xs sm:text-sm text-white/60 mt-1 tracking-wider uppercase">
                        {{ t('Skor SCA', 'SCA Score') }}
                    </div>
                </div>
                <div class="text-center">
                    <div class="text-2xl sm:text-3xl lg:text-4xl font-bold font-display text-white">
                        {{ t('Global', 'Global') }}
                    </div>
                    <div class="text-xs sm:text-sm text-white/60 mt-1 tracking-wider uppercase">
                        {{ t('Jangkauan Global', 'Global Reach') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div
        x-show="videoModalOpen"
        x-cloak
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-50 flex items-center justify-center bg-black/80 p-4"
        @click.self="videoModalOpen = false"
    >
        <div class="relative w-full max-w-4xl">
            <button
                @click="videoModalOpen = false"
                class="absolute -top-12 right-0 text-white/70 hover:text-white transition-colors"
                aria-label="Close modal"
            >
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
            <div class="aspect-video rounded-lg overflow-hidden shadow-2xl">
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
