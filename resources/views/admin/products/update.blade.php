@extends('layouts.admin')

@section('main')
    <main class="h-full pb-16 overflow-y-auto">
        <div class="container px-6 mx-auto">
            <h2 class="my-6 text-2xl font-semibold text-gray-200">
                Actualizar Producto
            </h2>
            
            <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6 bg-white p-8 rounded-xl shadow-xl max-w-3xl mx-auto">
                @csrf
                @method('PUT')
                
                <!-- Categoría -->
                <div class="space-y-4">
                    <label for="category_id" class="block text-sm font-medium text-gray-400">Categoría</label>
                    <select name="category_id" id="category_id" class="w-full px-4 py-2 bg-gray-100 text-gray-700 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-pink-600 focus:border-transparent transition duration-200" required>
                        <option value="">Selecciona una categoría</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Nombre -->
                <div class="space-y-4">
                    <label for="name" class="block text-sm font-medium text-gray-400">Nombre</label>
                    <input name="name" type="text" id="name" value="{{ $product->name }}" placeholder="Ingresa el nombre del producto" class="w-full px-4 py-2 bg-gray-100 text-gray-700 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-pink-600 focus:border-transparent transition duration-200" required />
                    @error('name')
                        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Descripción -->
                <div class="space-y-4">
                    <label for="description" class="block text-sm font-medium text-gray-400">Descripción</label>
                    <textarea name="description" id="description" rows="3" placeholder="Ingresa la descripción del producto" class="w-full px-4 py-2 bg-gray-100 text-gray-700 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-pink-600 focus:border-transparent transition duration-200" required>{{ $product->description }}</textarea>
                    @error('description')
                        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Precio -->
                <div class="space-y-4">
                    <label for="price" class="block text-sm font-medium text-gray-400">Precio</label>
                    <input name="price" type="number" id="price" value="{{ $product->price }}" placeholder="Ingresa el precio del producto" class="w-full px-4 py-2 bg-gray-100 text-gray-700 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-pink-600 focus:border-transparent transition duration-200" required />
                    @error('price')
                        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Imagen -->
                <div class="space-y-4">
                    <label for="file" class="block text-sm font-medium text-gray-400">Imagen</label>
                    <div class="flex items-center gap-4">
                        <!-- Imagen actual -->
                        <x-cld-image class="border-gray-600 max-w-xs max-h-40 object-contain" public-id="{{ $product->image_public_id }}"></x-cld-image>
                        <!-- Input para nueva imagen -->
                        <input name="file" type="file" id="file" accept="image/*" class="w-full px-4 py-2 bg-gray-100 text-gray-700 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-pink-600 focus:border-transparent transition duration-200" />
                    </div>
                    @error('file')
                        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Botón de acción -->
                <div class="flex justify-between mt-6">
                    <!-- Botón de Cancelar -->
                    <a href="{{ url()->previous() }}" class="inline-block px-4 py-2 text-white bg-gray-600 rounded-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-pink-500 transition duration-200">
                        Cancelar
                    </a>

                    <!-- Botón de Actualizar Producto -->
                    <button type="submit" class="px-6 py-2 bg-pink-600 text-white rounded-md hover:bg-pink-700 focus:outline-none focus:ring-2 focus:ring-pink-500 transition duration-200">
                        Actualizar Producto
                    </button>
                </div>
            </form>
        </div>
    </main>
@endsection
