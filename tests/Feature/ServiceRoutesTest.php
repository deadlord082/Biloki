<?php

use App\Models\Service;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

describe('service backoffice routes', function () {
    it('renders the service details page and generates edit links', function () {
        $service = Service::create([
            'name' => 'Massage relaxant',
            'description' => 'Service test',
            'price' => 49.99,
            'pricing_mode' => 'forfait',
            'category' => 'bien-être',
            'is_active' => true,
        ]);

        $showUrl = route('services-additionnels.show', $service);
        $editUrl = route('services-additionnels.edit', $service);

        expect($showUrl)->toContain('/services-additionnels/' . $service->getKey());
        expect($editUrl)->toContain('/services-additionnels/' . $service->getKey() . '/edit');

        $this->get($showUrl)->assertOk();
    });
});
