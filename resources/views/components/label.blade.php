@props(['value'])

<label {{ $attributes->merge(['class' => 'block text-base font-medium text-white']) }}>
    {{ $value ?? $slot }}
</label>
