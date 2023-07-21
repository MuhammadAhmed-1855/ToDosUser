<?php

use App\Http\Controllers\User\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TodosController;

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

Route::get('/home', function () {
    return view('home');
});

Route::get('/profile', function () {
    return view('profile');
})->middleware(['auth'])->name('profile');

Route::get('/about-us', function () {
    return view('about-us');
});

Route::get('/loginview', function () {
    return view('login');
});

Route::get('/registerview', function () {
    return view('register');
});

Route::get('/dashboard', [TodosController::class, 'todos'])->middleware(['auth'])->name('todos');


Route::post('/login', [UserController::class, 'login'])->name('login');

Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::post('/changepassword', [UserController::class, 'changepassword'])->name('changepassword');

Route::post('/mark/{id}', [TodosController::class, 'mark'])->name('mark');

Route::post('/AddTodo', [TodosController::class, 'AddTodo'])->name('AddTodo');

