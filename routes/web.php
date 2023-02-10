<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    UserController
};

Route::get('/', function () {
    return view('welcome');
});

route::get('/users', [UserController::class, 'index'])->name('users.index');
route::get('/users/create', [UserController::class, 'create'])->name('users.create');
route::post('/users', [UserController::class, 'store'])->name('users.store');
route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
