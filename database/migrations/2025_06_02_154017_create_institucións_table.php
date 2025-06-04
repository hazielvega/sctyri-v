<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('instituciones', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 150);                 // Ej: Universidad Nacional de Jujuy
            $table->string('tipo', 100)->nullable();       // Ej: Universidad, Empresa, ONG
            $table->string('cuit', 20)->nullable();         // Si aplica
            $table->string('pais', 100)->nullable();        // País de origen (opcional)
            $table->string('provincia', 100)->nullable();   // Para entidades nacionales
            $table->string('localidad', 100)->nullable();   // Localización más precisa
            $table->string('domicilio', 150)->nullable();   // Dirección opcional
            $table->timestamps();

            $table->unique(['nombre', 'tipo']); // Evita repetir misma entidad con mismo tipo
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('instituciones');
    }
};
