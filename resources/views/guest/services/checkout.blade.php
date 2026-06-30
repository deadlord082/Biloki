<x-layouts.guest>
    <div class="min-h-screen bg-orange-50">
        <div class="p-6">
            <a href="{{ route('guest.services.show', $service) }}" class="text-gray-500 flex items-center gap-2 mb-6">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Retour
            </a>
            
            <div class="flex items-center justify-between mb-8">
                <div class="flex items-center gap-2">
                    <div class="w-10 h-10 bg-orange-500 rounded-full flex items-center justify-center text-white font-bold">1</div>
                    <span class="font-semibold">Paiement</span>
                </div>
                <div class="flex items-center gap-2 opacity-50">
                    <div class="w-10 h-10 bg-gray-300 rounded-full flex items-center justify-center text-white font-bold">2</div>
                    <span>Confirmation</span>
                </div>
                <div class="flex items-center gap-2 opacity-50">
                    <div class="w-10 h-10 bg-gray-300 rounded-full flex items-center justify-center text-white font-bold">3</div>
                    <span>Avis</span>
                </div>
            </div>
            
            <div class="bg-white rounded-3xl p-6 shadow-sm mb-6">
                <div class="flex items-center gap-3 mb-6">
                    <svg class="w-8 h-8 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                    </svg>
                    <h2 class="text-xl font-bold">Carte bancaire</h2>
                </div>
                
                <form id="checkout-form" action="{{ route('guest.services.checkout.process', $service) }}" method="POST">
                    @csrf
                    
                    <div class="space-y-5">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Titulaire de la carte</label>
                            <input type="text" name="guest_name" required class="w-full border border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500" placeholder="Votre nom">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Numéro de carte</label>
                            <div class="relative">
                                <input type="text" inputmode="numeric" class="w-full border border-gray-200 rounded-xl px-4 py-3 pr-12 focus:outline-none focus:ring-2 focus:ring-orange-500" placeholder="4242 4242 4242 4242">
                                <svg class="absolute right-4 top-1/2 -translate-y-1/2 w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                </svg>
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Expiration</label>
                                <input type="text" class="w-full border border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500" placeholder="12/28">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">CVC</label>
                                <div class="relative">
                                    <input type="text" inputmode="numeric" class="w-full border border-gray-200 rounded-xl px-4 py-3 pr-10 focus:outline-none focus:ring-2 focus:ring-orange-500" placeholder="123">
                                    <svg class="absolute right-3 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                            <input type="email" name="guest_email" required class="w-full border border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500" placeholder="votre@email.com">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Quantité</label>
                            <input type="number" name="quantity" value="1" min="1" required class="w-full border border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500">
                        </div>
                    </div>
                </form>
                
                <div class="mt-6 p-4 bg-orange-50 rounded-2xl text-sm text-orange-700">
                    <p class="flex items-start gap-2">
                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Mode Stripe Sandbox - aucune carte réelle ne sera débité. Utilisez 4242 4242 4242 4242.
                    </p>
                </div>
            </div>
            
            <div class="bg-white rounded-3xl p-6 shadow-sm">
                <h3 class="text-xl font-bold mb-4">Votre commande</h3>
                
                <div class="border-b border-gray-100 pb-4 mb-4">
                    <div class="flex items-center justify-between mb-2">
                        <div>
                            <p class="font-semibold">{{ $service->name }}</p>
                            <p class="text-sm text-gray-500">{{ $service->category }}</p>
                        </div>
                        <p class="font-semibold">{{ number_format($service->price, 2) }} €</p>
                    </div>
                </div>
                
                <div class="space-y-2 mb-6">
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-500">Sous-total</span>
                        <span>{{ number_format($service->price, 2) }} €</span>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-500">Frais de service</span>
                        <span>0.00 €</span>
                    </div>
                </div>
                
                <div class="flex justify-between text-xl font-bold pt-4 border-t border-gray-100">
                    <span>Total à payer</span>
                    <span class="text-orange-500">{{ number_format($service->price, 2) }} €</span>
                </div>
                
                <div class="mt-4 flex items-center gap-2 text-sm text-green-600">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Paiement chiffré - propulsé par Stripe
                </div>
            </div>
            
            <button type="submit" form="checkout-form" class="w-full bg-orange-500 text-white py-4 rounded-2xl font-bold text-lg mt-6 hover:bg-orange-600 transition">
                <span class="flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                    Payer {{ number_format($service->price, 2) }} €
                </span>
            </button>
        </div>
    </div>
</x-layouts.guest>