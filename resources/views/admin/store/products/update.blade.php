@extends('layouts.admin')

@section('main')
    <main class="h-full pb-16 overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-200">
                Actualizar Producto
            </h2>
            <form action="{{ route('admin.store.products.update', $product->id) }}" method="POST"
                enctype="multipart/form-data" class="flex flex-col gap-4 px-4 py-3 mb-8 rounded-lg shadow-md bg-gray-800">
                @csrf
                @method('PUT')
                <div class="block mt-4 text-sm">
                    <label name="category_id" class="text-gray-700 dark:text-gray-400">
                        Producto
                    </label>
                    <select name="category_id"
                        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                        required>
                        <option value="">Selecciona una categoría</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="block text-sm">
                    <label name="name" class="text-gray-700 dark:text-gray-400">Nombre</label>
                    <input name="name" type="text"
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-grape-400 focus:outline-none focus:shadow-outline-grape dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        value="{{ $product->name }}" placeholder="Ingresa el nombre del producto" required />
                </div>
                <div class="block text-sm">
                    <label name="description" class="text-gray-700 dark:text-gray-400">Descripción</label>
                    <textarea name="description"
                        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                        rows="3" placeholder="Ingresa la descripción del producto" required>{{ $product->description }}</textarea>
                </div>
                <div class="block text-sm">
                    <label name="price" class="text-gray-700 dark:text-gray-400">Precio</label>
                    <input name="price" type="number"
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-grape-400 focus:outline-none focus:shadow-outline-grape dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        value="{{ $product->price }}" placeholder="Ingresa el precio del producto" required />
                </div>
                <div class="block text-sm">
                    <label class="text-gray-400">Imagen</label>
                    <div class="flex  mt-1">
                        <x-cld-image class="border-gray-600" public-id="{{ $product->image_public_id }}" width="300"
                            height="300"></x-cld-image>
                        <div
                            class="flex w-full text-sm text-gray-300 border-gray-600 bg-gray-700 focus:border-grape-400 focus:outline-none focus:shadow-outline-grape focus:shadow-outline-gray form-input">
                            <input name="file" type="file" accept="image/*"
                                class="block w-full text-sm text-gray-300 border-gray-600 bg-gray-700 focus:border-grape-400 focus:outline-none focus:shadow-outline-grape focus:shadow-outline-gray form-input" />
                        </div>
                    </div>
                </div>
                <button type="submit"
                    class="mt-4 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    Actualizar Producto
                </button>
            </form>
        </div>
    </main>
@endsection
