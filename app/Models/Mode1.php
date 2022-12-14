<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mode1 extends Model
{
    protected $fillable = ['brand_id','name',];

    public function brand(){
        return $this->belongsTo(Brand::class);
    }
}
