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

<form action="{{ route('buscar.reservas') }}" method="POST">
    @csrf
    <label for="tipo_reserva">Tipo de reserva:</label>
    <select name="tipo_reserva" id="tipo_reserva">
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

@if(isset($equiposDisponibles))
    <h3>Equipos Disponibles</h3>
    @foreach($equiposDisponibles as $equipo)
        <div>
            <img src="{{ $equipo->image_url }}" alt="{{ $equipo->nombre }}">
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
</x-app-layout>    


    
    