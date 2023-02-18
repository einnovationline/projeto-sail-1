<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    UserController
};
use App\Http\Controllers\Admin\CommentController;

Route::get('/', function () {
    return view('welcome');
});

route::delete('/users/comments/{id}', [CommentController::class, 'destroy'])->name('comments.destroy');
route::get('/users/{id}/comments/create', [CommentController::class, 'create'])->name('comments.create');
route::get('/users/{user}/comments/{id}/', [CommentController::class, 'edit'])->name('comments.edit');//tive um erro de caracteres estranhos pois no {id} estava (id}
route::put('/users/comments/{id}/', [CommentController::class, 'update'])->name('comments.update');
route::post('/users/{id}/comments/', [CommentController::class, 'store'])->name('comments.store');
route::get('/users/{id}/comments', [CommentController::class, 'index'])->name('comments.index');

route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
route::get('/users', [UserController::class, 'index'])->name('users.index');
route::get('/users/create', [UserController::class, 'create'])->name('users.create');
route::post('/users', [UserController::class, 'store'])->name('users.store');
route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
