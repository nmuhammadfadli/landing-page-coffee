<header
    x-data="{ scrolled: false, mobileOpen: false }"
    x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 20 })"
    :class="scrolled ? 'bg-[#0b1e19]/95 backdrop-blur-md shadow-lg border-b border-white/5' : 'bg-transparent'"
    class="fixed top-0 left-0 right-0 z-50 transition-all duration-300"
>
    <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-24">
            <!-- Brand Logo -->
            <a href="/" class="text-xl sm:text-2xl font-display font-extrabold text-white tracking-wide flex items-center gap-2">
                <span class="text-accent-gold">✦</span>
                <span>Nayaka<span class="text-accent-gold font-light text-xs sm:text-sm uppercase tracking-widest block sm:inline sm:ml-2">Export Atelier</span></span>
            </a>

            <!-- Desktop Links -->
            <div class="hidden md:flex items-center space-x-8">
                @php
                    $links = [
                        ['label_id' => 'Beranda', 'label_en' => 'Home', 'route' => '/', 'name' => 'home'],
                        ['label_id' => 'Katalog Ekspor', 'label_en' => 'Export Catalog', 'route' => '/catalog', 'name' => 'catalog'],
                        ['label_id' => 'Kisah Kopi', 'label_en' => 'About Us', 'route' => '/about', 'name' => 'about'],
                        ['label_id' => 'Wawasan Dagang', 'label_en' => 'Insights', 'route' => '/articles', 'name' => 'articles'],
                        ['label_id' => 'FAQ Ekspor', 'label_en' => 'Export FAQ', 'route' => '/faq', 'name' => 'faq'],
                    ];
                @endphp

                @foreach ($links as $link)
                    <a
                        href="{{ $link['route'] }}"
                        class="text-[11px] font-bold uppercase tracking-widest transition-all duration-200
                            {{ request()->routeIs($link['name']) ? 'text-accent-gold border-b-2 border-accent-gold pb-1' : 'text-white/70 hover:text-white' }}"
                    >
                        {{ t($link['label_id'], $link['label_en']) }}
                    </a>
                @endforeach
            </div>

            <!-- Language and Action CTAs -->
            <div class="hidden md:flex items-center space-x-6">
                <!-- Language Toggles -->
                <div class="flex items-center gap-2 border border-white/10 px-3 py-1.5 rounded-full bg-white/5 text-[10px] font-bold tracking-wider">
                    <form method="POST" action="/language" class="inline">
                        @csrf
                        <input type="hidden" name="locale" value="en">
                        <button
                            type="submit"
                            class="hover:text-accent-gold transition-colors {{ app()->getLocale() === 'en' ? 'text-accent-gold font-extrabold' : 'text-white/40' }}"
                        >
                            EN
                        </button>
                    </form>
                    <span class="text-white/20">|</span>
                    <form method="POST" action="/language" class="inline">
                        @csrf
                        <input type="hidden" name="locale" value="id">
                        <button
                            type="submit"
                            class="hover:text-accent-gold transition-colors {{ app()->getLocale() === 'id' ? 'text-accent-gold font-extrabold' : 'text-white/40' }}"
                        >
                            ID
                        </button>
                    </form>
                </div>

                <!-- Contact WhatsApp Button -->
                <a
                    href="https://wa.me/6281230860124"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="bg-accent-gold hover:bg-accent-gold/90 text-primary-green text-xs font-bold uppercase tracking-widest px-5 py-3 rounded-xl transition-all duration-300 shadow-lg shadow-accent-gold/10"
                >
                    {{ t('Hubungi Kami', 'Contact Us') }}
                </a>
            </div>

            <!-- Mobile Menu Toggle Button -->
            <button
                @click="mobileOpen = !mobileOpen"
                class="md:hidden p-2 text-white/80 hover:text-white transition-colors duration-200"
                aria-label="Toggle navigation"
            >
                <svg x-show="!mobileOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
                <svg x-show="mobileOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" x-cloak>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        <!-- Mobile Drawer -->
        <div
            x-show="mobileOpen"
            x-cloak
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 -translate-y-4"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 -translate-y-4"
            class="md:hidden pb-8 space-y-4 pt-2 border-t border-white/5"
        >
            @foreach ($links as $link)
                <a
                    href="{{ $link['route'] }}"
                    class="block text-xs font-bold uppercase tracking-widest transition-colors duration-200
                        {{ request()->routeIs($link['name']) ? 'text-accent-gold' : 'text-white/60 hover:text-white' }}"
                >
                    {{ t($link['label_id'], $link['label_en']) }}
                </a>
            @endforeach

            <!-- Language Toggle & Contact CTA on Mobile -->
            <div class="flex items-center justify-between pt-4 border-t border-white/5 gap-4">
                <div class="flex items-center gap-3 text-[11px] font-bold">
                    <form method="POST" action="/language">
                        @csrf
                        <input type="hidden" name="locale" value="en">
                        <button type="submit" class="hover:text-accent-gold transition-colors {{ app()->getLocale() === 'en' ? 'text-accent-gold' : 'text-white/40' }}">EN</button>
                    </form>
                    <span class="text-white/20">|</span>
                    <form method="POST" action="/language">
                        @csrf
                        <input type="hidden" name="locale" value="id">
                        <button type="submit" class="hover:text-accent-gold transition-colors {{ app()->getLocale() === 'id' ? 'text-accent-gold' : 'text-white/40' }}">ID</button>
                    </form>
                </div>
                
                <a
                    href="https://wa.me/6281230860124"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="bg-accent-gold text-primary-green text-[10px] font-bold uppercase tracking-wider px-4 py-2.5 rounded-lg"
                >
                    {{ t('Hubungi Kami', 'Contact Us') }}
                </a>
            </div>
        </div>
    </nav>
</header>
