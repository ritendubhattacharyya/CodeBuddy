<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\ACL;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(ACL::class);

Route::get('/admin-dashboard', [App\Http\Controllers\HomeController::class, 'getAdminDashboard'])->name('admin-dashboard')->middleware(ACL::class);
