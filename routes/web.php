<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

use App\Http\Controllers\ContactController;



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

// Route::get('/', function () {
//     return view('home');
// });


Route::get('/home', [PostController::class, 'showPresentationPage'])->name('home');

Route::get('/', [PostController::class, 'showPresentationPage'])->name('home');

Route::resource('posts', PostController::class)
->only(['create', 'store', 'edit', 'update','destroy'])
->middleware(['auth', 'verified']);

Route::resource('posts', PostController::class)
->only(['index' ,'show']);


Route::resource('comments', CommentController::class)
->only(['index','create', 'store', 'edit', 'update', 'show','destroy'])
->middleware(['auth', 'verified']);

Route::get('/contact', function () {
    return view('contact');
})->middleware(['auth', 'verified'])->name('contact');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
