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
                            <a href="{{ route('services.create', ['service_id' => 0, 'service_type' => 'Ritiro Regolare dei Rifiuti']) }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-full transition duration-300 ease-in-out">
                                Richiedi ritiro regolare
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
                            <a href="{{ route('services.create', ['service_id' => 1, 'service_type' => 'Ritiro Occasionale e Ingombranti']) }}" class="inline-block bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-6 rounded-full transition duration-300 ease-in-out">
                                Richiedi ritiro occasionale
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
                            <a href="{{ route('services.premi.create') }}" class="inline-block bg-yellow-600 hover:bg-yellow-700 text-white font-bold py-2 px-6 rounded-full transition duration-300 ease-in-out">
                                Scopri i Premi
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>