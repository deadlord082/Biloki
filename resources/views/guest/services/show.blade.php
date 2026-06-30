<x-layouts.guest>
    <div class="min-h-screen bg-[#f5f5f5]">
        <div class="relative">
            <div class="h-64 bg-gradient-to-br from-orange-100 to-orange-50 flex items-center justify-center">
                <span class="text-6xl">🏨</span>
            </div>
            <a href="{{ route('guest.services.index') }}" class="absolute top-6 left-6 w-10 h-10 bg-white rounded-full flex items-center justify-center shadow">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
            </a>
        </div>
        
        <div class="p-6 -mt-6 relative">
            <div class="bg-white rounded-3xl p-6 shadow-sm">
                <div class="flex items-center justify-between mb-4">
                    <span class="px-3 py-1 bg-orange-100 text-orange-600 rounded-full text-xs uppercase">
                        {{ $service->category }}
                    </span>
                </div>
                
                <h1 class="text-2xl font-bold">{{ $service->name }}</h1>
                
                <div class="flex items-center gap-2 mt-2 mb-4">
                    <div class="flex items-center gap-1 text-yellow-500">
                        @for($i = 1; $i <= 5; $i++)
                            <svg class="w-4 h-4" fill="{{ $i <= round($averageRating) ? 'currentColor' : 'none' }}" stroke="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                        @endfor
                    </div>
                    <span class="text-sm font-semibold">{{ number_format($averageRating, 1) }}/5</span>
                    <span class="text-sm text-gray-500">({{ $reviews->count() }} avis)</span>
                </div>
                
                <p class="text-gray-600 mb-6">{{ $service->description }}</p>
                
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <p class="text-3xl font-bold text-orange-500">{{ number_format($service->price, 2) }} €</p>
                        <p class="text-xs text-gray-500">{{ $service->pricing_mode }}</p>
                    </div>
                </div>
                
                <h3 class="font-semibold mb-4">Avis des voyageurs ({{ $reviews->count() }})</h3>
                
                @if($reviews->isEmpty())
                    <p class="text-gray-500 text-sm mb-6">Aucun avis pour le moment</p>
                @else
                    <div class="space-y-4 mb-6">
                        @foreach($reviews as $review)
                            <div class="border border-gray-100 rounded-2xl p-4">
                                <div class="flex items-center justify-between mb-2">
                                    <div class="flex items-center gap-2">
                                        <div class="w-8 h-8 bg-orange-100 rounded-full flex items-center justify-center text-orange-600 font-bold">
                                            {{ strtoupper(substr($review->guest_name, 0, 1)) }}
                                        </div>
                                        <div>
                                            <p class="font-semibold text-sm">{{ $review->guest_name }}</p>
                                            <p class="text-xs text-gray-500">{{ $review->created_at->format('d/m/Y') }}</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-0.5 text-yellow-500">
                                        @for($i = 1; $i <= 5; $i++)
                                            <svg class="w-3 h-3" fill="{{ $i <= $review->rating ? 'currentColor' : 'none' }}" stroke="currentColor" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                        @endfor
                                    </div>
                                </div>
                                @if($review->comment)
                                    <p class="text-sm text-gray-600">{{ $review->comment }}</p>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @endif
                
                <a href="{{ route('guest.services.checkout', $service) }}" class="w-full bg-orange-500 text-white py-4 rounded-2xl font-bold text-lg hover:bg-orange-600 transition block text-center">
                    Ajouter à ma réservation
                </a>
                
                <a href="{{ route('guest.services.review', $service) }}" class="w-full mt-3 border border-orange-500 text-orange-500 py-4 rounded-2xl font-bold text-lg hover:bg-orange-50 transition block text-center">
                    Laisser un avis
                </a>
            </div>
        </div>
    </div>
</x-layouts.guest>