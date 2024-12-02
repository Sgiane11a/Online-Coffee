<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Foro Institucional
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Botón para nueva publicación -->
            <div class="text-right">
                <button 
                    class="px-4 py-2 bg-purple-600 text-white text-sm font-semibold rounded-full shadow-md hover:bg-purple-700 focus:outline-none transition-all"
                    onclick="toggleModal('newPostModal')">
                    ➕ Nueva Publicación
                </button>
            </div>

            <!-- Lista de publicaciones -->
            @foreach ($posts as $post)
                <div class="bg-white shadow-md rounded-lg p-4">
                    <!-- Cabecera -->
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <img class="w-10 h-10 rounded-full object-cover" 
                                src="{{ $post->user->profile_photo_url }}" 
                                alt="{{ $post->user->name }}">
                            <div>
                                <p class="text-sm font-semibold text-gray-800">{{ $post->user->name }}</p>
                                <p class="text-xs text-gray-500">{{ $post->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                        @if (Auth::id() == $post->user_id)
                            <button 
                                class="text-gray-500 hover:text-purple-600" 
                                onclick="toggleEditModal({{ $post->id }}, '{{ $post->title }}', '{{ $post->content }}')">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                        d="M11 17l-4-4m0 0l4-4m-4 4h12"></path>
                                </svg>
                            </button>
                        @endif
                    </div>

                    <!-- Contenido -->
                    <div class="mt-2">
                        <h3 class="text-lg font-semibold text-gray-900">{{ $post->title }}</h3>
                        <p class="text-gray-700 text-sm">{{ $post->content }}</p>
                    </div>

                    <!-- Comentarios -->
                    <div class="mt-4 space-y-4">
                        <h4 class="text-sm font-semibold text-gray-800">Comentarios</h4>
                        @foreach ($post->comments as $comment)
                            <div class="flex items-start gap-3">
                                <img class="w-8 h-8 rounded-full object-cover" 
                                    src="{{ $comment->user->profile_photo_url ?? asset('images/default-avatar.png') }}" 
                                    alt="{{ $comment->user->name ?? 'Usuario anónimo' }}">
                                <div>
                                    <p class="text-sm font-semibold text-gray-800">{{ $comment->user->name ?? 'Usuario anónimo' }}</p>
                                    <p class="text-xs text-gray-600">{{ $comment->content }}</p>
                                    <p class="text-xs text-gray-400">{{ $comment->created_at->diffForHumans() }}</p>
                                </div>
                            </div>
                        @endforeach
                        <!-- Formulario de comentario -->
                        <form action="{{ route('comments.store', $post) }}" method="POST" class="mt-2 flex items-center gap-2">
                            @csrf
                            <textarea 
                                name="content" 
                                class="w-full p-2 text-sm border rounded-md focus:outline-none" 
                                placeholder="Escribe un comentario..." required>
                            </textarea>
                            <button 
                                type="submit" 
                                class="px-3 py-2 bg-purple-600 text-white text-xs rounded-md hover:bg-purple-700 focus:outline-none">
                                Comentar
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach

            <!-- Paginación -->
            <div class="mt-6">
                {{ $posts->links() }}
            </div>
        </div>
    </div>

    <!-- Modal para nueva publicación -->
    <div id="newPostModal" class="hidden fixed inset-0 bg-black bg-opacity-30 flex items-center justify-center">
        <div class="bg-white rounded-lg shadow-lg w-96 p-6">
            <h3 class="text-lg font-semibold text-gray-800">Nueva Publicación</h3>
            <form action="{{ route('forum.post.store') }}" method="POST" class="mt-4 space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-gray-700">Título</label>
                    <input type="text" name="title" class="w-full p-2 text-sm border rounded-md focus:outline-none" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Contenido</label>
                    <textarea name="content" class="w-full p-2 text-sm border rounded-md focus:outline-none" required></textarea>
                </div>
                <div class="text-right">
                    <button type="button" class="px-4 py-2 text-sm bg-gray-300 rounded-md focus:outline-none" onclick="toggleModal('newPostModal')">Cancelar</button>
                    <button type="submit" class="px-4 py-2 text-sm bg-purple-600 text-white rounded-md hover:bg-purple-700 focus:outline-none">Publicar</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal para editar publicación -->
    <div id="editPostModal" class="hidden fixed inset-0 bg-black bg-opacity-30 flex items-center justify-center">
        <div class="bg-white rounded-lg shadow-lg w-96 p-6">
            <h3 class="text-lg font-semibold text-gray-800">Editar Publicación</h3>
            <form id="editPostForm" method="POST" class="mt-4 space-y-4">
                @csrf
                @method('PUT')
                <div>
                    <label class="block text-sm font-medium text-gray-700">Título</label>
                    <input type="text" name="title" id="editPostTitle" class="w-full p-2 text-sm border rounded-md focus:outline-none" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Contenido</label>
                    <textarea name="content" id="editPostContent" class="w-full p-2 text-sm border rounded-md focus:outline-none" required></textarea>
                </div>
                <div class="text-right">
                    <button type="button" class="px-4 py-2 text-sm bg-gray-300 rounded-md focus:outline-none" onclick="toggleModal('editPostModal')">Cancelar</button>
                    <button type="submit" class="px-4 py-2 text-sm bg-purple-600 text-white rounded-md hover:bg-purple-700 focus:outline-none">Actualizar</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function toggleModal(modalId) {
            const modal = document.getElementById(modalId);
            modal.classList.toggle('hidden');
        }

        function toggleEditModal(postId, title, content) {
            const modal = document.getElementById('editPostModal');
            const form = document.getElementById('editPostForm');
            form.action = `/forum/posts/${postId}`;
            document.getElementById('editPostTitle').value = title;
            document.getElementById('editPostContent').value = content;
            modal.classList.remove('hidden');
        }
    </script>
</x-app-layout>
