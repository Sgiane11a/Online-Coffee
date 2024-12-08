@section('content')
<h2>Editar Reserva</h2>

<form action="{{ route('reservations.update', $reservation->id) }}" method="POST">
    @csrf
    @method('PUT')
 
    <label for="reserved_at_date">Fecha de Reserva:</label>
    <input type="date" id="reserved_at_date" name="reserved_at_date" value="{{ \Carbon\Carbon::parse($reservation->reserved_at)->format('Y-m-d') }}" required>
    
    <label for="reserved_at_time">Hora de Inicio:</label>
    <input type="time" id="reserved_at_time" name="reserved_at_time" value="{{ \Carbon\Carbon::parse($reservation->reserved_at)->format('H:i') }}" required>

    <label for="due_date_time">Hora de Vencimiento:</label>
    <input type="time" id="due_date_time" name="due_date_time" value="{{ $reservation->due_date ? \Carbon\Carbon::parse($reservation->due_date)->format('H:i') : '' }}">

    <button type="submit">Actualizar</button>
</form>


