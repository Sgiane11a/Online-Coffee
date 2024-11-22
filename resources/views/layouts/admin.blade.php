@extends('layouts.index')

@section('body')

    <body class="flex h-screen bg-grape-950">
        <aside id="navigation"
            class="z-20 h-full hidden md:block md:static md:w-64 overflow-y-auto bg-white dark:bg-gray-800 flex-shrink-0">
            <div class="py-4 text-gray-500 dark:text-gray-400">
                <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="{{ route('admin.dashboard') }}">
                    Panel Administrativo
                </a>
                <ul class="mt-6">
                    <x-admin-sidebar-button url="{{ route('admin.dashboard') }}" text="Inicio"
                        icon='<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M13 9V3h8v6zM3 13V3h8v10zm10 8V11h8v10zM3 21v-6h8v6z"/></svg>' />
                    <x-admin-sidebar-button url="{{ route('admin.users.index') }}" text="Usuarios"
                        icon='<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M0 18v-1.575q0-1.075 1.1-1.75T4 14q.325 0 .625.013t.575.062q-.35.525-.525 1.1t-.175 1.2V18zm6 0v-1.625q0-.8.438-1.463t1.237-1.162T9.588 13T12 12.75q1.325 0 2.438.25t1.912.75t1.225 1.163t.425 1.462V18zm13.5 0v-1.625q0-.65-.162-1.225t-.488-1.075q.275-.05.563-.062T20 14q1.8 0 2.9.663t1.1 1.762V18zM4 13q-.825 0-1.412-.587T2 11q0-.85.588-1.425T4 9q.85 0 1.425.575T6 11q0 .825-.575 1.413T4 13m16 0q-.825 0-1.412-.587T18 11q0-.85.588-1.425T20 9q.85 0 1.425.575T22 11q0 .825-.575 1.413T20 13m-8-1q-1.25 0-2.125-.875T9 9q0-1.275.875-2.137T12 6q1.275 0 2.138.863T15 9q0 1.25-.862 2.125T12 12"/></svg>' />
                    <x-admin-sidebar-button url="{{ route('admin.store.index') }}" text="Tienda"
                        icon='<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M21.025 11.05V19q0 .825-.587 1.413T19.025 21h-14q-.825 0-1.412-.587T3.025 19v-7.95q-.575-.525-.887-1.35t-.013-1.8l1.05-3.4q.2-.65.713-1.075T5.075 3h13.9q.675 0 1.175.413t.725 1.087l1.05 3.4q.3.975-.012 1.775t-.888 1.375m-6.8-1.05q.675 0 1.025-.462t.275-1.038l-.55-3.5h-1.95v3.7q0 .525.35.913t.85.387m-4.5 0q.575 0 .938-.388t.362-.912V5h-1.95l-.55 3.5q-.1.6.262 1.05t.938.45m-4.45 0q.45 0 .787-.325t.413-.825L7.025 5h-1.95l-1 3.35q-.15.5.162 1.075T5.275 10m13.5 0q.725 0 1.05-.575t.15-1.075L18.925 5h-1.9l.55 3.85q.075.5.413.825t.787.325"/></svg>' />
                    <x-admin-sidebar-button url="{{ route('admin.forum.index') }}" text="Foro"
                        icon='<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M7 18q-.425 0-.712-.288T6 17v-2h13V6h2q.425 0 .713.288T22 7v15l-4-4zm-5-1V3q0-.425.288-.712T3 2h13q.425 0 .713.288T17 3v9q0 .425-.288.713T16 13H6z"/></svg>' />
                </ul>
                <div class="px-6 my-6">
                    <form method="POST" action="{{ route('admin.logout') }}" class="inline">
                        @csrf
                        <button type="submit"
                            class="flex items-center justify-between w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-grape-600 border border-transparent rounded-lg active:bg-grape-600 hover:bg-grape-700 focus:outline-none focus:shadow-outline-grape">
                            {{ __('Log Out') }}
                            <span class="ml-2" aria-hidden="true"><svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="m17 7l-1.41 1.41L18.17 11H8v2h10.17l-2.58 2.58L17 17l5-5M4 5h8V3H4c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h8v-2H4z" />
                                </svg></span>
                        </button>
                    </form>
                </div>
            </div>
        </aside>

        <div class="flex flex-col flex-1 w-full">
            <header class="z-10 py-4 bg-white shadow-md dark:bg-gray-800">
                <div
                    class="container flex items-center justify-between h-full px-6 mx-auto text-grape-600 dark:text-grape-300 gap-6">
                    <button id="toggleSidebar" class="md:hidden"><svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8"
                            viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M4 18q-.425 0-.712-.288T3 17t.288-.712T4 16h16q.425 0 .713.288T21 17t-.288.713T20 18zm0-5q-.425 0-.712-.288T3 12t.288-.712T4 11h16q.425 0 .713.288T21 12t-.288.713T20 13zm0-5q-.425 0-.712-.288T3 7t.288-.712T4 6h16q.425 0 .713.288T21 7t-.288.713T20 8z" />
                        </svg></button>

                    <!-- Search input -->
                    <div class="flex justify-center flex-1 lg:mr-32">
                        <div class="relative w-full max-w-xl mr-6 focus-within:text-grape-500">
                            <div class="absolute inset-y-0 flex items-center pl-2">
                                <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <input
                                class="w-full pl-8 pr-2 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-white focus:border-grape-300 focus:outline-none focus:shadow-outline-grape form-input"
                                type="text" placeholder="Search for projects" aria-label="Search" />
                        </div>
                    </div>
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
        <script>
            document.getElementById('toggleSidebar').addEventListener('click', function() {
                var sidebar = document.getElementById('navigation');
                sidebar.classList.toggle('w-screen');
                sidebar.classList.toggle('fixed');
                sidebar.classList.toggle('hidden');
            });
        </script>
    </body>
@endsection
