@props(['articles'])

<section class="py-20 sm:py-28 bg-white border-t border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header Section -->
        <div class="text-center mb-16 space-y-3">
            <span class="text-xs font-bold text-accent-gold uppercase tracking-widest block">
                {{ t('Sorotan Kabar Ekspor', 'EXPORT JOURNAL & NEWS') }}
            </span>
            <h2 class="font-display text-3xl sm:text-4xl lg:text-5xl font-extrabold text-primary-green">
                {{ t('Jurnal & Edukasi & Kronik Kopi Spesialti', 'Journal, Education & Specialty Coffee Chronicle') }}
            </h2>
            <div class="mt-4 mx-auto w-16 h-1 bg-accent-gold rounded-full"></div>
        </div>

        <!-- Articles Grid (Premium Layout) -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($articles as $article)
                <div class="group flex flex-col h-full bg-white border border-gray-100 rounded-3xl overflow-hidden shadow-luxury hover:shadow-luxury-hover hover:-translate-y-1 transition-all duration-300">
                    
                    <!-- Card Image -->
                    <a href="/articles/{{ $article->slug }}" class="block relative overflow-hidden aspect-[16/10] bg-gray-50">
                        <img
                            src="{{ $article->image }}"
                            alt="{{ t($article->title_id, $article->title_en) }}"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out"
                            loading="lazy"
                        >
                        <div class="absolute inset-0 bg-gradient-to-t from-black/20 via-transparent to-transparent"></div>
                    </a>

                    <!-- Card Body -->
                    <div class="flex-1 flex flex-col p-6 space-y-4">
                        
                        <!-- Meta Info Row -->
                        <div class="flex items-center gap-3">
                            <span class="px-2.5 py-1 text-[10px] font-bold uppercase tracking-wider bg-light-green text-primary-green rounded-lg">
                                {{ t($article->category_id, $article->category_en) }}
                            </span>
                            <span class="text-[11px] text-brand-gray/80 font-medium">
                                {{ $article->date_published->format('d M Y') }}
                            </span>
                        </div>

                        <!-- Title and Summary -->
                        <div class="space-y-2">
                            <h3 class="font-display text-lg font-bold text-primary-green group-hover:text-accent-gold transition-colors duration-200 line-clamp-2 leading-snug">
                                <a href="/articles/{{ $article->slug }}">
                                    {{ t($article->title_id, $article->title_en) }}
                                </a>
                            </h3>
                            <p class="text-xs text-brand-gray font-light leading-relaxed line-clamp-3">
                                {{ t($article->summary_id, $article->summary_en) }}
                            </p>
                        </div>

                        <!-- Read Time & Baca Jurnal link (Footer Row) -->
                        <div class="mt-auto pt-4 border-t border-gray-100 flex items-center justify-between">
                            <span class="text-[11px] text-brand-gray/60 font-semibold tracking-wide uppercase">
                                {{ t($article->read_time_id, $article->read_time_en) }}
                            </span>
                            
                            <a
                                href="/articles/{{ $article->slug }}"
                                class="inline-flex items-center text-xs font-extrabold uppercase tracking-widest text-primary-green hover:text-accent-gold transition-colors duration-200"
                            >
                                {{ t('Baca Jurnal', 'Read Article') }}
                                <svg class="w-3.5 h-3.5 ml-1.5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                </svg>
                            </a>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>

    </div>
</section>
