<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Richiedi Nuovo Servizio di Raccolta') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('services.store') }}">
                        @csrf

                        <div>
                            <x-input-label for="service_type" :value="__('Tipo di Servizio')" />
                            <x-text-input id="service_type" class="block mt-1 w-full" type="text" name="service_type" :value="old('service_type')" required autofocus />
                            <x-input-error :messages="$errors->get('service_type')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="description" :value="__('Descrizione (Dettagli aggiuntivi)')" />
                            <textarea id="description" name="description" rows="4" class="block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">{{ old('description') }}</textarea>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="scheduled_at" :value="__('Data e Ora Programmate (Opzionale)')" />
                            <x-text-input id="scheduled_at" class="block mt-1 w-full" type="datetime-local" name="scheduled_at" :value="old('scheduled_at')" />
                            <x-input-error :messages="$errors->get('scheduled_at')" class="mt-2" />
                        </div>

                        {{-- Campo Stato (Status) - Commentato per ora.
                             Normalmente, lo stato iniziale di un servizio viene impostato dal backend (es. 'pending').
                             Se vuoi permettere all'utente di selezionare uno stato iniziale, decommenta questo blocco.
                        <div class="mt-4">
                            <x-input-label for="status" :value="__('Stato del Servizio')" />
                            <select id="status" name="status" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>In attesa</option>
                                <option value="scheduled" {{ old('status') == 'scheduled' ? 'selected' : '' }}>Programmato</option>
                                <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Completato</option>
                                <option value="cancelled" {{ old('status') == 'cancelled' ? 'selected' : '' }}>Annullato</option>
                            </select>
                            <x-input-error :messages="$errors->get('status')" class="mt-2" />
                        </div>
                        --}}

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button>
                                {{ __('Richiedi Servizio') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>