<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public $timestamps = false;  

    public function modules()
    {
        return $this->hasMany(Module::class);
    }

}
