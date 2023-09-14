<?php

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\FormController;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/forms/create', [FormController::class, 'create'])->name('forms.create');
Route::post('/forms/store', [FormController::class, 'store'])->name('forms.store');
Route::get('/forms/{id}', [FormController::class, 'show'])->name('forms.show');

Route::get('/todo', [AjaxController::class, 'index']);
Route::post('/todo/store', [AjaxController::class, 'store'])->name('store');

