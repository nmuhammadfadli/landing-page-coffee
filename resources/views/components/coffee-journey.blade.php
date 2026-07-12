@props([
    'timelineSteps' => collect(),
])

@php
    $steps = $timelineSteps->take(6)->sortBy('step_number');
@endphp

<section
    x-data="{
        visible: [],
        init() {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    const id = entry.target.dataset.step;
                    if (entry.isIntersecting && !this.visible.includes(id)) {
                        this.visible = [...this.visible, id];
                    }
                });
            }, { threshold: 0.15 });
            this.$nextTick(() => {
                this.$el.querySelectorAll('[data-step]').forEach(el => observer.observe(el));
            });
        }
    }"
    class="py-20 sm:py-28 bg-brand-bg overflow-hidden"
>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 space-y-3">
            <span class="text-xs font-bold text-accent-gold uppercase tracking-widest block">
                {{ t('Alur & Proses', 'PROCESS & WORKFLOW') }}
            </span>
            <h2 class="font-display text-3xl sm:text-4xl lg:text-5xl font-bold text-primary-green">
                {{ t('Perjalanan Kopi Kami', 'Our Coffee Journey') }}
            </h2>
            <p class="text-brand-gray text-base max-w-2xl mx-auto font-light">
                {{ t('Dari kebun hingga ke pelabuhan, setiap langkah dijaga mutunya.', 'From farm to port, every step is quality-controlled.') }}
            </p>
            <div class="mt-4 mx-auto w-16 h-1 bg-accent-gold rounded-full"></div>
        </div>

        <div class="relative">
            <div class="absolute left-1/2 top-0 bottom-0 w-0.5 bg-accent-gold/30 -translate-x-1/2 hidden md:block"></div>

            @foreach($steps as $index => $step)
                @php
                    $isLeft = $index % 2 === 0;
                    $stepId = (string) $step->id;
                @endphp

                <div
                    data-step="{{ $stepId }}"
                    class="relative flex items-start pb-16 last:pb-0 {{ $isLeft ? 'md:flex-row' : 'md:flex-row-reverse' }} flex-row"
                >
                    <div class="flex-1 hidden md:block"></div>

                    <div class="hidden md:flex items-center justify-center absolute left-1/2 -translate-x-1/2 z-10">
                        <div class="w-6 h-6 rounded-full bg-accent-gold border-4 border-white shadow-md flex items-center justify-center"
                             :class="visible.includes('{{ $stepId }}') ? 'scale-110' : ''">
                            <span class="w-2 h-2 rounded-full bg-white"></span>
                        </div>
                    </div>

                    <div class="flex-1 pl-10 md:pl-0 {{ $isLeft ? 'md:pr-14 md:text-right' : 'md:pl-14' }}">
                        <div
                            class="bg-white border border-light-green/30 hover:border-accent-gold/30 rounded-2xl p-6 sm:p-8 shadow-sm hover:shadow-luxury transition-all duration-700"
                            :class="visible.includes('{{ $stepId }}') ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'"
                        >
                            <div class="flex items-center gap-3 mb-3 {{ $isLeft ? 'md:flex-row-reverse md:justify-start' : '' }}">
                                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-primary-green text-white font-display font-bold text-sm shadow-md transition-all duration-500"
                                      :class="visible.includes('{{ $stepId }}') ? 'scale-100' : 'scale-75'">
                                    {{ $step->step_number }}
                                </span>
                                <h3 class="font-display text-xl sm:text-2xl font-bold text-primary-green">
                                    {{ t($step->title_id, $step->title_en) }}
                                </h3>
                            </div>
                            <p class="text-accent-gold font-semibold text-sm uppercase tracking-wider mb-3">
                                {{ t($step->subtitle_id, $step->subtitle_en) }}
                            </p>
                            <p class="text-brand-gray/80 leading-relaxed text-sm sm:text-base font-light">
                                {{ t($step->description_id, $step->description_en) }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="md:hidden relative pl-10 pb-16 last:pb-0">
                    <div class="absolute left-[17px] top-0 bottom-0 w-0.5 bg-accent-gold/30"></div>
                    <div class="absolute left-3 top-1.5 w-3 h-3 rounded-full bg-accent-gold border-2 border-white shadow z-10"></div>
                    <div data-step="{{ $stepId }}-mobile">
                        <div
                            class="bg-white border border-light-green/20 rounded-2xl p-5 shadow-sm transition-all duration-700"
                            :class="visible.includes('{{ $stepId }}-mobile') ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'"
                        >
                            <div class="flex items-center gap-3 mb-3">
                                <span class="inline-flex items-center justify-center w-9 h-9 rounded-full bg-primary-green text-white font-display font-bold text-xs shadow-md">
                                    {{ $step->step_number }}
                                </span>
                                <h3 class="font-display text-lg font-bold text-primary-green">
                                    {{ t($step->title_id, $step->title_en) }}
                                </h3>
                            </div>
                            <p class="text-accent-gold font-semibold text-xs uppercase tracking-wider mb-2">
                                {{ t($step->subtitle_id, $step->subtitle_en) }}
                            </p>
                            <p class="text-brand-gray/80 leading-relaxed text-sm font-light">
                                {{ t($step->description_id, $step->description_en) }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
