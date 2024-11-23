<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Admin;
use App\Models\Post;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'OC',
            'email' => 'online.coffee@tecsup.edu.pe',
        ]);

        $users_number = 10;
        for ($i = 1; $i <= $users_number; $i++) {
            User::factory()->create([
                'name' => "Test User $i",
                'email' => "test$i@example.com",
            ]);
        }

        Admin::factory()->create([
            'name' => 'Administrador',
            'email' => 'admin@example.com',
        ]);

        Post::create([
            'user_id' => 1,
            'title' => 'Primer Mensaje',
            'content' => 'Hola :)',
        ]);
    }
}
