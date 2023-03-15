<?php

namespace App\Http\Controllers;
use App\Models\ProjectUser;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function getProjectUser()
    {
        /* $projectsUser = ProjectUser::where('user_id',auth()->user()->id)->with('project')->get(); */
        $projectsUser = Project::select('projects.*')
                    ->join('project_users','projects.id','=','project_users.project_id')
                    ->where('project_users.user_id',auth()->user()->id)
                    ->get();
        $user = User::where('id',auth()->user()->id)->with('person')->first();

        return response()->json([
            'projectsUser'=>$projectsUser,
            'user'=>$user
        ]);
    }

}
