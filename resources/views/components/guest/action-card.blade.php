@props([
    'title',
    'route',
    'icon'
])

<a href="{{ route($route) }}"
   class="bg-[#FF762F]
          rounded-3xl
          p-5
          text-white
          flex
          items-center
          gap-4
          hover:bg-[#ff6a1d]
          transition">

    <div class="w-7">

        {!! file_get_contents(resource_path("svg/$icon.svg")) !!}

    </div>

    <div>

        {{ $title }}

    </div>

</a>