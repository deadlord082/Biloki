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
                    <h1 class="text-3xl font-bold">Tableau de bord — Services additionnels</h1>
                    <p class="text-gray-500 mt-1">Suivez les performances de vos services complémentaires et l'engagement des voyageurs.</p>
                </div>
            </div>
            <div class="flex gap-3">
                <x-ui.button as="a" href="{{ route('services-additionnels.index') }}" variant="secondary" size="sm">
                    Voir le catalogue
                </x-ui.button>
            </div>
        </div>

        <!-- Filters -->
        <x-ui.card class="p-6">
            <div class="flex items-center gap-2 mb-4">
                <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                </svg>
                <h2 class="text-sm font-medium text-gray-700">Filtres</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div>
                    <label class="block text-xs text-gray-500 mb-1">Date de début</label>
                    <input type="date" class="w-full border border-gray-200 rounded-xl px-3 py-2 text-sm">
                </div>
                <div>
                    <label class="block text-xs text-gray-500 mb-1">Date de fin</label>
                    <input type="date" class="w-full border border-gray-200 rounded-xl px-3 py-2 text-sm">
                </div>
                <div>
                    <label class="block text-xs text-gray-500 mb-1">Service</label>
                    <select class="w-full border border-gray-200 rounded-xl px-3 py-2 text-sm">
                        <option>Tous les services</option>
                        @foreach($services as $service)
                            <option value="{{ $service->id }}">{{ $service->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-xs text-gray-500 mb-1">Catégorie</label>
                    <select class="w-full border border-gray-200 rounded-xl px-3 py-2 text-sm">
                        <option>Toutes les catégories</option>
                        <option>Confort & flexibilité</option>
                        <option>Mobilité & transport</option>
                        <option>Bien-être & expériences</option>
                        <option>Commodités pratiques</option>
                    </select>
                </div>
            </div>
        </x-ui.card>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <x-ui.card class="p-6">
                <div class="flex items-start justify-between mb-4">
                    <h3 class="text-sm font-medium text-gray-700">Services vendus</h3>
                    <div class="w-9 h-9 bg-blue-50 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h5.586a1 1 0 00.707-.293l4.414-4.414A1 1 0 0018 16.586V7a2 2 0 00-2-2h-2M13 7a2 2 0 00-2 2v8a2 2 0 002 2h2.586" />
                        </svg>
                    </div>
                </div>
                <p class="text-3xl font-bold">{{ $totalServicesSold }}</p>
                <p class="text-xs text-gray-500 mt-1">sur la période sélectionnée</p>
                <div class="mt-3 flex items-center gap-1 text-gray-500 text-sm">
                    <span>Données en cours de collecte</span>
                </div>
            </x-ui.card>

            <x-ui.card class="p-6">
                <div class="flex items-start justify-between mb-4">
                    <h3 class="text-sm font-medium text-gray-700">Chiffre d'affaires</h3>
                    <div class="w-9 h-9 bg-green-50 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
                <p class="text-3xl font-bold">{{ number_format($totalRevenue, 2) }} €</p>
                <p class="text-xs text-gray-500 mt-1">généré par les services additionnels</p>
                <div class="mt-3 flex items-center gap-1 text-gray-500 text-sm">
                    <span>Données en cours de collecte</span>
                </div>
            </x-ui.card>

            <x-ui.card class="p-6">
                <div class="flex items-start justify-between mb-4">
                    <h3 class="text-sm font-medium text-gray-700">Panier moyen / voyageur</h3>
                    <div class="w-9 h-9 bg-blue-50 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                </div>
                <p class="text-3xl font-bold">-</p>
                <p class="text-xs text-gray-500 mt-1">Données en cours de collecte</p>
                <div class="mt-3 flex items-center gap-1 text-gray-500 text-sm">
                    <span>Données en cours de collecte</span>
                </div>
            </x-ui.card>
        </div>

        <!-- Charts Section -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-2">
                <x-ui.card class="p-6">
                    <h3 class="text-sm font-medium text-gray-700 mb-4">Évolution mensuelle</h3>
                    <p class="text-xs text-gray-500 mb-6">Ventes et chiffre d'affaires</p>
                    <div class="h-64 bg-gray-50 rounded-xl flex items-center justify-center">
                        <p class="text-gray-400 text-sm">Graphique d'évolution</p>
                    </div>
                </x-ui.card>
            </div>

            <div>
                <x-ui.card class="p-6">
                    <h3 class="text-sm font-medium text-gray-700 mb-4">Répartition par catégorie</h3>
                    <p class="text-xs text-gray-500 mb-6">Part des ventes</p>
                    <div class="h-64 bg-gray-50 rounded-xl flex items-center justify-center">
                        <p class="text-gray-400 text-sm">Diagramme circulaire</p>
                    </div>
                </x-ui.card>
            </div>
        </div>

        <!-- Top Services -->
        <x-ui.card class="p-6">
            <h3 class="text-sm font-medium text-gray-700 mb-4">Services les plus vendus</h3>
            <p class="text-xs text-gray-500 mb-6">Top 5 sur la période sélectionnée</p>
            <div class="h-64 bg-gray-50 rounded-xl flex items-center justify-center">
                <p class="text-gray-400 text-sm">Histogramme des services</p>
            </div>
        </x-ui.card>

        <!-- Detailed Table -->
        <x-ui.card class="p-6">
            <h3 class="text-sm font-medium text-gray-700 mb-4">Détail par service</h3>
            <p class="text-xs text-gray-500 mb-6">Performances de chaque service additionnel</p>
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="text-left text-gray-500 border-b">
                        <tr class="border-b">
                            <th class="pb-3 font-medium">Service</th>
                            <th class="pb-3 font-medium">Catégorie</th>
                            <th class="pb-3 font-medium">Ventes</th>
                            <th class="pb-3 font-medium">Chiffre d'affaires</th>
                            <th class="pb-3 font-medium">Note moyenne</th>
                            <th class="pb-3 font-medium">Avis</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($services as $service)
                            <tr class="border-b">
                                <td class="py-4">{{ $service->name }}</td>
                                <td class="py-4">
                                    <span class="px-2 py-1 bg-blue-50 text-blue-600 rounded-full text-xs">{{ $service->category }}</span>
                                </td>
                                <td class="py-4">{{ $service->sales_count }}</td>
                                <td class="py-4">{{ number_format($service->sales_sum, 2) }} €</td>
                                <td class="py-4 flex items-center gap-1">
                                    -
                                </td>
                                <td class="py-4">-</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </x-ui.card>

    </div>

</x-layouts.app>