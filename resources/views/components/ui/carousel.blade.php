@props(['images', 'height' => '400px'])

<div x-data="{
    currentIndex: 0,
    images: {{ json_encode($images) }},
    next() {
        this.currentIndex = (this.currentIndex + 1) % this.images.length
    },
    prev() {
        this.currentIndex = (this.currentIndex - 1 + this.images.length) % this.images.length
    },
    goTo(index) {
        this.currentIndex = index
    }
}" class="relative w-full overflow-hidden" style="height: {{ $height }};">
    <div class="flex transition-transform duration-500 ease-in-out" :style="'transform: translateX(-' + (currentIndex * 100) + '%)'">
        @foreach ($images as $image)
            <div class="w-full flex-shrink-0 h-full flex items-center justify-center">
                <img src="{{ $image['url'] }}" alt="{{ $image['alt'] ?? '' }}" class="w-full h-full object-cover rounded-xl">
            </div>
        @endforeach
    </div>

    @if (count($images) > 1)
        <!-- Previous Button -->
        <button @click="prev" class="absolute left-4 top-1/2 -translate-y-1/2 bg-white/80 hover:bg-white rounded-full p-2 shadow-md transition-all">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </button>

        <!-- Next Button -->
        <button @click="next" class="absolute right-4 top-1/2 -translate-y-1/2 bg-white/80 hover:bg-white rounded-full p-2 shadow-md transition-all">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </button>

        <!-- Indicators -->
        <div class="absolute bottom-4 left-1/2 -translate-x-1/2 flex gap-2">
            @foreach ($images as $index => $image)
                <button
                    @click="goTo({{ $index }})"
                    :class="currentIndex === {{ $index }} ? 'bg-white' : 'bg-white/50'"
                    class="w-3 h-3 rounded-full transition-all"
                ></button>
            @endforeach
        </div>
    @endif
</div>