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
    Schema::create('sms_auditeurs', function (Blueprint $table) {
    $table->id();
    $table->string('numero_expediteur');
    $table->text('contenu');
    $table->dateTime('date_reception');
    $table->string('type')->default('commentaire');
    $table->foreignId('emission_id')->nullable()->constrained()->onDelete('set null');
    $table->foreignId('chanson_id')->nullable()->constrained()->onDelete('set null');
    $table->timestamps();
});
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sms_auditeurs');
    }
};
