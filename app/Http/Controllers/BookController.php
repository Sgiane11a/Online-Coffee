<?php

namespace App\Http\Controllers;
use App\Models\Bookscategory;  // Importar la clase Bookscategory
use App\Models\Book;  // Asegúrate de importar también el modelo Book si lo usas
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;


class BookController extends Controller
{
    public function index()
{
    $books = Book::all();  // Obtiene todos los libros desde la base de datos
    return view('admin.library.books.index', compact('books'));
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
            'file' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validar el tipo de archivo
        ]);
    
        // Crear un nuevo libro
        $book = new Book($request->all());
    
        // Verificar si se ha subido una imagen
        if ($request->hasFile('file')) {
            // Subir la imagen a Cloudinary
            $uploadedFile = $request->file('file');
            $uploadResult = Cloudinary::upload($uploadedFile->getRealPath(), [
                'folder' => 'Books' // Especificar la carpeta en Cloudinary
            ]);
    
            // Obtener la URL segura y el ID público de la imagen
            $book->image_url = $uploadResult->getSecurePath(); // URL de la imagen
            $book->image_public_id = $uploadResult->getPublicId(); // ID público de la imagen
        }
    
        // Guardar el libro en la base de datos
        $book->save();
    
        // Redirigir con un mensaje de éxito
        return redirect()->route('admin.library.books.index')->with('success', 'Libro creado exitosamente');
    }
    


}
