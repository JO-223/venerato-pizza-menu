<?php


use App\Http\Controllers\OrderController;
use App\Http\Controllers\PizzaController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// menu view
Route::get('/menu', [PizzaController::class, 'index']);
Route::get('/api/pizzas', [PizzaController::class, 'apiIndex']);

// order view
Route::get('/order/{id}', [OrderController::class, 'show']);
Route::post('/order', [OrderController::class, 'store']);

// Dashboard
Route::put('/api/orders/{id}', [OrderController::class, 'apiUpdate']);
Route::get('/api/orders', [OrderController::class, 'apiIndex']);
Route::post('/api/pizzas', [PizzaController::class, 'apiStore']);
Route::delete('/api/pizzas', [PizzaController::class, 'apiDestroy']);
