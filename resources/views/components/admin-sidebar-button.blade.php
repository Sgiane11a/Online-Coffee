<li class="relative px-6 py-3">
    <a class="inline-flex items-center w-full text-base font-regular transition-colors duration-150 hover:text-grape-450 dark:hover:text-gray-200"
        href="{{ $url }}">
        @if ($url == Request::url())
            <span class="absolute inset-0 bg-grape-450 opacity-50"
                aria-hidden="true">
                <span class="absolute right-0 top-1/2 transform -translate-y-1/2 w-0 h-0 border-t-8 border-b-8 border-r-8 border-transparent border-r-white"></span>
            </span>
        @endif
        <div class="relative flex items-center z-10">
            {!! $icon !!}
            <span class="ml-8">{{ $text }}</span>
        </div>
    </a>
</li>
