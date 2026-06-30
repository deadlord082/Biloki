<?php

use App\Http\Controllers\ServiceController;
use App\Http\Controllers\GuestServiceController;
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

Route::resource('services-additionnels', ServiceController::class)->names([
    'index' => 'services-additionnels.index',
    'show' => 'services-additionnels.show',
    'create' => 'services-additionnels.create',
    'store' => 'services-additionnels.store',
    'edit' => 'services-additionnels.edit',
    'update' => 'services-additionnels.update',
    'destroy' => 'services-additionnels.destroy',
]);

Route::get('/services-additionnels/statistics', [ServiceController::class, 'statistics'])->name('services-additionnels.statistics');

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

        // Guest Services Routes
        Route::prefix('services')
            ->name('services.')
            ->group(function () {
                Route::get('/', [GuestServiceController::class, 'index'])->name('index');
                Route::get('/{service}', [GuestServiceController::class, 'show'])->name('show');
                Route::get('/{service}/checkout', [GuestServiceController::class, 'checkout'])->name('checkout');
                Route::post('/{service}/checkout', [GuestServiceController::class, 'processCheckout'])->name('checkout.process');
                Route::get('/confirmation/{sale}', [GuestServiceController::class, 'confirmation'])->name('confirmation');
                Route::get('/{service}/review', [GuestServiceController::class, 'reviewForm'])->name('review');
                Route::post('/{service}/review', [GuestServiceController::class, 'submitReview'])->name('review.submit');
            });
    });
