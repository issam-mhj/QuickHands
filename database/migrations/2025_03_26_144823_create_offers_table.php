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
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->float("proposed_amount");
            $table->integer("estimated_time");
            $table->enum('status', ['pending', 'accepted', 'rejected'])->default('pending');
            $table->foreignId('provider_id')->constrained('providers')->onDelete('cascade');
            $table->foreignId('service_id')->constrained('services')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offers');
    }
};
