@extends('layouts.admin')

@section('main')
    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-200">
                Usuarios
            </h2>
            <div class="flex justify-between gap-6 mb-8">
                <div class="flex-grow flex items-center p-4 rounded-lg shadow-xs bg-gray-800">
                    <div class="p-3 mr-4 rounded-full text-orange-100 bg-orange-500">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <p class="mb-2 text-sm font-medium text-gray-400">
                            Usuarios totales
                        </p>
                        <p class="text-lg font-semibold text-gray-200">
                            {{ $users->total() }}
                        </p>
                    </div>
                </div>
                <!-- Card -->
                <a href="{{ route('admin.users.create') }}"
                    class="flex items-center p-4 gap-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                    <div class="hidden lg:block">
                        <p class="text-lg font-medium text-gray-400">
                            Crear un usuario
                        </p>
                    </div>
                    <div class="p-2 rounded-full text-green-50 bg-green-600">
                        <svg class="w-6 h-6"="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M17 13h-4v4h-2v-4H7v-2h4V7h2v4h4m-5-9A10 10 0 0 0 2 12a10 10 0 0 0 10 10a10 10 0 0 0 10-10A10 10 0 0 0 12 2" />
                        </svg>
                    </div>
                </a>
            </div>

            <!-- New Table -->
            <div class="w-full overflow-hidden rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto">
                    <table class="w-full whitespace-no-wrap">
                        <thead>
                            <tr
                                class="text-sm font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3 hidden sm:block">Nombre</th>
                                <th class="px-4 py-3">Correo</th>
                                <th class="px-4 py-3 hidden lg:table-cell">Creado</th>
                                <th class="px-4 py-3">Editar</th>
                                <th class="px-4 py-3">Eliminar</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                            @foreach ($users as $user)
                                <tr class="text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-3 hidden sm:table-cell">
                                        <div class="flex items-center text-sm">
                                            <div class="relative hidden w-8 h-8 mr-3 rounded-full lg:block">
                                                <img class="object-cover w-full h-full rounded-full"
                                                    src="{{ $user->profile_photo_url }}" alt="" loading="lazy" />
                                                <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true">
                                                </div>
                                            </div>
                                            <div>
                                                <p class="font-semibold">{{ $user->name }}</p>
                                                <p class="text-xs text-gray-600 dark:text-gray-400">
                                                    10x Developer
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-sm">{{ $user->email }}</td>
                                    <td class="px-4 py-3 text-sm hidden lg:table-cell">{{ $user->created_at->format('d/m/Y') }}
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        <form action="{{ route('admin.users.edit', $user->id) }}">
                                            @csrf
                                            <button type="submit"
                                                class="inline-block w-auto text-yellow-50 bg-yellow-600 rounded-md p-2 ">
                                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                    <path fill="currentColor"
                                                        d="M4 21q-.425 0-.712-.288T3 20v-2.425q0-.4.15-.763t.425-.637L16.2 3.575q.3-.275.663-.425t.762-.15t.775.15t.65.45L20.425 5q.3.275.437.65T21 6.4q0 .4-.138.763t-.437.662l-12.6 12.6q-.275.275-.638.425t-.762.15zM17.6 7.8L19 6.4L17.6 5l-1.4 1.4z" />
                                                </svg>
                                            </button>
                                        </form>
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        <form action="{{ route('admin.users.delete', $user->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="inline-block w-auto text-red-50 bg-red-700 rounded-md p-2 ">
                                                <svg class="w-5 y-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                    <path fill="currentColor"
                                                        d="M7 21q-.825 0-1.412-.587T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.587 1.413T17 21zm2-4h2V8H9zm4 0h2V8h-2z" />
                                                </svg>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div
                    class="px-4 py-3 font-medium tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </main>
@endsection