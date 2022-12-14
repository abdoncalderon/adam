<?php

namespace App\Http\Controllers\Settings;

use App\Models\Role;
use App\Models\Permit;
use App\Models\RolePermit;
use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\StoreRolePermitRequest;
use Illuminate\Http\Request;
use Exception;

class RolePermitController extends Controller
{
    public function index(Role $role)
    {
        try{
            $otherRoles = Role::where('id','!=',$role->id)->get();
            $rolePermits = RolePermit::where('role_id',$role->id)->get();
            return view('settings.rolePermits.index', compact('role'))
            ->with(compact('rolePermits'))
            ->with(compact('otherRoles'));
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
        
    }

    public function create(Role $role)
    {
        $myPermits = $role->permits;
        $permits = Permit::get();
        $availablesPermits = [];
        foreach ($permits as $permit){
            $exist = false;
            foreach($myPermits as $myPermit)
            {
                if($permit->id==$myPermit->permit_id){
                    $exist = true;
                    break;
                }
            }
            if (!$exist){
                array_push($availablesPermits,$permit);
            }
        }
        $permits = RolePermit::where('role_id','!=',$role->id);

        return view('settings.rolePermits.create')
        ->with('role',$role)
        ->with(compact('availablesPermits'));
    }

    public function store(StoreRolePermitRequest $request, Role $role)
    {
        try{
            RolePermit::create($request ->validated());
            return redirect()->route('rolePermits.index',$role);
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }
    
    
    public function destroy(RolePermit $rolePermit)
    {
        try{
            $role = $rolePermit->role;
            $rolePermit->delete();
            return redirect()->route('rolePermits.index',$role);
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

    public function activate(RolePermit $rolePermit, $value){
        try{
            $rolePermit->update([
                'isActive'=>$value,
            ]);
            $role = Role::where('id',$rolePermit->role_id)->first();
            return redirect()->route('rolePermits.index',$role);
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }

    public function clone(Request $request){
        try{
            $roleSourcePermits=RolePermit::where('role_id',$request->role_source_id)->get();
            $role = Role::find($request->role_target_id);
            foreach($roleSourcePermits as $roleSourcePermit){
                $roleTargetPermit = RolePermit::where('role_id',$request->role_target_id)
                                ->where('permit_id',$roleSourcePermit->permit_id)
                                ->first();
                if ($roleTargetPermit != null){
                    $roleTargetPermit->update([
                        'isActive' => $roleSourcePermit->isActive,
                    ]);
                }
            }
            return redirect()->route('rolePermits.index',$role);
        }catch(Exception $e){
            return back()->withErrors( $e->getMessage());
        }
    }


}
