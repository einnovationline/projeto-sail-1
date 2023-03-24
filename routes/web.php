<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller\ControleInicioController;
use App\Http\Controllers\{
    UserController
};
use App\Http\Controllers\ControleSeriesController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Inertia\Inertia;

/*------- Web Routes -------------
|Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
Quando do uso do breeze, sobrescreveu as rotas e foi para o aut.php da msm pasta routes
Na aula foi retirado o código abaixo, mantive o restante pq na hora de instalar o breeze foi dada opções
de outras ferramentas e dei ok.

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
*/

//middleware ira fazer a autenticação para cada rota especificada dentro do group
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

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

    route::get('/series', [ControleSeriesController::class, 'index'])->name('series.index');

    route::get('/inicio', [ControleInicioController::class, 'index'])->name('inicio.index');


});

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('inicio');
});

//a pasta início é definida agora após o breeze na pasta app/providers/RouteServiceProvider.php
