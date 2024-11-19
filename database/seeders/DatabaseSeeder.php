<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Admin;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        for ($i = 1; $i <= 10; $i++) {
            User::factory()->create([
                'name' => "Test User $i",
                'email' => "test$i@example.com",
            ]);
        }

        Admin::factory()->create([
            'name' => 'Test Admin',
            'email' => 'admin@example.com',
        ]);
    }
}
