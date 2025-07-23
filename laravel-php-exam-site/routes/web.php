<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('homepage');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route per la gestione dei servizi
    Route::get('/services', [ServiceController::class, 'index'])->name('services.index'); // Mostra tutti i servizi
    Route::get('/services/create', [ServiceController::class, 'create'])->name('services.create'); // Mostra il form per creare un servizio
    Route::post('/services', [ServiceController::class, 'store'])->name('services.store'); // Salva un nuovo servizio
    Route::get('/services/{service}', [ServiceController::class, 'show'])->name('services.show'); // Mostra i dettagli di un servizio
    Route::get('/services/{service}/edit', [ServiceController::class, 'edit'])->name('services.edit'); // Mostra il form per modificare un servizio
    Route::put('/services/{service}', [ServiceController::class, 'update'])->name('services.update'); // Aggiorna un servizio esistente
    Route::delete('/services/{service}', [ServiceController::class, 'destroy'])->name('services.destroy'); // Elimina un servizio
});

require __DIR__.'/auth.php';
