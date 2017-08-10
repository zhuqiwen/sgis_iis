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
		return view('intern.student.home');
	});



    Route::get('/application/create', 'InternApplicationController@create');

	Route::post('/application/create', 'InternApplicationController@create');

	Route::post('/application/review_liability', 'InternApplicationController@prepareLiability');


	Route::post('/application/review', 'InternApplicationController@review');
	Route::post('/application/submit', 'InternApplicationController@submit');


	Route::get('/application/organization', 'InternOrganizationController@prepareForm');
	Route::post('/application/organization', 'InternOrganizationController@store');

	Route::get('/application/supervisor', 'InternSupervisorController@prepareForm');
	Route::post('/application/supervisor', 'InternSupervisorController@store');


    Route::get('/internship/assignment/', 'InternInternshipController@assignmentGuide');

});

Route::group(['prefix' => 'student', 'middleware' => ['auth', 'checkRole:student']], function (){
    // define sub uri's actions
    Route::get('/', function (){
        return view('intern.student.base');
    });



    Route::get('/application/create', 'InternApplicationController@create');

    Route::post('/application/create', 'InternApplicationController@create');

    Route::post('/application/review_liability', 'InternApplicationController@prepareLiability');


    Route::post('/application/review', 'InternApplicationController@review');
    Route::post('/application/submit', 'InternApplicationController@submit');


    Route::get('/application/organization', 'InternOrganizationController@prepareForm');
    Route::post('/application/organization', 'InternOrganizationController@store');

    Route::get('/application/supervisor', 'InternSupervisorController@prepareForm');
    Route::post('/application/supervisor', 'InternSupervisorController@store');


    Route::get('/internship/assignment/', 'InternInternshipController@assignmentGuide');



    /////////used by adminlte version//////////
    Route::get('/internship/application/ajax_create', function(){
        return view('intern.student.application.create_adminlte_version');
    });

    ////////store new organization///////
    Route::post('/internship/application/ajax_store_organization', 'InternOrganizationController@ajaxStore');
    ///////store new supervisor///////
    Route::post('/internship/application/ajax_store_supervisor', 'InternSupervisorController@ajaxStore');

    Route::get('/internship/application/ajax_index_unsubmitted', function(){
        return '<p>unsubmitted application view</p>';
    });

    Route::get('/internship/application/ajax_index_submitted', function(){
        return '<p>submitted  view</p>';
    });

    Route::get('/internship/ajax_index_approved', function(){
        return '<p>approved internship view</p>';
    });

    Route::get('/internship/ajax_prepare_assignments', function(){
        return '<p>assignments view</p>';
    });

});




Route::group(['prefix' => 'intern/supervisor', 'middleware' => ['auth', 'checkRole:supervisor']], function (){
	// define sub uri's actions
});




Route::group(['prefix' => 'intern/admin', 'middleware' => ['auth', 'checkRole:intern_admin']], function (){
	// define sub uri's actions
	Route::get('/', function (){
		return view('intern.admin.home');
	});

	Route::get('application/to_approve', 'InternApplicationController@indexApplicationToBeApproved');
	Route::get('internship/to_close', 'InternInternshipController@indexInternshipToBeClosed');


});

Route::group(['prefix' => 'admin/internship', 'middleware' => ['auth', 'checkRole:intern_admin']], function (){
    // define sub uri's actions
    Route::get('/', function (){
        return view('intern.admin.base');
    });

    Route::get('application/to_approve', 'InternApplicationController@indexApplicationToBeApproved');
    Route::get('internship/to_close', 'InternInternshipController@indexInternshipToBeClosed');

    //Ajax calls, used by adminlte version
    Route::post('application/ajax_to_approve', 'InternApplicationController@ajaxApplicationToApprove');
    Route::get('application/ajax_group_by', 'InternApplicationController@ajaxApplicationToApprove');


//    Route::get('to_close/ajax_to_approve', 'InternInternshipController@ajaxApplicationToApprove');
    Route::get('to_close/ajax_group_by', 'InternInternshipController@ajaxInternshipToClose');


});







Route::group(['prefix' => 'alum/admin', 'middleware' => ['auth', 'checkRole:alum_admin']], function (){
	// define sub uri's actions
});

//Ajax calls
Route::get('/intern/application/to_group/ajax', 'InternApplicationController@ajaxGetGroupedApplicationCards');
Route::post('/intern/application/to_approve/ajax', 'InternApplicationController@ajaxApproveApplication');

//following routes are for testing new features
Route::get('/logout', function (){
	Auth::logout();
	return redirect('/');
});

Route::get('/test_css_blade', ['as' => 'css_blade', 'uses' => 'TestFeatureController@cssBlade']);
Route::get('/test_search', array('as' => 'search', 'uses' => 'TestAutocompleteController@search'));
Route::get('/test_autocomplete', array('as' => 'autocomplete', 'uses' => 'TestAutocompleteController@autocomplete'));

Route::get('/test_pdf', 'TestFeatureController@pdf');


Route::get('/test', function (){
	return view('test.test');
});



Route::get('/test_tab_list', function (){
	return view('test.test_list_tab');
});

Route::get('/test_card_in_div', function (){
	return view('test.test_card_in_div');
});

Route::post('/test_assignment_post', 'InternInternshipController@assignmentSubmit');



//Route::get('/test_ajax', function(){
//    return [
//    	'China' => 'china',
//    	'Japan' => 'japan',
//    	'UK' => 'uk',
//    	'US' => 'us',
//    ];
//});

//Route::get('/test_ajax', 'InternApplicationController@getGroupedApplications');
//Route::post('/test_ajax_country', 'CountryController@ajax');
Route::get('/test_ajax_state', 'StateController@ajaxGetStateByCountryId');
Route::get('/test_ajax_city', 'CityController@ajaxGetCityByStateId');
Route::get('/test_ajax_organization', 'InternOrganizationController@ajaxGetSuggestions');
Route::get('/test_ajax_get_available_docs', 'InternInternshipController@ajaxGetAvailableDocs');
Route::post('/test_ajax_close_internship', 'InternInternshipController@ajaxCloseInternship');
Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/adminlte', function (){
//    return view('test.adminlte_home');
    return view('test.student_intern_nested');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/adminlte_ajax_test', function (){
    return view('intern.admin.application.to_approve')->withTestNum(rand(1,10));
});
