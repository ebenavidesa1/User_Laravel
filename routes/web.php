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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

//Rutas para el crud de usurio
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::delete('/home/{id}', [App\Http\Controllers\HomeController::class, 'destroy'])->name('borrar');
Route::get('/home/{id}/edit', [App\Http\Controllers\HomeController::class, 'edit'])->name('editar');
Route::patch('/home/{id}', [App\Http\Controllers\HomeController::class, 'update'])->name('actualizar');
