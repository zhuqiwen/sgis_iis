<?php

namespace App\Http\Controllers;

use app\Helpers\HTMLSnippet;
use app\Helpers\TravelWarning;
use App\Models\InternInternship;
use App\Models\InternJournal;
use App\Models\InternReflection;
use App\Models\InternStudentEvaluation;
use App\Models\InternSiteEvaluation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\User;
use App\Models\InternApplication;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use function Psy\debug;
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

    public function assignmentSubmit(Request $request)
    {
        if($request->isMethod('POST'))
        {



            $now = Carbon::now('America/New_York')->toDateString();
            $doc_id = $request->doc_id;
            $doc_type = $request->doc_type;

            $request->request->add(['submitted_at' => $now]);




            if($doc_type == 'journal')
            {
                $assignment = InternJournal::find($doc_id);

            }
            elseif ($doc_type == 'reflection')
            {
                $assignment = InternReflection::find($doc_id);

            }
            elseif ($doc_type == 'site_evaluation')
            {
                $assignment = InternSiteEvaluation::find($doc_id);

            }
            else
            {
                $assignment = InternStudentEvaluation::find($doc_id);

            }



            if($assignment->update($request->except('_token')))
            {
                Session::flash('flash_message','Assignment submitted');
            }


        }

        return redirect('/home');
    }


    public function ajaxGetAvailableDocs(Request $request)
    {
        $user = Auth::user();
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

            }

            if($user->isStudent())
            {
                return json_encode([
                    'journal' => $journals,
                    'reflection' => $reflection,
                    'site_evaluation' => $site_evaluation,
                ]);
            }
            elseif ($user->isSupervisor())
            {
                return json_encode([
                    'student_evaluation' =>$student_evaluations,
                ]);
            }
        }
    }

    public function indexInternshipToBeClosed(Request $request)
    {
        $now = Carbon::now('America/New_York')->toDateString();
        $internships = new InternInternship();

        if($request->isMethod('GET'))
        {
            $internships = $internships
                ->join('intern_applications AS a', function ($join) use ($now){
                    $join->on('a.id', 'intern_internships.application_id');
                    $join->whereNull('a.deleted_at');
                    $join->where('a.end_date', '<', '2017-09-31');
                    $join->whereNotNull('a.approved_by');
                    $join->whereNotNull('a.approved_date');
                    $join->where('a.is_approved', 1);
                    $join->where('a.is_submitted', 1);
                })
                ->join('users', function($join){
                    $join->on('users.id', 'a.user_id');
                })
                ->select('*')
                ->whereNull('intern_internships.deleted_at')
                ->where('case_closed', 0)
                ->whereNull('closed_by')
                ->get();


//            dump($internships);
//            exit();

        return view('intern.admin.internship.to_close')
            ->withInternships($internships);


        }

    }
}
