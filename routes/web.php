<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\VisionController;
use App\Http\Controllers\MissionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/post', [PostController::class, 'show'])->middleware(['auth', 'verified'])->name('post');
Route::get('/post/add', [PostController::class, 'create'])->middleware(['auth', 'verified'])->name('post.add');
Route::get('/post/edit/{post}', [PostController::class, 'edit'])->middleware('auth');

Route::post('/post', [PostController::class, 'store'])->middleware(['auth', 'verified']);
Route::patch('/post/edit/{post}', [PostController::class, 'update'])->middleware('auth');
Route::delete('/post/{post}', [PostController::class, 'destroy'])->middleware('auth');

Route::get('/vision', [VisionController::class, 'show'])->middleware('auth')->name('vision');
Route::patch('/vision', [VisionController::class, 'update'])->middleware('auth');

Route::get('/mission', [MissionController::class, 'show'])->middleware('auth')->name('mission');
Route::patch('/mission', [MissionController::class, 'update'])->middleware('auth');

Route::get('/events', [EventController::class, 'show'])->middleware('auth')->name('events');
Route::get('/events/add', [EventController::class, 'create'])->middleware('auth');
Route::post('/events/add', [EventController::class, 'store'])->middleware('auth');
Route::get('/events/edit/{event}', [EventController::class, 'edit'])->middleware('auth');
Route::patch('/events/edit/{event}', [EventController::class, 'update'])->middleware('auth');
Route::delete('/events/{event}', [EventController::class, 'destroy'])->middleware('auth');

require __DIR__.'/auth.php';
