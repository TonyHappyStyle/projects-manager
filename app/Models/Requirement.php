<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Requirement extends Model
{
    public function features()
    {
        return $this->belongsToMany(Feature::class,'feature_requirement', 'requirement_id', 'feature_id');
    }

    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    public function adminUserRequirements()
    {
        return $this->hasMany(AdminUserRequirement::class,'requirement_id','id');
    }

    public function adminUser()
    {
        return $this->belongsToMany(AdminUser::class,'admin_user_requirement','requirement_id','admin_user_id');
    }
}
