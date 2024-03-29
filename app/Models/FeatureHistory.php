<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeatureHistories extends Model
{
    public $timestamps = false;  

    public function module()
    {
        return $this->belongsTo(Module::class);
    }
}
