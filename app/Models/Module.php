<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    public $timestamps = false;  
    public $table = 'modules';
    //功能
    public function features()
    {
        return $this->hasMany(Feature::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

}
