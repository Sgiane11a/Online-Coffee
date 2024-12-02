@extends('layouts.admin')

@section('main')

    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h1 class="text-grape-450 font-bold text-3xl text-center my-8 text-wrap">¡Bienvenido, {{ Auth::user()->name }}!</h1>

            <!-- Sección de estadísticas -->
            <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
                <!-- Nuevos comentarios -->
                <div class="flex items-center p-4 rounded-lg shadow-xs bg-pink-500 text-white">
                    <div class="p-3 mr-4 rounded-full bg-white text-pink-500">
                        <svg class="h-8 w-8 text-pink-500"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  
                            <path d="M21 14l-3 -3h-7a1 1 0 0 1 -1 -1v-6a1 1 0 0 1 1 -1h9a1 1 0 0 1 1 1v10" />  <path d="M14 15v2a1 1 0 0 1 -1 1h-7l-3 3v-10a1 1 0 0 1 1 -1h2" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-lg font-semibold">{{ $totalPublicaciones }}</p>
                        <p class="text-sm">Nuevos comentarios</p>
                    </div>
                </div>
                <!-- Nuevas reservas -->
                <div class="flex items-center p-4 rounded-lg shadow-xs bg-blue-500 text-white">
                    <div class="p-3 mr-4 rounded-full bg-white text-blue-500">
                        <svg class="h-8 w-8 text-blue-500"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-lg font-semibold">24</p>
                        <p class="text-sm">Nuevas reservas</p>
                    </div>
                </div>
                <!-- Contactos pendientes -->
                <div class="flex items-center p-4 rounded-lg shadow-xs bg-teal-500 text-white">
                    <div class="p-3 mr-4 rounded-full bg-white text-teal-500">
                        <svg class="h-8 w-8 text-teal-500"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
                          </svg>
                    </div>
                    <div>
                        <p class="text-lg font-semibold">2</p>
                        <p class="text-sm">Contactos pendientes</p>
                    </div>
                </div>
            </div>

            <!-- Tareas y estadísticas -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

            <div x-data="taskManager()" class="bg-white rounded-lg shadow-md p-4">
            <div class="flex items-center justify-between">
    <!-- Título -->
    <h2 class="text-xl font-bold text-grape-450">Tareas</h2>
    <!-- Botón pequeño y circular con icono más ajustado -->
    <button 
        @click="showAddTask = true" 
        class="bg-teal-500 text-white p-2 rounded-full shadow hover:bg-teal-600 ml-auto flex items-center justify-center">
        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path fill="currentColor" d="M12 2v10h10v2H12v10h-2V14H0v-2h10V2h2z" />
        </svg>
    </button>
</div>


    <hr class="my-2 border-t-3 border-grape-750">

    <!-- Modal para agregar/editar tareas -->
    <div 
        x-show="showAddTask" 
        class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50 z-50"
        x-cloak>
        <div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
            <h3 class="text-lg font-semibold mb-4" x-text="isEditing ? 'Editar Tarea' : 'Nueva Tarea'"></h3>
            <input 
                type="text" 
                x-model="taskInput" 
                placeholder="Escribe la tarea aquí..." 
                class="border border-gray-300 rounded p-2 w-full mb-4">
            <div class="flex justify-end space-x-2">
                <button 
                    @click="cancelTask" 
                    class="bg-gray-300 text-gray-700 px-3 py-1 rounded hover:bg-gray-400">
                    Cancelar
                </button>
                <button 
                    @click="saveTask" 
                    class="bg-teal-500 text-white px-3 py-1 rounded hover:bg-teal-600">
                    Guardar
                </button>
            </div>
        </div>
    </div>

    <!-- Lista de tareas -->
    <ul class="space-y-2 mt-4">
        <template x-for="(task, index) in tasks" :key="index">
            <li class="flex justify-between items-center">
                <div class="flex items-center">
                    <!-- Checkbox para marcar como completado -->
                    <input 
                        type="checkbox" 
                        class="mr-2 rounded text-teal-500 focus:ring-teal-400" 
                        x-model="task.completed">
                    <span 
                        :class="task.completed ? 'line-through text-gray-500' : ''"
                        x-text="task.text">
                    </span>
                </div>
                <!-- Botones para editar y eliminar -->
                <div class="flex space-x-2">
    <!-- Botón de Editar con icono -->
    <button 
        @click="editTask(index)" 
        class="text-teal-500 text-sm hover:underline flex items-center">
        <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path fill="currentColor" d="M4 21q-.425 0-.712-.288T3 20v-2.425q0-.4.15-.763t.425-.637L16.2 3.575q.3-.275.663-.425t.762-.15t.775.15t.65.45L20.425 5q.3.275.437.65T21 6.4q0 .4-.138.763t-.437.662l-12.6 12.6q-.275.275-.638.425t-.762.15zM17.6 7.8L19 6.4L17.6 5l-1.4 1.4z" />
        </svg>
        
    </button>
    
    <!-- Botón de Eliminar con icono -->
    <button 
        @click="deleteTask(index)" 
        class="text-red-500 text-sm hover:underline flex items-center">
        <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path fill="currentColor" d="M7 21q-.825 0-1.412-.587T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.587 1.413T17 21zm2-4h2V8H9zm4 0h2V8h-2z" />
        </svg>
        
    </button>
