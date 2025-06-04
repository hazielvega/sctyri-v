<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Convenios\ConvenioController;
use Inertia\Inertia;

Route::middleware(['auth', 'verified'])->prefix('admin')->group(function () {
    
    Route::get('/', [ConvenioController::class, 'index'])->name('index');

    Route::prefix('convenios')->name('convenios.')->group(function () {
        Route::get('/', [ConvenioController::class, 'index'])->name('index');
        Route::get('/crear', [ConvenioController::class, 'create'])->name('create');
        Route::post('/', [ConvenioController::class, 'store'])->name('store');
        Route::get('/{convenio}/editar', [ConvenioController::class, 'edit'])->name('edit');
        Route::put('/{convenio}', [ConvenioController::class, 'update'])->name('update');
        Route::delete('/{convenio}', [ConvenioController::class, 'destroy'])->name('destroy');
        Route::get('/{convenio}', [ConvenioController::class, 'show'])->name('show');
    });
});
