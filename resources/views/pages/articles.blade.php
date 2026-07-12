@extends('layouts.app')

@section('title', t('Jurnal & Edukasi — Nayaka Export Atelier', 'Journal & Education — Nayaka Export Atelier'))

@section('content')
    <section class="pt-32 pb-12 bg-light-green/30">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-5xl font-display font-bold text-primary-green mb-4">
                {{ t('Jurnal & Edukasi', 'Journal & Education') }}
            </h1>
            <p class="text-brand-gray text-lg max-w-2xl mx-auto">
                {{ t('Wawasan, sains, dan cerita dari dunia kopi spesialti Indonesia.', 'Insights, science, and stories from the world of Indonesian specialty coffee.') }}
            </p>
        </div>
    </section>

    <section class="py-20 px-4">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($articles as $article)
                    <a href="{{ route('article.show', $article->slug) }}" class="group block bg-white rounded-xl shadow-luxury hover:shadow-luxury-hover transition-all duration-300 overflow-hidden">
                        <div class="aspect-[16/9] overflow-hidden">
                            <img src="{{ $article->image }}" alt="{{ t($article->title_id, $article->title_en) }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy">
                        </div>
                        <div class="p-6">
                            <span class="inline-block px-3 py-1 text-xs font-semibold bg-light-green text-primary-green rounded-full mb-3">
                                {{ t($article->category_id, $article->category_en) }}
                            </span>
                            <h3 class="font-display font-semibold text-lg text-brand-text group-hover:text-primary-green transition-colors mb-2">
                                {{ t($article->title_id, $article->title_en) }}
                            </h3>
                            <p class="text-brand-gray text-sm mb-1">
                                {{ $article->date_published->format('d M Y') }} · {{ t($article->read_time_id, $article->read_time_en) }}
                            </p>
                            <p class="text-brand-gray text-sm leading-relaxed">
                                {{ t($article->summary_id, $article->summary_en) }}
                            </p>
                        </div>
                    </a>
                @empty
                    <div class="col-span-full text-center py-12 text-brand-gray">
                        {{ t('Belum ada artikel.', 'No articles yet.') }}
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
