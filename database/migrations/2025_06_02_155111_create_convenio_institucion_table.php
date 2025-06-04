<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('convenio_institucion', function (Blueprint $table) {
            $table->id();
            $table->foreignId('convenio_id')->constrained('convenios')->cascadeOnDelete();
            $table->foreignId('institucion_id')->constrained('instituciones')->cascadeOnDelete();
            $table->timestamps();

            $table->unique(['convenio_id', 'institucion_id']); // Evita duplicación
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('convenio_institucion');
    }
};

