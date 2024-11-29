<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Career;

class CareersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run()
    {
        // Carreras de Tecnologia Digital
        Career::create(['name' => 'Diseño y Desarrollo de Software', 'department_id' => 1]);
        Career::create(['name' => 'Administración de Redes y Comunicaciones', 'department_id' => 1]);
        Career::create(['name' => 'Diseño y Desarrollo de Simuladores y Videojuegos', 'department_id' => 1]);
        Career::create(['name' => 'Modelado y Animación Digital', 'department_id' => 1]);
        Career::create(['name' => 'Big Data y Ciencia de Datos', 'department_id' => 1]);

        // Carreras de Diseño y Producción Industrial
        Career::create(['name' => 'Diseño Industrial', 'department_id' => 2]);
        Career::create(['name' => 'Producción y Gestión Industrial', 'department_id' => 2]);

        // Carreras de Minería y Procesos Químicos Metalúrgicos
        Career::create(['name' => 'Operaciones Mineras', 'department_id' => 3]);
        Career::create(['name' => 'Procesos Químicos y Metalúrgicos', 'department_id' => 3]);

        // Carreras de Electricidad y Electrónica
        Career::create(['name' => 'Electricidad Industrial', 'department_id' => 4]);
        Career::create(['name' => 'Electrónica y Automatización Industrial', 'department_id' => 4]);
        Career::create(['name' => 'Mecatrónica Industrial', 'department_id' => 4]);

        // Carreras de Mecánica y Aviación
        Career::create(['name' => 'Gestión y Mantenimiento de Maquinaria Industrial', 'department_id' => 5]);
        Career::create(['name' => 'Gestión de Mantenimiento de Maquinaria Pesada', 'department_id' => 5]);
        Career::create(['name' => 'Aviónica y Mecánica Aeronáutica', 'department_id' => 5]);
    }

}
