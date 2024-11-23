<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Bebidas',
        ]);
        Category::create([
            'name' => 'Snacks',
        ]);
        Category::create([
            'name' => 'Postres',
        ]);
        Category::create([
            'name' => 'Comida Rápida',
        ]);
    }
}
