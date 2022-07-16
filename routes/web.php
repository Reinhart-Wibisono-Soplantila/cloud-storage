<?php

use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\ArchiveController;
use GuzzleHttp\Middleware;

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


Route::get('/', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index']);

    Route::resource('/admin/penyimpanan', ArchiveController::class, [
        'parameters' => [
            'penyimpanan' => 'archive'
        ]
    ]);

    Route::resource('/admin/akun', AccountController::class, [
        'parameters' => [
            'akun' => 'User'
        ]
    ]);
    Route::get('/admin/detail/{file}', [DetailController::class, 'download']);
    Route::get('/admin/detail/{file}', [DetailController::class, 'view']);
    Route::match(['put', 'patch'], '/admin/detail/{file}', [DetailController::class, 'edit']);
    Route::delete('/admin/detail/{file}', [DetailController::class, 'destroy']);
});
