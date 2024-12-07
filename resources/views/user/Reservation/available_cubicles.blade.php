<h2>Cubículos Disponibles</h2>
@foreach($cubiculosDisponibles as $cubiculo)
    <div class="cubiculo">
        <img src="{{ $cubiculo->image_url }}" alt="Imagen de {{ $cubiculo->nombre }}">
        <h3>{{ $cubiculo->nombre }}</h3>
        <p>{{ $cubiculo->descripcion }}</p>
        <form action="{{ route('reservations.store') }}" method="POST">
            @csrf
            <input type="hidden" name="reservable_id" value="{{ $cubiculo->id }}">
            <input type="hidden" name="reservable_type" value="App\Models\Cubiculo">
            <label for="reserved_at">Fecha de Reserva:</label>
            <input type="datetime-local" name="reserved_at" required>
            <button type="submit">Reservar</button>
        </form>
    </div>
@endforeach
