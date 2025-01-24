<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;

Route::get('/', function () {
    return view('Bancolombiia/welcome');
});



Route::post('/form/store', [FormController::class, 'store'])->name('form.store');
