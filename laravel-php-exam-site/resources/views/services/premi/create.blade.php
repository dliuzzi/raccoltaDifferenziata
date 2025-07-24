<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Richiedi il tuo Premio Ecologico') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- Visualizzazione Punti Attuali dell'Utente --}}
                    @if(isset($userPoints))
                        <div class="mb-6 p-4 bg-blue-100 border border-blue-400 text-blue-700 rounded-md">
                            I tuoi punti ecologici disponibili: <span class="font-bold text-xl">{{ $userPoints }}</span>
                        </div>
                    @endif

                    {{-- Messaggio di Errore Generale (es. per punti insufficienti) --}}
                    @if (session('error'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <strong class="font-bold">Attenzione!</strong>
                            <span class="block sm:inline">{{ session('error') }}</span>
                        </div>
                    @endif

                    {{-- Qui verranno visualizzati gli errori di validazione specifici per i campi --}}
                    @if ($errors->any())
                        <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded-md">
                            <ul class="list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                    {{-- Il form punta alla rotta corretta per le richieste di premi --}}
                    <form method="POST" action="{{ route('reward_requests.store') }}">
                        @csrf

                        {{-- Selezione del Premio da una Lista Fissa --}}
                        <div class="mt-4">
                            <x-input-label for="reward_type" :value="__('Scegli il Premio Ecologico')" />
                            <select id="reward_type" name="reward_type" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                <option value="">Seleziona un premio</option>
                                {{-- CAMBIA QUI: da $rewardOptions a $displayOptions --}}
                                @foreach($displayOptions as $option)
                                    <option value="{{ $option }}" {{ old('reward_type') == $option ? 'selected' : '' }}>
                                        {{ $option }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('reward_type')" class="mt-2" />
                        </div>

                        {{-- Campo per Descrizione Aggiuntiva (se "Altro" o per dettagli) --}}
                        <div class="mt-4">
                            <x-input-label for="description" :value="__('Dettagli aggiuntivi (es. colore, taglia, buono specifico)')"/>
                            <textarea id="description" name="description" rows="3" class="block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" placeholder="Specifica se hai scelto 'Altro' o per dettagli extra.">{{ old('description') }}</textarea>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        {{-- Campo Data e Ora di ritiro/consegna (Opzionale) --}}
                        <div class="mt-4">
                            <x-input-label for="scheduled_at" :value="__('Data e Ora di ritiro/consegna (Opzionale)')" />
                            <x-text-input id="scheduled_at" class="block mt-1 w-full" type="datetime-local" name="scheduled_at" :value="old('scheduled_at')" />
                            <x-input-error :messages="$errors->get('scheduled_at')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button>
                                {{ __('Richiedi Premio') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>