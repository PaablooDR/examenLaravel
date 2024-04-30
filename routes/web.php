<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\CasalController;
use App\Http\Controllers\CiutatController;

Route::get('/', [UserController::class, 'index']) ->name('user.index');
Route::post('user/login', [UserController::class, 'login'])->name('user.login');
Route::get('user/create', [UserController::class, 'create'])->name('user.create');
Route::post('user/register', [UserController::class, 'store'])->name('user.register');
Route::get('user/logout', [UserController::class, 'logout'])->name('user.logout');

Route::get('/home', [CasalController::class, 'home'])->name('user.home');
Route::get('/new', [CasalController::class, 'new'])->name('casal.new');
Route::post('casal/store', [CasalController::class, 'store'])->name('casal.store');
Route::get('casal/edit/{casal}', [CasalController::class, 'edit'])->name('casal.edit');
Route::post('casal/update/{casal}', [CasalController::class, 'update'])->name('casal.update');
Route::get('casal/delete/{casal}', [CasalController::class, 'delete'])->name('casal.delete');
