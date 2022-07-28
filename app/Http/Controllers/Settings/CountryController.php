<?php

namespace App\Http\Controllers\Settings;

use App\Models\Country;
use App\Models\State;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index()
    {
        $countries = Country::get();
        return response()->json($countries);
    }

    public function store(Request $request )
    {
        $country = Country::create($request->validated());
        return response()->json($country);
    }

    public function show(Country $country)
    {
        return response()->json($country);
    }
    
    public function update(Country $country, Request $request)
    {
        $country->update($request->validated());
        return response()->json($country);
    }

    public function destroy(Country $country)
    {
        $country->delete();
        return response()->json([
            'message'=>'Deleted',
        ]);
    }    

    public function getStates(Country $country)
    {
        $states = State::where('country_id',$country->id)->get();
        return response()->json($states);
    }      
    
   
}
