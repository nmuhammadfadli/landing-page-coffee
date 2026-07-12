@props(['testimonials'])

<section
    x-data="{
        active: 0,
        init() {
            setInterval(() => {
                this.active = (this.active + 1) % {{ $testimonials->count() }};
            }, 5000);
        }
    }"
    class="py-20 px-4 sm:px-6 lg:px-8 bg-white"
>
    <div class="max-w-3xl mx-auto text-center">
        <h2 class="font-display text-3xl sm:text-4xl font-bold text-gray-900 mb-16">
            {{ t('Apa Kata Mitra Kami', 'What Our Partners Say') }}
        </h2>

        @foreach ($testimonials as $i => $testimonial)
            <div
                x-cloak
                x-show="active === {{ $i }}"
                x-transition:enter="transition ease-in-out duration-500"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in-out duration-500"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                class="space-y-6"
            >
                <div class="flex flex-col items-center gap-4">
                    <img
                        src="{{ $testimonial->avatar }}"
                        alt="{{ $testimonial->name }}"
                        class="rounded-full object-cover"
                        style="width: 60px; height: 60px;"
                    />
                    <div>
                        <h3 class="font-display text-lg font-semibold text-gray-900">
                            {{ $testimonial->name }}
                        </h3>
                        <p class="text-brand-gray text-sm">
                            {{ t($testimonial->role_id, $testimonial->role_en) }}
                        </p>
                    </div>
                </div>

                <div class="flex justify-center gap-1">
                    @for ($s = 0; $s < $testimonial->rating; $s++)
                        <span class="text-xl text-accent-gold">★</span>
                    @endfor
                    @for ($s = 0; $s < 5 - $testimonial->rating; $s++)
                        <span class="text-xl text-gray-300">★</span>
                    @endfor
                </div>

                <p class="text-gray-600 text-lg italic leading-relaxed max-w-2xl mx-auto">
                    &ldquo;{{ t($testimonial->quote_id, $testimonial->quote_en) }}&rdquo;
                </p>
            </div>
        @endforeach

        <div class="flex justify-center gap-3 mt-12">
            @foreach ($testimonials as $i => $testimonial)
                <button
                    @click="active = {{ $i }}"
                    class="w-3 h-3 rounded-full transition-all duration-300"
                    :class="active === {{ $i }} ? 'bg-accent-gold scale-125' : 'bg-gray-300 hover:bg-gray-400'"
                    aria-label="{{ t('Pindah ke testimonial', 'Go to testimonial') }} {{ $i + 1 }}"
                ></button>
            @endforeach
        </div>
    </div>
</section>
