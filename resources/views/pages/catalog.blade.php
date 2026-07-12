@extends('layouts.app')

@section('title', t('Katalog Ekspor — Nayaka Export Atelier', 'Export Catalog — Nayaka Export Atelier'))

@section('content')
    <section class="pt-32 pb-12 bg-light-green/30">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-5xl font-display font-bold text-primary-green mb-4">
                {{ t('Katalog Ekspor', 'Export Catalog') }}
            </h1>
            <p class="text-brand-gray text-lg max-w-2xl mx-auto">
                {{ t('Jelajahi lot mikro kopi spesialti pilihan kami. Setiap lot memiliki profil rasa unik dan sertifikasi mutu lengkap.', 'Explore our selection of specialty coffee micro-lots. Each lot has a unique flavor profile and full quality certification.') }}
            </p>
        </div>
    </section>

    <x-featured-coffee :products="$products" show-view-all="false" />
    <x-brewing-guide :brew-guides="$brewGuides" />
    <x-final-cta />
@endsection
