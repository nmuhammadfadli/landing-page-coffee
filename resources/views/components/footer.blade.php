<footer class="bg-[#0b1e19] border-t border-white/5 text-white/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-12 lg:gap-16">
            
            <!-- Company Info Column -->
            <div class="md:col-span-5 space-y-6">
                <h3 class="text-2xl font-display font-extrabold text-accent-gold tracking-wide">
                    Nayaka Export Atelier
                </h3>
                <p class="text-sm text-white/60 leading-relaxed max-w-sm font-light">
                    {{ t(
                        'Nayaka Export Atelier adalah eksportir utama biji kopi hijau (green beans) spesialti Indonesia, kami menghubungkan langsung roastery global dengan perkebunan lokal berkelanjutan secara transparan, adil, dan berkualitas tinggi.',
                        'Nayaka Export Atelier is a premier exporter of Indonesian specialty green coffee beans, connecting global roasteries directly to local sustainable estates with transparency, fairness, and exceptional quality.'
                    ) }}
                </p>
                
                <!-- Social Icons -->
                <div class="flex gap-4">
                    <a href="#" class="w-10 h-10 rounded-xl bg-white/5 hover:bg-accent-gold hover:text-primary-green flex items-center justify-center transition-all duration-300 border border-white/10" aria-label="Instagram">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.051.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-xl bg-white/5 hover:bg-accent-gold hover:text-primary-green flex items-center justify-center transition-all duration-300 border border-white/10" aria-label="Facebook">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/></svg>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-xl bg-white/5 hover:bg-accent-gold hover:text-primary-green flex items-center justify-center transition-all duration-300 border border-white/10" aria-label="Twitter">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                    </a>
                </div>
            </div>

            <!-- Links Columns -->
            <div class="md:col-span-7 grid grid-cols-2 sm:grid-cols-3 gap-8">
                
                <!-- Navigation -->
                <div class="space-y-4">
                    <h4 class="text-accent-gold text-xs font-bold uppercase tracking-widest">
                        {{ t('Navigasi', 'Navigation') }}
                    </h4>
                    <ul class="space-y-2.5 text-sm text-white/50">
                        <li>
                            <a href="/" class="hover:text-accent-gold transition-colors">{{ t('Beranda', 'Home') }}</a>
                        </li>
                        <li>
                            <a href="/catalog" class="hover:text-accent-gold transition-colors">{{ t('Katalog Ekspor', 'Export Catalog') }}</a>
                        </li>
                        <li>
                            <a href="/about" class="hover:text-accent-gold transition-colors">{{ t('Tentang Kami', 'About Us') }}</a>
                        </li>
                        <li>
                            <a href="/faq" class="hover:text-accent-gold transition-colors">{{ t('FAQ Ekspor', 'Export FAQ') }}</a>
                        </li>
                    </ul>
                </div>

                <!-- Featured Lots -->
                <div class="space-y-4">
                    <h4 class="text-accent-gold text-xs font-bold uppercase tracking-widest">
                        {{ t('Lot Unggulan', 'Featured Lots') }}
                    </h4>
                    <ul class="space-y-2.5 text-sm text-white/50">
                        <li>
                            <a href="/catalog" class="hover:text-accent-gold transition-colors">Sumatra Gayo Anaerobic</a>
                        </li>
                        <li>
                            <a href="/catalog" class="hover:text-accent-gold transition-colors">Bali Kintamani Maceration</a>
                        </li>
                        <li>
                            <a href="/catalog" class="hover:text-accent-gold transition-colors">Java Preanger Washed</a>
                        </li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div class="space-y-4 col-span-2 sm:col-span-1">
                    <h4 class="text-accent-gold text-xs font-bold uppercase tracking-widest">
                        {{ t('Kontak & Alamat', 'Contact & Address') }}
                    </h4>
                    <ul class="space-y-2.5 text-sm text-white/50">
                        <li class="flex items-start gap-2">
                            <span>📍</span>
                            <span>Minggiran, Yogyakarta, Indonesia</span>
                        </li>
                        <li>
                            <a href="https://wa.me/6281230860124" target="_blank" rel="noopener noreferrer" class="hover:text-accent-gold transition-colors flex items-center gap-2">
                                <span>📞</span>
                                <span>+62 812-3086-0124</span>
                            </a>
                        </li>
                        <li class="flex items-center gap-2">
                            <span>✉️</span>
                            <span class="break-all">export@nayaka.com</span>
                        </li>
                    </ul>
                </div>

            </div>
        </div>

        <!-- Copyright Row -->
        <div class="mt-16 pt-8 border-t border-white/5 text-center text-xs text-white/40 flex flex-col sm:flex-row justify-between items-center gap-4">
            <p>&copy; {{ date('Y') }} Nayaka Export Atelier. {{ t('Seluruh hak cipta dilindungi.', 'All rights reserved.') }}</p>
            <div class="flex gap-6">
                <a href="#" class="hover:text-accent-gold transition-colors">{{ t('Syarat & Ketentuan', 'Terms & Conditions') }}</a>
                <a href="#" class="hover:text-accent-gold transition-colors">{{ t('Kebijakan Privasi', 'Privacy Policy') }}</a>
            </div>
        </div>
    </div>
</footer>
