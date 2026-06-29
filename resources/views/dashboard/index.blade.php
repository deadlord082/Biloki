<x-layouts.app>

<div class="space-y-10">

    <div class="grid grid-cols-5 gap-6">

        <x-dashboard.stat-card
            title="Arrivées aujourd'hui"
            value="1"/>

        <x-dashboard.stat-card
            title="Départs aujourd'hui"
            value="0"/>

        <x-dashboard.stat-card
            title="Missions à faire"
            value="0"/>

        <x-dashboard.stat-card
            title="Occupés · 0 disponible"
            value="1 / 1"/>

        <x-dashboard.stat-card
            title="Messages non lus"
            value="0"/>

    </div>

    <x-dashboard.section-header title="Performance 7 jours">

        <x-slot:actions>

            <x-dashboard.filter-button>

                Tous les logements (1)

            </x-dashboard.filter-button>

            <x-dashboard.filter-button>

                7 derniers jours

            </x-dashboard.filter-button>

        </x-slot:actions>

    </x-dashboard.section-header>

    <div class="grid grid-cols-4 gap-6">

        <x-dashboard.performance-card
            value="0%"
            title="Taux d'occupation"
            subtitle="0 / 6 nuits"/>

        <x-dashboard.performance-card
            value="0 €"
            title="ADR"
            subtitle="0 / 0"/>

        <x-dashboard.performance-card
            value="0 €"
            title="RevPAR"
            subtitle="0 × 0"/>

        <x-dashboard.performance-card
            value="0 nuits"
            title="Séjour moyen"
            subtitle="0 / 0"/>

    </div>

</div>

</x-layouts.app>