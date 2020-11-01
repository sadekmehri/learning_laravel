<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\user\UserController;
use App\Http\Controllers\admin\users\CrudUserController;
use App\Http\Controllers\RegisterController;
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

// Login System
Route::get('/', RegisterController::class.'@index')->name('home.index');
Route::post('/', RegisterController::class.'@authenticate')->name('home.index');
Route::get('/reset', RegisterController::class.'@email')->name('home.email');
Route::get('/logout', RegisterController::class.'@logout')->name('home.logout');

// User Panel
Route::group(['as'=>'user.', 'prefix' => 'user' ,'middleware'=>['user']], function () {
    Route::get('/',UserController::class.'@index')->name('index');
});

// Admin Panel
Route::group(['as'=>'admin.', 'prefix' => 'admin' ,'middleware'=>['admin']], function () {

    Route::get('/',AdminController::class.'@index')->name('index');

    // Creating Users
    Route::group(['as'=>'users.', 'prefix' => 'users' ], function ()
    {
        Route::get('/getUsersData',CrudUserController::class.'@getUsersData')->name('getUsersData');
        Route::get('/getRolesData',CrudUserController::class.'@getRolesData')->name('getRolesData');
        Route::get('/{id}/fetch',CrudUserController::class.'@fetchOneUser')->name('fetch')->where(['id' => '[0-9]+']);
        Route::resource('',CrudUserController::class,['parameters' => ['' => 'id']]);
    });

});

