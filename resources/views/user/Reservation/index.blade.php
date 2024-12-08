<x-app-layout>
    <div class="container-imagen0">
        {{--Encabezado(Logo)--}}
        <section class="relative text-left bg-cover h-50 sm:h-60 md:h-[270px]" style="background-image: url('{{ asset('images/RESERVAS.png') }}');">
            <div class="absolute inset-0 "></div> <!-- Filtro oscuro encima del fondo -->
            <div class="relative z-10 flex flex-col gap-4 px-4 py-8 max-w-3xl mx-auto text-center">
                <h1 class="text-4xl sm:text-5xl md:text-6xl text-grape-350  font-extrabold leading-tight titulo0">Reservas</h1>
                <p class="text-lg sm:text-xl text-BLACK max-w-lg mx-auto">Reserva herramientas y espacios para complementar tus estudios con un solo clic.</p>
            </div>
        </section>
    </div>
    
    <form action="{{ route('buscar.reservas') }}" method="POST">
        @csrf
        <label for="tipo_reserva">Tipo de reserva:</label>
        <select name="tipo_reserva" id="tipo_reserva">
            <option value="">Seleccione</option>
            <option value="computadora">Computadora</option>
            <option value="laptop">Laptop</option>
            <option value="cubiculo">Cubículo</option>
        </select>
        
        <label for="fecha_reserva">Fecha:</label>
        <input type="date" name="fecha_reserva" id="fecha_reserva" required>
            
        <label for="hora_reserva">Hora:</label>
        <input type="time" name="hora_reserva" id="hora_reserva" required>

        <button type="submit">Buscar</button>
    </form>
        
    @if(isset($equiposDisponibles) && $equiposDisponibles->isNotEmpty())
        <h3>Equipos Disponibles</h3>
    @foreach($equiposDisponibles as $equipo)
        <div>
            <img src="{{ $equipo->image_public_id }}" alt="{{ $equipo->nombre }}">
            <h4>{{ $equipo->nombre }}</h4>
            <p>{{ $equipo->descripcion }}</p>
            <form action="{{ route('reservations.store') }}" method="POST">
                @csrf
                <input type="hidden" name="reservable_id" value="{{ $equipo->id }}">
                <input type="hidden" name="reservable_type" value="App\Models\Equipo">
                <input type="hidden" name="reserved_at" value="{{ $fechaReserva }}">
                <button type="submit">Reservar</button>
            </form>
        </div>
    @endforeach
    @endif
        
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
        <h2>Mis Reservas</h2>
        <table>
            <thead>
                <tr>
                    <th>Tipo de Reserva</th>
                    <th>Nombre del Elemento</th>
                    <th>Fecha de Reserva</th>
                    <th>Hora de Inicio</th>
                    <th>Hora de Fin</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reservas as $reserva)
                <tr>
                    <td>
                        @if($reserva->reservable_type == 'App\Models\Equipo')
                            Equipo
                        @elseif($reserva->reservable_type == 'App\Models\Cubiculo')
                            Cubículo
                        @endif
                    </td>
                    <td>{{ $reserva->reservable->nombre }}</td>
                    <td>{{ \Carbon\Carbon::parse($reserva->reserved_at)->format('d-m-Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($reserva->reserved_at)->format('H:i') }}</td>
                    <td>
                        @if($reserva->due_date)
                            {{ \Carbon\Carbon::parse($reserva->due_date)->format('H:i') }}
                        @else
                            N/A
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('reservations.edit', $reserva->id) }}">Modificar</a>
                        <form action="{{ route('reservations.destroy', $reserva->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <p>No tienes reservas en este momento.</p>
        @endif
    </section>

</x-app-layout>


    
    