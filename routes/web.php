<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LineController;
use App\Http\Controllers\CatogeryController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\QoutationController;
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

// Route::get('/', function () {
//     return redirect()->to("lines");

// });



// lines route
Route::get('lines/create', [LineController::class,"create"]);
Route::get('lines/{master?}', [LineController::class,"index"]);
Route::post('lines', [LineController::class,"store"])->name('lines');
Route::post('lines/delete', [LineController::class,"destroy"])->name('lines.delete');
Route::put('lines/update', [LineController::class,"update"])->name('lines.update');
Route::put('lines/store', [LineController::class,"store"])->name('lines.store');




// items route
Route::get('item', [ItemsController::class,"index"]);
Route::post('item', [ItemsController::class,"store"])->name('item');
Route::post('item/delete', [ItemsController::class,"destroy"])->name('item.delete');
Route::post('item/update', [ItemsController::class,"update"])->name('item.update');

// catogery route
Route::get('catogery', [CatogeryController::class,"index"]);
Route::post('catogery', [CatogeryController::class,"store"])->name('catogery');
Route::post('catogery/delete', [CatogeryController::class,"destroy"])->name('catogery.delete');
Route::put('catogery/update', [CatogeryController::class,"update"])->name('catogery.update');

// brand
Route::get('brand', [BrandController::class,"index"]);
Route::post('brand', [BrandController::class,"store"])->name('brand');
Route::post('brand/delete', [BrandController::class,"destroy"])->name('brand.delete');
Route::put('brand/update', [BrandController::class,"update"])->name('brand.update');


// brand
Route::get('type', [TypeController::class,"index"]);
Route::post('type', [TypeController::class,"store"])->name('type');
Route::post('type/delete', [TypeController::class,"destroy"])->name('type.delete');
Route::put('type/update', [TypeController::class,"update"])->name('type.update');

// size
Route::get('size', [SizeController::class,"index"]);
Route::post('size', [SizeController::class,"store"])->name('size');
Route::post('size/delete', [SizeController::class,"destroy"])->name('size.delete');
Route::POST('size/update', [SizeController::class,"update"])->name('size.update');



// quotation

Route::get('quote/{line?}', [QoutationController::class,"index"]);
Route::post('quote', [QoutationController::class,"store"])->name('quote');
Route::post('quote/delete', [QoutationController::class,"destroy"])->name('quote.delete');
Route::put('quotation/update', [QoutationController::class,"update"])->name('quotation.update');
Route::put('lines/store', [QoutationController::class,"store"])->name('lines.store');

