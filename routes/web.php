<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RoleController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['as'=>'app.','prefix'=>'app','middleware'=>['auth']],function(){
    Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');
    Route::resource('roles',RoleController::class);
});