<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'backoffice.dashboard.index')->name('dashboard');

Route::view('/hebergements', 'backoffice.hebergements.index')
    ->name('hebergements');

Route::view('/reservations', 'backoffice.reservations.index')
    ->name('reservations');

Route::view('/planning', 'backoffice.planning.index')
    ->name('planning');

Route::view('/equipes', 'backoffice.equipes.index')
    ->name('equipes');

Route::view('/messagerie', 'backoffice.messagerie.index')
    ->name('messagerie');

Route::view('/statistiques', 'backoffice.statistiques.index')
    ->name('statistiques');

Route::view('/avis', 'backoffice.avis.index')
    ->name('avis');

Route::view('/entretiens', 'backoffice.entretiens.index')
    ->name('entretiens');

Route::view('/support', 'backoffice.support.index')
    ->name('support');

Route::view('/marketplace', 'backoffice.marketplace.index')
    ->name('marketplace');

Route::view('/parametres', 'backoffice.parametres.index')
    ->name('parametres');

Route::view('/services-additionnels', 'backoffice.services-additionnels.index')
    ->name('services-additionnels');

Route::view('/services-additionnels/{id}', 'backoffice.services-additionnels.show')
    ->name('services-additionnels.show');

Route::view('/services-additionnels/create', 'backoffice.services-additionnels.create')
    ->name('services-additionnels.create');

Route::view('/services-additionnels/{id}/edit', 'backoffice.services-additionnels.edit')
    ->name('services-additionnels.edit');

Route::view('/services-additionnels/statistics', 'backoffice.services-additionnels.statistics')
    ->name('services-additionnels.statistics');

Route::prefix('guest')
    ->name('guest.')
    ->group(function () {

        Route::view('/', 'guest.index')->name('home');

        Route::view('/directions', 'guest.directions')
            ->name('directions');

        Route::view('/access', 'guest.access')
            ->name('access');

        Route::view('/wifi', 'guest.wifi')
            ->name('wifi');

        Route::view('/messages', 'guest.messages')
            ->name('messages');

        Route::view('/accommodation', 'guest.accommodation')
            ->name('accommodation');

        Route::view('/arrival', 'guest.arrival')
            ->name('arrival');

        Route::view('/recommendations', 'guest.recommendations')
            ->name('recommendations');

        Route::view('/emergency', 'guest.emergency')
            ->name('emergency');

    });
