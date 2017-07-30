<?php

namespace App\Http\Controllers;

use app\Helpers\HTMLSnippet;
use app\Helpers\TravelWarning;
use App\Models\InternInternship;
use App\Models\InternJournal;
use App\Models\InternReflection;
use App\Models\InternStudentEvaluation;
use App\Models\InternSiteEvaluation;
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

	        $assignment_types = ['journal', 'reflection','site_evaluation', 'student_evaluation'];

	        $modals = '';
	        foreach ($assignment_types as $doc_type)
            {
                $modals .= HTMLSnippet::generateInternshipAssignmentModal($doc_type);
            }

            return view('intern.student.internship.journal_evaluation_entry')
	            ->withInternships($internships)
	            ->withAssignmentTypes($assignment_types)
	            ->withInternshipOptions($internship_options)
                ->withAssignmentModals($modals);

        }

        if($request->isMethod('POST'))
        {

        }

    }

    public function ajaxGetAvailableDocs(Request $request)
    {
        if($request->isMethod('GET'))
        {
            if($request->has('internship_id'))
            {
                $internship_id = $request->internship_id;

                $journals = new InternJournal();
                $journals = $journals->getAvailable($internship_id);

                $reflection = new InternReflection();
                $reflection = $reflection->getAvailable($internship_id);

                $site_evaluation = new InternSiteEvaluation();
                $site_evaluation = $site_evaluation->getAvailable($internship_id);

                $student_evaluations = new InternStudentEvaluation();
                $student_evaluations = $student_evaluations->getAvailable($internship_id);

                return json_encode([
                    'journal' => $journals,
                    'reflection' => $reflection,
                    'site_evaluation' => $site_evaluation,
                    'student_evaluation' => $student_evaluations
                ]);
            }
        }
    }
}
