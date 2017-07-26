<?php

namespace App\Http\Controllers;

use app\Helpers\HTMLSnippet;
use app\Helpers\TravelWarning;
use App\Models\InternInternship;
use Illuminate\Http\Request;
use App\User;
use App\Models\InternApplication;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Sabberworm\CSS\Value\String;

class InternInternshipController extends Controller
{
    public function assignmentGuide(Request $request)
    {
        $user_id = Auth::user()->id;
        if($request->isMethod('GET'))
        {


            $internships = InternInternship::join('intern_applications', function ($join) use ($user_id)
                                            {
                                                $join->on('intern_applications.id', 'intern_internships.application_id');
                                                $join->where('intern_applications.is_submitted', 1);
                                                $join->where('intern_applications.is_approved', 1);
                                                $join->where('intern_applications.deleted_at', null);
                                                $join->where('intern_applications.user_id', $user_id);
                                            })
	            ->join('intern_organizations', function ($join)
	            {
		            $join->on('intern_organizations.id', 'intern_applications.organization_id');
	            })
                ->where('intern_internships.deleted_at', null)
                ->where('intern_internships.case_closed', 0)
                ->select(
                	'intern_internships.id AS internship_id',
                	'intern_applications.id AS application_id',
                	'intern_applications.term AS internship_term',
                	'intern_applications.year AS internship_year',
                	'intern_applications.country AS internship_country',
                	'intern_organizations.name AS organization_name'
                )
                ->get();


	        $internship_options = [];
	        foreach ($internships as $internship)
	        {
		        $internship_options[$internship->internship_id] = 'ID: '
			        .$internship->internship_id
			        .'--'
			        .$internship->internship_term
			        .' '
			        .$internship->internship_year;
	        }

	        $assignment_types = ['journal', 'reflection','site_evaluation'];

            return view('intern.student.internship.journal_evaluation_entry')
	            ->withInternships($internships)
	            ->withAssignmentTypes($assignment_types)
	            ->withInternshipOptions($internship_options);

        }

        if($request->isMethod('POST'))
        {

        }

    }
}
