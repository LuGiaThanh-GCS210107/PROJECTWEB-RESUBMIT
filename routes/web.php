<?php

use App\Http\Controllers\admin;
use App\Http\Controllers\adminController;
use App\Http\Controllers\AdminController as ControllersAdminController;
use App\Http\Controllers\ArtistController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\lmao;
use App\Models\Customer;

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
    return view('welcome');
});
Route::get('list',[ProductController::class, 'index']);
Route::get('add',[ProductController::class, 'add'])->middleware('isLoggedIn');
Route::post('save',[ProductController::class, 'save']);
Route::get('edit/{id}',[ProductController::class, 'edit'])->middleware('isLoggedIn');
Route::post('update',[ProductController::class, 'update']);
Route::get('delete/{id}',[ProductController::class, 'delete']);

Route::get('/login', [CustomerController::class,'login']);
Route::post('/loginCustomer', [CustomerController::class,'loginCustomer']);

Route::get('/registeration', [CustomerController::class,'registeration']);
Route::post('/saveCustomer', [CustomerController::class,'saveCustomer']);
Route::get('/', [CustomerController::class,'home']);
Route::get('/logout', [CustomerController::class,'logout']);

Route::get('/adminLogin', [ControllersAdminController::class,'adminLogin']);
Route::get('/dashboard', [ControllersAdminController::class,'dashboard'])->middleware('isLoggedIn');
Route::post('/loginAdmin', [ControllersAdminController::class,'loginAdmin']);
Route::get('table',[ControllersAdminController::class, 'table'])->middleware('isLoggedIn');

Route::get('/information/{id}', [CustomerController::class,'information']);
Route::post('/saveinformation', [CustomerController::class,'saveinformation']);

Route::get('/adminInfo/{id}', [ControllersAdminController::class,'information']);
Route::post('/saveAdmin', [ControllersAdminController::class,'saveAdmin']);

Route::get('table3', [ControllersAdminController::class,'table3'])->middleware('isLoggedIn');
Route::get('delete/{id}',[ControllersAdminController::class, 'delete']);

Route::get('table2', [ControllersAdminController::class,'table2'])->middleware('isLoggedIn');
Route::get('add2',[ArtistController::class, 'add2'])->middleware('isLoggedIn');
Route::post('saveArtist',[ArtistController::class, 'saveArtist']);
Route::get('edit2/{id}',[ArtistController::class, 'edit2'])->middleware('isLoggedIn');
Route::post('update2',[ArtistController::class, 'update2']);
Route::get('delete/{id}',[ArtistController::class, 'delete']);