<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Models\Equipo;
use App\Models\Cubiculo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Carbon\Carbon;

class ReservationController extends Controller
{
    // Vista para usuarios no autenticados
    public function ReservationsPage()
    {
        return view('reservaciones'); // Muestra vista solo informativa
    }

    // Vista de reservas para usuarios autenticados
    public function index() {
    $reservas = Reservation::where('user_id', auth()->id())
        ->with('reservable') // Carga la relación polimórfica
        ->get();

    return view('user.reservation.index', compact('reservas'));
    }

    // Método para buscar y mostrar reservas disponibles según tipo, fecha y hora
    public function buscarReservas(Request $request) {
        $request->validate([
            'tipo_reserva' => 'required',
            'fecha_reserva' => 'required|date',
            'hora_reserva' => 'required',
        ]);
        
        $tipoReserva = $request->tipo_reserva;
        $fechaReserva = $request->fecha_reserva . ' ' . $request->hora_reserva;

        $userId = auth()->id();
        $reservas = Reservation::where('user_id', $userId)
            ->with('reservable') // Carga la relación polimórfica
            ->get();
            
        if ($tipoReserva == 'computadora' || $tipoReserva == 'laptop') {
            $equiposDisponibles = Equipo::where('tipo', $tipoReserva)
                ->whereNotIn('id', function ($query) use ($fechaReserva) {
                    $query->select('reservable_id')
                        ->from('reservations')
                        ->where('reserved_at', '<=', $fechaReserva)
                        ->where('due_date', '>=', $fechaReserva);
                })
                ->get();

            return view('user.reservation.index', compact('equiposDisponibles', 'fechaReserva'));
        }
        
        if ($tipoReserva == 'cubiculo') {
            $cubiculosDisponibles = Cubiculo::whereNotIn('id', function ($query) use ($fechaReserva) {
                $query->select('reservable_id')
                    ->from('reservations')
                    ->where('reserved_at', '<=', $fechaReserva)
                    ->where('due_date', '>=', $fechaReserva);
            })->get();
            
            return view('user.reservation.index', compact('cubiculosDisponibles', 'fechaReserva'));
        }
        
        return view('user.reservation.index');
    }


    // Editar una reserva
    public function edit(Reservation $reservation) {
    // Verificar si la reserva pertenece al usuario
    if ($reservation->user_id !== auth()->id()) {
        abort(403, 'No tienes permiso para modificar esta reserva.');
    }

    return view('user.reservation.edit', compact('reservation'));
    }
    
    
    public function update(Request $request, $id) {
        
        $reservation = Reservation::findOrFail($id);
        
        // Obtiene la fecha y hora por separado
        $reserved_at_date = $request->input('reserved_at_date');
        $reserved_at_time = $request->input('reserved_at_time');
    
        // Combina la fecha y la hora para obtener el timestamp completo
        $reserved_at = Carbon::parse($reserved_at_date . ' ' . $reserved_at_time);

        // Si se proporciona la hora de vencimiento, combina también
        $due_date_time = $request->input('due_date_time');
        $due_date = $due_date_time ? Carbon::parse($reserved_at_date . ' ' . $due_date_time) : null;

        // Actualiza la reserva
        $reservation->reserved_at = $reserved_at;
        $reservation->due_date = $due_date;
        
        $reservation->save();
        
        return redirect()->route('reservations.index')->with('success', 'Reserva actualizada correctamente.');
    }


    // Eliminar una reserva
    public function destroy(Reservation $reservation) {
    if ($reservation->user_id !== auth()->id()) {
        abort(403, 'No tienes permiso para eliminar esta reserva.');
    }

    $reservation->delete();

    return redirect()->route('reservations.index')->with('success', 'Reserva eliminada correctamente.');
    }

    // Crear una reserva
    public function store(Request $request)
    {
        $request->validate([
            'reservable_id' => 'required|integer', // Puede ser equipo o cubículo
            'reservable_type' => 'required|in:App\Models\Equipo,App\Models\Cubiculo', // Tipo de reservable ('App\Models\Equipo' o 'App\Models\Cubiculo')
            'reserved_at' => 'required|date',
            'due_date' => 'nullable|date',
        ]);

        $reservation = new Reservation();
        $reservation->user_id = auth()->id();
        $reservation->reservable_id = $request->reservable_id;
        $reservation->reservable_type = $request->reservable_type;
        $reservation->reserved_at = $request->reserved_at;
        $reservation->due_date = $request->due_date;
        $reservation->save();

        return redirect()->route('reservations.index');
    }
}
