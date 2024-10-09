<?php

use App\Http\Controllers\SalesAndOrderController;
use App\Http\Controllers\InventoryTrackingController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\WholesalerController;
use App\Http\Controllers\SupplierProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AddRetailProductController;
use App\Http\Controllers\SupplierDashboardController;
use App\Http\Controllers\UpdateSupplierProductQuantityController;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', [SupplierDashboardController::class, 'getOtherSupplierProductsFn'], function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/InventoryTracking', [InventoryTrackingController::class, 'index'], function(){
    return view('InventoryTracking');
})->middleware(['auth', 'verified'])->name('InventoryTracking');
Route::get('/SalesAndOrder', function(){
    return view('SalesAndOrder');
})->middleware(['auth', 'verified'])->name('SalesAndOrder');
Route::get('/ReportsAndAnalysis', function(){
    return view('ReportsAndAnalysis');
})->middleware(['auth', 'verified'])->name('ReportsAndAnalysis');
Route::get('/MyAccount', function(){
    return view('MyAccount');
})->middleware(['auth', 'verified'])->name('MyAccount');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::post('/add-retail-product', [AddRetailProductController::class, 'AddRetailProduct'])->name('addRetailProduct');
Route::post('/update-retail-product/{productId}', [UpdateSupplierProductQuantityController::class, 'addNewSupplierProductQuantity'])->name('updateSupplierProductQuantity');
Route::get('/supplierProductDetails/{productId}', [SupplierProductController::class, 'supplierProduct'])->name('supplierProductDetails');
Route::get('/customer/dashboard', [CustomerController::class, 'index'])->name('customer.dashboard');
// Route::get('/supplier/dashboard', [SupplierController::class, 'index'])->name('dashboard');
Route::get('supplier/dashboard', [SupplierDashboardController::class, 'getOtherSupplierProductsFn'], function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/wholesaler/dashboard', [WholesalerController::class, 'index'])->name('wholesaler.dashboard');


require __DIR__.'/auth.php';
