@extends('layouts.app')

@section('content')
<div class="py-12 bg-gray-100">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h1 class="text-3xl font-bold text-gray-800 mb-6">Raccolta Differenziata: Lo Scopo</h1>
            <p class="text-gray-700 leading-relaxed mb-4">
                La raccolta differenziata è un pilastro fondamentale per la gestione sostenibile dei rifiuti. Il suo scopo principale è separare i materiali riciclabili (come carta, plastica, vetro, metalli e organico) dal rifiuto indifferenziato. Questo processo permette di ridurre la quantità di rifiuti destinati alle discariche o agli inceneritori, minimizzando l'impatto ambientale e favorendo il riutilizzo delle risorse.
            </p>

            {{-- Immagine sulla raccolta differenziata --}}
            <div class="my-6">
                <img src="{{ asset('images/immagine-raccolta.png') }}" alt="Immagine sulla raccolta differenziata" class="w-full h-64 object-cover rounded-lg shadow-md">
            </div>

            <p class="text-gray-700 leading-relaxed mb-8">
                Attraverso la differenziazione, i materiali vengono inviati a impianti di riciclo dove vengono trasformati in nuove materie prime, chiudendo il ciclo di vita dei prodotti e contribuendo a un'economia circolare. Questo non solo preserva le risorse naturali, ma riduce anche il consumo di energia e le emissioni di gas serra legate alla produzione di nuovi materiali. Partecipare attivamente alla raccolta differenziata significa contribuire direttamente alla tutela dell'ambiente, alla riduzione dell'inquinamento e alla creazione di un futuro più sostenibile per tutti.
            </p>

            <h2 class="text-2xl font-bold text-gray-800 mb-4">Orari ritiro raccolta differenziata</h2>
            <p class="text-gray-700 leading-relaxed mb-4">
                Di seguito trovi il calendario settimanale di raccolta per il quartiere San Paolo:
            </p>
            <ul class="list-disc list-inside text-gray-700 mb-4">
                <li>**Organico e bioplastiche compostabili**: Lunedì, Giovedì, Sabato</li>
                <li>**Non riciclabile**: Mercoledì</li>
                <li>**Plastica e Metalli**: Martedì</li>
                <li>**Carta**: Venerdì</li>
                <li>**Vetro**: Sabato</li>
            </ul>
            <p class="text-gray-700 leading-relaxed mb-4">
                **Orari di esposizione dei contenitori e sacchi:**
                <br>
                Devono essere esposti dalle ore 21:00 alle ore 24:00 del giorno precedente al passaggio di raccolta.
                <br>
                I rifiuti non riciclabili vanno conferiti in sacchi semitrasparenti non compresi nel kit (no sacchi neri o in bioplastica compostabile).
                <br>
                Per il **Cartone** (servizio esclusivo per esercizi commerciali): l'orario di conferimento è dalle ore 13:00 alle ore 14:00 del giorno di raccolta.
            </p>

            <h2 class="text-2xl font-bold text-gray-800 mb-4">Elenco Dettagliato delle Tipologie di Rifiuti</h2>

            {{-- Search Bar --}}
            <div class="mb-4">
                <input type="text" id="searchInput" placeholder="Cerca rifiuti (es. legn)..."
                       class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
            </div>

            <div class="overflow-x-auto shadow-md rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tipo di Rifiuto</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Categoria</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Dove Smaltire</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200" id="wasteTableBody">
                        @php
                            $rifiuti = [
                                ['tipo' => 'Abiti usati', 'smaltimento' => 'contenitori stradali per tessili e giocattoli/CCR', 'categoria' => 'Semi-riciclabile/Speciale'],
                                ['tipo' => 'Accendini', 'smaltimento' => 'non riciclabile', 'categoria' => 'Non Riciclabile'],
                                ['tipo' => 'Accumulatori per auto', 'smaltimento' => 'centro multimateriale', 'categoria' => 'Semi-riciclabile/Speciale'],
                                ['tipo' => 'Addobbi natalizi', 'smaltimento' => 'non riciclabile', 'categoria' => 'Non Riciclabile'],
                                ['tipo' => 'Adesivi', 'smaltimento' => 'non riciclabile', 'categoria' => 'Non Riciclabile'],
                                ['tipo' => 'Agende senza copertine di plastica o pelle', 'smaltimento' => 'carta/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Aghi delle siringhe (protetti con cappuccio)', 'smaltimento' => 'non riciclabile', 'categoria' => 'Non Riciclabile'],
                                ['tipo' => 'Alberi di Natale in plastica', 'smaltimento' => 'CCR', 'categoria' => 'Semi-riciclabile/Speciale'],
                                ['tipo' => 'Alberi di Natale veri', 'smaltimento' => 'CCR', 'categoria' => 'Semi-riciclabile/Speciale'],
                                ['tipo' => 'Alcool (contenitore vuoto e risciacquato)', 'smaltimento' => 'plastica e metalli/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Alimenti (scarti solidi)', 'smaltimento' => 'organico e bioplastiche compostabili/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Alluminio (serramenti ed ingombranti)', 'smaltimento' => 'CCR/ritiro su chiamata', 'categoria' => 'Semi-riciclabile/Speciale'],
                                ['tipo' => 'Alluminio piccole quantità (latte e lattine)', 'smaltimento' => 'plastica e metalli/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Ammoniaca (contenitore vuoto e risciacquato)', 'smaltimento' => 'plastica e metalli/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Armadio smontato', 'smaltimento' => 'CCR/ritiro su chiamata', 'categoria' => 'Semi-riciclabile/Speciale'],
                                ['tipo' => 'Asciugacapelli', 'smaltimento' => 'CCR', 'categoria' => 'Semi-riciclabile/Speciale'],
                                ['tipo' => 'Aspirapolvere', 'smaltimento' => 'CCR', 'categoria' => 'Semi-riciclabile/Speciale'],
                                ['tipo' => 'Asse da stiro', 'smaltimento' => 'CCR', 'categoria' => 'Semi-riciclabile/Speciale'],
                                ['tipo' => 'Assorbenti igienici', 'smaltimento' => 'non riciclabile', 'categoria' => 'Non Riciclabile'],
                                ['tipo' => 'Astuccio', 'smaltimento' => 'non riciclabile', 'categoria' => 'Non Riciclabile'],
                                ['tipo' => 'Attaccapanni (in ferro, in legno e in plastica)', 'smaltimento' => 'CCR', 'categoria' => 'Semi-riciclabile/Speciale'],
                                ['tipo' => 'Avanzi di pasto', 'smaltimento' => 'organico e bioplastiche compostabili/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Bacinelle in plastica', 'smaltimento' => 'plastica e metalli/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Bambole e giocattoli', 'smaltimento' => 'contenitori stradali per tessili e giocattoli/CCR', 'categoria' => 'Semi-riciclabile/Speciale'],
                                ['tipo' => 'Barattoli in metallo', 'smaltimento' => 'plastica e metalli/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Barattoli in plastica', 'smaltimento' => 'plastica e metalli/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Bastoncini per orecchie', 'smaltimento' => 'non riciclabile', 'categoria' => 'Non Riciclabile'],
                                ['tipo' => 'Bastoncini per orecchie compostabili', 'smaltimento' => 'organico e bioplastiche compostabili/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Batterie esauste', 'smaltimento' => 'centro multimateriale', 'categoria' => 'Semi-riciclabile/Speciale'],
                                ['tipo' => 'Batterie per autoveicoli', 'smaltimento' => 'centro multimateriale', 'categoria' => 'Semi-riciclabile/Speciale'],
                                ['tipo' => 'Batuffoli di cotone', 'smaltimento' => 'non riciclabile', 'categoria' => 'Non Riciclabile'],
                                ['tipo' => 'Biancheria', 'smaltimento' => 'contenitori stradali per tessili e giocattoli/CCR', 'categoria' => 'Semi-riciclabile/Speciale'],
                                ['tipo' => 'Bianchetto', 'smaltimento' => 'non riciclabile', 'categoria' => 'Non Riciclabile'],
                                ['tipo' => 'Bicchiere in plastica', 'smaltimento' => 'plastica e metalli/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Bicchieri in bioplastica biodegradabile e compostabile', 'smaltimento' => 'organico e bioplastiche compostabili/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Bicchiere in vetro', 'smaltimento' => 'non riciclabile', 'categoria' => 'Non Riciclabile'],
                                ['tipo' => 'Bicicletta', 'smaltimento' => 'CCR/ritiro su chiamata', 'categoria' => 'Semi-riciclabile/Speciale'],
                                ['tipo' => 'Bigiotteria', 'smaltimento' => 'non riciclabile', 'categoria' => 'Non Riciclabile'],
                                ['tipo' => 'Biglie in vetro/plastica', 'smaltimento' => 'non riciclabile', 'categoria' => 'Non Riciclabile'],
                                ['tipo' => 'Bilancia pesa persone', 'smaltimento' => 'CCR', 'categoria' => 'Semi-riciclabile/Speciale'],
                                ['tipo' => 'Biro e penne a sfera', 'smaltimento' => 'non riciclabile', 'categoria' => 'Non Riciclabile'],
                                ['tipo' => 'Blister vuoti di farmaci', 'smaltimento' => 'plastica e metalli/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Bombolette alluminio spray non pericolose (es.panna montata, deodoranti, etc)', 'smaltimento' => 'plastica e metalli/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Bombolette spray pericolose (con simbolo “T” o “F”)', 'smaltimento' => 'centro multimateriale', 'categoria' => 'Semi-riciclabile/Speciale'],
                                ['tipo' => 'Bottiglie e flaconi in plastica', 'smaltimento' => 'plastica e metalli/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Bottiglie e flaconi in bioplastiche compostabili', 'smaltimento' => 'organico e bioplastiche compostabili/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Bottiglie in vetro', 'smaltimento' => 'vetro/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Bottoni', 'smaltimento' => 'non riciclabile', 'categoria' => 'Non Riciclabile'],
                                ['tipo' => 'Brik (succo di frutta, latte, panna, ecc.)', 'smaltimento' => 'carta/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Bulloneria', 'smaltimento' => 'CCR', 'categoria' => 'Semi-riciclabile/Speciale'],
                                ['tipo' => 'Buste per alimenti (es. pasta, riso, salatini, patatine, merendine)', 'smaltimento' => 'plastica e metalli/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Caffè', 'smaltimento' => 'organico e bioplastiche compostabili/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Caffettiera', 'smaltimento' => 'CCR', 'categoria' => 'Semi-riciclabile/Speciale'],
                                ['tipo' => 'Calamita', 'smaltimento' => 'non riciclabile', 'categoria' => 'Non Riciclabile'],
                                ['tipo' => 'Calcolatrice', 'smaltimento' => 'CCR', 'categoria' => 'Semi-riciclabile/Speciale'],
                                ['tipo' => 'Calze e calzini (nylon, lana, cotone)', 'smaltimento' => 'contenitori stradali per tessili e giocattoli/CCR', 'categoria' => 'Semi-riciclabile/Speciale'],
                                ['tipo' => 'Candeggina (contenitore vuoto e risciacquato)', 'smaltimento' => 'plastica e metalli/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Candele e cera', 'smaltimento' => 'non riciclabile', 'categoria' => 'Non Riciclabile'],
                                ['tipo' => 'Cannuccia', 'smaltimento' => 'non riciclabile', 'categoria' => 'Non Riciclabile'],
                                ['tipo' => 'Capelli', 'smaltimento' => 'non riciclabile', 'categoria' => 'Non Riciclabile'],
                                ['tipo' => 'Capsule da caffè non compostabile', 'smaltimento' => 'non riciclabile', 'categoria' => 'Non Riciclabile'],
                                ['tipo' => 'Capsule da caffè compostabile', 'smaltimento' => 'organico e bioplastiche compostabili/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Carbone, carbonella e cenere spenta', 'smaltimento' => 'organico e bioplastiche compostabili/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Carne (avanzi)', 'smaltimento' => 'organico e bioplastiche compostabili/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Carta carbone', 'smaltimento' => 'non riciclabile', 'categoria' => 'Non Riciclabile'],
                                ['tipo' => 'Carta da forno non compostabile', 'smaltimento' => 'non riciclabile', 'categoria' => 'Non Riciclabile'],
                                ['tipo' => 'Carta da forno compostabile', 'smaltimento' => 'organico e bioplastiche compostabili/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Carta da pacchi', 'smaltimento' => 'carta/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Carta delle caramelle', 'smaltimento' => 'plastica e metalli/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Carta dell’uovo di Pasqua', 'smaltimento' => 'plastica e metalli/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Carta lucida e plastificata', 'smaltimento' => 'non riciclabile', 'categoria' => 'Non Riciclabile'],
                                ['tipo' => 'Carta oleata per alimenti non compostabili', 'smaltimento' => 'non riciclabile', 'categoria' => 'Non Riciclabile'],
                                ['tipo' => 'Carta oleata per alimenti compostabili', 'smaltimento' => 'organico e bioplastiche compostabili/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Carta patinata tipo rivista', 'smaltimento' => 'carta/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Carta per affettati', 'smaltimento' => 'non riciclabile', 'categoria' => 'Non Riciclabile'],
                                ['tipo' => 'Carta stagnola/foglio di alluminio', 'smaltimento' => 'plastica e metalli/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Carta vetrata', 'smaltimento' => 'non riciclabile', 'categoria' => 'Non Riciclabile'],
                                ['tipo' => 'Cartone (ridotto di volume)', 'smaltimento' => 'carta/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Cartone per bevande (es. latte, succo di frutta, vino, panna da cucina, ecc.)', 'smaltimento' => 'carta/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Cartone per la pizza (pulito)', 'smaltimento' => 'carta/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Cartone per la pizza (sporco)', 'smaltimento' => 'organico e bioplastiche compostabili/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Cartucce per toner esauste', 'smaltimento' => 'CCR', 'categoria' => 'Semi-riciclabile/Speciale'],
                                ['tipo' => 'Casse e cassette di legno', 'smaltimento' => 'CCR', 'categoria' => 'Semi-riciclabile/Speciale'],
                                ['tipo' => 'Casse e cassette di plastica (grandi dimensioni)', 'smaltimento' => 'CCR', 'categoria' => 'Semi-riciclabile/Speciale'],
                                ['tipo' => 'Casse e cassette di plastica (piccole dimensioni)', 'smaltimento' => 'plastica e metalli/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Cassette di ortofrutta di cartone', 'smaltimento' => 'carta/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Cassette audio e video', 'smaltimento' => 'non riciclabile', 'categoria' => 'Non Riciclabile'],
                                ['tipo' => 'Cd-rom', 'smaltimento' => 'non riciclabile', 'categoria' => 'Non Riciclabile'],
                                ['tipo' => 'Cellophane', 'smaltimento' => 'plastica e metalli/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Cellulari e caricabatteria', 'smaltimento' => 'CCR', 'categoria' => 'Semi-riciclabile/Speciale'],
                                ['tipo' => 'Cenere di camino (in modica quantità)', 'smaltimento' => 'organico e bioplastiche compostabili/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Cenere e cicche di sigarette', 'smaltimento' => 'non riciclabile', 'categoria' => 'Non Riciclabile'],
                                ['tipo' => 'Ceramica', 'smaltimento' => 'non riciclabile', 'categoria' => 'Non Riciclabile'],
                                ['tipo' => 'Cerotti', 'smaltimento' => 'non riciclabile', 'categoria' => 'Non Riciclabile'],
                                ['tipo' => 'Chiavi', 'smaltimento' => 'non riciclabile', 'categoria' => 'Non Riciclabile'],
                                ['tipo' => 'Ciabatte', 'smaltimento' => 'non riciclabile', 'categoria' => 'Non Riciclabile'],
                                ['tipo' => 'Cialde per caffè', 'smaltimento' => 'organico e bioplastiche compostabili/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Cibi cotti e crudi', 'smaltimento' => 'organico e bioplastiche compostabili/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Colle e collanti', 'smaltimento' => 'CCR', 'categoria' => 'Semi-riciclabile/Speciale'],
                                ['tipo' => 'Computer e componenti', 'smaltimento' => 'CCR', 'categoria' => 'Semi-riciclabile/Speciale'],
                                ['tipo' => 'Congelatore', 'smaltimento' => 'CCR', 'categoria' => 'Semi-riciclabile/Speciale'],
                                ['tipo' => 'Contenitori per alimenti di metallo', 'smaltimento' => 'plastica e metalli/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Contenitori in tetrapack per alimenti', 'smaltimento' => 'carta/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Coperchi metallici per barattoli', 'smaltimento' => 'plastica e metalli/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Coperte', 'smaltimento' => 'contenitori stradali per tessili e giocattoli/CCR', 'categoria' => 'Semi-riciclabile/Speciale'],
                                ['tipo' => 'Copertoni per automobili, biciclette e motorini (solo da utenze domestiche)', 'smaltimento' => 'CCR', 'categoria' => 'Semi-riciclabile/Speciale'],
                                ['tipo' => 'Cornici in plastica, metallo o legno verniciato', 'smaltimento' => 'CCR', 'categoria' => 'Semi-riciclabile/Speciale'],
                                ['tipo' => 'Cotone idrofilo', 'smaltimento' => 'non riciclabile', 'categoria' => 'Non Riciclabile'],
                                ['tipo' => 'Cristallo', 'smaltimento' => 'non riciclabile', 'categoria' => 'Non Riciclabile'],
                                ['tipo' => 'Crostacei (gusci)', 'smaltimento' => 'non riciclabile', 'categoria' => 'Non Riciclabile'],
                                ['tipo' => 'Custodia CD e DVD', 'smaltimento' => 'non riciclabile', 'categoria' => 'Non Riciclabile'],
                                ['tipo' => 'Damigiane', 'smaltimento' => 'CCR', 'categoria' => 'Semi-riciclabile/Speciale'],
                                ['tipo' => 'Dentifricio (tubetto vuoto)', 'smaltimento' => 'plastica e metalli/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Depliant', 'smaltimento' => 'carta/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Detersivo (scatola)', 'smaltimento' => 'carta/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Detersivo (flacone)', 'smaltimento' => 'plastica e metalli/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Diario', 'smaltimento' => 'carta/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Dischi', 'smaltimento' => 'non riciclabile', 'categoria' => 'Non Riciclabile'],
                                ['tipo' => 'Divani', 'smaltimento' => 'CCR/ritiro su chiamata', 'categoria' => 'Semi-riciclabile/Speciale'],
                                ['tipo' => 'Elastici', 'smaltimento' => 'non riciclabile', 'categoria' => 'Non Riciclabile'],
                                ['tipo' => 'Elettrodomestici', 'smaltimento' => 'CCR/ritiro su chiamata', 'categoria' => 'Semi-riciclabile/Speciale'],
                                ['tipo' => 'Erba (piccoli sfalci e potature)', 'smaltimento' => 'organico e bioplastiche compostabili/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Escrementi di animali domestici', 'smaltimento' => 'non riciclabile', 'categoria' => 'Non Riciclabile'],
                                ['tipo' => 'Etichette adesive', 'smaltimento' => 'non riciclabile', 'categoria' => 'Non Riciclabile'],
                                ['tipo' => 'Evidenziatori', 'smaltimento' => 'non riciclabile', 'categoria' => 'Non Riciclabile'],
                                ['tipo' => 'Faldoni in cartone', 'smaltimento' => 'carta/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Farmaci scaduti', 'smaltimento' => 'Contenitori posizionati presso gli esercenti/CCR', 'categoria' => 'Semi-riciclabile/Speciale'],
                                ['tipo' => 'Fazzoletti di carta', 'smaltimento' => 'organico e bioplastiche compostabili/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Fiammiferi', 'smaltimento' => 'organico e bioplastiche compostabili/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Fili elettrici', 'smaltimento' => 'non riciclabile', 'categoria' => 'Non Riciclabile'],
                                ['tipo' => 'Filo interdentale', 'smaltimento' => 'non riciclabile', 'categoria' => 'Non Riciclabile'],
                                ['tipo' => 'Filtri di tè e caffè', 'smaltimento' => 'organico e bioplastiche compostabili/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Fiori finti', 'smaltimento' => 'non riciclabile', 'categoria' => 'Non Riciclabile'],
                                ['tipo' => 'Fiori secchi e recisi', 'smaltimento' => 'organico e bioplastiche compostabili/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Flaconi per detersivi, detergenti ecc.', 'smaltimento' => 'plastica e metalli/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Fogli alluminio / stagnola puliti (es. coperchi yogurt)', 'smaltimento' => 'plastica e metalli/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Foglie', 'smaltimento' => 'organico e bioplastiche compostabili/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Fondi di caffè', 'smaltimento' => 'organico e bioplastiche compostabili/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Forbici', 'smaltimento' => 'CCR', 'categoria' => 'Semi-riciclabile/Speciale'],
                                ['tipo' => 'Forno elettrico o a gas', 'smaltimento' => 'CCR/ritiro su chiamata', 'categoria' => 'Semi-riciclabile/Speciale'],
                                ['tipo' => 'Fotografie', 'smaltimento' => 'non riciclabile', 'categoria' => 'Non Riciclabile'],
                                ['tipo' => 'Frigoriferi', 'smaltimento' => 'CCR/ritiro su chiamata', 'categoria' => 'Semi-riciclabile/Speciale'],
                                ['tipo' => 'Frutta', 'smaltimento' => 'organico e bioplastiche compostabili/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Ganci per chiudere i sacchetti', 'smaltimento' => 'plastica e metalli/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Garze', 'smaltimento' => 'non riciclabile', 'categoria' => 'Non Riciclabile'],
                                ['tipo' => 'Giocattoli', 'smaltimento' => 'contenitori stradali per tessili e giocattoli/CCR', 'categoria' => 'Semi-riciclabile/Speciale'],
                                ['tipo' => 'Giornali', 'smaltimento' => 'carta/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Gomma da masticare', 'smaltimento' => 'non riciclabile', 'categoria' => 'Non Riciclabile'],
                                ['tipo' => 'Gomma per cancellare', 'smaltimento' => 'non riciclabile', 'categoria' => 'Non Riciclabile'],
                                ['tipo' => 'Grucce appendiabiti in metallo o plastica', 'smaltimento' => 'plastica e metalli/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Grucce appendiabiti in legno', 'smaltimento' => 'CCR', 'categoria' => 'Semi-riciclabile/Speciale'],
                                ['tipo' => 'Guanti in gomma', 'smaltimento' => 'non riciclabile', 'categoria' => 'Non Riciclabile'],
                                ['tipo' => 'Guanti in pelle o lana', 'smaltimento' => 'contenitori stradali per tessili e giocattoli/CCR', 'categoria' => 'Semi-riciclabile/Speciale'],
                                ['tipo' => 'Gusci di frutta secca', 'smaltimento' => 'organico e bioplastiche compostabili/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Gusci di molluschi (cozze, vongole, ecc.)', 'smaltimento' => 'organico e bioplastiche compostabili/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Ingombranti (divani, letti, armadi)', 'smaltimento' => 'CCR/ritiro su chiamata', 'categoria' => 'Semi-riciclabile/Speciale'],
                                ['tipo' => 'Imballaggi con simboli PET,PE,PP,PVC', 'smaltimento' => 'plastica e metalli/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Imballaggi in bioplastiche compostabili', 'smaltimento' => 'organico e bioplastiche compostabili/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Imballaggi in carta o cartone', 'smaltimento' => 'carta/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Imballaggi in polistirolo di piccole dimensioni', 'smaltimento' => 'plastica e metalli/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Incarti in alluminio di cioccolatini', 'smaltimento' => 'plastica e metalli/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Incarti trasparenti (brioche, caramelle)', 'smaltimento' => 'plastica e metalli/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Lacca per capelli (contenitore vuoto)', 'smaltimento' => 'plastica e metalli/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Lacci per scarpe', 'smaltimento' => 'non riciclabile', 'categoria' => 'Non Riciclabile'],
                                ['tipo' => 'Lamette usa e getta', 'smaltimento' => 'non riciclabile', 'categoria' => 'Non Riciclabile'],
                                ['tipo' => 'Lampadari', 'smaltimento' => 'CCR', 'categoria' => 'Semi-riciclabile/Speciale'],
                                ['tipo' => 'Lampadine', 'smaltimento' => 'Contenitori posizionati presso gli esercenti', 'categoria' => 'Semi-riciclabile/Speciale'],
                                ['tipo' => 'Lastra di vetro', 'smaltimento' => 'CCR/ritiro su chiamata', 'categoria' => 'Semi-riciclabile/Speciale'],
                                ['tipo' => 'Lattine per bibite e conserve', 'smaltimento' => 'plastica e metalli/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Lavastoviglie e lavatrice', 'smaltimento' => 'CCR/ritiro su chiamata', 'categoria' => 'Semi-riciclabile/Speciale'],
                                ['tipo' => 'Legno da potatura', 'smaltimento' => 'CCR/ritiro su chiamata', 'categoria' => 'Semi-riciclabile/Speciale'],
                                ['tipo' => 'Legno verniciato', 'smaltimento' => 'CCR/ritiro su chiamata', 'categoria' => 'Semi-riciclabile/Speciale'],
                                ['tipo' => 'Lettiera compostabile per animali', 'smaltimento' => 'organico e bioplastiche compostabili/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Lettiera sintetica per animali', 'smaltimento' => 'non riciclabile', 'categoria' => 'Non Riciclabile'],
                                ['tipo' => 'Libri', 'smaltimento' => 'carta/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Lische di pesce', 'smaltimento' => 'organico e bioplastiche compostabili/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Materassi', 'smaltimento' => 'CCR/ritiro su chiamata', 'categoria' => 'Semi-riciclabile/Speciale'],
                                ['tipo' => 'Matite', 'smaltimento' => 'non riciclabile', 'categoria' => 'Non Riciclabile'],
                                ['tipo' => 'Medicine scadute', 'smaltimento' => 'Contenitori posizionati presso gli esercenti/CCR', 'categoria' => 'Semi-riciclabile/Speciale'],
                                ['tipo' => 'Mobili', 'smaltimento' => 'CCR/ritiro su chiamata', 'categoria' => 'Semi-riciclabile/Speciale'],
                                ['tipo' => 'Monitor', 'smaltimento' => 'CCR', 'categoria' => 'Semi-riciclabile/Speciale'],
                                ['tipo' => 'Mozziconi di sigaretta e sigari', 'smaltimento' => 'non riciclabile', 'categoria' => 'Non Riciclabile'],
                                ['tipo' => 'Musicassette', 'smaltimento' => 'non riciclabile', 'categoria' => 'Non Riciclabile'],
                                ['tipo' => 'Nastri per regali', 'smaltimento' => 'non riciclabile', 'categoria' => 'Non Riciclabile'],
                                ['tipo' => 'Nastro adesivo', 'smaltimento' => 'non riciclabile', 'categoria' => 'Non Riciclabile'],
                                ['tipo' => 'Negativi fotografici', 'smaltimento' => 'non riciclabile', 'categoria' => 'Non Riciclabile'],
                                ['tipo' => 'Noccioli/noci di cocco', 'smaltimento' => 'organico e bioplastiche compostabili/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Occhiali', 'smaltimento' => 'non riciclabile', 'categoria' => 'Non Riciclabile'],
                                ['tipo' => 'Olio alimentare usato', 'smaltimento' => 'CCR', 'categoria' => 'Semi-riciclabile/Speciale'],
                                ['tipo' => 'Olio per le automobili (solo da utenze domestiche)', 'smaltimento' => 'CCR', 'categoria' => 'Semi-riciclabile/Speciale'],
                                ['tipo' => 'Ossi (avanzi di cibo)', 'smaltimento' => 'organico e bioplastiche compostabili/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Ovatta', 'smaltimento' => 'non riciclabile', 'categoria' => 'Non Riciclabile'],
                                ['tipo' => 'Pallet o bancali', 'smaltimento' => 'CCR', 'categoria' => 'Semi-riciclabile/Speciale'],
                                ['tipo' => 'Palloni da gioco', 'smaltimento' => 'non riciclabile', 'categoria' => 'Non Riciclabile'],
                                ['tipo' => 'Panni elettrostatici per la polvere', 'smaltimento' => 'non riciclabile', 'categoria' => 'Non Riciclabile'],
                                ['tipo' => 'Pannolini e pannoloni', 'smaltimento' => 'non riciclabile/contenitore specifico per utenze che ne hanno fatto richiesta', 'categoria' => 'Non Riciclabile'],
                                ['tipo' => 'Pellicola trasparente per alimenti', 'smaltimento' => 'plastica e metalli/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Peluche', 'smaltimento' => 'contenitori stradali per tessili e giocattoli/CCR', 'categoria' => 'Semi-riciclabile/Speciale'],
                                ['tipo' => 'Pennarelli e penne', 'smaltimento' => 'non riciclabile', 'categoria' => 'Non Riciclabile'],
                                ['tipo' => 'Pennelli', 'smaltimento' => 'non riciclabile', 'categoria' => 'Non Riciclabile'],
                                ['tipo' => 'Padelle e pentole in metallo', 'smaltimento' => 'plastica e metalli/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Pesce', 'smaltimento' => 'organico e bioplastiche compostabili/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Pettine', 'smaltimento' => 'non riciclabile', 'categoria' => 'Non Riciclabile'],
                                ['tipo' => 'Piante (senza vaso e terra)', 'smaltimento' => 'organico e bioplastiche compostabili/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Piastrine per zanzare', 'smaltimento' => 'non riciclabile', 'categoria' => 'Non Riciclabile'],
                                ['tipo' => 'Piatti in ceramica/pirex/porcellana', 'smaltimento' => 'CCR', 'categoria' => 'Semi-riciclabile/Speciale'],
                                ['tipo' => 'Piatti in plastica e alluminio', 'smaltimento' => 'plastica e metalli/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Piatti in bioplastica compostabile', 'smaltimento' => 'organico e bioplastiche compostabili/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Pile', 'smaltimento' => 'Contenitori posizionati presso gli esercenti/CCR', 'categoria' => 'Semi-riciclabile/Speciale'],
                                ['tipo' => 'Pneumatici (solo da utenze domestiche)', 'smaltimento' => 'CCR', 'categoria' => 'Semi-riciclabile/Speciale'],
                                ['tipo' => 'Polistirolo (grandi dimensioni e quantità)', 'smaltimento' => 'CCR', 'categoria' => 'Semi-riciclabile/Speciale'],
                                ['tipo' => 'Polistirolo (vaschette per alimenti)', 'smaltimento' => 'plastica e metalli/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Poltrone', 'smaltimento' => 'CCR/ritiro su chiamata', 'categoria' => 'Semi-riciclabile/Speciale'],
                                ['tipo' => 'Polveri dell’aspirapolvere', 'smaltimento' => 'non riciclabile', 'categoria' => 'Non Riciclabile'],
                                ['tipo' => 'Porcellana', 'smaltimento' => 'CCR', 'categoria' => 'Semi-riciclabile/Speciale'],
                                ['tipo' => 'Porte', 'smaltimento' => 'CCR/ritiro su chiamata', 'categoria' => 'Semi-riciclabile/Speciale'],
                                ['tipo' => 'Posate in acciaio', 'smaltimento' => 'plastica e metalli/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Posate in plastica', 'smaltimento' => 'non riciclabile', 'categoria' => 'Non Riciclabile'],
                                ['tipo' => 'Preservativi/profilattici', 'smaltimento' => 'non riciclabile', 'categoria' => 'Non Riciclabile'],
                                ['tipo' => 'Quaderni', 'smaltimento' => 'carta/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Quadri', 'smaltimento' => 'CCR', 'categoria' => 'Semi-riciclabile/Speciale'],
                                ['tipo' => 'Quotidiani', 'smaltimento' => 'carta/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Radiografia', 'smaltimento' => 'non riciclabile', 'categoria' => 'Non Riciclabile'],
                                ['tipo' => 'Ramaglie', 'smaltimento' => 'CCR/ritiro su chiamata', 'categoria' => 'Semi-riciclabile/Speciale'],
                                ['tipo' => 'Rasoi usa e getta', 'smaltimento' => 'non riciclabile', 'categoria' => 'Non Riciclabile'],
                                ['tipo' => 'Reggette per legatura pacchi', 'smaltimento' => 'plastica e metalli/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Reti in plastica per frutta e verdura non compostabile', 'smaltimento' => 'plastica e metalli/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Reti in plastica per frutta e verdura compostabile', 'smaltimento' => 'organico e bioplastiche compostabili/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Reti per letti', 'smaltimento' => 'CCR/ritiro su chiamata', 'categoria' => 'Semi-riciclabile/Speciale'],
                                ['tipo' => 'Reti per recinzione', 'smaltimento' => 'CCR/ritiro su chiamata', 'categoria' => 'Semi-riciclabile/Speciale'],
                                ['tipo' => 'Righelli', 'smaltimento' => 'non riciclabile', 'categoria' => 'Non Riciclabile'],
                                ['tipo' => 'Riviste', 'smaltimento' => 'carta/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Rullino fotografico', 'smaltimento' => 'non riciclabile', 'categoria' => 'Non Riciclabile'],
                                ['tipo' => 'Sacchetti di plastica e alluminio', 'smaltimento' => 'plastica e metalli/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Sacchetto/shopper di carta', 'smaltimento' => 'carta/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Sacchetti per aspirapolvere', 'smaltimento' => 'non riciclabile', 'categoria' => 'Non Riciclabile'],
                                ['tipo' => 'Salviette umidificate', 'smaltimento' => 'non riciclabile', 'categoria' => 'Non Riciclabile'],
                                ['tipo' => 'Saponetta', 'smaltimento' => 'non riciclabile', 'categoria' => 'Non Riciclabile'],
                                ['tipo' => 'Scarpe e scarponi', 'smaltimento' => 'contenitori stradali per tessili e giocattoli/CCR', 'categoria' => 'Semi-riciclabile/Speciale'],
                                ['tipo' => 'Scarti di cucina, frutta e verdura', 'smaltimento' => 'organico e bioplastiche compostabili/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Scatole in carta e cartoncino', 'smaltimento' => 'carta/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Scatolette per alimenti in metallo', 'smaltimento' => 'plastica e metalli/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Scontrini fiscali termici', 'smaltimento' => 'non riciclabile', 'categoria' => 'Non Riciclabile'],
                                ['tipo' => 'Secchielli in plastica', 'smaltimento' => 'plastica e metalli/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Sedia', 'smaltimento' => 'CCR/ritiro su chiamata', 'categoria' => 'Semi-riciclabile/Speciale'],
                                ['tipo' => 'Segatura', 'smaltimento' => 'organico e bioplastiche compostabili/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Sfalci e potature', 'smaltimento' => 'CCR/ritiro su chiamata', 'categoria' => 'Semi-riciclabile/Speciale'],
                                ['tipo' => 'Sigarette', 'smaltimento' => 'non riciclabile', 'categoria' => 'Non Riciclabile'],
                                ['tipo' => 'Siringhe (ago protetto con cappuccio)', 'smaltimento' => 'non riciclabile', 'categoria' => 'Non Riciclabile'],
                                ['tipo' => 'Smalti per unghie (contenitore vuoto)', 'smaltimento' => 'non riciclabile', 'categoria' => 'Non Riciclabile'],
                                ['tipo' => 'Spazzole', 'smaltimento' => 'non riciclabile', 'categoria' => 'Non Riciclabile'],
                                ['tipo' => 'Spazzolini', 'smaltimento' => 'non riciclabile', 'categoria' => 'Non Riciclabile'],
                                ['tipo' => 'Specchi', 'smaltimento' => 'CCR', 'categoria' => 'Semi-riciclabile/Speciale'],
                                ['tipo' => 'Spugnette', 'smaltimento' => 'non riciclabile', 'categoria' => 'Non Riciclabile'],
                                ['tipo' => 'Stagnola / foglio alluminio (es. coperchi yogurt)', 'smaltimento' => 'plastica e metalli/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Stoviglie compostabili', 'smaltimento' => 'organico e bioplastiche compostabili/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Stracci sporchi', 'smaltimento' => 'non riciclabile', 'categoria' => 'Non Riciclabile'],
                                ['tipo' => 'Stuzzicadenti', 'smaltimento' => 'organico e bioplastiche compostabili/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Sughero', 'smaltimento' => 'organico e bioplastiche compostabili/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Taniche per uso domestico grandi', 'smaltimento' => 'CCR', 'categoria' => 'Semi-riciclabile/Speciale'],
                                ['tipo' => 'Taniche per uso domestico piccole', 'smaltimento' => 'plastica e metalli/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Tappeti e tappezzeria', 'smaltimento' => 'CCR', 'categoria' => 'Semi-riciclabile/Speciale'],
                                ['tipo' => 'Tappi in metallo e a corona', 'smaltimento' => 'plastica e metalli/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Tappi in plastica', 'smaltimento' => 'plastica e metalli/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Tappi in sughero', 'smaltimento' => 'organico e bioplastiche compostabili/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Tavoli', 'smaltimento' => 'CCR/ritiro su chiamata', 'categoria' => 'Semi-riciclabile/Speciale'],
                                ['tipo' => 'Tazzine in ceramica', 'smaltimento' => 'non riciclabile', 'categoria' => 'Non Riciclabile'],
                                ['tipo' => 'Televisori e telecomandi', 'smaltimento' => 'CCR/ritiro su chiamata', 'categoria' => 'Semi-riciclabile/Speciale'],
                                ['tipo' => 'Termometro', 'smaltimento' => 'contenitori presso i rivenditori (con farmaci scaduti)', 'categoria' => 'Semi-riciclabile/Speciale'],
                                ['tipo' => 'Terriccio per piante', 'smaltimento' => 'organico e bioplastiche compostabili/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Tetrapak (imballaggio latte, succhi, vino, panna)', 'smaltimento' => 'carta/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Toner e cartucce', 'smaltimento' => 'CCR', 'categoria' => 'Semi-riciclabile/Speciale'],
                                ['tipo' => 'Tovaglioli di carta', 'smaltimento' => 'organico e bioplastiche compostabili/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Tubetti in alluminio', 'smaltimento' => 'non riciclabile', 'categoria' => 'Non Riciclabile'],
                                ['tipo' => 'Unghie', 'smaltimento' => 'plastica e metalli/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Uova (gusci)', 'smaltimento' => 'organico e bioplastiche compostabili/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Vaschette di plastica o polistirolo per alimenti', 'smaltimento' => 'plastica e metalli/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Varschette in cartoncino per ortofrutta', 'smaltimento' => 'organico e bioplastiche compostabili/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Vasetti di plastica per yogurt', 'smaltimento' => 'plastica e metalli/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Vasetti di vetro per alimenti', 'smaltimento' => 'vetro/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Vasi in plastica da vivaio', 'smaltimento' => 'plastica e metalli/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Vasi in terracotta/cristallo', 'smaltimento' => 'CCR', 'categoria' => 'Semi-riciclabile/Speciale'],
                                ['tipo' => 'Vaso di vetro', 'smaltimento' => 'CCR', 'categoria' => 'Semi-riciclabile/Speciale'],
                                ['tipo' => 'Vassoio in cartoncino per pasticceria', 'smaltimento' => 'carta', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Vestiti usati', 'smaltimento' => 'contenitori stradali per tessili e giocattoli/CCR', 'categoria' => 'Semi-riciclabile/Speciale'],
                                ['tipo' => 'Yogurt (vasetti in plastica)', 'smaltimento' => 'plastica e metalli/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Yogurt (vasetti in bioplastica compostabile)', 'smaltimento' => 'organico e bioplastiche compostabili/CCR', 'categoria' => 'Riciclabile'],
                                ['tipo' => 'Zainetti', 'smaltimento' => 'contenitori stradali per tessili e giocattoli/CCR', 'categoria' => 'Semi-riciclabile/Speciale'],
                                ['tipo' => 'Zanzariera', 'smaltimento' => 'CCR', 'categoria' => 'Semi-riciclabile/Speciale'],
                                ['tipo' => 'Zerbino', 'smaltimento' => 'non riciclabile', 'categoria' => 'Non Riciclabile'],
                            ];
                        @endphp

                        @foreach($rifiuti as $rifiuto)
                            @php
                                $rowClass = '';
                                $badgeClass = '';
                                switch ($rifiuto['categoria']) {
                                    case 'Riciclabile':
                                        $rowClass = 'hover:bg-green-50/50';
                                        $badgeClass = 'bg-green-200 text-green-800';
                                        break;
                                    case 'Semi-riciclabile/Speciale':
                                        $rowClass = 'hover:bg-yellow-50/50';
                                        $badgeClass = 'bg-yellow-200 text-yellow-800';
                                        break;
                                    case 'Non Riciclabile':
                                        $rowClass = 'hover:bg-red-50/50';
                                        $badgeClass = 'bg-red-200 text-red-800';
                                        break;
                                }
                            @endphp
                            <tr class="border-b border-gray-200 {{ $rowClass }}">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $rifiuto['tipo'] }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <span class="py-1 px-3 rounded-full text-xs font-semibold {{ $badgeClass }}">{{ $rifiuto['categoria'] }}</span>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500">{{ $rifiuto['smaltimento'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Toggle Button --}}
            <div class="mt-4 text-center">
                <button id="toggleListButton"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    Mostra Tutti i Rifiuti
                </button>
            </div>

        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const tableBody = document.getElementById('wasteTableBody');
        const rows = Array.from(tableBody.querySelectorAll('tr'));
        const toggleButton = document.getElementById('toggleListButton');
        const searchInput = document.getElementById('searchInput');
        const initialVisibleRows = 10;
        let isExpanded = false; // Initial state

        // Function to update row visibility based on expanded state or search
        function updateVisibility() {
            const searchTerm = searchInput.value.toLowerCase().trim();
            let visibleCount = 0;

            rows.forEach((row, index) => {
                const wasteTypeCell = row.children[0]; // First td contains the waste type
                const wasteTypeName = wasteTypeCell.textContent.toLowerCase();

                const isMatchingSearch = searchTerm === '' || wasteTypeName.includes(searchTerm);

                if (isMatchingSearch) {
                    if (isExpanded || index < initialVisibleRows) {
                        row.style.display = ''; // Show row
                        visibleCount++;
                    } else {
                        row.style.display = 'none'; // Hide row if not expanded and beyond initial limit
                    }
                } else {
                    row.style.display = 'none'; // Hide if no match
                }
            });

            // Adjust button visibility and text based on filtered rows
            if (searchTerm !== '') {
                toggleButton.style.display = 'none'; // Hide toggle button during search
            } else {
                toggleButton.style.display = (rows.length > initialVisibleRows) ? '' : 'none';
                toggleButton.textContent = isExpanded ? 'Mostra Meno Rifiuti' : 'Mostra Tutti i Rifiuti';
            }
        }

        // Initial display
        updateVisibility();

        // Toggle button event listener
        toggleButton.addEventListener('click', function() {
            isExpanded = !isExpanded;
            updateVisibility();
        });

        // Search input event listener
        searchInput.addEventListener('keyup', function() {
            // When searching, temporarily "expand" the list to show all matching results
            // but the state `isExpanded` should only be controlled by the button for regular view.
            // Reset to default view when search is cleared.
            const searchTerm = searchInput.value.toLowerCase().trim();
            if (searchTerm === '') {
                isExpanded = false; // Reset to collapsed state when search is cleared
                updateVisibility();
            } else {
                // Keep `isExpanded` as is, but show all matching results regardless of index
                updateVisibility();
            }
        });
    });
</script>
@endsection