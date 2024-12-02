@extends('layouts.admin')

@section('main')
    <main class="h-full pb-16 overflow-y-auto">
        <div class="container px-6 mx-auto">
            <h2 class="my-6 text-2xl font-semibold text-gray-200">
                Crear Usuario
            </h2>

            <form action="{{ route('admin.users.store') }}" method="POST" class="space-y-6 bg-white p-8 rounded-xl shadow-xl max-w-3xl mx-auto">
                @csrf

                <!-- Nombre -->
                <div class="space-y-4">
                    <label for="name" class="block text-sm font-medium text-gray-400">Nombre</label>
                    <input name="name" type="text" id="name" placeholder="Ingresa un nombre" class="w-full px-4 py-2 bg-gray-100 text-gray-700 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-pink-600 focus:border-transparent transition duration-200" required />
                    @error('name')
                        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Correo -->
                <div class="space-y-4">
                    <label for="email" class="block text-sm font-medium text-gray-400">Correo</label>
                    <input name="email" type="email" id="email" placeholder="Ingresa un correo" class="w-full px-4 py-2 bg-gray-100 text-gray-700 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-pink-600 focus:border-transparent transition duration-200" required />
                    @error('email')
                        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Contraseña -->
                <div class="space-y-4">
                    <label for="password" class="block text-sm font-medium text-gray-400">Contraseña</label>
                    <input name="password" type="password" id="password" placeholder="Ingresa una contraseña" class="w-full px-4 py-2 bg-gray-100 text-gray-700 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-pink-600 focus:border-transparent transition duration-200" required />
                    @error('password')
                        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Confirmar Contraseña -->
                <div class="space-y-4">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-400">Confirmar Contraseña</label>
                    <input name="password_confirmation" type="password" id="password_confirmation" placeholder="Confirma tu contraseña" class="w-full px-4 py-2 bg-gray-100 text-gray-700 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-pink-600 focus:border-transparent transition duration-200" required />
                    @error('password_confirmation')
                        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Departamento -->
                <div class="space-y-4">
                    <label for="department" class="block text-sm font-medium text-gray-400">Departamento</label>
                    <select id="department" name="department_id" class="w-full px-4 py-2 bg-gray-100 text-gray-700 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-pink-600 focus:border-transparent transition duration-200">
                        <option value="">Selecciona un Departamento</option>
                        @foreach ($departments as $department)
                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                        @endforeach
                    </select>
                    @error('department_id')
                        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Carrera -->
                <div class="space-y-4">
                    <label for="career" class="block text-sm font-medium text-gray-400">Carrera</label>
                    <select id="career" name="career_id" class="w-full px-4 py-2 bg-gray-100 text-gray-700 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-pink-600 focus:border-transparent transition duration-200">
                        <option value="">Selecciona una Carrera</option>
                    </select>
                    @error('career_id')
                        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Botones -->
                <div class="flex justify-between mt-6">
                    <!-- Botón de Cancelar -->
                    <a href="{{ url()->previous() }}" class="inline-block px-4 py-2 text-white bg-gray-600 rounded-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-pink-500 transition duration-200">
                        Cancelar
                    </a>

                    <!-- Botón de Crear Usuario -->
                    <button type="submit" class="px-6 py-2 bg-pink-600 text-white rounded-md hover:bg-pink-700 focus:outline-none focus:ring-2 focus:ring-pink-500 transition duration-200">
                        Crear Usuario
                    </button>
                </div>
            </form>
        </div>
    </main>

    <script>
        // Datos de carreras por departamento (se carga dinámicamente desde Laravel)
        const carreras = @json($careers->groupBy('department_id'));

        // Función para actualizar las carreras dependiendo del departamento
        document.getElementById('department').addEventListener('change', function() {
            const departmentId = this.value;
            const careerSelect = document.getElementById('career');
            careerSelect.innerHTML = '<option value="">Selecciona una Carrera</option>'; // Limpiar opciones anteriores

            if (departmentId && carreras[departmentId]) {
                carreras[departmentId].forEach(career => {
                    const option = document.createElement('option');
                    option.value = career.id;
                    option.textContent = career.name;
                    careerSelect.appendChild(option);
                });
            }
        });
    </script>
@endsection
