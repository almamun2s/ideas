<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\UserController;
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

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// For commenting on a post/idea
Route::resource('ideas.comment', CommentController::class)->only(['store'])->middleware('auth');

Route::resource('ideas', IdeaController::class)->except(['index', 'create', 'show'])->middleware('auth');
Route::resource('ideas', IdeaController::class)->only(['show']);

// ProfileController
Route::get('profile', [UserController::class, 'profile'])->middleware('auth')->name('profile');
Route::resource('profile', UserController::class)->except([ 'index', 'create', 'store', 'destroy'])->middleware('auth');

// For User information Routes are in authRoute.php file

Route::get('/terms', function () {
    return view('term');
});