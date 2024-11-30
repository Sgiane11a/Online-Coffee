<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ReservationController extends Controller
{
    /**
     * Muestra las reservas del usuario autenticado.
     */
    public function index()
    {
        // Obtiene las reservas del usuario actual
        $reservations = Reservation::whereHasMorph('reservable', '*', function ($query) {
            $query->where('user_id', Auth::id());
        })->get();

        return view('user.reservation', compact('reservations'));
    }

    /**
     * Muestra el formulario para crear una nueva reserva.
     */
    public function create()
    {
        return view('reservations.create');
    }

    /**
     * Almacena una nueva reserva en la base de datos.
     */
    public function store(Request $request)
    {
        // Validación de datos
        $validated = $request->validate([
            'reservable_id' => 'required|integer',
            'reservable_type' => 'required|string',
            'reserved_at' => 'required|date|after_or_equal:today',
            'due_date' => 'required|date|after:reserved_at',
            'day_of_week' => 'required|integer|between:0,6', // 0: Domingo, 6: Sábado
        ]);

        // Creación de la reserva
        Reservation::create($validated);

        return redirect()->route('reservations.index')->with('success', 'Reserva creada exitosamente.');
    }

    /**
     * Muestra las reservas disponibles para usuarios no autenticados.
     */
    public function guestindex()
    {
        // Obtiene todas las reservas disponibles (modifica según lógica)
        $reservations = Reservation::all();

        return view('reservaciones', compact('reservations'));
    }

    /**
     * (Opcional) Elimina una reserva existente.
     */
    public function destroy(Reservation $reservation)
    {
        if (!Gate::allows('delete', $reservation)) {
            abort(403, 'No tienes permiso para eliminar esta reserva.');
        }
    
        $reservation->delete();

        return redirect()->route('reservations.index')->with('success', 'Reserva eliminada exitosamente.');
    }
}

?>
