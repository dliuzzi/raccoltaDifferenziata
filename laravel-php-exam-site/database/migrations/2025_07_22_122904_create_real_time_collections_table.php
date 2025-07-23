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
        Schema::create('real_time_collections', function (Blueprint $table) {
            $table->id();
            $table->string('waste_type'); // Es: "Plastica", "Carta", "Vetro", "Organico"
            $table->string('collection_area'); // Es: "Centro Storico", "Quartiere Tal dei Tali"
            $table->text('notes')->nullable(); // Note aggiuntive sulla raccolta
            $table->dateTime('estimated_completion_time')->nullable(); // Ora stimata di completamento
            $table->string('status')->default('in_progress'); // Es: "in_progress", "completed", "delayed"
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('real_time_collections');
    }
};