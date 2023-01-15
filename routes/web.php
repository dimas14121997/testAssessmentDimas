<?php

use App\Http\Controllers\Vendors;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserManagement;
use App\Http\Controllers\LoginController;

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

Route::get('/', [LoginController::class,'index'])->middleware('guest');
Route::post('/login', [LoginController::class,'authenticate']);
Route::post('/logout',[LoginController::class,'logout']);
Route::get('/dashboard',function(){
    return view('dashboard.index');
})->middleware('auth');


Route::get('/user-management',[UserManagement::class, 'index'])->middleware('auth');
Route::get('/user-management-add',[UserManagement::class, 'form'])->middleware('auth');
Route::post('/user-management',[UserManagement::class, 'store']);
Route::delete('/user-management/{email}',[UserManagement::class,'destroy'])->middleware('auth');
Route::get('/user-management/{email}',[UserManagement::class,'showupdate'])->middleware('auth');
Route::post('/user-management/{email}',[UserManagement::class,'update'])->middleware('auth');



Route::get('/posts/{post:slug}',[UserManagement::class,'show']);

Route::get('/vendor',[Vendors::class, 'show'])->middleware('auth');
Route::get('/vendor-form',[Vendors::class, 'index'])->middleware('auth');
Route::post('/vendor-add',[Vendors::class, 'store'])->middleware('auth');

