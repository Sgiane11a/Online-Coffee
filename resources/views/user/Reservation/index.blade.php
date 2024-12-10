{{--RESERVA USUARIO--}} 

<x-app-layout>


{{--Encabezado--}} 
<section class="relative bg-cover h-50 sm:h-60 md:h-[270px]" style="background-image: url('{{ asset('images/RESERVAS.png') }}');">
    <div class="absolute inset-0 bg-black opacity-0"></div> <!-- Filtro oscuro encima del fondo -->
    <div class="relative z-10 flex flex-col sm:flex-row items-center justify-between px-6 py-9 max-w-5xl mx-auto">
        
        <!-- Contenedor del Título -->
        <div class="flex-1 text-center mb-4 sm:mb-0">
            <h1 class="text-4xl sm:text-5xl md:text-7xl font-bold text-white titulo0">Reserva</h1>
        </div>

        <!-- Descripción y botón -->
        <div class="text-center sm:text-left sm:w-96 sm:pl-12">
            <p class="text-black text-base sm:text-lg md:text-xl">Reserva herramientas y espacios para complementar tus estudios con un solo clic.</p>
            <div class="mt-4">
                <x-auth-header-button url="{{ route('login') }}" text="Comienza aquí" />
            </div>
        </div>
        
    </div>
</section>

{{--Encabezado --}} 


<form action="{{ route('buscar.reservas') }}" method="POST" class="max-w-lg mx-auto p-6 border-2 border-gray-300 rounded-lg bg-white shadow-lg mt-8">
    @csrf
    <div class="space-y-4">
        <div>
            <label for="tipo_reserva" class="block text-gray-700 font-semibold">Tipo de reserva:</label>
            <select name="tipo_reserva" id="tipo_reserva" class="w-full p-2 border border-gray-300 rounded-md">
                <option value="">Seleccione</option>
                <option value="computadora">Computadora</option>
                <option value="laptop">Laptop</option>
                <option value="cubiculo">Cubículo</option>
            </select>
        </div>

        <div>
            <label for="fecha_reserva" class="block text-gray-700 font-semibold">Fecha:</label>
            <input type="date" name="fecha_reserva" id="fecha_reserva" required class="w-full p-2 border border-gray-300 rounded-md">
        </div>

        <div>
            <label for="hora_reserva" class="block text-gray-700 font-semibold">Hora:</label>
            <input type="time" name="hora_reserva" id="hora_reserva" required class="w-full p-2 border border-gray-300 rounded-md">
        </div>

        <button type="submit" class="w-full py-2 bg-purple-700 text-white font-bold rounded-md hover:bg-purple-600 transition-colors">Buscar</button>
    </div>
</form>
 {{-----}}
 @if(isset($equiposDisponibles) && $equiposDisponibles->isNotEmpty())
    <h3 class="text-xl font-semibold mb-4">Equipos Disponibles</h3>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($equiposDisponibles as $equipo)
            <div class="border p-4 rounded-lg shadow-lg bg-white">
                <img src="{{ $equipo->image_public_id }}" alt="{{ $equipo->nombre }}" class="w-full h-40 object-cover mb-4 rounded-lg">
                <h4 class="text-lg font-semibold">{{ $equipo->nombre }}</h4>
                <p class="text-gray-600">{{ $equipo->descripcion }}</p>
                <form action="{{ route('reservations.store') }}" method="POST" class="mt-4">
                    @csrf
                    <input type="hidden" name="reservable_id" value="{{ $equipo->id }}">
                    <input type="hidden" name="reservable_type" value="App\Models\Equipo">
                    <input type="hidden" name="reserved_at" value="{{ $fechaReserva }}">
                    <button type="submit" class="w-full py-2 bg-purple-700 text-white font-bold rounded-md hover:bg-purple-600 transition-colors">Reservar</button>
                </form>
            </div>
        @endforeach
    </div>
