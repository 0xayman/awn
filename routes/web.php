<?php

use App\Http\Controllers\IdeaController;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Signup;
use App\Http\Livewire\Home;
use App\Http\Livewire\ShowSingleIdea;
use App\Http\Livewire\Notifications;
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

Route::get('/', Home::class)->name('home');

Route::get('/ideas/{idea:slug}', ShowSingleIdea::class)->name('ideas.show');
Route::get('/notifications', Notifications::class)->name('notifications');

Route::get('/signup', Signup::class)->middleware('guest')->name('auth.signup');
Route::get('/login', Login::class)->middleware('guest')->name('auth.login');
