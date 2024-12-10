{{--PRODUCTOS USUARIO--}}


<x-app-layout>

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
                    <h1 class="sm:text-7xl titulo0">Producto</h1>
                </div>
            
                <!-- Contenedor de la Descripción -->
                <div class=" text-center relative w-96" style="left: 15rem; top: -2rem;">
                    <p class="text-BLACK descripcion0">
                        Explora nuestra carta llena de sabores únicos. Desde el café más aromático hasta los postres más irresistibles. ¡Ven y comparte con nosotros!
                    </p>
                    <div class="mt-4">
                        <x-auth-header-button url="{{ route('login') }}" text="Comienza aquí" />
                    </div>    
                </div>
            </div>
</section>
{{--Encabezado --}} 


    
    {{--Categorias (productos)--}}
            <section>
                <div class="px-2 py-8 ">
                @livewire('product-filter')
                </div>
            </section>
</x-app-layout>    





<style>

    /* stylo*/
.descripcion0 {
    margin-top: 10px;
    color: #000000;
    max-width: 500px; /* Reducir el ancho máximo */
    padding-right: 5px; /* Controla la cantidad de espacio a la derecha */
    padding: 30px;
}



/* Título dentro del encabezado */
.titulo0 {
    position: relative;
    background: #ffffff;
    padding: 25px 50px;
    border-radius: 8px;
    display: inline-block;

    font-weight: bolder;
    color: #B4198B;
    margin-bottom: 100px;
    box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.2);
}

.titulo0::before {
    content: '';
    position: absolute;
    top: 10px;
    left: -15px;
    width: 100%;
    height: 100%;
    background: #B4198B;
    z-index: -1;
    border-radius: 8px;
    transform: translate(-5%, 5%);
}

.cate{
    margin-bottom: 10px;
}

</style>