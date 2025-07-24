@extends('layouts.app')

@section('content')
<div class="py-12 bg-gray-100">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h1 class="text-3xl font-bold text-gray-800 mb-6">Ritiro Rifiuti Ingombranti</h1>
            <p class="text-gray-700 leading-relaxed mb-4">
                Il servizio di ritiro dei rifiuti ingombranti è dedicato a tutti quei materiali voluminosi che non possono essere smaltiti tramite la normale raccolta differenziata o indifferenziata. Questi includono mobili vecchi, elettrodomestici (RAEE), materassi, divani e altri oggetti di grandi dimensioni.
            </p>
            <p class="text-gray-700 leading-relaxed mb-4">
                Per garantire uno smaltimento corretto e rispettoso dell'ambiente, è fondamentale non abbandonare questi rifiuti per strada. Il nostro servizio di ritiro a domicilio ti permette di prenotare un appuntamento per il ritiro direttamente presso la tua abitazione, facilitando il processo e assicurando che i materiali vengano avviati al riciclo o smaltiti in modo appropriato.
            </p>
            <p class="text-gray-700 leading-relaxed">
                Contribuire alla gestione corretta degli ingombranti aiuta a mantenere la città pulita e a prevenire l'inquinamento.
            </p>
            <div class="mt-8 text-center">
                <a href="{{ route('services.create', ['type' => 'occasionale']) }}" class="inline-block bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-8 rounded-full text-lg transition duration-300 ease-in-out">
                    Richiedi Ritiro Ingombranti
                </a>
            </div>
        </div>
    </div>
</div>
@endsection