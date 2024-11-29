@extends('layouts.admin')

@section('main')
    <main class="h-full pb-16 overflow-y-auto">
        <!-- Contenedor principal -->
        <div class="container px-6 mx-auto grid">
            <!-- Título del Foro -->
            <h2 class="my-6 text-2xl font-semibold text-grape-450">
                Foro
            </h2>
        </div>

        <!-- Lista de publicaciones -->
        <div class="flex flex-col gap-2 px-6">
            @foreach ($posts as $post)
                <!-- Tarjeta de Publicación -->
                <div class="flex flex-col gap-1 border border-gray-600 p-4 rounded-lg shadow-xs bg-gray-800">
                    <!-- Encabezado de la Publicación -->
                    <div 
                        class="flex items-center text-sm gap-4 cursor-pointer" 
                        onclick="toggleComments('comments-{{ $post->id }}')">
                        
                        <!-- Foto de perfil del usuario -->
                        <div class="relative w-12 h-12 rounded-full block">
                            <img class="object-cover w-full h-full rounded-full" 
                                src="{{ $post->user->profile_photo_url }}" 
                                alt="{{ $post->user->name }}" loading="lazy" />
                            <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                        </div>
                        
                        <!-- Detalles de la publicación -->
                        <div class="flex flex-col gap-1 flex-grow">
                            <p class="text-xs font-semibold text-grape-400">
                                {{ $post->user->name }}
                            </p>
                            <p class="text-xs text-gray-400">
                                {{ $post->created_at->diffForHumans() }}
                            </p>
                            <p class="text-lg font-semibold text-gray-200">
                                {{ $post->title }}
                            </p>
                            <p class="text-sm text-gray-300">
                                {{ $post->content }}
                            </p>
                        </div>
                        
                        <!-- Botón para eliminar la publicación -->
                        <form action="{{ route('admin.forum.delete', $post->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-block w-auto text-red-50 bg-red-700 rounded-md p-2">
                                <svg aria-label="delete" class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M7 21q-.825 0-1.412-.587T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.587 1.413T17 21zm2-4h2V8H9zm4 0h2V8h-2z" />
                                </svg>
                            </button>
                        </form>
                    </div>

                    <!-- Sección de Comentarios (oculta inicialmente) -->
                    <div id="comments-{{ $post->id }}" class="hidden mt-4 pl-6">
                        <!-- Encabezado de comentarios -->
                        <h3 class="text-md font-semibold text-gray-200">Comentarios</h3>
                        
                        <!-- Lista de comentarios -->
                        @foreach ($post->comments()->with('user')->get() as $comment)
                            <div class="flex items-start gap-3 mt-2 p-2 bg-gray-700 rounded-md">
                                
                                <!-- Foto de perfil del usuario del comentario -->
                                <div class="w-10 h-10 rounded-full overflow-hidden">
                                    <img src="{{ $comment->user ? $comment->user->profile_photo_url : asset('images/default-avatar.png') }}"
                                        alt="{{ $comment->user->name ?? 'Usuario anónimo' }}" class="object-cover w-full h-full">
                                </div>
                                
                                <!-- Detalles del comentario -->
                                <div class="flex-grow">
                                    <p class="font-semibold text-gray-200">{{ $comment->user->name ?? 'Usuario anónimo' }}</p>
                                    <p class="text-sm text-gray-400">{{ $comment->content }}</p>
                                    <p class="text-xs text-gray-500">{{ $comment->created_at->diffForHumans() }}</p>
                                </div>
                                
                                <!-- Botón para eliminar un comentario -->
                                <form action="{{ route('admin.comments.delete', $comment->id) }}" method="POST" class="ml-2">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700">
                                        <svg aria-label="delete-comment" class="w-4 h-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M7 21q-.825 0-1.412-.587T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.587 1.413T17 21zm2-4h2V8H9zm4 0h2V8h-2z" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        @endforeach

                        <!-- Formulario para responder -->
                        <form action="{{ route('admin.comments.store', $post->id) }}" method="POST">
                            @csrf
                            <div class="flex flex-col gap-2 mt-4">
                                <textarea name="content" class="w-full p-2 bg-gray-800 rounded-md" placeholder="Escribe tu respuesta..."></textarea>
                                <button type="submit" class="inline-block w-auto text-gray-200 bg-gray-700 rounded-md p-2">
                                    Responder
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            @endforeach

            <!-- Paginación -->
            <div>
                {{ $posts->links() }}
            </div>
        </div>
    </main>

    <!-- Script para alternar la visibilidad de los comentarios -->
    <script>
        function toggleComments(id) {
            const commentsSection = document.getElementById(id);
            if (commentsSection) {
                commentsSection.classList.toggle('hidden');
            }
        }
    </script>
@endsection
