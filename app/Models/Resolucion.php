<?php

// app/Models/Resolucion.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resolucion extends Model
{
    use HasFactory;

    protected $table = 'resoluciones';

    protected $fillable = [
        'numero',
        'fecha',
        'tipo',
        'link',
        'expediente_id',
    ];

    public function expediente()
    {
        return $this->belongsTo(Expediente::class);
    }

    public function convenios()
    {
        return $this->hasMany(Convenio::class);
    }

    public function renovaciones()
    {
        return $this->hasMany(RenovacionConvenio::class);
    }
}

