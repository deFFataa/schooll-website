@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-700 leading-8']) }}>
    {{ $value ?? $slot }}
</label>
