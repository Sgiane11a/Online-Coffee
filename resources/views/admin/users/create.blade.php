@extends('layouts.admin')

@section('main')
    <main class="h-full pb-16 overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-200">
                Crear Usuario
            </h2>

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

            <form action="{{ route('admin.users.store') }}" method="POST" class="flex flex-col gap-4 px-4 py-3 mb-8 rounded-lg shadow-md bg-gray-800">
                @csrf

                <!-- Nombre -->
                <div class="block text-sm">
                    <label for="name" class="text-gray-400">Nombre</label>
                    <input name="name" type="text" class="block w-full mt-1 text-sm border-gray-600 bg-gray-700 text-gray-300" placeholder="Ingresa un nombre" required />
                </div>

                <!-- Correo -->
                <div class="block text-sm">
                    <label for="email" class="text-gray-400">Correo</label>
                    <input name="email" type="email" class="block w-full mt-1 text-sm border-gray-600 bg-gray-700 text-gray-300" placeholder="Ingresa un correo" required />
                </div>

                <!-- Contraseña -->
                <div>
                    <label for="password" class="text-gray-400">Contraseña</label>
                    <input name="password" type="password" class="block w-full mt-1 text-sm border-gray-600 bg-gray-700 text-gray-300" placeholder="Ingresa una contraseña" required />
                </div>

                <div>
                    <label for="password_confirmation" class="text-gray-400">Confirmar Contraseña</label>
                    <input name="password_confirmation" type="password" class="block w-full mt-1 text-sm border-gray-600 bg-gray-700 text-gray-300" placeholder="Confirma tu contraseña" required />
                </div>

                <!-- Departamento -->
                <div class="block text-sm">
                    <label for="department" class="text-gray-400">Departamento</label>
                    <select id="department" name="department_id" class="block w-full mt-1 text-sm border-gray-600 bg-gray-700 text-gray-300">
                        <option value="">Selecciona un Departamento</option>
                        @foreach ($departments as $department)
                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                        @endforeach
                    </select>
                </div>
                <!-- Carrera -->
                <div class="block text-sm">
                    <label for="career" class="text-gray-400">Carrera</label>
                    <select id="career" name="career_id" class="block w-full mt-1 text-sm border-gray-600 bg-gray-700 text-gray-300">
                        <option value="">Selecciona una Carrera</option>
                        <!-- Las opciones se cargarán dinámicamente -->
                    </select>
                </div>

                <button type="submit" class="mt-4 px-4 py-2 text-sm font-medium leading-5 text-white bg-purple-600 border border-transparent rounded-lg hover:bg-purple-700">
                    Crear Usuario
                </button>
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
