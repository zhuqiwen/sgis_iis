<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InternOrganization;
use Illuminate\Support\Facades\DB;

class InternOrganizationController extends Controller
{
    public function prepareForm()
    {
        $organization_types = [
            'Government' => 'Government',
            'NGO' => 'NGO',
            'Industry' => 'industry',
            'Other' => 'Other',
        ];

        return view('intern.student.application.organization')
            ->withOrganizations(InternOrganization::all())
            ->withOrganizationTypes($organization_types);
    }

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

    public function ajaxGetSuggestions(Request $request)
    {

        if($request->ajax() && $request->isMethod('GET'))
        {
            $organizations = new InternOrganization();


//            foreach ($request->except('_token') as $key => $value)
//            {
//                $organizations = $organizations->where($key, 'LIKE', '%'.$value.'%');
//            }

        }
        return json_encode($organizations->all());

    }
}
