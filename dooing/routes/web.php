<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ToDoController;
use App\Http\Controllers\PageController;

Route::get('/to-do-list', [PageController::class, 'pengelolaan']);



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


Route::get('/', [AuthController::class, 'showLogin'])->name('login');

Route::post('/', [AuthController::class, 'login'])->name('login.submit');

Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

Route::get('/to-do-list', function () {
    return view('to-do-list');
});
Route::get('/to-do-list', [ToDoController::class, 'index'])->name('todo.index');
Route::post('/to-do-list/add', [ToDoController::class, 'add'])->name('todo.add');
Route::patch('/to-do-list/toggle/{id}', [ToDoController::class, 'toggle'])->name('todo.toggle');
Route::delete('/to-do-list/delete/{id}', [ToDoController::class, 'delete'])->name('todo.delete');
// Route::get('/reset-tasks', function () {
//     session()->forget('tasks');
//     return redirect()->route('todo.index');
// });

Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');

// Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


