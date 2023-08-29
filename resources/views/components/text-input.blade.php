@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' => 'border-red-500 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm',
]) !!}>
