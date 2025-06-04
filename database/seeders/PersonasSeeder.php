<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Persona;
use App\Models\Institucion;

class PersonasSeeder extends Seeder
{
    public function run(): void
    {
        $unsa = Institucion::firstWhere('nombre', 'Universidad Nacional de Salta');
        $loBruno = Institucion::firstWhere('nombre', 'Empresa Expreso Lo Bruno S.A.');
        $copaipa = Institucion::firstWhere('nombre', 'Consejo Profesional de Agrimensores, Ingenieros y Profesionales Afines');
        $unch = Institucion::firstWhere('nombre', 'Universidad de Chile');

        $personas = [
            ['nombre_completo' => 'Ing. Daniel Hoyos', 'dni' => '17309052', 'cargo' => 'Rector', 'institucion_id' => $unsa?->id],
            ['nombre_completo' => 'Mg. Miguel Martín Nina', 'dni' => '25482156', 'cargo' => 'Secretario de Cooperación Técnica', 'institucion_id' => $unsa?->id],
            ['nombre_completo' => 'Ing. Héctor Raúl Casado', 'dni' => '11060635', 'cargo' => 'Decano FI-UNSa', 'institucion_id' => $unsa?->id],
            ['nombre_completo' => 'Lic. Marianela Ibarra Afranllie', 'dni' => '22785531', 'cargo' => 'Presidenta COPAIPA', 'institucion_id' => $copaipa?->id],
            ['nombre_completo' => 'Federico Javier Lo Bruno', 'dni' => '27717977', 'cargo' => 'Presidente', 'institucion_id' => $loBruno?->id],
            ['nombre_completo' => 'Dra. Carolina Soto', 'dni' => '28123000', 'cargo' => 'Representante Internacional', 'institucion_id' => $unch?->id],
            ['nombre_completo' => 'Lic. Analía Godoy', 'dni' => '30500258', 'cargo' => 'Coordinadora Académica', 'institucion_id' => null],
        ];

        foreach ($personas as $data) {
            Persona::firstOrCreate(
                ['nombre_completo' => $data['nombre_completo']],
                [
                    'dni' => $data['dni'],
                    'cargo' => $data['cargo'],
                    'institucion_id' => $data['institucion_id']
                ]
            );
        }
    }
}

