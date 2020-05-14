<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('vues.Accueil');
});

Route::get('/connexion', function () {
    return view('vues.login');
});

Route::get('/medicaments', "MedicamentController@ListeMedicaments");

Route::post('/medicaments', "MedicamentController@RechercheMedicament");

Route::get('/formulation/{id}', "FormulationController@AfficherFormulation");

Route::post('/connexion', "ConnexionController@Connexion");

Route::get('/deconnexion', "ConnexionController@Deconnexion");

Route::get('/supprimer/{id}', "MedicamentController@Supprimer");
