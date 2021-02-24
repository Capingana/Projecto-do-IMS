<?php

use App\Http\Controllers\Sistema\SistemaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [SistemaController::class, 'index'])->name('index');
Route::get('/login', [SistemaController::class, 'login'])->name('login');
Route::post('/login_submit', [SistemaController::class, 'login_submit'])->name('login_submit');
Route::get('/temp', [SistemaController::class, 'temp'])->name('temp');
