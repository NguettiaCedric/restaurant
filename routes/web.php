<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Frontend\CategoryController as FrontendCategoryController;
use App\Http\Controllers\Frontend\MenuController as FrontendMenuController;
use App\Http\Controllers\Frontend\ReservationController as FrontendReservationController;
use App\Http\Controllers\Frontend\WelcomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\TableController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });



Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
Route::get('/categories', [FrontendCategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{category}', [FrontendCategoryController::class, 'show'])->name('categories.show');
Route::get('/menus', [FrontendMenuController::class, 'index'])->name('menus.index');
Route::get('/reservation/etape-1', [FrontendReservationController::class, 'etape1'])->name('reservation.etape-1');
Route::post('/reservation/etape-1', [FrontendReservationController::class, 'storeEtape1'])->name('reservation.store.etape-1');
Route::get('/reservation/etape-2', [FrontendReservationController::class, 'etape2'])->name('reservation.etape-2');
Route::post('/reservation/etape-2', [FrontendReservationController::class, 'storeEtape2'])->name('reservation.store.etape-2');
Route::get('/thankyou', [WelcomeController::class, 'thankyou'])->name('thankyou');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'admin'])->name('admin.')->prefix('admin')->group(function(){
    Route::get('/', [AdminController::class, 'index'])->name('index');

    Route::resource('/categories' , CategoryController::class);
    Route::resource('/menus' , MenuController::class);
    Route::resource('/tables' , TableController::class);
    Route::resource('/reservation' , ReservationController::class);

});

require __DIR__.'/auth.php';
