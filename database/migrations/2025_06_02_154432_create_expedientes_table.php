<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('expedientes', function (Blueprint $table) {
            $table->id();
            $table->string('numero', 50);                // Ej: 14.534/22
            $table->year('anio');                        // Año del expediente
            $table->string('dependencia', 100)->nullable(); // Unidad que lo genera (opcional)
            $table->date('fecha_inicio')->nullable();    // Fecha de apertura del expediente
            $table->date('fecha_cierre')->nullable();    // Fecha de cierre, si aplica
            $table->timestamps();

            $table->unique(['numero', 'anio']);          // Para evitar duplicaciones
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('expedientes');
    }
};
