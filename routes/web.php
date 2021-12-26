<?php

use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Signup;
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
    return view('home');
})->middleware('auth')->name('home');

Route::get('/signup', Signup::class)->name('auth.signup');
Route::get('/login', Login::class)->name('auth.login');
