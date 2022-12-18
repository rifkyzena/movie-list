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
Route::post('/movie/sort/category', [GuestController::class, 'movieSortCategory'])->name('movie.sort.category');
Route::get('/movie/sort/desc', [GuestController::class, 'movieSortDesc'])->name('movie.sort.desc');
Route::get('/movie/sort/asc', [GuestController::class, 'movieSortAsc'])->name('movie.sort.asc');
Route::get('/movie/sort/latest', [GuestController::class, 'movieSortLatest'])->name('movie.sort.latest');
Route::post('/movie/search', [GuestController::class, 'movieSearch'])->name('movie.search');
Route::get('/movie/{id}', [GuestController::class, 'movieDetail'])->name('movie.detail');
Route::get('/movie', [GuestController::class, 'movie'])->name('movie');

Route::middleware('auth')->group(function () {
    Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::group(['middleware' => 'role:user'], function () {
        Route::get('watchlist', [MemberController::class, 'watchlistIndex'])->name('member.watchlist');
    });
    Route::group(['middleware' => 'role:admin'], function () {
        Route::delete('admin/movie/{id}', [AdminController::class, 'movieDestroy'])->name('admin.movie.destroy');
        Route::put('admin/movie/update', [AdminController::class, 'movieUpdate'])->name('admin.movie.update');
        Route::get('admin/movie/{id}/edit', [AdminController::class, 'movieEdit'])->name('admin.movie.edit');
        Route::post('admin/movie/create', [AdminController::class, 'movieStore'])->name('admin.movie.create');
        Route::get('admin/movie/create', [AdminController::class, 'movieCreate'])->name('admin.movie.create');
        Route::delete('admin/actor/{id}', [AdminController::class, 'actorDestroy'])->name('admin.actor.destroy');
        Route::put('admin/actor/update', [AdminController::class, 'actorUpdate'])->name('admin.actor.update');
        Route::get('admin/actor/{id}/edit', [AdminController::class, 'actorEdit'])->name('admin.actor.edit');
        Route::post('admin/actor/create', [AdminController::class, 'actorStore'])->name('admin.actor.create');
        Route::get('admin/actor/create', [AdminController::class, 'actorCreate'])->name('admin.actor.create');
    });
});
