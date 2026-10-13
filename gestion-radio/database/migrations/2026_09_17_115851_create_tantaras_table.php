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
   Schema::create('tantaras', function (Blueprint $table) {
    $table->id();
    $table->string('titre');
    $table->string('statut')->default('non_diffuse');
    $table->date('date_diffusion')->nullable();
    $table->foreignId('animateur_id')->nullable()->constrained()->onDelete('set null');
    $table->timestamps();
});
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tantaras');
    }
};
