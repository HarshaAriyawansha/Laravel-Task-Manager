<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\AdminTaskController;

Route::get('/', function () {
    return view('auth.login');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';




// User log
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        //block admins
        if (auth()->user()->usertype === 'admin') {
            return redirect()->route('task-admin');
        }

        //for normal users
        return redirect()->route('task-user.index');

    })->name('dashboard');
});


// Admin Dashboard
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('task-admin',[AdminTaskController::class,'index'])->name('task-admin');
});



Route::resource('task-user', TaskController::class);


Route::resource('task-admin', AdminTaskController::class);
Route::get('/task-admin/{task}/edit', [TaskController::class, 'edit'])->name('task-admin.edit');




Route::resource('users', App\Http\Controllers\UserController::class);