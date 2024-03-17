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
        $project = $module->where('project_id',$id)->orderBy('order','desc')->with("feature")->get();
        return view('modules.index', ['project' => $project]);
    }

    //去除汉字
    public function removeFirstChineseChar($plateNumber) {  
     
    }  

    public function projects()
    {
        return Project::get(['id', \DB::raw('name as text')]);
    }
}
