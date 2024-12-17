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

Route::get('/', function (\App\Repositories\ProductCategoryRepository $productCategoryRepository) {
    return $productCategoryRepository->getAll();
     //return view('dashboard.pages.category.list');
    //return \App\Models\Product::find(1)->publisher;
});
