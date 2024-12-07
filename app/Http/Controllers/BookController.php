<?php

namespace App\Http\Controllers;
use App\Models\Bookscategory;  // Importar la clase Bookscategory
use App\Models\Book;  // Asegúrate de importar también el modelo Book si lo usas
use Illuminate\Http\Request;
use Cloudinary\Uploader;
use App\Models\BookComment;  // Si es necesario importar el modelo de los comentarios

use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Cloudinary\Configuration\Configuration;
class BookController extends Controller
{ 
    public function index(Request $request)
    {
        $search = $request->input('search');
        $category_filter = $request->input('category_filter');
    
        $books = Book::when($search, function ($query, $search) {
            return $query->where('title', 'like', '%' . $search . '%');
        })
        ->when($category_filter, function ($query, $category_filter) {
            return $query->where('category_id', $category_filter);
        })
        ->paginate(10); // Paginate the results, showing 10 books per page.
    
        $bookscategories = Bookscategory::all();
    
        return view('admin.books.index', compact('books', 'bookscategories'));
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
            'pdf_file' => 'nullable|mimes:pdf|max:10240',  // Validación para PDF (máximo 10MB)

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
            if ($request->hasFile('pdf_file')) {
                $pdfFile = $request->file('pdf_file');
                $pdfPath = $pdfFile->store('books/pdfs', 'public');  // Almacenar el archivo PDF
                $book->digital_version_link = $pdfPath;  // Guardar el enlace al archivo PDF
            }
        

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
    // Validación de los datos
    $validatedData = $request->validate([
        'category_id' => 'required|exists:book_categories,id',
        'title' => 'required|string|max:255',
        'author' => 'required|string|max:255',
        'language' => 'required|string|max:50',
        'publication_year' => 'required|integer',
        'image' => 'nullable|image|max:2048',
        'pdf_file' => 'nullable|mimes:pdf|max:10240',  // Validación para el PDF
    ]);

    // Encontrar el libro por su ID
    $book = Book::findOrFail($id);

    // Actualizar los campos del libro
    $book->category_id = $validatedData['category_id'];
    $book->title = $validatedData['title'];
    $book->author = $validatedData['author'];
    $book->language = $validatedData['language'];
    $book->publication_year = $validatedData['publication_year'];

    // Si se proporciona una nueva imagen, actualizarla
    if ($request->hasFile('image')) {
        // Eliminar la imagen anterior de Cloudinary (si existe)
        Cloudinary::destroy($book->image_public_id);

        // Subir la nueva imagen a Cloudinary
        $uploadedFile = $request->file('image');
        $uploadResult = Cloudinary::upload($uploadedFile->getRealPath(), [
            'folder' => 'Books'
        ]);

        // Actualizar los datos de la imagen
        $book->image_url = $uploadResult->getSecurePath();
        $book->image_public_id = $uploadResult->getPublicId();
    }

    // Si se proporciona un archivo PDF, actualizar el enlace al archivo
    if ($request->hasFile('pdf_file')) {
        $pdfFile = $request->file('pdf_file');
        $pdfPath = $pdfFile->store('books/pdfs', 'public');
        $book->digital_version_link = $pdfPath;  // Guardar el enlace del PDF
    }

    // Guardar los cambios en la base de datos
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
    

public function show($bookId)
{
    // Obtén el libro por su ID
    $book = Book::find($bookId);

    // Verifica si el libro existe
    if (!$book) {
        return redirect()->route('books.index')->with('error', 'Libro no encontrado.');
    }

    // Accede a los comentarios asociados con ese libro
    $comments = $book->bookComments;

    // Obtener libros recomendados, si los tienes
    $relatedBooks = Book::where('category_id', $book->category_id)->limit(5)->get();

    // Verifica si el usuario está autenticado
    if (auth()->check()) {
        // Si el usuario está autenticado, se muestra una vista para usuarios registrados
        return view('user.library.show', compact('book', 'comments', 'relatedBooks'));
    } else {
        // Si el usuario no está autenticado, se muestra una vista para visitantes
        return view('books.show', compact('book', 'comments', 'relatedBooks'));
    }
}





}
