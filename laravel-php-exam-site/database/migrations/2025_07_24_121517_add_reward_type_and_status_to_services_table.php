<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('services', function (Blueprint $table) {
            // Aggiungi SOLO la colonna per il tipo di premio.
            // Sarà nullable perché non tutti i servizi sono richieste di premi.
            // La posizione 'after' è opzionale, puoi rimuoverla se non ti importa l'ordine delle colonne.
            $table->string('reward_type')->nullable()->after('service_id');

            // La colonna 'status' ESISTE GIA' e non la modifichiamo in questa migrazione.
            // Il suo valore di default ('in corso') per le nuove richieste verrà gestito dal ServiceController.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            // Rimuovi la colonna 'reward_type' in caso di rollback della migrazione.
            $table->dropColumn('reward_type');
        });
    }
};