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
    return view('index');
});
Route::get('/companies', function () {
    return view('companies');
});
Route::get('/login', function () {
    return view('login');
});
Route::get('/recurments', function () {
    return view('recurments');
});
Route::get('/searchjob', function () {
    return view('searchjob');
});
Route::get('/services', function () {
    return view('services');
});
