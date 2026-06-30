<x-layouts.app>

    <div class="space-y-6">

        <div class="flex items-center gap-4">
            <a href="{{ route('services-additionnels.index') }}" class="text-gray-500 hover:text-gray-700">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
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
                        <a href="{{ route('services-additionnels.edit', $service) }}" class="text-sky-600 hover:text-sky-700 font-medium">Modifier</a>
                    </div>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nom du service</label>
                            <p class="text-lg">{{ $service->name }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                            <p class="text-gray-600">{{ $service->description }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Prix</label>
                            <p class="text-2xl font-bold text-sky-600">{{ $service->price }} €</p>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Mode de tarification</label>
                                <p class="text-gray-600">{{ $service->pricing_mode }}</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Catégorie</label>
                                <p class="text-gray-600">{{ $service->category }}</p>
                            </div>
                        </div>
                    </div>
                </x-ui.card>

                <x-ui.card class="p-6">
                    <h2 class="text-xl font-semibold mb-6">Statistiques</h2>
                    <div class="grid grid-cols-3 gap-4">
                        <div class="text-center p-4 bg-gray-50 rounded-2xl">
                            <p class="text-3xl font-bold text-sky-600">{{ $service->sales_count }}</p>
                            <p class="text-gray-500 text-sm mt-1">Commandes</p>
                        </div>
                        <div class="text-center p-4 bg-gray-50 rounded-2xl">
                            <p class="text-3xl font-bold text-green-600">{{ number_format($service->sales_sum, 2) }} €</p>
                            <p class="text-gray-500 text-sm mt-1">Revenus</p>
                        </div>
                        <div class="text-center p-4 bg-gray-50 rounded-2xl">
                            <p class="text-3xl font-bold text-purple-600">-</p>
                            <p class="text-gray-500 text-sm mt-1">Note moyenne</p>
                        </div>
                    </div>
                </x-ui.card>
            </div>

            <div class="space-y-6">
                <x-ui.card class="p-6">
                    <h2 class="text-xl font-semibold mb-6">Actions</h2>
                    <div class="space-y-3">
                        <a href="{{ route('services-additionnels.edit', $service) }}" class="w-full bg-sky-600 text-white px-6 py-3 rounded-xl font-medium hover:bg-sky-700 block text-center">
                            Modifier le service
                        </a>
                        <form action="{{ route('services-additionnels.update', $service) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="is_active" value="{{ $service->is_active ? 0 : 1 }}">
                            <button type="submit" class="w-full border border-gray-300 text-gray-700 px-6 py-3 rounded-xl font-medium hover:bg-gray-50">
                                {{ $service->is_active ? 'Désactiver' : 'Activer' }}
                            </button>
                        </form>
                        <form action="{{ route('services-additionnels.destroy', $service) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce service ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="w-full border border-red-300 text-red-600 px-6 py-3 rounded-xl font-medium hover:bg-red-50">
                                Supprimer
                            </button>
                        </form>
                    </div>
                </x-ui.card>
            </div>

        </div>

    </div>

</x-layouts.app>