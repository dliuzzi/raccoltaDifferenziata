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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Titolo dell'articolo
            $table->date('date');    // Data di pubblicazione dell'articolo
            $table->text('text');    // Contenuto testuale dell'articolo
            $table->string('image')->nullable(); // Percorso dell'immagine (opzionale)
            $table->timestamps();    // Colonne created_at e updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};