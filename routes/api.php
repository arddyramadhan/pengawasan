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

Route::get('/informasi/form-masyarakat', 'API\InformasiController@create');
Route::post('/informasi/create', 'API\InformasiController@store');
// Route::post('/informasi/create', function ($perintah) {
//     Artisan::call($perintah);
//     session()->flash('session', 'Artisan');
//     return redirect('/');
// });
// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

