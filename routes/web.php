<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\VisionController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\MissionController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/post', [PostController::class, 'show'])->middleware(['auth', 'verified'])->name('post');
Route::get('/search-post', [PostController::class, 'search'])->middleware(['auth', 'verified']);
Route::get('/post/add', [PostController::class, 'create'])->middleware(['auth', 'verified'])->name('post.add');
Route::get('/post/edit/{post}', [PostController::class, 'edit'])->middleware('auth');

Route::post('/post', [PostController::class, 'store'])->middleware(['auth', 'verified']);
Route::patch('/post/edit/{post}', [PostController::class, 'update'])->middleware('auth');
Route::delete('/post/{post}', [PostController::class, 'destroy'])->middleware('auth');

Route::get('/vision', [VisionController::class, 'show'])->middleware('auth')->name('vision');
Route::post('/vision', [VisionController::class, 'store'])->middleware('auth');
Route::patch('/vision', [VisionController::class, 'update'])->middleware('auth');

Route::get('/mission', [MissionController::class, 'show'])->middleware('auth')->name('mission');
Route::post('/mission', [MissionController::class, 'store'])->middleware('auth');
Route::patch('/mission', [MissionController::class, 'update'])->middleware('auth');

Route::get('/events', [EventController::class, 'show'])->middleware('auth')->name('events');
Route::get('/search-events', [EventController::class, 'search'])->middleware('auth');
Route::get('/events/add', [EventController::class, 'create'])->middleware('auth');
Route::post('/events/add', [EventController::class, 'store'])->middleware('auth');
Route::get('/events/edit/{event}', [EventController::class, 'edit'])->middleware('auth');
Route::patch('/events/edit/{event}', [EventController::class, 'update'])->middleware('auth');
Route::delete('/events/{event}', [EventController::class, 'destroy'])->middleware('auth');

Route::get('/staff', [StaffController::class, 'index'])->middleware('auth')->name('staff');
Route::get('/search-staff', [StaffController::class, 'search'])->middleware('auth');
Route::get('/staff/add', [StaffController::class, 'create'])->middleware('auth');
Route::post('/staff/add', [StaffController::class, 'store'])->middleware('auth');
Route::get('/staff/edit/{staff}', [StaffController::class, 'edit'])->middleware('auth');
Route::patch('/staff/edit/{staff}', [StaffController::class, 'update'])->middleware('auth');
Route::delete('/staff/{staff}', [StaffController::class, 'destroy'])->middleware('auth');

Route::get('/site', [SiteController::class, 'index'])->name('site');
Route::get('/site/about-us',[SiteController::class, 'aboutUs'])->name('site/about-us');
Route::get('/site/news',[SiteController::class, 'news'])->name('site/news');
Route::get('/site/events',[SiteController::class, 'events'])->name('site/events');
Route::get('/site/staff',[SiteController::class, 'staffs'])->name('site/staff');

Route::get('/site/news/{slug}',[SiteController::class, 'newsRead']);
Route::get('/site/events/{slug}',[SiteController::class, 'eventsRead']);

Route::get('/site/search',[SiteController::class, 'search']);




require __DIR__.'/auth.php';
