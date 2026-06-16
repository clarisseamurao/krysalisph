<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/story', [PageController::class, 'story'])->name('story');
Route::get('/works', [PageController::class, 'works'])->name('works');
Route::get('/works/{project:slug}', [PageController::class, 'projectDetails'])->name('projects.show');

Route::get('/book-a-call', [PageController::class, 'bookCall'])->name('book-call');
Route::post('/book-a-call', [BookingController::class, 'store'])->name('book-call.store');

Route::get('/book-a-call/success/{booking:reference_number}', [BookingController::class, 'success'])
    ->name('book-call.success');

require __DIR__.'/auth.php';