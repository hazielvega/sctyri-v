<?php

namespace App\Http\Controllers\Convenios;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\{
    Convenio,
    TipoConvenio,
    Institucion,
    UnidadEjecutora,
    Persona,
    Expediente,
    Resolucion
};
use App\Http\Requests\Convenios\{ConvenioStoreRequest, ConvenioUpdateRequest};

class ConvenioController extends Controller
{
    public function index()
    {
        $convenios = Convenio::with(['tipo', 'instituciones', 'unidadesEjecutoras', 'personas'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return Inertia::render('convenios/index', [
            'convenios' => $convenios,
        ]);
    }

    public function create()
    {
        return Inertia::render('convenios/create', [
            'tipos' => TipoConvenio::all(),
            'instituciones' => Institucion::all(),
            'unidades' => UnidadEjecutora::all(),
            'personas' => Persona::all(),
            'expedientes' => Expediente::all(),
            'resoluciones' => Resolucion::all(),
        ]);
    }

    public function store(ConvenioStoreRequest $request)
    {
        $validated = $request->validated();

        // Crear convenio principal
        $convenio = Convenio::create([
            'tipo_convenio_id' => $validated['tipo_convenio_id'],
            'titulo' => $validated['titulo'],
            'fecha_firma' => $validated['fecha_firma'],
            'fecha_inicio' => $validated['fecha_inicio'],
            'fecha_fin' => $validated['fecha_fin'],
            'renovable' => $validated['renovable'],
            'resolucion_id' => $validated['resolucion_id'],
            'expediente_id' => $validated['expediente_id'],
            'observaciones' => $validated['observaciones'] ?? null,
        ]);

        // Relacionar n:n
        $convenio->instituciones()->sync($validated['instituciones'] ?? []);
        $convenio->unidadesEjecutoras()->sync($validated['unidades'] ?? []);

        // Relacionar personas con rol
        if (!empty($validated['personas'])) {
            foreach ($validated['personas'] as $persona) {
                // cada item: ['id' => persona_id, 'rol' => 'Firmante']
                $convenio->personas()->attach($persona['id'], ['rol' => $persona['rol']]);
            }
        }

        return redirect()->route('convenios.index')
            ->with('success', 'Convenio creado correctamente.');
    }

    public function edit(Convenio $convenio)
    {
        return Inertia::render('convenios/edit', [
            'convenio' => $convenio->load(['tipo', 'instituciones', 'unidadesEjecutoras', 'personas', 'resolucion', 'expediente']),
            'tipos' => TipoConvenio::all(),
            'instituciones' => Institucion::all(),
            'unidades' => UnidadEjecutora::all(),
            'personas' => Persona::all(),
            'expedientes' => Expediente::all(),
            'resoluciones' => Resolucion::all(),
        ]);
    }

    public function update(ConvenioUpdateRequest $request, Convenio $convenio)
    {
        $validated = $request->validated();

        // Actualizar datos principales
        $convenio->update([
            'tipo_convenio_id' => $validated['tipo_convenio_id'],
            'titulo' => $validated['titulo'],
            'fecha_firma' => $validated['fecha_firma'],
            'fecha_inicio' => $validated['fecha_inicio'],
            'fecha_fin' => $validated['fecha_fin'],
            'renovable' => $validated['renovable'],
            'resolucion_id' => $validated['resolucion_id'],
            'expediente_id' => $validated['expediente_id'],
            'observaciones' => $validated['observaciones'] ?? null,
        ]);

        // Sincronizar relaciones n:n
        $convenio->instituciones()->sync($validated['instituciones'] ?? []);
        $convenio->unidadesEjecutoras()->sync($validated['unidades'] ?? []);

        // Actualizar relaciones persona↔rol
        $convenio->personas()->detach();
        if (!empty($validated['personas'])) {
            foreach ($validated['personas'] as $p) {
                $convenio->personas()->attach($p['id'], ['rol' => $p['rol']]);
            }
        }

        return redirect()->route('convenios.index')
            ->with('success', 'Convenio actualizado correctamente.');
    }

    public function destroy(Convenio $convenio)
    {
        $convenio->delete();
        return redirect()->route('convenios.index')
            ->with('success', 'Convenio eliminado correctamente.');
    }

    public function show(Convenio $convenio)
    {
        return Inertia::render('convenios/show', [
            'convenio' => $convenio->load(['tipo', 'instituciones', 'unidadesEjecutoras', 'personas', 'resolucion', 'expediente', 'renovaciones']),
        ]);
    }
}
