<?php

namespace App\Http\Controllers;
use App\Models\Bookscategory;
use Illuminate\Http\Request;

class CategorybookController extends Controller
{
  // En el controlador CategorybookController
  function index()
  {
      $categoriesbook = Bookscategory::paginate(10);
      return view('admin.library.categories.index', compact('categoriesbook'));
  }
    function create()
    {
        return view('admin.library.categories.create');
    }
    function store(Request $request)
    {
        // Validación
        $validated = $request->validate([
            'name' => 'required|string|max:255', // Asegúrate de que 'name' sea obligatorio y sea una cadena
        ]);

        // Crear la categoría
        $category = Bookscategory::create([
            'name' => $validated['name'],
        ]);

        // Redirigir con mensaje de éxito
        return redirect()->route('admin.library.categories.index')
            ->with('success', 'Categoría creada exitosamente.');
    }


// Método para eliminar una categoría
public function destroy($id)
{
    // Encontrar la categoría por su ID
    $categorybook = Bookscategory::findOrFail($id);

    // Eliminar la categoría
    $categorybook->delete();

    // Redirigir con mensaje de éxito
    return redirect()->route('admin.library.categories.index')
        ->with('success', 'Categoría eliminada exitosamente.');
}

    // Método para mostrar el formulario de edición
    public function edit($id)
    {
        // Encontrar la categoría por su ID
        $categorybook = Bookscategory::findOrFail($id);

        // Retornar la vista con los datos de la categoría
        return view('admin.library.categories.update', compact('categorybook'));
    }

    // Método para actualizar la categoría
    public function update(Request $request, $id)
    {
        // Validación
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:book_categories,name,' . $id, // Asegurarse de que el nombre sea único, excepto para la categoría actual
        ]);

        // Encontrar la categoría por su ID
        $categorybook = Bookscategory::findOrFail($id);

        // Actualizar los datos de la categoría
        $categorybook->name = $validated['name'];
        $categorybook->save();

        // Redirigir con mensaje de éxito
        return redirect()->route('admin.library.categories.index')
            ->with('success', 'Categoría actualizada exitosamente.');
    }


}
