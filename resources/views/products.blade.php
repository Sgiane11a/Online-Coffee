@extends('layouts.home')

@section('main')
<main class="">
{{--Encabezado(Logo)--}}
    <section class="relative text-left bg-cover h-50 sm:h-60 md:h-[270px]" style="background-image: url('{{ asset('images/PRODUCTOS.png') }}');">
        <div class="absolute inset-0 "></div> <!-- Filtro oscuro encima del fondo -->
        <div class="relative z-10 flex flex-col gap-4 px-4 py-8 max-w-3xl mx-auto text-center">
            <h1 class="text-4xl sm:text-5xl md:text-6xl text-grape-350  font-extrabold leading-tight titulo0">Productos</h1>
            <p class="text-lg sm:text-xl text-BLACK max-w-lg mx-auto">Explora nuestra carta llena de sabores únicos. 
                Desde el café más aromático hasta los postres más irresistibles. 
                ¡Ven y comparte con nosotros!</p>
            <div class="mt-4">
                <x-auth-header-button url="{{ route('login') }}" text="Comienza aquí" />
            </div>    
        </div>
    </section>
    

@endsection
