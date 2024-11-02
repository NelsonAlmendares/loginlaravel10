<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PersonaController;
use Illuminate\Support\Facades\Route;

use function Ramsey\Uuid\v1;


Route::get('/', function () {
    return view('welcome');
});

// Rutas para el registro
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerPost'])->name('register');

// Rutas para el Login
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost'])->name('login');

// Rutas para Home
Route::get('/home', [HomeController::class, 'index']);

// Rutas para Home
Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');

// Listar datos
Route::get('/persona', [PersonaController::class, 'index'])->name('personas.index');

// Registrar datos
Route::get('/personaRegister', [PersonaController::class, 'create'])->name('personas.register');
Route::post('/personaRegister', [PersonaController::class, 'store'])->name('personas.register');
// Update y Delete
Route::post('/personaUpdate/{id}', [PersonaController::class, 'edit'])->name('personas.edit');
Route::post('/personaDestoy/{id}', [PersonaController::class, 'destroy'])->name('personas.destroy');

