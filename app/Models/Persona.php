<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    protected $table = 'personas';

    protected $fillable = [
        'nombre_completo',
        'dni',
        'cargo',
        'institucion_id',
    ];

    public function institucion()
    {
        return $this->belongsTo(Institucion::class);
    }

    public function convenios()
    {
        return $this->belongsToMany(Convenio::class, 'convenio_persona')
                    ->withPivot('rol');
    }
}

