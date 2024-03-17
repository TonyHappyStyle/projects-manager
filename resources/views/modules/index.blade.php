{{-- <table border="1">
    @foreach ($projects as $pro)
    <tr>
        <td><a href="{{ url("/project/{$pro->id}") }}">{{ $pro->name }}</a></td>
    </tr>
    @endforeach
</table> --}}
<header>
    <title>{{ $data->project->name.'-'.$data->name }}</title>
</header>
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
    .right-button {
        float: right;  
    clear: both; /* 清除浮动，避免影响其他元素 */
    }
</style>  
<div class="projects">
    @if ($data->features)     
    @foreach ($data->features as $feature)    
    <div class="project">    
        <div class="project-name">    
            {{-- <a href="{{ url("/project/{$pro->id}") }}"><b>{{ $pro->name }}</b></a>     --}}
            <b>{{ $feature->name }}</b>   
        </div>    
        <div class="modules">    
           
        </div>    
    </div>    
    @endforeach
    @endif   
</div>  
