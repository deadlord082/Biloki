@props([
    'variant' => 'primary', // primary, secondary, success, warning, danger, ghost
    'size' => 'md', // sm, md, lg
    'as' => 'button',
    'href' => null,
    'icon' => null,
])

@php
    $classes = 'inline-flex items-center justify-center font-medium rounded-lg transition-all focus:outline-none focus:ring-2 focus:ring-offset-2';

    // Variant classes
    $variantClasses = [
        'primary' => 'bg-sky-600 text-white hover:bg-sky-700 focus:ring-sky-500',
        'secondary' => 'bg-gray-100 text-gray-800 hover:bg-gray-200 focus:ring-gray-500 border border-gray-300',
        'success' => 'bg-green-600 text-white hover:bg-green-700 focus:ring-green-500',
        'warning' => 'bg-yellow-600 text-white hover:bg-yellow-700 focus:ring-yellow-500',
        'danger' => 'bg-red-600 text-white hover:bg-red-700 focus:ring-red-500',
        'ghost' => 'text-gray-700 hover:bg-gray-100 focus:ring-gray-500',
    ];

    // Size classes
    $sizeClasses = [
        'sm' => 'px-3 py-1.5 text-sm',
        'md' => 'px-5 py-2.5 text-sm',
        'lg' => 'px-6 py-3 text-base',
    ];

    $classes .= ' ' . ($variantClasses[$variant] ?? $variantClasses['primary']);
    $classes .= ' ' . ($sizeClasses[$size] ?? $sizeClasses['md']);
@endphp

@if($as === 'a' && $href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        @if($icon)
            <span class="mr-2">{!! file_get_contents(resource_path("svg/$icon.svg")) !!}</span>
        @endif
        {{ $slot }}
    </a>
@else
    <button {{ $attributes->merge(['type' => 'button', 'class' => $classes]) }}>
        @if($icon)
            <span class="mr-2">{!! file_get_contents(resource_path("svg/$icon.svg")) !!}</span>
        @endif
        {{ $slot }}
    </button>
@endif
