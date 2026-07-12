<section
    x-data="{
        counters: [
            { target: 15, current: 0, suffix: '', labelId: 'Negara Ekspor & Tujuan', labelEn: 'Destinations & Countries' },
            { target: 100, current: 0, suffix: '+', labelId: 'Petani Mitra', labelEn: 'Partner Farmers' },
            { target: 20, current: 0, suffix: '+', labelId: 'Lot Mikro Aktif', labelEn: 'Active Micro-Lots' },
            { target: 98, current: 0, suffix: '%', labelId: 'Kepuasan Mitra', labelEn: 'Partner Satisfaction' }
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
                        }, 30);
                    });
                }
            }, { threshold: 0.15 });
            observer.observe(this.$el);
        }
    }"
    class="py-20 sm:py-28 bg-white overflow-hidden"
>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header Text & Grid Split -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-start">
            
            <!-- Left Side: Story & Dark Green Stats Card -->
            <div class="space-y-8">
                <div class="space-y-3">
                    <span class="text-xs font-bold text-accent-gold uppercase tracking-widest block">
                        {{ t('Cerita Ekspor', 'EXPORT STORY') }}
                    </span>
                    <h2 class="font-display text-3xl sm:text-4xl lg:text-5xl font-bold text-primary-green leading-tight">
                        {{ t('Tanah Vulkanik Indonesia, Untuk Seluruh Dunia', 'Volcanic Soils of Indonesia, For the Entire World') }}
                    </h2>
                </div>

                <div class="space-y-6 text-brand-gray text-base leading-relaxed">
                    <p>
                        {{ t(
                            'Kami mencari, menilai, dan mengekspor lot mikro kopi terbaik dari Sumatera, Jawa Barat, dan Bali — bekerja langsung dengan pengelola kebun dan koperasi petani. Transparan, berkelanjutan, dan selalu dalam standar mutu kelas kompetisi.',
                            'We source, evaluate, and export the finest coffee micro-lots from Sumatra, West Java, and Bali — working directly with estate managers and farmer cooperatives. Transparent, sustainable, and always within competition-grade quality standards.'
                        ) }}
                    </p>
                    <p>
                        {{ t(
                            'Setiap wilayah memiliki keunikan mikro-klimat dan struktur tanah vulkanis subur yang memberi profil rasa khas yang tidak dapat ditemui di belahan dunia lain.',
                            'Each region possesses a unique microclimate and rich volcanic soil structure that yields distinctive flavor profiles found nowhere else in the world.'
                        ) }}
                    </p>
                </div>

                <!-- Overlapping Images Block -->
                <div class="grid grid-cols-12 gap-4 items-center pt-4">
                    <div class="col-span-8">
                        <div class="aspect-[4/3] rounded-2xl overflow-hidden shadow-lg relative">
                            <img
                                src="https://images.unsplash.com/photo-1511920170033-f8396924c348?q=80&w=800"
                                alt="{{ t('Pemrosesan Kopi', 'Coffee Processing') }}"
                                class="w-full h-full object-cover"
                                loading="lazy"
                            >
                        </div>
                    </div>
                    <div class="col-span-4 -ml-12 relative z-10">
                        <div class="aspect-square rounded-2xl overflow-hidden border-4 border-white shadow-xl">
                            <img
                                src="https://images.unsplash.com/photo-1509042239860-f550ce710b93?q=80&w=400"
                                alt="{{ t('Cangkir Kopi', 'Coffee Cup') }}"
                                class="w-full h-full object-cover"
                                loading="lazy"
                            >
                        </div>
                    </div>
                </div>

                <!-- Dark Green Counters Band (Matching the Photo's Dark Band) -->
                <div class="bg-primary-green rounded-2xl p-8 shadow-xl text-white grid grid-cols-2 sm:grid-cols-4 gap-6">
                    <template x-for="(counter, index) in counters" :key="index">
                        <div class="text-center space-y-1">
                            <div class="font-display text-3xl sm:text-4xl font-extrabold text-accent-gold">
                                <span x-text="counter.current"></span><span x-text="counter.suffix"></span>
                            </div>
                            <div class="text-[10px] font-bold text-white/70 uppercase tracking-wider leading-snug">
                                <span x-text="appLocale === 'en' ? counter.labelEn : counter.labelId"></span>
                            </div>
                        </div>
                    </template>
                </div>
            </div>

            <!-- Right Side: Standard Quality & Details -->
            <div class="space-y-12 lg:pl-4">
                
                <div class="bg-brand-bg border border-light-green rounded-3xl p-8 sm:p-10 space-y-8 shadow-sm">
                    <div class="border-b border-light-green pb-6">
                        <h3 class="font-display text-2xl font-bold text-primary-green">
                            {{ t('Standar Kopi Ekspor Kelas Dunia', 'World-Class Coffee Export Standards') }}
                        </h3>
                        <p class="text-xs text-brand-gray mt-1">
                            {{ t('Kopi spesialti yang disiapkan khusus untuk roastery global berstandar SCA.', 'Specialty coffee prepared specifically for global roasteries with SCA standards.') }}
                        </p>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
                        
                        <!-- Point 1 -->
                        <div class="space-y-3">
                            <div class="w-10 h-10 rounded-xl bg-primary-green/10 flex items-center justify-center text-primary-green text-xl font-bold shadow-sm">
                                🌱
                            </div>
                            <h4 class="font-display font-bold text-primary-green text-base">
                                {{ t('Tanah Vulkanik Subur', 'Rich Volcanic Soils') }}
                            </h4>
                            <p class="text-xs text-brand-gray leading-relaxed">
                                {{ t(
                                    'Ditanam di bawah naungan pohon pelindung di pegunungan vulkanis aktif yang kaya akan mineral organik tinggi.',
                                    'Grown under shade-trees on active volcanic mountains rich in high organic minerals.'
                                ) }}
                            </p>
                        </div>

                        <!-- Point 2 -->
                        <div class="space-y-3">
                            <div class="w-10 h-10 rounded-xl bg-primary-green/10 flex items-center justify-center text-primary-green text-xl font-bold shadow-sm">
                                🍒
                            </div>
                            <h4 class="font-display font-bold text-primary-green text-base">
                                {{ t('Hanya Ceri Merah', '100% Red Cherries Only') }}
                            </h4>
                            <p class="text-xs text-brand-gray leading-relaxed">
                                {{ t(
                                    'Petani memetik manual hanya ceri kopi merah matang sempurna demi menjaga konsistensi rasa buah manis alami.',
                                    'Farmers hand-pick only perfectly ripe red coffee cherries to preserve sweet, natural fruit flavor consistency.'
                                ) }}
                            </p>
                        </div>

                        <!-- Point 3 -->
                        <div class="space-y-3">
                            <div class="w-10 h-10 rounded-xl bg-primary-green/10 flex items-center justify-center text-primary-green text-xl font-bold shadow-sm">
                                🏆
                            </div>
                            <h4 class="font-display font-bold text-primary-green text-base">
                                {{ t('Kemurnian Mutu SCA', 'SCA Certified Quality') }}
                            </h4>
                            <p class="text-xs text-brand-gray leading-relaxed">
                                {{ t(
                                    'Setiap lot dikurasi langsung oleh Q-Grader berlisensi dengan skor minimal 88+ di lab standar SCA.',
                                    'Every lot is directly curated by licensed Q-Graders, with a minimum score of 88+ in SCA-standard labs.'
                                ) }}
                            </p>
                        </div>

                        <!-- Point 4 -->
                        <div class="space-y-3">
                            <div class="w-10 h-10 rounded-xl bg-primary-green/10 flex items-center justify-center text-primary-green text-xl font-bold shadow-sm">
                                📦
                            </div>
                            <h4 class="font-display font-bold text-primary-green text-base">
                                {{ t('Kelembapan Presisi', 'Precision Moisture') }}
                            </h4>
                            <p class="text-xs text-brand-gray leading-relaxed">
                                {{ t(
                                    'Kadar air terkunci presisi di angka 11-12% dan dilindungi kemasan GrainPro hermetis kedap udara selama pengapalan.',
                                    'Moisture content is locked at exactly 11-12% and protected by airtight GrainPro hermetic bags during shipping.'
                                ) }}
                            </p>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>
</section>
