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
        Schema::create('disposal_deliveries', function (Blueprint $table) {
            $table->id();
            $table->string('waste_type'); // Tipo di rifiuto consegnato
            $table->decimal('quantity_kg', 8, 2); // Quantità in kg (es. 1500.50)
            $table->string('disposal_company_name'); // Nome dell'azienda di smaltimento
            $table->string('delivery_location')->nullable(); // Luogo di consegna
            $table->dateTime('delivery_date'); // Data e ora della consegna
            $table->text('notes')->nullable(); // Note aggiuntive
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('disposal_deliveries');
    }
};