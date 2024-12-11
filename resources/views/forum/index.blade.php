<x-app-layout>
<div class="min-h-screen bg-white py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg flex flex-col gap-4 p-4">
            <!-- Formulario de publicación -->
            <div class="bg-purple-50 p-6 mb-6 rounded-lg shadow-md">
                <div class="flex items-center gap-4">
                    <div class="relative w-12 h-12 rounded-full">
                        <img class="object-cover w-full h-full rounded-full"
                             src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" loading="lazy" />
                    </div>
                    <p class="text-lg font-semibold text-gray-700">{{ Auth::user()->name }}</p>
                </div>
                <form class="flex flex-col gap-4 py-4" action="{{ route('forum.post.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <label class="font-semibold text-gray-600">Título</label>
                    <input type="text" name="title" class="w-full p-2 rounded-lg shadow-md bg-grape-50 text-black focus:outline-none focus:ring-2 focus:ring-purple-500" required>
                    <label class="font-semibold text-gray-600">Contenido</label>
                    <textarea name="content" class="w-full p-2 rounded-lg shadow-md bg-grape-50 text-black focus:outline-none focus:ring-2 focus:ring-purple-500" required></textarea>
                    <button type="submit" class="mt-4 px-4 py-2 text-sm font-medium text-white bg-purple-600 rounded-lg hover:bg-purple-700 focus:outline-none">
                        Publicar
                    </button>
                </form>
            </div>

            <!-- Publicaciones -->
            @foreach ($posts as $post)
                <div class="flex flex-col gap-4 p-6 rounded-lg shadow-lg bg-grape-50">
                    <div class="flex items-center text-sm gap-4">
                        <div class="relative w-12 h-12 rounded-full">
                            <img class="object-cover w-full h-full rounded-full"
                                 src="{{ $post->user->profile_photo_url }}" alt="{{ $post->user->name }}" loading="lazy" />
                        </div>
                        <div>
                            <p class="font-semibold text-gray-800">{{ $post->user->name }}</p>
                            <p class="text-gray-600">{{ $post->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                    <div class="pl-16 mt-4">
                        <p class="text-xl font-semibold text-gray-900">{{ $post->title }}</p>
                        <p class="text-sm text-gray-700">{{ $post->content }}</p>

                        @if (Auth::id() == $post->user_id)
                            <div class="mt-4">
                                <a href="{{ route('forum.post.edit', $post->id) }}" class="text-blue-600 font-semibold hover:underline">
                                    Editar
                                </a>
                            </div>
                        @endif

                        <!-- Reacciones -->
                        <div class="mt-4 flex items-center gap-4">
                            <form action="{{ route('posts.react', $post) }}" method="POST" class="flex items-center gap-2">
                                @csrf
                                <button type="submit" name="type" value="like" class="text-blue-600 hover:underline">
                                    👍
                                </button>
                                <span class="text-gray-600">{{ $post->reactions->where('type', 'like')->count() }}</span>
                                <button type="submit" name="type" value="dislike" class="text-red-600 hover:underline">
                                    👎
                                </button>
                                <span class="text-gray-600">{{ $post->reactions->where('type', 'dislike')->count() }}</span>
                            </form>
                        </div>

                        <!-- Comentarios -->
                        <div class="mt-6">
                            <h3 class="text-lg font-semibold text-gray-800">Comentarios</h3>
                            @foreach ($post->comments()->with('user')->get() as $comment)
                                <div class="relative flex items-start gap-3 mt-4 p-4 border-t border-gray-300">
                                    <div class="w-12 h-12 rounded-full overflow-hidden">
                                        <img src="{{ $comment->user ? $comment->user->profile_photo_url : asset('images/default-avatar.png') }}"
                                             alt="{{ $comment->user->name ?? 'Usuario anónimo' }}"
                                             class="object-cover w-full h-full">
                                    </div>
                                    <div class="flex-grow">
                                        <p class="font-semibold text-gray-800">{{ $comment->user->name ?? 'Usuario anónimo' }}</p>
                                        <p class="text-sm text-gray-600">{{ $comment->content }}</p>
                                        <p class="text-xs text-gray-500">{{ $comment->created_at->diffForHumans() }}</p>
                                    </div>
                                    <div class="absolute top-2 right-2 flex items-center gap-2">
                                        @can('update', $comment)
                                            <a href="#" class="text-blue-500 hover:text-blue-700">✏️</a>
                                        @endcan
                                        @can('delete', $comment)
                                            <form action="{{ route('posts.destroyComment', $comment) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:text-red-700">❌</button>
                                            </form>
                                        @endcan
                                    </div>
                                </div>
                            @endforeach

                            <!-- Formulario de comentario -->
                            <form action="{{ route('comments.store', $post) }}" method="POST" class="mt-4">
                                @csrf
                                <textarea name="content" class="w-full p-2 rounded-lg shadow-md bg-grape-50 text-black focus:outline-none focus:ring-2 focus:ring-purple-500" placeholder="Escribe un comentario..." required></textarea>
                                <button type="submit" class="mt-2 px-4 py-2 text-sm font-medium text-white bg-purple-600 rounded-lg hover:bg-purple-700 focus:outline-none">
                                    Comentar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach

            <!-- Paginación -->
            {{ $posts->links() }}
        </div>
    </div>
</div>

</x-app-layout>
