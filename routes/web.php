<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReceiptController;
use App\Http\Controllers\ToolsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('home');
});



Route::get('/detail', function () {
    return view('detail');
});

Route::get('/search', [IngredientController::class, 'Search'])->name('search');

Route::middleware(['auth', 'verified', 'admin'])->group(function () {
    Route::prefix('dashboard')->name('dashboard.')->group(function () {
        Route::get('/', function () {
            return view('dashboard');
        })->name('dashboard');

        Route::prefix('category')->name('category.')->group(function () {
            Route::get('/', [CategoryController::class, 'index'])->name('index');
            Route::get('/create', [CategoryController::class, 'create'])->name('create');
            Route::post('/create', [CategoryController::class, 'store'])->name('store');
            Route::get('/update/{id}', [CategoryController::class, 'edit'])->name('edit');
            Route::put('/update/{id}', [CategoryController::class, 'update'])->name('update');
            Route::delete('/destroy/{id}', [CategoryController::class, 'destroy'])->name('destroy');
        });

        Route::prefix('ingredient')->name('ingredient.')->group(function () {
            Route::get('/', [IngredientController::class, 'index'])->name('index');
            Route::get('/create', [IngredientController::class, 'create'])->name('create');
            Route::post('/create', [IngredientController::class, 'store'])->name('store');
            Route::get('/update/{id}', [IngredientController::class, 'edit'])->name('edit');
            Route::put('/update/{id}', [IngredientController::class, 'update'])->name('update');
            Route::delete('/destroy/{id}', [IngredientController::class, 'destroy'])->name('destroy');
        });

        Route::prefix('tools')->name('tools.')->group(function () {
            Route::get('/', [ToolsController::class, 'index'])->name('index');
            Route::get('/create', [ToolsController::class, 'create'])->name('create');
            Route::post('/create', [ToolsController::class, 'store'])->name('store');
            Route::get('/update/{id}', [ToolsController::class, 'edit'])->name('edit');
            Route::put('/update/{id}', [ToolsController::class, 'update'])->name('update');
            Route::delete('/destroy/{id}', [ToolsController::class, 'destroy'])->name('destroy');
        });

        Route::prefix('receipt')->name('receipt.')->group(function () {
            Route::get('/', [ReceiptController::class, 'index'])->name('index');
            Route::get('/create', [ReceiptController::class, 'create'])->name('create');
            Route::post('/create', [ReceiptController::class, 'store'])->name('store');
            Route::get('/update/{id}', [ReceiptController::class, 'edit'])->name('edit');
            Route::put('/update/{id}', [ReceiptController::class, 'update'])->name('update');
            Route::delete('/destroy/{id}', [ReceiptController::class, 'destroy'])->name('destroy');
        });
    });
});


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/home', [UserController::class, 'index'])->name('home');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
