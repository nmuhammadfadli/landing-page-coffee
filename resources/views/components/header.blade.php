<header class="bg-white border-b border-gray-100 sticky top-0 z-50">
    <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">
            <!-- Logo -->
            <a href="/" class="flex items-center gap-3 group">
                <div class="w-9 h-9 rounded-xl bg-accent-gold flex items-center justify-center font-display font-extrabold text-primary-green text-sm shadow-sm group-hover:shadow-md transition-shadow">
                    N
                </div>
                <div>
                    <span class="font-display font-extrabold text-lg text-primary-green tracking-tight block leading-none">
                        Nayaka
                    </span>
                    <span class="text-[10px] font-bold text-brand-gray uppercase tracking-[0.2em] block leading-none mt-0.5">
                        Export Atelier
                    </span>
                </div>
            </a>

            <!-- Desktop Nav -->
            <div class="hidden lg:flex items-center gap-1">
                @php
                    $links = [
                        ['label_id' => 'Beranda', 'label_en' => 'Home', 'route' => '/', 'name' => 'home'],
                        ['label_id' => 'Katalog', 'label_en' => 'Catalog', 'route' => '/catalog', 'name' => 'catalog'],
                        ['label_id' => 'Tentang', 'label_en' => 'About', 'route' => '/about', 'name' => 'about'],
                        ['label_id' => 'Artikel', 'label_en' => 'Articles', 'route' => '/articles', 'name' => 'articles'],
                        ['label_id' => 'FAQ', 'label_en' => 'FAQ', 'route' => '/faq', 'name' => 'faq'],
                    ];
                @endphp

                @foreach ($links as $link)
                    <a
                        href="{{ $link['route'] }}"
                        class="px-4 py-2 text-xs font-bold uppercase tracking-widest rounded-lg transition-all duration-200
                            {{ request()->routeIs($link['name'])
                                ? 'text-accent-gold bg-accent-gold/10'
                                : 'text-brand-gray hover:text-primary-green hover:bg-primary-green/5' }}"
                    >
                        {{ t($link['label_id'], $link['label_en']) }}
                    </a>
                @endforeach
            </div>

            <!-- Right Actions -->
            <div class="hidden lg:flex items-center gap-4">
                <div class="flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-gray-100">
                    <form method="POST" action="/language">
                        @csrf
                        <input type="hidden" name="locale" value="en">
                        <button type="submit"
                            class="text-[11px] font-bold uppercase tracking-wider px-2 py-1 rounded-md transition-all
                                {{ app()->getLocale() === 'en' ? 'bg-accent-gold text-primary-green shadow-sm' : 'text-brand-gray hover:text-primary-green' }}">
                            EN
                        </button>
                    </form>
                    <form method="POST" action="/language">
                        @csrf
                        <input type="hidden" name="locale" value="id">
                        <button type="submit"
                            class="text-[11px] font-bold uppercase tracking-wider px-2 py-1 rounded-md transition-all
                                {{ app()->getLocale() === 'id' ? 'bg-accent-gold text-primary-green shadow-sm' : 'text-brand-gray hover:text-primary-green' }}">
                            ID
                        </button>
                    </form>
                </div>

                <a
                    href="https://wa.me/{{ setting('whatsapp_phone', '6281230860124') }}"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="inline-flex items-center gap-2 bg-accent-gold hover:bg-accent-gold/90 text-primary-green font-bold text-xs uppercase tracking-widest px-5 py-2.5 rounded-xl transition-all duration-300 shadow-sm"
                >
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                    </svg>
                    {{ t('Hubungi', 'Contact') }}
                </a>
            </div>

            <!-- Mobile Toggle -->
            <div x-data="{ mobileOpen: false }" class="lg:hidden">
                <button
                    @click="mobileOpen = !mobileOpen"
                    class="p-2.5 rounded-xl text-brand-gray hover:bg-gray-100 transition-all"
                    aria-label="Toggle navigation"
                >
                    <svg x-show="!mobileOpen" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <svg x-show="mobileOpen" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" x-cloak>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>

                <div
                    x-show="mobileOpen"
                    x-cloak
                    x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 -translate-y-2"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    x-transition:leave="transition ease-in duration-150"
                    x-transition:leave-start="opacity-100 translate-y-0"
                    x-transition:leave-end="opacity-0 -translate-y-2"
                    class="absolute left-4 right-4 top-full mt-2 bg-white border border-gray-100 rounded-2xl shadow-xl p-4 space-y-1"
                >
                    @foreach ($links as $link)
                        <a
                            href="{{ $link['route'] }}"
                            class="block px-4 py-3 text-sm font-bold uppercase tracking-widest rounded-xl transition-all
                                {{ request()->routeIs($link['name']) ? 'text-accent-gold bg-accent-gold/10' : 'text-brand-gray hover:text-primary-green hover:bg-gray-50' }}"
                        >
                            {{ t($link['label_id'], $link['label_en']) }}
                        </a>
                    @endforeach

                    <div class="flex items-center justify-between pt-4 mt-4 border-t border-gray-100">
                        <div class="flex items-center gap-1.5">
                            <form method="POST" action="/language">
                                @csrf
                                <input type="hidden" name="locale" value="en">
                                <button type="submit"
                                    class="text-xs font-bold uppercase tracking-wider px-3 py-1.5 rounded-lg transition-all
                                        {{ app()->getLocale() === 'en' ? 'bg-accent-gold text-primary-green' : 'text-brand-gray hover:text-primary-green' }}">
                                    EN
                                </button>
                            </form>
                            <form method="POST" action="/language">
                                @csrf
                                <input type="hidden" name="locale" value="id">
                                <button type="submit"
                                    class="text-xs font-bold uppercase tracking-wider px-3 py-1.5 rounded-lg transition-all
                                        {{ app()->getLocale() === 'id' ? 'bg-accent-gold text-primary-green' : 'text-brand-gray hover:text-primary-green' }}">
                                    ID
                                </button>
                            </form>
                        </div>
                        <a href="https://wa.me/{{ setting('whatsapp_phone', '6281230860124') }}" target="_blank" rel="noopener noreferrer"
                           class="inline-flex items-center gap-2 bg-accent-gold text-primary-green font-bold text-xs uppercase tracking-widest px-4 py-2 rounded-xl">
                            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                            </svg>
                            {{ t('Hubungi', 'Contact') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>
