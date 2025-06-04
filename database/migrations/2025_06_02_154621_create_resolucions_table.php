<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('resoluciones', function (Blueprint $table) {
            $table->id();
            $table->string('numero', 50);                    // Ej: R-DR-2025-0079
            $table->date('fecha');
            $table->string('tipo', 50)->nullable();          // Rectoral, Decanal, Consejo, etc.
            $table->string('link', 255)->nullable();         // Enlace al boletín oficial u otro sitio
            $table->foreignId('expediente_id')->nullable()->constrained('expedientes')->nullOnDelete();
            $table->timestamps();

            $table->unique(['numero']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('resoluciones');
    }
};

