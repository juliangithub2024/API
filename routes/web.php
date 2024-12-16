<?php

use Illuminate\Support\Facades\Route;
// cargamos los controladores
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\BlogController;

 
use App\Http\Controllers\StoreController;
use App\Http\Controllers\ItemController;  // controlador para articulos

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

Route::get('/home', [HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');



Route::group(['middleware' => ['auth']], function(){
    Route::resource('roles', RolController::class);
    Route::resource('usuarios', UsuarioController::class);
    Route::resource('blog', BlogController::class);
    Route::resource('negocios', StoreController::class);
    //Route::resource('articulos', ItemController::class);

    Route::get('articulos/create/{id}', [ItemController::class, 'create' ])->name('articulos.create');
    Route::post('articulos', [ItemController::class, 'store'])->name('articulos.store');
    Route::get('articulos/{cadena}/show/', [ItemController::class, 'show'])->name('articulos.show');
    Route::put('articulos/{id}/update', [ItemController::class, 'update'])->name('articulos.update');



});