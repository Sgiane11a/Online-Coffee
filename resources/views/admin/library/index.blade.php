@extends('layouts.admin')

@section('main')
    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-200">
                BIBLIOTECA (INTERFAZ TEMPORAL)
            </h2>
            <!-- CTA -->
            
            <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
                
                
                <a href="{{ route('admin.library.categories.index') }}"
                    class="flex items-center p-4 rounded-lg shadow-xs bg-gray-800">
                    <div
                        class="p-3 mr-4 rounded-full text-orange-100 bg-orange-500">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-lg font-medium text-gray-400">
                            Categorías
                        </p>
                    </div>
                </a>
                <a href="{{ route('admin.library.books.index') }}" class="flex items-center p-4 rounded-lg shadow-xs bg-gray-800">
                    <div class="p-3 mr-4 rounded-full text-green-100 bg-green-500">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-lg font-medium text-gray-400">
                            Productos
                        </p>
                    </div>
                </a>
            </div>
        </div>
    </main>
@endsection
