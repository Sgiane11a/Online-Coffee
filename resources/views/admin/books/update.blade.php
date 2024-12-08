@extends('layouts.admin')

@section('main')
    <main class="h-full pb-16 overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h3 class="my-6 text-2xl font-semibold text-gray-200">
                Actualizar Libro
            </h3>

            <!-- Formulario -->
            <form action="{{ route('admin.books.update', $book->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6 bg-white p-8 rounded-xl shadow-xl max-w-3xl mx-auto" style="min-width: 600px;">
                @csrf
                @method('PUT')

                <!-- Categoría -->
                <div class="space-y-4">
                    <label for="category_id" class="block text-sm font-medium text-gray-400">Categoría</label>
                    <select name="category_id" id="category_id" 
                        class="w-full px-4 py-2 bg-gray-100 text-gray-700 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-pink-600 focus:border-transparent transition duration-200" 
                        required>
                        <option value="">Selecciona una categoría</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $book->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Título -->
                <div class="space-y-4">
                    <label for="title" class="block text-sm font-medium text-gray-400">Título</label>
                    <input type="text" name="title" id="title" value="{{ old('title', $book->title) }}" 
                        class="w-full px-4 py-2 bg-gray-100 text-gray-700 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-pink-600 focus:border-transparent transition duration-200" 
                        required>
                </div>

                <!-- Autor -->
                <div class="space-y-4">
                    <label for="author" class="block text-sm font-medium text-gray-400">Autor</label>
                    <input type="text" name="author" id="author" value="{{ old('author', $book->author) }}" 
                        class="w-full px-4 py-2 bg-gray-100 text-gray-700 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-pink-600 focus:border-transparent transition duration-200" 
                        required>
                </div>

                <!-- Idioma -->
                <div class="space-y-4">
                    <label for="language" class="block text-sm font-medium text-gray-400">Idioma</label>
                    <input type="text" name="language" id="language" value="{{ old('language', $book->language) }}" 
                        class="w-full px-4 py-2 bg-gray-100 text-gray-700 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-pink-600 focus:border-transparent transition duration-200" 
                        required>
                </div>

                <!-- Año de Publicación -->
                <div class="space-y-4">
                    <label for="publication_year" class="block text-sm font-medium text-gray-400">Año de Publicación</label>
                    <input type="number" name="publication_year" id="publication_year" value="{{ old('publication_year', $book->publication_year) }}" 
                        class="w-full px-4 py-2 bg-gray-100 text-gray-700 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-pink-600 focus:border-transparent transition duration-200" 
                        required>
                </div>

                <!-- Imagen -->
                <div class="flex mt-4 gap-4">
                    <!-- Vista previa de la imagen -->
                    <div class="relative">
                        <x-cld-image class="border border-gray-600 max-w-xs max-h-40 object-contain rounded-md" public-id="{{ $book->image_public_id }}"></x-cld-image>
                    </div>

                    <!-- Campo de carga de nueva imagen -->
                    <div class="w-full">
                        <label for="image-input" class="block text-sm font-medium text-gray-400">Cargar nueva imagen</label>
                        <input name="file" type="file" accept="image/*"
                            class="block w-full text-sm px-4 py-2 bg-gray-100 text-gray-700 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-pink-600 focus:border-transparent transition duration-200" />
                    </div>
                </div>

                <!-- PDF -->
                <div class="space-y-4">
                    <label for="pdf_file" class="block text-sm font-medium text-gray-400">Archivo PDF</label>
                    <input id="pdf-input" name="pdf_file" type="file" accept=".pdf" 
                        class="block w-full px-4 py-2 bg-gray-100 text-gray-700 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-pink-600 focus:border-transparent transition duration-200">
                    
                    @if($book->digital_version_link)
                        <a href="{{ $book->digital_version_link }}" class="text-blue-500" target="_blank">Ver archivo PDF actual</a>
                    @endif
                </div>


                <!-- Botones de acción -->
                <div class="flex justify-between mt-6">
                    <a href="{{ url()->previous() }}" 
                        class="inline-block px-4 py-2 text-white bg-gray-600 rounded-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-pink-500 transition duration-200">
                        Cancelar
                    </a>

                    <button type="submit" 
                        class="px-6 py-2 bg-pink-600 text-white rounded-md hover:bg-pink-700 focus:outline-none focus:ring-2 focus:ring-pink-500 transition duration-200">
                        Actualizar Libro
                    </button>
                </div>
            </form>
        </div>
    </main>

    <!-- Script para la vista previa de la imagen -->
    <script>
        document.getElementById('image-input').addEventListener('change', function(event) {
            const file = event.target.files[0]; 
            const reader = new FileReader();

            reader.onload = function(e) {
                document.getElementById('image-preview').src = e.target.result;
            };

            if (file) {
                reader.readAsDataURL(file); 
            }
        });
    </script>
@endsection
