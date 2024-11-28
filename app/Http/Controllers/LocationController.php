<?php

namespace App\Http\Controllers;
use App\models\Country;
use App\Models\State;
use App\Models\City;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index()
    {
        $countries = Country::all();
        return view('admins.locations', compact('countries'));
    }
    function getStates($country_id)
    {
        
        $states = State::where('country_id', $country_id)->get();
        
        return response()->json($states);
    }

    public function getCities($state_id)
    {
        
        $cities = City::where('state_id', $state_id)->get();
        
        return response()->json($cities);
    }

}
