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
         //1
         Bookscategory::create(['name' => 'Diseño y Desarrollo de Software']);
         //2
         Bookscategory::create(['name' => 'Administración de Redes y Comunicaciones']);
         //3
         Bookscategory::create(['name' => 'Diseño y Desarrollo de Simuladores y Videojuegos']);
         //4
         Bookscategory::create(['name' => 'Modelado y Animación Digital']);
        //5
         Bookscategory::create(['name' => 'Big Data y Ciencia de Datos']);
        //6
         Bookscategory::create(['name' => 'Diseño Industrial']);
        //7
         Bookscategory::create(['name' => 'Producción y Gestión Industrial']);
        //8
         Bookscategory::create(['name' => 'Operaciones Mineras']);
        //9
         Bookscategory::create(['name' => 'Procesos Químicos y Metalúrgicos']);
        //10
         Bookscategory::create(['name' => 'Electricidad Industrial']);
        //11
         Bookscategory::create(['name' => 'Electrónica y Automatización Industrial']);
        //12
         Bookscategory::create(['name' => 'Mecatrónica Industrial']);
        //13
         Bookscategory::create(['name' => 'Gestión y Mantenimiento de Maquinaria Industrial']);
        //14
         Bookscategory::create(['name' => 'Gestión de Mantenimiento de Maquinaria Pesada']);
        //15
         Bookscategory::create(['name' => 'Aviación y Mecánica Aeronáutica']);
        //16
         Bookscategory::create(['name' => 'Cálculo']);
        //17
         Bookscategory::create(['name' => 'Expresión Oral']);
        //18
         Bookscategory::create(['name' => 'Física']);
        //19
         Bookscategory::create(['name' => 'Electricidad']);
    }
}
