@extends('layouts.admin')

@section('main')
    <main class="h-full pb-16 overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-200">
                Foro
            </h2>
        </div>

        <div class="flex flex-col gap-2 px-6">
            @foreach ($posts as $post)
                <div class="flex gap-4 items-center p-4 rounded-lg shadow-xs bg-gray-800">
                    <div>
                        <div class="flex items-center text-sm">
                            <div class="relative hidden w-12 h-12 rounded-full lg:block">
                                <img class="object-cover w-full h-full rounded-full"
                                    src="{{ $post->user->profile_photo_url }}" alt="{{ $post->user->name }}" loading="lazy" />
                                <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex-grow">
                        <p class="text-xs font-semibold text-gray-400">
                            {{ $post->user->name }}
                        </p>
                        <p class="text-lg font-semibold text-gray-200">
                            {{ $post->title }}
                        </p>
                        <p class="text-sm text-gray-300">
                            {{ $post->content }}
                        </p>
                    </div>
                    <form action="{{ route('admin.forum.delete', $post->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="inline-block w-auto text-red-50 bg-red-700 rounded-md p-2 ">
                            <svg aria-label="delete" class="w-5 y-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M7 21q-.825 0-1.412-.587T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.587 1.413T17 21zm2-4h2V8H9zm4 0h2V8h-2z" />
                            </svg>
                        </button>
                    </form>
                </div>
            @endforeach

            <div>
                {{ $posts->links() }}
            </div>
        </div>
    </main>
@endsection
