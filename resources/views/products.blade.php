@extends('layouts.home')

@section('main')
<main class="">
    {{--Encabezado(Logo)--}}
    <section class="relative text-left bg-cover h-60" style="background-image: url('{{asset('images/PRODUCTOS.jpg')}}'); ">
    <div class="flex flex-col gap-16 " >
        <h1 class="px-2 py-8 text-6xl text-grape-350 text-center font-extrabold title">Productos</h1>
    </div>
    <div class="absolute top-0 right-16 w-full max-w-[350px]">
        <p class="px-2 py-2 text-xl text-black text-left">Explora nuestra carta llena de sabores únicos. 
            Desde el café más aromático hasta los postres más irresistibles. 
            ¡Ven y comparte momentos especiales con nosotros!</p>
        <div class="mt-3">
            <x-auth-header-button url="{{ route('login') }}" text="Comienza aquí" />
        </div>    
    </div>

    {{--Comienza aqui(Logo)--}}
        
        
    {{--
    <div class="fixed top-16 right-60  w-full max-w-[350px]">
        <h1 class="px-2 py-8 text-1.5xl text-black text-right">
                Encuentra una amplia selección de artículos esenciales para
                el hogar, cuidado personal, y más. Calidad y conveniencia en un solo lugar.
        </h1>
    </div>--}}

    </section>

    {{--Categorias (productos)--}}

    
    <section>
        <div class="px-2 py-8 ">
        @livewire('product-filter')
        </div>
    </section>
</main>
@endsection
