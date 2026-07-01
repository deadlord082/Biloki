<x-layouts.guest>
    <div class="p-6 space-y-6">
        <x-guest.topbar />
        
        <div>
            <a href="{{ route('guest.home') }}" class="text-gray-500 flex items-center gap-2 mb-4">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Retour
            </a>
            <h1 class="text-2xl font-bold">Services additionnels</h1>
            <p class="text-gray-500 mt-1">Améliorez votre séjour avec nos services premium</p>
        </div>

        @if($services->isEmpty())
            <div class="text-center py-12">
                <p class="text-gray-500">Aucun service disponible pour le moment</p>
            </div>
        @else
            <div class="space-y-4">
                @foreach($services as $service)
                    <a href="{{ route('guest.services.show', $service) }}" class="bg-white rounded-3xl overflow-hidden shadow-sm block hover:shadow-md transition">
                        @if($service->photo)
                            <img src="{{ asset('storage/' . $service->photo) }}" alt="{{ $service->name }}" class="w-full h-40 object-cover">
                        @endif
                        <div class="p-5">
                            <div class="flex items-center justify-between mb-3">
                                <span class="px-3 py-1 bg-orange-100 text-orange-600 rounded-full text-xs uppercase">
                                    {{ $service->category }}
                                </span>
                                <div class="flex items-center gap-1 text-yellow-500">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                    <span class="text-xs">{{ $service->reviews()->avg('rating') ? number_format($service->reviews()->avg('rating'), 1) : '-' }}</span>
                                </div>
                            </div>
                            <h3 class="text-lg font-bold">{{ $service->name }}</h3>
                            <p class="text-gray-500 text-sm mt-1 line-clamp-2">{{ $service->description }}</p>
                            <div class="mt-4 flex items-center justify-between">
                                <span class="text-xl font-bold text-orange-500">{{ number_format($service->price, 2) }} €</span>
                                <div class="text-gray-400">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        @endif
    </div>
</x-layouts.guest>