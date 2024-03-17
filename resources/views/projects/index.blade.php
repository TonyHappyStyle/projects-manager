{{-- <table border="1">
    @foreach ($projects as $pro)
    <tr>
        <td><a href="{{ url("/project/{$pro->id}") }}">{{ $pro->name }}</a></td>
    </tr>
    @endforeach
</table> --}}

<style>  
    .project {  
        border: 1px solid black;  
        margin-bottom: 10px; /* 项目之间的间距 */  
    }  
    .project-name {  
        background-color: #f2f2f2;  
        padding: 5px;  
    }  
    .modules {  
        display: flex;  
        flex-wrap: wrap; /* 允许模块换行 */  
    }  
    .module {  
        flex: 0 0 20%; /* 每个模块占据20%的宽度，你可以根据需要调整 */  
        max-width: 20%; /* 防止模块宽度超过设定值 */  
        border: 1px solid #ccc;  
        padding: 5px;  
        box-sizing: border-box; /* 包含边框和内边距在宽度内 */  
    }
    .juti {  
        font-size: 80%; /* 每个模块占据20%的宽度，你可以根据需要调整 */  
    }
    .right-button {
        float: right;  
        clear: both; /* 清除浮动，避免影响其他元素 */
    }
    a {  
        text-decoration: none; /* 移除下划线 */  
        background-color: transparent; /* 确保没有背景色造成的高亮效果 */  
        color: inherit; /* 如果需要的话，让链接颜色继承父元素的颜色 */  
        outline: none; /* 移除点击时可能出现的轮廓线 */  
    }  
</style>
<div class="projects">        
    <div class="project">    
        <div class="project-name">    
            <b>任务看板</b>   
        </div>
        <b>BUSY</b>    
        <div class="modules">    
                
                @foreach ($admin_users_busy as $admin_user)    
                <div class="module">    
                   {{-- <a href="/admin_user/{{ $admin_user->id }}" target="__blank"><b> {{ $module->name }}</b></a> --}}
                   <b> {{ $admin_user->name }}</b>
                   <div class="juti">
                   <br/>
                        @if ($admin_user->adminUserRequirements)
                            @foreach ($admin_user->adminUserRequirements as $adminUserRequirement)
                                    @if($adminUserRequirement->status=="未开始" ||$adminUserRequirement->status=="进行中" )

                                    {{ $adminUserRequirement->requirement->module->project->name.'-'.
                                        $adminUserRequirement->requirement->module->name.'-'.
                                        $adminUserRequirement->requirement->type.'-'.
                                        $adminUserRequirement->requirement->name.'-'.$adminUserRequirement->type.
                                        '('.$adminUserRequirement->status.')'
                                        }}<br/>
                                    @endif
                            @endforeach
                        @endif
                    <br>
                    </div>
                </div>
                
                @if ($loop->iteration % 5 == 0 && $loop->iteration != count($admin_users_busy))    
                    <div style="width: 100%;"></div>    
                @endif    
                @endforeach    
  
        </div>
        <b>FREE</b>    
        <div class="modules">    
                
            @foreach ($admin_users_free as $admin_user)    
            <div class="module">    
               {{-- <a href="/admin_user/{{ $admin_user->id }}" target="__blank"><b> {{ $module->name }}</b></a> --}}
               <b> {{ $admin_user->name }}</b>
               <div class="juti">
               <br/>
                    @if ($admin_user->adminUserRequirements)
                        @foreach ($admin_user->adminUserRequirements as $adminUserRequirement)
                                @if($adminUserRequirement->status=="已完成")

                                {{ $adminUserRequirement->requirement->module->project->name.'-'.
                                    $adminUserRequirement->requirement->module->name.'-'.
                                    $adminUserRequirement->requirement->type.'-'.
                                    $adminUserRequirement->requirement->name.'-'.$adminUserRequirement->type.
                                    '('.$adminUserRequirement->status.')'
                                    }}<br/>
                                @endif
                        @endforeach
                    @endif
                <br>
                </div>
            </div>
            
            @if ($loop->iteration % 5 == 0 && $loop->iteration != count($admin_users_free))    
                <div style="width: 100%;"></div>    
            @endif    
            @endforeach    

    </div>
    </div>       
</div>  
<div class="projects">        
    <div class="project">    
        <div class="project-name">    
            <b>需求看板</b>   
        </div>    
        <div class="modules">     
                @foreach ($requirements as $requirement)    
                <div class="module"> 
                   <b> {{ $requirement['name'] }}</b><br/> 
                   <div class="juti">
                    @if (!empty($requirement['data']))
                    @foreach ($requirement['data'] as $data) 
                        {{ $data->module->project->name.'-'.$data->module->name.'-'.$data->name }}<br/>
                        @if($requirement['name'] =='进行中')
                            (
                            @foreach ($data->adminUserRequirements as $k=>$adminUserRequirement) 
                                    @if ($k!=0)
                                        、
                                    @endif
                                    
                                    @if($adminUserRequirement->status=="已完成" || $adminUserRequirement->status=="已归档" )
                                        <span><del>{{ $adminUserRequirement->adminUser->name.'_'.$adminUserRequirement->type }}</del></span>
                                    @else
                                        <span>{{ $adminUserRequirement->type }}</span>
                                    @endif
                            @endforeach
                            )
                        @endif
                    
                    @endforeach
                        
                    @endif
                   </div>
                </div>
                
                @if ($loop->iteration % 5 == 0 && $loop->iteration != count($requirements))    
                    <div style="width: 100%;"></div>    
                @endif    
                @endforeach    
  
        </div>    
    </div>       
</div>  
<div class="projects">    
    @foreach ($projects as $pro)    
    <div class="project">    
        <div class="project-name">    
            {{-- <a href="{{ url("/project/{$pro->id}") }}"><b>{{ $pro->name }}</b></a>     --}}
            <b>{{ $pro->name }}</b>   
        </div>    
        <div class="modules">    
            @if ($pro->modules)    
                @foreach ($pro->modules as $module)    
                <div class="module">    
                   <a href="/module/{{ $module->id }}" target="__blank"><b> {{ $module->name }}</b></a>
                        <p class="right-button">
                        @if ($module->test)  
                            <a href="{{ $module->test }}" target="__blank"><button class="access-button" data-toggle="modal" data-target="#accessModal">测试</button></a>  
                        @endif
                        @if ($module->yanshi)
                            <a href="{{ $module->yanshi }}" target="__blank"><button class="access-button" data-toggle="modal" data-target="#accessModal">演示</button></a>  
                        @endif
                        @if ($module->product)
                            <a href="{{ $module->product }}" target="__blank"><button class="access-button" data-toggle="modal" data-target="#accessModal">生产</button></a>  
                        @endif
                        </p>
                    <br>
                    {{-- <p>紧急需求</p> --}}
                </div>
                
                @if ($loop->iteration % 5 == 0 && $loop->iteration != count($pro->modules))    
                    <div style="width: 100%;"></div>    
                @endif    
                @endforeach    
            @else    
                <div class="module">没有模块</div>    
            @endif    
        </div>    
    </div>    
    @endforeach    
</div>  
