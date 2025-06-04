<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('convenio_unidad_ejecutora', function (Blueprint $table) {
            $table->id();
            $table->foreignId('convenio_id')->constrained('convenios')->cascadeOnDelete();
            $table->foreignId('unidad_ejecutora_id')->constrained('unidades_ejecutoras')->cascadeOnDelete();
            $table->timestamps();

            $table->unique(['convenio_id', 'unidad_ejecutora_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('convenio_unidad_ejecutora');
    }
};

