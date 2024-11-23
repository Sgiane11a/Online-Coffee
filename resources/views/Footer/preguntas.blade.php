@extends('layouts.home')

@section('main')

<body class="bg-gray-100 text-gray-900 font-sans">

    <div class="container mx-auto p-6">
        <!-- Imagen principal -->
        <header class="relative text-center mb-12">
            <img 
                src="https://jcmagazine.com/wp-content/uploads/2019/10/tecsup-780x400.jpg" 
                alt="Online Coffee - Servicios Generales" 
                class="rounded-lg shadow-md w-full h-64 object-cover">
            <div class="absolute inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center">
                <h1 class="text-4xl font-bold text-white animate-fade-in">Preguntas Frecuentes</h1>
            </div>
        </header>

        <!-- Introducción -->
        <section class="text-center mb-12">
            <p class="text-lg text-gray-600">
                Aquí encontrarás respuestas a las dudas más comunes sobre nuestros servicios en <span class="font-bold" style="color: #8C5D9A;">Online Coffee</span>. Si no encuentras lo que buscas, <a href={{route('contactanos')}} class="underline hover:text-gray-700" style="color: #8C5D9A;">contáctanos</a> a través de nuestro foro.
            </p>
        </section>

        <!-- Sección de preguntas -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            @php
                $questions = [
                    [
                        'icon' => 'calendar-alt',
                        'title' => '¿Cómo hago una reserva?',
                        'content' => 'Para hacer una reserva, solo tienes que acceder a nuestra plataforma en línea, seleccionar el servicio que deseas (cubículo, laptop o computadora), y elegir el horario que más te convenga. Las reservas son completamente gratuitas.'
                    ],
                    [
                        'icon' => 'edit',
                        'title' => '¿Cómo puedo cancelar o modificar mi reserva?',
                        'content' => 'Puedes cancelar o modificar tu reserva desde tu cuenta en la plataforma en línea. Si tienes problemas, contáctanos a través del foro o de nuestro sistema de atención al cliente.'
                    ],
                    [
                        'icon' => 'shopping-cart',
                        'title' => '¿Los productos se pueden comprar en línea?',
                        'content' => 'Actualmente, los productos como snacks y bebidas solo se pueden comprar de manera presencial en nuestra cafetería. No realizamos ventas en línea.'
                    ],
                    [
                        'icon' => 'users',
                        'title' => '¿El servicio es solo para estudiantes de TECSUP?',
                        'content' => 'Aunque estamos ubicados dentro de las instalaciones de <span class="font-bold">TECSUP</span>, el servicio está disponible para cualquier usuario que desee hacer uso de nuestras instalaciones. Solo necesitas registrarte en la plataforma en línea.'
                    ],
                    [
                        'icon' => 'door-open',
                        'title' => '¿Puedo usar los cubículos para reuniones de grupo?',
                        'content' => 'Sí, nuestros cubículos están diseñados para ser usados individualmente o en grupos pequeños. Puedes reservarlos para reuniones o proyectos de equipo.'
                    ]
                ];
            @endphp

            @foreach ($questions as $q)
            <section class="flex flex-col items-center bg-white shadow-md rounded-lg p-6 hover:shadow-lg transform transition duration-300 hover:scale-105">
                <div class="rounded-full p-4 mb-4" style="background-color: #8C5D9A;">
                    <i class="fas fa-{{ $q['icon'] }} text-white text-3xl"></i>
                </div>
                <h2 class="text-2xl font-semibold mb-4" style="color: #8C5D9A;">
                    {{ $q['title'] }}
                </h2>
                <p class="text-gray-700 leading-relaxed text-center">
                    {!! $q['content'] !!}
                </p>
            </section>
            @endforeach
        </div>

        <!-- Sección destacada -->
        <section class="mt-12 p-6" style="background-color: #F3E5F5; border-left: 4px solid #8C5D9A;">
            <h3 class="text-xl font-semibold mb-2" style="color: #8C5D9A;">¡Recomendaciones para usuarios nuevos!</h3>
            <ul class="list-disc pl-6 text-gray-700">
                <li>Recuerda llegar a tiempo para aprovechar tu reserva al máximo.</li>
                <li>Si necesitas soporte técnico, puedes acudir a nuestro personal en el área de cubículos.</li>
                <li>Explora el foro para conectarte con otros usuarios y compartir experiencias.</li>
            </ul>
        </section>

        
    </div>

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>

@endsection
