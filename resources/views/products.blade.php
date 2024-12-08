@extends('layouts.home')

@section('main')
<main class="">
{{--Encabezado--}} 
    <section class="relative bg-cover h-50 sm:h-60 md:h-[270px]" style="background-image: url('{{ asset('images/PRODUCTOS.png') }}');">
        <div class="absolute inset-0"></div> <!-- Filtro oscuro encima del fondo -->


        <div class="relative z-10 flex flex-row items-center justify-between px- py-9 max-w-5xl mx-auto  ">
            <div class="grid grid-cols-4 items-center">
                    <!-- Espacio vacío a la izquierda -->
                    <div></div>
                    <!-- Contenedor del Título -->
                    <div class="text-center">
                        <h1 class="sm:text-7xl titulo0">Productos</h1>
                    </div>
                
                    <!-- Contenedor de la Descripción -->
                    <div class=" text-center relative w-96" style="left: 15rem; top: -2rem;">
                        <p class="text-BLACK descripcion0">
                            Explora nuestra carta llena de sabores únicos. 
                            Desde el café más aromático hasta los postres más irresistibles. 
                            ¡Ven y comparte con nosotros!
                        </p>
                        <div class="mt-4">
                            <x-auth-header-button url="{{ route('login') }}" text="Comienza aquí" />
                        </div>    
                    </div>
                </div>
    </section>
{{--Encabezado --}} 
    <main class=" " style="background-image: url('{{ asset('images/fondocomi.jpg') }}'); background-size: 120%; background-position: center;">
        {{-- Tu contenido aquí --}}

    
    
    {{--Categorias (productos)--}} 
    <section class="cate">
        <div class="px-2 py-8">
            @livewire('product-filter')
        </div>
    </section>
    
</main>
@endsection
