<?php

use App\Http\Controllers\CursosController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NovedadController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
  return view('pages.home');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/novedades', [NovedadController::class, 'index'])->name('novedades');;
Route::get('/cursos', [CursosController::class, 'index'])->name('cursos');;

Auth::routes();


// Route::get('home', ['as' => 'pages.home', 'uses' => 'App\Http\Controllers\PageController@home']);
Route::get('mecanica', ['as' => 'pages.mecanica', 'uses' => 'App\Http\Controllers\PageController@mecanica']);
Route::get('electronica', ['as' => 'pages.electronica', 'uses' => 'App\Http\Controllers\PageController@electronica']);
Route::get('notifications', ['as' => 'pages.notifications', 'uses' => 'App\Http\Controllers\PageController@notifications']);
Route::get('chiptuning', ['as' => 'pages.chiptuning', 'uses' => 'App\Http\Controllers\PageController@chiptuning']);
Route::get('representacion', ['as' => 'pages.representacion', 'uses' => 'App\Http\Controllers\PageController@representacion']);
// Route::get('novedades', ['as' => 'pages.novedades', 'uses' => 'App\Http\Controllers\PageController@novedades']);
// Route::get('cursos', ['as' => 'pages.cursos', 'uses' => 'App\Http\Controllers\PageController@cursos']);
Route::get('contacto', ['as' => 'pages.contacto', 'uses' => 'App\Http\Controllers\PageController@contacto']);
Route::get('mantenimiento', ['as' => 'pages.mantenimiento', 'uses' => 'App\Http\Controllers\PageController@mantenimiento']);

Auth::routes();


Route::group(['middleware' => 'auth'], function () {
  // Route::get('curso', ['as' => 'pages.curso', 'uses' => 'App\Http\Controllers\PageController@curso']);
  Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
  Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
  Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
  Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});
