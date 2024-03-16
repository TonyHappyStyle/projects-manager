<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;  
use Illuminate\Support\Facades\Log;  
use App\Models\Camera;
use App\Models\CarRecord;
use App\Models\Project;

class HomeController extends Controller
{
    
    public function index()  
    {  
        // $data = Project::with('modules','modules.features','modules.feature.requirements')->get();
        $data = Project::with('modules')->get();
        return view('projects.index', ['projects' => $data]);
    }

    //去除汉字
    public function removeFirstChineseChar($plateNumber) {  
     
    }  
}
