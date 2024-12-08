     <!-- RESERVACIONES VIEW DE VISITANTE -->

 
     @extends('layouts.home')

     @section('main')
     <div class="container-imagen0">
{{--Encabezado--}} 
<section class="relative bg-cover h-50 sm:h-60 md:h-[270px]" style="background-image: url('{{ asset('images/RESERVAS.png') }}');">
    <div class="absolute inset-0"></div> <!-- Filtro oscuro encima del fondo -->


    <div class="relative z-10 flex flex-row items-center justify-between px- py-9 max-w-5xl mx-auto  ">
        <div class="grid grid-cols-4 items-center">
                <!-- Espacio vacío a la izquierda -->
                <div></div>
                <!-- Contenedor del Título -->
                <div class="text-center">
                    <h1 class="sm:text-7xl titulo0">Reservas</h1>
                </div>
            
                <!-- Contenedor de la Descripción -->
                <div class=" text-center relative w-96" style="left: 15rem; top: -2rem;">
                    <p class="text-BLACK descripcion0">
                        Reserva herramientas y espacios para complementar tus estudios con un solo clic.
                    </p>
                    <div class="mt-4">
                        <x-auth-header-button url="{{ route('login') }}" text="Comienza aquí" />
                    </div>    
                </div>
            </div>
</section>
{{--Encabezado --}} 
     <div class="container">
         <section class="grid1">
             <div class="card">
                 <h2 class="font-extrabold card-title">Computadoras</h2>
                 <p>Reserva de computadoras con acceso a internet de alta velocidad y software especializado. Sujeto a disponibilidad.</p>
                 <img src="{{ asset('images/1.png') }}" alt="Imagen de Reservas" class="imagen-responsive">
     
             </div>
             <div class="card">
                 <h2 class="font-extrabold card-title">Laptops</h2>
                 <p>Reserva de laptops con acceso a software especializado. Para uso en los salones del campus, sujeto a disponibilidad.</p>
                 <img src="{{ asset('images/2.png') }}" alt="Imagen de Reservas" class="imagen-responsive">
     
             </div>
             <div class="card">
                 <h2 class="font-extrabold card-title">Cubículos</h2>
                 <p>Espacios privados para estudiar de manera tranquila y enfocada. Equipados para maximizar la productividad.</p>
                 <img src="{{ asset('images/3.png') }}" alt="Imagen de Reservas" class="imagen-responsive">
     
             </div>
         </section>
     </div>
     
     @endsection
     
     
     