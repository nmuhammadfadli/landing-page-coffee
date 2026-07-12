@extends('layouts.app')

@section('title', t($article->title_id, $article->title_en) . ' — Nayaka Export Atelier')

@section('content')
    <article class="py-20">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <a href="{{ route('articles') }}" class="inline-flex items-center text-brand-gray hover:text-primary-green transition-colors mb-8">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                {{ t('Kembali ke Artikel', 'Back to Articles') }}
            </a>

            <div class="mb-8">
                <span class="inline-block px-3 py-1 text-sm font-semibold bg-light-green text-primary-green rounded-full mb-4">
                    {{ t($article->category_id, $article->category_en) }}
                </span>
                <h1 class="text-3xl md:text-4xl font-display font-bold text-primary-green mb-4">
                    {{ t($article->title_id, $article->title_en) }}
                </h1>
                <div class="flex items-center gap-4 text-brand-gray text-sm">
                    <span>{{ $article->date_published->format('d F Y') }}</span>
                    <span>·</span>
                    <span>{{ t($article->read_time_id, $article->read_time_en) }}</span>
                </div>
            </div>

            <div class="aspect-[16/9] rounded-2xl overflow-hidden shadow-luxury mb-8">
                <img src="{{ $article->image }}" alt="{{ t($article->title_id, $article->title_en) }}" class="w-full h-full object-cover">
            </div>

            <div class="prose prose-lg max-w-none">
                <p class="text-lg text-brand-gray leading-relaxed mb-8">
                    {{ t($article->summary_id, $article->summary_en) }}
                </p>

                @if($article->body_intro_id)
                    <blockquote class="border-l-4 border-accent-gold pl-6 italic text-brand-text my-8 text-xl font-display">
                        {{ t($article->body_intro_id, $article->body_intro_en) }}
                    </blockquote>
                @endif

                @if($article->body_p1_id)
                    <div class="mb-6 leading-relaxed">{!! t($article->body_p1_id, $article->body_p1_en) !!}</div>
                @endif

                @if($article->pull_quote_id)
                    <blockquote class="border-l-4 border-accent-gold pl-6 italic text-primary-green my-8 text-xl font-display font-semibold">
                        {{ t($article->pull_quote_id, $article->pull_quote_en) }}
                    </blockquote>
                @endif

                @if($article->body_p2_id)
                    <div class="mb-6 leading-relaxed">{!! t($article->body_p2_id, $article->body_p2_en) !!}</div>
                @endif

                @if($article->body_p3_id)
                    <div class="mb-6 leading-relaxed">{!! t($article->body_p3_id, $article->body_p3_en) !!}</div>
                @endif
            </div>

            <div class="mt-12 pt-8 border-t border-gray-200 flex items-center justify-between">
                <span class="text-brand-gray text-sm">{{ t('Bagikan artikel ini', 'Share this article') }}</span>
                <div class="flex gap-3">
                    <a href="https://wa.me/?text={{ urlencode(t($article->title_id, $article->title_en)) }}" target="_blank" class="p-2 bg-light-green rounded-full text-primary-green hover:bg-primary-green hover:text-white transition-colors">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                    </a>
                </div>
            </div>
        </div>
    </article>
@endsection
