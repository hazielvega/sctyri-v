<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expediente extends Model
{
    use HasFactory;

    protected $table = 'expedientes';

    protected $fillable = [
        'numero',
        'anio',
        'dependencia',
        'fecha_inicio',
        'fecha_cierre',
    ];

    public function resoluciones()
    {
        return $this->hasMany(Resolucion::class);
    }

    public function convenios()
    {
        return $this->hasMany(Convenio::class);
    }
}

