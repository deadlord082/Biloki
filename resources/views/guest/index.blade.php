<x-layouts.guest>

<div class="p-6 space-y-4">

    <x-guest.topbar />

    <div>

        <h1 class="text-3xl font-bold">

            Bonjour Lucien

        </h1>

        <p class="text-gray-500">

            Espace Locataire

        </p>

    </div>

    <div class="grid grid-cols-2 gap-3">

        <x-guest.date-card
            icon="arrival"
            title="29 Juin 2026"
            subtitle="À partir de 15h00"/>

        <x-guest.date-card
            icon="departure"
            title="30 Juil 2026"
            subtitle="Avant 11h00"/>

    </div>

    <x-guest.action-card

        route="guest.directions"

        title="Comment venir ?"

        icon="car"

    />

    <div class="grid grid-cols-2 gap-3">

        <x-guest.action-card
            route="guest.access"
            title="Accès hébergement"
            icon="door"/>

        <x-guest.action-card
            route="guest.wifi"
            title="Connexion Wi-Fi"
            icon="wifi"/>

        <x-guest.action-card
            route="guest.messages"
            title="Messagerie"
            icon="message"/>

        <x-guest.action-card
            route="guest.accommodation"
            title="Votre logement"
            icon="home"/>

    </div>

    <div class="grid grid-cols-2 gap-3">

        <x-guest.large-card
            route="guest.arrival"
            title="Procédure d'arrivée"
            icon="arrival"/>

        <x-guest.large-card
            route="guest.recommendations"
            title="Les bons plans"
            icon="wallet"/>

    </div>

    <x-guest.action-card
        route="guest.emergency"
        title="Numéros d'urgences"
        icon="phone"/>

    <div class="text-center text-xs text-gray-400">

        v1.9.2

    </div>

</div>

</x-layouts.guest>