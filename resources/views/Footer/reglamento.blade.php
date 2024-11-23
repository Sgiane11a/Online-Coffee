@extends('layouts.home')

@vite(['resources/js/coffee.js', 'resources/js/slider.js'])

@section('main')

<body class="bg-gray-50 text-gray-900 font-sans">

    <div class="container mx-auto p-8 max-w-3xl bg-white rounded-lg shadow-xl">

        <!-- Título -->
        <header class="text-center mb-12 animate__animated animate__fadeIn animate__delay-1s">
            <h1 class="text-4xl font-extrabold text-[#8C5D9A] leading-tight mb-3">Reglamento - Online Coffee en TECSUP</h1>
            <p class="text-lg text-gray-600 mt-2">Revisa las normas para disfrutar de nuestros servicios de manera adecuada.</p>
        </header>

        <!-- Sección: Normas Generales -->
        <section class="mb-10 animate__animated animate__fadeIn animate__delay-2s">
            <h2 class="text-2xl font-semibold text-[#8C5D9A] mb-4">Normas Generales</h2>
            <p class="text-lg text-gray-700">
                Bienvenido a <strong>Online Coffee</strong>. Al utilizar nuestros servicios, aceptas cumplir con las normas generales que rigen el uso de nuestras instalaciones y plataforma en línea. Estas normas están diseñadas para asegurar que todos los usuarios puedan disfrutar de una experiencia positiva y productiva.
            </p>
        </section>

        <!-- Sección: Uso de las Instalaciones -->
        <section class="mb-10 animate__animated animate__fadeIn animate__delay-3s">
            <h2 class="text-2xl font-semibold text-[#8C5D9A] mb-4">Uso de las Instalaciones</h2>
            <p class="text-lg text-gray-700">
                Todos los usuarios deben hacer un uso adecuado de las instalaciones de <strong>Online Coffee</strong>. Esto incluye el respeto por los demás usuarios y la preservación del equipo, como las computadoras, laptops y cubículos. Está prohibido el uso de las instalaciones para fines ilegales o perturbadores.
            </p>
        </section>

        <!-- Sección: Reserva de Servicios -->
        <section class="mb-10 animate__animated animate__fadeIn animate__delay-4s">
            <h2 class="text-2xl font-semibold text-[#8C5D9A] mb-4">Reserva de Servicios</h2>
            <p class="text-lg text-gray-700">
                Las reservas para cubículos, laptops y computadoras deben hacerse a través de nuestra plataforma en línea. Los usuarios deben respetar los horarios de las reservas y notificar cualquier cancelación con al menos 2 horas de antelación. Las reservas no son transferibles y deben ser usadas por la persona que realizó la reserva.
            </p>
        </section>

        <!-- Sección: Comportamiento Esperado -->
        <section class="mb-10 animate__animated animate__fadeIn animate__delay-5s">
            <h2 class="text-2xl font-semibold text-[#8C5D9A] mb-4">Comportamiento Esperado</h2>
            <p class="text-lg text-gray-700">
                Todos los usuarios deben comportarse de manera respetuosa y profesional en el espacio. Está prohibido el uso de lenguaje ofensivo, el consumo de drogas o alcohol dentro de las instalaciones, y cualquier actividad que interfiera con el bienestar o productividad de otros usuarios.
            </p>
        </section>

        <!-- Sección: Responsabilidad por Daños -->
        <section class="mb-10 animate__animated animate__fadeIn animate__delay-6s">
            <h2 class="text-2xl font-semibold text-[#8C5D9A] mb-4">Responsabilidad por Daños</h2>
            <p class="text-lg text-gray-700">
                Los usuarios son responsables de cualquier daño causado a las instalaciones o al equipo durante su uso. Si se detecta algún daño en los recursos, se cobrará una tarifa por la reparación o reemplazo.
            </p>
        </section>

        <!-- Sección: Modificaciones al Reglamento -->
        <section class="mb-10 animate__animated animate__fadeIn animate__delay-7s">
            <h2 class="text-2xl font-semibold text-[#8C5D9A] mb-4">Modificaciones al Reglamento</h2>
            <p class="text-lg text-gray-700">
                Nos reservamos el derecho de modificar este reglamento en cualquier momento. Cualquier cambio será publicado en esta página y entrará en vigor inmediatamente. Te recomendamos revisar esta página periódicamente para estar al tanto de las modificaciones.
            </p>
        </section>

        <!-- Footer -->
        <footer class="text-center mt-14 animate__animated animate__fadeIn animate__delay-8s">
            <p class="text-gray-500 text-sm">© 2024 Online Coffee. Todos los derechos reservados.</p>
        </footer>

    </div>

</body>

@endsection
