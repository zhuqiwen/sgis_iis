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

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

//访问/ 直接跳转至login
Route::get('/', function () {
	return redirect('/login');
});

Auth::routes();

//Route::get('/home', 'HomeController@index');
Route::get('/home', array('as' => 'gotohome', 'uses' => 'HomeController@index'));



//3个url大类 /student, /supervisor, /intern/admin, /alum/admin
//每个大类的uri及其子uri，都需要相应的role才可以进入，否则直接跳转至login路由
// admin/intern, admin/alum
Route::group(['prefix' => 'intern/student', 'middleware' => ['auth', 'checkRole:student']], function (){
	// define sub uri's actions
	Route::get('/', function (){
		return view('intern.student.profile');
	});
	Route::get('/application/create', function (){
		return view('intern.student.application.create');
	});
	Route::post('/application/create', 'InternApplicationController@create');

	Route::post('/application/release_liability', 'InternApplicationController@releaseLiability');

	Route::post('/application/review', 'InternApplicationController@review');


	Route::get('/application/organization', function (){
		return view('intern.student.application.organization');
	});
	Route::post('/application/organization', 'InternOrganizationController@store');

	Route::get('/application/supervisor', 'InternSupervisorController@prepareForm');
	Route::post('/application/supervisor', 'InternSupervisorController@store');

});

Route::group(['prefix' => 'intern/supervisor', 'middleware' => ['auth', 'checkRole:supervisor']], function (){
	// define sub uri's actions
});

Route::group(['prefix' => 'intern/admin', 'middleware' => ['auth', 'checkRole:intern_admin']], function (){
	// define sub uri's actions
});

Route::group(['prefix' => 'alum/admin', 'middleware' => ['auth', 'checkRole:alum_admin']], function (){
	// define sub uri's actions
});



//following routes are for testing new features
Route::get('/logout', function (){
	Auth::logout();
	return redirect('/');
});
Route::get('/test_search', array('as' => 'search', 'uses' => 'TestAutocompleteController@search'));
Route::get('/test_autocomplete', array('as' => 'autocomplete', 'uses' => 'TestAutocompleteController@autocomplete'));

Route::group(['prefix' => 'test', 'middleware' => ['auth', 'checkRole:student']], function (){
	Route::get('abc', function (){
		echo "hahaha yoho";
		exit();
	});
	Route::get('test', function (){
		return view('test.test');
	});
	Route::get('bcd', function (){
		return view('welcome');
	});
});
