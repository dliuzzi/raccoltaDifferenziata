<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PageContentController;
use App\Http\Controllers\RewardRequestController; // <-- Importa il RewardRequestController
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

// Rotta per visualizzare il singolo articolo
Route::get('/articles/{id}', [ArticleController::class, 'show'])->name('articles.show');
// Aggiungi anche una rotta per listare tutti gli articoli, se non l'hai già
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');


// AGGIORNATO: La tua homepage ora punta al WelcomeController
Route::get('/', [WelcomeController::class, 'index'])->name('homepage');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // ROTTE PER I SERVIZI DI RITIRO RIFIUTI (gestiti da ServiceController)
    // Ho raggruppato queste rotte resource-like in una singola riga per concisione
    Route::resource('services', ServiceController::class);

    // ROTTE PER LE RICHIESTE DI PREMI (gestite da RewardRequestController)
    // Questo crea automaticamente reward_requests.index, .create, .store, .show, .edit, .update, .destroy
    Route::resource('reward_requests', RewardRequestController::class); // <-- AGGIUNTO QUI: ROTTE RESOURCE PER I PREMI

    // Rotta specifica per il form di creazione dei Premi Ecologici (Card 3)
    // Questa rotta mantiene il nome 'services.premi.create' ma punta al RewardRequestController
    Route::get('/services/premi/create', [RewardRequestController::class, 'create'])->name('services.premi.create'); // <-- CORRETTO IL CONTROLLER

    // Rotte per le pagine di contenuto statico
    Route::get('/raccolta-differenziata', [PageContentController::class, 'raccoltaDifferenziata'])->name('raccolta-differenziata');
    Route::get('/ingombranti', [PageContentController::class, 'ingombranti'])->name('ingombranti');
    Route::get('/porta-a-porta', [PageContentController::class, 'portaAPorta'])->name('porta-a-porta');
});

require __DIR__.'/auth.php';