<?php

namespace App\Http\Controllers;

use App\Models\Cubiculo;
use Illuminate\Http\Request;

class CubiculoController extends Controller
{
    public function index()
    {
        $equipos = Cubiculo::all();
        return view('admin.cubiculos.index', compact('cubiculos'));
    }

    public function create()
    {
        return view('admin.cubiculos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'status' => 'required|string|in:available,unavailable',
        ]);

        Cubiculo::create($request->all());

        return redirect()->route('cubiculos.index')->with('success', 'Cubiculo creado con éxito.');
    }

    public function edit(Cubiculo $cubiculo)
    {
        return view('admin.cubiculos.edit', compact('cubiculo'));
    }

    public function update(Request $request, Cubiculo $cubiculo)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'status' => 'required|string|in:available,unavailable',
        ]);

        $cubiculo->update($request->all());

        return redirect()->route('cubiculos.index')->with('success', 'Cubiculo actualizado con éxito.');
    }

    public function destroy(Cubiculo $cubiculo)
    {
        $cubiculo->delete();

        return redirect()->route('cubiculos.index')->with('success', 'Cubiculo eliminado con éxito.');
    }
}
