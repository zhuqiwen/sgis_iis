<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InternOrganization;
use Illuminate\Support\Facades\DB;

class InternOrganizationController extends Controller
{
    public function store(Request $request)
    {
	    //here check if the organization already exists in DB
	    //if it does, then return id directory to view
	    //if not, then insert first and then pass id to view

	    //I am Going To Use the first idea
	    $request->flash();

	    $organization_name = $request->old('organization_name');
	    $organization_url = $request->old('organization_url');

	    //now check if the above is already in DB
	    $organization = InternOrganization::where('name', $organization_name)
		    ->where('url', $organization_url)
		    ->first();

	    if(is_null($organization))
	    {
		    //now this is a new record, store it using insertGetId.
		    $org_id =DB::table('intern_organizations')
			    ->insertGetId([
			    	'name' => $organization_name,
				    'url' => $organization_url,
			    ]);
	    }
	    else
	    {
		    $org_id = $organization->id;
	    }


	    return redirect('/intern/student/application/supervisor')->with('org_id', $org_id);
    }
}
