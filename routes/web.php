<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\IdeaLikeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\IdeaController as AdminIdeaController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;

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

Route::get('/lang/{lang}', function ($lang) {
    app()->setLocale($lang);
    session()->put('locale', $lang);
    return redirect()->back();
})->name('lang');

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// For commenting on a post/idea
Route::resource('ideas.comment', CommentController::class)->only(['store'])->middleware('auth');

Route::resource('ideas', IdeaController::class)->except(['index', 'create', 'show'])->middleware('auth');
Route::resource('ideas', IdeaController::class)->only(['show']);

// Profile Routes
Route::get('profile', [UserController::class, 'profile'])->middleware('auth')->name('profile');
Route::resource('profile', UserController::class)->only('show');
Route::resource('profile', UserController::class)->only(['edit', 'update'])->middleware('auth');

// Follower Routes
Route::post('users/{user}/follow', [FollowerController::class, 'follow'])->middleware('auth')->name('follow');
Route::post('users/{user}/unfollow', [FollowerController::class, 'unfollow'])->middleware('auth')->name('unfollow');

// Like Routes
Route::post('idea/{idea}/like', [IdeaLikeController::class, 'like'])->middleware('auth')->name('like');
Route::post('idea/{idea}/unlike', [IdeaLikeController::class, 'unlike'])->middleware('auth')->name('unlike');

Route::get('/feed', FeedController::class)->middleware('auth')->name('feed');

// For User information Routes are in authRoute.php file

Route::get('/terms', function () {
    return view('term');
})->name('terms');


// Routes for Admins
Route::middleware(['auth', 'can:admin'])->prefix('/admin')->as('admin.')->group(function(){
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('/users', [AdminUserController::class, 'index'])->name('users');
    Route::get('/ideas', [AdminIdeaController::class, 'index'])->name('ideas');
});
