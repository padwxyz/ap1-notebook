<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

// Landing Page
Route::get('/', function () {
    return view('landing_page.landing_page', [
        "title" => "Home"
    ]);
})->name('landing_page');

// Auth
Route::get('/login', [LoginController::class,'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);

// Route::post('/login', [LoginController::class, '']);

Route::get('/register', [RegisterController::class,'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

// User Menu
Route::get('/dashboard', function () {
    return view('pages.dashboard', [
        "title" => "Dashboard"
    ]);
})->name('dashboard');

Route::get('/note', function () {
    return view('pages.note', [
        "title" => "Note"
    ]);
})->name('note');


// Activity Menus
Route::get('/all-activity', function () {
    return view('pages.activity', [
        "title" => "All Activity"
    ]);
})->name('all-activity');

Route::get('/all-activity/by-location', function () {
    return view('pages.activity_bylocation', [
        "title" => "All Activity by Location"
    ]);
})->name('activity-by-location');

Route::get('/all-activity/by-facility', function () {
    return view('pages.activity_byfacility', [
        "title" => "All Activity by Facility"
    ]);
})->name('activity-by-facility');

Route::get('/all-activity/by-category', function () {
    return view('pages.activity_bycategory', [
        "title" => "All Activity by Category"
    ]);
})->name('activity-by-category');

Route::get('/all-activity/by-item', function () {
    return view('pages.activity_byitem', [
        "title" => "All Activity by Item"
    ]);
})->name('activity-by-item');

Route::get('/all-activity/by-status', function () {
    return view('pages.activity_bystatus', [
        "title" => "All Activity by Status"
    ]);
})->name('activity-by-status');

Route::get('/activity-details', function () {
    return view('pages.activity_details', [
        "title" => "Activity Details"
    ]);
})->name('activity-details');



Route::get('/calendar', function () {
    return view('pages.calendar', [
        "title" => "Calendar"
    ]);
})->name('calendar');

Route::get('/history', function () {
    return view('pages.history', [
        "title" => "History"
    ]);
})->name('history');

Route::get('/log-status', function () {
    return view('pages.log', [
        "title" => "Log Status"
    ]);
})->name('log-status');

// Admin Menu
Route::get('/admin-login', function () {
    return view('admin.loginadmin', [
        "title" => "Admin Login"
    ]);
})->name('admin-login');

Route::get('/admin-dashboard', function () {
    return view('admin.dashboardadmin', [
        "title" => "Admin Dashboard"
    ]);
})->name('admin-dashboard');
