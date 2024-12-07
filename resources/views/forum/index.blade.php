<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Comunidad
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg flex flex-col gap-4 p-4">
                <div class="bg-purple-50 p-4 mb-4 rounded-md">
                    <div class="flex items-center gap-3">
                        <div class="relative hidden w-12 h-12 rounded-full lg:block">
                            <img class="object-cover w-full h-full rounded-full"
                                src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}"
                                loading="lazy" />
                        </div>
                        <p class="text-md font-semibold text-gray-700">
                            {{ Auth::user()->name }}
                        </p>
                    </div>
                    <form class="flex flex-col gap-2 py-4" action="{{ route('forum.post.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <label class="font-semibold text-gray-500">Título</label>
                        <input type="text" name="title" class="w-full p-2 rounded-lg shadow-xs bg-grape-50" required>
                        <label class="font-semibold text-gray-500">Contenido</label>
                        <textarea name="content" class="w-full p-2 rounded-lg shadow-xs bg-grape-50" required></textarea>
                        <button type="submit"
                            class="mt-4 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                            Publicar
                        </button>
                    </form>
                </div>

                @foreach ($posts as $post)
                    <div class="flex flex-col gap-4 p-4 rounded-lg shadow-xs bg-grape-50">
                        <div>
                            <div class="flex items-center text-sm gap-4">
                                <div class="relative hidden w-12 h-12 rounded-full lg:block">
                                    <img class="object-cover w-full h-full rounded-full"
                                        src="{{ $post->user->profile_photo_url }}" alt="{{ $post->user->name }}"
                                        loading="lazy" />
                                    <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true">
                                    </div>
                                </div>
                                <div>
                                    <p class="text-xs font-semibold text-gray-800">
                                        {{ $post->user->name }}
                                    </p>
                                    <p class="text-gray-700">
                                        {{ $post->created_at->diffForHumans() }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="flex-grow pl-16">
                            <p class="text-lg font-semibold text-gray-900">
                                {{ $post->title }}
                            </p>
                            <p class="text-sm text-gray-700">
                                {{ $post->content }}
                            </p>
                            @if (Auth::id() == $post->user_id)
                                <div class="mt-4">
                                    <a href="{{ route('forum.post.edit', $post->id) }}"
                                        class="text-raspberry-600 font-semibold hover:underline">Editar</a>
                                </div>
                            @endif

                            <div class="mt-4 flex items-center gap-4">
                                <form action="{{ route('posts.react', $post) }}" method="POST" class="flex items-center gap-2">
                                    @csrf
                                    <button type="submit" name="type" value="like"
                                        class="flex items-center gap-1 text-blue-600 hover:underline">
                                        👍
                                    </button>
                                    <span class="text-gray-600">{{ $post->reactions->where('type', 'like')->count() }}</span>
                                    <button type="submit" name="type" value="dislike"
                                        class="flex items-center gap-1 text-red-600 hover:underline">
                                        👎
                                    </button>
                                    <span class="text-gray-600">{{ $post->reactions->where('type', 'dislike')->count() }}</span>
                                </form>
                            </div>

                            <div class="mt-4">
                                <h3 class="text-lg font-semibold text-gray-800">Comentarios</h3>
                                @foreach ($post->comments()->with('user')->get() as $comment)
                                    <div class="relative flex items-start gap-3 mt-4 p-2 border-t border-gray-300">
                                        <div class="w-10 h-10 rounded-full overflow-hidden">
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
                                                <a href="#" class="text-blue-500 hover:text-blue-700">
                                                    ✏️
                                                </a>
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

                                <form action="{{ route('comments.store', $post) }}" method="POST" class="mt-4">
                                    @csrf
                                    <textarea name="content" class="w-full p-2 rounded-lg shadow-xs bg-grape-50" placeholder="Escribe un comentario..." required></textarea>
                                    <button type="submit"
                                        class="mt-2 px-4 py-2 text-sm font-medium text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg hover:bg-purple-700 focus:outline-none">
                                        Comentar
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
