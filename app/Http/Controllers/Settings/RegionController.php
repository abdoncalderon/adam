<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Models\Region;
use App\Models\Country;
use Illuminate\Http\Request;

use Exception;

class RegionController extends Controller
{
    public function index()
    {
        $regions = Region::get();
        return response()->json($regions);
    }

    public function store(Request $request )
    {
        $region = Region::create($request ->validated());
        return response()->json($region);
    }

    public function show(Region $region)
    {
        return response()->json($region);
    }
    
    public function update(Region $region, Request $request)
    {
        $region->update($request->validated());
        return response()->json($region);
    }

    public function destroy(Region $region)
    {
        $region->delete();
        return response()->json([
            'message'=>'Deleted',
        ]);
    } 

    public function getCountries(Region $region)
    {
        $countries = Country::where('region_id',$region->id)->get();
        return response()->json($countries);
    }   
    
}
