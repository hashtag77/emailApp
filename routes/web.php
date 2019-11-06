<?php

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

/*Route::get('/', function () {
    return view('welcome');
});*/


Route::get('/', 'UserController@index')->name('user');
Route::post('/user/form', 'UserController@create')->name('user.form');
Route::get('/template/list', 'EmailTemplateController@index')->name('template.email.list');
Route::get('/template/add', 'EmailTemplateController@create')->name('template.email.add');
Route::post('/template/create', 'EmailTemplateController@store')->name('template.email.create');
Route::get('/template/edit/{id}', 'EmailTemplateController@edit')->name('template.email.edit');
Route::post('/template/update/{id}', 'EmailTemplateController@update')->name('template.email.update');
Route::post('/template/delete', 'EmailTemplateController@destroy')->name('template.email.delete');
