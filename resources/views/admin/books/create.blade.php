@extends('layouts.admin')

@section('main')
    <main class="h-full pb-16 overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-200">
                Crear Libro
            </h2>
            <form action="{{ route('admin.books.store') }}" method="POST" enctype="multipart/form-data"
            class="flex flex-col gap-4 px-4 py-3 mb-8 rounded-lg shadow-md bg-gray-800">
                @csrf

                <!-- Campo de Categoría -->
                <div class="block mt-4 text-sm">
                    <label for="category_id" class="text-gray-400">Categoría</label>
                    <select name="category_id"
                        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                        required>
                        <option value="">Selecciona una categoría</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Campo de Título -->
                <div class="block text-sm">
                    <label for="title" class="text-gray-400">Título</label>
                    <input name="title" type="text"
                        class="block w-full mt-1 text-sm border-gray-600 bg-gray-700 focus:border-grape-400 focus:outline-none focus:shadow-outline-grape text-gray-300"
                        placeholder="Ingresa el título del libro" required />
                </div>

                <!-- Campo de Autor -->
                <div class="block text-sm">
                    <label for="author" class="text-gray-400">Autor</label>
                    <input name="author" type="text"
                        class="block w-full mt-1 text-sm border-gray-600 bg-gray-700 focus:border-grape-400 focus:outline-none focus:shadow-outline-grape text-gray-300"
                        placeholder="Ingresa el autor del libro" required />
                </div>

                <!-- Campo de Idioma (con opciones Ingles/Español) -->
                <div class="block text-sm">
                    <label for="language" class="text-gray-400">Idioma</label>
                    <select name="language"
                        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                        required>
                        <option value="">Selecciona un idioma</option>
                        <option value="es">Español</option>
                        <option value="en">Inglés</option>
                    </select>
                </div>

                <!-- Campo de Año de Publicación -->
                <div class="block text-sm">
                    <label for="publication_year" class="text-gray-400">Año de Publicación</label>
                    <input name="publication_year" type="number"
                        class="block w-full mt-1 text-sm border-gray-600 bg-gray-700 focus:border-grape-400 focus:outline-none focus:shadow-outline-grape text-gray-300"
                        placeholder="Ingresa el año de publicación" required />
                </div>

                <!-- Campo de Descripción -->
                <div class="block text-sm">
                    <label for="description" class="text-gray-400">Descripción</label>
                    <textarea name="description"
                        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                        rows="3" placeholder="Ingresa la descripción del libro" required></textarea>
                </div>

                <!-- Campo de Imagen -->
                <div class="block text-sm">
                    <label for="file" class="text-gray-400">Imagen</label>
                    <input name="file" type="file" accept="image/*"
                        class="block w-full mt-1 text-sm text-gray-300 border-gray-600 bg-gray-700 focus:border-grape-400 focus:outline-none focus:shadow-outline-grape focus:shadow-outline-gray form-input" />
                </div>

                <button type="submit"
                    class="mt-4 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    Crear Libro
                </button>
            </form>
        </div>
    </main>
@endsection
