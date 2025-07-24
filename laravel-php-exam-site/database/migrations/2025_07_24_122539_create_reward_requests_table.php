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
        Schema::create('reward_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->integer('service_id')->nullable();
            $table->string('service_type');
            $table->string('reward_type');
            $table->text('description')->nullable();
            $table->timestamp('scheduled_at')->nullable();
            $table->string('status')->default('in corso'); // <-- ENSURE THIS IS HERE
            $table->integer('points_redeemed')->nullable(); // <-- AND THIS IS HERE
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reward_requests');
    }
};