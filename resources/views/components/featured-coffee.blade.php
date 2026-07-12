@props([
    'products' => collect(),
    'title' => null,
    'showViewAll' => true,
])

<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 lg:py-28">
    
    <!-- Title & Header -->
    <div class="text-center mb-16 space-y-3">
        <span class="text-xs font-bold text-accent-gold uppercase tracking-widest block">
            {{ t('Pilihan Unggulan', 'PREMIUM SELECTION') }}
        </span>
        <h2 class="font-display text-3xl sm:text-4xl lg:text-5xl font-extrabold text-primary-green">
            {{ t('Kopi Terbaik Indonesia', 'The Finest Indonesian Coffees') }}
        </h2>
        <p class="text-brand-gray text-base max-w-2xl mx-auto font-light">
            {{ t('Langsung ke Roastery Anda — disortir ketat, diuji Q-Grader, dan dikemas hermetis.', 'Directly to your Roastery — strictly sorted, Q-Grader certified, and hermetically sealed.') }}
        </p>
        <div class="mt-4 mx-auto w-16 h-1 bg-accent-gold rounded-full"></div>
    </div>

    <div
        x-data="{ search: '', roastFilter: '' }"
        class="space-y-12"
    >
        <!-- Search & Filter Controls -->
        <div class="flex flex-col md:flex-row items-center justify-between gap-6 pb-6 border-b border-gray-100">
            <div class="relative w-full max-w-md">
                <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-4 h-4 text-brand-gray" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
                <input
                    type="text"
                    x-model="search"
                    placeholder="{{ t('Cari kopi berdasarkan nama atau asal...', 'Search coffee by name or origin...') }}"
                    class="w-full pl-11 pr-4 py-3 bg-brand-bg border border-light-green rounded-xl text-sm text-brand-text placeholder-brand-gray/60 focus:outline-none focus:ring-2 focus:ring-primary-green/20 focus:border-primary-green transition-all duration-200"
                >
            </div>

            <div class="flex flex-wrap items-center gap-3">
                <template x-for="level in ['Light', 'Medium', 'Dark']" :key="level">
                    <button
                        @click="roastFilter = roastFilter === level ? '' : level"
                        :class="roastFilter === level
                            ? 'bg-primary-green text-white border-primary-green shadow-md shadow-primary-green/10'
                            : 'bg-white text-brand-gray border-light-green hover:border-primary-green/30 hover:text-primary-green'"
                        class="px-5 py-2 rounded-full text-xs font-semibold uppercase tracking-wider border transition-all duration-200 cursor-pointer"
                        x-text="level"
                    ></button>
                </template>
                <button
                    x-show="roastFilter !== ''"
                    @click="roastFilter = ''"
                    class="px-4 py-2 text-xs font-semibold text-red-500 hover:text-red-600 transition-colors duration-200 cursor-pointer"
                >
                    {{ t('Reset Filter', 'Reset Filter') }}
                </button>
            </div>
        </div>

        <!-- Product Grid (Premium Card Layout) -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            @forelse($products as $product)
                @php
                    $locale = app()->getLocale();
                    $flavors = $product->flavorNotes()->where('locale', $locale)->get();
                @endphp

                <div
                    x-show="
                        (search === '' || '{{ Str::lower($product->name_id) }} {{ Str::lower($product->name_en) }} {{ Str::lower($product->origin_id) }} {{ Str::lower($product->origin_en) }}'.includes(search.toLowerCase())) &&
                        (roastFilter === '' || '{{ $product->roast_level }}' === roastFilter)
                    "
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 scale-95"
                    x-transition:enter-end="opacity-100 scale-100"
                    class="group bg-white border border-gray-100 rounded-3xl overflow-hidden shadow-luxury hover:shadow-luxury-hover transition-all duration-500 flex flex-col h-full"
                >
                    <!-- Image and Badge Container (Tall Aspect Ratio like Photo) -->
                    <a href="/product/{{ $product->slug }}" class="block relative overflow-hidden aspect-[4/3] sm:aspect-[1.4/1] bg-gray-100">
                        <img
                            src="{{ $product->image }}"
                            alt="{{ t($product->name_id, $product->name_en) }}"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out"
                            loading="lazy"
                        >
                        <!-- Dark top overlay -->
                        <div class="absolute inset-x-0 top-0 h-16 bg-gradient-to-b from-black/40 to-transparent"></div>
                        
                        <div class="absolute top-4 left-4 flex flex-wrap gap-2">
                            @php
                                $badgeColors = [
                                    'Light' => 'bg-amber-100 text-amber-800',
                                    'Medium' => 'bg-orange-100 text-orange-800',
                                    'Dark' => 'bg-red-100 text-red-800',
                                ];
                                $roastColor = $badgeColors[$product->roast_level] ?? 'bg-gray-100 text-gray-800';
                            @endphp
                            <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-widest {{ $roastColor }} shadow-sm">
                                {{ t($product->roast_level . ' Roast', $product->roast_level . ' Roast') }}
                            </span>
                            
                            @php
                                $statusColors = [
                                    'Available' => 'bg-green-100 text-green-800',
                                    'Limited' => 'bg-amber-100 text-amber-800',
                                    'Sold Out' => 'bg-red-100 text-red-800',
                                ];
                                $statusColor = $statusColors[$product->stock_status] ?? 'bg-gray-100 text-gray-800';
                                $statusLabelId = [
                                    'Available' => 'Tersedia',
                                    'Limited' => 'Terbatas',
                                    'Sold Out' => 'Habis',
                                ];
                            @endphp
                            <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-widest {{ $statusColor }} shadow-sm">
                                {{ t($statusLabelId[$product->stock_status] ?? $product->stock_status, $product->stock_status) }}
                            </span>
                        </div>
                    </a>

                    <!-- Card Body -->
                    <div class="flex-1 flex flex-col p-6 space-y-4">
                        
                        <!-- Name & Origin -->
                        <div class="space-y-1">
                            <p class="text-xs font-bold text-accent-gold uppercase tracking-wider">
                                {{ t($product->origin_id, $product->origin_en) }}
                            </p>
                            <a href="/product/{{ $product->slug }}" class="block group-hover:text-primary-green transition-colors duration-200">
                                <h3 class="font-display text-xl font-bold text-primary-green leading-tight">
                                    {{ t($product->name_id, $product->name_en) }}
                                </h3>
                            </a>
                        </div>

                        <!-- Technical Specs Grid (Matching Photo's Card Details) -->
                        <div class="bg-brand-bg rounded-xl p-4 text-xs space-y-2 border border-light-green/30">
                            <div class="flex justify-between border-b border-light-green/30 pb-2">
                                <span class="text-brand-gray">{{ t('Proses', 'Process') }}</span>
                                <span class="font-semibold text-primary-green">{{ t($product->process_id, $product->process_en) }}</span>
                            </div>
                            <div class="flex justify-between border-b border-light-green/30 pb-2">
                                <span class="text-brand-gray">{{ t('Elevasi', 'Elevation') }}</span>
                                <span class="font-semibold text-primary-green">{{ $product->elevation ?? '-' }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-brand-gray">{{ t('Skor SCA', 'SCA Score') }}</span>
                                <span class="font-bold text-accent-gold">SCA {{ $product->sca_score ?? '88+' }}</span>
                            </div>
                        </div>

                        <!-- Flavor Notes Tags -->
                        @if($flavors->isNotEmpty())
                            <div class="flex flex-wrap gap-1.5 pt-1">
                                @foreach($flavors as $flavor)
                                    <span class="px-2.5 py-1 bg-light-green text-primary-green rounded-lg text-[10px] font-bold uppercase tracking-wider">
                                        {{ $flavor->note }}
                                    </span>
                                @endforeach
                            </div>
                        @endif

                        <!-- Footer Price & CTA Button -->
                        <div class="mt-auto pt-4 border-t border-gray-100 flex items-center justify-between">
                            <div class="flex flex-col">
                                <span class="text-[10px] uppercase font-bold text-brand-gray/60 tracking-wider">
                                    {{ t('Estimasi Harga', 'EST. PRICE') }}
                                </span>
                                <span class="font-display text-lg font-extrabold text-primary-green">
                                    Rp{{ number_format($product->price, 0, ',', '.') }}
                                </span>
                            </div>
                            <a
                                href="/product/{{ $product->slug }}"
                                class="inline-flex items-center justify-center bg-primary-green text-white hover:bg-accent-gold hover:text-primary-green font-bold text-xs uppercase tracking-widest px-4 py-2.5 rounded-lg transition-all duration-300 shadow-sm"
                            >
                                {{ t('Detail Kopi', 'Detail') }}
                                <svg class="w-3 h-3 ml-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

            @empty
                <div class="col-span-full text-center py-16 bg-brand-bg rounded-3xl border border-dashed border-light-green/50">
                    <p class="text-brand-gray text-lg">
                        {{ t('Belum ada produk tersedia.', 'No products available yet.') }}
                    </p>
                </div>
            @endforelse

        </div>

        <!-- View All Button -->
        @if($showViewAll && $products->isNotEmpty())
            <div class="text-center pt-8">
                <a
                    href="/catalog"
                    class="inline-flex items-center gap-2 px-10 py-4 bg-primary-green hover:bg-accent-gold text-white hover:text-primary-green font-bold rounded-xl transition-all duration-300 shadow-luxury hover:shadow-luxury-hover text-sm tracking-widest uppercase"
                >
                    {{ t('JELAJAHI SELURUH KATALOG EKSPOR', 'EXPLORE THE EXPORT CATALOG') }}
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
            </div>
        @endif
    </div>
</section>
