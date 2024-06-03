<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\TipCalculatorController;
use App\Http\Controllers\PasswordGeneratorController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\MemoryGameController;
use App\Http\Controllers\StopwatchController;


//Ruta del menu
Route::get('/', [MenuController::class, 'index'])->name('home');
// Ruta de tareas
Route::middleware(['web'])->group(function () {
    Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
    Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
    Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
    Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
});

// Nueva ruta para la calculadora de propinas
Route::get('/tip_calculator', [TipCalculatorController::class, 'index'])->name('tip_calculator.index');
Route::post('/tip_calculator/calculate', [TipCalculatorController::class, 'calculate'])->name('tip_calculator.calculate');

// Rutas generador de contraseñas
Route::get('/password-generator', [PasswordGeneratorController::class, 'index'])->name('password.index');
Route::post('/password-generator/generate', [PasswordGeneratorController::class, 'generate'])->name('password.generate');

//Rutas gestor de gastos
Route::get('/expenses', [ExpenseController::class, 'index'])->name('expenses.index');
Route::get('/expenses/create', [ExpenseController::class, 'create'])->name('expenses.create');
Route::post('/expenses', [ExpenseController::class, 'store'])->name('expenses.store');

//Rutas reservaciones

Route::get('/reservations', [ReservationController::class, 'index'])->name('reservations.index');
Route::get('/reservations/create/{service}', [ReservationController::class, 'create'])->name('reservations.create');
Route::post('/reservations', [ReservationController::class, 'store'])->name('reservations.store');
Route::get('/reservations/{reservation}', [ReservationController::class, 'show'])->name('reservations.show');

//Ruta del navegador de notas
Route::get('/gnotes/navigation', function () {
    return view('gnotes.navigation');
})->name('gnotes.navigation');

// Rutas para las notas
Route::get('/notes', [NoteController::class, 'index'])->name('notes.index');
Route::get('/notes/create', [NoteController::class, 'create'])->name('notes.create');
Route::post('/notes', [NoteController::class, 'store'])->name('notes.store');
Route::get('/notes/{note}', [NoteController::class, 'show'])->name('notes.show');
Route::get('/notes/{note}/edit', [NoteController::class, 'edit'])->name('notes.edit');
Route::put('/notes/{note}', [NoteController::class, 'update'])->name('notes.update');
Route::delete('/notes/{note}', [NoteController::class, 'destroy'])->name('notes.destroy');

//Rutas para categorias
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

//Rutas para eventos
Route::get('/events', [EventController::class, 'index'])->name('events.index');
    Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
    Route::post('/events', [EventController::class, 'store'])->name('events.store');
    Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');
    Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
    Route::put('/events/{event}', [EventController::class, 'update'])->name('events.update');
    Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');


//Rutas juego de memoria
Route::get('/memory_game/scores', [MemoryGameController::class, 'showScores'])->name('memory_game.scores');
    Route::get('/memory_game', [MemoryGameController::class, 'index'])->name('memory_game.index');
    Route::post('/memory_game/save-score', [MemoryGameController::class, 'saveScore'])->name('memory_game.save_score');

//Cronometro
Route::get('/stopwatch', [StopwatchController::class, 'index'])->name('stopwatch.index');
Route::post('/stopwatch/start', [StopwatchController::class, 'start'])->name('stopwatch.start');
Route::post('/stopwatch/pause', [StopwatchController::class, 'pause'])->name('stopwatch.pause');
Route::post('/stopwatch/reset', [StopwatchController::class, 'reset'])->name('stopwatch.reset');


