@props(['faqs'])

<section class="py-20 sm:py-28 bg-white">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-14 space-y-3">
            <span class="text-xs font-bold text-accent-gold uppercase tracking-widest block">
                {{ t('Tanya Kami', 'ASK US') }}
            </span>
            <h2 class="font-display text-3xl sm:text-4xl lg:text-5xl font-extrabold text-primary-green leading-tight">
                {{ t('Pertanyaan Umum', 'Frequently Asked Questions') }}
            </h2>
            <p class="text-brand-gray text-sm max-w-xl mx-auto font-light">
                {{ t('Temukan jawaban atas pertanyaan umum seputar ekspor kopi spesialti kami.', 'Find answers to common questions about our specialty coffee export.') }}
            </p>
            <div class="mt-4 mx-auto w-16 h-1 bg-accent-gold rounded-full"></div>
        </div>

        <div x-data="{ open: null }" class="space-y-3">
            @foreach ($faqs as $faq)
                <div class="border border-gray-100 rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition-shadow duration-300">
                    <button
                        @click="open = open === {{ $faq->id }} ? null : {{ $faq->id }}"
                        class="w-full flex items-center justify-between px-6 sm:px-8 py-5 text-left transition-colors duration-200"
                        :class="open === {{ $faq->id }} ? 'bg-primary-green/5' : 'bg-white hover:bg-brand-bg/50'"
                    >
                        <span class="font-display text-base sm:text-lg font-bold text-primary-green pr-4 leading-snug">
                            {{ t($faq->question_id, $faq->question_en) }}
                        </span>
                        <span
                            class="flex-shrink-0 w-8 h-8 rounded-full flex items-center justify-center transition-all duration-300"
                            :class="open === {{ $faq->id }} ? 'bg-accent-gold text-primary-green rotate-45' : 'bg-brand-bg text-brand-gray'"
                        >
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4" />
                            </svg>
                        </span>
                    </button>

                    <div
                        x-show="open === {{ $faq->id }}"
                        x-collapse.duration.300ms
                        x-cloak
                    >
                        <div class="px-6 sm:px-8 pb-6 text-sm text-brand-gray leading-relaxed border-t border-gray-100 pt-5">
                            {{ t($faq->answer_id, $faq->answer_en) }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
