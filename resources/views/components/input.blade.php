@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-fuchsia-500 focus:ring-fuchsia-500 rounded-md shadow-sm']) !!}>
