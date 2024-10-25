<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\LogStatusController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MasterDataController;
use App\Http\Controllers\AuthAdminController;
use Illuminate\Support\Facades\Route;

// Landing Page
Route::get('/', function () {
    return view('pages.landing_page.landing_page', [
        "title" => "Home"
    ]);
})->name('landing_page');

// Auth Routes
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

// User Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Note Routes
Route::get('/note', [NoteController::class, 'index'])->name('note.index');
Route::post('/note', [NoteController::class, 'store'])->name('note.store');
Route::get('/get-facilities/{location}', [NoteController::class, 'getFacilities']);
Route::get('/get-categories/{facility}', [NoteController::class, 'getCategories']);
Route::get('/get-items/{category}', [NoteController::class, 'getItems']);

// Activity Routes
Route::get('/all-activity', [NoteController::class, 'allActivity'])->name('all-activity');
Route::get('/activity/{id}/details', [NoteController::class, 'showActivityDetails'])->name('activity-details');
Route::post('/activity/{id}/update', [NoteController::class, 'updateActivity'])->name('activity.update');

// Filter Activity Routes
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
Route::get('/history', [NoteController::class, 'history'])->name('note.history');

// Log Status Route
// Route::get('/log-status', [ActivityController::class, 'logStatus'])->name('log-status');
Route::get('/log-status', [LogStatusController::class, 'index'])->name('log-status');

// Admin Routes
Route::get('/admin-login', function () {
    return view('pages.admin.auth.login_admin', [
        "title" => "Admin Login"
    ]);
})->name('admin-login');
// Route::post('/admin-login', [AuthAdminController::class, 'login'])->name('admin-login');

Route::get('/admin-dashboard', function () {
    return view('pages.admin.dashboard.dashboardadmin', [
        "title" => "Admin Dashboard"
    ]);
})->name('admin-dashboard');

Route::prefix('masterdata')->group(function () {
    Route::get('admin', [MasterDataController::class, 'indexAdmin'])->name('admin.index');
    Route::post('admin/store', [MasterDataController::class, 'storeAdmin'])->name('admin.store');
    Route::put('admin/update/{id}', [MasterDataController::class, 'updateAdmin'])->name('admin.update');
    Route::delete('admin/delete/{id}', [MasterDataController::class, 'deleteAdmin'])->name('admin.delete');

    Route::get('user', [MasterDataController::class, 'indexUser'])->name('user.index');
    Route::post('user/store', [MasterDataController::class, 'storeUser'])->name('user.store');
    Route::put('user/update/{id}', [MasterDataController::class, 'updateUser'])->name('user.update');
    Route::delete('user/delete/{id}', [MasterDataController::class, 'deleteUser'])->name('user.delete');

    Route::get('pic', [MasterDataController::class, 'indexPic'])->name('pic.index');
    Route::post('pic/store', [MasterDataController::class, 'storePic'])->name('pic.store');
    Route::put('pic/update/{id}', [MasterDataController::class, 'updatePic'])->name('pic.update');
    Route::delete('pic/delete/{id}', [MasterDataController::class, 'deletePic'])->name('pic.delete');

    Route::get('location', [MasterDataController::class, 'indexLocation'])->name('location.index');
    Route::post('location/store', [MasterDataController::class, 'storeLocation'])->name('location.store');
    Route::put('location/update/{id}', [MasterDataController::class, 'updateLocation'])->name('location.update');
    Route::delete('location/delete/{id}', [MasterDataController::class, 'deleteLocation'])->name('location.delete');

    Route::get('facility', [MasterDataController::class, 'indexFacility'])->name('facility.index');
    Route::post('facility/store', [MasterDataController::class, 'storeFacility'])->name('facility.store');
    Route::put('facility/update/{id}', [MasterDataController::class, 'updateFacility'])->name('facility.update');
    Route::delete('facility/delete/{id}', [MasterDataController::class, 'deleteFacility'])->name('facility.delete');

    Route::get('category', [MasterDataController::class, 'indexCategory'])->name('category.index');
    Route::post('category/store', [MasterDataController::class, 'storeCategory'])->name('category.store');
    Route::put('category/update/{id}', [MasterDataController::class, 'updateCategory'])->name('category.update');
    Route::delete('category/delete/{id}', [MasterDataController::class, 'deleteCategory'])->name('category.delete');

    Route::get('item', [MasterDataController::class, 'indexItem'])->name('item.index');
    Route::post('item/store', [MasterDataController::class, 'storeItem'])->name('item.store');
    Route::put('item/update/{id}', [MasterDataController::class, 'updateItem'])->name('item.update');
    Route::delete('item/delete/{id}', [MasterDataController::class, 'deleteItem'])->name('item.delete');

    Route::get('datanote', [MasterDataController::class, 'indexNote'])->name('datanote.index');
    Route::post('datanote/store', [MasterDataController::class, 'storeNote'])->name('datanote.store');
    Route::put('datanote/update/{id}', [MasterDataController::class, 'updateNote'])->name('datanote.update');
    Route::delete('datanote/delete/{id}', [MasterDataController::class, 'deleteNote'])->name('datanote.delete');

    Route::get('getFacilitiesByLocation/{location_id}', [MasterDataController::class, 'getFacilitiesByLocation']);
    Route::get('getCategoriesByFacility/{facility_id}', [MasterDataController::class, 'getCategoriesByFacility']);
    Route::get('getItemsByCategory/{category_id}', [MasterDataController::class, 'getItemsByCategory']);
});

Route::get('/get-facilities/{location_id}', [NoteController::class, 'getFacilities']);
Route::get('/get-categories/{facility_id}', [NoteController::class, 'getCategories']);
Route::get('/get-items/{category_id}', [NoteController::class, 'getItems']);
