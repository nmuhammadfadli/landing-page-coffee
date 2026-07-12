@props([
    'brewGuides' => collect(),
])

<section class="py-20 sm:py-28 bg-white">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-14 space-y-3">
            <span class="text-xs font-bold text-accent-gold uppercase tracking-widest block">
                {{ t('Panduan & Standar', 'GUIDES & STANDARDS') }}
            </span>
            <h2 class="font-display text-3xl sm:text-4xl lg:text-5xl font-extrabold text-primary-green leading-tight">
                {{ t('Panduan Seduh & Cupping', 'Brewing & Cupping Guide') }}
            </h2>
            <div class="mt-4 mx-auto w-16 h-1 bg-accent-gold rounded-full"></div>
        </div>

        @if($brewGuides->isNotEmpty())
            @php
                $categories = [
                    'brew' => [
                        'label_id' => 'Metode Seduh',
                        'label_en' => 'Brew Methods',
                        'guides' => collect(),
                    ],
                    'standard' => [
                        'label_id' => 'Standar Ekspor',
                        'label_en' => 'Export Standards',
                        'guides' => collect(),
                    ],
                ];

                foreach ($brewGuides as $guide) {
                    $name = strtolower(t($guide->name_id, $guide->name_en));
                    if (str_contains($name, 'cupping') || str_contains($name, 'sca') || str_contains($name, 'standar') || str_contains($name, 'export')) {
                        $categories['standard']['guides']->push($guide);
                    } else {
                        $categories['brew']['guides']->push($guide);
                    }
                }
            @endphp

            @foreach ($categories as $key => $category)
                @if ($category['guides']->isNotEmpty())
                    <div class="mb-16 last:mb-0">
                        <!-- Category Header -->
                        <div class="flex items-center gap-3 mb-8">
                            <span class="flex-shrink-0 px-4 py-1.5 text-[10px] font-bold uppercase tracking-[0.2em] rounded-full border border-accent-gold/30 text-accent-gold bg-accent-gold/5">
                                {{ t($category['label_id'], $category['label_en']) }}
                            </span>
                            <span class="flex-1 h-px bg-gradient-to-r from-accent-gold/30 to-transparent"></span>
                        </div>

                        <div
                            x-data="{ activeGuide: 0 }"
                            class="space-y-8"
                        >
                            <!-- Tab pills -->
                            <div class="flex flex-wrap gap-2" role="tablist">
                                @foreach ($category['guides'] as $index => $guide)
                                    <button
                                        @click="activeGuide = {{ $index }}"
                                        :class="activeGuide === {{ $index }}
                                            ? 'bg-primary-green text-white shadow-lg shadow-primary-green/20'
                                            : 'bg-white text-brand-gray border border-gray-200 hover:border-primary-green/40 hover:text-primary-green'"
                                        class="px-5 py-2.5 rounded-full text-xs font-bold uppercase tracking-wider transition-all duration-300"
                                        role="tab"
                                        :aria-selected="activeGuide === {{ $index }}"
                                        type="button"
                                    >
                                        {{ t($guide->name_id, $guide->name_en) }}
                                    </button>
                                @endforeach
                            </div>

                            <!-- Tab panels -->
                            @foreach ($category['guides'] as $index => $guide)
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

                                        <div class="lg:col-span-3 space-y-8">
                                            <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                                                <div class="bg-brand-bg rounded-xl p-5 text-center border border-primary-green/5">
                                                    <p class="text-[10px] font-bold uppercase tracking-widest text-accent-gold mb-2">
                                                        {{ t('Rasio', 'Ratio') }}
                                                    </p>
                                                    <p class="font-display text-sm font-bold text-primary-green">
                                                        {{ $guide->ratio }}
                                                    </p>
                                                </div>
                                                <div class="bg-brand-bg rounded-xl p-5 text-center border border-primary-green/5">
                                                    <p class="text-[10px] font-bold uppercase tracking-widest text-accent-gold mb-2">
                                                        {{ t('Suhu', 'Temp') }}
                                                    </p>
                                                    <p class="font-display text-sm font-bold text-primary-green">
                                                        {{ $guide->temperature }}
                                                    </p>
                                                </div>
                                                <div class="bg-brand-bg rounded-xl p-5 text-center border border-primary-green/5">
                                                    <p class="text-[10px] font-bold uppercase tracking-widest text-accent-gold mb-2">
                                                        {{ t('Waktu', 'Time') }}
                                                    </p>
                                                    <p class="font-display text-sm font-bold text-primary-green">
                                                        {{ t($guide->time_id, $guide->time_en) }}
                                                    </p>
                                                </div>
                                                <div class="bg-brand-bg rounded-xl p-5 text-center border border-primary-green/5">
                                                    <p class="text-[10px] font-bold uppercase tracking-widest text-accent-gold mb-2">
                                                        {{ t('Gilingan', 'Grind') }}
                                                    </p>
                                                    <p class="font-display text-sm font-bold text-primary-green">
                                                        {{ t($guide->grind_size_id, $guide->grind_size_en) }}
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="bg-brand-bg/50 rounded-2xl p-6 border border-primary-green/5">
                                                <p class="text-sm text-brand-gray leading-relaxed">
                                                    {{ t($guide->description_id, $guide->description_en) }}
                                                </p>
                                            </div>

                                            @php
                                                $steps = $guide->steps()->orderBy('step_number')->get();
                                            @endphp

                                            @if($steps->isNotEmpty())
                                                <div>
                                                    <h3 class="font-display text-lg font-bold text-primary-green mb-5 flex items-center gap-2">
                                                        <span class="w-1 h-5 bg-accent-gold rounded-full inline-block"></span>
                                                        {{ t('Langkah-Langkah', 'Steps') }}
                                                    </h3>
                                                    <ol class="space-y-4">
                                                        @foreach($steps as $step)
                                                            <li class="flex gap-4 group">
                                                                <span class="flex-shrink-0 w-8 h-8 rounded-full bg-primary-green text-white text-xs font-bold flex items-center justify-center shadow-sm group-hover:bg-accent-gold group-hover:shadow-md transition-all duration-300">
                                                                    {{ $step->step_number }}
                                                                </span>
                                                                <span class="text-sm text-brand-gray leading-relaxed pt-1.5">
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
                    </div>
                @endif
            @endforeach
        @else
            <div class="text-center py-20">
                <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-brand-bg flex items-center justify-center">
                    <svg class="w-7 h-7 text-brand-gray" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 4.5 7.5 4.5a4.5 4.5 0 00-4.5 4.5c0 2.138 1.079 3.985 2.7 5.1L12 19.5l6.3-5.4c1.621-1.115 2.7-2.962 2.7-5.1a4.5 4.5 0 00-4.5-4.5c-1.746 0-3.332.977-4.5 2.253z"/>
                    </svg>
                </div>
                <p class="text-brand-gray text-lg font-light">
                    {{ t('Belum ada panduan tersedia.', 'No guides available yet.') }}
                </p>
            </div>
        @endif
    </div>
</section>
