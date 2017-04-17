<h1>添加分组@if (isset($rootPath)) {{ $rootPath }} @endif</h1> {{ $baseName }}

<form method="POST" action="/group/save">
    {{ csrf_field() }}
    <p>分组名称：<input type="text" name="group[name]"/>  
    <span style="color:red;">@if (isset($errors->toArray()['group.name'])) {{ $errors->toArray()['group.name'][0] }} @endif</span>
    或者
    <span style="color:red;">@if (isset($errors->get('group.name')[0])) {{ $errors->get('group.name')[0] }} @endif</span>
    </p>
    <p>分组标识：<input type="text" name="group[flag]"/>  <span>@if (isset($errors->toArray()['group.flag'])) {{ $errors->toArray()['group.flag'][0] }} @endif</span></p>
    <p><input type="submit" value="提交"/></p>
</form>

@if (count($errors) > 0)
<div class="alert alert-danger">
    <ul>
    	{{ print_r($errors->toArray()) }}
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@include('include.footer')
