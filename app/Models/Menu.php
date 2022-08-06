<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = ['name','father', 'showName', 'route', 'icon', 'isActive',];

    public function menu(){
        return $this->belongsTo(Menu::class,'father','name');
    }

    public function roleMenus()
    {
        return $this->hasMany(RoleMenu::class);
    }

    public function menus()
    {
        return $this->hasMany(Menu::class,'father','name')->with('menus');
    }

    public function isActive(){
        if($this->isActive==1){
            return true;
        }else{
            return false;
        }
    }
}
