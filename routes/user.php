<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\LogStatusController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HistoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.landing_page.landing_page', [
        "title" => "Home"
    ]);
})->name('landing_page');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/note', [NoteController::class, 'index'])->name('note.index');
Route::post('/note', [NoteController::class, 'store'])->name('note.store');
Route::get('/facilities/{locationId}', [NoteController::class, 'getFacilities']);
Route::get('/categories/{facilityId}', [NoteController::class, 'getCategories']);
Route::get('/items/{categoryId}', [NoteController::class, 'getItems']);


Route::get('/all-activity', [NoteController::class, 'allActivity'])->name('all-activity');
Route::get('/activity/{id}/details', [NoteController::class, 'showActivityDetails'])->name('activity-details');
Route::post('/activity/{id}/update', [NoteController::class, 'updateActivity'])->name('activity.update');

Route::get('/activity-by-category', [ActivityController::class, 'viewByCategory'])->name('activity-by-category');
Route::get('/activity-by-facility', [ActivityController::class, 'viewByFacility'])->name('activity-by-facility');
Route::get('/activity-by-item', [ActivityController::class, 'viewByItem'])->name('activity-by-item');
Route::get('/activity-by-location', [ActivityController::class, 'viewByLocation'])->name('activity-by-location');

// Route to Process Filter
Route::get('/activity/filter', [ActivityController::class, 'filterActivity'])->name('activity.filter');

// View Activity by Status
Route::get('/activity-by-status', [ActivityController::class, 'viewByStatus'])->name('activity-by-status');

// Add Comment on Note
Route::post('/note/{id}/add-comment', [NoteController::class, 'addComment'])->name('note.addComment');

// History Route
Route::get('/history', [HistoryController::class, 'index'])->name('note.history');

// Log Status Route
Route::get('/log-status', [LogStatusController::class, 'index'])->name('log-status');
