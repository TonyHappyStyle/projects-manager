<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;  
use Illuminate\Support\Facades\Log;  
use App\Models\Camera;
use App\Models\CarRecord;
use App\Models\Project;
use App\Models\Feature;
use App\Models\Module;

class ProjectsController extends Controller
{
    
    public function index(Request $request,Module $module)  
    {  
        $id = $request->id;
        $project = $module->where('project_id',$id)->with("feature")->get();
        return view('modules.index', ['project' => $project]);
    }

    //去除汉字
    public function removeFirstChineseChar($plateNumber) {  
     
    }  

    public function projects()
    {
        // 获取所有的projects数据  
        $projects = Project::all();  
        
        // 使用map方法转换数据结构  
        $formattedProjects = $projects->map(function ($project) {  
            return [  
                'id' => $project->id,  
                'text' => $project->name, // 假设你想要的是name字段  
            ];  
        });  

        
        // 将集合转换为数组  
        $formattedProjectsArray = $formattedProjects->toArray();  
        
        // 输出结果  
        return $formattedProjectsArray;
    }
}
