@props([
    'title',
    'subtitle',
    'icon'
])

<div class="bg-white rounded-2xl shadow p-4">

    <div class="flex gap-3">

        <div>

            {!! file_get_contents(resource_path("svg/$icon.svg")) !!}

        </div>

        <div>

            <div class="font-bold">

                {{ $title }}

            </div>

            <div class="text-sm text-gray-600">

                {{ $subtitle }}

            </div>

        </div>

    </div>

</div>