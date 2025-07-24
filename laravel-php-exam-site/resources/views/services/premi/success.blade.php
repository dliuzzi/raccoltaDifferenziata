<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Richiesta Premio') }}
        </h2>
    </x-slot>
    <div class="py-24 flex flex-col justify-center items-center">
        <h1 class="text-4xl font-bold text-green-700 mb-8">Richiesta effettuata con successo</h1>
        <a href="/" class="px-6 py-3 bg-blue-600 text-white rounded-lg font-semibold text-lg hover:bg-blue-700 transition">Torna alla Home</a>
    </div>
</x-app-layout> 