@props([
    'timelineSteps' => collect(),
])

<section
    x-data="{
        visibleSteps: [],
        init() {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const index = entry.target.dataset.step;
                        if (!this.visibleSteps.includes(index)) {
                            this.visibleSteps.push(index);
                        }
                    }
                });
            }, { threshold: 0.15 });
            this.$nextTick(() => {
                this.$el.querySelectorAll('[data-step]').forEach(el => observer.observe(el));
            });
        }
    }"
    class="py-20 sm:py-28 bg-white overflow-hidden"
>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Section Header -->
        <div class="text-center mb-20 space-y-3">
            <span class="text-xs font-bold text-accent-gold uppercase tracking-widest block">
                {{ t('Alur Kerja & Ketertelusuran Ekspor', 'WORKFLOW & EXPORT TRACEABILITY') }}
            </span>
            <h2 class="font-display text-3xl sm:text-4xl lg:text-5xl font-extrabold text-primary-green">
                {{ t('Perjalanan Sourcing & Logistik', 'Sourcing & Logistics Journey') }}
            </h2>
            <p class="text-brand-gray text-base max-w-2xl mx-auto font-light">
                {{ t('Kargo Ekspor Kopi Premium', 'Premium Coffee Export Cargo Journey') }}
            </p>
            <div class="mt-4 mx-auto w-16 h-1 bg-accent-gold rounded-full"></div>
        </div>

        @php
            $steps = $timelineSteps->take(6)->sortBy('step_number');
        @endphp

        <div class="relative">
            <!-- Center Line for Large Screens -->
            <div class="absolute left-1/2 top-0 bottom-0 w-0.5 bg-accent-gold/40 -translate-x-1/2 hidden md:block"></div>

            @foreach($steps as $index => $step)
                @php
                    $isLeft = $index % 2 === 0;
                @endphp

                <!-- Desktop Step Layout -->
                <div
                    data-step="{{ $index }}"
                    x-show="visibleSteps.includes('{{ $index }}')"
                    x-transition:enter="transition duration-1000 cubic-bezier(0.16, 1, 0.3, 1)"
                    x-transition:enter-start="opacity-0 translate-y-16"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    class="relative flex items-start pb-20 last:pb-0 {{ $isLeft ? 'md:flex-row' : 'md:flex-row-reverse' }} flex-row"
                >
                    <div class="flex-1 hidden md:block"></div>

                    <!-- Step Badge Node on Center Line -->
                    <div class="hidden md:flex items-center justify-center absolute left-1/2 -translate-x-1/2 z-10">
                        <div class="w-6 h-6 rounded-full bg-accent-gold border-4 border-white shadow-md flex items-center justify-center">
                            <span class="w-1.5 h-1.5 rounded-full bg-white"></span>
                        </div>
                    </div>

                    <!-- Content Card Container -->
                    <div class="flex-1 pl-10 md:pl-0 {{ $isLeft ? 'md:pr-16 md:text-right' : 'md:pl-16' }}">
                        <div class="bg-brand-bg border border-light-green/40 hover:border-accent-gold/50 rounded-3xl p-8 shadow-sm hover:shadow-luxury transition-all duration-300">
                            <div class="flex items-center gap-3 mb-4 {{ $isLeft ? 'md:flex-row-reverse md:justify-start' : '' }}">
                                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-primary-green text-white font-display font-extrabold text-sm shadow-md shadow-primary-green/10">
                                    {{ $step->step_number }}
                                </span>
                                <h3 class="font-display text-lg sm:text-xl font-bold text-primary-green">
                                    {{ t($step->title_id, $step->title_en) }}
                                </h3>
                            </div>
                            <p class="text-accent-gold font-bold text-xs uppercase tracking-wider mb-3">
                                {{ t($step->subtitle_id, $step->subtitle_en) }}
                            </p>
                            <p class="text-brand-gray leading-relaxed text-xs sm:text-sm font-light">
                                {{ t($step->description_id, $step->description_en) }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Mobile Step Layout (Falls back cleanly) -->
                <div class="md:hidden relative pl-10 pb-16 last:pb-0">
                    <div class="absolute left-[17px] top-0 bottom-0 w-0.5 bg-accent-gold/30"></div>
                    <div class="absolute left-3 top-2.5 w-2.5 h-2.5 rounded-full bg-accent-gold border-2 border-white shadow-md z-10"></div>
                    <div
                        data-step="{{ $index }}-mobile"
                        x-show="visibleSteps.includes('{{ $index }}-mobile')"
                        x-transition:enter="transition-all duration-750 ease-out"
                        x-transition:enter-start="opacity-0 translate-y-10"
                        x-transition:enter-end="opacity-100 translate-y-0"
                    >
                        <div class="bg-brand-bg border border-light-green/30 rounded-2xl p-6">
                            <div class="flex items-center gap-3 mb-3">
                                <span class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-primary-green text-white font-display font-bold text-xs shadow-md">
                                    {{ $step->step_number }}
                                </span>
                                <h3 class="font-display text-base font-bold text-primary-green">
                                    {{ t($step->title_id, $step->title_en) }}
                                </h3>
                            </div>
                            <p class="text-accent-gold font-bold text-[10px] uppercase tracking-wider mb-2">
                                {{ t($step->subtitle_id, $step->subtitle_en) }}
                            </p>
                            <p class="text-brand-gray leading-relaxed text-xs font-light">
                                {{ t($step->description_id, $step->description_en) }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
