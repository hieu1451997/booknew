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

// Route::get('/', function (\App\Repositories\Publisher\PublisherInterface $publisherInterface) {
//     return $publisherInterface->getAll();
// });
// Route::get('/', function (\App\Services\Publisher\PublisherServiceInterface $publisherServiceInterface) {
//     return $publisherServiceInterface->getAll();
// });
Route::get('/', function(){
    return view('dashboard.pages.index');
});
// Product Category
Route::get('/ProductCategory/list', [\App\Http\Controllers\Admin\ProductCategoryController::class, 'index'])->name('productcategory.list');

Route::get('/ProductCategory/add', [\App\Http\Controllers\Admin\ProductCategoryController::class, 'create'])->name('productcategory.create');
Route::post('/ProductCategory/store', [\App\Http\Controllers\Admin\ProductCategoryController::class, 'store'])->name('productcategory.store');

Route::get('/ProductCategory/edit/{id}', [\App\Http\Controllers\Admin\ProductCategoryController::class, 'edit'])->name('productcategory.edit');
Route::put('/ProductCategory/update/{id}', [\App\Http\Controllers\Admin\ProductCategoryController::class, 'update'])->name('productcategory.update');

Route::delete('/ProductCategory/delete/{id}', [\App\Http\Controllers\Admin\ProductCategoryController::class, 'destroy'])->name('productcategory.destroy');
// Publisher
Route::get('/Publisher/list', [\App\Http\Controllers\Admin\PublisherController::class, 'index'])->name('publisher.list');

Route::get('/Publisher/add', [\App\Http\Controllers\Admin\PublisherController::class, 'create'])->name('publisher.create');
Route::post('/Publisher/store', [\App\Http\Controllers\Admin\PublisherController::class, 'store'])->name('publisher.store');

Route::get('/Publisher/edit/{id}', [\App\Http\Controllers\Admin\PublisherController::class, 'edit'])->name('publisher.edit');
Route::put('/Publisher/update/{id}', [\App\Http\Controllers\Admin\PublisherController::class, 'update'])->name('publisher.update');

Route::delete('/Publisher/delete/{id}', [\App\Http\Controllers\Admin\PublisherController::class, 'destroy'])->name('publisher.destroy');


