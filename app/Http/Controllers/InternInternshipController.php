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
                                                $join->on('intern_applications.user_id', $user_id);
                                                $join->where('intern_applications.is_submitted', 1);
                                                $join->where('intern_applications.is_approved', 1);
                                                $join->where('intern_applications.deleted_at', null);
                                            })
                ->where('intern_internships.deleted_at', null)
                ->where('intern_internships.case_closed', 0)
                ->select('*')
                ->get();

            return $internships;

        }

        if($request->isMethod('POST'))
        {

        }
        
    }
}
