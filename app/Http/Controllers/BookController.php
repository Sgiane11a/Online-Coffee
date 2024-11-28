<?php

namespace App\Http\Controllers;
use App\Models\Bookscategory;  // Importar la clase Bookscategory
use App\Models\Book;  // Asegúrate de importar también el modelo Book si lo usas
use Illuminate\Http\Request;
class BookController extends Controller
{
    public function index()
    {
        return view('admin.library.books.index');
    }


    public function create()
    {
        // Obtener todas las categorías de libros
        $categories = Bookscategory::all();
        return view('admin.library.books.create', compact('categories'));
    }

    public function store(Request $request)
{
    // Validación del formulario
    $request->validate([
        'title' => 'required|string|max:255',
        'author' => 'required|string|max:255',
        'category_id' => 'required|exists:book_categories,id',
        'language' => 'required|in:es,en', // Solo Español o Inglés
        'publication_year' => 'required|integer|min:1900|max:' . date('Y'),
        'description' => 'nullable|string',
        'file' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);
    

    // Guardar el libro
    $book = new Book($request->all());

    // Manejar la carga de imagen
    if ($request->hasFile('file')) {
        $imagePath = $request->file('file')->store('books_images', 'public');
        $book->image_url = $imagePath;
    }

    $book->save();

    // Redirigir con éxito
    return redirect()->route('admin.library.books.index')->with('success', 'Libro creado exitosamente');
}


}
