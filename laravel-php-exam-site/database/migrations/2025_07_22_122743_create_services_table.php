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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Chi ha richiesto il servizio
            $table->string('service_type'); // Es: "Raccolta Porta a Porta", "Raccolta Ingombranti"
            $table->text('description')->nullable(); // Descrizione dettagliata del servizio
            $table->dateTime('scheduled_at')->nullable(); // Data e ora programmate per il servizio
            $table->string('status')->default('pending'); // Es: "pending", "completed", "cancelled"
            $table->timestamps(); // created_at e updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};