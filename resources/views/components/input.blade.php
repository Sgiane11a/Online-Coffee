@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-raspberry-500 focus:ring-raspberry-500 rounded-md shadow-sm']) !!}>
