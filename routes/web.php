<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LineController;
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
    return view('admin.home');

});
Route::get('lines/create', [LineController::class,"create"]);
Route::get('lines/{master?}', [LineController::class,"index"])->name('lines');

Route::post('lines', [LineController::class,"store"])->name('lines');
Route::post('lines/delete', [LineController::class,"destroy"])->name('lines.delete');
Route::put('lines/update', [LineController::class,"update"])->name('lines.update');
