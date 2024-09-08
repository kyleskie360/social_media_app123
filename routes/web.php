<?php

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile/{id}', [ProfileController::class, 'show'])->name('profiles.show');
Route::post('/profile/update', [ProfileController::class, 'update'])->name('profiles.update');


use App\Http\Controllers\ProfileController;

// Route to show the profile edit form
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');

// Route to handle the profile update
Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
