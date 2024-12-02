@extends('layouts.admin')

@section('main')
    <main class="h-full pb-16 overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h3 class="my-6 text-2xl font-semibold text-gray-200">
                Actualizar Usuario
            </h3>

            <!-- Formulario -->
            <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="space-y-6 bg-white p-8 rounded-xl shadow-xl max-w-3xl mx-auto" style="min-width: 600px;">
                @csrf
                @method('PUT')

                <!-- Nombre -->
                <div class="space-y-4">
                    <label for="name" class="block text-sm font-medium text-gray-400">Nombre</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" 
                        class="w-full px-4 py-2 bg-gray-100 text-gray-700 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-pink-600 focus:border-transparent transition duration-200" 
                        required>
                    @error('name')
                        <div class="text-red-500 text-xs">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Correo Electrónico -->
                <div class="space-y-4">
                    <label for="email" class="block text-sm font-medium text-gray-400">Correo Electrónico</label>
                    <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" 
                        class="w-full px-4 py-2 bg-gray-100 text-gray-700 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-pink-600 focus:border-transparent transition duration-200" 
                        required>
                    @error('email')
                        <div class="text-red-500 text-xs">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Departamento -->
                <div class="space-y-4">
                    <label for="department_id" class="block text-sm font-medium text-gray-400">Departamento</label>
                    <select name="department_id" id="department_id" 
                        class="w-full px-4 py-2 bg-gray-100 text-gray-700 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-pink-600 focus:border-transparent transition duration-200" 
                        style="width: 100%;" required>
                        @foreach ($departments as $department)
                            <option value="{{ $department->id }}" 
                                {{ old('department_id', $user->department_id) == $department->id ? 'selected' : '' }}>{{ $department->name }}</option>
                        @endforeach
                    </select>
                    @error('department_id')
                        <div class="text-red-500 text-xs">{{ $message }}</div>
                    @enderror
                </div>
                
                <!-- Carrera -->
                <div class="space-y-4">
                    <label for="career_id" class="block text-sm font-medium text-gray-400">Carrera</label>
                    <select name="career_id" id="career_id" 
                        class="w-full px-4 py-2 bg-gray-100 text-gray-700 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-pink-600 focus:border-transparent transition duration-200" 
                        style="width: 100%;" required>
                        <!-- Las opciones de carrera se llenarán dinámicamente con JavaScript -->
                    </select>
                    @error('career_id')
                        <div class="text-red-500 text-xs">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Botones de acción -->
                <div class="flex justify-between mt-6">
                    <!-- Botón de Cancelar -->
                    <a href="{{ url()->previous() }}" 
                        class="inline-block px-4 py-2 text-white bg-gray-600 rounded-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-pink-500 transition duration-200">
                        Cancelar
                    </a>

                    <!-- Botón de Actualizar Usuario -->
                    <button type="submit" 
                        class="px-6 py-2 bg-pink-600 text-white rounded-md hover:bg-pink-700 focus:outline-none focus:ring-2 focus:ring-pink-500 transition duration-200">
                        Actualizar Usuario
                    </button>
                </div>
            </form>
        </div>
    </main>

    <!-- Script para actualizar las carreras dependiendo del departamento -->
    <script>
        const departments = @json($departments); // Los departamentos son inyectados desde el controlador
        const careers = @json($careers); // Las carreras son inyectadas desde el controlador

        // Relacionamos cada departamento con sus carreras
        const careersByDepartment = careers.reduce((acc, career) => {
            if (!acc[career.department_id]) acc[career.department_id] = [];
            acc[career.department_id].push(career);
            return acc;
        }, {});

        // Referencias a los selects
        const departmentSelect = document.getElementById('department_id');
        const careerSelect = document.getElementById('career_id');

        // Función para actualizar las opciones de carreras
        function updateCareers() {
            const departmentId = departmentSelect.value;
            const availableCareers = careersByDepartment[departmentId] || [];

            // Limpiamos el select de carreras
            careerSelect.innerHTML = '';

            // Añadimos las nuevas opciones
            availableCareers.forEach(career => {
                const option = document.createElement('option');
                option.value = career.id;
                option.textContent = career.name;
                careerSelect.appendChild(option);
            });
        }

        // Inicializamos con las carreras correspondientes al departamento seleccionado
        departmentSelect.addEventListener('change', updateCareers);

        // Llamamos a la función al cargar la página para seleccionar las carreras correspondientes al departamento ya seleccionado
        updateCareers();
    </script>
@endsection
