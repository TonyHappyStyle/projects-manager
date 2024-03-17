<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminUserRequirement extends Model
{
    public $table = "admin_user_requirement";

    public function requirement()
    {
        return $this->belongsTo(Requirement::class);
    }

    public function adminUser()
    {
        return $this->belongsTo(AdminUser::class);
    }

}
