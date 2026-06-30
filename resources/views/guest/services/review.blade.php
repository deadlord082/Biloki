<x-layouts.guest>
    <div class="min-h-screen bg-orange-50">
        <div class="p-6">
            <div class="flex items-center justify-between mb-8">
                <div class="flex items-center gap-2 opacity-50">
                    <div class="w-10 h-10 bg-gray-300 rounded-full flex items-center justify-center text-white font-bold">1</div>
                    <span>Paiement</span>
                </div>
                <div class="flex items-center gap-2 opacity-50">
                    <div class="w-10 h-10 bg-gray-300 rounded-full flex items-center justify-center text-white font-bold">2</div>
                    <span>Confirmation</span>
                </div>
                <div class="flex items-center gap-2">
                    <div class="w-10 h-10 bg-orange-500 rounded-full flex items-center justify-center text-white font-bold">3</div>
                    <span class="font-semibold">Avis</span>
                </div>
            </div>
            
            <div class="bg-white rounded-3xl p-6 shadow-sm mb-6">
                <div class="flex items-start gap-3 mb-6">
                    <div class="w-10 h-10 bg-orange-100 rounded-full flex items-center justify-center text-orange-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold">Comment s'est passé votre service ?</h2>
                        <p class="text-gray-500 mt-1">Votre avis aide les futurs voyageurs et notre conciergerie à s'améliorer.</p>
                    </div>
                </div>
                
                <div class="bg-gray-50 rounded-2xl p-4 mb-6 flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 bg-gray-200 rounded-xl flex items-center justify-center text-2xl">🏨</div>
                        <div>
                            <p class="font-semibold">{{ $service->name }}</p>
                            <p class="text-sm text-gray-500">{{ $service->category }}</p>
                        </div>
                    </div>
                    <span class="px-3 py-1 bg-green-100 text-green-600 rounded-full text-xs">Acheté</span>
                </div>
                
                <p class="text-xs text-gray-400 mb-6">
                    <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Vous ne pouvez déposer un avis que sur les services que vous avez réellement achetés.
                </p>
            </div>
            
            <div class="bg-white rounded-3xl p-6 shadow-sm">
                <form id="review-form" action="{{ route('guest.services.review.submit', $service) }}" method="POST">
                    @csrf
                    
                    <h3 class="text-lg font-bold mb-4">Votre note</h3>
                    
                    <div class="flex items-center justify-center gap-3 mb-6" id="star-rating">
                        @for($i = 1; $i <= 5; $i++)
                            <button type="button" class="star-btn" data-rating="{{ $i }}">
                                <svg class="w-10 h-10 text-gray-300 hover:text-yellow-400 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                            </button>
                        @endfor
                    </div>
                    <input type="hidden" name="rating" id="rating-input" value="0">
                    
                    <h3 class="text-lg font-bold mb-4">Votre commentaire (optionnel)</h3>
                    <textarea name="comment" rows="4" class="w-full border border-gray-200 rounded-2xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500 mb-4" placeholder="Partagez votre expérience..."></textarea>
                    <div class="flex justify-between items-center mb-6">
                        <span class="text-xs text-gray-400"></span>
                        <span class="text-xs text-gray-400">0/500</span>
                    </div>
                    
                    <div class="flex items-center gap-3 mb-6 text-gray-500 text-sm">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        Publié le {{ now()->format('d/m/Y') }} par 
                        <span class="font-semibold text-gray-800">Camille D.</span>
                    </div>
                    
                    <div class="bg-blue-50 rounded-2xl p-4 mb-6 flex items-start gap-3">
                        <svg class="w-5 h-5 text-blue-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 018.382 5.04M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div class="text-sm text-blue-700">
                            <strong>RGPD</strong> : votre prénom et l'initiale de votre nom seront affichés publiquement, conformément aux règles d'affichage de la plateforme. Vos données restent protégées.
                        </div>
                    </div>
                    
                    <input type="hidden" name="guest_name" value="Camille D.">
                </form>
            </div>
            
            <button type="submit" form="review-form" class="w-full bg-orange-500 text-white py-4 rounded-2xl font-bold text-lg mt-6 opacity-50 cursor-not-allowed transition" id="submit-review" disabled>
                Publier mon avis
            </button>
            
            <p class="text-center text-sm text-gray-500 mt-4">
                Vous pourrez modifier votre avis pendant une période de 30 jours.
            </p>
            
            <a href="{{ route('guest.home') }}" class="w-full text-center text-gray-500 mt-4 block">
                Passer cette étape
            </a>
        </div>
    </div>
    
    <script>
        const starBtns = document.querySelectorAll('.star-btn');
        const ratingInput = document.getElementById('rating-input');
        const submitBtn = document.getElementById('submit-review');
        
        let currentRating = 0;
        
        starBtns.forEach((btn, index) => {
            btn.addEventListener('click', () => {
                currentRating = index + 1;
                ratingInput.value = currentRating;
                
                starBtns.forEach((b, i) => {
                    const svg = b.querySelector('svg');
                    if (i < currentRating) {
                        svg.classList.add('text-yellow-400');
                        svg.classList.remove('text-gray-300');
                        svg.setAttribute('fill', 'currentColor');
                    } else {
                        svg.classList.remove('text-yellow-400');
                        svg.classList.add('text-gray-300');
                        svg.setAttribute('fill', 'none');
                    }
                });
                
                submitBtn.disabled = false;
                submitBtn.classList.remove('opacity-50', 'cursor-not-allowed');
                submitBtn.classList.add('hover:bg-orange-600');
            });
            
            btn.addEventListener('mouseover', () => {
                starBtns.forEach((b, i) => {
                    const svg = b.querySelector('svg');
                    if (i <= index) {
                        svg.classList.add('text-yellow-400');
                        svg.classList.remove('text-gray-300');
                    } else if (i >= currentRating) {
                        svg.classList.remove('text-yellow-400');
                        svg.classList.add('text-gray-300');
                    }
                });
            });
            
            btn.addEventListener('mouseout', () => {
                starBtns.forEach((b, i) => {
                    const svg = b.querySelector('svg');
                    if (i < currentRating) {
                        svg.classList.add('text-yellow-400');
                        svg.classList.remove('text-gray-300');
                    } else {
                        svg.classList.remove('text-yellow-400');
                        svg.classList.add('text-gray-300');
                    }
                });
            });
        });
    </script>
</x-layouts.guest>