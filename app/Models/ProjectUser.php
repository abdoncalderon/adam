<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ProjectUser extends Model
{
    protected $fillable = ['user_id','project_id','project_role_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function projectRole()
    {
        return $this->belongsTo(ProjectRole::class);
    }

    public function locationProjectUsers()
    {
        return $this->hasMany(LocationProjectUser::class);
    }

    public function needRequests()
    {
        return $this->hasMany(NeedRequest::class);
    }
}
