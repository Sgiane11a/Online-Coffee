<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Auth\AdminLoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\User;
use App\Models\Product;
use App\Models\Post;
use App\Models\Reservation;
use App\Models\Cubiculo;
use App\Models\Equipo;


class AdminController extends Controller
{
    public function dashboard(): View {
        $totalUsers = User::count();
        $totalPublicaciones = Post::count();
        $totalPrecio = 0;

        foreach (product::all() as $product) {
            $totalPrecio += $product->price;
        }
        return view('admin.dashboard', compact('totalUsers', 'totalPrecio', 'totalPublicaciones'));
    }

    public function shop(): View
    {
        $totalProducts = Product::count();
        return view('admin.store.index', compact('totalProducts'));
    }

    public function forum(): View
    {
        return view('admin.forum');
    }

    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('admin.login');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $projects = User::where('name', 'LIKE', "%{$query}%")->get();

        return view('projects.index', compact('projects'));
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(AdminLoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(route('admin.dashboard', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function books(): View
    {
        return view('admin.books.index');
    }

    //---------------------------------------------------
    //RESERVACIONES
    //---------------------------------------------------

    public function index(Request $request) {
        // Filtro por nombre de usuario y rango de fechas
        $query = Reservation::query();
    
        if ($request->has('usuario') && $request->usuario) {
            $query->whereHas('user', function ($subQuery) use ($request) {
                $subQuery->where('name', 'like', '%' . $request->usuario . '%');
            });
        }
    
        if ($request->has('fecha_inicio') && $request->fecha_inicio) {
            $query->where('reserved_at', '>=', $request->fecha_inicio);
        }
    
        if ($request->has('fecha_fin') && $request->fecha_fin) {
            $query->where('reserved_at', '<=', $request->fecha_fin);
        }
    
        $reservations = $query->paginate();
    
        return view('admin.reservations.index', compact('reservations'));
    }

    public function createReservation() {
        // Obtener datos necesarios para el formulario (usuarios, equipos y cubículos)
        $usuarios = User::all();
        $equipos = Equipo::all();
        $cubiculos = Cubiculo::all();
    
        return view('admin.reservations.create', compact('usuarios', 'equipos', 'cubiculos'));
    }
    
    public function storeReservation(Request $request) {
        // Validar los datos ingresados
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'reservable_id' => 'required',
            'reservable_type' => 'required|in:App\Models\Equipo,App\Models\Cubiculo',
            'reserved_at' => 'required|date',
            'due_date' => 'nullable|date|after_or_equal:reserved_at',
            'status' => 'required|in:Pendiente,Confirmado,Cancelado',
        ]);
    
        // Crear la reserva
        Reservation::create([
            'user_id' => $request->user_id,
            'reservable_id' => $request->reservable_id,
            'reservable_type' => $request->reservable_type,
            'reserved_at' => $request->reserved_at,
            'due_date' => $request->due_date,
            'status' => $request->status,
        ]);
    
        return redirect()->route('reservations.index')->with('success', 'Reserva creada correctamente.');
    }
    
    
    public function edit($id) {
        // Buscar la reserva por ID
        $reservation = Reservation::findOrFail($id);
    
        return view('admin.reservations.edit', compact('reservation'));
    }
    
    public function update(Request $request, $id) {
        // Validar los datos de la reserva
        $request->validate([
            'reserved_at' => 'required|date',
            'due_date' => 'nullable|date|after_or_equal:reserved_at',
            'status' => 'required|in:Pendiente,Confirmado,Cancelado',
        ]);
    
        // Actualizar la reserva
        $reservation = Reservation::findOrFail($id);
        $reservation->update([
            'reserved_at' => $request->reserved_at,
            'due_date' => $request->due_date,
            'status' => $request->status,
        ]);
    
        return redirect()->route('reservations.index')->with('success', 'Reserva actualizada correctamente.');
    }
    
    public function deleteReservation($id) {
        // Eliminar la reserva
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();
    
        return redirect()->route('reservations.index')->with('success', 'Reserva eliminada correctamente.');
    }
    

}
