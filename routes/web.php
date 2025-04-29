<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Auth;

// Redirecionar a raiz para o dashboard se autenticado, senão login
Route::get('/', function () {
    return redirect()->route('login');
});

// Rotas protegidas por autenticação
Route::middleware(['auth'])->group(function () {
    // Painel principal
    Route::get('/dashboard', function () {
        return redirect()->route('tasks.index');
    })->middleware(['auth', 'verified'])->name('dashboard');;

    // CRUD de tarefas
    Route::resource('tasks', TaskController::class);

    // Perfil de usuário
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';