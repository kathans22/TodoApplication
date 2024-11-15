<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('todos')->as('todos.')->controller(TodoController::class)->group(function()
{

    Route::get('index','index')->name('index');

    Route::get('create', 'create')->name('create');

    Route::post('store', 'store')->name('store');

    Route::get('show/{id}','show')->name('show');

    Route::get('{id}/edit', 'edit')->name('edit');

    Route::put('update', 'update')->name('update');

    Route::delete('destroy', 'destroy')->name('destroy');

});