@extends('layouts.app')

@section('title', t('Tentang Kami — Nayaka Export Atelier', 'About Us — Nayaka Export Atelier'))

@section('content')
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-5xl font-display font-bold text-primary-green mb-4">
                {{ t('Tentang Kami', 'About Us') }}
            </h1>
        </div>
    </section>

    <x-brand-story />
    <x-coffee-journey :timeline-steps="$timelineSteps" />
    <x-gallery :gallery-photos="$galleryPhotos" />
    <x-final-cta />
@endsection
