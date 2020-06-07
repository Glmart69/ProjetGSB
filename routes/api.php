<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('connexion', "ConnexionController@ApiConnexion");

Route::post('medicament',"MedicamentController@ApiListeMedicaments");

Route::get('interaction',"InteractionController@ApiListeInteractions");

Route::get('nomMedicament/{id}',"MedicamentController@ApiRecupererNom");

Route::get('suppression/{id}/{idSecMed}',"InteractionController@ApiSuppression");

Route::get('listeMedNonAjout',"InteractionController@ApiListMedNonAjout");

Route::get('ajoutInteraction/{id}/{idSecMed}', "InteractionController@ApiAjoutInteraction");
