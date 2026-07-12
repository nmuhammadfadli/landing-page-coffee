<section class="bg-primary-green py-20">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="font-display text-3xl md:text-4xl font-bold text-white mb-6">
            {{ t('Siap Memulai Kerja Sama?', 'Ready to Start a Partnership?') }}
        </h2>

        <p class="text-white/80 text-lg leading-relaxed mb-10 max-w-2xl mx-auto">
            {{ t('Kami siap mendiskusikan kebutuhan kopi spesialti Anda. Hubungi tim kami untuk penawaran harga, sampel lot, atau kerja sama jangka panjang.', 'We\'re ready to discuss your specialty coffee needs. Contact our team for pricing, sample lots, or long-term partnership.') }}
        </p>

        <div class="flex flex-col sm:flex-row items-center justify-center gap-4 mb-14">
            <a
                href="https://wa.me/6281230860124"
                target="_blank"
                rel="noopener noreferrer"
                class="inline-flex items-center gap-2 bg-accent-gold text-primary-green font-semibold px-8 py-3.5 rounded-full hover:bg-accent-gold/90 transition-colors duration-200"
            >
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                </svg>
                {{ t('Hubungi Kami via WhatsApp', 'Contact Us via WhatsApp') }}
            </a>

            <a
                href="/catalog"
                class="inline-flex items-center gap-2 border-2 border-white text-white font-semibold px-8 py-3.5 rounded-full hover:bg-white/10 transition-colors duration-200"
            >
                {{ t('Lihat Katalog Lengkap', 'View Full Catalog') }}
            </a>
        </div>

        <div class="max-w-md mx-auto">
            <p class="text-white/70 text-sm mb-4">
                {{ t('Dapatkan update lot baru dan penawaran eksklusif.', 'Get updates on new lots and exclusive offers.') }}
            </p>

            <form
                x-data="{
                    email: '',
                    submitting: false,
                    message: '',
                    async submit() {
                        this.submitting = true;
                        this.message = '';
                        try {
                            const res = await fetch('/newsletter', {
                                method: 'POST',
                                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                                body: JSON.stringify({ email: this.email })
                            });
                            if (res.ok) {
                                this.message = '{{ t("Terima kasih! Email Anda telah terdaftar.", "Thank you! Your email has been registered.") }}';
                                this.email = '';
                            } else {
                                this.message = '{{ t("Terjadi kesalahan. Silakan coba lagi.", "Something went wrong. Please try again.") }}';
                            }
                        } catch {
                            this.message = '{{ t("Terjadi kesalahan. Silakan coba lagi.", "Something went wrong. Please try again.") }}';
                        } finally {
                            this.submitting = false;
                        }
                    }
                }"
                x-on:submit.prevent="submit"
                class="flex gap-2"
            >
                <label for="newsletter-email" class="sr-only">
                    {{ t('Alamat Email', 'Email Address') }}
                </label>
                <input
                    id="newsletter-email"
                    type="email"
                    x-model="email"
                    required
                    placeholder="{{ t('alamat@email.com', 'email@address.com') }}"
                    class="flex-1 px-4 py-2.5 rounded-full text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-accent-gold text-sm"
                >
                <button
                    type="submit"
                    x-bind:disabled="submitting"
                    class="bg-accent-gold text-primary-green font-semibold px-6 py-2.5 rounded-full text-sm hover:bg-accent-gold/90 transition-colors duration-200 disabled:opacity-50"
                >
                    <span x-show="!submitting">{{ t('Daftar', 'Subscribe') }}</span>
                    <span x-show="submitting">...</span>
                </button>
            </form>

            <p x-show="message" x-text="message" class="text-white/80 text-sm mt-3"></p>
        </div>
    </div>
</section>
