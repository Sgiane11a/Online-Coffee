@extends('layouts.home')

@vite(['resources/js/coffee.js', 'resources/js/slider.js'])

@section('main')

<body class="bg-gradient-to-r from-[#FF7E5F] via-[#D4A5A5] to-[#FFE156] text-gray-900 font-sans">

    <div class="container mx-auto p-6 max-w-4xl bg-white rounded-lg shadow-lg">

        <!-- Header -->
        <header class="text-center mb-6">
            <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-[#8C5D9A]">
                Política de Privacidad - Online Coffee en TECSUP
            </h1>
        </header>

        <!-- Sección: Recopilación de Datos Personales -->
        <section class="mb-6 p-6 rounded-lg bg-gray-50 shadow-sm">
            <h2 class="text-2xl sm:text-3xl font-semibold text-[#8C5D9A] mb-4">Recopilación de Datos Personales</h2>
            <p class="text-base sm:text-lg text-gray-700">
                En <strong>Online Coffee</strong>, nos comprometemos a proteger tu privacidad. Recopilamos ciertos datos personales, como tu nombre, correo electrónico y detalles de tus reservas, con el único fin de ofrecerte nuestros servicios de manera más eficiente. Estos datos no serán compartidos con terceros sin tu consentimiento.
            </p>
        </section>

        <!-- Sección: Uso de la Información -->
        <section class="mb-6 p-6 rounded-lg bg-gray-50 shadow-sm">
            <h2 class="text-2xl sm:text-3xl font-semibold text-[#8C5D9A] mb-4">Uso de la Información</h2>
            <p class="text-base sm:text-lg text-gray-700">
                Utilizamos los datos recopilados para gestionar tus reservas, proporcionarte información relevante sobre nuestros servicios y mejorar tu experiencia en nuestra plataforma. También podemos enviarte actualizaciones sobre novedades y ofertas de nuestros servicios, siempre bajo tu consentimiento.
            </p>
        </section>

        <!-- Sección: Protección de Datos -->
        <section class="mb-6 p-6 rounded-lg bg-gray-50 shadow-sm">
            <h2 class="text-2xl sm:text-3xl font-semibold text-[#8C5D9A] mb-4">Protección de Datos</h2>
            <p class="text-base sm:text-lg text-gray-700">
                Tu seguridad es nuestra prioridad. Implementamos medidas de seguridad adecuadas para proteger tus datos personales contra accesos no autorizados, alteraciones, divulgación o destrucción. Sin embargo, ten en cuenta que ninguna transmisión de datos por Internet es completamente segura, por lo que no podemos garantizar la seguridad absoluta de tus datos.
            </p>
        </section>

        <!-- Sección: Derechos sobre tus Datos -->
        <section class="mb-6 p-6 rounded-lg bg-gray-50 shadow-sm">
            <h2 class="text-2xl sm:text-3xl font-semibold text-[#8C5D9A] mb-4">Derechos sobre tus Datos</h2>
            <p class="text-base sm:text-lg text-gray-700">
                Tienes el derecho de acceder, corregir o eliminar los datos personales que tengamos sobre ti. Si deseas ejercer alguno de estos derechos, puedes contactarnos a través de nuestro sistema de atención al cliente.
            </p>
        </section>

        <!-- Sección: Modificaciones a la Política -->
        <section class="mb-6 p-6 rounded-lg bg-gray-50 shadow-sm">
            <h2 class="text-2xl sm:text-3xl font-semibold text-[#8C5D9A] mb-4">Modificaciones a la Política de Privacidad</h2>
            <p class="text-base sm:text-lg text-gray-700">
                Nos reservamos el derecho de modificar esta política en cualquier momento. Las modificaciones serán publicadas en esta página, por lo que te recomendamos revisarla periódicamente para estar al tanto de cualquier cambio.
            </p>
        </section>

    </div>

</body>

@endsection
