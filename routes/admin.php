<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\UserController as ControllersUserController;

Route::get('', [HomeController::class,'index'])->name('admin.home');


Route::resource('user', UserController::class)->only(['index','edit','update'])->names('admin.users');

Route::resource('studentsuser', ControllersUserController::class)->names('admin.studentsuser');

Route::resource('roles', RoleController::class)->names('admin.roles');

Route::resource('course', CourseController::class)->names('admin.course');

Route::resource('notes', NoteController::class)->names('admin.notes');



