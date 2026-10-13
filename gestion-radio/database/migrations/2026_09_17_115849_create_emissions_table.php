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
   Schema::create('emissions', function (Blueprint $table) {
    $table->id();
    $table->date('date_diffusion');
    $table->string('fichier_audio')->nullable();
    $table->string('statut')->default('planifiee');
    $table->foreignId('programme_id')->constrained()->onDelete('cascade');
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emissions');
    }
};
