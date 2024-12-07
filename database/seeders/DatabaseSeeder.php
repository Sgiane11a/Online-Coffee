<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Admin;
use App\Models\Post;
use App\Models\Book;
use App\Models\Bookscategory;
use App\Models\Department;
use App\Models\Product;
use App\Models\Career;
use App\Models\Cubiculo;
use App\Models\Equipo;
use Database\Seeders\StoreSeeder; // Usar el namespace correcto
use Database\Seeders\CareersTableSeeder; // Usar el namespace correcto
use Database\Seeders\DepartmentsTableSeeder; // Usar el namespace correcto
use Database\Seeders\BookscategorySeeder;
use Database\Seeders\BookSeeder;
use Database\Seeders\ProductsSeeder;
use Database\Seeders\UsersSeeder;
use Database\Seeders\CubiculoSeeder;
use Database\Seeders\EquipoSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        \App\Models\Bookscategory::truncate();
        \App\Models\Department::truncate();
        \App\Models\Career::truncate();
        \App\Models\Book::truncate();
        \App\Models\Equipo::truncate();
        \App\Models\Cubiculo::truncate();


        // Crear administrador
        Admin::factory()->create([
            'name' => 'Administrador',
            'email' => 'admin@example.com',
        ]);

       

        // Llamar al seeder de departamentos
        $this->call(DepartmentsTableSeeder::class);

        // Llamar al seeder de categorías
        $this->call(StoreSeeder::class); // Aquí corregido

        // Llamar al seeder de carreras
        $this->call(CareersTableSeeder::class);

        // Llamar al seeder de categorías de libros
        $this->call(BookscategorySeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(BookSeeder::class);
        $this->call(ProductsSeeder::class);

        //Llamar al seeder de equipos
        $this->call(EquipoSeeder::class);

        //Llamar al seeder de cubiculos
        $this->call(CubiculoSeeder::class);


    }
}
