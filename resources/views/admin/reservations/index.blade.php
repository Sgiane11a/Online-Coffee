@extends('layouts.admin')

@section('main')
<main class="h-full overflow-y-auto bg-gray-100">
    <div class="container px-6 mx-auto grid mt-4">
        
        <!-- Encabezado con filtros y botones -->
        <div class="flex flex-col lg:flex-row justify-between items-center gap-6 mb-6 bg-white p-6 rounded-lg shadow-md">
            <!-- Filtros -->
            <form id="filters-form" method="GET" action="{{ route('admin.reservations.index') }}" class="flex flex-wrap gap-4 w-full lg:w-auto">
                <!-- Filtro por Nombre de Usuario -->
                <div class="flex-1">
                    <label for="user_name" class="block text-sm font-medium text-gray-700 mb-1">Buscar por Usuario:</label>
                    <input type="text" name="user_name" id="user_name" value="{{ request('user_name') }}"
                        class="w-full px-4 py-2 rounded-lg bg-gray-50 text-gray-700 border-gray-300 focus:border-indigo-500 focus:outline-none" 
                        placeholder="Nombre del usuario">
                </div>

                <!-- Filtro por Fecha -->
                <div class="flex-1">
                    <label for="start_date" class="block text-sm font-medium text-gray-700 mb-1">Fecha de Reserva:</label>
                    <input type="date" name="start_date" id="start_date" value="{{ request('start_date') }}"
                        class="w-full px-4 py-2 rounded-lg bg-gray-50 text-gray-700 border-gray-300 focus:border-indigo-500 focus:outline-none">
                </div>

                <!-- Botón de Filtrar -->
                <button type="submit" 
                    class="px-6 py-3 rounded-lg bg-blue-500 text-white hover:bg-blue-600 shadow-md">
                    Filtrar
                </button>
            </form>

        </div>

        <!-- Tabla de Reservas -->
        <div class="w-full overflow-hidden rounded-lg shadow-md bg-white">
            <div class="w-full overflow-x-auto">
                <table class="w-full text-sm text-gray-700">
                    <thead>
                        <tr class="text-left uppercase tracking-wide border-b border-gray-300">
                            <th class="px-4 py-3">Usuario</th>
                            <th class="px-4 py-3">Tipo</th>
                            <th class="px-4 py-3">Nombre</th>
                            <th class="px-4 py-3">Fecha</th>
                            <th class="px-4 py-3">Hora Inicio</th>
                            <th class="px-4 py-3">Hora Fin</th>
                            <th class="px-4 py-3">Estado</th>
                            <th class="px-4 py-3">Editar</th>
                            <th class="px-4 py-3">Cancelar</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200">
                        @forelse ($reservations as $reservation)
                        <tr class="hover:bg-gray-50">
                            <!-- Usuario -->
                            <td class="px-4 py-4 text-sm">{{ $reservation->user->name ?? 'No disponible' }}</td>
                            
                            <!-- Tipo de Reservable -->
                            <td class="px-4 py-4 text-sm">
                                @if($reservation->reservable_type == 'App\Models\Equipo')
                                    Equipo
                                @elseif($reservation->reservable_type == 'App\Models\Cubiculo')
                                    Cubículo
                                @else
                                    Desconocido
                                @endif
                            </td>

                            <!-- Nombre del Reservable -->
                            <td class="px-4 py-4 text-sm">{{ $reservation->reservable->nombre ?? 'No disponible' }}</td>

                            <!-- Fecha -->
                            <td class="px-4 py-4 text-sm">
                                {{ \Carbon\Carbon::parse($reservation->reserved_at)->format('d/m/Y') }}
                            </td>

                            <!-- Hora Inicio -->
                            <td class="px-4 py-4 text-sm">
                                {{ \Carbon\Carbon::parse($reservation->reserved_at)->format('H:i') }}
                            </td>

                            <!-- Hora Fin -->
                            <td class="px-4 py-4 text-sm">
                                {{ $reservation->due_date ? \Carbon\Carbon::parse($reservation->due_date)->format('H:i') : 'N/A' }}
                            </td>

                            <!-- Estado -->
                            <td class="px-4 py-4 text-sm">{{ $reservation->status }}</td>

                            <!-- Botón de Editar -->
                            <td class="px-4 py-4 text-sm">
                                <a href="{{ route('admin.reservations.edit', $reservation->id) }}" 
                                class="text-yellow-600 hover:text-yellow-700 p-2 rounded-md">
                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path fill="currentColor" d="M4 21q-.425 0-.712-.288T3 20v-2.425q0-.4.15-.763t.425-.637L16.2 3.575q.3-.275.663-.425t.762-.15t.775.15t.65.45L20.425 5q.3.275.437.65T21 6.4q0 .4-.138.763t-.437.662l-12.6 12.6q-.275.275-.638.425t-.762.15zM17.6 7.8L19 6.4L17.6 5l-1.4 1.4z" />
                                    </svg>
                                </a>
                            </td>

                            <!-- Botón de Cancelar -->
                            <td class="px-4 py-4 text-sm">
                                <form action="{{ route('admin.reservations.destroy', $reservation->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-700 p-2 rounded-md">
                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <path fill="currentColor" d="M7 21q-.825 0-1.412-.587T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.587 1.413T17 21zm2-4h2V8H9zm4 0h2V8h-2z" />
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9" class="px-4 py-4 text-center text-gray-600">No se encontraron reservas.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="px-4 py-3 font-medium tracking-wide text-gray-600 uppercase border-t bg-gray-100">
                {{ $reservations->links() }}
            </div>
        </div>
    </div>
</main>
@endsection
