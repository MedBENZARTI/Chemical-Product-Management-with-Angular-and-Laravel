<?php

use App\Http\Controllers\ProduitController;
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
// listeProduits
Route::get('/index', [ProduitController::class, 'index']);

//AjoutProduit
Route::post('/save', 'App\Http\Contollers\ProduitController@save');

//ModifierProduit
Route::put('/update/{id}', [ProduitController::class, 'update']);

//SupprimerProduit
Route::delete('/produits/{id}', [ProduitController::class, 'delete']);

//recherche produit
Route::get('/produit', [ProduitController::class, 'getProduit']);

Route::get('/greeting', function () {
    return 'Hello World';
});
