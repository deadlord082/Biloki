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