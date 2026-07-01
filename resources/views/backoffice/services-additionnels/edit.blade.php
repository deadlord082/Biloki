<x-layouts.app>

    <div class="space-y-6">

        <div class="flex items-center justify-between">
            <div class="flex items-center gap-4">
                <a href="{{ route('services-additionnels.index') }}" class="text-gray-500 hover:text-gray-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                </a>
                <div>
                    <h1 class="text-3xl font-bold">Modifier le service</h1>
                    <p class="text-gray-500 mt-1">Mettez à jour les informations de ce service</p>
                </div>
            </div>
            <div class="flex gap-3">
                <x-ui.button as="a" href="{{ route('services-additionnels.index') }}" variant="secondary">
                    Annuler
                </x-ui.button>
                <x-ui.button type="submit" form="edit-service-form">
                    Mettre à jour
                </x-ui.button>
            </div>
        </div>

        <form id="edit-service-form" action="{{ route('services-additionnels.update', $service) }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            @csrf
            @method('PUT')

            <div class="lg:col-span-2 space-y-6">
                <x-ui.card class="p-6">
                    <h2 class="text-xl font-semibold mb-6">Informations générales</h2>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Nom du service</label>
                            <input type="text" name="name" class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-sky-500" value="{{ old('name', $service->name) }}" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                            <textarea name="description" rows="4" class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-sky-500">{{ old('description', $service->description) }}</textarea>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Photo du service</label>
                            @if($service->photo)
                                <div class="mb-3">
                                    <img src="{{ asset('storage/' . $service->photo) }}" alt="Photo du service" class="h-32 rounded-xl object-cover">
                                </div>
                            @endif
                            <input type="file" name="photo" accept="image/*" class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-sky-500">
                        </div>
                    </div>
                </x-ui.card>

                <x-ui.card class="p-6">
                    <h2 class="text-xl font-semibold mb-6">Tarification & catégorie</h2>
                    <p class="text-gray-500 text-sm mb-6">Définissez comment ce service est facturé et où il apparaît dans le catalogue.</p>
                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Prix</label>
                            <div class="relative">
                                <input type="number" name="price" step="0.01" class="w-full border border-gray-300 rounded-xl px-4 py-3 pr-12 focus:outline-none focus:ring-2 focus:ring-sky-500" value="{{ old('price', $service->price) }}" required>
                                <span class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-500">€</span>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Mode de tarification</label>
                            <select name="pricing_mode" class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-sky-500" required>
                                <option value="">Sélectionnez un mode</option>
                                <option value="Prix fixe" {{ old('pricing_mode', $service->pricing_mode) === 'Prix fixe' ? 'selected' : '' }}>Prix fixe</option>
                                <option value="Par personne" {{ old('pricing_mode', $service->pricing_mode) === 'Par personne' ? 'selected' : '' }}>Par personne</option>
                                <option value="Par jour" {{ old('pricing_mode', $service->pricing_mode) === 'Par jour' ? 'selected' : '' }}>Par jour</option>
                                <option value="Par unité" {{ old('pricing_mode', $service->pricing_mode) === 'Par unité' ? 'selected' : '' }}>Par unité</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Catégorie</label>
                        <select name="category" class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-sky-500" required>
                            <option value="">Choisissez une catégorie</option>
                            <option value="Confort & flexibilité" {{ old('category', $service->category) === 'Confort & flexibilité' ? 'selected' : '' }}>Confort & flexibilité</option>
                            <option value="Mobilité & transport" {{ old('category', $service->category) === 'Mobilité & transport' ? 'selected' : '' }}>Mobilité & transport</option>
                            <option value="Bien-être & expériences" {{ old('category', $service->category) === 'Bien-être & expériences' ? 'selected' : '' }}>Bien-être & expériences</option>
                            <option value="Commodités pratiques" {{ old('category', $service->category) === 'Commodités pratiques' ? 'selected' : '' }}>Commodités pratiques</option>
                        </select>
                    </div>
                </x-ui.card>

                <x-ui.card class="p-6">
                    <h2 class="text-xl font-semibold mb-6">Logements associés</h2>
                    <p class="text-gray-500 text-sm mb-6">Choisissez pour quel(s) logement(s) ce service est disponible. Laissez vide pour tous les logements.</p>
                    <div class="space-y-3">
                        {{-- We'll use dummy accommodations for now since we haven't seeded the DB --}}
                        <label class="flex items-center gap-3 p-3 border border-gray-200 rounded-xl hover:bg-gray-50 cursor-pointer">
                            <input type="checkbox" name="accommodations[]" value="1" class="w-5 h-5 rounded border-gray-300 text-sky-600 focus:ring-sky-500">
                            <span class="font-medium">Tous les logements</span>
                        </label>
                        <label class="flex items-center gap-3 p-3 border border-gray-200 rounded-xl hover:bg-gray-50 cursor-pointer">
                            <input type="checkbox" name="accommodations[]" value="2" class="w-5 h-5 rounded border-gray-300 text-sky-600 focus:ring-sky-500">
                            <span class="font-medium">Appartement Vieux-Port</span>
                        </label>
                        <label class="flex items-center gap-3 p-3 border border-gray-200 rounded-xl hover:bg-gray-50 cursor-pointer">
                            <input type="checkbox" name="accommodations[]" value="3" class="w-5 h-5 rounded border-gray-300 text-sky-600 focus:ring-sky-500">
                            <span class="font-medium">Studio Bastille</span>
                        </label>
                    </div>
                </x-ui.card>

                <x-ui.card class="p-6">
                    <h2 class="text-xl font-semibold mb-6">Statut</h2>
                    <div class="space-y-4">
                        <div class="flex items-center gap-3">
                            <input type="checkbox" id="is_active" name="is_active" {{ old('is_active', $service->is_active) ? 'checked' : '' }} class="w-5 h-5 rounded border-gray-300 text-sky-600 focus:ring-sky-500">
                            <label for="is_active" class="text-gray-700">Service disponible immédiatement</label>
                        </div>
                    </div>
                </x-ui.card>
            </div>

            <div class="space-y-6">
                <x-ui.card class="p-6">
                    <h2 class="text-xl font-semibold mb-6">Statut</h2>
                    <div class="p-4 bg-green-50 rounded-2xl">
                        <p class="text-green-700">Ce service est actuellement publié et visible par les clients.</p>
                    </div>
                </x-ui.card>
            </div>

        </form>

    </div>

</x-layouts.app>
