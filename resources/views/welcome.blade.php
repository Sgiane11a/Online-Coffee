@extends('layouts.home')

@vite(['resources/js/coffee.js', 'resources/js/slider.js'])

@section('main')
    <main class="">
        <section class="flex justify-center items-center border-b-2 border-blueberry-100 py-12 bg-gradient-section">
            <div class="flex flex-col justify-center items-center">
                <h1 class="font-extrabold text-8xl break-normal text-center title">¡Bienvenido a Online Coffee!</h1>
                <canvas aria-label="Modelo 3D de un café" class="aspect-auto" id="coffee"></canvas>
            </div>
        </section>
        {{-- <section class="flex justify-center items-center border-b-2 border-blueberry-100 p-4">
            <aside class="flex flex-col justify-center items-center gap-8 text-center">
                <h1 class="text-3xl font-bold">¡Obtén varios beneficios aquí!</h1>
                <a class="bg-raspberry-100 text-black rounded-lg font-semibold px-4 py-2" href="">Quiero ser
                    miembro</a>
            </aside> -->
        </section> --}}
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
                        <x-welcome-slide image="https://splidejs.com/images/slides/general/01.jpg" />
                        <x-welcome-slide image="https://splidejs.com/images/slides/general/01.jpg" />
                        <x-welcome-slide image="https://splidejs.com/images/slides/general/01.jpg" />
                        <x-welcome-slide image="https://splidejs.com/images/slides/general/01.jpg" />
                        <x-welcome-slide image="https://splidejs.com/images/slides/general/01.jpg" />
                    </ul>
                </div>
            </div>
        </section>
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
