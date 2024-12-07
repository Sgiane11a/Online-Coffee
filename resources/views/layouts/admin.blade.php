@extends('layouts.adindex')

@section('body')
<body class="flex h-screen bg-grape-550">
    <!-- Sidebar con imagen de fondo -->
    <aside id="navigation"
        class="z-20 h-full hidden md:block md:w-64 bg-grape-350 overflow-y-auto bg-cover bg-center flex-shrink-0 ">
        <div class="py-4 text-white dark:text-gray-400">
            <div class="flex justify-between mx-6">
                <a class="text-lg font-extrabold text-white" href="{{ route('admin.dashboard') }}">
                    Panel Administrativo
                </a>
                <button id="closeSidebar" class="menu md:hidden text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="m12 13.4l-4.9 4.9q-.275.275-.7.275t-.7-.275t-.275-.7t.275-.7l4.9-4.9l-4.9-4.9q-.275-.275-.275-.7t.275-.7t.7-.275t.7.275l4.9 4.9l4.9-4.9q.275-.275.7-.275t.7.275t.275.7t-.275.7L13.4 12l4.9 4.9q.275.275.275.7t-.275.7t-.7.275t-.7-.275z" />
                    </svg>
                </button>
            </div>
            <hr class="my-3 border-t-2 border-white dark:border-gray-600">
            <ul class="mt-6">
                <x-admin-sidebar-button url="{{ route('admin.dashboard') }}" text="Inicio"
                    icon='<svg xmlns="http://www.w3.org/2000/svg" width="2.5em" height="2.5em" viewBox="0 0 24 24"><path fill="currentColor" d="M13 9V3h8v6zM3 13V3h8v10zm10 8V11h8v10zM3 21v-6h8v6z"/></svg>' />
                <x-admin-sidebar-button url="{{ route('admin.users.index') }}" text="Usuarios"
                    icon='<svg class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor"> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>' />
                <x-admin-sidebar-button url="{{ route('admin.reservations.index') }" text="Reservas"
                    icon='<svg class="h-10 w-10"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <rect x="4" y="5" width="16" height="16" rx="2" />  <line x1="16" y1="3" x2="16" y2="7" />  <line x1="8" y1="3" x2="8" y2="7" />  <line x1="4" y1="11" x2="20" y2="11" />  <rect x="8" y="15" width="2" height="2" /></svg>' />
                <x-admin-sidebar-button url="{{ route('admin.products.index') }}" text="Tienda"
                    icon='<svg class="h-10 w-10"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <line x1="3" y1="21" x2="21" y2="21" />  <path d="M3 7v1a3 3 0 0 0 6 0v-1m0 1a3 3 0 0 0 6 0v-1m0 1a3 3 0 0 0 6 0v-1h-18l2 -4h14l2 4" />  <path d="M5 21v-10.15" />  <path d="M19 21v-10.15" />  <path d="M9 21v-4a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v4" /></svg>' />
                <x-admin-sidebar-button url="{{ route('admin.books.index') }}" text="Biblioteca"
                    icon='<svg class="h-10 w-10"  fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"/></svg>'/>
                <x-admin-sidebar-button url="{{ route('admin.forum.index') }}" text="Comunidad"
                    icon='<svg class="h-10 w-10"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M4 21v-13a3 3 0 0 1 3 -3h10a3 3 0 0 1 3 3v6a3 3 0 0 1 -3 3h-9l-4 4" />  <line x1="8" y1="9" x2="16" y2="9" />  <line x1="8" y1="13" x2="14" y2="13" /></svg>' />
            </ul>
            <div class="px-6 my-6">
                <form method="POST" action="{{ route('admin.logout') }}" class="inline">
                    @csrf
                    <button type="submit"
                        class="flex items-center justify-between w-full px-4 py-2 text-base font-bold leading-5 text-grape-450 transition-colors duration-150 bg-white border border-transparent rounded-lg active:bg-grape-600 hover:bg-grape-750 focus:outline-none focus:shadow-outline-grape">
                        {{ __('Log Out') }}
                        <span class="ml-2" aria-hidden="true">
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="m17 7l-1.41 1.41L18.17 11H8v2h10.17l-2.58 2.58L17 17l5-5M4 5h8V3H4c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h8v-2H4z" />
                            </svg>
                        </span>
                    </button>
                </form>
            </div>
        </div>
    </aside>

    <div class="flex flex-col flex-1 w-full">
        <header class="z-10 py-4 bg-white shadow-md dark:bg-gray-800">
            <div
                class="container flex items-center justify-between md:justify-end h-full px-6 mx-auto text-grape-450 dark:text-grape-300 gap-6">
                <button id="showSidebar" class="menu md:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M4 18q-.425 0-.712-.288T3 17t.288-.712T4 16h16q.425 0 .713.288T21 17t-.288.713T20 18zm0-5q-.425 0-.712-.288T3 12t.288-.712T4 11h16q.425 0 .713.288T21 12t-.288.713T20 13zm0-5q-.425 0-.712-.288T3 7t.288-.712T4 6h16q.425 0 .713.288T21 7t-.288.713T20 8z" />
                    </svg>
                </button>

                <ul class="flex items-center flex-shrink-0">
                    <!-- Profile menu -->
                    <li class="relative">
                        {{ Auth::user()->name }}
                    </li>
                </ul>
            </div>
        </header>
        @yield('main')
    </div>
    {{--Para que la hamburguesa ocupa toda la pantalla--}}
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('navigation');
            sidebar.classList.toggle('w-screen');
            sidebar.classList.toggle('fixed');
            sidebar.classList.toggle('hidden');
        }

        document.getElementById('showSidebar').addEventListener('click', toggleSidebar);
        document.getElementById('closeSidebar').addEventListener('click', toggleSidebar);
    </script>
    @livewireScripts
</body>
@endsection
