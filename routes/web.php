<?php

use App\http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/add', [HomeController::class, 'add']);
Route::post('/add', [HomeController::class, 'store'])->name('add');
Route::delete('/delete/{id}', [HomeController::class, 'destroy'])->name('delete');
Route::get('/update/{id}', [HomeController::class, 'show'])->name('show.update');
Route::put('/update/activity{id}', [HomeController::class, 'update'])->name('update');

Route::apiResource('/list-siswa', StudentController::class);

route::get('/dashboard', function () {
    return view('dashboard.dashboard');
});

require __DIR__ . '/auth.php';