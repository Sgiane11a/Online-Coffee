@extends('layouts.home')

@vite(['resources/js/coffee.js', 'resources/js/slider.js'])

@section('main')

<body class="bg-gray-50 text-gray-900 font-sans">

    <div class="container mx-auto p-6 max-w-4xl bg-white rounded-xl shadow-lg">

        <!-- Header con Animación -->
        <header class="text-center mb-12 animate__animated animate__fadeIn animate__delay-1s">
            <h1 class="text-4xl font-extrabold text-[#B4198B]">Términos y Condiciones de Online Coffee en TECSUP</h1>
            <p class="text-xl text-gray-500 mt-2">Es importante que leas atentamente nuestros términos antes de usar nuestros servicios.</p>
        </header>

        <!-- Secciones con Animaciones -->
        <section class="mb-10 p-8 bg-[#E8D8F4] rounded-lg shadow-md animate__animated animate__fadeIn animate__delay-2s">
            <h2 class="text-2xl font-semibold text-[#6A4C9C] mb-4">Introducción</h2>
            <p class="text-gray-700">
                Al acceder y utilizar los servicios de <strong>Online Coffee</strong>, aceptas cumplir con los siguientes términos y condiciones. Si no estás de acuerdo con estos términos, te pedimos que no utilices nuestra plataforma.
            </p>
        </section>

        <section class="mb-10 p-8 bg-[#E8D8F4] rounded-lg shadow-md animate__animated animate__fadeIn animate__delay-3s">
            <h2 class="text-2xl font-semibold text-[#6A4C9C] mb-4">Servicios Ofrecidos</h2>
            <p class="text-gray-700">
                <strong>Online Coffee</strong> proporciona un espacio para realizar reservas de cubículos, laptops y computadoras dentro de las instalaciones de <strong>TECSUP</strong>. También ofrecemos un foro donde los usuarios pueden interactuar y compartir experiencias. Al utilizar estos servicios, aceptas que se gestionen tus reservas y datos de acuerdo con nuestra política de privacidad.
            </p>
        </section>

        <section class="mb-10 p-8 bg-[#E8D8F4] rounded-lg shadow-md animate__animated animate__fadeIn animate__delay-4s">
            <h2 class="text-2xl font-semibold text-[#6A4C9C] mb-4">Responsabilidad del Usuario</h2>
            <p class="text-gray-700">
                Como usuario, eres responsable de la información que proporcionas al hacer una reserva, y te comprometes a usar el espacio y los servicios de manera adecuada y respetuosa. No nos hacemos responsables de cualquier daño o pérdida que pueda surgir debido al mal uso de nuestros servicios.
            </p>
        </section>

        <section class="mb-10 p-8 bg-[#E8D8F4] rounded-lg shadow-md animate__animated animate__fadeIn animate__delay-5s">
            <h2 class="text-2xl font-semibold text-[#6A4C9C] mb-4">Propiedad Intelectual</h2>
            <p class="text-gray-700">
                Todos los contenidos disponibles en la plataforma de <strong>Online Coffee</strong>, incluidos pero no limitados a textos, imágenes, logos y gráficos, son propiedad de <strong>Online Coffee</strong> o de terceros que han autorizado su uso. Queda prohibida cualquier reproducción, distribución o modificación sin el consentimiento expreso.
            </p>
        </section>

        <section class="mb-10 p-8 bg-[#E8D8F4] rounded-lg shadow-md animate__animated animate__fadeIn animate__delay-6s">
            <h2 class="text-2xl font-semibold text-[#6A4C9C] mb-4">Modificaciones a los Términos</h2>
            <p class="text-gray-700">
                Nos reservamos el derecho de modificar estos términos en cualquier momento. Las modificaciones serán publicadas en esta página y entrarán en vigor inmediatamente. Te recomendamos revisar esta página periódicamente para estar al tanto de cualquier cambio.
            </p>
        </section>

        <section class="mb-10 p-8 bg-[#E8D8F4] rounded-lg shadow-md animate__animated animate__fadeIn animate__delay-7s">
            <h2 class="text-2xl font-semibold text-[#6A4C9C] mb-4">Ley Aplicable</h2>
            <p class="text-gray-700">
                Estos términos y condiciones se regirán por las leyes del Perú. Cualquier disputa relacionada con el uso de nuestros servicios será resuelta en los tribunales competentes del país.
            </p>
        </section>

        <!-- Footer -->
        <footer class="text-center mt-12 animate__animated animate__fadeIn animate__delay-8s">
            <p class="text-gray-500">© 2024 Online Coffee. Todos los derechos reservados.</p>
        </footer>

    </div>

</body>

@endsection
