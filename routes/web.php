<?php

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

Route::get('/','LoginController@login')->name('login');
Route::post('do-login','LoginController@doLogin')->name('do.login');

Route::get('users','project@homePage')->name('home');


Route::get('new-user','project@create')->name('create.user');
Route::post('save-user','project@save')->name('save.user');

Route::get('edit-user/{userId}','project@edit')->name('edit.user');
Route::post('update-user','project@update')->name('update.user');

Route::get('delete-user/{userId}','project@delete')->name('delete.user');



//Route::get('about-us','project@aboutUs')->name('about');
//Route::get('contact-us','project@contactUs')->name('contact');
