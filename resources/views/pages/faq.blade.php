@extends('layouts.app')

@section('title', t('FAQ — Nayaka Export Atelier', 'FAQ — Nayaka Export Atelier'))

@section('content')
    <section class="pt-32 pb-12 bg-light-green/30">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-5xl font-display font-bold text-primary-green mb-4">
                {{ t('Pertanyaan Umum', 'Frequently Asked Questions') }}
            </h1>
            <p class="text-brand-gray text-lg max-w-2xl mx-auto">
                {{ t('Temukan jawaban atas pertanyaan umum seputar ekspor kopi spesialti kami.', 'Find answers to common questions about our specialty coffee export.') }}
            </p>
        </div>
    </section>

    <x-faq-section :faqs="$faqs" />
    <x-final-cta />
@endsection
