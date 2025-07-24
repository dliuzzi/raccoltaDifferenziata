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
                            {{-- Campo service_type: readonly se pre-selezionato --}}
                            <x-text-input id="service_type" class="block mt-1 w-full" type="text" name="service_type"
                                :value="old('service_type', $preselectedServiceType ?? '')"
                                @if(isset($preselectedServiceType) && !empty($preselectedServiceType)) readonly @endif
                                required autofocus />
                            <x-input-error :messages="$errors->get('service_type')" class="mt-2" />
                        </div>

                        {{-- Campo nascosto per service_id --}}
                        {{-- Questo campo invierà il service_id numerico --}}
                        <input type="hidden" name="service_id" value="{{ old('service_id', $preselectedServiceId ?? '') }}">
                        <x-input-error :messages="$errors->get('service_id')" class="mt-2" />


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