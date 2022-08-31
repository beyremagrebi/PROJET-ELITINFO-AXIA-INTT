<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListFormController;
use App\Http\Controllers\ReclamationPretController;
use App\Http\Controllers\validationController;
use App\Http\Controllers\RaisonlogementController;
use App\Http\Controllers\logemnetController;
use App\Http\Controllers\boursescolaireController;
use App\Http\Controllers\bourseeidController;
use App\Http\Controllers\boursejourneeController;
use App\Http\Controllers\boursedeceController;
use App\Http\Controllers\boursecampController;
use App\Http\Controllers\boursedeverController;
use App\Http\Controllers\demandedonController;
use App\Http\Controllers\demandevoitureController;
use App\Http\Controllers\demandemaladieController;
use App\Http\Controllers\demandefeteController;
use App\Http\Controllers\ElboursenvneController;

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
Route::post('/login', [UserController::class, 'login']);
Route::post('/register', [UserController::class, 'register']);

Route::group(['middleware'=>['auth:sanctum']], function () {
    Route::get('/user',function(Request $request){
        return $request->user();
    });

    Route::get('/listform', [ListFormController::class, 'index']);
    Route::post('/send',[ReclamationPretController::class,'store']);
    Route::get('/listformside', [ListFormController::class, 'sidelist']);
    Route::get('/logout', [UserController::class, 'logout']);
    Route::get('/mesdemandes', [UserController::class, 'show']);
   
    /* validation */
Route::get('/demande',[validationController::class,'index']);
Route::get('/detials/{id}/{table}',[validationController::class,'details']);
Route::post('/accept',[validationController::class,'accept']);
Route::post('/refuse',[validationController::class,'refuse']);
    
Route::get('/raison', [RaisonlogementController::class, 'index']);



Route::prefix('/logement')->group(function () {
    Route::post('/send',[logemnetController::class,'store']);
});
Route::prefix('/boursescolaire')->group(function () {
    Route::post('/send',[boursescolaireController::class,'store']);
});
Route::prefix('/bourseeid')->group(function () {
    Route::post('/send',[bourseeidController::class,'store']);
});
Route::prefix('/boursejours')->group(function () {
    Route::post('/send',[boursejourneeController::class,'store']);
});
Route::prefix('/boursedce')->group(function () {
    Route::post('/send',[boursedeceController::class,'store']);
});

Route::prefix('/boursecamp')->group(function () {
    Route::post('/send',[boursecampController::class,'store']);
});

Route::prefix('/boursedever')->group(function () {
    Route::post('/send',[boursedeverController::class,'store']);
});

Route::prefix('/demandedon')->group(function () {
    Route::post('/send',[demandedonController::class,'store']);
});

Route::prefix('/demandevoiture')->group(function () {
    Route::post('/send',[demandevoitureController::class,'store']);
});

Route::prefix('/demandemaladie')->group(function () {
    Route::post('/send',[demandemaladieController::class,'store']);
});

Route::prefix('/demandefete')->group(function () {
    Route::post('/send',[demandefeteController::class,'store']);
});

Route::prefix('/elboursenvne')->group(function () {
    Route::post('/send',[elboursenvneController::class,'store']);
});


});



