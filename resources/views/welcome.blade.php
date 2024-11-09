<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-grape-950 text-white">
    <header>
        <nav class="flex justify-between items-center gap-2 bg-fuchsia-700 p-4 border-white border-b">
            <span>
                <a href="/">Online Coffee</a>
            </span>
            <ul class="flex justify-center gap-2 md:gap-4 lg:gap-8">
                <x-header-link url="/" text="Inicio" />
                <x-header-link url="/productos" text="Productos" />
                <x-header-link url="/tienda" text="Tienda" />
                <x-header-link url="/reservas" text="Reservas" />
            </ul>
            @if (Route::has('login'))
                <div class="flex justify-center gap-2">

                    @auth
                        <a href="{{ url('/dashboard') }}"
                            class="bg-purple-100 text-black rounded-lg font-semibold px-4 py-2 flex-1 whitespace-nowrap">
                            Dashboard
                        </a>
                    @else
                        <x-auth-header-button url="{{ route('login') }}" text="Iniciar sesión" />
                        {{-- 
                        @if (Route::has('register'))
                            <x-auth-header-button url="{{ route('register') }}" text="Registrarse" />
                        @endif 
                        --}}

                    @endauth
                </div>

            @endif

        </nav>
    </header>
    <main class="">
        <section class="flex justify-center items-center p-8 border-white border-b h-96">
            <div class="flex justify-center items-center gap-8 w-4/5">
                <img src="https://i.postimg.cc/m23P1F2y/Logo-ciber-Cafe.png" class="aspect-square h-36" alt="algo xd">
                <aside class="flex flex-col justify-center items-center gap-4 text-center">
                    <h1 class="text-3xl font-bold">¡Obtén varios beneficios aquí!</h1>
                    <a class="bg-purple-100 text-black rounded-lg font-semibold px-4 py-2" href="">Quiero ser
                        miembro</a>
                </aside>
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
    <footer class="flex flex-col items-center gap-4 bg-azure-800 border-white border-t p-8">
        <section class="flex justify-between gap-2 w-full ">
            <div>
                <p>Aquí no hay limites</p>
            </div>
            <div>
                <ul>
                    <li>Acerca de Online Coffee</li>
                    <li>Termino y Condiciones</li>
                    <li>Politica de Privacidad</li>
                    <li>Preguntas Frecuentes</li>
                    <li>Reglamento</li>
                </ul>
            </div>
            <div>
                <ul>
                    <li>Contáctanos</li>
                    <li>Soporte</li>
                    <li>Contacto</li>
                    <li>HOrario de atención
                        Lunes a Viernes
                        9:00 AM - 6:00 PM
                    </li>
                </ul>
            </div>
            <div class="flex flex-col gap-4">
                <div class="flex flex-col items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 16 16">
                        <g fill="currentColor" fill-rule="evenodd">
                            <path
                                d="M7.969 2.74C4.92 1.288 3.942 2.326 2 3.523v7.445c1.941-1.205 3.434-1.969 5.969-.651zm.058.018v7.591c3.352-1.361 4.035-.549 5.957.651V3.542c-1.922-1.194-2.537-2.268-5.957-.784" />
                            <path d="M15.938 13H.051V3.049h.902v9.029h14.078V3.094h.907z" />
                        </g>
                    </svg>
                    <h1 class="text-center text-lg font-bold">Libro de Reclamacioens</h1>
                </div>
                <div>
                    <p>Mainframe S.A.C.
                        RUC: 20606475757
                    </p>
                </div>
            </div>
        </section>
        <section class="flex w-full bg-purple-200 text-black p-4 rounded-xl">@Online Coffee 2024</section>
    </footer>
</body>

</html>
