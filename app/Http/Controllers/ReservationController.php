<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Models\Equipo;
use App\Models\Cubiculo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ReservationController extends Controller
{
    // Vista para usuarios no autenticados
    public function ReservationsPage()
    {
        return view('reservaciones'); // Muestra vista solo informativa
    }

    // Vista de reservas para usuarios autenticados
    public function index()
    {
        $reservas = auth()->user()->reservation()->with('reservable')->get();
        return view('user.reservation.index', compact('reservas'));
    }

    // Método para buscar y mostrar reservas disponibles según tipo, fecha y hora
    public function buscarReservas(Request $request)
    {
        $tipoReserva = $request->input('tipo_reserva');
        $fechaReserva = $request->input('fecha_reserva') . ' ' . $request->input('hora_reserva') . ':00'; // Fecha completa con hora

        $equiposDisponibles = null;
        $cubiculosDisponibles = null;

        // Buscar computadoras o laptops disponibles
        if ($tipoReserva == 'computadora' || $tipoReserva == 'laptop') {
            $equiposDisponibles = Equipo::where('type', $tipoReserva)
                ->where('disponible', true)
                ->whereDoesntHave('reservas', function ($query) use ($fechaReserva) {
                    $query->where('reserved_at', $fechaReserva); // Solo no mostrar equipos ya reservados en la fecha seleccionada
                })
                ->get();
        }

        // Buscar cubículos disponibles
        if ($tipoReserva == 'cubiculo') {
            $cubiculosDisponibles = Cubiculo::where('disponible', true)
                ->whereDoesntHave('reservas', function ($query) use ($fechaReserva) {
                    $query->where('reserved_at', $fechaReserva); // Solo no mostrar cubículos ya reservados
                })
                ->get();
        }

        // Pasar las variables a la vista
        return view('user.reservation.index', compact('equiposDisponibles', 'cubiculosDisponibles', 'fechaReserva'));
    }

    // Mostrar equipos disponibles para hacer reservas
    public function showAvailableEquipments()
    {
        $computadorasDisponibles = Equipo::where('type', 'computadora')
            ->where('disponible', true)  // Solo los disponibles
            ->get();

        $laptopsDisponibles = Equipo::where('type', 'laptop')
            ->where('disponible', true)
            ->get();

        return view('user.reservation.available', compact('computadorasDisponibles', 'laptopsDisponibles'));
    }

    // Mostrar cubículos disponibles para hacer reservas
    public function showAvailableCubicles()
    {
        $cubiculosDisponibles = Cubiculo::where('disponible', true)->get(); // Asegúrate de tener un campo 'disponible'

        return view('user.reservation.available_cubicles', compact('cubiculosDisponibles'));
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
