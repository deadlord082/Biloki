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
                    <h1 class="text-3xl font-bold">Ajouter un service</h1>
                    <p class="text-gray-500 mt-1">Créez un nouveau service complémentaire</p>
                </div>
            </div>
            <div class="flex gap-3">
                <a href="{{ route('services-additionnels.index') }}" class="border border-gray-300 text-gray-700 px-5 py-2 rounded-xl font-medium hover:bg-gray-50 inline-block">
                    Annuler
                </a>
                <button type="submit" form="create-service-form" class="bg-sky-600 text-white px-5 py-2 rounded-xl font-medium hover:bg-sky-700">
                    Enregistrer
                </button>
            </div>
        </div>

        <form id="create-service-form" action="{{ route('services-additionnels.store') }}" method="POST" class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            @csrf

            <div class="lg:col-span-2 space-y-6">
                <x-ui.card class="p-6">
                    <h2 class="text-xl font-semibold mb-6">Informations générales</h2>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Nom du service</label>
                            <input type="text" name="name" class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-sky-500" placeholder="Ex: Petit-déjeuner continental" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                            <textarea name="description" rows="4" class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-sky-500" placeholder="Décrivez ce que propose le service..."></textarea>
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
                                <input type="number" name="price" step="0.01" class="w-full border border-gray-300 rounded-xl px-4 py-3 pr-12 focus:outline-none focus:ring-2 focus:ring-sky-500" placeholder="0" required>
                                <span class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-500">€</span>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Mode de tarification</label>
                            <select name="pricing_mode" class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-sky-500" required>
                                <option value="">Sélectionnez un mode</option>
                                <option value="Prix fixe">Prix fixe</option>
                                <option value="Par personne">Par personne</option>
                                <option value="Par jour">Par jour</option>
                                <option value="Par unité">Par unité</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Catégorie</label>
                        <select name="category" class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-sky-500" required>
                            <option value="">Choisissez une catégorie</option>
                            <option value="Confort & flexibilité">Confort & flexibilité</option>
                            <option value="Mobilité & transport">Mobilité & transport</option>
                            <option value="Bien-être & expériences">Bien-être & expériences</option>
                            <option value="Commodités pratiques">Commodités pratiques</option>
                        </select>
                    </div>
                </x-ui.card>

                <x-ui.card class="p-6">
                    <h2 class="text-xl font-semibold mb-6">Disponibilité</h2>
                    <div class="space-y-4">
                        <div class="flex items-center gap-3">
                            <input type="checkbox" id="is_active" name="is_active" checked class="w-5 h-5 rounded border-gray-300 text-sky-600 focus:ring-sky-500">
                            <label for="is_active" class="text-gray-700">Service disponible immédiatement</label>
                        </div>
                    </div>
                </x-ui.card>
            </div>

            <div class="space-y-6">
                <x-ui.card class="p-6">
                    <h2 class="text-xl font-semibold mb-6">Statut</h2>
                    <div class="p-4 bg-gray-50 rounded-2xl">
                        <p class="text-gray-600">Ce service est actuellement en brouillon. Il ne sera visible par les clients qu'après sa publication.</p>
                    </div>
                </x-ui.card>
            </div>

        </form>

    </div>

</x-layouts.app>