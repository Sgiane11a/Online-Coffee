@extends('layouts.index')

@section('content')
    <header class="sticky top-0 z-50 backdrop-blur-3xl border-azure-100 border-b-2">
        <nav class="flex justify-between items-center gap-2 font-bold text-lg lg:text-xl p-4 text-fuchsia-100">
            <span>
                <a href="/">Online Coffee</a>
            </span>
            <ul class="hidden md:flex justify-center gap-2 md:gap-4 lg:gap-8">
                <x-header-link url="/" text="Inicio" />
                <x-header-link url="/productos" text="Productos" />
                <x-header-link url="/tienda" text="Tienda" />
                <x-header-link url="/reservas" text="Reservas" />
            </ul>
            @if (Route::has('login'))
                <div class="flex justify-center gap-2">

                    @auth('web')
                        <a href="{{ url('/dashboard') }}"
                            class="bg-fuchsia-100 text-black rounded-lg font-semibold px-4 py-2 flex-1 whitespace-nowrap">
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
    @yield('main')
    <footer class="flex flex-col items-center gap-8 bg-azure-900 border-azure-100 border-t-2 p-8 font-medium">
        <section class="flex justify-between gap-2 w-full ">
            <div class="hidden lg:flex ">
                <p>Aquí no hay limites</p>
            </div>
            <ul>
                <li>Acerca de Online Coffee</li>
                <li>Termino y Condiciones</li>
                <li>Politica de Privacidad</li>
                <li>Preguntas Frecuentes</li>
                <li>Reglamento</li>
            </ul>
            <ul>
                <li>Contáctanos</li>
                <li>Soporte</li>
                <li>Contacto</li>
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
        <section class="flex w-full bg-azure-950 py-2 px-4 rounded-lg">@Online Coffee 2024</section>
    </footer>
@endsection
