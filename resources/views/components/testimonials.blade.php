@props(['testimonials'])

<section
    x-data="{
        active: 0,
        count: {{ $testimonials->count() }},
        next() {
            this.active = (this.active + 1) % this.count;
        },
        prev() {
            this.active = (this.active - 1 + this.count) % this.count;
        },
        init() {
            setInterval(() => {
                this.next();
            }, 6000);
        }
    }"
    class="py-20 sm:py-28 bg-white overflow-hidden border-t border-gray-100"
>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center">
            
            <!-- Left Side: Header & Controls -->
            <div class="lg:col-span-5 text-left space-y-6">
                <span class="text-xs font-bold text-accent-gold uppercase tracking-widest block">
                    {{ t('Testimoni Mitra', 'PARTNER TESTIMONIALS') }}
                </span>
                
                <h2 class="font-display text-3xl sm:text-4xl lg:text-5xl font-extrabold text-primary-green leading-tight">
                    {{ t('Kualitas Ekspor Yang Dipercaya di Seluruh Dunia', 'Export Quality Trusted Around the Globe') }}
                </h2>
                
                <p class="text-brand-gray text-base leading-relaxed font-light">
                    {{ t(
                        'Jangan hanya percaya kata-kata kami. Simak bagaimana para roaster dan mitra impor di Tokyo, San Francisco, dan Hamburg menilai presisi, konsistensi, dan ketertelusuran penuh dari lot kopi ekspor kami.',
                        'Don\'t just take our word for it. Read how roasters and import partners in Tokyo, San Francisco, and Hamburg rate the precision, consistency, and complete traceability of our export coffee lots.'
                    ) }}
                </p>

                <!-- Custom Slider Navigation -->
                <div class="flex items-center gap-4 pt-4">
                    <button
                        @click="prev()"
                        class="w-10 h-10 rounded-full border border-primary-green/20 text-primary-green hover:bg-primary-green hover:text-white flex items-center justify-center transition-all cursor-pointer"
                        aria-label="Previous testimonial"
                    >
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>
                    <button
                        @click="next()"
                        class="w-10 h-10 rounded-full border border-primary-green/20 text-primary-green hover:bg-primary-green hover:text-white flex items-center justify-center transition-all cursor-pointer"
                        aria-label="Next testimonial"
                    >
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>

                    <!-- Dot Indicators -->
                    <div class="flex gap-2 ml-4">
                        <template x-for="(t, i) in Array.from({ length: count })" :key="i">
                            <button
                                @click="active = i"
                                class="w-2.5 h-2.5 rounded-full transition-all duration-300"
                                :class="active === i ? 'bg-accent-gold scale-125' : 'bg-gray-200 hover:bg-gray-300'"
                            ></button>
                        </template>
                    </div>
                </div>
            </div>

            <!-- Right Side: Testimonial Quote Frame (Matches Photo's White Card Layout) -->
            <div class="lg:col-span-7 relative w-full">
                <!-- Large Background Quote Mark -->
                <div class="absolute -top-12 -left-4 text-accent-gold/10 font-serif text-[12rem] leading-none select-none pointer-events-none hidden sm:block">
                    “
                </div>

                <div class="relative bg-brand-bg border border-light-green/40 rounded-3xl p-8 sm:p-12 shadow-luxury">
                    @foreach ($testimonials as $i => $testimonial)
                        <div
                            x-cloak
                            x-show="active === {{ $i }}"
                            x-transition:enter="transition ease-out duration-400"
                            x-transition:enter-start="opacity-0 translate-x-12"
                            x-transition:enter-end="opacity-100 translate-x-0"
                            class="space-y-6"
                        >
                            <!-- Rating Stars -->
                            <div class="flex gap-1 text-accent-gold text-lg">
                                @for ($s = 0; $s < 5; $s++)
                                    <span>★</span>
                                @endfor
                            </div>

                            <!-- Quote Body -->
                            <p class="text-primary-green text-base sm:text-lg italic leading-relaxed font-light">
                                &ldquo;{{ t($testimonial->quote_id, $testimonial->quote_en) }}&rdquo;
                            </p>

                            <!-- Author Card Info -->
                            <div class="flex items-center gap-4 pt-6 border-t border-light-green/40">
                                <img
                                    src="{{ $testimonial->avatar }}"
                                    alt="{{ $testimonial->name }}"
                                    class="rounded-full object-cover border-2 border-accent-gold/20 shadow-md"
                                    style="width: 54px; height: 54px;"
                                />
                                <div class="space-y-0.5">
                                    <h4 class="font-display text-base font-bold text-primary-green">
                                        {{ $testimonial->name }}
                                    </h4>
                                    <p class="text-xs text-brand-gray tracking-wide">
                                        {{ t($testimonial->role_id, $testimonial->role_en) }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</section>
