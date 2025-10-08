@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-primary_blue text-sm font-medium leading-5 text-gray-900 dark:text-gray-100 focus:outline-none focus:border-primary_blue transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-900 dark:hover:text-gray-100 hover:border-primary_blue focus:outline-none focus:text-gray-900 dark:focus:text-gray-100 focus:border-primary_blue transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
