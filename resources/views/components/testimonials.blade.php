@props(['testimonials'])

<section
    x-data="{
        current: 0,
        total: {{ $testimonials->count() }},
        paddingOffset: 0,
        init() {
            this.$nextTick(() => {
                const container = this.$refs.carousel;
                this.paddingOffset = container.children[0]?.offsetLeft ?? 0;
            });
        },
        scrollTo(idx) {
            this.current = idx;
            const container = this.$refs.carousel;
            const card = container.children[idx];
            if (card) {
                container.scrollLeft = card.offsetLeft - this.paddingOffset;
            }
        }
    }"
    class="py-20 sm:py-28 bg-white overflow-hidden"
>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-14 space-y-3">
            <span class="text-xs font-bold text-accent-gold uppercase tracking-widest block">
                {{ t('Testimoni Mitra', 'PARTNER TESTIMONIALS') }}
            </span>
            <h2 class="font-display text-3xl sm:text-4xl lg:text-5xl font-extrabold text-primary-green">
                {{ t('Apa Kata Mitra Kami', 'What Our Partners Say') }}
            </h2>
            <div class="mt-4 mx-auto w-16 h-1 bg-accent-gold rounded-full"></div>
        </div>

        <!-- Horizontal Carousel -->
        <div
            x-ref="carousel"
            class="flex gap-6 overflow-x-auto snap-x snap-mandatory scroll-smooth pb-4 -mx-4 px-4"
            style="scrollbar-width: none; -ms-overflow-style: none;"
        >
            @foreach ($testimonials as $testimonial)
                <div
                    class="snap-center shrink-0 w-full sm:w-[calc(50%-12px)] lg:w-[calc(33.333%-16px)]"
                >
                    <div class="bg-white border border-gray-100 rounded-2xl p-8 shadow-luxury h-full flex flex-col">
                        <!-- Stars -->
                        <div class="flex gap-1 mb-5">
                            @for ($s = 0; $s < 5; $s++)
                                <span class="text-lg {{ $s < $testimonial->rating ? 'text-accent-gold' : 'text-gray-200' }}">★</span>
                            @endfor
                        </div>

                        <!-- Quote -->
                        <p class="text-gray-600 text-sm leading-relaxed flex-1">
                            &ldquo;{{ t($testimonial->quote_id, $testimonial->quote_en) }}&rdquo;
                        </p>

                        <!-- Author -->
                        <div class="flex items-center gap-3 mt-6 pt-6 border-t border-gray-100">
                            <img
                                src="{{ $testimonial->avatar }}"
                                alt="{{ $testimonial->name }}"
                                class="rounded-full object-cover border-2 border-accent-gold/20"
                                style="width: 48px; height: 48px;"
                            />
                            <div>
                                <h4 class="font-display font-bold text-primary-green text-sm">
                                    {{ $testimonial->name }}
                                </h4>
                                <p class="text-xs text-brand-gray">
                                    {{ t($testimonial->role_id, $testimonial->role_en) }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Dots -->
        <div class="flex justify-center gap-2 mt-8">
            @foreach ($testimonials as $i => $testimonial)
                <button
                    @click="scrollTo({{ $i }})"
                    class="w-2.5 h-2.5 rounded-full transition-all duration-300"
                    :class="current === {{ $i }} ? 'bg-accent-gold scale-125 w-6' : 'bg-gray-300 hover:bg-gray-400'"
                ></button>
            @endforeach
        </div>
    </div>
</section>
