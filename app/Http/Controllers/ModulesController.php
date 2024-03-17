<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;  
use Illuminate\Support\Facades\Log;  
use App\Models\Camera;
use App\Models\CarRecord;
use App\Models\Project;
use App\Models\Feature;
use App\Models\Module;

class ModulesController extends Controller
{
    
    public function index(Request $request,Module $module)  
    {  
        $module_id = $request->id;
        $data = $module->where('id',$module_id)
                        ->with("features",
                                "project",
                                // "features.requirements",
                                // "features.requirements.requirement_histories",
                                // "features.requirements.requirements.admin_users",
                                // "features.requirements.prototypes",
                                // "features.requirements.prototypes.prototype_histories"
                                )
                        ->first();
        return view('modules.index', ['data' => $data]);
    }

    //去除汉字
    public function removeFirstChineseChar($plateNumber) {  
     
    }  

    public function modules(Request $request)
    { 
        $project_id = $request->get('q');
        return Module::where('project_id', $project_id)->get(['id', \DB::raw('name as text')]);
    }
}
