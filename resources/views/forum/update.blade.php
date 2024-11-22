<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Foro
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
                    <form class="flex flex-col gap-2 py-4" action="{{ route('forum.post.update', $post->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <label class="font-semibold text-gray-500">Título</label>
                        <input type="text" name="title" class="w-full p-2 rounded-lg shadow-xs bg-grape-50" value="{{ $post->title }}"
                            required>
                        <label class="font-semibold text-gray-500">Contenido</label>
                        <textarea name="content" class="w-full p-2 rounded-lg shadow-xs bg-grape-50" required>{{ $post->content }}</textarea>
                        <button type="submit"
                            class="mt-4 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                            Publicar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
