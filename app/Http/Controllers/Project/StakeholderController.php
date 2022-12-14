<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Http\Requests\Project\StoreStakeholderRequest;
use App\Http\Requests\Project\UpdateStakeholderRequest;
use App\Models\Stakeholder;
use App\Models\StakeholderType;
use App\Models\Project;
use App\Models\Region;
use Exception;

class StakeholderController extends Controller
{
    public function index()
    {
        $stakeholders = Stakeholder::where('project_id',session('current_project_id'))->get();
        return view('project.stakeholders.index', compact('stakeholders'));
    }

    public function create()
    {
        $regions = Region::get();
        $stakeholderTypes = StakeholderType::get();
        $project_id = session('current_project_id');
        $project = Project::where('id',$project_id)->first();
        return view('project.stakeholders.create')
        ->with(compact('project'))
        ->with(compact('regions'))
        ->with(compact('stakeholderTypes'));
    }

    public function store(StoreStakeholderRequest $request )
    {
        try{
            
            Stakeholder::create($request ->validated());
            return redirect()->route('stakeholders.index');
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

    public function show(Stakeholder $stakeholder)
    {
        return view('project.stakeholders.show',[
            'stakeholder'=>$stakeholder
            ]);
    }

    public function edit(Stakeholder $stakeholder)
    {
        $regions = Region::get();
        $stakeholderTypes = StakeholderType::get();
        return view('project.stakeholders.edit',[
            'stakeholder'=>$stakeholder
            ])->with(compact('regions'))
            ->with(compact('stakeholderTypes'));
    }
    
    public function update(Stakeholder $stakeholder, UpdateStakeholderRequest $request)
    {
        try{
            $stakeholder->update($request->validated());
            return redirect()->route('stakeholders.index');
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

    public function destroy(Stakeholder $stakeholder)
    {
        try{
            $stakeholder->delete();
            return redirect()->route('stakeholders.index');
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }
}
