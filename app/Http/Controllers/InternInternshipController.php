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
                ->where('intern_internships.deleted_at', null)
                ->where('intern_internships.case_closed', 0)
                ->select('*')
                ->get();

	        $assignment_types = ['journal', 'reflection','site_evaluation'];

            return view('intern.student.internship.journal_evaluation_entry')
	            ->withInternships($internships)
	            ->withAssignmentTypes($assignment_types);

        }

        if($request->isMethod('POST'))
        {

        }

    }
}
