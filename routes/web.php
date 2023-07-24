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

use App\Http\Controllers\ControllerSite;
use App\Models\publicacao;



Route::get('/', [ControllerSite::class, 'welcome']);

Route::get('/criarPublicacao', [ControllerSite::class, 'cp'])-> middleware('auth');
Route::post('/publicacao', [ControllerSite::class, 'store']);
Route::delete('/publicacao/{id}', [ControllerSite::class, 'publicacaoDelelte']);
Route::get('/publicacao/edit/{id}', [ControllerSite::class, 'publicacaoEdit'])-> middleware('auth');
Route::put('/publicacao/update/{id}',[ControllerSite::class, 'publicacaoUpdate']);


Route::get('/assistencia', [ControllerSite::class, 'assist']);
Route::get('/assistencia/{id}', [ControllerSite::class, 'assistInd']);
Route::delete('/assistencia/{id}', [ControllerSite::class, 'assistDel'])-> middleware('auth');
Route::get('/assistencia/edit/{id}', [ControllerSite::class, 'assistEdit'])-> middleware('auth');
Route::put('/assistencia/update/{id}',[ControllerSite::class, 'assistUpdate']);
Route::get('/criarAssistencia', [ControllerSite::class, 'Passist']);
Route::post('/Gassistencia', [ControllerSite::class, 'Gassist']);


Route::get('/quemSomos', [ControllerSite::class, 'quemSomos']);

Route::get('/dashboard', [ControllerSite::class, 'dashboard'])-> middleware('auth');

Route::put('/users/{user}/update-type', [ControllerSite::class, 'updateUserType']);
