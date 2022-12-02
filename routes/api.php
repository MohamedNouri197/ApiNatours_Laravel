<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\CategorieController;
use App\Http\Controllers\API\AnnonceController;

use App\Http\Controllers\API\UtulisateurController;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('categories',CategorieController::class);
Route::apiResource('annonces',AnnonceController::class);
Route::apiResource('utulisateurs',UtulisateurController::class);
//Route::apiResource('annonces.addAnnonceToCategorie',AnnonceController::class);
