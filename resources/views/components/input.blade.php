@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'block mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-pink-400 focus:border-pink-500']) !!}>
