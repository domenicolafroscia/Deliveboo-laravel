<?php

use App\Http\Controllers\Admin\RestaurantController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MealController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\TrashController;

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
    return view('welcome');
});

/* Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard'); */

Route::middleware(['auth','verified'])
->name('admin.')
->prefix('admin')
->group(function(){
    //PUT HERE ALL THE ROUTE FOR THE CRUD
    Route::get('/',[DashboardController::class, 'index'])->name('dashboard');
    Route::resource('restaurants', RestaurantController::class)->parameters(['restaurants' => 'restaurant:slug']);
    Route::resource('meals', MealController::class)->parameters(['meals' => 'meal:slug']);
    Route::get('trash', [TrashController::class, 'index'])->name('trash.index');
    Route::put('restore/{id}', [TrashController::class, 'restore'])->name('trash.restore');
    Route::delete('delete/{id}', [TrashController::class, 'delete'])->name('trash.delete');
    Route::get('orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('orders/{id}', [OrderController::class, 'show'])->name('orders.show');

});

require __DIR__.'/auth.php';


/* ->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy'); */