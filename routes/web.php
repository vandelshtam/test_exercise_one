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
Route::get('/layouts', function () {
    return view('layouts.main');
});
Route::get('/main', function () {
    return view('users.main');
});
Route::get('/users', function () {
    return view('users.users');
});
Route::get('/user', function () {
    return view('users.user');
});
Route::get('/register', function () {
    return view('users.register');
});
Route::get('/update', function () {
    return view('users.update');
});
Route::get('/delete', function () {
    return view('users.delete');
});

