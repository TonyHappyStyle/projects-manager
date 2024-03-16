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
</style>  
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
                   <b> {{ $module->name }}</b>
                        @if ($module->test)  
                            <a href="{{ $module->test }}" target="__blank"><button class="access-button" data-toggle="modal" data-target="#accessModal">测试</button></a>  
                        @endif
                        @if ($module->yanshi)
                            <a href="{{ $module->yanshi }}" target="__blank"><button class="access-button" data-toggle="modal" data-target="#accessModal">演示</button></a>  
                        @endif
                        @if ($module->product)
                            <a href="{{ $module->product }}" target="__blank"><button class="access-button" data-toggle="modal" data-target="#accessModal">生产</button></a>  
                        @endif
                    <br>
                    {{-- @if ($modules->modules)    
                        
                    <table>
                        @foreach ($module->tasks as $ta) 
                            <tr>
                                <td>12</td>
                            </tr>
                        @endforeach 
                    </table>
                          
                    @endif  --}}
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
