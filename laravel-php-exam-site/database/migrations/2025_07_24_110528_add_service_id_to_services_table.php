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
            // Aggiungi la colonna service_id
            // tinyInteger è sufficiente per numeri piccoli (0-2)
            // after('user_id') la posiziona dopo user_id, ma puoi metterla dove preferisci.
            $table->tinyInteger('service_id')->after('user_id')->nullable();
            // Puoi renderlo non nullable se vuoi, ma dovresti poi aggiungere un default o gestirlo.
            // $table->tinyInteger('service_id')->after('user_id')->default(0); // Esempio con default
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            // Quando si esegue il rollback, rimuove la colonna
            $table->dropColumn('service_id');
        });
    }
};