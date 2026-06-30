@props([
    'title',
    'route',
    'icon'
])

<a href="{{ route($route) }}"
class="bg-[#FF762F]
rounded-3xl
p-8
text-white
flex
flex-col
justify-between
h-36">

<div class="w-12">

{!! file_get_contents(resource_path("svg/$icon.svg")) !!}

</div>

<div>

{{ $title }}

</div>

</a>