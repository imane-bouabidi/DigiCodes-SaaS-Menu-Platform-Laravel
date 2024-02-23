<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Restaurant\MenuItemController;
use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Restaurant\MenuController;
use App\Http\Controllers\Restaurant\OperatoreController;
use App\Http\Controllers\Restaurant\RestaurantController;
use App\Http\Controllers\Restaurant\SubscriptionController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', function () {
    return 'hola';
})->name('dashboard');


// Routes for restaurant owners & operators
Route::middleware(['auth', 'verified', 'checkrole:restaurant owner|operator'])->prefix('restaurant')->group(function () {
    Route::get('/',  [RestaurantController::class, 'dashboard'])->name('restaurant.dashboard');
    Route::resource('menus', MenuController::class)->except(['show']);
    Route::get('menus/{menu}', [MenuController::class, 'show'])->name('menus.show');
    Route::resource('subscriptions', SubscriptionController::class);
    Route::resource('operatores', OperatoreController::class)->except(['show']);
    Route::get('operatores/{operatore}', [OperatoreController::class, 'show'])->name('operatores.show');
});





// Routes for admins
Route::middleware(['auth', 'verified', 'checkrole:admin'])->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::resource('plans', PlanController::class)->except(['show']);
    Route::get('plans/{plan}', [PlanController::class, 'show'])->name('plans.show');
});




// this route unauthorized
Route::get('/not-authorized', function () {
    return 'You are not authorized to access this page.';
})->name('not.authorized');




// this route for non route



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::fallback(fn () => 'not found page');


//menu items

Route::post('/menu_items', [MenuItemController::class, 'store_menu_item'])->name('menu_items.store');
Route::get('menu_items/create', [MenuItemController::class, 'create'])->name('menu_items.create');

//menu
Route::get('menu.index', [MenuController::class, 'index'])->name('menu.index');
Route::get('menu.create', [MenuController::class, 'create'])->name('menu.create');
Route::get('menu.store', [MenuController::class, 'store_menu'])->name('menu.store');
Route::get('menu.update', [MenuController::class, 'edit'])->name('menu.update');


require __DIR__ . '/auth.php';
