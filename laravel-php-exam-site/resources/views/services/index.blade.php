<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('I Nostri Servizi di Raccolta') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- NUOVA SEZIONE: CARD DEI SERVIZI DISPONIBILI --}}
            <div class="mb-12">
                <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Scopri i Servizi Disponibili</h2>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    {{-- Card 1: Ritiro Regolare dei Rifiuti --}}
                    <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col transform transition duration-300 hover:scale-105 hover:shadow-xl">
                        <div class="text-center mb-4 flex-shrink-0">
                            <i class="fa-solid fa-calendar-days text-6xl text-blue-500"></i>
                        </div>
                        <h3 class="text-xl font-semibold mb-4 text-gray-800 flex-shrink-0">Ritiro Regolare dei Rifiuti</h3>
                        <div class="text-gray-600 mb-4 text-sm leading-relaxed overflow-hidden flex-grow min-h-[80px]">
                            Scopri il calendario e le modalità per il ritiro quotidiano o settimanale dei rifiuti domestici e differenziati. Tutto quello che devi sapere per una corretta gestione.
                        </div>
                        <div class="text-center mt-auto flex-shrink-0">
                            {{-- MODIFICA QUI: Aggiunto ?type=regolare --}}
                            <a href="{{ route('services.create', ['type' => 'regolare']) }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-full transition duration-300 ease-in-out">
                                Dettagli Ritiro
                            </a>
                        </div>
                    </div>

                    {{-- Card 2: Ritiro Occasionale / Ingombranti --}}
                    <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col transform transition duration-300 hover:scale-105 hover:shadow-xl">
                        <div class="text-center mb-4 flex-shrink-0">
                            <i class="fa-solid fa-couch text-6xl text-green-500"></i>
                        </div>
                        <h3 class="text-xl font-semibold mb-4 text-gray-800 flex-shrink-0">Ritiro Occasionale e Ingombranti</h3>
                        <div class="text-gray-600 mb-4 text-sm leading-relaxed overflow-hidden flex-grow min-h-[80px]">
                            Hai mobili vecchi, elettrodomestici o altri rifiuti voluminosi? Richiedi il nostro servizio di ritiro occasionale a domicilio.
                        </div>
                        <div class="text-center mt-auto flex-shrink-0">
                            {{-- MODIFICA QUI: Aggiunto ?type=occasionale --}}
                            <a href="{{ route('services.create', ['type' => 'occasionale']) }}" class="inline-block bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-6 rounded-full transition duration-300 ease-in-out">
                                Richiedi Ritiro
                            </a>
                        </div>
                    </div>

                    {{-- Card 3: Riscatto Premi Ecologici --}}
                    <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col transform transition duration-300 hover:scale-105 hover:shadow-xl">
                        <div class="text-center mb-4 flex-shrink-0">
                            <i class="fa-solid fa-award text-6xl text-yellow-500"></i>
                        </div>
                        <h3 class="text-xl font-semibold mb-4 text-gray-800 flex-shrink-0">Riscatto Premi Ecologici</h3>
                        <div class="text-gray-600 mb-4 text-sm leading-relaxed overflow-hidden flex-grow min-h-[80px]">
                            Premia la tua scelta sostenibile! Scopri come accumulare punti con la raccolta differenziata e riscattare fantastiche premi.
                        </div>
                        <div class="text-center mt-auto flex-shrink-0">
                            {{-- MODIFICA QUI: Aggiunto ?type=premi --}}
                            <a href="{{ route('services.create', ['type' => 'premi']) }}" class="inline-block bg-yellow-600 hover:bg-yellow-700 text-white font-bold py-2 px-6 rounded-full transition duration-300 ease-in-out">
                                Scopri i Premi
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- SEZIONE ESISTENTE: RICHIESTE SERVIZI UTENTE --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-2xl font-bold mb-6 text-gray-800">Le Tue Richieste di Servizio</h2>
                    {{-- Questo pulsante standard non passerà un tipo specifico, quindi lo lascio così --}}
                    <a href="{{ route('services.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 mb-4">
                        Richiedi Nuovo Servizio
                    </a>

                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    @if ($services->isEmpty())
                        <p class="text-gray-600">Non hai ancora richiesto nessun servizio.</p>
                    @else
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Tipo Servizio
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Data Programmazione
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Stato
                                        </th>
                                        <th scope="col" class="relative px-6 py-3">
                                            <span class="sr-only">Azioni</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($services as $service)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                {{ $service->service_type }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{ $service->scheduled_at ? \Carbon\Carbon::parse($service->scheduled_at)->format('d/m/Y H:i') : 'Non programmato' }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{ ucfirst($service->status) }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <a href="{{ route('services.show', $service) }}" class="text-indigo-600 hover:text-indigo-900 mr-2">Vedi</a>
                                                <a href="{{ route('services.edit', $service) }}" class="text-yellow-600 hover:text-yellow-900 mr-2">Modifica</a>
                                                <form action="{{ route('services.destroy', $service) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Sei sicuro di voler eliminare questo servizio?')">Elimina</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
</x-app-layout>