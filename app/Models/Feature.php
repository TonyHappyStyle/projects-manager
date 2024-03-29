<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    public $timestamps = false;  

    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    public function requirements()
    {
        return $this->belongsToMany(Requirement::class,'feature_requirement', 'feature_id', 'requirement_id');
    }
}
