<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Routing\RouteGroup;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/admin', function () {
    return "<h1>Admin</h1>";
})->middleware(['auth', 'verified', 'role:admin']);

Route::prefix('admin')->middleware(['auth', 'verified', 'role:admin'])->group(function () {
    Route::get('/all-user', [UserController::class, 'index'])->name('admin.getUser');
    Route::get('/userbyid/{id}', [UserController::class, 'show'])->name('admin.getByid');
});


Route::get('/writer', function () {
    return "<h1>Writer</h1>";
})->middleware(['auth', 'verified', 'role:writer|admin']);

Route::get('/article', function () {
    return "<h1>Article</h1>";
})->middleware(['auth', 'verified', 'role_or_permission:read-article|admin']);

require __DIR__ . '/auth.php';
