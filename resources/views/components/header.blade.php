<header
    x-data="{ scrolled: false, mobileOpen: false }"
    x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 20 })"
    :class="scrolled ? 'bg-white shadow-md' : 'bg-transparent'"
    class="fixed top-0 left-0 right-0 z-50 transition-all duration-300"
>
    <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">
            <a href="/" class="text-2xl font-display text-primary-green tracking-wide">
                Nayaka
            </a>

            <div class="hidden md:flex items-center space-x-10">
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
                        class="text-sm font-medium uppercase tracking-widest transition-colors duration-200
                            {{ request()->routeIs($link['name']) ? 'text-yellow-600' : 'text-brand-gray hover:text-primary-green' }}"
                    >
                        {{ t($link['label_id'], $link['label_en']) }}
                    </a>
                @endforeach
            </div>

            <div class="hidden md:flex items-center space-x-4">
                <form method="POST" action="/language">
                    @csrf
                    <input type="hidden" name="locale" value="en">
                    <button
                        type="submit"
                        class="text-sm font-medium uppercase tracking-widest text-brand-gray hover:text-primary-green transition-colors duration-200"
                    >
                        EN
                    </button>
                </form>

                <span class="text-brand-gray text-sm">|</span>

                <form method="POST" action="/language">
                    @csrf
                    <input type="hidden" name="locale" value="id">
                    <button
                        type="submit"
                        class="text-sm font-medium uppercase tracking-widest text-brand-gray hover:text-primary-green transition-colors duration-200"
                    >
                        ID
                    </button>
                </form>
            </div>

            <button
                @click="mobileOpen = !mobileOpen"
                class="md:hidden p-2 text-brand-gray hover:text-primary-green transition-colors duration-200"
                aria-label="Toggle navigation"
            >
                <svg x-show="!mobileOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
                <svg x-show="mobileOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        <div
            x-show="mobileOpen"
            x-cloak
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 -translate-y-4"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 -translate-y-4"
            class="md:hidden pb-6 space-y-3"
        >
            @foreach ($links as $link)
                <a
                    href="{{ $link['route'] }}"
                    class="block text-sm font-medium uppercase tracking-widest transition-colors duration-200
                        {{ request()->routeIs($link['name']) ? 'text-yellow-600' : 'text-brand-gray hover:text-primary-green' }}"
                >
                    {{ t($link['label_id'], $link['label_en']) }}
                </a>
            @endforeach

            <div class="flex items-center space-x-4 pt-3 border-t border-gray-100">
                <form method="POST" action="/language">
                    @csrf
                    <input type="hidden" name="locale" value="en">
                    <button type="submit" class="text-sm font-medium uppercase tracking-widest text-brand-gray hover:text-primary-green transition-colors duration-200">EN</button>
                </form>
                <span class="text-brand-gray text-sm">|</span>
                <form method="POST" action="/language">
                    @csrf
                    <input type="hidden" name="locale" value="id">
                    <button type="submit" class="text-sm font-medium uppercase tracking-widest text-brand-gray hover:text-primary-green transition-colors duration-200">ID</button>
                </form>
            </div>
        </div>
    </nav>
</header>
