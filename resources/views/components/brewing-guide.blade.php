@props([
    'brewGuides' => collect(),
])

<section class="py-20 sm:py-28 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="font-display text-3xl sm:text-4xl lg:text-5xl font-bold text-gray-900 leading-tight">
                {{ t('Panduan Seduh', 'Brewing Guide') }}
            </h2>
            <div class="mt-4 mx-auto w-16 h-0.5 bg-accent-gold rounded-full"></div>
        </div>

        @if($brewGuides->isNotEmpty())
            <div
                x-data="{ activeGuide: 0 }"
                class="space-y-8"
            >
                <div class="flex flex-wrap justify-center gap-2" role="tablist">
                    @foreach($brewGuides as $index => $guide)
                        <button
                            @click="activeGuide = {{ $index }}"
                            :class="activeGuide === {{ $index }} ? 'bg-light-green text-primary-green border-light-green' : 'bg-white text-gray-600 border-gray-200 hover:border-primary-green/30 hover:text-primary-green'"
                            class="px-5 py-2.5 rounded-full text-sm font-semibold border transition-all duration-200"
                            role="tab"
                            :aria-selected="activeGuide === {{ $index }}"
                            type="button"
                        >
                            {{ t($guide->name_id, $guide->name_en) }}
                        </button>
                    @endforeach
                </div>

                @foreach($brewGuides as $index => $guide)
                    <div
                        x-show="activeGuide === {{ $index }}"
                        x-cloak
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 translate-y-4"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        role="tabpanel"
                    >
                        <div class="grid grid-cols-1 lg:grid-cols-5 gap-8 lg:gap-12">
                            <div class="lg:col-span-2">
                                <div class="aspect-[4/3] rounded-2xl overflow-hidden shadow-luxury">
                                    <img
                                        src="{{ $guide->photo }}"
                                        alt="{{ t($guide->name_id, $guide->name_en) }}"
                                        class="w-full h-full object-cover"
                                        loading="lazy"
                                    >
                                </div>
                            </div>

                            <div class="lg:col-span-3 space-y-6">
                                <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                                    <div class="bg-light-green/50 rounded-xl p-4 text-center">
                                        <p class="text-xs font-semibold uppercase tracking-wider text-primary-green mb-1">
                                            {{ t('Rasio', 'Ratio') }}
                                        </p>
                                        <p class="font-display text-sm font-bold text-gray-900">
                                            {{ $guide->ratio }}
                                        </p>
                                    </div>
                                    <div class="bg-light-green/50 rounded-xl p-4 text-center">
                                        <p class="text-xs font-semibold uppercase tracking-wider text-primary-green mb-1">
                                            {{ t('Suhu', 'Temp') }}
                                        </p>
                                        <p class="font-display text-sm font-bold text-gray-900">
                                            {{ $guide->temperature }}
                                        </p>
                                    </div>
                                    <div class="bg-light-green/50 rounded-xl p-4 text-center">
                                        <p class="text-xs font-semibold uppercase tracking-wider text-primary-green mb-1">
                                            {{ t('Waktu', 'Time') }}
                                        </p>
                                        <p class="font-display text-sm font-bold text-gray-900">
                                            {{ t($guide->time_id, $guide->time_en) }}
                                        </p>
                                    </div>
                                    <div class="bg-light-green/50 rounded-xl p-4 text-center">
                                        <p class="text-xs font-semibold uppercase tracking-wider text-primary-green mb-1">
                                            {{ t('Gilingan', 'Grind') }}
                                        </p>
                                        <p class="font-display text-sm font-bold text-gray-900">
                                            {{ t($guide->grind_size_id, $guide->grind_size_en) }}
                                        </p>
                                    </div>
                                </div>

                                <div>
                                    <p class="text-base text-gray-600 leading-relaxed">
                                        {{ t($guide->description_id, $guide->description_en) }}
                                    </p>
                                </div>

                                @php
                                    $steps = $guide->steps()->orderBy('step_number')->get();
                                @endphp

                                @if($steps->isNotEmpty())
                                    <div>
                                        <h3 class="font-display text-lg font-bold text-gray-900 mb-4">
                                            {{ t('Langkah-Langkah', 'Steps') }}
                                        </h3>
                                        <ol class="space-y-3">
                                            @foreach($steps as $step)
                                                <li class="flex gap-3">
                                                    <span class="flex-shrink-0 w-7 h-7 rounded-full bg-primary-green text-white text-xs font-bold flex items-center justify-center mt-0.5">
                                                        {{ $step->step_number }}
                                                    </span>
                                                    <span class="text-sm text-gray-600 leading-relaxed pt-0.5">
                                                        {{ t($step->step_id, $step->step_en) }}
                                                    </span>
                                                </li>
                                            @endforeach
                                        </ol>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-16">
                <p class="text-gray-500 text-lg">
                    {{ t('Belum ada panduan seduh tersedia.', 'No brewing guides available yet.') }}
                </p>
            </div>
        @endif
    </div>
</section>
