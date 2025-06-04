<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnidadEjecutora extends Model
{
    use HasFactory;

    protected $table = 'unidades_ejecutoras';

    protected $fillable = [
        'nombre',
        'tipo',
        'abreviatura',
    ];

    public function convenios()
    {
        return $this->belongsToMany(Convenio::class, 'convenio_unidad_ejecutora');
    }
}