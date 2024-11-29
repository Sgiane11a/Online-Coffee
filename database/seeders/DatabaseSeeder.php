<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Admin;
use App\Models\Post;
use Database\Seeders\StoreSeeder; // Usar el namespace correcto
use Database\Seeders\CareersTableSeeder; // Usar el namespace correcto
use Database\Seeders\DepartmentsTableSeeder; // Usar el namespace correcto
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Limpiar las tablas antes de insertar datos nuevos
        \App\Models\User::truncate();
        \App\Models\Admin::truncate();
        \App\Models\Post::truncate();

        // Crear usuario OC
        User::factory()->create([
            'name' => 'OC',
            'email' => 'online.coffee@tecsup.edu.pe',
        ]);

        // Crear usuarios de prueba
        $users_number = 10;
        for ($i = 1; $i <= $users_number; $i++) {
            User::factory()->create([
                'name' => "Test User $i",
                'email' => "test$i@example.com",
            ]);
        }

        // Crear administrador
        Admin::factory()->create([
            'name' => 'Administrador',
            'email' => 'admin@example.com',
        ]);

        // Crear un primer post
        Post::create([
            'user_id' => 1,
            'title' => 'Primer Mensaje',
            'content' => 'Hola :)',
        ]);

        // Llamar al seeder de departamentos
        $this->call(DepartmentsTableSeeder::class);

        // Llamar al seeder de categorías
        $this->call(StoreSeeder::class); // Aquí corregido

        // Llamar al seeder de carreras
        $this->call(CareersTableSeeder::class);
    }
}
