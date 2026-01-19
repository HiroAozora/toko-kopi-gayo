<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\StockController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\AuthController;

// Public Routes
Route::get('/', function () {
    $products = Product::with('category')->latest()->get();
    return view('welcome', compact('products'));
})->name('home');

Route::get('/catalog/{product:slug}', function (Product $product) {
    return view('products.show', compact('product'));
})->name('products.show');

Route::get('/about', function () {
    return view('about');
})->name('about');

// Authentication Routes (Manual)
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        $totalProducts = Product::count();
        $lowStock = Product::where('stock', '<=', 5)->count();
        $recentLogs = \App\Models\StockLog::with('product')->latest()->take(5)->get();
        return view('dashboard', compact('totalProducts', 'lowStock', 'recentLogs'));
    })->name('dashboard');

    Route::resource('products', ProductController::class)->except(['show']);
    Route::resource('categories', \App\Http\Controllers\CategoryController::class)->except(['show']);
    
    // Stock Management
    Route::get('/stocks', [StockController::class, 'index'])->name('stocks.index');
    Route::get('/stocks/create', [StockController::class, 'create'])->name('stocks.create');
    Route::post('/stocks', [StockController::class, 'store'])->name('stocks.store');
});
