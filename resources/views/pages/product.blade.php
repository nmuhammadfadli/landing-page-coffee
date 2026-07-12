@extends('layouts.app')

@section('title', t($product->name_id, $product->name_en) . ' — Nayaka Export Atelier')

@section('content')
    <section class="pt-32 pb-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <a href="{{ route('catalog') }}" class="inline-flex items-center text-brand-gray hover:text-primary-green transition-colors mb-8">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                {{ t('← Kembali ke Katalog', '← Back to Catalog') }}
            </a>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <div class="aspect-[4/3] rounded-2xl overflow-hidden shadow-luxury">
                    <img src="{{ $product->image }}" alt="{{ t($product->name_id, $product->name_en) }}" class="w-full h-full object-cover">
                </div>

                <div>
                    <div class="flex items-center gap-3 mb-4">
                        <span class="px-3 py-1 text-sm font-semibold rounded-full
                            @if($product->roast_level === 'Light') bg-amber-100 text-amber-800
                            @elseif($product->roast_level === 'Medium') bg-orange-100 text-orange-800
                            @else bg-brown-100 text-brown-800 @endif">
                            {{ $product->roast_level }} Roast
                        </span>
                        <span class="px-3 py-1 text-sm font-semibold rounded-full
                            @if($product->stock_status === 'Available') bg-green-100 text-green-800
                            @elseif($product->stock_status === 'Limited') bg-amber-100 text-amber-800
                            @else bg-red-100 text-red-800 @endif">
                            {{ t(
                                $product->stock_status === 'Available' ? 'Tersedia' : ($product->stock_status === 'Limited' ? 'Terbatas' : 'Habis'),
                                $product->stock_status
                            ) }}
                        </span>
                    </div>

                    <h1 class="text-3xl md:text-4xl font-display font-bold text-primary-green mb-2">
                        {{ t($product->name_id, $product->name_en) }}
                    </h1>
                    <p class="text-brand-gray text-lg mb-4">{{ t($product->origin_id, $product->origin_en) }}</p>

                    <div class="flex items-center gap-2 mb-6">
                        <div class="flex text-accent-gold">
                            @for($i = 1; $i <= 5; $i++)
                                <span>{{ $i <= round($product->rating) ? '★' : '☆' }}</span>
                            @endfor
                        </div>
                        <span class="text-brand-gray text-sm">{{ number_format($product->rating, 1) }}</span>
                        @if($product->sca_score)
                            <span class="ml-2 px-2 py-0.5 text-xs font-semibold bg-primary-green text-white rounded-full">SCA {{ $product->sca_score }}</span>
                        @endif
                    </div>

                    <p class="text-brand-text leading-relaxed mb-6">
                        {{ t($product->description_id, $product->description_en) }}
                    </p>

                    @php
                        $flavorNotes = $product->flavorNotes()->where('locale', app()->getLocale())->orderBy('sort_order')->get();
                    @endphp
                    @if($flavorNotes->count())
                        <div class="mb-6">
                            <h3 class="text-sm font-semibold text-brand-gray uppercase tracking-wider mb-2">
                                {{ t('Catatan Rasa', 'Flavor Notes') }}
                            </h3>
                            <div class="flex flex-wrap gap-2">
                                @foreach($flavorNotes as $note)
                                    <span class="px-3 py-1 text-sm bg-light-green text-primary-green rounded-full">{{ $note->note }}</span>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <div class="text-3xl font-display font-bold text-primary-green mb-6">
                        Rp{{ number_format($product->price, 0, ',', '.') }}
                    </div>

                    <a href="https://wa.me/6281230860124?text={{ urlencode(t(
                        'Halo, saya tertarik dengan ' . $product->name_id,
                        'Hello, I am interested in ' . $product->name_en
                    )) }}" target="_blank"
                       class="inline-flex items-center gap-2 bg-accent-gold text-white px-8 py-3 rounded-xl font-semibold hover:bg-accent-gold/90 transition-all shadow-lg hover:shadow-xl">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                        {{ t('Tanya via WhatsApp', 'Inquire via WhatsApp') }}
                    </a>

                    @if($product->elevation || $product->process)
                        <div class="grid grid-cols-2 gap-4 mt-8 pt-8 border-t border-gray-200">
                            @if($product->process)
                                <div>
                                    <span class="text-xs font-semibold text-brand-gray uppercase tracking-wider">{{ t('Proses', 'Process') }}</span>
                                    <p class="font-medium">{{ t($product->process_id, $product->process_en) }}</p>
                                </div>
                            @endif
                            @if($product->elevation)
                                <div>
                                    <span class="text-xs font-semibold text-brand-gray uppercase tracking-wider">{{ t('Elevasi', 'Elevation') }}</span>
                                    <p class="font-medium">{{ $product->elevation }}</p>
                                </div>
                            @endif
                            @if($product->moisture)
                                <div>
                                    <span class="text-xs font-semibold text-brand-gray uppercase tracking-wider">{{ t('Kelembapan', 'Moisture') }}</span>
                                    <p class="font-medium">{{ $product->moisture }}</p>
                                </div>
                            @endif
                            @if($product->fob_price_range)
                                <div>
                                    <span class="text-xs font-semibold text-brand-gray uppercase tracking-wider">FOB</span>
                                    <p class="font-medium">{{ $product->fob_price_range }}</p>
                                </div>
                            @endif
                        </div>
                    @endif

                    <div class="mt-6 space-y-3">
                        @if($product->available_lots_id)
                            <div class="flex justify-between text-sm">
                                <span class="text-brand-gray">{{ t('Lot Tersedia', 'Available Lots') }}</span>
                                <span class="font-medium">{{ t($product->available_lots_id, $product->available_lots_en) }}</span>
                            </div>
                        @endif
                        @if($product->defect_count_id)
                            <div class="flex justify-between text-sm">
                                <span class="text-brand-gray">{{ t('Standar Cacat', 'Defect Standard') }}</span>
                                <span class="font-medium">{{ t($product->defect_count_id, $product->defect_count_en) }}</span>
                            </div>
                        @endif
                        @if($product->bag_type_id)
                            <div class="flex justify-between text-sm">
                                <span class="text-brand-gray">{{ t('Jenis Kemasan', 'Packaging') }}</span>
                                <span class="font-medium">{{ t($product->bag_type_id, $product->bag_type_en) }}</span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            @if($others->count())
                <div class="mt-20">
                    <h2 class="text-2xl font-display font-bold text-primary-green mb-8">
                        {{ t('Produk Lainnya', 'Other Products') }}
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        @foreach($others as $other)
                            <a href="{{ route('product.show', $other->slug) }}" class="group bg-white rounded-xl shadow-luxury hover:shadow-luxury-hover transition-all duration-300 overflow-hidden">
                                <div class="aspect-[4/3] overflow-hidden">
                                    <img src="{{ $other->image }}" alt="{{ t($other->name_id, $other->name_en) }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy">
                                </div>
                                <div class="p-4">
                                    <h3 class="font-display font-semibold group-hover:text-primary-green transition-colors">{{ t($other->name_id, $other->name_en) }}</h3>
                                    <p class="text-sm text-brand-gray">{{ t($other->origin_id, $other->origin_en) }}</p>
                                    <p class="font-bold text-primary-green mt-2">Rp{{ number_format($other->price, 0, ',', '.') }}</p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection
