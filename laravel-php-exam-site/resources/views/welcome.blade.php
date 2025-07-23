@extends('layouts.app')

@section('content')
    <div class="bg-white min-h-screen pt-5 pb-8">
        <div class="container mx-auto px-2.5 grid grid-cols-1 md:grid-cols-3 gap-9">

            {{-- PRIMA COLONNA: Contatore Rifiuti E Nuovi Container di Servizio (1/3) --}}
            <div class="md:col-span-1 flex flex-col gap-9">

                {{-- Blocco Contatore Rifiuti --}}
                <div class="flex flex-col h-full md:h-[45vh] border border-gray-300">

                    {{-- Sezione Titolo --}}
                    <div class="p-4 bg-gray-800 text-white text-center flex-grow-0">
                        <h3 class="text-xl md:text-2xl font-bold mb-1">CONTATORE RIFIUTI BARI</h3>
                        <p class="text-xs md:text-sm">Tonnellate di rifiuti raccolte da inizio anno ad oggi:</p>
                    </div>

                    {{-- Blocco contenitore per TOTALI e DIFFERENZIATA, impilati --}}
                    <div class="flex flex-col flex-grow">

                        {{-- Riga per TOTALI + le 6 caselle dei numeri --}}
                        <div class="grid grid-cols-2 flex-grow border-t border-gray-300">
                            <div class="flex items-center justify-center bg-blue-500 text-white font-bold text-lg md:text-xl p-2 border-r border-gray-300">
                                TOTALI
                            </div>
                            <div class="grid grid-cols-6">
                                @php
                                    $displayTons = str_pad($formattedTons ?? '0', 6, '0', STR_PAD_LEFT);
                                @endphp
                                @for ($i = 0; $i < 6; $i++)
                                    <div class="flex items-center justify-center bg-gray-200 text-blue-800 font-bold text-xl md:text-2xl {{ $i < 5 ? 'border-r border-gray-300' : '' }}">
                                        {{ $displayTons[$i] ?? '0' }}
                                    </div>
                                @endfor
                            </div>
                        </div>

                        {{-- Riga per DIFFERENZIATA + le 6 caselle dei numeri --}}
                        <div class="grid grid-cols-2 flex-grow border-t border-gray-300">
                            <div class="flex items-center justify-center bg-green-500 text-white font-bold text-lg md:text-xl p-2 border-r border-gray-300">
                                DIFFERENZIATA
                            </div>
                            <div class="grid grid-cols-6">
                                @php
                                    $displayTons = str_pad($formattedTons ?? '0', 6, '0', STR_PAD_LEFT);
                                @endphp
                                @for ($i = 0; $i < 6; $i++)
                                    <div class="flex items-center justify-center bg-gray-200 text-blue-800 font-bold text-xl md:text-2xl {{ $i < 5 ? 'border-r border-gray-300' : '' }}">
                                        {{ $displayTons[$i] ?? '0' }}
                                    </div>
                                @endfor
                            </div>
                        </div>

                    </div>
                </div>

                {{-- NUOVI CONTAINER DI SERVIZIO (ORA NELLA COLONNA DI SINISTRA) --}}

                {{-- Container 1: Nuovo Servizio a Pagamento --}}
                <div class="border border-gray-300 p-6 bg-white shadow-sm md:h-[45vh] flex flex-col">
                    <h3 class="text-xl md:text-2xl font-bold text-gray-800 mb-4 flex-shrink-0">NUOVO SERVIZIO A PAGAMENTO DI RITIRO A DOMICILIO DEI RIFIUTI INGOMBRANTI</h3>
                    {{-- MODIFICATO: Testo in un div con overflow-hidden e flex-grow --}}
                    <div class="text-gray-700 leading-relaxed overflow-hidden flex-grow">
                        Per effettuare la richiesta di RITIRO&nbsp;
                    </div>
                    {{-- MODIFICATO: Link "Clicca qui" posizionato in fondo con flex-shrink-0 --}}
                    <div class="flex-shrink-0 mt-2 text-right"> {{-- mt-2 per un piccolo spazio tra testo e link, text-right per allineamento --}}
                        <a href="{{ url('/services') }}" class="text-blue-600 hover:underline font-semibold">Clicca qui</a>
                    </div>
                </div>

                {{-- Container 2: Ritiro Rifiuti Ingombranti Bari (Numero Verde) --}}
                <div class="border border-gray-300 p-6 bg-white shadow-sm md:h-[45vh] flex flex-col">
                    <h3 class="text-xl md:text-2xl font-bold text-gray-800 mb-4 flex-shrink-0">RITIRO RIFIUTI INGOMBRANTI BARI</h3>
                    {{-- MODIFICATO: Testo in un div con overflow-hidden e flex-grow --}}
                    <div class="text-gray-700 leading-relaxed text-sm overflow-hidden flex-grow">
                        Per effettuare prenotazioni relative al ritiro di rifiuti ingombranti è possibile&nbsp;
                        contattare il <strong class="text-blue-600">Numero Verde 800 - 011558</strong>, raggiungibile sia da telefono fisso che da cellulare&nbsp;dal lunedì al venerdì&nbsp;dalle 08.30 alle 13.30 e dalle&nbsp; 14.30 alle ore 17.00 -&nbsp;il&nbsp;sabato&nbsp;dalle 08.30 alle 13.30. Il Servizio non è attivo nelle&nbsp;domeniche e nelle festività.&nbsp;La chiamata è&nbsp;gratuita. Durante la telefonata saranno richiesti:<br>
                        &bullet; Codice fiscale dell'intestatario della TARI<br>
                        &bullet; Indirizzo presso cui deve essere effettuato il ritiro<br>
                        &bullet; Numero di telefono<br>
                        E' possibile, inoltre, effettuare la richiesta di RITIRO tramite portale web&nbsp;
                    </div>
                    {{-- MODIFICATO: Link "Clicca qui" posizionato in fondo con flex-shrink-0 --}}
                    <div class="flex-shrink-0 mt-2 text-right">
                        <a href="{{ url('/booking') }}" class="text-blue-600 hover:underline font-semibold">Clicca qui</a>
                    </div>
                </div>

                {{-- Container 3: Rifiuti Urbani Indifferenziati --}}
                <div class="border border-gray-300 p-6 bg-white shadow-sm md:h-[45vh] flex flex-col">
                    <h3 class="text-xl md:text-2xl font-bold text-gray-800 mb-4 flex-shrink-0">RIFIUTI URBANI INDIFFERENZIATI</h3>
                    {{-- MODIFICATO: Testo in un div con overflow-hidden e flex-grow --}}
                    <div class="text-gray-700 leading-relaxed overflow-hidden flex-grow">
                        I rifiuti urbani indifferenziati si conferiscono dal lunedì alla domenica Orari di conferimento:
                        <br>- dal 1° NOVEMBRE al 31 MARZO: ore 12,30 - 22,30
                        <br>- dal 1° APRILE al 31 OTTOBRE: ore&nbsp; 18,30 - 22,30
                    </div>
                    {{-- MODIFICATO: Nessun link in questo caso, quindi non c'è il div per il link. --}}
                </div>

            </div> {{-- Fine PRIMA COLONNA --}}


            {{-- SECONDA COLONNA: Ultime Notizie e Approfondimenti --}}
            <div class="md:col-span-2">
                {{-- Sezione Ultime Notizie e Approfondimenti --}}
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Ultime Notizie e Approfondimenti</h2>

                @if ($articles->isEmpty())
                    <p class="text-gray-600">Nessun articolo disponibile al momento.</p>
                @else
                    {{-- Articolo Grande (il più recente) --}}
                    @php
                        $latestArticle = $articles->shift();
                    @endphp

                    <div class="mb-12 overflow-hidden flex flex-col md:flex-row max-h-80 md:max-h-[25vh]">
                        <div class="w-full md:w-1/3 flex-shrink-0">
                            @if ($latestArticle->image)
                                <img src="{{ asset('storage/' . $latestArticle->image) }}" alt="{{ $latestArticle->title }}" class="w-full h-full object-cover">
                            @else
                                <img src="{{ $defaultImage }}" alt="Immagine di base per l'articolo" class="w-full h-full object-cover">
                            @endif
                        </div>
                        <div class="p-6 md:w-2/3 flex-grow">
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ $latestArticle->title }}</h3>
                            <p class="text-gray-600 text-sm mb-3">{{ \Carbon\Carbon::parse($latestArticle->date)->format('d/m/Y') }}</p>
                            <p class="text-gray-700 leading-relaxed text-sm">
                                {{ Str::limit($latestArticle->text, 180) }}
                                <a href="#" class="text-blue-600 hover:underline inline-block mt-2">Leggi tutto &rarr;</a>
                            </p>
                        </div>
                    </div>

                    {{-- Articoli Piccoli (due per riga), SENZA IMMAGINE --}}
                    <div class="grid grid-cols-1 md:grid-cols-2">
                        @foreach ($articles as $article)
                            <div class="overflow-hidden flex flex-col h-48">
                                <div class="p-4 flex-grow">
                                    <h4 class="text-lg font-semibold text-gray-900 mb-1">{{ $article->title }}</h4>
                                    <p class="text-gray-600 text-xs mb-2">{{ \Carbon\Carbon::parse($article->date)->format('d/m/Y') }}</p>
                                    <p class="text-gray-700 text-sm leading-normal">
                                        {{ Str::limit($article->text, 80) }}
                                        <a href="#" class="text-blue-600 hover:underline inline-block mt-2">Leggi tutto &rarr;</a>
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div> {{-- Fine SECONDA COLONNA --}}

        </div>
    </div>
@endsection