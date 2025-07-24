<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Richiedi Nuovo Servizio di Raccolta') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- Mostra errori di validazione --}}
                    @if ($errors->any())
                        <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                            <ul class="list-disc pl-5">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="mb-2 text-xs text-blue-700">DEBUG: service_id = {{ $preselectedServiceId }}</div>
                    <form method="POST" action="{{ route('services.store') }}">
                        @csrf

                        <div>
                            <x-input-label for="service_type_display" :value="__('Tipo di Servizio')" />
                            {{-- CAMPO DI TESTO NON MODIFICABILE PER VISUALIZZARE IL TIPO DI SERVIZIO --}}
                            <x-text-input id="service_type_display" class="block mt-1 w-full" type="text"
                                value="{{ $preselectedServiceType }}" readonly />
                            {{-- Questo campo non è inviato con il form, è solo per visualizzazione --}}
                        </div>

                        {{-- CAMPO NASCOSTO AGGIUNTO PER SERVICE_TYPE: QUESTO SARÀ INVIATO AL CONTROLLER --}}
                        <input type="hidden" name="service_type" value="{{ $preselectedServiceType }}">

                        {{-- Campo nascosto per service_id --}}
                        <input type="hidden" name="service_id" value="{{ $preselectedServiceId }}">

                        <div class="mt-4">
                            <x-input-label for="description" :value="__('Descrizione (Dettagli aggiuntivi)')" />
                            <textarea id="description" name="description" rows="4" class="block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">{{ old('description') }}</textarea>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="scheduled_at" :value="__('Data e Ora Programmate')" />
                            <x-text-input id="scheduled_at" class="block mt-1 w-full" type="datetime-local" name="scheduled_at"
                                value="{{ $preselectedScheduledAt }}"
                                readonly
                                required
                            />
                            <x-input-error :messages="$errors->get('scheduled_at')" class="mt-2" />
                        </div>

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