     <!-- RESERVACIONES VIEW DE VISITANTE -->

 
     @extends('layouts.home')

     @section('main')
     <div class="container-imagen0">
    {{--Encabezado(Logo)--}}
    <section class="relative text-left bg-cover h-50 sm:h-60 md:h-[270px]" style="background-image: url('{{ asset('images/RESERVAS.png') }}');">
        <div class="absolute inset-0 "></div> <!-- Filtro oscuro encima del fondo -->
        <div class="relative z-10 flex flex-col gap-4 px-4 py-8 max-w-3xl mx-auto text-center">
            <h1 class="text-4xl sm:text-5xl md:text-6xl text-grape-350  font-extrabold leading-tight titulo0">Reservas</h1>
            <p class="text-lg sm:text-xl text-BLACK max-w-lg mx-auto">Reserva herramientas y espacios para complementar tus estudios con un solo clic.</p>
            <div class="mt-4">
                <x-auth-header-button url="{{ route('login') }}" text="Comienza aquí" />
            </div>    
        </div>
    </section>
    
        <!--- -->
     <div class="container">
         <section class="grid">
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
     
     
     