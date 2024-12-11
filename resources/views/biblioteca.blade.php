@extends('layouts.home')

@section('main')
<div class="container-imagen0">
    {{-- Encabezado --}}
    <section class="relative bg-cover h-50 sm:h-60 md:h-[270px]" style="background-image: url('{{ asset('images/BIBLIOTECA.png') }}');">
        <div class="absolute inset-0"></div> <!-- Filtro oscuro encima del fondo -->

        <div class="relative z-10 flex flex-row items-center justify-between px- py-9 max-w-5xl mx-auto">
            <div class="grid grid-cols-4 items-center">
                <!-- Espacio vacío a la izquierda -->
                <div></div>
                <!-- Contenedor del Título -->
                <div class="text-center">
                    <h1 class="sm:text-7xl titulo0 text-black">Biblioteca</h1> <!-- Texto en negro -->
                </div>

                <!-- Contenedor de la Descripción -->
                <div class="text-center relative w-96" style="left: 15rem; top: -2rem;">
                    <p class="text-black descripcion0"> <!-- Texto en negro -->
                        Explora nuestros libros por departamento o accede a los libros generales para enriquecer tu aprendizaje en TECSUP.
                    </p>
                    <div class="mt-4">
                        <x-auth-header-button url="{{ route('login') }}" text="Comienza aquí" />
                    </div>    
                </div>
            </div>
        </div>
    </section>
    {{-- Encabezado --}} 

    <div class="container">
        <section class="grid1">
            <!-- Sección de Libros por Departamento -->
            <div class="card">
                <h2 class="font-extrabold card-title text-black"> <!-- Texto en negro -->
                    Tecnología Digital
                </h2>
                <p class="text-black"> <!-- Texto en negro -->
                    Libros sobre computación, desarrollo de software, redes, y otras áreas clave de la tecnología digital.
                </p>
                <img src="{{ asset('images/tecnologia-digital.png') }}" alt="Imagen de Tecnología Digital" class="imagen-responsive w-full h-48 object-cover">
            </div>

            <div class="card">
                <h2 class="font-extrabold card-title text-black"> <!-- Texto en negro -->
                    Diseño y Producción Industrial
                </h2>
                <p class="text-black"> <!-- Texto en negro -->
                    Libros sobre diseño industrial, manufactura, y procesos de producción con enfoque en la innovación.
                </p>
                <img src="{{ asset('images/diseno-produccion-industrial.png') }}" alt="Imagen de Diseño y Producción Industrial" class="imagen-responsive w-full h-48 object-cover">
            </div>

            <div class="card">
                <h2 class="font-extrabold card-title text-black"> <!-- Texto en negro -->
                    Minería y Procesos Químicos Metalúrgicos
                </h2>
                <p class="text-black"> <!-- Texto en negro -->
                    Explora libros sobre minería, extracción de minerales y procesos químicos utilizados en la metalurgia.
                </p>
                <img src="{{ asset('images/mineria-quimica-metalurgica.png') }}" alt="Imagen de Minería y Procesos Químicos Metalúrgicos" class="imagen-responsive w-full h-48 object-cover">
            </div>

            <div class="card">
                <h2 class="font-extrabold card-title text-black"> <!-- Texto en negro -->
                    Electricidad y Electrónica
                </h2>
                <p class="text-black"> <!-- Texto en negro -->
                    Aprende sobre circuitos eléctricos, sistemas de control, y fundamentos de la electrónica con estos libros.
                </p>
                <img src="{{ asset('images/electricidad-electronica.png') }}" alt="Imagen de Electricidad y Electrónica" class="imagen-responsive w-full h-48 object-cover">
            </div>

            <div class="card">
                <h2 class="font-extrabold card-title text-black"> <!-- Texto en negro -->
                    Mecánica y Aviación
                </h2>
                <p class="text-black"> <!-- Texto en negro -->
                    Libros especializados en mecánica, aeronáutica, y procesos involucrados en la aviación moderna.
                </p>
                <img src="{{ asset('images/mecanica-aviacion.png') }}" alt="Imagen de Mecánica y Aviación" class="imagen-responsive w-full h-48 object-cover">
            </div>

            <!-- Sección de Libros Generales -->
            <div class="card">
                <h2 class="font-extrabold card-title text-black"> <!-- Texto en negro -->
                    Cursos Generales
                </h2>
                <p class="text-black"> <!-- Texto en negro -->
                    Libros de matemáticas, física, ciencias sociales y más, ideales para complementar cualquier carrera.
                </p>
                <img src="{{ asset('images/cursos-generales.png') }}" alt="Imagen de Cursos Generales" class="imagen-responsive w-full h-48 object-cover">
            </div>

        </section>
    </div>
</div>
@endsection
