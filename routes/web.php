<?php

use App\Http\Controllers\Core;
use App\Http\Controllers\CoreX;
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
Route::get('bot',[Core::class,"Process"]);
Route::post('bot',[Core::class,"Process"]);
Route::get('test',[Core::class,"test"]);
Route::get('image',[Core::class,"Image"]);
Route::get('/', function () {
    return view('welcome');
});
