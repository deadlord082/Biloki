<x-layouts.app>

    <div class="space-y-6">

        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold">Services additionnels</h1>
                <p class="text-gray-500 mt-1">Gérez les services complémentaires proposés à vos clients</p>
            </div>
            <div class="flex gap-3">
                <a href="{{ route('services-additionnels.statistics') }}" class="border border-gray-300 text-gray-700 px-6 py-2 rounded-xl font-medium hover:bg-gray-50 inline-block">
                    Statistiques
                </a>
                <a href="{{ route('services-additionnels.create') }}" class="bg-sky-600 text-white px-6 py-2 rounded-xl font-medium hover:bg-sky-700 inline-block">
                    Ajouter un service
                </a>
            </div>
        </div>

        <x-ui.card class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @php
                $services = [
                    ['nom' => 'Nettoyage supplémentaire', 'prix' => 50, 'description' => 'Nettoyage complet du logement en milieu de séjour', 'categorie' => 'Confort & flexibilité'],
                    ['nom' => 'Petit-déjeuner', 'prix' => 15, 'description' => 'Petit-déjeuner continental livré au logement', 'categorie' => 'Bien-être & expériences'],
                    ['nom' => 'Service de navette', 'prix' => 30, 'description' => 'Navette depuis/vers la gare ou l\'aéroport', 'categorie' => 'Mobilité & transport']
                ];
                @endphp

                @foreach($services as $index => $service)
                    <a href="{{ route('services-additionnels.show', $index + 1) }}" class="border border-gray-200 rounded-2xl p-5 hover:shadow-md transition-shadow block">
                    <span class="inline-block px-3 py-1 bg-gray-100 text-gray-700 rounded-full text-sm mb-3">{{ $service['categorie'] }}</span>
                    <h3 class="text-xl font-semibold">{{ $service['nom'] }}</h3>
                    <p class="text-gray-500 mt-2">{{ $service['description'] }}</p>
                    <div class="mt-4 flex items-center justify-between">
                        <span class="text-2xl font-bold text-sky-600">{{ $service['prix'] }} €</span>
                        <div class="text-gray-500 hover:text-sky-600">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </div>
                    </div>
                @endforeach
            </div>
        </x-ui.card>

    </div>

</x-layouts.app>
