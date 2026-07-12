@props(['faqs'])

<section class="py-20 px-4 sm:px-6 lg:px-8 bg-white">
    <div class="max-w-3xl mx-auto">
        <h2 class="font-display text-3xl sm:text-4xl font-bold text-gray-900 text-center mb-16">
            {{ t('Pertanyaan Umum', 'Frequently Asked Questions') }}
        </h2>

        <div x-data="{ open: null }" class="space-y-3">
            @foreach ($faqs as $faq)
                <div class="border border-gray-200 rounded-xl overflow-hidden">
                    <button
                        @click="open = open === {{ $faq->id }} ? null : {{ $faq->id }}"
                        class="w-full flex items-center justify-between px-6 py-4 text-left font-display text-lg font-semibold text-gray-900 hover:bg-gray-50 transition-colors duration-200"
                    >
                        <span>{{ t($faq->question_id, $faq->question_en) }}</span>
                        <svg
                            class="w-5 h-5 text-primary-green flex-shrink-0 transition-transform duration-300"
                            :class="{ 'rotate-45': open === {{ $faq->id }} }"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                    </button>

                    <div
                        x-show="open === {{ $faq->id }}"
                        x-collapse.duration.300ms
                        x-cloak
                    >
                        <div class="px-6 pb-4 text-gray-600 leading-relaxed">
                            {{ t($faq->answer_id, $faq->answer_en) }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
