@props([
    'route',
    'icon',
    'label',
])

<a
    href="{{ route($route) }}"
    @class([
        'flex items-center gap-4 rounded-2xl px-5 py-4 transition',
        'bg-sky-500 text-white shadow' => request()->routeIs($route),
        'bg-sky-500 text-white hover:bg-sky-600' => !request()->routeIs($route),
    ])
>
    <div class="w-6 h-6 shrink-0">
        {!! file_get_contents(resource_path("svg/{$icon}.svg")) !!}
    </div>

    <span>{{ $label }}</span>
</a>