<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\User;

class InternApplicationController extends Controller
{
    //
	public function create()
	{
//		$user = Auth::user();
		// receive data from review page



	}

	public function releaseLiability(Request $request)
	{
		$request->flash();
		$user = User::find($request->old('user_id'));


		echo '<pre>';
		print_r($user);
//		print_r($request->old());
//		print_r($request->old('intern_state'));
//		print_r($request->session()->all());
		exit();
		//receive data from application form and put them into session
		//produce liability release form based on info in session

		//check is the release is signed:
		//if yes, put true tag into session and direct to review
		//if not, put false tag into session and set is_submitted false,
		//  and then insert into db and go back to student's home page
	}

	public function review(Request $request)
	{
		$request->flash();
		echo '<pre>';
		print_r($request->old('intern_state'));
		print_r($request->session()->all());
		exit();
		//receive data from liability release form
		//store them in session
		//produce review page
	}

	public function submit()
	{
		//this requires table with a is_submitted field
		//if an application is submitted, then it is not allowed to be edited.
	}

	public function show($id)
	{

	}

	public function edit($id)
	{
		// if application is submitted, call show()

	}
}
