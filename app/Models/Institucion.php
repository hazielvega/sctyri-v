<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Institucion extends Model
{
    use HasFactory;

    protected $table = 'instituciones';

    protected $fillable = [
        'nombre',
        'tipo',
        'cuit',
        'pais',
        'provincia',
        'localidad',
        'domicilio',
    ];

    public function convenios()
    {
        return $this->belongsToMany(Convenio::class, 'convenio_institucion');
    }

    public function personas()
    {
        return $this->hasMany(Persona::class);
    }
}