<?php

// database/seeders/UnidadesEjecutorasSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UnidadEjecutora;

class UnidadesEjecutorasSeeder extends Seeder
{
    public function run(): void
    {
        $unidades = [
            ['nombre' => 'Facultad de Ingeniería', 'tipo' => 'Facultad', 'abreviatura' => 'FI'],
            ['nombre' => 'Facultad de Ciencias Exactas', 'tipo' => 'Facultad', 'abreviatura' => 'FCE'],
            ['nombre' => 'Facultad de Humanidades', 'tipo' => 'Facultad', 'abreviatura' => 'FH'],
            ['nombre' => 'Secretaría Académica', 'tipo' => 'Secretaría', 'abreviatura' => 'SA'],
            ['nombre' => 'Secretaría de Extensión Universitaria', 'tipo' => 'Secretaría', 'abreviatura' => 'SEU'],
        ];

        foreach ($unidades as $unidad) {
            UnidadEjecutora::firstOrCreate([
                'nombre' => $unidad['nombre'],
                'tipo' => $unidad['tipo'],
            ], [
                'abreviatura' => $unidad['abreviatura']
            ]);
        }
    }
}
