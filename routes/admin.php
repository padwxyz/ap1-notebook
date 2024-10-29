<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PicController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\MasterDataController;
use App\Models\Facility;
use App\Models\Pic;
use Illuminate\Support\Facades\Route;

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

Route::prefix('admin')->group(function () {
    Route::get('admin', [AdminController::class, 'index'])->name('admin.index');
    Route::post('admin/store', [AdminController::class, 'store'])->name('admin.store');
    Route::put('admin/update/{id}', [AdminController::class, 'update'])->name('admin.update');
    Route::delete('admin/delete/{id}', [AdminController::class, 'delete'])->name('admin.delete');
});

Route::prefix('user')->group(function () {
    Route::get('user', [UserController::class, 'index'])->name('user.index');
    Route::post('user/store', [UserController::class, 'store'])->name('user.store');
    Route::put('user/update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('user/delete/{id}', [UserController::class, 'delete'])->name('user.delete');
});

Route::prefix('pic')->group(function () {
    Route::get('pic', [PicController::class, 'index'])->name('pic.index');
    Route::post('pic/store', [PicController::class, 'store'])->name('pic.store');
    Route::put('pic/update/{id}', [PicController::class, 'update'])->name('pic.update');
    Route::delete('pic/delete/{id}', [PicController::class, 'delete'])->name('pic.delete');
});

Route::prefix('location')->group(function () {
    Route::get('location', [LocationController::class, 'index'])->name('location.index');
    Route::post('location/store', [LocationController::class, 'store'])->name('location.store');
    Route::put('location/update/{id}', [LocationController::class, 'update'])->name('location.update');
    Route::delete('location/delete/{id}', [LocationController::class, 'delete'])->name('location.delete');
});

Route::prefix('facility')->group(function () {
    Route::get('facility', [FacilityController::class, 'index'])->name('facility.index');
    Route::post('facility/store', [FacilityController::class, 'store'])->name('facility.store');
    Route::put('facility/update/{id}', [FacilityController::class, 'update'])->name('facility.update');
    Route::delete('facility/delete/{id}', [FacilityController::class, 'delete'])->name('facility.delete');
});

Route::prefix('category')->group(function () {
    Route::get('category', [CategoryController::class, 'index'])->name('category.index');
    Route::post('category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::put('category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('category/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');
});

Route::prefix('item')->group(function () {
    Route::get('item', [ItemController::class, 'index'])->name('item.index');
    Route::post('item/store', [ItemController::class, 'store'])->name('item.store');
    Route::put('item/update/{id}', [ItemController::class, 'update'])->name('item.update');
    Route::delete('item/delete/{id}', [ItemController::class, 'delete'])->name('item.delete');
});


Route::get('datanote', [MasterDataController::class, 'indexNote'])->name('datanote.index');
Route::post('datanote/store', [MasterDataController::class, 'storeNote'])->name('datanote.store');
Route::put('datanote/update/{id}', [MasterDataController::class, 'updateNote'])->name('datanote.update');
Route::delete('datanote/delete/{id}', [MasterDataController::class, 'deleteNote'])->name('datanote.delete');

Route::get('getFacilitiesByLocation/{location_id}', [MasterDataController::class, 'getFacilitiesByLocation']);
Route::get('getCategoriesByFacility/{facility_id}', [MasterDataController::class, 'getCategoriesByFacility']);
Route::get('getItemsByCategory/{category_id}', [MasterDataController::class, 'getItemsByCategory']);

Route::get('/get-facilities/{location_id}', [NoteController::class, 'getFacilities']);
Route::get('/get-categories/{facility_id}', [NoteController::class, 'getCategories']);
Route::get('/get-items/{category_id}', [NoteController::class, 'getItems']);
