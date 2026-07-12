<section
    x-data="{
        counters: [
            { target: 100, current: 0, suffix: '+', labelId: 'petani' },
            { target: 8, current: 0, suffix: '+', labelId: 'lot' },
            { target: 12, current: 0, suffix: '+', labelId: 'negara' },
        ],
        observed: false,
        init() {
            const observer = new IntersectionObserver(([entry]) => {
                if (entry.isIntersecting && !this.observed) {
                    this.observed = true;
                    this.counters.forEach((counter) => {
                        let start = 0;
                        const step = Math.ceil(counter.target / 40);
                        const interval = setInterval(() => {
                            start += step;
                            if (start >= counter.target) {
                                start = counter.target;
                                clearInterval(interval);
                            }
                            counter.current = start;
                        }, 40);
                    });
                }
            }, { threshold: 0.3 });
            observer.observe(this.$el);
        }
    }"
    class="py-20 sm:py-28 bg-white"
>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">
            <div class="space-y-6">
                <h2 class="font-display text-3xl sm:text-4xl lg:text-5xl font-bold text-gray-900 leading-tight">
                    {{ t('Cerita di Balik Setiap Cangkir', 'The Story Behind Every Cup') }}
                </h2>

                <p class="text-base sm:text-lg text-gray-600 leading-relaxed">
                    {{ t('Nayaka Export Atelier lahir dari keyakinan bahwa kopi spesialti Indonesia bukan sekadar komoditas—ia adalah warisan budaya, sains, dan seni.', 'Nayaka Export Atelier was born from the belief that Indonesian specialty coffee is more than a commodity—it\'s heritage, science, and art.') }}
                </p>

                <p class="text-base sm:text-lg text-gray-600 leading-relaxed">
                    {{ t('Kami bekerja langsung dengan petani di dataran tinggi Gayo, Kintamani, Toraja, dan Jawa Barat.', 'We work directly with farmers in the highlands of Gayo, Kintamani, Toraja, and West Java.') }}
                </p>

                <p class="text-base sm:text-lg text-gray-600 leading-relaxed">
                    {{ t('Setiap lot mikro melewati kontrol mutu Q-Grader yang ketat, pengemasan hermetis, dan dokumentasi ketertelusuran penuh.', 'Every micro-lot passes strict Q-Grader quality control, hermetic packaging, and full traceability documentation.') }}
                </p>

                <div class="grid grid-cols-3 gap-6 pt-6">
                    <template x-for="(counter, index) in counters" :key="index">
                        <div class="text-center">
                            <div class="font-display text-3xl sm:text-4xl lg:text-5xl font-bold text-primary-green">
                                <span x-text="counter.current"></span><span x-text="counter.suffix"></span>
                            </div>
                            <div class="text-xs sm:text-sm text-accent-gold mt-1 tracking-wider uppercase font-semibold">
                                <span x-show="index === 0">{{ t('Petani Mitra', 'Partner Farmers') }}</span>
                                <span x-show="index === 1">{{ t('Lot Mikro Aktif', 'Active Micro-Lots') }}</span>
                                <span x-show="index === 2">{{ t('Negara Tujuan', 'Destination Countries') }}</span>
                            </div>
                        </div>
                    </template>
                </div>
            </div>

            <div class="relative">
                <div class="aspect-[4/5] rounded-2xl overflow-hidden shadow-xl">
                    <img
                        src="https://images.unsplash.com/photo-1509042239860-f550ce710b93?q=80&w=800"
                        alt="{{ t('Kopi Spesialti Indonesia', 'Indonesian Specialty Coffee') }}"
                        class="w-full h-full object-cover"
                        loading="lazy"
                    >
                </div>
                <div class="absolute -bottom-6 -left-6 w-24 h-24 bg-accent-gold/20 rounded-full blur-3xl hidden lg:block"></div>
                <div class="absolute -top-6 -right-6 w-32 h-32 bg-primary-green/10 rounded-full blur-3xl hidden lg:block"></div>
            </div>
        </div>
    </div>
</section>
