<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cubiculo;

class CubiculoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cubiculos = [
            [
            'nombre' => 'Cubículo N°1',
            'aforo' => 7,
            'descripcion' => 'Cubículo con un proyector y una computadora',
            'disponible' => true
            ],
        ];

        // Foreach para guardar los cubiculos en la base de datos
        foreach ($cubiculos as $cubiculo) {
            Cubiculo::create([
                'nombre' => $cubiculo['nombre'],
                'aforo' => $cubiculo['aforo'],
                'descripcion' => $cubiculo['descripcion'],
                'disponible' => $cubiculo['disponible'],
            ]);
        }
    }
}
