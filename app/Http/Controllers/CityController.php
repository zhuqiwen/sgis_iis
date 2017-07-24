<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    //
	public function ajaxGetCityByStateId(Request $request)
	{
		$state_id = $request->state_id;

		$cities = City::where('region_id', $state_id)
			->orderBy('city', 'ASC')->get();
		return json_encode($cities);
	}
}
