<h2>Computadoras Disponibles</h2>
@foreach($computadorasDisponibles as $computadora)
    <div class="equipo">
        <img src="{{ $computadora->image_url }}" alt="Imagen de {{ $computadora->nombre }}">
        <h3>{{ $computadora->nombre }}</h3>
        <p>{{ $computadora->descripcion }}</p>
        <form action="{{ route('reservations.store') }}" method="POST">
            @csrf
            <input type="hidden" name="reservable_id" value="{{ $computadora->id }}">
            <input type="hidden" name="reservable_type" value="App\Models\Equipo">
            <label for="reserved_at">Fecha de Reserva:</label>
            <input type="datetime-local" name="reserved_at" required>
            <button type="submit">Reservar</button>
        </form>
    </div>
@endforeach

<h2>Otros Equipos Disponibles</h2>
@foreach($equiposDisponibles as $equipo)
    <div class="equipo">
        <img src="{{ $equipo->image_url }}" alt="Imagen de {{ $equipo->nombre }}">
        <h3>{{ $equipo->nombre }}</h3>
        <p>{{ $equipo->descripcion }}</p>
        <form action="{{ route('reservations.store') }}" method="POST">
            @csrf
            <input type="hidden" name="reservable_id" value="{{ $equipo->id }}">
            <input type="hidden" name="reservable_type" value="App\Models\Equipo">
            <label for="reserved_at">Fecha de Reserva:</label>
            <input type="datetime-local" name="reserved_at" required>
            <button type="submit">Reservar</button>
        </form>
    </div>
@endforeach
