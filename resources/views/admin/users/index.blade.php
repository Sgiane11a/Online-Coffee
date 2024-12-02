@extends('layouts.admin')

@section('main')
    <main class="h-full overflow-y-auto bg-gray-100">
        <div class="container px-6 mx-auto grid mt-4">
            <!-- Encabezado con filtros y botones -->
            <div class="flex flex-col lg:flex-row justify-between items-center gap-6 mb-6 bg-white p-6 rounded-lg shadow-md">
                <!-- Filtros -->
                <form id="filters-form" method="GET" action="{{ route('admin.users.index') }}" class="flex flex-wrap gap-4 w-full lg:w-auto">
    <!-- Filtro por Departamento -->
    <div class="flex-1">
        <label for="department_id" class="block text-sm font-medium text-gray-700 mb-1">Departamento:</label>
        <select name="department_id" id="department_id" onchange="document.getElementById('filters-form').submit()"
            class="w-full px-4 py-2 rounded-lg bg-gray-50 text-gray-700 border-gray-300 focus:border-indigo-500 focus:outline-none">
            <option value="">-- Todos los departamentos --</option>
            @foreach ($departments as $department)
                <option value="{{ $department->id }}" 
                    {{ request('department_id') == $department->id ? 'selected' : '' }}>
                    {{ $department->name }}
                </option>
            @endforeach
        </select>
    </div>

    <!-- Campo de búsqueda -->
    <div class="flex-1">
        <label for="search" class="block text-sm font-medium text-gray-700 mb-1">Buscar por nombre o correo:</label>
        <input type="text" name="search" id="search" value="{{ request('search') }}"
            class="w-full px-4 py-2 rounded-lg bg-gray-50 text-gray-700 border-gray-300 focus:border-indigo-500 focus:outline-none" 
            placeholder="Nombre o correo">
    </div>
</form>


                <!-- Cantidad total de usuarios filtrados -->
                <div class="text-gray-600 font-medium text-sm">
                    <span class="block">Usuarios filtrados: <span class="text-gray-800">{{ $users->total() }}</span></span>
                    <span class="block">Total de usuarios registrados: <span class="text-gray-800">{{ $totalUsers }}</span></span>
                </div>

                <!-- Botón de Crear Usuario -->
                <a href="{{ route('admin.users.create') }}" class="flex items-center px-6 py-3 rounded-lg bg-pink-400 text-white hover:bg-pink-500 shadow-md">
    <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
        <path fill="currentColor" d="M17 13h-4v4h-2v-4H7v-2h4V7h2v4h4m-5-9A10 10 0 0 0 2 12a10 10 0 0 0 10 10a10 10 0 0 0 10-10A10 10 0 0 0 12 2" />
    </svg>
    Crear Usuario
</a>


            </div>

            <!-- Tabla de Usuarios -->
            <div class="w-full overflow-hidden rounded-lg shadow-md bg-white">
                <div class="w-full overflow-x-auto">
                    <table class="w-full text-sm text-gray-700">
                        <thead>
                            <tr class="text-left uppercase tracking-wide border-b border-gray-300">
                                <th class="px-4 py-3 hidden sm:block">Foto</th>
                                <th class="px-4 py-3">Nombre</th>
                                <th class="px-4 py-3">Correo</th>
                                <th class="px-4 py-3 hidden lg:table-cell">Departamento</th>
                                <th class="px-4 py-3 hidden lg:table-cell">Carrera</th>
                                <th class="px-4 py-3 hidden lg:table-cell">Creado</th>
                                <th class="px-4 py-3">Opciones</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach ($users as $user)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-4 py-3 hidden sm:table-cell">
                                        <div class="relative w-8 h-8 rounded-full">
                                            <img class="object-cover w-full h-full rounded-full"
                                                src="{{ $user->profile_photo_url }}" alt="" loading="lazy" />
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-sm">{{ $user->name }}</td>
                                    <td class="px-4 py-3 text-sm">{{ $user->email }}</td>
                                    <td class="px-4 py-3 text-sm">{{ $user->department ? $user->department->name : 'Sin departamento' }}</td>
                                    <td class="px-4 py-3 text-sm">{{ $user->career ? $user->career->name : 'Sin carrera' }}</td>
                                    <td class="px-4 py-3 text-sm hidden lg:table-cell">{{ $user->created_at->format('d/m/Y') }}</td>
                                    <td class="px-4 py-3 text-sm flex space-x-2">
                                        <a href="{{ route('admin.users.edit', $user->id) }}" class="text-yellow-600 hover:text-yellow-700 p-2 rounded-md">
                                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="M4 21q-.425 0-.712-.288T3 20v-2.425q0-.4.15-.763t.425-.637L16.2 3.575q.3-.275.663-.425t.762-.15t.775.15t.65.45L20.425 5q.3.275.437.65T21 6.4q0 .4-.138.763t-.437.662l-12.6 12.6q-.275.275-.638.425t-.762.15zM17.6 7.8L19 6.4L17.6 5l-1.4 1.4z" />
                                            </svg>
                                        </a>
                                        <form action="{{ route('admin.users.delete', $user->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-700 p-2 rounded-md">
                                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
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
                <div class="px-4 py-3 font-medium tracking-wide text-gray-600 uppercase border-t bg-gray-100">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </main>
@endsection
