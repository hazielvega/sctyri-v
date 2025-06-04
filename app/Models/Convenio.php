<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Convenio extends Model
{
    use HasFactory;

    protected $table = 'convenios';

    protected $fillable = [
        'tipo_convenio_id',
        'titulo',
        'fecha_firma',
        'fecha_inicio',
        'fecha_fin',
        'renovable',
        'resolucion_id',
        'expediente_id',
        'observaciones',
    ];

    protected $casts = [
        'fecha_firma' => 'date',
        'fecha_inicio' => 'date',
        'fecha_fin' => 'date',
        'renovable' => 'boolean',
    ];

    // Accessor: estado_virtual calculado dinámicamente
    public function getEstadoVirtualAttribute(): string
    {
        $hoy = Carbon::now();

        if ($this->fecha_fin < $hoy) {
            return 'vencido';
        }

        if ($this->fecha_inicio > $hoy) {
            return 'futuro';
        }

        if ($this->fecha_fin->diffInDays($hoy) <= 30) {
            return 'próximo a vencer';
        }

        return 'vigente';
    }

    public function tipo()
    {
        return $this->belongsTo(TipoConvenio::class, 'tipo_convenio_id');
    }

    public function resolucion()
    {
        return $this->belongsTo(Resolucion::class);
    }

    public function expediente()
    {
        return $this->belongsTo(Expediente::class);
    }

    public function instituciones()
    {
        return $this->belongsToMany(Institucion::class, 'convenio_institucion');
    }

    public function unidadesEjecutoras()
    {
        return $this->belongsToMany(UnidadEjecutora::class, 'convenio_unidad_ejecutora');
    }

    public function personas()
    {
        return $this->belongsToMany(Persona::class, 'convenio_persona')->withPivot('rol');
    }

    public function renovaciones()
    {
        return $this->hasMany(RenovacionConvenio::class);
    }
}

