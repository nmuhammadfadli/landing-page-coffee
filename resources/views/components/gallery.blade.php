@props(['galleryPhotos'])

<section class="py-20 px-4 bg-white">
    <div class="max-w-7xl mx-auto">
        <h2 class="font-display text-3xl md:text-4xl font-bold text-center mb-12">
            {{ t('Galeri', 'Gallery') }}
        </h2>

        <div
            x-data="{ activePhoto: null }"
            class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4"
        >
            @foreach ($galleryPhotos as $photo)
                <div
                    class="relative group rounded-lg overflow-hidden shadow-luxury hover:shadow-luxury-hover transition-all duration-300 cursor-pointer"
                    @click="activePhoto = {{ $loop->index }}"
                >
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

        <div
            x-show="activePhoto !== null"
            x-cloak
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 z-50 flex items-center justify-center bg-black/90 p-4"
            @click.self="activePhoto = null"
        >
            <div class="relative max-w-4xl w-full max-h-[90vh] flex flex-col items-center">
                <button
                    @click="activePhoto = null"
                    class="absolute -top-12 right-0 text-white/70 hover:text-white transition-colors z-10"
                    aria-label="Close"
                >
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>

                @foreach ($galleryPhotos as $photo)
                    <template x-if="activePhoto === {{ $loop->index }}">
                        <div class="flex flex-col items-center">
                            <img
                                src="{{ $photo->image }}"
                                alt="{{ t($photo->title_id, $photo->title_en) }}"
                                class="max-h-[70vh] w-auto rounded-lg shadow-2xl"
                            >
                            <div class="mt-4 text-center text-white">
                                <h3 class="text-xl font-semibold font-display">
                                    {{ t($photo->title_id, $photo->title_en) }}
                                </h3>
                                @if ($photo->description_id || $photo->description_en)
                                    <p class="text-white/70 mt-2">
                                        {{ t($photo->description_id, $photo->description_en) }}
                                    </p>
                                @endif
                            </div>
                        </div>
                    </template>
                @endforeach
            </div>
        </div>
    </div>
</section>
