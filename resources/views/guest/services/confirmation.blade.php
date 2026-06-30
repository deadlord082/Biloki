<x-layouts.guest>
    <div class="min-h-screen bg-orange-50">
        <div class="p-6">
            <div class="flex items-center justify-between mb-8">
                <div class="flex items-center gap-2">
                    <div class="w-10 h-10 bg-orange-500 rounded-full flex items-center justify-center text-white font-bold">1</div>
                    <span class="font-semibold">Paiement</span>
                </div>
                <div class="flex items-center gap-2">
                    <div class="w-10 h-10 bg-orange-500 rounded-full flex items-center justify-center text-white font-bold">2</div>
                    <span class="font-semibold">Confirmation</span>
                </div>
                <div class="flex items-center gap-2 opacity-50">
                    <div class="w-10 h-10 bg-gray-300 rounded-full flex items-center justify-center text-white font-bold">3</div>
                    <span>Avis</span>
                </div>
            </div>
            
            <div class="bg-green-50 rounded-3xl p-8 mb-6 text-center border border-green-100">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h1 class="text-2xl font-bold text-gray-800 mb-2">Paiement réussi !</h1>
                <p class="text-gray-600">Votre commande est confirmée. Merci {{ $sale->guest_name }} ! 🎉</p>
            </div>
            
            <div class="bg-white rounded-3xl p-6 shadow-sm mb-6">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-bold">Récapitulatif</h3>
                    <span class="px-3 py-1 bg-blue-50 text-blue-600 rounded-full text-sm font-medium">BLK-{{ $sale->id }}</span>
                </div>
                
                <div class="space-y-3">
                    <div class="flex justify-between">
                        <span class="text-gray-500">Service</span>
                        <span class="font-semibold">{{ $sale->service->name }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-500">Catégorie</span>
                        <span class="font-semibold">{{ $sale->service->category }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-500">Quantité</span>
                        <span class="font-semibold">{{ $sale->quantity }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-500">Voyageur</span>
                        <span class="font-semibold">{{ $sale->guest_name }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-500">Email</span>
                        <span class="font-semibold">{{ $sale->guest_email }}</span>
                    </div>
                </div>
                
                <div class="mt-6 pt-4 border-t border-gray-100 flex justify-between text-xl font-bold">
                    <span>Total payé</span>
                    <span class="text-orange-500">{{ number_format($sale->price_at_sale * $sale->quantity, 2) }} €</span>
                </div>
            </div>
            
            <div class="bg-orange-50 rounded-3xl p-6 border border-orange-100 mb-6">
                <div class="flex items-start gap-3">
                    <svg class="w-6 h-6 text-orange-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    <div>
                        <h4 class="font-semibold text-orange-700">Email de confirmation envoyé</h4>
                        <p class="text-sm text-orange-600 mt-1">Un email de confirmation contenant ces informations vient de vous être envoyé à {{ $sale->guest_email }}. La conciergerie a également été notifiée.</p>
                    </div>
                </div>
            </div>
            
            <a href="{{ route('guest.services.review', $sale->service) }}" class="w-full bg-white text-gray-800 border border-gray-200 py-4 rounded-2xl font-bold text-lg hover:bg-gray-50 transition block text-center">
                <span class="flex items-center justify-center gap-2">
                    Simuler la réception de l'invitation à laisser un avis
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </span>
            </a>
            
            <a href="{{ route('guest.home') }}" class="w-full text-center text-gray-500 mt-4 block">
                Retour à l'accueil
            </a>
        </div>
    </div>
</x-layouts.guest>