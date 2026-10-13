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
     Schema::create('programmes', function (Blueprint $table) {
    $table->id();
    $table->string('titre');
    $table->string('jour_diffusion');
    $table->time('heure_debut');
    $table->time('heure_fin');
    $table->string('type')->default('normal');
    $table->foreignId('animateur_id')->nullable()->constrained()->onDelete('set null');
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programmes');
    }
};