@endif
{{----}}
        
    @if(isset($cubiculosDisponibles) && $cubiculosDisponibles->isNotEmpty())
        <h3>Cubículos Disponibles</h3>
    @foreach($cubiculosDisponibles as $cubiculo)
        <div>
            <img src="{{ $cubiculo->image_public_id }}" alt="{{ $cubiculo->nombre }}">
            <h4>{{ $cubiculo->nombre }}</h4>
            <p>{{ $cubiculo->descripcion }}</p>
            <form action="{{ route('reservations.store') }}" method="POST">
                @csrf
                <input type="hidden" name="reservable_id" value="{{ $cubiculo->id }}">
                <input type="hidden" name="reservable_type" value="App\Models\Cubiculo">
                <input type="hidden" name="reserved_at" value="{{ $fechaReserva }}">
                <button type="submit">Reservar</button>
            </form>
        </div>
    @endforeach
    @endif


    <section>
        @if(isset($reservas) && $reservas->isNotEmpty())
            <h2 class="text-2xl font-semibold mb-4">Mis Reservas</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full table-auto border-collapse">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="py-2 px-4 border text-left">Tipo de Reserva</th>
                            <th class="py-2 px-4 border text-left">Nombre del Elemento</th>
                            <th class="py-2 px-4 border text-left">Fecha de Reserva</th>
                            <th class="py-2 px-4 border text-left">Hora de Inicio</th>
                            <th class="py-2 px-4 border text-left">Hora de Fin</th>
                            <th class="py-2 px-4 border text-left">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reservas as $reserva)
                            <tr>
                                <td class="py-2 px-4 border">{{ $reserva->reservable_type == 'App\Models\Equipo' ? 'Equipo' : 'Cubículo' }}</td>
                                <td class="py-2 px-4 border">{{ $reserva->reservable->nombre }}</td>
                                <td class="py-2 px-4 border">{{ \Carbon\Carbon::parse($reserva->reserved_at)->format('d-m-Y') }}</td>
                                <td class="py-2 px-4 border">{{ \Carbon\Carbon::parse($reserva->reserved_at)->format('H:i') }}</td>
                                <td class="py-2 px-4 border">{{ $reserva->due_date ? \Carbon\Carbon::parse($reserva->due_date)->format('H:i') : 'N/A' }}</td>
                                <td class="py-2 px-4 border">
                                    <a href="{{ route('reservations.edit', $reserva->id) }}" class="text-blue-500 hover:underline">Modificar</a>
                                    <form action="{{ route('reservations.destroy', $reserva->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:underline ml-2">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="text-center text-gray-600">No tienes reservas en este momento.</p>
        @endif
    </section>
    

</x-app-layout>


    
    





<style>

    /* stylo*/
    .descripcion0 {
    margin-top: 10px;
    color: #000000;
    max-width: 500px; /* Reducir el ancho máximo */
    padding-right: 5px; /* Controla la cantidad de espacio a la derecha */
    padding: 30px;
}



/* Título dentro del encabezado */
.titulo0 {
    position: relative;
    background: #ffffff;
    padding: 25px 50px;
    border-radius: 8px;
    display: inline-block;

    font-weight: bolder;
    color: #B4198B;
    margin-bottom: 100px;
    box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.2);
}

.titulo0::before {
    content: '';
    position: absolute;
    top: 10px;
    left: -15px;
    width: 100%;
    height: 100%;
    background: #B4198B;
    z-index: -1;
    border-radius: 8px;
    transform: translate(-5%, 5%);
}

.cate{
    margin-bottom: 10px;
}




form {
    background-color: #ffffff;
}

form button {
    background-color: #B4198B;
}

form button:hover {
    background-color: #7B1FA2;
}

.descripcion0 {
    margin-top: 10px;
    color: #000000;
    max-width: 500px;
    padding-right: 5px;
    padding: 30px;
}

.titulo0 {
    background: #ffffff;
    padding: 25px 50px;
    border-radius: 8px;
    font-weight: bolder;
    color: #B4198B;
    box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.2);
}


</style>