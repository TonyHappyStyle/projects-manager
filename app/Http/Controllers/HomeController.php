<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;  
use Illuminate\Support\Facades\Log;  
use App\Models\Camera;
use App\Models\CarRecord;
use App\Models\Project;
use App\Models\AdminUser;
use App\Models\Requirement;
use App\Models\AdminUserRequirement;
use Illuminate\Support\Facades\DB; 
class HomeController extends Controller
{
    
    public function index()  
    {  
        $admin_users_busy = AdminUser::whereHas('adminUserRequirements', function ($query) {  
            $query->whereIn('status', ['进行中', '未开始']);    
        })->with('adminUserRequirements', 'adminUserRequirements.requirement', 'adminUserRequirements.requirement.module', 'adminUserRequirements.requirement.module.project')->get();
    
        $admin_users_free = AdminUser::whereDoesntHave('adminUserRequirements', function ($query) {  
        $query->whereIn('status', ['进行中', '未开始']);  
    })  
    ->with([ // 加载关系  
        'adminUserRequirements',  
        'requirements',  
        'requirements.module',  
        'requirements.module.project'  
    ])  
    ->get();
 
  
    $requirementsWithStatus0 = Requirement::where('status',NULL)->whereDoesntHave('adminUserRequirements', function ($query) {  
        $query->whereIn('status', ['进行中', '已完成','已归档']); 
    })->with('adminUserRequirements','adminUserRequirements.admin_user','module', 'module.project')->get();
   
        $requirementsWithStatus1 = Requirement::where('status',NULL)->whereHas('adminUserRequirements', function ($query) {  
            $query->where('status', "进行中");   
        })->with('adminUserRequirements')->get();  
        
       
        $requirementsWithStatus2 = Requirement::where('status',NULL)->whereDoesntHave('adminUserRequirements', function ($query) {  
            $query->whereIn('status', ['待开始', '进行中']); 
        })->with('adminUserRequirements','adminUser','module', 'module.project')->get();
        $requirements = [
            [
                'name'=>'未开始',
                'data'=>$requirementsWithStatus0
            ],
            [
                'name'=>'进行中',
                'data'=>$requirementsWithStatus1
            ],
            [
                'name'=>'已完成',
                'data'=>$requirementsWithStatus2
            ],
        ];

        $data = Project::with('modules')->orderBy('order','desc')->get();

        return view('projects.index', ['projects' => $data,'admin_users_busy'=>$admin_users_busy,'admin_users_free'=>$admin_users_free,'requirements'=>$requirements]);
    }
}
