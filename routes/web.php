<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
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



Route::get('/', [\App\Http\Controllers\PostController::class, 'index'])->name('home');
Route::get('/post/{post}', [PostController::class , 'show'])->name('view');
Route::get('/by-category/{category}', [PostController::class , 'byCategory'])->name('by-category');
Route::get('/aboutUs', [\App\Http\Controllers\PostController::class, 'aboutUs'])->name('aboutUs');
Route::post('/comment/{post}', [\App\Http\Controllers\PostController::class, 'comment'])->name('comment');
Route::resource('/comment', \App\Http\Controllers\CommentController::class);












//Route::get('/dashboard', [\App\Http\Controllers\PostController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
