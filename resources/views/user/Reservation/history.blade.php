<h2>Mis Reservas</h2>

@if($reservas->isEmpty())
    <p>No tienes reservas en este momento.</p>
@else
    <table>
        <thead>
            <tr>
                <th>Tipo de Reserva</th>
                <th>Nombre del Elemento</th>
                <th>Fecha de Reserva</th>
                <th>Fecha de Vencimiento</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reservas as $reserva)
                <tr>
                    <td>
                        @if($reserva->reservable_type == 'App\Models\Equipo')
                            {{ $reserva->reservable->type }}
                        @elseif($reserva->reservable_type == 'App\Models\Cubiculo')
                            Cubículo
                        @endif
                    </td>
                    <td>{{ $reserva->reservable->nombre }}</td>
                    <td>{{ $reserva->reserved_at->format('d-m-Y H:i') }}</td>
                    <td>
                        @if($reserva->due_date)
                            {{ $reserva->due_date->format('d-m-Y H:i') }}
                        @else
                            N/A
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('reservas.edit', $reserva->id) }}">Modificar</a>
                        <form action="{{ route('reservas.destroy', $reserva->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif