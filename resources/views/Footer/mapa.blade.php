@extends('layouts.home')

@section('main')
<body class="bg-gradient-to-r from-[#FF7E5F] via-[#D4A5A5] to-[#E0BBE4] text-gray-900 font-sans">

    <div class="container mx-auto p-6 fade-in">

        <!-- Título de la sección de ubicación -->
        <header class="text-center mb-8">
            <h1 class="text-3xl font-semibold text-[#8C5D9A]">Ubicación de Online Coffee</h1>
            <p class="text-lg text-gray-600 mt-2">Estamos ubicados dentro de las instalaciones de <strong>TECSUP</strong>. Encuentra nuestra dirección en el mapa a continuación y visítanos.</p>
        </header>

        <!-- Descripción de la ubicación -->
        <section class="mb-10">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                <!-- Descripción adicional sobre la ubicación -->
                <div class="space-y-4">
                    <h2 class="text-xl font-semibold text-[#8C5D9A]">¿Dónde Estamos?</h2>
                    <p class="text-lg text-gray-700">
                        Online Coffee está dentro de las instalaciones de <strong>TECSUP</strong>, uno de los centros educativos más importantes. Encuentra nuestra cafetería en el centro del campus, fácil de localizar para los estudiantes y profesores.
                    </p>
                    <p class="text-lg text-gray-700">
                        A solo unos pasos de las principales áreas de estudio y los servicios más utilizados en TECSUP, somos el lugar ideal para relajarte, estudiar o disfrutar de un delicioso café.
                    </p>
                    
                    <!-- Botón de llamada a la acción con bordes y transición -->
                    <div class="text-center">
                        <a href="https://www.tecsup.edu.pe" target="_blank" class="inline-block border-2 border-[#8C5D9A] text-[#8C5D9A] px-6 py-3 rounded-lg text-lg font-semibold hover:bg-[#8C5D9A] hover:text-white hover:border-[#8C5D9A] transition duration-300 ease-in-out">
                            Visita el sitio web de TECSUP
                        </a>
                    </div>
                </div>

                <!-- Mapa de ubicación embebido -->
                <div class="bg-white rounded-lg shadow-xl overflow-hidden hover:scale-105 transition-transform duration-300 ease-in-out">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2651.3236151946403!2d-76.95434760475199!3d-12.043695555061836!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c68826cec0c3%3A0xf6df8bcd4e0a5fcf!2sTecsup!5e0!3m2!1ses!2spe!4v1732350511426!5m2!1ses!2spe" 
                        width="100%" 
                        height="450" 
                        style="border:0; border-radius: 8px;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>

        </section>

        <!-- Elementos de contacto adicional -->
        <section class="bg-[#E0BBE4] py-6 px-4 rounded-lg shadow-md hover:scale-105 transition-transform duration-300 ease-in-out">
            <div class="text-center">
                <h2 class="text-2xl font-semibold text-[#8C5D9A]">Contáctanos</h2>
                <p class="text-lg text-gray-700 mb-4">¿Tienes alguna pregunta o deseas más información? No dudes en ponerte en contacto con nosotros.</p>
                <!-- Enlace de contacto con bordes y transición -->
                <a href="{{ route('contactanos') }}" class="inline-block border-2 border-[#8C5D9A] text-[#8C5D9A] px-6 py-3 rounded-lg text-lg font-semibold hover:bg-[#8C5D9A] hover:text-white hover:border-[#8C5D9A] transition duration-300 ease-in-out">
                    Ir a la página de contacto
                </a>
            </div>
        </section>

    </div>

    <style>
        /* Transición de entrada */
        .fade-in {
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>

</body>
@endsection
