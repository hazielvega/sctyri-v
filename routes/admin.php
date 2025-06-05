<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Convenios\{
    ConvenioController,
    InstitucionController,
    UnidadEjecutoraController,
    PersonaController,
    ExpedienteController,
    ResolucionController,
    RenovacionConvenioController,
    TipoConvenioController
};

Route::middleware(['auth', 'verified'])->prefix('admin')->group(function () {
    // Convenios
    Route::prefix('convenios')->name('convenios.')->group(function () {
        Route::get('/', [ConvenioController::class, 'index'])->name('index');
        Route::get('/crear', [ConvenioController::class, 'create'])->name('create');
        Route::post('/', [ConvenioController::class, 'store'])->name('store');
        Route::get('/{convenio}/editar', [ConvenioController::class, 'edit'])->name('edit');
        Route::put('/{convenio}', [ConvenioController::class, 'update'])->name('update');
        Route::delete('/{convenio}', [ConvenioController::class, 'destroy'])->name('destroy');
        Route::get('/{convenio}', [ConvenioController::class, 'show'])->name('show');
    });

    // Instituciones
    Route::prefix('instituciones')->name('instituciones.')->group(function () {
        Route::get('/', [InstitucionController::class, 'index'])->name('index');
        Route::get('/crear', [InstitucionController::class, 'create'])->name('create');
        Route::post('/', [InstitucionController::class, 'store'])->name('store');
        Route::get('/{institucion}/editar', [InstitucionController::class, 'edit'])->name('edit');
        Route::put('/{institucion}', [InstitucionController::class, 'update'])->name('update');
        Route::delete('/{institucion}', [InstitucionController::class, 'destroy'])->name('destroy');
    });

    // Unidades Ejecutoras
    Route::prefix('unidades-ejecutoras')->name('unidadesEjecutoras.')->group(function () {
        Route::get('/', [UnidadEjecutoraController::class, 'index'])->name('index');
        Route::get('/crear', [UnidadEjecutoraController::class, 'create'])->name('create');
        Route::post('/', [UnidadEjecutoraController::class, 'store'])->name('store');
        Route::get('/{unidad}/editar', [UnidadEjecutoraController::class, 'edit'])->name('edit');
        Route::put('/{unidad}', [UnidadEjecutoraController::class, 'update'])->name('update');
        Route::delete('/{unidad}', [UnidadEjecutoraController::class, 'destroy'])->name('destroy');
    });

    // Personas
    Route::prefix('personas')->name('personas.')->group(function () {
        Route::get('/', [PersonaController::class, 'index'])->name('index');
        Route::get('/crear', [PersonaController::class, 'create'])->name('create');
        Route::post('/', [PersonaController::class, 'store'])->name('store');
        Route::get('/{persona}/editar', [PersonaController::class, 'edit'])->name('edit');
        Route::put('/{persona}', [PersonaController::class, 'update'])->name('update');
        Route::delete('/{persona}', [PersonaController::class, 'destroy'])->name('destroy');
    });

    // Expedientes
    Route::prefix('expedientes')->name('expedientes.')->group(function () {
        Route::get('/', [ExpedienteController::class, 'index'])->name('index');
        Route::get('/crear', [ExpedienteController::class, 'create'])->name('create');
        Route::post('/', [ExpedienteController::class, 'store'])->name('store');
        Route::get('/{expediente}/editar', [ExpedienteController::class, 'edit'])->name('edit');
        Route::put('/{expediente}', [ExpedienteController::class, 'update'])->name('update');
        Route::delete('/{expediente}', [ExpedienteController::class, 'destroy'])->name('destroy');
    });

    // Resoluciones
    Route::prefix('resoluciones')->name('resoluciones.')->group(function () {
        Route::get('/', [ResolucionController::class, 'index'])->name('index');
        Route::get('/crear', [ResolucionController::class, 'create'])->name('create');
        Route::post('/', [ResolucionController::class, 'store'])->name('store');
        Route::get('/{resolucion}/editar', [ResolucionController::class, 'edit'])->name('edit');
        Route::put('/{resolucion}', [ResolucionController::class, 'update'])->name('update');
        Route::delete('/{resolucion}', [ResolucionController::class, 'destroy'])->name('destroy');
    });

    // Renovaciones Convenio
    Route::prefix('renovaciones')->name('renovaciones.')->group(function () {
        Route::get('/', [RenovacionConvenioController::class, 'index'])->name('index');
        Route::get('/crear', [RenovacionConvenioController::class, 'create'])->name('create');
        Route::post('/', [RenovacionConvenioController::class, 'store'])->name('store');
        Route::get('/{renovacion}/editar', [RenovacionConvenioController::class, 'edit'])->name('edit');
        Route::put('/{renovacion}', [RenovacionConvenioController::class, 'update'])->name('update');
        Route::delete('/{renovacion}', [RenovacionConvenioController::class, 'destroy'])->name('destroy');
    });

    // Tipos Convenio
    Route::prefix('tipos-convenio')->name('tiposConvenio.')->group(function () {
        Route::get('/', [TipoConvenioController::class, 'index'])->name('index');
        Route::get('/crear', [TipoConvenioController::class, 'create'])->name('create');
        Route::post('/', [TipoConvenioController::class, 'store'])->name('store');
        Route::get('/{tipo}/editar', [TipoConvenioController::class, 'edit'])->name('edit');
        Route::put('/{tipo}', [TipoConvenioController::class, 'update'])->name('update');
        Route::delete('/{tipo}', [TipoConvenioController::class, 'destroy'])->name('destroy');
    });
});

require __DIR__.'/auth.php';