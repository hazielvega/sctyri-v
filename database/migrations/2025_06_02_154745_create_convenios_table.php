<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('convenios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tipo_convenio_id')->constrained('tipos_convenio')->cascadeOnDelete();
            $table->string('titulo', 255)->nullable();              // No todos lo tienen
            $table->date('fecha_firma');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->boolean('renovable')->default(false);
            $table->foreignId('resolucion_id')->constrained('resoluciones')->cascadeOnDelete();
            $table->foreignId('expediente_id')->nullable()->constrained('expedientes')->nullOnDelete();
            $table->text('observaciones')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('convenios');
    }
};

