<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoConvenio extends Model
{
    use HasFactory;

    protected $table = 'tipos_convenio';

    protected $fillable = [
        'nombre',
        'descripcion',
    ];

    public function convenios()
    {
        return $this->hasMany(Convenio::class, 'tipo_convenio_id');
    }
}
