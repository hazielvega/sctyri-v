<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RenovacionConvenio;
use App\Models\Convenio;
use App\Models\Resolucion;
use Carbon\Carbon;

class RenovacionesSeeder extends Seeder
{
    public function run(): void
    {
        // Buscar convenio al que se le pueda aplicar una renovación (por ejemplo, con Lo Bruno)
        $convenio = Convenio::where('titulo', 'like', '%Lo Bruno%')->first();

        // Crear resolución ficticia para renovación si es necesario
        $resolucion = Resolucion::firstOrCreate(
            ['numero' => 'R-DR-2025-0999'],
            [
                'fecha' => '2025-06-01',
                'tipo' => 'Rectoral',
                'link' => 'https://bo.unsa.edu.ar/?r=0999-2025',
                'expediente_id' => $convenio?->expediente_id
            ]
        );

        if ($convenio) {
            RenovacionConvenio::create([
                'convenio_id' => $convenio->id,
                'fecha_inicio' => Carbon::now()->addDay()->toDateString(),
                'fecha_fin' => Carbon::now()->addYear()->toDateString(),
                'resolucion_id' => $resolucion->id,
                'observaciones' => 'Primera renovación automática del convenio con Lo Bruno.',
            ]);
        }
    }
}

