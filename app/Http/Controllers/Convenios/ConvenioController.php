<?php

namespace App\Http\Controllers\Convenios;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Convenio;

class ConvenioController extends Controller
{
    public function index()
    {
        return Inertia::render('convenios/index', [
            'convenios' => Convenio::with(['tipo', 'instituciones'])->latest()->paginate(10)
        ]);
    }

    public function create()
    {
        return Inertia::render('convenios/create');
    }

    public function store(Request $request)
    {
        // Aquí luego incluiremos validaciones y lógica de guardado
    }

    public function edit(Convenio $convenio)
    {
        return Inertia::render('convenios/edit', [
            'convenio' => $convenio->load(['tipo', 'instituciones', 'unidadesEjecutoras', 'personas'])
        ]);
    }

    public function update(Request $request, Convenio $convenio)
    {
        // Aquí luego incluiremos validaciones y lógica de actualización
    }

    public function destroy(Convenio $convenio)
    {
        $convenio->delete();

        return redirect()->route('convenios.index')->with('success', 'Convenio eliminado correctamente.');
    }

    public function show(Convenio $convenio)
    {
        return Inertia::render('convenios/show', [
            'convenio' => $convenio->load(['tipo', 'instituciones', 'unidadesEjecutoras', 'personas', 'resolucion'])
        ]);
    }
}

