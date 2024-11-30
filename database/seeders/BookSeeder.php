<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Bookscategory;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear libros por categoría
        $categories = Bookscategory::all();

        // Insertar libros según la categoría
        foreach ($categories as $category) {

            // Diseño y Desarrollo de Software
            if ($category->name === 'Diseño y Desarrollo de Software') {
                Book::create([
                    'title' => 'Introducción al Desarrollo de Software',
                    'author' => 'Juan Pérez',
                    'category_id' => $category->id,
                    'language' => 'es',
                    'publication_year' => 2024,
                    'description' => 'Un libro que cubre los principios fundamentales del desarrollo de software, incluyendo análisis, diseño y pruebas.',
                    'image_url' => null,
                    'image_public_id' => null,
                ]);
                Book::create([
                    'title' => 'Software Development Essentials',
                    'author' => 'John Doe',
                    'category_id' => $category->id,
                    'language' => 'en',
                    'publication_year' => 2024,
                    'description' => 'A guide to the essential principles of software development, from analysis to design and testing.',
                    'image_url' => null,
                    'image_public_id' => null,
                ]);
            }

            // Administración de Redes y Comunicaciones
            if ($category->name === 'Administración de Redes y Comunicaciones') {
                Book::create([
                    'title' => 'Fundamentos de Redes y Comunicaciones',
                    'author' => 'Carlos Sánchez',
                    'category_id' => $category->id,
                    'language' => 'es',
                    'publication_year' => 2024,
                    'description' => 'Este libro cubre los conceptos básicos de redes y administración de comunicaciones en entornos empresariales.',
                    'image_url' => null,
                    'image_public_id' => null,
                ]);
                Book::create([
                    'title' => 'Networking and Communications Management',
                    'author' => 'Alice Johnson',
                    'category_id' => $category->id,
                    'language' => 'en',
                    'publication_year' => 2024,
                    'description' => 'A comprehensive guide to networking and communication management in business environments.',
                    'image_url' => null,
                    'image_public_id' => null,
                ]);
            }

            // Diseño y Desarrollo de Simuladores y Videojuegos
            if ($category->name === 'Diseño y Desarrollo de Simuladores y Videojuegos') {
                Book::create([
                    'title' => 'Desarrollo de Videojuegos para Principiantes',
                    'author' => 'Lucía González',
                    'category_id' => $category->id,
                    'language' => 'es',
                    'publication_year' => 2024,
                    'description' => 'Una introducción al diseño y desarrollo de videojuegos, cubriendo desde la creación de conceptos hasta la implementación en plataformas.',
                    'image_url' => null,
                    'image_public_id' => null,
                ]);
                Book::create([
                    'title' => 'Game Development Essentials',
                    'author' => 'Michael Roberts',
                    'category_id' => $category->id,
                    'language' => 'en',
                    'publication_year' => 2024,
                    'description' => 'An introduction to game design and development, covering everything from concept creation to platform implementation.',
                    'image_url' => null,
                    'image_public_id' => null,
                ]);
            }

            // Modelado y Animación Digital
            if ($category->name === 'Modelado y Animación Digital') {
                Book::create([
                    'title' => 'Modelado 3D para Principiantes',
                    'author' => 'Alberto Ruiz',
                    'category_id' => $category->id,
                    'language' => 'es',
                    'publication_year' => 2024,
                    'description' => 'Una guía para aprender las bases del modelado 3D utilizando las herramientas más comunes en la industria.',
                    'image_url' => null,
                    'image_public_id' => null,
                ]);
                Book::create([
                    'title' => '3D Modeling for Beginners',
                    'author' => 'Sarah Lee',
                    'category_id' => $category->id,
                    'language' => 'en',
                    'publication_year' => 2024,
                    'description' => 'A beginner\'s guide to mastering 3D modeling using industry-standard tools.',
                    'image_url' => null,
                    'image_public_id' => null,
                ]);
            }

            // Big Data y Ciencia de Datos
            if ($category->name === 'Big Data y Ciencia de Datos') {
                Book::create([
                    'title' => 'Introducción a Big Data',
                    'author' => 'Ricardo Fernández',
                    'category_id' => $category->id,
                    'language' => 'es',
                    'publication_year' => 2024,
                    'description' => 'Un libro que cubre los fundamentos del Big Data y las herramientas necesarias para trabajar con grandes volúmenes de datos.',
                    'image_url' => null,
                    'image_public_id' => null,
                ]);
                Book::create([
                    'title' => 'Big Data and Data Science',
                    'author' => 'Rebecca Smith',
                    'category_id' => $category->id,
                    'language' => 'en',
                    'publication_year' => 2024,
                    'description' => 'An in-depth look at Big Data technologies and data science techniques for analyzing large datasets.',
                    'image_url' => null,
                    'image_public_id' => null,
                ]);
            }

            // Diseños Industriales
            if ($category->name === 'Diseño Industrial') {
                Book::create([
                    'title' => 'Fundamentos de Diseño Industrial',
                    'author' => 'Marcos Díaz',
                    'category_id' => $category->id,
                    'language' => 'es',
                    'publication_year' => 2024,
                    'description' => 'Este libro proporciona una visión integral sobre el diseño industrial, desde la conceptualización hasta la producción.',
                    'image_url' => null,
                    'image_public_id' => null,
                ]);
                Book::create([
                    'title' => 'Industrial Design Fundamentals',
                    'author' => 'Lina Adams',
                    'category_id' => $category->id,
                    'language' => 'en',
                    'publication_year' => 2024,
                    'description' => 'A comprehensive guide to industrial design, from conceptualization to production.',
                    'image_url' => null,
                    'image_public_id' => null,
                ]);
            }

            if ($category->name === 'Producción y Gestión Industrial') {
                Book::create([
                    'title' => 'Gestión de la Producción Industrial',
                    'author' => 'Laura Gómez',
                    'category_id' => $category->id,
                    'language' => 'es',
                    'publication_year' => 2024,
                    'description' => 'Una guía completa para gestionar la producción en entornos industriales, incluyendo planificación y control.',
                    'image_url' => null,
                    'image_public_id' => null,
                ]);
                Book::create([
                    'title' => 'Industrial Production and Management',
                    'author' => 'David White',
                    'category_id' => $category->id,
                    'language' => 'en',
                    'publication_year' => 2024,
                    'description' => 'A comprehensive guide to managing industrial production, including planning and control.',
                    'image_url' => null,
                    'image_public_id' => null,
                ]);
            }

            // Operaciones Mineras
            if ($category->name === 'Operaciones Mineras') {
                Book::create([
                    'title' => 'Introducción a la Minería y sus Operaciones',
                    'author' => 'José Martínez',
                    'category_id' => $category->id,
                    'language' => 'es',
                    'publication_year' => 2024,
                    'description' => 'Este libro aborda los principios fundamentales de las operaciones mineras y las mejores prácticas en la industria.',
                    'image_url' => null,
                    'image_public_id' => null,
                ]);
                Book::create([
                    'title' => 'Mining Operations and Techniques',
                    'author' => 'Ethan Taylor',
                    'category_id' => $category->id,
                    'language' => 'en',
                    'publication_year' => 2024,
                    'description' => 'A guide to the fundamental principles of mining operations and best practices in the industry.',
                    'image_url' => null,
                    'image_public_id' => null,
                ]);
            }

            // Procesos Químicos y Metalúrgicos
            if ($category->name === 'Procesos Químicos y Metalúrgicos') {
                Book::create([
                    'title' => 'Fundamentos de Procesos Químicos',
                    'author' => 'Ana Pérez',
                    'category_id' => $category->id,
                    'language' => 'es',
                    'publication_year' => 2024,
                    'description' => 'Un estudio sobre los procesos químicos fundamentales, enfocado en las aplicaciones en la industria metalúrgica.',
                    'image_url' => null,
                    'image_public_id' => null,
                ]);
                Book::create([
                    'title' => 'Chemical and Metallurgical Processes',
                    'author' => 'John Wilson',
                    'category_id' => $category->id,
                    'language' => 'en',
                    'publication_year' => 2024,
                    'description' => 'A study of the fundamental chemical processes, focused on their applications in the metallurgical industry.',
                    'image_url' => null,
                    'image_public_id' => null,
                ]);
            }

            // Electricidad Industrial
            if ($category->name === 'Electricidad Industrial') {
                Book::create([
                    'title' => 'Fundamentos de Electricidad Industrial',
                    'author' => 'Carlos Ramírez',
                    'category_id' => $category->id,
                    'language' => 'es',
                    'publication_year' => 2024,
                    'description' => 'Una introducción a los principios básicos de la electricidad en un entorno industrial, desde circuitos hasta instalaciones.',
                    'image_url' => null,
                    'image_public_id' => null,
                ]);
                Book::create([
                    'title' => 'Industrial Electricity Fundamentals',
                    'author' => 'Emily Clark',
                    'category_id' => $category->id,
                    'language' => 'en',
                    'publication_year' => 2024,
                    'description' => 'An introduction to the fundamental principles of electricity in an industrial setting, from circuits to installations.',
                    'image_url' => null,
                    'image_public_id' => null,
                ]);
            }

            // Electrónica y Automatización Industrial
            if ($category->name === 'Electrónica y Automatización Industrial') {
                Book::create([
                    'title' => 'Introducción a la Electrónica y Automatización',
                    'author' => 'Jorge González',
                    'category_id' => $category->id,
                    'language' => 'es',
                    'publication_year' => 2024,
                    'description' => 'Este libro proporciona los fundamentos de la electrónica y su aplicación en la automatización industrial.',
                    'image_url' => null,
                    'image_public_id' => null,
                ]);
                Book::create([
                    'title' => 'Introduction to Electronics and Automation',
                    'author' => 'Oliver Stone',
                    'category_id' => $category->id,
                    'language' => 'en',
                    'publication_year' => 2024,
                    'description' => 'This book covers the fundamentals of electronics and its application in industrial automation.',
                    'image_url' => null,
                    'image_public_id' => null,
                ]);
            }

            // Mecatrónica Industrial
            if ($category->name === 'Mecatrónica Industrial') {
                Book::create([
                    'title' => 'Mecatrónica Industrial: Fundamentos y Aplicaciones',
                    'author' => 'Ricardo Herrera',
                    'category_id' => $category->id,
                    'language' => 'es',
                    'publication_year' => 2024,
                    'description' => 'Una visión integral de la mecatrónica industrial, combinando mecánica, electrónica e informática para mejorar procesos.',
                    'image_url' => null,
                    'image_public_id' => null,
                ]);
                Book::create([
                    'title' => 'Industrial Mechatronics: Fundamentals and Applications',
                    'author' => 'Stephen Harris',
                    'category_id' => $category->id,
                    'language' => 'en',
                    'publication_year' => 2024,
                    'description' => 'An overview of industrial mechatronics, combining mechanics, electronics, and computer science to improve processes.',
                    'image_url' => null,
                    'image_public_id' => null,
                ]);
            }

            // Gestión y Mantenimiento de Maquinaria Industrial
            if ($category->name === 'Gestión y Mantenimiento de Maquinaria Industrial') {
                Book::create([
                    'title' => 'Mantenimiento y Gestión de Maquinaria Industrial',
                    'author' => 'María López',
                    'category_id' => $category->id,
                    'language' => 'es',
                    'publication_year' => 2024,
                    'description' => 'Una guía práctica sobre las mejores prácticas de mantenimiento y gestión de maquinaria en el ámbito industrial.',
                    'image_url' => null,
                    'image_public_id' => null,
                ]);
                Book::create([
                    'title' => 'Industrial Machinery Maintenance and Management',
                    'author' => 'Joshua Scott',
                    'category_id' => $category->id,
                    'language' => 'en',
                    'publication_year' => 2024,
                    'description' => 'A practical guide to best practices in the maintenance and management of machinery in industrial settings.',
                    'image_url' => null,
                    'image_public_id' => null,
                ]);
            }

            // Gestión de Mantenimiento de Maquinaria Pesada
            if ($category->name === 'Gestión de Mantenimiento de Maquinaria Pesada') {
                Book::create([
                    'title' => 'Gestión de Mantenimiento de Maquinaria Pesada',
                    'author' => 'Héctor Díaz',
                    'category_id' => $category->id,
                    'language' => 'es',
                    'publication_year' => 2024,
                    'description' => 'Un enfoque práctico para la gestión eficiente del mantenimiento de maquinaria pesada en entornos industriales.',
                    'image_url' => null,
                    'image_public_id' => null,
                ]);
                Book::create([
                    'title' => 'Heavy Equipment Maintenance Management',
                    'author' => 'Robert Harris',
                    'category_id' => $category->id,
                    'language' => 'en',
                    'publication_year' => 2024,
                    'description' => 'A practical approach to efficiently managing the maintenance of heavy machinery in industrial environments.',
                    'image_url' => null,
                    'image_public_id' => null,
                ]);
            }

             // Aviación y Mecánica Aeronáutica
             if ($category->name === 'Aviación y Mecánica Aeronáutica') {
                Book::create([
                    'title' => 'Introducción a la Mecánica Aeronáutica',
                    'author' => 'José López',
                    'category_id' => $category->id,
                    'language' => 'es',
                    'publication_year' => 2024,
                    'description' => 'Este libro cubre los principios básicos de la mecánica aeronáutica, incluyendo la teoría de vuelo y mantenimiento.',
                    'image_url' => null,
                    'image_public_id' => null,
                ]);
                Book::create([
                    'title' => 'Introduction to Aeronautical Mechanics',
                    'author' => 'William Carter',
                    'category_id' => $category->id,
                    'language' => 'en',
                    'publication_year' => 2024,
                    'description' => 'This book covers the basic principles of aeronautical mechanics, including flight theory and maintenance.',
                    'image_url' => null,
                    'image_public_id' => null,
                ]);
            }

            // Cálculo
            if ($category->name === 'Cálculo') {
                Book::create([
                    'title' => 'Cálculo: Fundamentos y Aplicaciones',
                    'author' => 'Carlos Fernández',
                    'category_id' => $category->id,
                    'language' => 'es',
                    'publication_year' => 2024,
                    'description' => 'Una introducción al cálculo, cubriendo límites, derivadas e integrales, con ejemplos prácticos.',
                    'image_url' => null,
                    'image_public_id' => null,
                ]);
                Book::create([
                    'title' => 'Calculus: Fundamentals and Applications',
                    'author' => 'John Smith',
                    'category_id' => $category->id,
                    'language' => 'en',
                    'publication_year' => 2024,
                    'description' => 'An introduction to calculus, covering limits, derivatives, and integrals with practical examples.',
                    'image_url' => null,
                    'image_public_id' => null,
                ]);
            }

            // Expresión Oral
            if ($category->name === 'Expresión Oral') {
                Book::create([
                    'title' => 'Técnicas de Expresión Oral',
                    'author' => 'Ana Rodríguez',
                    'category_id' => $category->id,
                    'language' => 'es',
                    'publication_year' => 2024,
                    'description' => 'Este libro ofrece una introducción a las técnicas de comunicación oral, incluyendo oratoria y presentaciones efectivas.',
                    'image_url' => null,
                    'image_public_id' => null,
                ]);
                Book::create([
                    'title' => 'Oral Expression Techniques',
                    'author' => 'David Lee',
                    'category_id' => $category->id,
                    'language' => 'en',
                    'publication_year' => 2024,
                    'description' => 'This book offers an introduction to oral communication techniques, including public speaking and effective presentations.',
                    'image_url' => null,
                    'image_public_id' => null,
                ]);
            }

            // Física
            if ($category->name === 'Física') {
                Book::create([
                    'title' => 'Fundamentos de Física',
                    'author' => 'Ricardo Martínez',
                    'category_id' => $category->id,
                    'language' => 'es',
                    'publication_year' => 2024,
                    'description' => 'Un enfoque básico y comprensivo de los principios de la física, desde la mecánica hasta la termodinámica.',
                    'image_url' => null,
                    'image_public_id' => null,
                ]);
                Book::create([
                    'title' => 'Fundamentals of Physics',
                    'author' => 'Henry Thompson',
                    'category_id' => $category->id,
                    'language' => 'en',
                    'publication_year' => 2024,
                    'description' => 'A basic and comprehensive approach to the principles of physics, from mechanics to thermodynamics.',
                    'image_url' => null,
                    'image_public_id' => null,
                ]);
            }

            // Electricidad
            if ($category->name === 'Electricidad') {
                Book::create([
                    'title' => 'Principios de Electricidad',
                    'author' => 'Luis Gómez',
                    'category_id' => $category->id,
                    'language' => 'es',
                    'publication_year' => 2024,
                    'description' => 'Un libro introductorio sobre los principios de la electricidad, desde la teoría hasta las aplicaciones prácticas.',
                    'image_url' => null,
                    'image_public_id' => null,
                ]);
                Book::create([
                    'title' => 'Principles of Electricity',
                    'author' => 'Sarah Evans',
                    'category_id' => $category->id,
                    'language' => 'en',
                    'publication_year' => 2024,
                    'description' => 'An introductory book on the principles of electricity, from theory to practical applications.',
                    'image_url' => null,
                    'image_public_id' => null,
                ]);
            }
        }
    }
}