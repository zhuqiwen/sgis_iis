<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InternOrganization;
use Illuminate\Support\Facades\DB;

class InternOrganizationController extends Controller
{
    public function store(Request $request)
    {
	    $organization = InternOrganization::where('name', $request->input('name'))
		    ->where('url', $request->input('url'))
		    ->where('type', $request->input('type'))
		    ->first();

	    if(is_null($organization))
	    {
		    $new_organization = InternOrganization::create($request->except('_token'));
		    $org_id = $new_organization->id;
	    }
	    else
	    {
		    $org_id = $organization->id;
	    }


	    return redirect('/intern/student/application/supervisor')->with('org_id', $org_id);
    }
}
