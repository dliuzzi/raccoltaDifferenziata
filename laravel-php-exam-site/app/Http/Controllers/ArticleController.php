<?php

namespace App\Http\Controllers;

use App\Models\Article; // Assicurati di importare il tuo modello Article
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function show($id) // Il parametro $id corrisponde all'ID nella rotta
    {
        // Trova l'articolo per ID. Se non lo trova, Laravel lancerà un 404.
        $article = Article::findOrFail($id);

        // Passa l'articolo alla vista 'articles.show'
        return view('articles.show', compact('article'));
    }

    // ... altri metodi del controller (es. index, create, store, etc.)
}