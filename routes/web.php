<?php

use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return redirect('users');
});

Route::get('users/', [UserController::class, 'index'])->name('users');
Route::get('exports/', [UserController::class, 'exports'])->name('exports');
Route::get('users/export/', [UserController::class, 'export'])->name('users.export');
Route::get('users/export/download/{export_id}', [UserController::class, 'download'])->name('users.export.download');
