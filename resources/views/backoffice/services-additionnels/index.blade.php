<x-layouts.app>

    <div class="space-y-6">

        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold">Services additionnels</h1>
                <p class="text-gray-500 mt-1">Gérez les services complémentaires proposés à vos clients</p>
            </div>
            <div class="flex gap-3">
                <x-ui.button as="a" href="{{ route('services-additionnels.statistics') }}" variant="secondary">
                    Statistiques
                </x-ui.button>
                <x-ui.button as="a" href="{{ route('services-additionnels.create') }}">
                    Ajouter un service
                </x-ui.button>
            </div>
        </div>

        <x-ui.card class="p-6">
            <div class="mb-6 flex items-center gap-4">
                <div class="w-64">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Filtrer par catégorie</label>
                    <form method="GET" id="filter-form">
                        <select name="category" id="category-filter" class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-sky-500" onchange="document.getElementById('filter-form').submit()">
                            <option value="">Toutes les catégories</option>
                            @foreach($categories as $category)
                                <option value="{{ $category }}" {{ request('category') === $category ? 'selected' : '' }}>
                                    {{ $category }}
                                </option>
                            @endforeach
                        </select>
                    </form>
                </div>
            </div>

            @if($services->isEmpty())
                <div class="text-center py-12">
                    <p class="text-gray-500">Aucun service n'a été créé pour le moment.</p>
                    <x-ui.button as="a" href="{{ route('services-additionnels.create') }}" class="mt-4">
                        Créer mon premier service
                    </x-ui.button>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($services as $service)
                        <a href="{{ route('services-additionnels.show', $service) }}" class="border border-gray-200 rounded-2xl p-5 hover:shadow-md transition-shadow block">
                            <div class="flex items-center justify-between mb-3">
                                <span class="inline-block px-3 py-1 bg-gray-100 text-gray-700 rounded-full text-sm">{{ $service->category }}</span>
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $service->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $service->is_active ? 'Actif' : 'Inactif' }}
                                </span>
                            </div>
                            @if($service->images->count() > 0)
                                <img src="{{ $service->images->first()->image_url }}" alt="{{ $service->name }}" class="w-full h-40 object-cover rounded-xl mb-4">
                            @elseif($service->photo)
                                <img src="{{ asset('storage/' . $service->photo) }}" alt="{{ $service->name }}" class="w-full h-40 object-cover rounded-xl mb-4">
                            @endif
                            <h3 class="text-xl font-semibold">{{ $service->name }}</h3>
                            <p class="text-gray-500 mt-2">{{ $service->description }}</p>
                            <div class="mt-4 flex items-center justify-between">
                                <span class="text-2xl font-bold text-sky-600">{{ $service->price }} €</span>
                                <div class="text-gray-500 hover:text-sky-600">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            @endif
        </x-ui.card>

    </div>

</x-layouts.app>
