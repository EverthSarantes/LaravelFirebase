<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;

Route::get('/', [TestController::class, 'index']);

Route::get('/inicio', function () {
    return view('welcome');
});
