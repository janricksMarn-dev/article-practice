<?php

use App\Http\Controllers\ArticlesController;
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

Route::controller(ArticlesController::class)->group(function() {
    Route::get('/createpost', 'create')->name('create');
    Route::post('/save', 'save')->name('save');
    Route::get('/delete/{id}', 'delete')->name('delete');
    Route::get('/', 'dashboard')->name('dashboard');
    Route::get('/upvote/{id}', 'upvote')->name('upvote');
    Route::get('/downvote/{id}', 'downvote')->name('downvote');
    Route::get('/edit/{id}', 'edit')->name('edit');
    Route::put('/update/{id}', 'update')->name('update');
});