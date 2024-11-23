@extends('layouts.home')

@section('main')
    <main class="px-4 py-8 bg-indigo-950">
        <section class="flex flex-col gap-16">
            <section class="flex flex-col gap-4 px-6">
                @foreach ($posts as $post)
                    <div class="flex flex-col gap-1 border border-gray-600 p-4 rounded-lg bg-gray-800">
                        <div class="flex items-center text-sm gap-4">
                            <div class="relative w-12 h-12 rounded-full block">
                                <img class="object-cover w-full h-full rounded-full"
                                    src="{{ $post->user->profile_photo_url }}" alt="{{ $post->user->name }}" loading="lazy" />
                                <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true">
                                </div>
                            </div>
                            <div class="flex flex-col gap-1">
                                <p class="text-xs font-semibold text-grape-400">
                                    {{ $post->user->name }}
                                </p>
                                <p class="text-xs text-gray-400">
                                    {{ $post->created_at->diffForHumans() }}
                                </p>
                            </div>
                        </div>
                        <div class="flex pl-16">
                            <div class="flex-grow">
                                <p class="text-lg font-semibold text-gray-200">
                                    {{ $post->title }}
                                </p>
                                <p class="text-sm text-gray-300">
                                    {{ $post->content }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div>
                    {{ $posts->links() }}
                </div>

            </section>
    </main>
@endsection
