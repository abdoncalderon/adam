<?php

namespace App\Http\Controllers\Settings;

use App\Models\State;
use App\Models\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Exception;

class StateController extends Controller
{
    public function index()
    {
        $states = State::with('country')->get();
        return response()->json($states);
    }

    public function store(Request $request )
    {
        $state = State::create($request->post());
        return response()->json($state);
    }

    public function show(State $state)
    {
        return response()->json($state);
    }
    
    public function update(Request $request, State $state)
    {
        $state->fill($request->post())->save();
        return response()->json($state);
    }

    public function destroy(State $state)
    {
        $state->delete();
        return response()->json([
            'message'=>'Deleted',
        ]);
    }

    public function getCities(State $state)
    {
        $cities = City::where('state_id',$state->id)->get();
        return response()->json($cities);
    } 

}
