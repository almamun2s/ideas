<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdeaController;
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

Route::group(['prefix' => 'ideas/', 'as' => 'ideas.', 'middleware' => ['auth'] ], function () {
    Route::post('', [IdeaController::class, 'store'])->name('store');
    Route::get('{idea}', [IdeaController::class, 'show'])->name('show')->withoutMiddleware('auth');
    Route::get('{idea}/edit', [IdeaController::class, 'edit'])->name('edit');
    Route::put('{idea}', [IdeaController::class, 'update'])->name('update');
    Route::delete('{idea}', [IdeaController::class, 'destroy'])->name('destroy');

    // For commenting on a post/idea
    Route::post('{idea}/comment', [CommentController::class, 'store'])->name('comment.store');
});

// For User information Routes are in authRoute.php file

Route::get('/terms', function () {
    return view('term');
});