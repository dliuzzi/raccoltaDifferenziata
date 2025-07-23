<footer class="bg-gray-800 text-gray-300 py-8">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            {{-- Colonna 1: Informazioni sull'azienda --}}
            <div>
                <h3 class="text-lg font-semibold text-white mb-4">Ecoraccolta S.r.l.</h3>
                <p class="text-sm">
                    La nostra missione è promuovere un futuro più pulito e sostenibile attraverso servizi di raccolta differenziata efficienti e responsabili.
                </p>
            </div>

            {{-- Colonna 2: Contatti --}}
            <div>
                <h3 class="text-lg font-semibold text-white mb-4">Contatti</h3>
                <ul class="text-sm space-y-2">
                    <li><i class="fas fa-map-marker-alt mr-2"></i> Via della Raccolta, 10 - 70123 Bari (BA)</li>
                    <li><i class="fas fa-phone mr-2"></i> Tel: <a href="tel:+390801234567" class="hover:text-white transition-colors duration-200">+39 080 1234567</a></li>
                    <li><i class="fas fa-fax mr-2"></i> Fax: +39 080 7654321</li>
                    <li><i class="fas fa-envelope mr-2"></i> Email: <a href="mailto:info@ecoraccolta.it" class="hover:text-white transition-colors duration-200">info@ecoraccolta.it</a></li>
                    <li><i class="fas fa-globe mr-2"></i> PEC: <a href="mailto:pec@ecoraccolta.it" class="hover:text-white transition-colors duration-200">pec@ecoraccolta.it</a></li>
                </ul>
            </div>

            {{-- Colonna 3: Link Utili / Social Media --}}
            <div>
                <h3 class="text-lg font-semibold text-white mb-4">Link Utili</h3>
                <ul class="text-sm space-y-2">
                    <li><a href="#" class="hover:text-white transition-colors duration-200">Informativa sulla Privacy</a></li>
                    <li><a href="#" class="hover:text-white transition-colors duration-200">Cookie Policy</a></li>
                    <li><a href="#" class="hover:text-white transition-colors duration-200">Lavora con Noi</a></li>
                </ul>

                <h3 class="text-lg font-semibold text-white mt-6 mb-4">Seguici</h3>
                <div class="flex space-x-4">
                    <a href="https://www.facebook.com/ecoraccolta" target="_blank" class="text-gray-400 hover:text-white transition-colors duration-200">
                        <i class="fab fa-facebook-f fa-lg"></i>
                    </a>
                    <a href="https://www.twitter.com/ecoraccolta" target="_blank" class="text-gray-400 hover:text-white transition-colors duration-200">
                        <i class="fab fa-twitter fa-lg"></i>
                    </a>
                    <a href="https://www.linkedin.com/company/ecoraccolta" target="_blank" class="text-gray-400 hover:text-white transition-colors duration-200">
                        <i class="fab fa-linkedin-in fa-lg"></i>
                    </a>
                    {{-- Aggiungi altri social se necessario --}}
                </div>
            </div>
        </div>

        {{-- Copyright e Partita IVA --}}
        <div class="border-t border-gray-700 mt-8 pt-6 text-center text-sm">
            <p>&copy; {{ date('Y') }} Ecoraccolta S.r.l. Tutti i diritti riservati.</p>
            <p>P.IVA: 01234567890</p>
        </div>
    </div>
</footer>