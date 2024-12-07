<?php

// app/Http/Controllers/BookCommentController.php
namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookCommentController extends Controller
{
    // Método para almacenar un comentario
   // En tu controlador, por ejemplo, en BookCommentController
   public function store(Request $request, $bookId)
   {
       $book = Book::find($bookId);
   
       if (!$book) {
           return redirect()->route('books.index')->with('error', 'Libro no encontrado.');
       }
   
       // Crear el comentario
       $comment = new BookComment();
       $comment->user_id = auth()->user()->id;
       $comment->content = $request->input('content');
       $comment->book_id = $book->id;
       $comment->save();
   
       // Devolver la respuesta como JSON
       return response()->json([
           'user_name' => auth()->user()->name,
           'content' => $comment->content
       ]);
   }
   
}
