<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Resolucion;
use App\Models\Expediente;

class ResolucionesSeeder extends Seeder
{
    public function run(): void
    {
        $resoluciones = [
            [
                'numero' => 'R-DR-2024-0143',
                'fecha' => '2024-03-11',
                'tipo' => 'Rectoral',
                'link' => 'https://bo.unsa.edu.ar/?r=0143-2024',
                'expediente_numero' => '25/2024-SCTRI-UNSa',
            ],
            [
                'numero' => 'R-DR-2024-0589',
                'fecha' => '2024-05-29',
                'tipo' => 'Rectoral',
                'link' => 'https://bo.unsa.edu.ar/?r=0589-2024',
                'expediente_numero' => '98/2024-SCTRI-UNSa',
            ],
            [
                'numero' => 'R-SEU-2025-0025',
                'fecha' => '2025-02-15',
                'tipo' => 'Secretaría Extensión',
                'link' => null,
                'expediente_numero' => '14/2025-SEU-UNSa',
            ],
        ];

        foreach ($resoluciones as $data) {
            $expediente = Expediente::where('numero', $data['expediente_numero'])->first();

            if ($expediente) {
                Resolucion::firstOrCreate(
                    ['numero' => $data['numero']],
                    [
                        'fecha' => $data['fecha'],
                        'tipo' => $data['tipo'],
                        'link' => $data['link'],
                        'expediente_id' => $expediente->id,
                    ]
                );
            }
        }
    }
}

