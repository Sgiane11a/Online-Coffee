<!--HISTORIAL EN MANTENIMIENTO-->


<h2>Mis Reservas</h2>

@if(isset($reservas) && $reservas->isNotEmpty())
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