<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;

use Exception;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::get();
        return response()->json($cities);
    }

    public function store(Request $request )
    {
       
        $city = City::create($request ->post());
        return response()->json($city);
    }

    public function show(City $city)
    {
        return response()->json($city);
    }
    
    public function update(City $city, Request $request)
    {
        $city->fill($request->post())->save();
        return response()->json($city);
            
    }
    
    public function destroy(City $city)
    {
        $city->delete();
        return response()->json([
            'message'=>'Deleted',
        ]);
    }   
    
}
