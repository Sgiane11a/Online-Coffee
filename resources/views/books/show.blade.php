@extends('layouts.home')

@section('main')
<div class="book-details-container">
    <div class="back-button-container">
        <button onclick="window.history.back()" class="back-button">← Regresar</button>
    </div>

    <div class="book-header">
        <div class="book-thumbnail-container">
            <img src="https://res.cloudinary.com/doirzq4zq/image/upload/{{ $book->image_public_id }}" alt="{{ $book->title }}" class="book-thumbnail">
        </div>

        <div class="book-info-container">
            <h1>{{ $book->title }}</h1>
            <p><strong>Autor:</strong> {{ $book->author }}</p>
            <p><strong>Descripción:</strong> {{ $book->description }}</p>
            <p><strong>Fecha de publicación:</strong> {{ $book->publication_year }}</p>

            <a href="{{ route('book.download', $book->id) }}" class="download-btn">Descargar</a>
        </div>
    </div>

    <div class="book-details-content">
        <!-- Comentarios y Libros recomendados al costado -->
        <div class="comments-section">
            <h2>Comentarios</h2>
            @if ($comments->isNotEmpty())
                @foreach ($comments as $comment)
                    <div class="comment">
                        <p><strong>{{ $comment->user->name }}</strong></p>
                        <p>{{ $comment->content }}</p>
                    </div>
                @endforeach
            @else
                <p>No hay comentarios para este libro.</p>
            @endif

            @auth
            <div class="add-comment-container">
                <form action="{{ route('book.comment.store', $book->id) }}" method="POST">
                    @csrf
                    <textarea name="content" placeholder="Escribe tu comentario..." rows="4" required></textarea>
                    <button type="submit" class="submit-comment-btn">Enviar comentario</button>
                </form>
            </div>
            @else
                <p><a href="{{ route('login') }}">Inicia sesión</a> para comentar.</p>
            @endauth
        </div>

        <!-- Libros recomendados -->
        <div class="recommended-books">
            <h2>Libros recomendados</h2>
            <div class="related-books-container">
                @foreach($relatedBooks as $relatedBook)
                    <div class="related-book-card">
                        <a href="{{ route('books.show', $relatedBook->id) }}">
                            <img src="https://res.cloudinary.com/doirzq4zq/image/upload/{{ $relatedBook->image_public_id }}" alt="{{ $relatedBook->title }}" class="related-book-image">
                            <p>{{ $relatedBook->title }}</p>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<style>
    body {
        font-family: 'Lora', serif;
        background-color: #f4ede0;
        color: #2c2c2c;
        margin: 0;
        padding: 0;
    }

    .book-details-container {
        max-width: 1200px;
        margin: 20px auto;
        padding: 20px;
        background-color: #fffaf0;
        border-radius: 12px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
    }

    .back-button-container {
        margin-bottom: 20px;
    }

    .back-button {
        padding: 10px 20px;
        background-color: transparent;
        color: #8d6e63;
        border: 2px solid #8d6e63;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .back-button:hover {
        background-color: #8d6e63;
        color: white;
    }

    .book-header {
        display: flex;
        align-items: flex-start;
        gap: 50px;
        margin-bottom: 40px;
    }

    .book-thumbnail-container {
        flex: 1;
        max-width: 300px;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .book-thumbnail {
        width: 100%;
        height: auto;
    }

    .book-info-container {
        flex: 2;
    }

    .book-info-container h1 {
        font-size: 2rem;
        margin-bottom: 20px;
        color: #4e342e;
    }

    .book-info-container p {
        margin: 10px 0;
        font-size: 1.1rem;
        line-height: 1.6;
    }

    .download-btn {
        display: inline-block;
        padding: 10px 20px;
        background-color: transparent;
        color: #795548;
        border: 2px solid #795548;
        border-radius: 5px;
        font-weight: bold;
        text-transform: uppercase;
        text-decoration: none;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .download-btn:hover {
        background-color: #795548;
        color: white;
    }

    .book-details-content {
        display: flex;
        gap: 40px;
        flex-wrap: wrap;
    }

    .comments-section, .recommended-books {
        flex: 1;
        min-width: 300px;
    }

    .comments-section h2, .recommended-books h2 {
        font-size: 1.8rem;
        margin-bottom: 15px;
        color: #4e342e;
    }

    .related-books-container {
        display: flex;
        gap: 20px;
        flex-wrap: wrap;
    }

    .related-book-card {
        width: 150px;
        text-align: center;
    }

    .related-book-image {
        width: 100%;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .related-book-card p {
        margin-top: 10px;
        font-size: 0.9rem;
        color: #4e342e;
    }

    .submit-comment-btn {
        padding: 10px 20px;
        background-color: transparent;
        color: #795548;
        border: 2px solid #795548;
        border-radius: 5px;
        font-weight: bold;
        text-transform: uppercase;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .submit-comment-btn:hover {
        background-color: #795548;
        color: white;
    }

    .add-comment-container textarea {
        width: 100%;
        padding: 12px;
        border-radius: 6px;
        border: 1px solid #ddd;
        resize: none;
        font-size: 1rem;
    }
</style>
@endsection
