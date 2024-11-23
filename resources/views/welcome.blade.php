@extends('layouts.home')

@vite(['resources/js/coffee.js', 'resources/js/slider.js'])

@section('main')
    <main class="">
        {{--Encabezado(Logo)--}}
        <section class="relative text-center bg-cover bg-center h-screen" style="background-image: url('{{asset('images/ILogo.png')}}');">
            <div class="absolute inset-0 bg-black bg-opacity-20"></div>
            <div class="relative z-10 flex justify-end items-center h-full text-white py-24 px-4">
                <div class="text-left w-full md:w-1/2 pl-2">
                    <h1 class="text-4xl md:text-6xl font-bold">Donde las ideas cobran vida y se transforman en realidad.</h1>
                    <p class="mt-4 text-lg md:text-xl">Descubre un entorno para combinar la productividad con el confort, donde cada detalle
                       está pensado para inspirar tu creatividad, facilitar tu aprendizaje y fomentar la colaboración.</p>
                    <div class="mt-6">
                        <x-auth-header-button url="{{ route('login') }}" text="Comienza tu experiencia" />
                    </div>    
                </div>
            </div>
        </section>       

        {{--Taza animada--}}     
        <section class="flex justify-center items-center border-b-2 border-blueberry-100 py-12 bg-white">
            <div class="flex flex-col justify-center items-center">
                <p class="font-extrabold text-3xl break-normal text-center fa1">"Una taza de café, millones de ideas. Juntos, somos imparables”</p>
                <p class="font-extrabold text-2xl break-normal text-center fa2">"Desde una taza, nacen las mejores conexiones entre mentes creativas."</p>
                <p class="font-extrabold text-1xl break-normal text-center title">"El café une, inspira y acompaña: el aliado perfecto para cada proyecto."</p>
                <p class="font-extrabold text-5xl break-normal text-center title">"Café y comunidad: ingredientes esenciales para aprender y crecer."</p>
                <p class="font-extrabold text-4xl break-normal text-center title">"Cada día, millones de estudiantes comparten un café mientras trabajan en sus sueños."</p>
                <p class="font-extrabold text-2xl break-normal text-center title">"¿Sabías que un café caliente puede aumentar la sensación de conexión entre las personas?"</p>
                <p class="font-extrabold text-3xl break-normal text-center title">En el 85% de los proyectos colaborativos, las mejores ideas surgen con una taza de café en la mano.</p>
                <canvas aria-label="Modelo 3D de un café" class="aspect-auto" id="coffee"></canvas>
            </div>
        </section>

        {{--Carrusel--}}
        <section class="flex justify-center border-b-2 border-blueberry-100">
            <div id="welcome-slide" class="splide" aria-labelledby="carousel-heading">
                <div class="splide__arrows z-30 absolute flex justify-between items-center h-full w-full p-2">
                    <button class="splide__arrow splide__arrow--prev">
                        <svg class="h-16 text-raspberry-900 bg-raspberry-100 rounded-full" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="currentColor" d="M2 12A10 10 0 0 1 12 2a10 10 0 0 1 10 10a10 10 0 0 1-10 10A10 10 0 0 1 2 12m16-1h-8l3.5-3.5l-1.42-1.42L6.16 12l5.92 5.92l1.42-1.42L10 13h8z"/></svg>
                    </button>
                    <button class="splide__arrow splide__arrow--next">
                        <svg class="h-16 text-raspberry-900 bg-raspberry-100 rounded-full" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="currentColor" d="M22 12a10 10 0 0 1-10 10A10 10 0 0 1 2 12A10 10 0 0 1 12 2a10 10 0 0 1 10 10M6 13h8l-3.5 3.5l1.42 1.42L17.84 12l-5.92-5.92L10.5 7.5L14 11H6z"/></svg>
                    </button>
                </div>

                <div class="splide__track">
                    <ul class="splide__list">
                        <x-welcome-slide image="https://splidejs.com/images/slides/general/01.jpg" />
                        <x-welcome-slide image="https://www1.tecsup.edu.pe/sites/default/files/imagenes-webdrupal/105_Listado_Cover_1.png" />
                        <x-welcome-slide image="https://splidejs.com/images/slides/general/01.jpg" />
                        <x-welcome-slide image="https://splidejs.com/images/slides/general/01.jpg" />
                        <x-welcome-slide image="https://splidejs.com/images/slides/general/01.jpg" />
                        <x-welcome-slide image="https://splidejs.com/images/slides/general/01.jpg" />
                    </ul>
                </div>
            </div>
        </section>

        {{--Información--}}
        <section class="py-16 px-8 bg-white">
            <div class="max-w-7xl mx-auto text-center">
                <h2 class="text-3xl font-bold">Conoce nuestros servicios</h2>
                <p class="mt-4 text-lg">Online Coffee ofrece espacios diseñados para reuniones, trabajo en equipo y relajación, con Wi-Fi de alta velocidad y ambiente cómodo.</p>
            </div>
        </section> 

        {{--Parte de servicios--}}
        <section class="flex justify-center items-center gap-8 py-8 px-32 h-96">
            <div class="grid grid-cols-2 gap-2">
                <div class="grid gap-4">
                    <img class="w-full rounded-lg shadow" src="https://acortar.link/Oyz5TP" alt="1">
                    <img class="w-full rounded-lg shadow" src="https://acortar.link/c7Cq8Y" alt="3">
                </div>
                <div class="grid gap-4">
                    <img class="w-full rounded-lg shadow" src="https://acortar.link/QuxY8m" alt="4">
                    <img class="w-full rounded-lg shadow" src="https://acortar.link/xXjntp" alt="5">
                    <img class="w-full rounded-lg shadow" src="https://acortar.link/S4i8rX" alt="2">
                </div>
            </div>
            <aside class="flex flex-col justify-center items-center gap-4">
                <h1 class="text-2xl font-bold">Nuestros servicios</h1>
                <a href="">Online Coffee ofrece una variedad de servicios
                    con el apoyo de sus instalaciones, como una
                    área de videojuegos, área de estudios, área
                    computadoras, muy aparte de su típica área
                    cafetería.</a>
            </aside>
        </section>
    </main>
@endsection