</div>

            </li>
        </template>
    </ul>
</div>



            <!-- Estadísticas -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl text-grape-450 font-bold mb-6">Estadísticas</h2>
            <div class="grid grid-cols-2 gap-4">
            <!-- Ingresos del día -->
            <div class="flex items-center space-x-3">
                <span class="text-3xl text-teal-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c1.657 0 3-1.343 3-3S13.657 2 12 2 9 3.343 9 5s1.343 3 3 3zm0 0v6m0 0l3.09 3.09M12 14l-3.09 3.09" />
                    </svg>
                </span>
                <div>
                    <p class="text-sm font-bold text-teal-600">$254.00</p>
                    <p class="text-gray-600">Ingresos del día</p>
                </div>
            </div>
            <!-- Productos vendidos -->
            <div class="flex items-center space-x-3">
                <span class="text-3xl text-teal-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h18M9 3v18m6-18v18m-6 6h6m-3-3h-3m3-6h3m-3-6h-3m0 3h-3" />
                    </svg>
                </span>
                <div>
                    <p class="text-sm font-bold text-teal-600">167</p>
                    <p class="text-gray-600">Productos vendidos</p>
                </div>
            </div>
            <!-- Reservas canceladas -->
            <div class="flex items-center space-x-3">
                <span class="text-3xl text-red-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16m-2 2v6m-8 0h6m2-6h-6m-6 0v6h6" />
                    </svg>
                </span>
                <div>
                    <p class="text-sm font-bold text-red-600">13</p>
                    <p class="text-gray-600">Reservas canceladas</p>
                </div>
            </div>
            <!-- Total de pedidos -->
            <div class="flex items-center space-x-3">
                <span class="text-3xl text-teal-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h18M9 3v18m6-18v18m-6 6h6m-3-3h-3m3-6h3m-3-6h-3m0 3h-3" />
                    </svg>
                </span>
                <div>
                    <p class="text-sm font-bold text-teal-600">183</p>
                    <p class="text-gray-600">Total de pedidos</p>
                </div>
            </div>
        </div>
    </div>

           {{--
            <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
                <!-- Card -->
                <div class="flex items-center p-4 rounded-lg shadow-xs bg-gray-800">
                    <div class="p-3 mr-4 rounded-full text-orange-100 bg-orange-500">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <p class="mb-2 text-sm font-medium text-gray-400">
                            Usuarios totales
                        </p>
                        <p class="text-lg font-semibold text-gray-200">
                            {{ $totalUsers }}
                        </p>
                    </div>
                </div>
                <!-- Card -->
                <div class="flex items-center p-4 rounded-lg shadow-xs bg-gray-800">
                    <div class="p-3 mr-4 rounded-full text-green-100 bg-green-500">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="mb-2 text-sm font-medium text-gray-400">
                            Balance
                        </p>
                        <p class="text-lg font-semibold text-gray-200">
                            {{ $totalPrecio}}
                        </p>
                    </div>
                </div>
                <!-- Card -->
                <div class="flex items-center p-4 rounded-lg shadow-xs bg-gray-800">
                    <div class="p-3 mr-4 rounded-full text-blue-100 bg-blue-500">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <p class="mb-2 text-sm font-medium text-gray-400">
                            New sales
                        </p>
                        <p class="text-lg font-semibold text-gray-200">
                            En Mantenimiento ⚠️
                        </p>
                    </div>
                </div>
                <!-- Card -->
                <div class="flex items-center p-4 rounded-lg shadow-xs bg-gray-800">
                    <div class="p-3 mr-4 rounded-full text-teal-100 bg-teal-500">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="mb-2 text-sm font-medium text-gray-400">
                            Pending contacts
                        </p>
                        <p class="text-lg font-semiboldtext-gray-200">
                            {{ $totalPublicaciones }}
                        </p>
                    </div>
                </div>
            </div>--}}
        </div>
    </main>




<script>
    function taskManager() {
        return {
            tasks: [
                { text: 'Publicar el anuncio de fin de año en el foro', completed: false },
                { text: 'Llamar al técnico para la computadora número 4', completed: false },
                { text: 'Pedir más sobres al proveedor', completed: false },
                { text: 'Revisar los formularios de contacto del día de hoy', completed: false }
            ],
            showAddTask: false,
            isEditing: false,
            taskInput: '',
            editIndex: null,

            // Mostrar el modal para agregar/editar tareas
            editTask(index) {
                this.taskInput = this.tasks[index].text;
                this.isEditing = true;
                this.editIndex = index;
                this.showAddTask = true;
            },

            // Guardar nueva tarea o cambios
            saveTask() {
                if (this.taskInput.trim()) {
                    if (this.isEditing) {
                        this.tasks[this.editIndex].text = this.taskInput.trim();
                    } else {
                        this.tasks.push({ text: this.taskInput.trim(), completed: false });
                    }
                    this.resetTaskModal();
                }
            },

            // Cancelar acción en el modal
            cancelTask() {
                this.resetTaskModal();
            },

            // Eliminar tarea
            deleteTask(index) {
                this.tasks.splice(index, 1);
            },

            // Resetear valores del modal
            resetTaskModal() {
                this.taskInput = '';
                this.isEditing = false;
                this.editIndex = null;
                this.showAddTask = false;
            }
        };
    }
</script>


@endsection
