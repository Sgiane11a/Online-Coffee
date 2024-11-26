@extends('layouts.index')

@section('body')

<body class="bg-white text-blueberry-350">
    <header class="sticky top-0 z-50 bg-white shadow-md">
        <nav class="flex justify-between items-center gap-4 font-bold text-lg lg:text-xl px-12 py-4">
            <a href="/" class="text-raspberry-600 font-extrabold leading-none">
                <div class=" text-grape-350 text-3xl">ONLINE</div>
                <div class="text-grape-450 text-2x1 text-center">COFFEE</div></a>

            <ul class="hidden md:flex justify-center gap-6">
                <x-header-link url="/" text="Inicio" />
                <x-header-link url="{{route('products')}}" text="Productos" />
                <x-header-link url="/reservaciones" text="Reservas" />
                <x-header-link url="/biblioteca" text="Biblioteca" />
            </ul>
            @if (Route::has('login'))
                <div class="flex justify-center gap-4">

                    @auth('web')
                        <a href="{{ url('/dashboard') }}"
                            class="bg-raspberry-600 text-white rounded-full font-semibold px-4 py-2 hover:bg-raspberry-700">
                            Dashboard
                        </a>
                    @else
                        <x-auth-header-button url="{{ route('login') }}" text="Iniciar sesión" />
                    @endauth

                    <div class="md:hidden flex items-center">
                        <button id="menu-toggle" class="text-raspberry-600 focus:outline-none">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                            </svg>
                        </button>
                    </div>
                </div>
            @endif
        </nav>

        <x-responsive />

    </header>
        @yield('main')
        <footer class="flex flex-col items-center gap-8 bg-grape-350 border-grape-350 border-t-2 p-8 font-medium text-white">
            <section class="flex justify-between gap-2 w-full ">
                <div class="hidden lg:flex ">
                    <img src="{{asset('images/LOGO OFFICIAS3 (1).png')}}" class="w-10 md:w-10 lg:w-20 xl:w-60 h-auto">
                </div>
                <ul>
                    <li><a href="{{route('acercaDe')}}">Acerca de Online Coffee</a></li>
                    <li><a href="{{route('terminos')}}">Termino y Condiciones</a></li>
                    <li><a href="{{route('privacidad')}}">Politica de Privacidad</a></li>
                    <li><a href="{{route('preguntas')}}">Preguntas Frecuentes</a></li>
                    <li><a href="{{route('reglamento')}}">Reglamento</a></li>
                </ul>
                <ul>
                    <li><a href="{{route('contactanos')}}">Contáctanos</a></li>
                    {{--<li>Soporte</li>--}}
                    <li><a href="{{route('ubicacion')}}">Encuentranos</a></li>
                </ul>
                <div>
                    <h2 class="font-bold">Horario de atención:</h2>
                    <p>Lunes a Viernes</p>
                    <p>9:00 AM - 6:00 PM</p>
                </div>
                <div class="flex flex-col gap-4">
                    <div class="flex flex-col items-center">
                        <svg aria-label="Imagen de Libro de Reclamaciones" xmlns="http://www.w3.org/2000/svg" width="100"
                            height="100" viewBox="0 0 16 16">
                            <g fill="currentColor" fill-rule="evenodd">
                                <path
                                    d="M7.969 2.74C4.92 1.288 3.942 2.326 2 3.523v7.445c1.941-1.205 3.434-1.969 5.969-.651zm.058.018v7.591c3.352-1.361 4.035-.549 5.957.651V3.542c-1.922-1.194-2.537-2.268-5.957-.784" />
                                <path d="M15.938 13H.051V3.049h.902v9.029h14.078V3.094h.907z" />
                            </g>
                        </svg>
                        <h1 class="text-center text-lg font-bold">Libro de Reclamaciones</h1>
                    </div>
                    <div>
                        <p>Mainframe S.A.C.</p>
                        <p>RUC: 20606475757</p>
                    </div>
                </div>
            </section>
            <section class="flex w-full bg-white py-2 px-4 rounded-lg text-black">@Online Coffee 2024</section>
        </footer>
        @livewireScripts
    </body>
@endsection
