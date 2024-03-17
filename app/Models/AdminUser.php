<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminUser extends Model
{
    public $timestamps = false;  
    public $table = 'admin_users';

    //和需求的关联
    public function requirements()
    {
        return $this->belongsToMany(Requirement::class,"admin_user_requirement",'admin_user_id','requirement_id');
    }

    public function adminUserRequirements()
    {
        return $this->hasMany(AdminUserRequirement::class,'admin_user_id','id');
    }

}
