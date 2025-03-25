<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', [UserController::class, 'index'])->name('index');
Route::get('/show/{id}', [UserController::class, 'show'])->name('show');

Route::get('/create', [UserController::class, 'create'])->name('create');
Route::post('/', [UserController::class, 'store'])->name('store');

Route::get('/update/{id}', [UserController::class, 'edit'])->name('edit');
Route::post('/{id}', [UserController::class, 'update'])->name('update');
Route::get('/{id}', [UserController::class, 'destroy'])->name('delete');

Route::get('/roleAssign/{id}', [UserController::class, 'assign'])->name('assign');
Route::post('/roleUpdate/{id}', [UserController::class, 'assignUpdate'])->name('assignUpdate');