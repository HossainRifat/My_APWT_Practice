<?php

use App\Http\Controllers\pageController;
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
    return view('welcome');
});

// Route::get('/hello',function(){
//     return view('hello');
// });

Route::get('/home',[pageController::class,'Hello'])->name('home');

Route::get('/about',[pageController::class,'About']);

Route::get('/products',[pageController::class,'Products']);

Route::get('/add',[pageController::class,'Add_product']);

Route::get('/contact',[pageController::class,'Contact']);

Route::post('/showProduct',[pageController::class,'showProduct']);

Route::get('/team',[pageController::class,'Our_team']);