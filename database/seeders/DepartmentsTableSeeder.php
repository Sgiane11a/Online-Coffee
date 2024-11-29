<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    Department::create(['name' => 'Tecnologia Digital']);
    Department::create(['name' => 'Diseño y Producción Industrial']);
    Department::create(['name' => 'Minería y Procesos Químicos Metalúrgicos']);
    Department::create(['name' => 'Electricidad y Electrónica']);
    Department::create(['name' => 'Mecánica y Aviación']);
}
}
