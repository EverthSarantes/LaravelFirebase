<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;

Route::get('/', [TestController::class, 'index'])->name('/');
Route::post('/store', [TestController::class, 'store'])->name('store');
Route::put('/update', [TestController::class, 'update'])->name('update');
Route::delete('/delete/{id}', [TestController::class, 'delete'])->name('delete');
