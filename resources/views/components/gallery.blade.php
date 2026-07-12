@props(['galleryPhotos'])

<section class="py-20 px-4 bg-white">
    <div class="max-w-7xl mx-auto">
        <h2 class="font-display text-3xl md:text-4xl font-bold text-center mb-12">
            {{ t('Galeri', 'Gallery') }}
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($galleryPhotos as $photo)
                <div class="relative group rounded-lg overflow-hidden shadow-luxury hover:shadow-luxury-hover transition-all duration-300">
                    <img
                        src="{{ $photo->image }}"
                        alt="{{ t($photo->title_id, $photo->title_en) }}"
                        class="w-full aspect-[4/3] object-cover"
                        loading="lazy"
                    >

                    <div class="absolute inset-0 bg-black/0 group-hover:bg-black/50 transition-all duration-300 flex flex-col items-center justify-center p-4">
                        <h3 class="text-white text-lg font-semibold font-display opacity-0 group-hover:opacity-100 transition-opacity duration-300 text-center">
                            {{ t($photo->title_id, $photo->title_en) }}
                        </h3>
                        @if ($photo->description_id || $photo->description_en)
                            <p class="text-white/80 text-sm mt-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300 text-center delay-75">
                                {{ t($photo->description_id, $photo->description_en) }}
                            </p>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
