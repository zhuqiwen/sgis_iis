<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    //
	public function ajaxGetCityByStateId(Request $request)
	{

		$cities = City::where('region_id', $request->region_id)
			->orderBy('city', 'ASC')->get();
		return json_encode($cities);
	}
}
