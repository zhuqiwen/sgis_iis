<?php

namespace App\Http\Controllers;

use App\Models\InternSupervisor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InternSupervisorController extends Controller
{
    public function store(Request $request)
    {
	    // do the same as with organization controller






		$supervisor = InternSupervisor::where('first_name', $request->input('first_name'))
			->where('last_name', $request->input('last_name'))
			->where('prefix', $request->input('prefix'))
			->where('email', $request->input('email'))
			->where('phone', $request->input('phone_country_code').$request->input('phone'))
			->where('organization_id', $request->input('organization_id'))
			->first();


	    if(is_null($supervisor))
	    {
//		    $supervisor_id = DB::table('intern_supervisors')
//			    ->insertGetId([
//				    'first_name' => $first_name,
//					'last_name' => $last_name,
//		            'prefix' => $prefix,
//					'email' => $email,
//					'phone' => $phone,
//					'organization_id' => $org_id,
//			    ]);
		    $supervisor = InternSupervisor::create($request->except('_token'));
		    $supervisor_id  = $supervisor->id;
	    }
	    else
	    {
		    $supervisor_id = $supervisor->id;
	    }

	    $data = [
	    	'org_id' => $request->input('organization_id'),
		    'supervisor_id' => $supervisor_id,
	    ];
	    return redirect('/intern/student/application/create')
		    ->with('data', $data);

    }

    public function prepareForm()
    {
	    return view('intern.student.application.supervisor')
		    ->with('org_id', session('org_id'));
    }

}
