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
            }, { threshold: 0.2 });
            this.$nextTick(() => {
                this.$el.querySelectorAll('[data-step]').forEach(el => observer.observe(el));
            });
        }
    }"
    class="py-20 sm:py-28 bg-white overflow-hidden"
>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="font-display text-3xl sm:text-4xl lg:text-5xl font-bold text-primary-green text-center mb-4">
            {{ t('Perjalanan Kopi Kami', 'Our Coffee Journey') }}
        </h2>
        <div class="mx-auto w-16 h-0.5 bg-accent-gold rounded-full mb-16"></div>

        @php
            $steps = $timelineSteps->take(6)->sortBy('step_number');
        @endphp

        <div class="relative">
            <div class="absolute left-1/2 top-0 bottom-0 w-0.5 bg-accent-gold -translate-x-1/2 hidden md:block"></div>

            @foreach($steps as $index => $step)
                @php
                    $isLeft = $index % 2 === 0;
                @endphp

                <div
                    data-step="{{ $index }}"
                    x-show="visibleSteps.includes('{{ $index }}')"
                    x-transition:enter="transition-all duration-700 ease-out"
                    x-transition:enter-start="opacity-0 translate-y-10"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    class="relative flex items-start pb-16 last:pb-0 {{ $isLeft ? 'md:flex-row' : 'md:flex-row-reverse' }} flex-row"
                >
                    <div class="flex-1 hidden md:block"></div>

                    <div class="hidden md:flex items-center justify-center absolute left-1/2 -translate-x-1/2 z-10">
                        <div class="w-5 h-5 rounded-full bg-accent-gold border-4 border-white shadow-md"></div>
                    </div>

                    <div class="flex-1 pl-10 md:pl-0 {{ $isLeft ? 'md:pr-12 md:text-right' : 'md:pl-12' }}">
                        <div class="bg-light-green rounded-2xl p-6 sm:p-8">
                            <div class="flex items-center gap-3 mb-3 {{ $isLeft ? 'md:flex-row-reverse md:justify-start' : '' }}">
                                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-primary-green text-white font-display font-bold text-sm">
                                    {{ $step->step_number }}
                                </span>
                                <h3 class="font-display text-xl sm:text-2xl font-semibold text-primary-green">
                                    {{ t($step->title_id, $step->title_en) }}
                                </h3>
                            </div>
                            <p class="text-accent-gold font-semibold text-sm uppercase tracking-wider mb-3">
                                {{ t($step->subtitle_id, $step->subtitle_en) }}
                            </p>
                            <p class="text-brand-text/80 leading-relaxed text-sm sm:text-base">
                                {{ t($step->description_id, $step->description_en) }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="md:hidden relative pl-10 pb-16 last:pb-0">
                    <div class="absolute left-[17px] top-0 bottom-0 w-0.5 bg-accent-gold"></div>
                    <div class="absolute left-3 top-1.5 w-3 h-3 rounded-full bg-accent-gold border-2 border-white shadow z-10"></div>
                    <div
                        data-step="{{ $index }}-mobile"
                        x-show="visibleSteps.includes('{{ $index }}-mobile')"
                        x-transition:enter="transition-all duration-700 ease-out"
                        x-transition:enter-start="opacity-0 translate-y-10"
                        x-transition:enter-end="opacity-100 translate-y-0"
                    >
                        <div class="bg-light-green rounded-2xl p-5">
                            <div class="flex items-center gap-3 mb-3">
                                <span class="inline-flex items-center justify-center w-9 h-9 rounded-full bg-primary-green text-white font-display font-bold text-xs">
                                    {{ $step->step_number }}
                                </span>
                                <h3 class="font-display text-lg font-semibold text-primary-green">
                                    {{ t($step->title_id, $step->title_en) }}
                                </h3>
                            </div>
                            <p class="text-accent-gold font-semibold text-xs uppercase tracking-wider mb-2">
                                {{ t($step->subtitle_id, $step->subtitle_en) }}
                            </p>
                            <p class="text-brand-text/80 leading-relaxed text-sm">
                                {{ t($step->description_id, $step->description_en) }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
