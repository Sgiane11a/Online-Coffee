<?php

namespace App\Http\Controllers;
use App\Models\Bookscategory;  // Importar la clase Bookscategory
use App\Models\Book;  // Asegúrate de importar también el modelo Book si lo usas
use Illuminate\Http\Request;
use Cloudinary\Uploader;

use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Cloudinary\Configuration\Configuration;

class BookController extends Controller
{
    public function index(Request $request)
{
    // Inicializar la consulta de libros
    $query = Book::query();

    // Filtrado por tipo (Generales o Departamentos)
    if ($request->has('filter_type')) {
        // Filtro por Generales
        if ($request->filter_type == 'generales' && $request->has('generales')) {
            $query->whereHas('category', function ($query) use ($request) {
                $query->where('name', $request->generales);
            });
        }

        // Filtro por Departamentos
        if ($request->filter_type == 'departamentos' && $request->has('departamento')) {
            $query->whereHas('category', function ($query) use ($request) {
                $query->where('name', $request->departamento);
            });
        }
    }

    // Filtrado por búsqueda (si existe)
    if ($request->has('search') && $request->search != '') {
        $query->where('title', 'like', '%' . $request->search . '%');
    }

    // Obtener los libros con los filtros aplicados
    $books = $query->get();

    // Obtener todas las categorías
    $categories = Bookscategory::all();

    // Retornar la vista con los libros y categorías
    return view('admin.books.index', compact('books', 'categories'));
}

    



    public function create()
    {
        // Obtener todas las categorías de libros
        $categories = Bookscategory::all();
        return view('admin.books.create', compact('categories'));
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
        return redirect()->route('admin.books.index')->with('success', 'Libro creado exitosamente');
    }
    
    public function edit($id)
    {
        // Buscar el libro por su ID
        $book = Book::findOrFail($id);
        
        // Obtener todas las categorías de libros
        $categories = Bookscategory::all();
        
        // Pasar el libro y las categorías a la vista
        return view('admin.books.update', compact('book', 'categories'));
    }

   
    public function update(Request $request, $id)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'category_id' => 'required|exists:book_categories,id', // Cambiado a book_categories
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'language' => 'required|string|max:50',
            'publication_year' => 'required|integer',
            'image' => 'nullable|image|max:2048', // Validación de imagen
        ]);
    
        // Encuentra el libro por su ID
        $book = Book::findOrFail($id);
    
        // Actualiza los campos del libro
        $book->category_id = $validatedData['category_id'];
        $book->title = $validatedData['title'];
        $book->author = $validatedData['author'];
        $book->language = $validatedData['language'];
        $book->publication_year = $validatedData['publication_year'];
    $uploadedFile = $request->file('image');
        // Manejar la carga de la imagen si existe
        if ($uploadedFile) {
            Cloudinary::destroy($book->image_public_id);

            $uploadResult = Cloudinary::upload($uploadedFile->getRealPath(), [
                'folder' => 'Books'
            ]);

            $book->update([
                'image_url' => $uploadResult->getSecurePath(),
                'image_public_id' => $uploadResult->getPublicId(),
            ]);
        }
    
        // Guardar los cambios en el libro
        $book->save();
    
        // Redirigir con un mensaje de éxito
        return redirect()->route('admin.books.index')->with('success', 'Libro actualizado correctamente');
    }



public function destroy($id)
{
    // Buscar el libro por su ID
    $book = Book::findOrFail($id);
    
    // Si tiene imagen, eliminarla de Cloudinary (si la usaste)
    if ($book->image_public_id) {
        Cloudinary::destroy($book->image_public_id);
    }

    // Eliminar el libro
    $book->delete();

    // Redirigir con mensaje de éxito
    return redirect()->route('admin.books.index')->with('success', 'Libro eliminado exitosamente');
}


}
