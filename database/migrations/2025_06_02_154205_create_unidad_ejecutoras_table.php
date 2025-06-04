<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('unidades_ejecutoras', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 150);               // Ej: Facultad de Ingeniería
            $table->string('tipo', 100)->nullable();     // Facultad, Secretaría, Instituto, etc.
            $table->string('abreviatura', 20)->nullable(); // Ej: FCEJyS
            $table->timestamps();

            $table->unique(['nombre', 'tipo']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('unidades_ejecutoras');
    }
};
