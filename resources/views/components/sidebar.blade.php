{{-- resources/views/components/sidebar.blade.php --}}

@php

$menu = [

    [
        'label' => 'Tableau de bord',
        'route' => 'dashboard',
        'icon' => 'dashboard',
    ],

    [
        'label' => 'Hébergements',
        'route' => 'hebergements',
        'icon' => 'home',
    ],

    [
        'label' => 'Réservations',
        'route' => 'reservations',
        'icon' => 'reservation',
    ],

    [
        'label' => 'Planning missions',
        'route' => 'planning',
        'icon' => 'calendar',
    ],

    [
        'label' => 'Équipes',
        'route' => 'equipes',
        'icon' => 'team',
    ],

    [
        'label' => 'Messagerie',
        'route' => 'messagerie',
        'icon' => 'message',
    ],

    [
        'label' => 'Statistiques',
        'route' => 'statistiques',
        'icon' => 'statistics',
    ],

    [
        'label' => 'Avis',
        'route' => 'avis',
        'icon' => 'star',
    ],

    [
        'label' => 'Entretiens',
        'route' => 'entretiens',
        'icon' => 'maintenance',
    ],

    [
        'label' => 'Support',
        'route' => 'support',
        'icon' => 'support',
    ],

    [
        'label' => 'Marketplace',
        'route' => 'marketplace',
        'icon' => 'marketplace',
    ],

    [
        'label' => 'Services additionnels',
        'route' => 'services-additionnels.index',
        'icon' => 'marketplace',
    ],

    [
        'label' => 'Paramètres',
        'route' => 'parametres',
        'icon' => 'settings',
    ],

];

@endphp

<aside class="w-72 bg-white border-r flex flex-col">

    {{-- Logo --}}

    <div class="p-6">

        <div class="flex items-center gap-4">

            <img
                src="{{ asset('images/logo.png') }}"
                class="h-14"
                alt="Logo">

            <div>

                <h2 class="font-bold text-2xl">
                    Bonjour Doriane
                </h2>

                <p class="text-gray-500 text-sm">
                    Espace Gestionnaire de biens
                </p>

            </div>

        </div>

    </div>

    <nav class="px-5 space-y-3">

    <nav class="px-5 space-y-3">
        
        @foreach($menu as $item)
            <x-sidebar-item
                :route="$item['route']"
                :icon="$item['icon']"
                :label="$item['label']"
            />
        @endforeach

    </nav>

</aside>