@php
    $classes = [
        'default' => 'bg-white text-black p-3 rounded-xl',
        'selected' => 'bg-fuchsia-900 border-fuchsia-500 border text-white p-3 rounded-xl'
    ][$variant] ?? 'class-default class-common';
@endphp

<li>
    <a class="{{ $classes }} text-lg font-semibold" href="{{ $url }}">{{ $text }}</a>
</li>