<?php

namespace App\Http\Controllers;

use App\Models\State;
use Illuminate\Http\Request;

class StateController extends Controller
{
    //

	public function ajaxGetStateByCountryId(Request $request)
	{
		$country_id = $request->country_id;

		$states = State::where('country_id', $country_id)
			->orderBy('region', 'ASC')->get();
		return json_encode($states);


	}
}
