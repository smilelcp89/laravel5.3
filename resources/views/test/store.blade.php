<h1>添加用户</h1>
<form method="POST" action="/test">
    {{ csrf_field() }}
    <p>用户名：<input type="text" name="user[username]"/>  
    <span>@if (isset($errors->toArray()['user.username'])) {{ $errors->toArray()['user.username'][0] }} @endif</span>
    或者
    <span>@if (isset($errors->get('user.username')[0])) {{ $errors->get('user.username')[0] }} @endif</span>
    </p>
    <p>密　码：<input type="password" name="user[password]"/>  <span>@if (isset($errors->toArray()['user.password'])) {{ $errors->toArray()['user.password'][0] }} @endif</span></p>
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
