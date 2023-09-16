<?php

use App\Http\Controllers\EpisodesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SeasonsController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\UsersController;
use App\Http\Middleware\Autenticador;
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
    return redirect('/series');
})->middleware(Autenticador::class);

Route::controller(SeriesController::class)->group(function(){
    Route::get('/series','index')->name('series.index');;
    Route::get('/series/create', 'create')->name('series.create');
    Route::post('/series/store','store')->name('series.store');
    Route::post('/series/destroy/{series}','destroy')->name('series.destroy');
    Route::get('/series/edit/{series}','edit')->name('series.edit');
    Route::put('/series/update/{series}','update')->name('series.update');
});

Route::get('/series/{series}/seasons', [SeasonsController::class, 'index'])->name('seasons.index');

Route::get('/season/{season}/episodes', [EpisodesController::class, 'index'])->name('episodes.index');
Route::post('/season/{season}/episodes', [EpisodesController::class, 'update'])->name('episodes.update');

Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::post('/login/logar', [LoginController::class, 'store'])->name('login.store');
Route::get('/logout', [LoginController::class, 'destroy'])->name('logout');

Route::get('/register', [UsersController::class, 'index'])->name('users.create');
Route::post('/register/store', [UsersController::class, 'store'])->name('users.store');
