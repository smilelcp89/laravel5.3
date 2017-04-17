<h1>上传文件</h1>
<form method="POST" action="/test/upload" enctype="multipart/form-data">
    {{ csrf_field() }}
    上传文件：<input type="file" name="image"/>
    <input type="submit" value="提交"/>
</form>