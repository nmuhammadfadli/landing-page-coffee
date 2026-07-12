<section class="py-16 sm:py-20 px-4 bg-brand-bg">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-12 space-y-3">
            <span class="text-xs font-bold text-accent-gold uppercase tracking-widest block">
                {{ t('Jurnal & Edukasi', 'JOURNAL & EDUCATION') }}
            </span>
            <h2 class="font-display text-3xl sm:text-4xl font-bold text-primary-green">
                {{ t('Wawasan & Kronik Kopi', 'Coffee Insights & Chronicle') }}
            </h2>
            <div class="mt-4 mx-auto w-16 h-1 bg-accent-gold rounded-full"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($articles as $article)
                <div class="rounded-2xl overflow-hidden bg-white shadow-luxury hover:shadow-luxury-hover hover:-translate-y-1 transition-all duration-300">
                    <div class="aspect-[16/9] overflow-hidden bg-gray-100">
                        <img
                            src="{{ $article->image }}"
                            alt="{{ t($article->title_id, $article->title_en) }}"
                            class="w-full h-full object-cover hover:scale-105 transition-transform duration-500"
                            loading="lazy"
                        >
                    </div>

                    <div class="p-6 space-y-3">
                        <div class="flex items-center gap-3">
                            <span class="inline-block px-3 py-1 text-[10px] font-bold uppercase tracking-wider rounded-full bg-light-green text-primary-green">
                                {{ t($article->category_id, $article->category_en) }}
                            </span>
                            <span class="text-xs text-brand-gray/70">
                                {{ $article->date_published->format('d M Y') }}
                            </span>
                        </div>

                        <h3 class="font-display text-lg font-bold text-primary-green line-clamp-2 leading-snug">
                            <a href="{{ route('article.show', $article->slug) }}" class="hover:text-accent-gold transition-colors">
                                {{ t($article->title_id, $article->title_en) }}
                            </a>
                        </h3>

                        <p class="text-sm text-brand-gray line-clamp-3 font-light leading-relaxed">
                            {{ t($article->summary_id, $article->summary_en) }}
                        </p>

                        <div class="pt-3 flex items-center justify-between">
                            <span class="text-xs text-brand-gray/60 font-semibold tracking-wide uppercase">
                                {{ t($article->read_time_id, $article->read_time_en) }}
                            </span>
                            <a href="{{ route('article.show', $article->slug) }}"
                               class="inline-flex items-center gap-1 text-xs font-bold uppercase tracking-widest text-accent-gold hover:text-primary-green transition-colors">
                                {{ t('Baca', 'Read') }}
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
