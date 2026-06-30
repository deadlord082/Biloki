<x-layouts.app>

    <div class="space-y-6">

        <div class="flex items-center justify-between">
            <div class="flex items-center gap-4">
                <a href="{{ route('services-additionnels') }}" class="text-gray-500 hover:text-gray-700">
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
                <a href="{{ route('services-additionnels') }}" class="border border-gray-300 text-gray-700 px-4 py-2 rounded-xl text-sm hover:bg-gray-50 inline-block">Voir le catalogue</a>
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
                        <option>Nettoyage supplémentaire</option>
                        <option>Petit-déjeuner</option>
                        <option>Service de navette</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs text-gray-500 mb-1">Catégorie</label>
                    <select class="w-full border border-gray-200 rounded-xl px-3 py-2 text-sm">
                        <option>Toutes les catégories</option>
                        <option>Confort & flexibilité</option>
                        <option>Mobilité & transport</option>
                        <option>Bien-être & expériences</option>
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
                <p class="text-3xl font-bold">721</p>
                <p class="text-xs text-gray-500 mt-1">sur la période sélectionnée</p>
                <div class="mt-3 flex items-center gap-1 text-green-600 text-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11l5-5m0 0l5 5m-5-5v12" />
                    </svg>
                    <span>+12,4 % vs période précédente</span>
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
                <p class="text-3xl font-bold">25 087 €</p>
                <p class="text-xs text-gray-500 mt-1">généré par les services additionnels</p>
                <div class="mt-3 flex items-center gap-1 text-green-600 text-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11l5-5m0 0l5 5m-5-5v12" />
                    </svg>
                    <span>+18,2 % vs période précédente</span>
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
                <p class="text-3xl font-bold">48,34 €</p>
                <p class="text-xs text-gray-500 mt-1">519 voyageurs utilisateurs</p>
                <div class="mt-3 flex items-center gap-1 text-green-600 text-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11l5-5m0 0l5 5m-5-5v12" />
                    </svg>
                    <span>+8,6 % vs période précédente</span>
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
                        <tr class="border-b">
                            <td class="py-4">Petit-déjeuner livré</td>
                            <td class="py-4">
                                <span class="px-2 py-1 bg-blue-50 text-blue-600 rounded-full text-xs">Confort & flexibilité</span>
                            </td>
                            <td class="py-4">184</td>
                            <td class="py-4">2 760 €</td>
                            <td class="py-4 flex items-center gap-1">
                                <svg class="w-4 h-4 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                4.8
                            </td>
                            <td class="py-4">124</td>
                        </tr>
                        <tr class="border-b">
                            <td class="py-4">Location de vélo électrique</td>
                            <td class="py-4">
                                <span class="px-2 py-1 bg-cyan-50 text-cyan-600 rounded-full text-xs">Mobilité & transport</span>
                            </td>
                            <td class="py-4">96</td>
                            <td class="py-4">2 400 €</td>
                            <td class="py-4 flex items-center gap-1">
                                <svg class="w-4 h-4 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                4.8
                            </td>
                            <td class="py-4">58</td>
                        </tr>
                        <tr class="border-b">
                            <td class="py-4">Massage à domicile</td>
                            <td class="py-4">
                                <span class="px-2 py-1 bg-pink-50 text-pink-600 rounded-full text-xs">Bien-être & expériences</span>
                            </td>
                            <td class="py-4">47</td>
                            <td class="py-4">4 183 €</td>
                            <td class="py-4 flex items-center gap-1">
                                <svg class="w-4 h-4 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                4.9
                            </td>
                            <td class="py-4">42</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </x-ui.card>

    </div>

</x-layouts.app>