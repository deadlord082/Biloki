<x-layouts.app>

    <div class="space-y-6">

        <div class="flex items-center gap-4">
            <a href="{{ route('services-additionnels') }}" class="text-gray-500 hover:text-gray-700">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
            </a>
            <div>
                <h1 class="text-3xl font-bold">Détails du service</h1>
                <p class="text-gray-500 mt-1">Gérez les informations de ce service</p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <div class="lg:col-span-2 space-y-6">
                <x-ui.card class="p-6">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-xl font-semibold">Informations générales</h2>
                        <button class="text-sky-600 hover:text-sky-700 font-medium">Modifier</button>
                    </div>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nom du service</label>
                            <p class="text-lg">Nettoyage supplémentaire</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                            <p class="text-gray-600">Nettoyage complet du logement en milieu de séjour, incluant le changement des draps et des serviettes</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Prix</label>
                            <p class="text-2xl font-bold text-sky-600">50 €</p>
                        </div>
                    </div>
                </x-ui.card>

                <x-ui.card class="p-6">
                    <h2 class="text-xl font-semibold mb-6">Statistiques</h2>
                    <div class="grid grid-cols-3 gap-4">
                        <div class="text-center p-4 bg-gray-50 rounded-2xl">
                            <p class="text-3xl font-bold text-sky-600">24</p>
                            <p class="text-gray-500 text-sm mt-1">Commandes</p>
                        </div>
                        <div class="text-center p-4 bg-gray-50 rounded-2xl">
                            <p class="text-3xl font-bold text-green-600">1 200 €</p>
                            <p class="text-gray-500 text-sm mt-1">Revenus</p>
                        </div>
                        <div class="text-center p-4 bg-gray-50 rounded-2xl">
                            <p class="text-3xl font-bold text-purple-600">4.8</p>
                            <p class="text-gray-500 text-sm mt-1">Note moyenne</p>
                        </div>
                    </div>
                </x-ui.card>
            </div>

            <div class="space-y-6">
                <x-ui.card class="p-6">
                    <h2 class="text-xl font-semibold mb-6">Actions</h2>
                    <div class="space-y-3">
                        <a href="{{ route('services-additionnels.edit', 1) }}" class="w-full bg-sky-600 text-white px-6 py-3 rounded-xl font-medium hover:bg-sky-700 block text-center">
                            Modifier le service
                        </a>
                        <button class="w-full border border-gray-300 text-gray-700 px-6 py-3 rounded-xl font-medium hover:bg-gray-50">
                            Désactiver
                        </button>
                        <button class="w-full border border-red-300 text-red-600 px-6 py-3 rounded-xl font-medium hover:bg-red-50">
                            Supprimer
                        </button>
                    </div>
                </x-ui.card>
            </div>

        </div>

    </div>

</x-layouts.app>
