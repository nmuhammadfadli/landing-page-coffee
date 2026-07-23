@props([
    'products' => collect(),
    'title' => null,
    'showViewAll' => true,
])

<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 lg:py-28">
    @if($title)
        <div class="text-center mb-12">
            <h2 class="font-display text-3xl sm:text-4xl lg:text-5xl font-bold text-brand-text">
                {{ $title }}
            </h2>
            <div class="mt-4 mx-auto w-16 h-0.5 bg-accent-gold rounded-full"></div>
        </div>
    @endif

    <div
        x-data="{ search: '', roastFilter: '' }"
        class="space-y-10"
    >
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4 sm:gap-6">
            <div class="relative w-full max-w-md">
                <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-4 h-4 text-brand-gray" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
                <input
                    type="text"
                    x-model="search"
                    placeholder="{{ t('Cari kopi berdasarkan nama atau asal...', 'Search coffee by name or origin...') }}"
                    class="w-full pl-11 pr-4 py-2.5 bg-white border border-light-green rounded-lg text-sm text-brand-text placeholder-brand-gray/60 focus:outline-none focus:ring-2 focus:ring-primary-green/20 focus:border-primary-green transition-all duration-200"
                >
            </div>

            <div class="flex items-center gap-2">
                <template x-for="level in ['Light', 'Medium', 'Dark']" :key="level">
                    <button
                        @click="roastFilter = roastFilter === level ? '' : level"
                        :class="roastFilter === level
                            ? 'bg-primary-green text-white border-primary-green'
                            : 'bg-white text-brand-gray border-light-green hover:border-primary-green/30 hover:text-primary-green'"
                        class="px-4 py-2 rounded-full text-xs font-medium uppercase tracking-wider border transition-all duration-200"
                        x-text="level"
                    ></button>
                </template>
                <button
                    x-show="roastFilter !== ''"
                    @click="roastFilter = ''"
                    class="px-3 py-2 text-xs text-brand-gray/50 hover:text-brand-gray transition-colors duration-200"
                >
                    {{ t('Reset', 'Reset') }}
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">

            @forelse($products as $product)
                @php
                    $locale = app()->getLocale();
                    $flavors = $product->flavorNotes()->where('locale', $locale)->get();
                    $fullStars = (int) floor($product->rating);
                    $hasHalf = ($product->rating - $fullStars) >= 0.5;
                    $emptyStars = 5 - $fullStars - ($hasHalf ? 1 : 0);
                @endphp

                <div
                    x-show="
                        (search === '' || '{{ Str::lower($product->name_id) }} {{ Str::lower($product->name_en) }} {{ Str::lower($product->origin_id) }} {{ Str::lower($product->origin_en) }}'.includes(search.toLowerCase())) &&
                        (roastFilter === '' || '{{ $product->roast_level }}' === roastFilter)
                    "
                    class="group bg-white rounded-2xl overflow-hidden shadow-luxury hover:shadow-luxury-hover transition-all duration-500 flex flex-col"
                >
                    <a href="/product/{{ $product->slug }}" class="block relative overflow-hidden aspect-[4/3]">
                        <img
                            src="{{ $product->image }}"
                            alt="{{ t($product->name_id, $product->name_en) }}"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out"
                            loading="lazy"
                        >
                        <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        <div class="absolute top-3 left-3 flex flex-wrap gap-2">
                            @php
                                $badgeColors = [
                                    'Light' => 'bg-amber-100 text-amber-800',
                                    'Medium' => 'bg-orange-100 text-orange-800',
                                    'Dark' => 'bg-red-100 text-red-800',
                                ];
                                $roastColor = $badgeColors[$product->roast_level] ?? 'bg-gray-100 text-gray-800';
                            @endphp
                            <span class="px-2.5 py-1 rounded-full text-[10px] font-semibold uppercase tracking-wider {{ $roastColor }}">
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
                            <span class="px-2.5 py-1 rounded-full text-[10px] font-semibold uppercase tracking-wider {{ $statusColor }}">
                                {{ t($statusLabelId[$product->stock_status] ?? $product->stock_status, $product->stock_status) }}
                            </span>
                        </div>
                    </a>

                    <div class="flex-1 flex flex-col p-5">
                        <a href="/product/{{ $product->slug }}" class="group-hover:text-primary-green transition-colors duration-200">
                            <h3 class="font-display text-lg font-bold text-brand-text leading-tight">
                                {{ t($product->name_id, $product->name_en) }}
                            </h3>
                        </a>

                        <p class="mt-1 text-sm text-brand-gray">
                            {{ t($product->origin_id, $product->origin_en) }}
                        </p>

                        <div class="mt-2 flex items-center gap-0.5">
                            @for ($i = 0; $i < $fullStars; $i++)
                                <svg class="w-4 h-4 text-accent-gold" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                            @endfor
                            @if ($hasHalf)
                                <svg class="w-4 h-4 text-accent-gold" fill="currentColor" viewBox="0 0 20 20">
                                    <defs>
                                        <linearGradient id="half-{{ $product->id }}">
                                            <stop offset="50%" stop-color="currentColor"/>
                                            <stop offset="50%" stop-color="#E5E7EB"/>
                                        </linearGradient>
                                    </defs>
                                    <path fill="url(#half-{{ $product->id }})" d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                            @endif
                            @for ($i = 0; $i < $emptyStars; $i++)
                                <svg class="w-4 h-4 text-gray-200" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                            @endfor
                            @if($product->sca_score)
                                <span class="ml-2 text-[11px] font-semibold text-brand-gray/60">SCA {{ $product->sca_score }}</span>
                            @endif
                        </div>

                        @if($flavors->isNotEmpty())
                            <div class="mt-3 flex flex-wrap gap-1.5">
                                @foreach($flavors as $flavor)
                                    <span class="px-2 py-0.5 bg-light-green text-primary-green/80 rounded-md text-[10px] font-medium">
                                        {{ $flavor->note }}
                                    </span>
                                @endforeach
                            </div>
                        @endif

                        <div class="mt-auto pt-4 flex items-center justify-between">
                            <span class="font-display text-lg font-bold text-primary-green">
                                Rp{{ number_format($product->price, 0, ',', '.') }}
                            </span>
                            <a
                                href="/product/{{ $product->slug }}"
                                class="text-xs font-semibold uppercase tracking-wider text-accent-gold hover:text-accent-gold/80 transition-colors duration-200"
                            >
                                {{ t('Detail', 'Detail') }}
                                <span aria-hidden="true">&rarr;</span>
                            </a>
                        </div>
                    </div>
                </div>

            @empty
                <div class="col-span-full text-center py-16">
                    <p class="text-brand-gray text-lg">
                        {{ t('Belum ada produk tersedia.', 'No products available yet.') }}
                    </p>
                </div>
            @endforelse

        </div>

        @if($showViewAll && $products->isNotEmpty())
            <div class="text-center pt-4">
                <a
                    href="/catalog"
                    class="inline-flex items-center gap-2 px-8 py-3.5 bg-primary-green hover:bg-primary-green/90 text-white font-semibold rounded-lg transition-all duration-300 shadow-luxury hover:shadow-luxury-hover"
                >
                    {{ t('Lihat Semua Katalog', 'View Full Catalog') }}
                    {{-- <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg> --}}
                </a>
            </div>
        @endif
    </div>
</section>
