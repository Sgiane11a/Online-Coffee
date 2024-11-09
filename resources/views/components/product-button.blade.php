@php
    $classes = [
        'default' => 'bg-white text-black text-lg p-3 rounded-xl font-medium',
        'selected' => 'bg-fuchsia-900 border-fuchsia-500 border text-white text-lg p-3 rounded-xl font-mediumk'
    ][$variant] ?? 'class-default class-common';
@endphp

<li>
    <a class="{{ $classes }} " href="{{ $url }}">{{ $text }}</a>
</li>