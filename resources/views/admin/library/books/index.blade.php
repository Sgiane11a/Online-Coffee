@extends('layouts.admin')

@section('main')
    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-200">
                libros
            </h2>

            <!-- Formulario de búsqueda -->
            <!-- Formulario de búsqueda -->
<form action="{{ route('admin.library.books.index') }}" method="GET" class="mb-6">
    <div class="flex gap-4">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Buscar libros..." class="px-4 py-2 w-full bg-gray-700 text-white rounded-lg">
        
        <!-- Menú desplegable de categorías -->
        <select name="category_id" class="px-4 py-2 bg-gray-700 text-white rounded-lg">
            <option value="">Todas las categorías</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>

        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg">
            Buscar
        </button>
    </div>
</form>


            <div class="flex justify-between gap-6 mb-8">
                <div class="flex-grow flex items-center p-4 rounded-lg shadow-xs bg-gray-800">
                    <!-- Card -->
                    <a href="{{ route('admin.library.books.create') }}"
                        class="flex items-center p-4 gap-4 rounded-lg shadow-xs bg-gray-800">
                        <div class="hidden lg:block">
                            <p class="text-lg font-medium text-gray-400">
                                Crear un producto
                            </p>
                        </div>
                        <div class="p-2 rounded-full text-green-50 bg-green-600">
                            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M17 13h-4v4h-2v-4H7v-2h4V7h2v4h4m-5-9A10 10 0 0 0 2 12a10 10 0 0 0 10 10a10 10 0 0 0 10-10A10 10 0 0 0 12 2" />
                            </svg>
                        </div>
                    </a>
                </div>
            </div>

            <div class="w-full overflow-hidden rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto">
                    <table class="w-full whitespace-no-wrap">
                        <thead>
                            <tr class="text-sm font-semibold tracking-wide text-left uppercase border-b border-gray-700 text-gray-400 bg-gray-800">
                                <th class="px-4 py-3">Nombre</th>
                                <th class="px-4 py-3">Autor</th>
                                <th class="px-4 py-3">Categoría</th>
                                <th class="px-4 py-3">Idioma</th>
                                <th class="px-4 py-3">Año de Publicación</th>
                                <th class="px-4 py-3 hidden lg:table-cell">Creado</th>
                                <th class="px-4 py-3">Editar</th>
                                <th class="px-4 py-3">Eliminar</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                            @foreach ($books as $book) <!-- Iterar sobre los libros -->
                                <tr class="text-gray-400">
                                    <td class="px-4 py-3">
                                        <div class="flex items-center text-sm">
                                            <div class="relative hidden w-8 h-8 mr-3 rounded-full lg:block">
                                                <x-cld-image class="object-cover w-full h-full rounded-full"
                                                    public-id="{{ $book->image_public_id }}" width="300"
                                                    height="300"></x-cld-image>
                                            </div>
                                            <div>
                                                <p class="font-semibold">{{ $book->title }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-sm">{{ $book->author }}</td> <!-- Autor -->
                                    <td class="px-4 py-3 text-sm">{{ $book->category->name ?? 'Sin categoría' }}</td> <!-- Categoría -->
                                    <td class="px-4 py-3 text-sm">{{ $book->language }}</td> <!-- Idioma -->
                                    <td class="px-4 py-3 text-sm">{{ $book->publication_year }}</td> <!-- Año de publicación -->
                                    <td class="px-4 py-3 text-sm hidden lg:table-cell">
                                        {{ $book->created_at->format('d-m-Y') }} <!-- Fecha de creación -->
                                    </td>
                                    
                                    <!-- Botón Editar (vacío por ahora) -->
                                    <td class="px-4 py-3 text-sm">
                                        <form action="{{ route('admin.library.books.edit', $book->id) }}" >
                                            @csrf
                                            <button type="submit"
                                                class="inline-block w-auto text-yellow-50 bg-yellow-600 rounded-md p-2 ">
                                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                    <path fill="currentColor" d="M4 21q-.425 0-.712-.288T3 20v-2.425q0-.4.15-.763t.425-.637L16.2 3.575q.3-.275.663-.425t.762-.15t.775.15t.65.45L20.425 5q.3.275.437.65T21 6.4q0 .4-.138.763t-.437.662l-12.6 12.6q-.275.275-.638.425t-.762.15zM17.6 7.8L19 6.4L17.6 5l-1.4 1.4z" />
                                                </svg>
                                            </button>
                                        </form>
                                    </td>

                                    <!-- Botón Eliminar (vacío por ahora) -->
                                    <td class="px-4 py-3 text-sm">
                                        <form action="{{ route('admin.library.books.delete', $book->id) }}" method="POST">
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
                <div class="px-4 py-3 font-medium tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
                </div>
            </div>
        </div>
    </main>
@endsection
