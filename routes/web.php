<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', fn () => redirect()->route('home'));
Route::get('/unauthorized', function () {
    return view('auth.403');
});
Auth::routes();

Route::get('/home', [GuestController::class, 'home'])->name('home');
Route::get('/actor/{id}', [GuestController::class, 'actorDetail'])->name('actor.detail');
Route::get('/actor', [GuestController::class, 'actor'])->name('actor');
Route::get('/movie/{id}', [GuestController::class, 'movieDetail'])->name('movie.detail');
Route::get('/movie', [GuestController::class, 'movie'])->name('movie');

Route::middleware('auth')->group(function () {
    Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::group(['middleware' => 'role:user'], function () {
        Route::get('watchlist', [MemberController::class, 'watchlistIndex'])->name('member.watchlist');
    });
    Route::group(['middleware' => 'role:admin'], function () {
        Route::get('admin/movie/create', [AdminController::class, 'movieCreate'])->name('admin.movie.create');
        Route::get('admin/actor/create', [AdminController::class, 'actorCreate'])->name('admin.actor.create');
    });
});
