<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GlobalController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\validStudent;

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

Route::get('/',[GlobalController::class,'Home'])->name("Home");

Route::get('/login',[GlobalController::class,'Login'])->name("Login");
Route::post('/login',[GlobalController::class,'LoginSubmit'])->name("LoginSubmit");

Route::get('/registration/{id}',[GlobalController::class,'Registration'])->name("RegistrationUser");
Route::get('/registration/{id}',[GlobalController::class,'Registration'])->name("RegistrationAdmin");

Route::post('/registration/user',[UserController::class,'RegSubmit'])->name("UserSubmit");
Route::post('/registration/admin',[AdminController::class,'RegSubmit'])->name("AdminSubmit");

Route::get('/user/dashboard',[UserController::class,'Dashboard'])->name("Dashboard")->middleware("validUser");
Route::post('/user/dashboard',[UserController::class,'DashboardSubmit'])->name("DashboardSubmit")->middleware("validUser");

Route::get('/user/edit',[UserController::class,'Edit'])->name("Edit")->middleware("validUser");
Route::post('/user/edit',[UserController::class,'EditSubmit'])->name("EditSubmit")->middleware("validUser");

Route::get('/user/logout',[UserController::class,'Logout'])->name("Logout");
Route::get('/admin/logout',[AdminController::class,'Logout'])->name("Logout");

Route::get('/user/profile',[UserController::class,'Profile'])->name("Profile")->middleware("validUser");


Route::get('/admin/userlist',[AdminController::class,'Userlist'])->name("Userlist")->middleware("validAdmin");

Route::get('/admin/edit/{id}',[AdminController::class,'Edit'])->name("adEdit")->middleware("validAdmin");
Route::post('/admin/edit',[AdminController::class,'EditSubmit'])->name("adEditSubmit")->middleware("validAdmin");

Route::get('/admin/delete/{id}',[AdminController::class,'Delete'])->name("Delete")->middleware("validAdmin");