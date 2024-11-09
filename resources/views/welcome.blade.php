@extends('layouts.index')

@section('content')

    <main class="">
        <section class="flex justify-center items-center p-8 border-white border-b">
            <div class="flex flex-col justify-center items-center gap-8 w-4/5">
                <aside class="flex flex-col justify-center items-center gap-4 text-center">
                    <h1 class="text-3xl font-bold">¡Obtén varios beneficios aquí!</h1>
                    <a class="bg-purple-100 text-black rounded-lg font-semibold px-4 py-2" href="">Quiero ser
                        miembro</a>
                </aside>
                <div id="coffee" class=""></div>
            </div>
        </section>
        <section class="flex justify-center border-white border-b h-96">
            <h1>My carrousel - tamaño por el momento xd</h1>
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
                    área de video juegos, área de estudios, área
                    computadoras, muy aparte de su típica área
                    cafetería.</a>
            </aside>
        </section>
    </main>

@endsection