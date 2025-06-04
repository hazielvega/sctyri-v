<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TipoConvenio;

class TiposConvenioSeeder extends Seeder
{
    public function run(): void
    {
        $tipos = [
            'Convenio Marco',
            'Convenio Específico',
            'Convenio de Colaboración',
            'Convenio de Cooperación',
            'Convenio de Adhesión',
            'Convenio de Comisión de Estudios',
            'Convenio de Subvención',
            'Convenio de Aceptación de Práctica Profesional Supervisada (PPS)',
            'Acta Acuerdo',
            'Acta Complementaria',
            'Acta Compromiso',
            'Protocolo Adicional',
            'Protocolo Específico',
            'Protocolo de Prácticas Pre-Profesionales',
        ];

        foreach ($tipos as $tipo) {
            TipoConvenio::firstOrCreate(['nombre' => $tipo]);
        }
    }
}

