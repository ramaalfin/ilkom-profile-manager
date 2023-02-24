<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/users/{user}/edit', [UserController::class, 'edit'])->middleware('can:update,user');
Route::put('/users/{user}', [UserController::class, 'update'])->middleware('can:update,user');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->middleware('can:delete,user');

Route::get('/send-email', [MailController::class, 'sendEmail']);
