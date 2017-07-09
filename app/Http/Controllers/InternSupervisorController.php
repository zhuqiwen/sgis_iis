<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InternSupervisorController extends Controller
{
    public function store(Request $request)
    {
	    // do the same as with organization controller

	    $request->flash();

	    $org_id = $request->old('org_id');
	    $phone = $request->old('supervisor_phone_country_code').$request->old('supervisor_phone');
	    $first_name = $request->old('supervisor_first_name');
	    $last_name =$request->old('supervisor_last_name');
	    $prefix = $request->old('supervisor_prefix');
	    $email = $request->old('supervisor_email');



		$supervisor = DB::table('intern_supervisors')
			->where('first_name', $first_name)
			->where('last_name', $last_name)
			->where('prefix', $prefix)
			->where('email', $email)
			->where('phone', $phone)
			->where('organization_id', $org_id)
			->first();

	    if(is_null($supervisor))
	    {
		    $supervisor_id = DB::table('intern_supervisors')
			    ->insertGetId([
				    'first_name' => $first_name,
					'last_name' => $last_name,
		            'prefix' => $prefix,
					'email' => $email,
					'phone' => $phone,
					'organization_id' => $org_id,
			    ]);
	    }
	    else
	    {
		    $supervisor_id = $supervisor->id;
	    }

	    $data = [
	    	'org_id' => $org_id,
		    'supervisor_id' => $supervisor_id,
	    ];
	    return redirect('/intern/student/application/create')
		    ->with('data', $data);


	    echo '<pre>';
//	    print_r($request->old());
	    print_r(session('org_id'));
	    exit();

    }

    public function prepareForm()
    {
	    return view('intern.student.application.supervisor')
		    ->with('org_id', session('org_id'));
    }

}
