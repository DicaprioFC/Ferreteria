<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorias = [
            ['nombre' => 'Herramientas Manuales',     'descripcion' => 'Martillos, destornilladores, llaves, alicates'],
            ['nombre' => 'Electricidad',              'descripcion' => 'Cables, tomacorrientes, interruptores, focos'],
            ['nombre' => 'Fontanería',                'descripcion' => 'Tuberías, grifos, válvulas, conexiones'],
            ['nombre' => 'Construcción',              'descripcion' => 'Cemento, arena, ladrillos, mezclas'],
            ['nombre' => 'Pinturas y Acabados',       'descripcion' => 'Pinturas, rodillos, brochas, barnices'],
            ['nombre' => 'Seguridad Industrial',      'descripcion' => 'Guantes, cascos, gafas de protección'],
            ['nombre' => 'Ferretería General',        'descripcion' => 'Tornillos, tuercas, clavos, bisagras'],
        ];

        foreach ($categorias as $categoria) {
            DB::table('categorias')->insert([
                'nombre' => $categoria['nombre'],
                'descripcion' => $categoria['descripcion'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
