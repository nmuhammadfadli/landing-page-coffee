<section class="py-16 px-4">
    <div class="max-w-7xl mx-auto">
        <h2 class="font-display text-3xl md:text-4xl font-bold text-center mb-12">
            {{ t('Jurnal & Edukasi', 'Journal & Education') }}
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($articles as $article)
                <div class="rounded-2xl overflow-hidden bg-white shadow-luxury hover:shadow-luxury-lg transition-shadow duration-300">
                    <img
                        src="{{ $article->image_url }}"
                        alt="{{ $article->title_id }}"
                        class="w-full h-48 object-cover"
                        loading="lazy"
                    >

                    <div class="p-5">
                        <span class="inline-block px-3 py-1 text-xs font-semibold rounded-full bg-light-green text-white mb-3">
                            {{ $article->category }}
                        </span>

                        <h3 class="font-display text-lg font-semibold mb-2 line-clamp-2">
                            <a href="/articles/{{ $article->slug }}" class="hover:text-light-green transition-colors">
                                {{ t($article->title_id, $article->title_en) }}
                            </a>
                        </h3>

                        <p class="text-sm text-gray-500 mb-3">
                            {{ $article->created_at->format('d M Y') }} &middot;
                            {{ t($article->read_time_id, $article->read_time_en) }}
                        </p>

                        <p class="text-sm text-gray-600 mb-4 line-clamp-3">
                            {{ t($article->summary_id, $article->summary_en) }}
                        </p>

                        <a href="/articles/{{ $article->slug }}" class="text-sm font-semibold text-light-green hover:underline">
                            {{ t('Baca Selengkapnya', 'Read More') }}
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
