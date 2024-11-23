@extends('layouts.home')

@vite(['resources/js/coffee.js', 'resources/js/slider.js'])

@section('main')

<body class="bg-gradient-to-r from-[#FF7E5F] via-[#D4A5A5] to-[#FFE156] text-gray-900 font-sans">

    <div class="container mx-auto p-6 max-w-4xl bg-white rounded-lg shadow-lg">

        <!-- Header -->
        <header class="text-center mb-6">
            <h1 class="text-3xl sm:text-4xl font-extrabold text-[#8C5D9A]">
                Acerca De Online Coffee en TECSUP
            </h1>
        </header>

        <!-- Sección: Atención al Cliente -->
        <section class="mb-6 p-6 rounded-lg bg-gray-50 shadow-sm">
            <h2 class="text-2xl sm:text-3xl font-semibold text-[#8C5D9A] mb-4">Atención al Cliente</h2>
            <p class="text-base sm:text-lg text-gray-700">
                Bienvenido a <strong>Online Coffee</strong>. Nuestro cibercafé se encuentra dentro de las instalaciones de <strong>TECSUP</strong>, combinando la biblioteca de la institución con nuestra cafetería. Ofrecemos un espacio ideal para estudiar, trabajar en proyectos o relajarte entre clases. Puedes reservar cubículos, laptops y computadoras a través de nuestra plataforma en línea. Además, contamos con un foro donde los usuarios pueden interactuar, compartir experiencias y hacer comentarios sobre nuestros servicios. Si tienes alguna consulta, no dudes en contactarnos a través del foro o de nuestro sistema de atención al cliente. ¡Estamos aquí para ayudarte!
            </p>
        </section>

        <!-- Sección: Privacidad y Seguridad -->
        <section class="mb-6 p-6 rounded-lg bg-gray-50 shadow-sm">
            <h2 class="text-2xl sm:text-3xl font-semibold text-[#8C5D9A] mb-4">Privacidad y Seguridad</h2>
            <p class="text-base sm:text-lg text-gray-700">
                En <strong>Online Coffee</strong>, la privacidad de nuestros usuarios es una prioridad. Aseguramos que todos tus datos personales sean protegidos y solo utilizados para gestionar tus reservas y mejorar la experiencia de usuario. No almacenamos información de pago ya que nuestro sistema solo permite hacer reservas de manera anticipada. Si tienes alguna pregunta sobre nuestra política de privacidad, puedes consultarla en nuestro sitio web.
            </p>
        </section>

        <!-- Sección: Consultas al por Mayor -->
        <section class="mb-6 p-6 rounded-lg bg-gray-50 shadow-sm">
            <h2 class="text-2xl sm:text-3xl font-semibold text-[#8C5D9A] mb-4">Consultas al por Mayor</h2>
            <p class="text-base sm:text-lg text-gray-700">
                Si eres parte de la comunidad de <strong>TECSUP</strong> o de alguna otra institución y deseas saber más sobre cómo nuestro espacio puede beneficiar a otros, no dudes en ponerte en contacto con nosotros. Estamos siempre abiertos a nuevas oportunidades de colaboración y buscamos constantemente mejorar nuestros servicios.
            </p>
        </section>

        <!-- Sección: Reserva de Servicios -->
        <section class="mb-6 p-6 rounded-lg bg-gray-50 shadow-sm">
            <h2 class="text-2xl sm:text-3xl font-semibold text-[#8C5D9A] mb-4">Reserva de Servicios</h2>
            <p class="text-base sm:text-lg text-gray-700">
                En <strong>Online Coffee</strong>, puedes hacer reservas para los cubículos, laptops y computadoras disponibles dentro de nuestras instalaciones. Estas reservas se realizan exclusivamente a través de nuestra plataforma en línea. Para garantizar un espacio adecuado, te recomendamos realizar tu reserva con anticipación. Las reservas son completamente gratuitas.
            </p>
        </section>

        <!-- Sección: Sección de Productos -->
        <section class="mb-6 p-6 rounded-lg bg-gray-50 shadow-sm">
            <h2 class="text-2xl sm:text-3xl font-semibold text-[#8C5D9A] mb-4">Sección de Productos</h2>
            <p class="text-base sm:text-lg text-gray-700">
                En nuestra página web, podrás ver los productos disponibles en el instituto, como snacks y bebidas. Sin embargo, te informamos que estos productos solo pueden adquirirse de forma presencial en nuestra cafetería. No es posible comprar productos a través de la web en este momento.
            </p>
        </section>

    </div>

</body>

@endsection
