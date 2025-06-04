<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Expediente;

class ExpedientesSeeder extends Seeder
{
    public function run(): void
    {
        $expedientes = [
            [
                'numero' => '25/2024-SCTRI-UNSa',
                'anio' => 2024,
                'dependencia' => 'Secretaría de Cooperación Técnica y Relaciones Internacionales',
                'fecha_inicio' => '2024-02-01',
                'fecha_cierre' => '2024-03-01',
            ],
            [
                'numero' => '98/2024-SCTRI-UNSa',
                'anio' => 2024,
                'dependencia' => 'Secretaría de Cooperación Técnica y Relaciones Internacionales',
                'fecha_inicio' => '2024-04-01',
                'fecha_cierre' => '2024-05-15',
            ],
            [
                'numero' => '14/2025-SEU-UNSa',
                'anio' => 2025,
                'dependencia' => 'Secretaría de Extensión Universitaria',
                'fecha_inicio' => '2025-01-10',
                'fecha_cierre' => null,
            ],
        ];

        foreach ($expedientes as $data) {
            Expediente::firstOrCreate(
                ['numero' => $data['numero'], 'anio' => $data['anio']],
                [
                    'dependencia' => $data['dependencia'],
                    'fecha_inicio' => $data['fecha_inicio'],
                    'fecha_cierre' => $data['fecha_cierre'],
                ]
            );
        }
    }
}

