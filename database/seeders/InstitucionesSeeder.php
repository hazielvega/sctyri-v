<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Institucion;

class InstitucionesSeeder extends Seeder
{
    public function run(): void
    {
        $instituciones = [
            ['nombre' => 'Universidad Nacional de Jujuy', 'tipo' => 'Universidad', 'pais' => 'Argentina', 'provincia' => 'Jujuy'],
            ['nombre' => 'Consejo Profesional de Agrimensores, Ingenieros y Profesionales Afines', 'tipo' => 'Consejo Profesional', 'pais' => 'Argentina', 'provincia' => 'Salta'],
            ['nombre' => 'Ministerio de Educación de la Nación', 'tipo' => 'Organismo Público', 'pais' => 'Argentina'],
            ['nombre' => 'Empresa Expreso Lo Bruno S.A.', 'tipo' => 'Empresa', 'pais' => 'Argentina', 'provincia' => 'Salta'],
            ['nombre' => 'Universidad de Chile', 'tipo' => 'Universidad', 'pais' => 'Chile'],
            ['nombre' => 'Asociación Civil "Manos Solidarias"', 'tipo' => 'ONG', 'pais' => 'Argentina', 'provincia' => 'Tucumán'],
        ];

        foreach ($instituciones as $data) {
            Institucion::firstOrCreate(
                ['nombre' => $data['nombre'], 'tipo' => $data['tipo']],
                [
                    'pais' => $data['pais'] ?? null,
                    'provincia' => $data['provincia'] ?? null,
                    'localidad' => $data['localidad'] ?? null,
                    'domicilio' => $data['domicilio'] ?? null,
                    'cuit' => $data['cuit'] ?? null
                ]
            );
        }
    }
}
