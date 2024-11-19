@extends('layouts.admin')

@section('main')
    <main class="h-full pb-16 overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-200">
                Crear Categoría
            </h2>
            <form action="{{ route('admin.store.categories.store') }}" method="POST"
                class="flex flex-col gap-4 px-4 py-3 mb-8 rounded-lg shadow-md bg-gray-800">
                @csrf
                <div class="block text-sm">
                    <label name="name" class="text-gray-700 dark:text-gray-400">Nombre</label>
                    <input name="name" type="text"
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-grape-400 focus:outline-none focus:shadow-outline-grape dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        placeholder="Ingresa el nombre de la categoría" />
                </div>
                <button type="submit"
                    class="mt-4 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    Crear Categoría
                </button>
            </form>

            <!-- Validation inputs -->
            <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
                Validation
            </h4>
            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <!-- Invalid input -->
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">
                        Invalid input
                    </span>
                    <input
                        class="block w-full mt-1 text-sm border-red-600 dark:text-gray-300 dark:bg-gray-700 focus:border-red-400 focus:outline-none focus:shadow-outline-red form-input"
                        placeholder="Jane Doe" />
                    <span class="text-xs text-red-600 dark:text-red-400">
                        Your password is too short.
                    </span>
                </label>

                <!-- Valid input -->
                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">
                        Valid input
                    </span>
                    <input
                        class="block w-full mt-1 text-sm border-green-600 dark:text-gray-300 dark:bg-gray-700 focus:border-green-400 focus:outline-none focus:shadow-outline-green form-input"
                        placeholder="Jane Doe" />
                    <span class="text-xs text-green-600 dark:text-green-400">
                        Your password is strong.
                    </span>
                </label>

                <!-- Helper text -->
                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">
                        Helper text
                    </span>
                    <input
                        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-grape-400 focus:outline-none focus:shadow-outline-grape dark:focus:shadow-outline-gray form-input"
                        placeholder="Jane Doe" />
                    <span class="text-xs text-gray-600 dark:text-gray-400">
                        Your password must be at least 6 characters long.
                    </span>
                </label>
            </div>
        </div>
    </main>
@endsection
