<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Convenio;
use App\Models\TipoConvenio;
use App\Models\Resolucion;
use App\Models\Institucion;
use App\Models\UnidadEjecutora;
use App\Models\Persona;

class ConveniosSeeder extends Seeder
{
    public function run(): void
    {
        $tipos = TipoConvenio::all()->keyBy('nombre');
        $instituciones = Institucion::all()->keyBy('nombre');
        $unidades = UnidadEjecutora::all()->keyBy('nombre');
        $personas = Persona::all()->keyBy('nombre_completo');
        $resoluciones = Resolucion::all()->keyBy('numero');

        $convenios = [
            [
                'tipo' => 'Convenio Marco',
                'titulo' => 'Convenio Marco con COPAIPA',
                'fecha_firma' => '2024-03-10',
                'fecha_inicio' => '2024-03-15',
                'fecha_fin' => '2025-03-15',
                'renovable' => true,
                'resolucion' => 'R-DR-2024-0143',
                'instituciones' => ['Consejo Profesional de Agrimensores, Ingenieros y Profesionales Afines'],
                'unidades' => ['Facultad de Ingeniería'],
                'personas' => [
                    ['nombre' => 'Ing. Daniel Hoyos', 'rol' => 'Firmante'],
                    ['nombre' => 'Lic. Marianela Ibarra Afranllie', 'rol' => 'Firmante']
                ]
            ],
            [
                'tipo' => 'Convenio de Subvención',
                'titulo' => 'Subvención con Expreso Lo Bruno',
                'fecha_firma' => '2024-05-28',
                'fecha_inicio' => '2024-06-01',
                'fecha_fin' => '2025-06-01',
                'renovable' => false,
                'resolucion' => 'R-DR-2024-0589',
                'instituciones' => ['Empresa Expreso Lo Bruno S.A.'],
                'unidades' => ['Secretaría de Extensión Universitaria'],
                'personas' => [
                    ['nombre' => 'Federico Javier Lo Bruno', 'rol' => 'Firmante'],
                    ['nombre' => 'Lic. Analía Godoy', 'rol' => 'Coordinadora']
                ]
            ],
        ];

        foreach ($convenios as $data) {
            $tipoId = $tipos[$data['tipo']]->id ?? null;
            $resolucionId = $resoluciones[$data['resolucion']]->id ?? null;

            $convenio = Convenio::firstOrCreate(
                ['titulo' => $data['titulo']],
                [
                    'tipo_convenio_id' => $tipoId,
                    'fecha_firma' => $data['fecha_firma'],
                    'fecha_inicio' => $data['fecha_inicio'],
                    'fecha_fin' => $data['fecha_fin'],
                    'renovable' => $data['renovable'],
                    'resolucion_id' => $resolucionId,
                    'expediente_id' => $resoluciones[$data['resolucion']]->expediente_id ?? null,
                    'observaciones' => null,
                ]
            );

            // Asociar instituciones
            $idsInstituciones = collect($data['instituciones'])
                ->map(fn($nombre) => $instituciones[$nombre]->id)
                ->all();
            $convenio->instituciones()->sync($idsInstituciones);

            // Asociar unidades ejecutoras
            $idsUnidades = collect($data['unidades'])
                ->map(fn($nombre) => $unidades[$nombre]->id)
                ->all();
            $convenio->unidadesEjecutoras()->sync($idsUnidades);

            // Asociar personas con rol
            foreach ($data['personas'] as $p) {
                $persona = $personas[$p['nombre']] ?? null;
                if ($persona) {
                    $convenio->personas()->syncWithoutDetaching([
                        $persona->id => ['rol' => $p['rol']]
                    ]);
                }
            }
        }
    }
}
