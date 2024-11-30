<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeder extends Seeder
{
    public function run()
    {
        // Carreras de Tecnologia Digital
        User::create([
            'name' => 'Juan Pérez', 
            'email' => 'jperez@tecsup.edu.pe', 
            'password' => bcrypt('password'), 
            'career_id' => 1, // Carrera: Diseño y Desarrollo de Software
            'department_id' => 1, // Departamento: Tecnología Digital
            'profile_photo_path' => null
        ]);

        User::create([
            'name' => 'Ana López', 
            'email' => 'alopez1@tecsup.edu.pe', // Correo único
            'password' => bcrypt('password'), 
            'career_id' => 1, // Carrera: Diseño y Desarrollo de Software
            'department_id' => 1, // Departamento: Tecnología Digital
            'profile_photo_path' => null
        ]);

        User::create([
            'name' => 'Carlos Ruiz', 
            'email' => 'cruiz2@tecsup.edu.pe', // Correo único
            'password' => bcrypt('password'), 
            'career_id' => 2, // Carrera: Administración de Redes y Comunicaciones
            'department_id' => 1, // Departamento: Tecnología Digital
            'profile_photo_path' => null
        ]);

        User::create([
            'name' => 'Laura García', 
            'email' => 'lgarcia3@tecsup.edu.pe', // Correo único
            'password' => bcrypt('password'), 
            'career_id' => 2, // Carrera: Administración de Redes y Comunicaciones
            'department_id' => 1, // Departamento: Tecnología Digital
            'profile_photo_path' => null
        ]);

        User::create([
            'name' => 'Pedro Sánchez', 
            'email' => 'psanchez4@tecsup.edu.pe', // Correo único
            'password' => bcrypt('password'), 
            'career_id' => 3, // Carrera: Diseño y Desarrollo de Simuladores y Videojuegos
            'department_id' => 1, // Departamento: Tecnología Digital
            'profile_photo_path' => null
        ]);

        User::create([
            'name' => 'Marta Fernández', 
            'email' => 'mfernandez5@tecsup.edu.pe', // Correo único
            'password' => bcrypt('password'), 
            'career_id' => 3, // Carrera: Diseño y Desarrollo de Simuladores y Videojuegos
            'department_id' => 1, // Departamento: Tecnología Digital
            'profile_photo_path' => null
        ]);

        User::create([
            'name' => 'Javier Molina', 
            'email' => 'jmolina6@tecsup.edu.pe', // Correo único
            'password' => bcrypt('password'), 
            'career_id' => 4, // Carrera: Modelado y Animación Digital
            'department_id' => 1, // Departamento: Tecnología Digital
            'profile_photo_path' => null
        ]);

        User::create([
            'name' => 'Elena Martínez', 
            'email' => 'emartinez7@tecsup.edu.pe', // Correo único
            'password' => bcrypt('password'), 
            'career_id' => 4, // Carrera: Modelado y Animación Digital
            'department_id' => 1, // Departamento: Tecnología Digital
            'profile_photo_path' => null
        ]);

        User::create([
            'name' => 'Ricardo González', 
            'email' => 'rgonzalez8@tecsup.edu.pe', // Correo único
            'password' => bcrypt('password'), 
            'career_id' => 5, // Carrera: Big Data y Ciencia de Datos
            'department_id' => 1, // Departamento: Tecnología Digital
            'profile_photo_path' => null
        ]);

        User::create([
            'name' => 'Patricia Díaz', 
            'email' => 'pdiaz9@tecsup.edu.pe', // Correo único
            'password' => bcrypt('password'), 
            'career_id' => 5, // Carrera: Big Data y Ciencia de Datos
            'department_id' => 1, // Departamento: Tecnología Digital
            'profile_photo_path' => null
        ]);

        // Carreras de Diseño y Producción Industrial
        User::create([
            'name' => 'Tomás Rodríguez', 
            'email' => 'trodriguez10@tecsup.edu.pe', // Correo único
            'password' => bcrypt('password'), 
            'career_id' => 6, // Carrera: Diseño Industrial
            'department_id' => 2, // Departamento: Diseño y Producción Industrial
            'profile_photo_path' => null
        ]);

        User::create([
            'name' => 'Camila Herrera', 
            'email' => 'cherrera11@tecsup.edu.pe', // Correo único
            'password' => bcrypt('password'), 
            'career_id' => 6, // Carrera: Diseño Industrial
            'department_id' => 2, // Departamento: Diseño y Producción Industrial
            'profile_photo_path' => null
        ]);

        User::create([
            'name' => 'Luis Martínez', 
            'email' => 'lmartinez12@tecsup.edu.pe', // Correo único
            'password' => bcrypt('password'), 
            'career_id' => 7, // Carrera: Producción y Gestión Industrial
            'department_id' => 2, // Departamento: Diseño y Producción Industrial
            'profile_photo_path' => null
        ]);

        User::create([
            'name' => 'Valeria Sánchez', 
            'email' => 'vsanchez13@tecsup.edu.pe', // Correo único
            'password' => bcrypt('password'), 
            'career_id' => 7, // Carrera: Producción y Gestión Industrial
            'department_id' => 2, // Departamento: Diseño y Producción Industrial
            'profile_photo_path' => null
        ]);

        // Carreras de Minería y Procesos Químicos Metalúrgicos
        User::create([
            'name' => 'José Silva', 
            'email' => 'jsilva14@tecsup.edu.pe', // Correo único
            'password' => bcrypt('password'), 
            'career_id' => 8, // Carrera: Operaciones Mineras
            'department_id' => 3, // Departamento: Minería y Procesos Químicos Metalúrgicos
            'profile_photo_path' => null
        ]);

        User::create([
            'name' => 'Isabel González', 
            'email' => 'igonza15@tecsup.edu.pe', // Correo único
            'password' => bcrypt('password'), 
            'career_id' => 8, // Carrera: Operaciones Mineras
            'department_id' => 3, // Departamento: Minería y Procesos Químicos Metalúrgicos
            'profile_photo_path' => null
        ]);

        User::create([
            'name' => 'David Gómez', 
            'email' => 'dgomez16@tecsup.edu.pe', // Correo único
            'password' => bcrypt('password'), 
            'career_id' => 9, // Carrera: Procesos Químicos y Metalúrgicos
            'department_id' => 3, // Departamento: Minería y Procesos Químicos Metalúrgicos
            'profile_photo_path' => null
        ]);

        User::create([
            'name' => 'Sofía Morales', 
            'email' => 'smorales17@tecsup.edu.pe', // Correo único
            'password' => bcrypt('password'), 
            'career_id' => 9, // Carrera: Procesos Químicos y Metalúrgicos
            'department_id' => 3, // Departamento: Minería y Procesos Químicos Metalúrgicos
            'profile_photo_path' => null
        ]);

        // Carreras de Electricidad y Electrónica
        User::create([
            'name' => 'Carlos Pérez', 
            'email' => 'cperez18@tecsup.edu.pe', // Correo único
            'password' => bcrypt('password'), 
            'career_id' => 10, // Carrera: Electricidad Industrial
            'department_id' => 4, // Departamento: Electricidad y Electrónica
            'profile_photo_path' => null
        ]);

        User::create([
            'name' => 'María López', 
            'email' => 'mlopez19@tecsup.edu.pe', // Correo único
            'password' => bcrypt('password'), 
            'career_id' => 10, // Carrera: Electricidad Industrial
            'department_id' => 4, // Departamento: Electricidad y Electrónica
            'profile_photo_path' => null
        ]);

        User::create([
            'name' => 'Alejandro Gómez', 
            'email' => 'agomez20@tecsup.edu.pe', // Correo único
            'password' => bcrypt('password'), 
            'career_id' => 11, // Carrera: Electrónica Industrial
            'department_id' => 4, // Departamento: Electricidad y Electrónica
            'profile_photo_path' => null
        ]);
    }
}
