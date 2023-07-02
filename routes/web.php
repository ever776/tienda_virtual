<?php

use App\Http\Controllers\admin\ClasificacionController;
use App\Http\Controllers\admin\IngresoController;
use App\Http\Controllers\admin\MarcaController;
use App\Http\Controllers\admin\NacionalidadController;
use App\Http\Controllers\admin\ProductoController;
use App\Http\Controllers\admin\ProveedorController;
use App\Http\Controllers\HomeController;
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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/plantilla', function () {
    return view('plantilla.index');
});

Route::resource('admin/nacionalidad', NacionalidadController::class);
Route::resource('admin/proveedor', ProveedorController::class);
Route::resource('admin/clasificacion', ClasificacionController::class);
Route::resource('admin/marca', MarcaController::class);
Route::resource('admin/producto', ProductoController::class);
Route::resource('admin/ingreso', IngresoController::class);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/plantilla', [ProductoController::class, 'plantilla']);
