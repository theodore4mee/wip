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

Route::group(['prefix' => '/employee', 'namespace' => 'employee'], function () {
    Route::get('/', 'employeeController@index');
    Route::get('/fetch/{id}', 'employeeController@fetchEmployee');
    Route::post('/create', 'employeeController@createEmployee');
    Route::post('/edit', 'employeeController@updateEmployee');
});
