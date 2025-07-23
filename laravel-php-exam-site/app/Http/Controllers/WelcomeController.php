<?php

namespace App\Http\Controllers;

use App\Models\Article; // Assicurati che questo ci sia se lo stai usando
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB; // Importa la facade DB per le query dirette

class WelcomeController extends Controller
{
    public function index()
    {
        // Logica per recuperare gli articoli
        $articles = Article::orderBy('date', 'desc')->take(7)->get();
        $defaultImage = asset('images/default-article.jpg');

        // AGGIORNATO: Logica per il contatore dei rifiuti usando la tabella 'disposal_deliveries'
        // Sostituito 'waste_data' con 'disposal_deliveries'
        $totalKg = DB::table('disposal_deliveries')->sum('quantity_kg');

        // Converti i kg in tonnellate
        $totalTons = $totalKg / 1000;

        // Formatta le tonnellate come una stringa di 6 cifre con zeri iniziali
        // Arrotonda all'intero inferiore per le cifre intere
        $formattedTons = sprintf('%06d', floor($totalTons));

        // Passa tutti i dati alla vista 'welcome'
        return view('welcome', compact('articles', 'defaultImage', 'totalTons', 'formattedTons'));
    }
}