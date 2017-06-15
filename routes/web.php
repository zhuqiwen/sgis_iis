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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');






//following routes are for testing new features
Route::get('/test_search', array('as' => 'search', 'uses' => 'TestAutocompleteController@search'));
Route::get('/test_autocomplete', array('as' => 'autocomplete', 'uses' => 'TestAutocompleteController@autocomplete'));
