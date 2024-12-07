<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Bookscategory;

class LibraryController extends Controller
{
    public function index(Request $request)
{
    // Inicializar la consulta de libros
    $query = Book::query();

    // Filtro por Generales y Carreras (selección múltiple)
    if (($request->has('general') && !empty($request->general)) || 
        ($request->has('carrera') && !empty($request->carrera))) {
        
        // Combinamos las categorías generales y de carreras
        $categories = array_merge($request->general ?? [], $request->carrera ?? []);
        
        // Filtrar libros por las categorías seleccionadas
        $query->whereHas('category', function ($query) use ($categories) {
            $query->whereIn('name', $categories); // Filtra por cualquier categoría en general o carrera
        });
    }

    // Filtro por idioma
    if ($request->has('idioma')) {
        $query->where('language', $request->idioma == 'Español' ? 'es' : 'en');
    }

    // Filtro por rango de fecha de publicación
    if ($request->has('publication_year')) {
        $query->where('publication_year', '<=', $request->publication_year);
    }

    // Filtro por búsqueda (por título)
    if ($request->has('search') && $request->search != '') {
        $query->where('title', 'like', '%' . $request->search . '%');
    }

    // Obtener los libros con los filtros aplicados
    $books = $query->get();

    // Si es una solicitud AJAX, solo devolver los libros en formato JSON
    if ($request->ajax()) {
        return response()->json(['books' => $books]);
    }

    // Verificar si el usuario está autenticado
    if (auth()->check()) {
        // Si está autenticado, devolver la vista para el usuario
        return view('user.library.index', compact('books'));
    }

    // Si no está autenticado, devolver la vista para el visitante
    return view('biblioteca', compact('books'));
}

    
}


