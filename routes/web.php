<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NavController;

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

Route::get('/', [NavController::class, 'groupes'])->name('groupes');

//Navigation
Route::get('/about', [NavController::class, 'about'])->name('about');
Route::get('/groupes', [NavController::class, 'groupes'])->name('groupes');
Route::get('/groupe/{id}', [NavController::class,'show'])->name('groupe');
Route::get('/liste/{groupe}', [NavController::class,'liste'])->name('liste');
route::get('/search', [NavController::class, 'index'])->name('search');
route::get('/search/band', [NavController::class, 'search'])->name('searchband');
route::get('/random', [NavController::class, 'random'])->name('random');
route::get('/black', [NavController::class, 'black'])->name('black');
route::get('/death', [NavController::class, 'death'])->name('death');
route::get('/doom', [NavController::class, 'doom'])->name('doom');
route::get('/autre', [NavController::class, 'autre'])->name('autre');
