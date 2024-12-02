@extends('layouts.admin')

@section('main')
    <main class="h-full pb-16 overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h3 class="my-6 text-2xl font-semibold text-gray-200">
                Crear Libro
            </h3>

            <!-- Mensajes de éxito o error -->
            @if (session('success'))
                <div class="bg-green-500 text-white p-4 mb-4">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="bg-red-500 text-white p-4 mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Formulario -->
            <form action="{{ route('admin.books.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6 bg-white p-8 rounded-xl shadow-xl max-w-3xl mx-auto" style="min-width: 600px;">
                @csrf

                <!-- Categoría -->
                <div class="space-y-4">
                    <label for="category_id" class="block text-sm font-medium text-gray-400">Categoría</label>
                    <select name="category_id" id="category_id" class="w-full px-4 py-2 bg-gray-100 text-gray-700 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-pink-600 focus:border-transparent transition duration-200" required>
                        <option value="">Selecciona una categoría</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="text-red-500 text-xs">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Título -->
                <div class="space-y-4">
                    <label for="title" class="block text-sm font-medium text-gray-400">Título</label>
                    <input type="text" name="title" id="title" class="w-full px-4 py-2 bg-gray-100 text-gray-700 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-pink-600 focus:border-transparent transition duration-200" placeholder="Ingresa el título del libro" required>
                    @error('title')
                        <div class="text-red-500 text-xs">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Autor -->
                <div class="space-y-4">
                    <label for="author" class="block text-sm font-medium text-gray-400">Autor</label>
                    <input type="text" name="author" id="author" class="w-full px-4 py-2 bg-gray-100 text-gray-700 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-pink-600 focus:border-transparent transition duration-200" placeholder="Ingresa el autor del libro" required>
                    @error('author')
                        <div class="text-red-500 text-xs">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Idioma -->
                <div class="space-y-4">
                    <label for="language" class="block text-sm font-medium text-gray-400">Idioma</label>
                    <select name="language" id="language" class="w-full px-4 py-2 bg-gray-100 text-gray-700 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-pink-600 focus:border-transparent transition duration-200" required>
                        <option value="">Selecciona un idioma</option>
                        <option value="es">Español</option>
                        <option value="en">Inglés</option>
                    </select>
                    @error('language')
                        <div class="text-red-500 text-xs">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Año de Publicación -->
                <div class="space-y-4">
                    <label for="publication_year" class="block text-sm font-medium text-gray-400">Año de Publicación</label>
                    <input type="number" name="publication_year" id="publication_year" class="w-full px-4 py-2 bg-gray-100 text-gray-700 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-pink-600 focus:border-transparent transition duration-200" placeholder="Ingresa el año de publicación" required>
                    @error('publication_year')
                        <div class="text-red-500 text-xs">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Descripción -->
                <div class="space-y-4">
                    <label for="description" class="block text-sm font-medium text-gray-400">Descripción</label>
                    <textarea name="description" id="description" rows="3" class="w-full px-4 py-2 bg-gray-100 text-gray-700 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-pink-600 focus:border-transparent transition duration-200" placeholder="Ingresa la descripción del libro" required></textarea>
                    @error('description')
                        <div class="text-red-500 text-xs">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Archivo PDF -->
                <div class="space-y-4">
                    <label for="pdf_file" class="block text-sm font-medium text-gray-400">Archivo PDF</label>
                    <input type="file" name="pdf_file" id="pdf_file" accept=".pdf" class="w-full px-4 py-2 bg-gray-100 text-gray-700 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-pink-600 focus:border-transparent transition duration-200">
                    @error('pdf_file')
                        <div class="text-red-500 text-xs">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Imagen -->
                <div class="space-y-4">
                    <label for="file" class="block text-sm font-medium text-gray-400">Imagen</label>
                    <input type="file" name="file" id="file" accept="image/*" class="w-full px-4 py-2 bg-gray-100 text-gray-700 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-pink-600 focus:border-transparent transition duration-200">
                    @error('file')
                        <div class="text-red-500 text-xs">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Botones de acción -->
                <div class="flex justify-between mt-6">
                    <!-- Botón de Cancelar -->
                    <a href="{{ url()->previous() }}" class="inline-block px-4 py-2 text-white bg-gray-600 rounded-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-pink-500 transition duration-200">
                        Cancelar
                    </a>

                    <!-- Botón de Crear Libro -->
                    <button type="submit" class="px-6 py-2 bg-pink-600 text-white rounded-md hover:bg-pink-700 focus:outline-none focus:ring-2 focus:ring-pink-500 transition duration-200">
                        Crear Libro
                    </button>
                </div>
            </form>
        </div>
    </main>
@endsection
