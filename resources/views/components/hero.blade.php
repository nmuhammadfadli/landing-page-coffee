<section
    x-data="{
        images: [
            'https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?q=80&w=1600&auto=format&fit=crop',
            'https://images.unsplash.com/photo-1447933601403-0c6688de566e?q=80&w=1600&auto=format&fit=crop',
            'https://images.unsplash.com/photo-1509042239860-f550ce710b93?q=80&w=1600&auto=format&fit=crop'
        ],
        activeSlide: 0,
        init() {
            setInterval(() => {
                this.activeSlide = (this.activeSlide + 1) % this.images.length;
            }, 6000);
        }
    }"
    class="relative min-h-screen overflow-hidden bg-[#060d08]"
>
    {{-- Slideshow backgrounds --}}
    @foreach ([
        'https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?q=80&w=1600&auto=format&fit=crop',
        'https://images.unsplash.com/photo-1447933601403-0c6688de566e?q=80&w=1600&auto=format&fit=crop',
        'https://images.unsplash.com/photo-1509042239860-f550ce710b93?q=80&w=1600&auto=format&fit=crop'
    ] as $i => $img)
    <div
        class="absolute inset-0 bg-cover bg-center transition-opacity duration-[1500ms] ease-in-out"
        :class="activeSlide === {{ $i }} ? 'opacity-100' : 'opacity-0'"
        style="background-image: url('{{ $img }}')"
    ></div>
    @endforeach

    {{-- Heavy dark overlay — biar teks terbaca jelas --}}
    <div class="absolute inset-0" style="background: linear-gradient(to top, rgba(4,10,6,0.92) 0%, rgba(4,10,6,0.55) 45%, rgba(4,10,6,0.35) 100%);"></div>
    <div class="absolute inset-0" style="background: linear-gradient(to right, rgba(4,10,6,0.4) 0%, transparent 60%);"></div>

    {{-- Gold accent line top --}}
    <div class="absolute top-0 left-0 right-0 h-px" style="background: linear-gradient(to right, transparent, rgba(201,168,76,0.5), transparent);"></div>

    {{-- Main content --}}
    <div class="relative z-10 flex flex-col min-h-screen">

        {{-- Center content --}}
        <div class="flex-1 flex flex-col items-center justify-center px-4 sm:px-6 text-center text-white pt-28 pb-8">

            {{-- Eyebrow badge --}}
            {{-- <div class="inline-flex items-center gap-3 px-5 py-2.5 mb-10 rounded-full" style="border: 1px solid rgba(201,168,76,0.35); background: rgba(201,168,76,0.06);">
                <span class="w-2 h-2 rounded-full bg-accent-gold flex-shrink-0" style="box-shadow: 0 0 6px rgba(201,168,76,0.8);"></span>
                <span class="text-xs font-bold uppercase tracking-[0.22em]" style="color: rgba(255,255,255,0.75);">
                    {{ t('Ekspor Kopi Spesialti · B2B Direct-Trade', 'B2B Specialty Coffee · Direct-Trade Export') }}
                </span>
            </div> --}}

            {{-- Headline — ukuran besar, eksplisit --}}
                <h2
                class="font-display font-bold text-white mb-6 max-w-6xl mx-auto text-center"
                style="font-size: clamp(2.3rem, 4.5vw, 4.2rem); line-height: 1.08;"
            >
                <span class="block">{{ t(
                    setting('hero_line1_id', 'Kopi Nusantara Spesialti Murni,'),
                    setting('hero_line1_en', 'Indonesian Specialty Coffee,')
                ) }}</span>
                <span class="block">{{ t(
                    setting('hero_line2_id', 'Siap Ekspor ke Seluruh Dunia.'),
                    setting('hero_line2_en', 'Ready to Export to the World.')
                ) }}</span>
            </h2>

            {{-- Subline --}}
            <p class="font-sans font-light tracking-widest mb-6"
               style="font-size: 0.95rem; color: rgba(255,255,255,0.45); letter-spacing: 0.2em;">
                Direct-Trade &nbsp;&nbsp;·&nbsp;&nbsp; Traceable &nbsp;&nbsp;·&nbsp;&nbsp; Competition Grade
            </p>

            {{-- Gold divider --}}
            <div class="mb-10 mx-auto" style="width: 40px; height: 1.5px; background: rgba(201,168,76,0.65); border-radius: 2px;"></div>

            {{-- CTA buttons --}}
            <div class="flex flex-col sm:flex-row gap-3 mb-28 sm:mb-32">
                <a
                    href="/catalog"
                    class="inline-flex items-center justify-center gap-2 font-sans font-semibold rounded-lg transition-all duration-300"
                    style="padding: 14px 28px; background: #1a4a2e; color: #fff; font-size: 0.875rem; letter-spacing: 0.04em; box-shadow: 0 4px 20px rgba(26,74,46,0.35);"
                    onmouseover="this.style.background='#174027'" onmouseout="this.style.background='#1a4a2e'"
                >
                    {{ t('Lihat Katalog & Penawaran', 'View Catalog & Offerings') }}
                    {{-- <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg> --}}
                </a>
                <a
                    href="https://wa.me/{{ setting('whatsapp_phone', '6281230860124') }}"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="inline-flex items-center justify-center gap-2 font-sans font-semibold rounded-lg transition-all duration-300"
                    style="padding: 14px 28px; border: 1px solid rgba(255,255,255,0.25); background: rgba(255,255,255,0.06); color: #fff; font-size: 0.875rem; letter-spacing: 0.04em;"
                >
                    <svg class="w-4 h-4 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                    </svg>
                    {{ t('Hubungi via WhatsApp', 'Contact via WhatsApp') }}
                </a>
            </div>
        </div>

        {{-- Stat bar --}}
        <div class="relative pb-10 px-4">
            <div class="max-w-sm mx-auto">
                <div class="grid grid-cols-3">
                    @php
                        $stats = [
                            ['value' => '8+',     'label_id' => 'Lots Tersedia',  'label_en' => 'Lots Available'],
                            ['value' => '88+',    'label_id' => 'Skor SCA',       'label_en' => 'SCA Score'],
                            ['value' => 'Global', 'label_id' => 'Jangkauan',      'label_en' => 'Reach'],
                        ];
                    @endphp
                    @foreach ($stats as $idx => $stat)
                    <div class="text-center py-5 {{ $idx === 1 ? '' : '' }}"
                         style="{{ $idx === 1 ? 'border-left: 1px solid rgba(255,255,255,0.1); border-right: 1px solid rgba(255,255,255,0.1);' : '' }}">
                        <div class="font-display font-bold text-white" style="font-size: 1.875rem; letter-spacing: -0.02em;">
                            {{ $stat['value'] }}
                        </div>
                        <div class="font-sans font-medium uppercase mt-1" style="font-size: 0.65rem; letter-spacing: 0.18em; color: rgba(255,255,255,0.38);">
                            {{ t($stat['label_id'], $stat['label_en']) }}
                        </div>
                    </div>
                    @endforeach
                </div>
                {{-- Gold separator line --}}
                <div style="height: 1px; background: linear-gradient(to right, transparent, rgba(201,168,76,0.3), transparent);"></div>
            </div>

            {{-- Scroll indicator --}}
            <div class="flex flex-col items-center mt-5 gap-1" style="opacity: 0.3;">
                <span class="font-sans font-bold uppercase tracking-[0.2em]" style="font-size: 0.6rem; color: rgba(255,255,255,0.6);">Scroll</span>
                <div style="width: 1px; height: 20px; background: linear-gradient(to bottom, rgba(255,255,255,0.5), transparent);"></div>
            </div>
        </div>

        {{-- Slide dots --}}
        <div class="absolute bottom-5 left-1/2 -translate-x-1/2 hidden sm:flex items-center gap-2 z-10">
            @for ($i = 0; $i < 3; $i++)
            <button
                @click="activeSlide = {{ $i }}"
                class="rounded-full transition-all duration-300"
                :class="activeSlide === {{ $i }} ? 'bg-accent-gold' : 'bg-white/25 hover:bg-white/50'"
                :style="activeSlide === {{ $i }} ? 'width: 20px; height: 5px;' : 'width: 5px; height: 5px;'"
                aria-label="Slide {{ $i + 1 }}"
            ></button>
            @endfor
        </div>
    </div>
</section>