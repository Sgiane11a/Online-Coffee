<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Bookscategory;

class BookscategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Crear categorías de ejemplo
         Bookscategory::create(['name' => 'Diseño y Desarrollo de Software']);
         Bookscategory::create(['name' => 'Administración de Redes y Comunicaciones']);
         Bookscategory::create(['name' => 'Diseño y Desarrollo de Simuladores y Videojuegos']);
         Bookscategory::create(['name' => 'Modelado y Animación Digital']);
         Bookscategory::create(['name' => 'Big Data y Ciencia de Datos']);
         Bookscategory::create(['name' => 'Diseño Industrial']);
         Bookscategory::create(['name' => 'Producción y Gestión Industrial']);
         Bookscategory::create(['name' => 'Operaciones Mineras']);
         Bookscategory::create(['name' => 'Procesos Químicos y Metalúrgicos']);
         Bookscategory::create(['name' => 'Electricidad Industrial']);
         Bookscategory::create(['name' => 'Electrónica y Automatización Industrial']);
         Bookscategory::create(['name' => 'Mecatrónica Industrial']);
         Bookscategory::create(['name' => 'Gestión y Mantenimiento de Maquinaria Industrial']);
         Bookscategory::create(['name' => 'Gestión de Mantenimiento de Maquinaria Pesada']);
         Bookscategory::create(['name' => 'Aviación y Mecánica Aeronáutica']);
         Bookscategory::create(['name' => 'Cálculo']);
         Bookscategory::create(['name' => 'Expresión Oral']);
         Bookscategory::create(['name' => 'Física']);
         Bookscategory::create(['name' => 'Electricidad']);
    }
}
