<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tipos_convenio', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100)->unique(); // Ejemplo: Convenio Marco
            $table->text('descripcion')->nullable(); // Detalle opcional del tipo
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tipos_convenio');
    }
};
