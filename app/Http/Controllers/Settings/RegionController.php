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

    public function store(Request $request)
    {
        $region = Region::create($request->post());
        return response()->json($request);
    }

    public function show(Region $region)
    {
        return response()->json($region);
    }
    
    public function update(Request $request, Region $region)
    {
        $region->fill($request->post())->save();
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
