<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DishController;

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

Route::get('/', [MainController::class, 'index']);

/**Products */
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/import', [ProductController::class, 'import']);
Route::post('/products/import', [ProductController::class, 'importExcel']);
Route::get('/products/{product}/destroy',[ProductController::class, 'destroy']);

/**Dishes */
Route::get('/dishes', [DishController::class, 'index']);
Route::get('/dishes/create', [DishController::class, 'create']);
Route::post('/dishes/create', [DishController::class, 'store']);
Route::get('/dishes/{dish}/destroy', [DishController::class, 'destroy']);
Route::get('/dishes/{dish}/edit', [DishController::class, 'edit']);
Route::post('/dishes/{dish}/edit', [DishController::class, 'update']);
