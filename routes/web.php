<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'dashboard.index')->name('dashboard');

Route::view('/hebergements', 'hebergements.index')
    ->name('hebergements');

Route::view('/reservations', 'reservations.index')
    ->name('reservations');

Route::view('/planning', 'planning.index')
    ->name('planning');

Route::view('/equipes', 'equipes.index')
    ->name('equipes');

Route::view('/messagerie', 'messagerie.index')
    ->name('messagerie');

Route::view('/statistiques', 'statistiques.index')
    ->name('statistiques');

Route::view('/avis', 'avis.index')
    ->name('avis');

Route::view('/entretiens', 'entretiens.index')
    ->name('entretiens');

Route::view('/support', 'support.index')
    ->name('support');

Route::view('/marketplace', 'marketplace.index')
    ->name('marketplace');

Route::view('/parametres', 'parametres.index')
    ->name('parametres');