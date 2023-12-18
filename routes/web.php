<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::controller(EventController::class)->group(function (){
        Route::get('/', 'index')->name('event.index');
        Route::put('/join-event/{event}', 'joinEvent')->name('join-event');
        Route::put('/leave-event/{event}', 'leaveEvent')->name('leave-event');
    });

    Route::get('/user/{user}', UserController::class)->name('user.show');
});
