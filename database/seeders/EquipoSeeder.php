<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Equipo;

class EquipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $equipos = [
            [
                'nombre' => 'Computadora N°1',
                'type' => 'computadora',
                'descripcion' => 'Computadora de escritorio con monitor Full HD',
                'image_public_id' => 'computadora_vohmy8', // Ruta relativa a tu carpeta de imágenes
                'disponible' => true,
            ],

            [
                'nombre' => 'Laptop N°1',
                'type' => 'laptop',
                'descripcion' => 'Laptop Lenovo Core i7',
                'image_public_id' => 'laptop2_zhckl4',
                'disponible' => true,
            ],
        ];

        // Foreach para guardar los equipos en la base de datos
        foreach ($equipos as $equipo) {
            Equipo::create([
                'nombre' => $equipo['nombre'],
                'type' => $equipo['type'],
                'descripcion' => $equipo['descripcion'],
                'image_public_id' => $equipo['image_public_id'],
                'disponible' => $equipo['disponible'],
            ]);
        } 
    }
}



