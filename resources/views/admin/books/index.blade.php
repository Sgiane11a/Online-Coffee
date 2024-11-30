@extends('layouts.admin')

@section('main')
<main class="h-full overflow-y-auto">
    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-200">
            Libros
        </h2>
<!-- Botón para agregar un nuevo libro -->
<div class="mb-6">
            <a href="{{ route('admin.books.create') }}" class="inline-block px-6 py-3 text-white bg-blue-600 rounded-lg hover:bg-blue-700">
                Agregar Nuevo Libro
            </a>
        </div>
        <!-- Formulario de búsqueda con filtro dinámico -->
        <form action="{{ route('admin.books.index') }}" method="GET" class="mb-6" id="filter-form">
            <div class="flex gap-4">
                <!-- Campo de búsqueda por título -->
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Buscar libros..." class="px-4 py-2 w-full bg-gray-700 text-white rounded-lg" onchange="this.form.submit()">
                
                <!-- Filtro principal: Generales o Departamento -->
                    <select name="filter_type" id="filter_type" class="px-4 py-2 bg-gray-700 text-white rounded-lg" onchange="this.form.submit(); toggleFilterOptions()">
                        <option value="">Selecciona un filtro</option>
                        <option value="generales" {{ request('filter_type') == 'generales' ? 'selected' : '' }}>Generales</option>
                        <option value="departamentos" {{ request('filter_type') == 'departamentos' ? 'selected' : '' }}>Departamentos</option>
                    </select>

                <!-- Filtro dinámico que depende de la selección -->
                <div id="generales_filter" class="filter-option hidden">
                    <select name="generales" class="px-4 py-2 bg-gray-700 text-white rounded-lg" onchange="this.form.submit()">
                        <option value="">Selecciona un curso de Generales</option>
                        <option value="Cálculo" {{ request('generales') == 'Cálculo' ? 'selected' : '' }}>Cálculo</option>
                        <option value="Expresión Oral" {{ request('generales') == 'Expresión Oral' ? 'selected' : '' }}>Expresión Oral</option>
                        <option value="Física" {{ request('generales') == 'Física' ? 'selected' : '' }}>Física</option>
                        <option value="Electricidad" {{ request('generales') == 'Electricidad' ? 'selected' : '' }}>Electricidad</option>
                    </select>
                </div>

                <div id="departamentos_filter" class="filter-option hidden">
                    <select name="departamento" class="px-4 py-2 bg-gray-700 text-white rounded-lg" onchange="this.form.submit()">
                        <option value="">Selecciona un departamento</option>
                        <option value="Diseño y Desarrollo de Software" {{ request('departamento') == 'Diseño y Desarrollo de Software' ? 'selected' : '' }}>Diseño y Desarrollo de Software</option>
                        <option value="Administración de Redes y Comunicaciones" {{ request('departamento') == 'Administración de Redes y Comunicaciones' ? 'selected' : '' }}>Administración de Redes y Comunicaciones</option>
                        <option value="Diseño y Desarrollo de Simuladores y Videojuegos" {{ request('departamento') == 'Diseño y Desarrollo de Simuladores y Videojuegos' ? 'selected' : '' }}>Diseño y Desarrollo de Simuladores y Videojuegos</option>
                        <option value="Modelado y Animación Digital" {{ request('departamento') == 'Modelado y Animación Digital' ? 'selected' : '' }}>Modelado y Animación Digital</option>
                        <option value="Diseño Industrial" {{ request('departamento') == 'Diseño Industrial' ? 'selected' : '' }}>Diseño Industrial</option>
                        <option value="Producción y Gestión Industrial" {{ request('departamento') == 'Producción y Gestión Industrial' ? 'selected' : '' }}>Producción y Gestión Industrial</option>
                        <option value="Operaciones Mineras" {{ request('departamento') == 'Operaciones Mineras' ? 'selected' : '' }}>Operaciones Mineras</option>
                        <option value="Procesos Químicos y Metalúrgicos" {{ request('departamento') == 'Procesos Químicos y Metalúrgicos' ? 'selected' : '' }}>Procesos Químicos y Metalúrgicos</option>
                        <option value="Electricidad Industrial" {{ request('departamento') == 'Electricidad Industrial' ? 'selected' : '' }}>Electricidad Industrial</option>
                        <option value="Electrónica y Automatización Industrial" {{ request('departamento') == 'Electrónica y Automatización Industrial' ? 'selected' : '' }}>Electrónica y Automatización Industrial</option>
                        <option value="Mecatrónica Industrial" {{ request('departamento') == 'Mecatrónica Industrial' ? 'selected' : '' }}>Mecatrónica Industrial</option>
                        <option value="estión y Mantenimiento de Maquinaria Industrial" {{ request('departamento') == 'estión y Mantenimiento de Maquinaria Industrial' ? 'selected' : '' }}>estión y Mantenimiento de Maquinaria Industrial</option>
                        <option value="Gestión de Mantenimiento de Maquinaria Pesada" {{ request('departamento') == 'Gestión de Mantenimiento de Maquinaria Pesada' ? 'selected' : '' }}>Gestión de Mantenimiento de Maquinaria Pesada</option>
                        <option value="Aviación y Mecánica Aeronáutica" {{ request('departamento') == 'Aviación y Mecánica Aeronáutica' ? 'selected' : '' }}>Aviación y Mecánica Aeronáutica</option>

                        <!-- ...más opciones de departamentos... -->
                    </select>
                </div>
            </div>
        </form>

        <!-- Mostrar libros (tabla) -->
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
                        @foreach ($books as $book)
                        <tr class="text-gray-400">
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <div class="relative hidden w-8 h-8 mr-3 rounded-full lg:block">
                                        <x-cld-image class="object-cover w-full h-full rounded-full" public-id="{{ $book->image_public_id }}" width="300" height="300"></x-cld-image>
                                    </div>
                                    <div>
                                        <p class="font-semibold">{{ $book->title }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm">{{ $book->author }}</td>
                            <td class="px-4 py-3 text-sm">{{ $book->category->name ?? 'Sin categoría' }}</td>
                            <td class="px-4 py-3 text-sm">{{ $book->language }}</td>
                            <td class="px-4 py-3 text-sm">{{ $book->publication_year }}</td>
                            <td class="px-4 py-3 text-sm hidden lg:table-cell">{{ $book->created_at->format('d-m-Y') }}</td>
                            <td class="px-4 py-3 text-sm">
                                <form action="{{ route('admin.books.edit', $book->id) }}">
                                    @csrf
                                    <button type="submit" class="inline-block w-auto text-yellow-50 bg-yellow-600 rounded-md p-2">
                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <path fill="currentColor" d="M4 21h16v-2H4v2zM3 3v12h18V3H3zm6 10V7h8v6H9z"></path>
                                        </svg>
                                    </button>
                                </form>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <form action="{{ route('admin.books.delete', $book->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-block w-auto text-red-50 bg-red-600 rounded-md p-2">
                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <path fill="currentColor" d="M19 6h-2V4c0-1.1-.9-2-2-2h-4c-1.1 0-2 .9-2 2v2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V8c0-1.1-.9-2-2-2zm-7 0h-4V4h4v2z"></path>
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<script>
    function toggleFilterOptions() {
        const filterType = document.getElementById('filter_type').value;
        document.getElementById('generales_filter').classList.toggle('hidden', filterType !== 'generales');
        document.getElementById('departamentos_filter').classList.toggle('hidden', filterType !== 'departamentos');
    }
    toggleFilterOptions();

    
</script>
@endsection
