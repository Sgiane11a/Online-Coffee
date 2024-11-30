@extends('layouts.admin')

@section('main')
    <main class="h-full pb-16 overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-200">
                Actualizar Libro
            </h2>
            <form action="{{ route('admin.books.update', $book->id) }}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-4 px-4 py-3 mb-8 rounded-lg shadow-md bg-gray-800">
                @csrf
                @method('PUT')
                <div class="block mt-4 text-sm">
                    <label name="category_id" class="text-gray-400">
                        Categoría
                    </label>
                    <select name="category_id"
                        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                        required>
                        <option value="">Selecciona una categoría</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ $book->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="block text-sm">
                    <label name="title" class="text-gray-400">Título</label>
                    <input name="title" type="text"
                        class="block w-full mt-1 text-sm border-gray-600 bg-gray-700 focus:border-grape-400 focus:outline-none focus:shadow-outline-grape text-gray-300" 
                        value="{{ $book->title }}" placeholder="Ingresa el título del libro" required />
                </div>
                <div class="block text-sm">
                    <label name="author" class="text-gray-400">Autor</label>
                    <input name="author" type="text"
                        class="block w-full mt-1 text-sm border-gray-600 bg-gray-700 focus:border-grape-400 focus:outline-none focus:shadow-outline-grape text-gray-300" 
                        value="{{ $book->author }}" placeholder="Ingresa el autor del libro" required />
                </div>
                <div class="block text-sm">
                    <label name="language" class="text-gray-400">Idioma</label>
                    <input name="language" type="text"
                        class="block w-full mt-1 text-sm border-gray-600 bg-gray-700 focus:border-grape-400 focus:outline-none focus:shadow-outline-grape text-gray-300" 
                        value="{{ $book->language }}" placeholder="Ingresa el idioma del libro" required />
                </div>
                <div class="block text-sm">
                    <label name="publication_year" class="text-gray-400">Año de Publicación</label>
                    <input name="publication_year" type="number"
                        class="block w-full mt-1 text-sm border-gray-600 bg-gray-700 focus:border-grape-400 focus:outline-none focus:shadow-outline-grape text-gray-300" 
                        value="{{ $book->publication_year }}" placeholder="Ingresa el año de publicación del libro" required />
                </div>
                <div class="block text-sm">
                    <label class="text-gray-400">Imagen</label>
                    <div class="flex mt-1">
                        <img id="image-preview" 
                            src="{{ $book->image_url ? asset('storage/' . $book->image_url) : '' }}" 
                            class="border-gray-600" width="150" height="150" alt="Vista previa de la imagen" />

                        <div class="flex w-full text-sm text-gray-300 border-gray-600 bg-gray-700 focus:border-grape-400 focus:outline-none focus:shadow-outline-grape focus:shadow-outline-gray form-input">
                            <input id="image-input" name="image" type="file" accept="image/*"
                                class="block w-full text-sm text-gray-300 border-gray-600 bg-gray-700 focus:border-grape-400 focus:outline-none focus:shadow-outline-grape focus:shadow-outline-gray form-input" />
                        </div>
                    </div>
                </div>
                <button type="submit"
                    class="mt-4 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    Actualizar Libro
                </button>
            </form>
        </div>
    </main>

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
