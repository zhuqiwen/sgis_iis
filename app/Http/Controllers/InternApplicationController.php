<?php

namespace App\Http\Controllers;

use app\Helpers\HTMLSnippet;
use Illuminate\Http\Request;
use App\User;
use App\Models\InternApplication;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Sabberworm\CSS\Value\String;

class InternApplicationController extends Controller
{

	public function prepareLiability(Request $request)
	{
		$country_warning_data = $this->checkCountryWarning($request->intern_country);


		$application = InternApplication::create($request->except('_token'));

		$student = User::find($request->input('user_id'));
		$student_name = $student->last_name.', '.$student->first_name;



		return view('intern.student.application.liability_release', $request->except('_token'))
			->withName($student_name)
			->withApplicationId($application->id);
	}

	private function checkCountryWarning($country)
	{
		return ['warning' => FALSE, 'date' => '2017-09-09'];
	}

	public function review(Request $request)
	{

		$application = InternApplication::find($request->input('application_id'));

		$application->liability_release_form_signed = $request->input('signature');
		$application->liability_release_signed_date = $request->input('sign_date');

		$application->save();

		return view('intern.student.application.review')->withApplication($application);
	}

	public function submit(Request $request)
	{
		$application = InternApplication::find($request->input('application_id'));
		$application->is_submitted = 1;
		$application->submitted_date = date('Y-m-d H:i:s');
		$application->submitted_by = $request->input('signature');
		$application->save();
		return view('intern.student.application.submitted')->withApplication($application);

	}

	public function indexApplicationToBeApproved()
	{
		$applications = InternApplication::join('users', 'intern_applications.user_id', '=', 'users.id')
			->join('intern_organizations', 'intern_applications.organization_id', '=', 'intern_organizations.id')
			->select(
			'intern_organizations.type AS org_type',
			'intern_organizations.name As org_name',
			'intern_organizations.url As org_url',
			'users.first_name',
			'users.last_name',
			'users.iuid',
			'intern_applications.*')
			->orderBy('intern_applications.submitted_date', 'ASC')
			->orderBy('users.first_name', 'ASC')
			->get();

		return view('intern.admin.application.to_be_approved')->withApplications($applications);
//		return view('test.test')->withApplications($applications);
	}

    public function getValuesOf($field, array $conditions)
    {
	    $values = InternApplication::select($field);

        if (!empty($conditions))
        {
            //TODO
            //need to make this query more generic
            foreach ($conditions as $field => $value)
            {
                $values = $values->where($field, $value);
            }
        }
        return $values->distinct()->get();
	}

    public function getGroupedApplications(Request $request)
    {
        $data = new InternApplication();
        if($request->has('is_submitted'))
        {
            $data = $data->where('is_submitted', $request->is_submitted);
        }

        if($request->has('is_approved'))
        {
            $data = $data->where('is_approved', $request->is_approved);
        }

        if($request->has('deleted_at'))
        {
            $data = $data->where('deleted_at', $request->deleted_at);
        }

        // join User to get names and other information
        $data = $data->join('users', 'intern_applications.user_id', '=', 'users.id');
        $data = $data->join('intern_organizations', 'intern_applications.organization_id', '=', 'intern_organizations.id');
        $data = $data->select(
            'intern_organizations.type AS org_type',
            'intern_organizations.name As org_name',
            'intern_organizations.url As org_url',
            'users.first_name',
            'users.last_name',
            'users.iuid',
            'intern_applications.*'
        );

        if($request->field == 'organization_type')
        {

            return $data->get()->groupBy('org_type');
        }

//	    $data = $data->select('users.first_name', 'users.last_name', 'intern_applications.*');


	    return $data->get()->groupBy($request->field);
	}

	public function ajaxGetGroupedApplicationCards(Request $request)
	{

		$application_groups = new InternApplication();
		if($request->has('is_submitted'))
		{
			$application_groups = $application_groups->where('is_submitted', $request->is_submitted);
		}

		if($request->has('is_approved'))
		{
			$application_groups = $application_groups->where('is_approved', $request->is_approved);
		}

		if($request->has('deleted_at'))
		{
			$application_groups = $application_groups->where('deleted_at', $request->deleted_at);
		}

		// join User to get names and other information
		$application_groups = $application_groups->join('users', 'intern_applications.user_id', '=', 'users.id')
			->join('intern_organizations', 'intern_applications.organization_id', '=', 'intern_organizations.id')
			->select(
			'intern_organizations.type AS org_type',
			'intern_organizations.name As org_name',
			'intern_organizations.url As org_url',
			'users.first_name',
			'users.last_name',
			'users.iuid',
			'intern_applications.*'
		);

		if($request->field == 'organization_type')
		{

			$application_groups = $application_groups->get()->groupBy('org_type');
		}
		else
		{
			$application_groups = $application_groups->get()->groupBy($request->field);
		}

		$tabs = '';
		$contents = '';
		$out_cnt = 0;
		foreach ($application_groups as $tab_name => $applications)
		{
			$tab_name = str_replace(' ', '_', $tab_name);
			if ($out_cnt == 0)
			{
				$tabs .= HTMLSnippet::generateApplicationGroupTab($tab_name, TRUE);
				$contents .=  '<div class="tab-pane fade in active" id="'.$tab_name.'">'
					.'<div class="row">'
					.'<div class="col-md-12">';


			}
			else
			{
				$tabs .= HTMLSnippet::generateApplicationGroupTab($tab_name, FALSE);
				$contents .= '<div class="tab-pane fade" id="'.$tab_name.'">'
								.'<div class="row">'
									.'<div class="col-md-12">';


			}


			foreach ($applications as $key => $application)
			{
				$contents .= HTMLSnippet::generateFloatCardWithModal($application);

			}


			$contents .= '</div></div></div>';

			$out_cnt ++;
		}


		return json_encode(['tabs' => $tabs, 'contents' => $contents]);

	}
}
