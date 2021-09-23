<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Admin\UserController;

Route::get('', [HomeController::class,'index'])->name('admin.home');


Route::resource('user', UserController::class)->only(['index','edit','update'])->names('admin.users');

Route::resource('roles', RoleController::class)->names('admin.roles');

Route::resource('students',StudentController::class);




