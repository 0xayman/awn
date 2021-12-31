<?php

use App\Http\Controllers\IdeaController;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Signup;
use App\Http\Livewire\Home;
use App\Http\Livewire\ShowSingleIdea;
use App\Http\Livewire\Notifications;
use App\Http\Livewire\Profile;
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

Route::get('/{url?}', Home::class)->where(['url' => 'ideas'])->name('home');

Route::get('/ideas/{idea:slug}', ShowSingleIdea::class)->name('ideas.show');
Route::get('/notifications', Notifications::class)->name('notifications');
Route::get('/profile', Profile::class)->middleware('auth')->name('profiles.me');
Route::get('/profile/{user:slug}', Profile::class)->name('profiles.show');

Route::get('/signup', Signup::class)->middleware('guest')->name('auth.signup');
Route::get('/login', Login::class)->middleware('guest')->name('auth.login');
