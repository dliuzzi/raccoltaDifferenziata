@extends('layouts.app') {{-- Assicurati che 'layouts.app' sia il tuo layout principale --}}

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            {{-- Immagine dell'articolo --}}
            @if ($article->image)
                {{-- Questo percorso dipende da dove salvi le immagini degli articoli, se non è in "images/" --}}
                {{-- Se le immagini degli articoli caricate sono ancora in public/images/storage/, lascia così: --}}
                <img src="{{ asset('images/storage/' . $article->image) }}" alt="{{ $article->title }}" class="w-full h-96 object-cover">
                {{-- Altrimenti, se sono direttamente in public/images/, usa: --}}
                {{-- <img src="{{ asset('images/' . $article->image) }}" alt="{{ $article->title }}" class="w-full h-96 object-cover"> --}}
            @else
                {{-- Immagine di fallback che punta al percorso reale --}}
                <img src="{{ asset('images/default-article.jpg') }}" alt="Immagine di default" class="w-full h-96 object-cover">
            @endif

            <div class="p-6">
                {{-- Titolo --}}
                <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $article->title }}</h1>

                {{-- Data --}}
                <p class="text-gray-600 text-sm mb-4">Pubblicato il: {{ \Carbon\Carbon::parse($article->date)->format('d/m/Y') }}</p>

                <hr class="my-4">

                {{-- Contenuto completo dell'articolo --}}
                <div class="text-gray-700 leading-relaxed text-base prose max-w-none">
                    {!! $article->text !!} {{-- Usa {!! !!} se il tuo contenuto contiene HTML (es. da un editor WYSIWYG) --}}
                </div>

                {{-- Pulsante per tornare indietro --}}
                <div class="mt-8 text-center">
                    <a href="{{ url()->previous() }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        &larr; Torna indietro
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection