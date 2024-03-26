<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FollowerController;
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

// Follower Controller
Route::post('users/{user}/follow', [FollowerController::class, 'follow'])->middleware('auth')->name('follow');
Route::post('users/{user}/unfollow', [FollowerController::class, 'unfollow'])->middleware('auth')->name('unfollow');

// For User information Routes are in authRoute.php file

Route::get('/terms', function () {
    return view('term');
})->name('terms');