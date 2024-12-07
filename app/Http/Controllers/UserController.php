<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\User;
use App\Models\Department;
use App\Models\Career;

class UserController extends Controller
{
    public function index(Request $request): View
    {
        // Obtener los filtros desde el request
        $departmentId = $request->input('department_id');
        $search = $request->input('search'); // Buscador por nombre o correo

        // Construir la consulta de usuarios con filtros opcionales
        $users = User::query()
            ->when($departmentId, function ($query, $departmentId) {
                $query->where('department_id', $departmentId);
            })
            ->when($search, function ($query, $search) {
                // Buscar por nombre o correo
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%$search%")
                        ->orWhere('email', 'like', "%$search%");
                });
            })
            ->paginate(5);

        // Obtener la cantidad total de usuarios sin filtros
        $totalUsers = User::count();

        // Obtener departamentos para los filtros
        $departments = Department::all();

        return view('admin.users.index', compact('users', 'departments', 'departmentId', 'totalUsers', 'search'));
    }




    public function create(): View
    {
        // Obtener departamentos y carreras para mostrarlos en el formulario
        $departments = Department::all();
        $careers = Career::all();
        return view('admin.users.create', compact('departments', 'careers'));
    }

    public function store(Request $request): RedirectResponse
    {
        // Validar los datos
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'department_id' => 'nullable|exists:departments,id',
            'career_id' => 'nullable|exists:careers,id',
        ]);

        // Asignar valores de departamento y carrera
        $departmentId = $request->department_id;
        $careerId = $request->career_id;

        // Crear el usuario
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->department_id = $departmentId;
        $user->career_id = $careerId;
        $user->save();

        return redirect()->route('admin.users.create')->with('success', 'Usuario creado exitosamente');
    }

    public function edit(User $user): View
    {
        // Obtener departamentos y carreras para mostrarlos en el formulario
        $departments = Department::all();
        $careers = Career::all();
        return view('admin.users.edit', compact('user', 'departments', 'careers'));
    }

    public function update(Request $request, User $user): RedirectResponse
    {
        // Validar los datos
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'career_id' => 'required|exists:careers,id',
            'department_id' => 'required|exists:departments,id',
        ]);

        // Actualizar el usuario
        $user->update([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'career_id' => $validatedData['career_id'],
            'department_id' => $validatedData['department_id'],
        ]);

        // Redirigir al índice con un mensaje de éxito
        return redirect()->route('admin.users.index')->with('success', 'Usuario actualizado exitosamente.');
    }

    public function destroy(User $user): RedirectResponse
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'Usuario eliminado exitosamente.');
    }
}
