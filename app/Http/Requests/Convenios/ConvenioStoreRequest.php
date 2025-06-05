<?php

namespace App\Http\Requests\Convenios;

use Illuminate\Foundation\Http\FormRequest;

class ConvenioStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        // si añades políticas, aquí revisas el permiso. Por ahora:
        return true;
    }

    public function rules(): array
    {
        return [
            'tipo_convenio_id' => 'required|exists:tipos_convenio,id',
            'titulo'           => 'nullable|string|max:255',
            'fecha_firma'      => 'required|date',
            'fecha_inicio'     => 'required|date|after_or_equal:fecha_firma',
            'fecha_fin'        => 'required|date|after:fecha_inicio',
            'renovable'        => 'required|boolean',
            'resolucion_id'    => 'required|exists:resoluciones,id',
            'expediente_id'    => 'nullable|exists:expedientes,id',
            'observaciones'    => 'nullable|string',
            'instituciones'    => 'nullable|array',
            'instituciones.*'  => 'exists:instituciones,id',
            'unidades'         => 'nullable|array',
            'unidades.*'       => 'exists:unidades_ejecutoras,id',
            'personas'         => 'nullable|array',
            'personas.*.id'    => 'exists:personas,id',
            'personas.*.rol'   => 'required_with:personas.*.id|string|max:100',
        ];
    }
}
