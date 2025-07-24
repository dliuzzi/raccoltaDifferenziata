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
                    <form method="POST" action="{{ route('reward_requests.store') }}">
                        @csrf

                        {{-- Mostra punti disponibili --}}
                        <p class="mb-4 text-green-700 font-bold">Punti disponibili: {{ $userPoints }}</p>

                        {{-- Campo non modificabile per Tipo di Servizio --}}
                        <div class="mb-4">
                            <x-input-label for="service_type_display" :value="__('Tipo di Servizio')" class="!text-black" />
                            <x-text-input id="service_type_display" class="block mt-1 w-full" type="text" value="Richiesta premi ecologici" readonly />
                        </div>
                        <input type="hidden" name="service_type" value="Richiesta premi ecologici">
                        <input type="hidden" name="service_id" value="2">

                        {{-- Select per il premio --}}
                        <div>
                            <x-input-label for="reward_type" :value="__('Premio da riscattare')" class="!text-black" />
                            <select id="reward_type" name="reward_type" required class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                <option value="">Seleziona un premio</option>
                                @foreach ($displayOptions as $option)
                                    <option value="{{ $option }}" {{ old('reward_type') == $option ? 'selected' : '' }}>
                                        {{ $option }} ({{ $rewardCosts[$option] ?? 0 }} punti)
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('reward_type')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="description" :value="__('Descrizione (Dettagli aggiuntivi)')" class="!text-black" />
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