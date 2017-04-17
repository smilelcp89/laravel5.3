@lang('message.welcome'),@lang('message.author')

=============================
{{ trans('message.welcome') }}

<br/>

<!-- 继承父页面 -->
@extends('layouts.master')

@section('title', '页面标题')

@section('sidebar')
    @parent <!--这里是主页的sidebar内容-->
    <p>附加到主页面 master sidebar.</p>  <!--父页面的section('sidebar')后面的show，section和show必须成对出现-->
@endsection

@section('content')
    <p>====子页面的内容</p>
@endsection



hello, @{{ name }}
<br/>

@verbatim
    <div class="container">
        Hello, {{ name }}.
    </div>
@endverbatim
<br/>

@push('scripts')
<script src="/example.js"></script>
@endpush

<link href="{{ asset('public/css/common.css') }}" rel="stylesheet" type="text/css">
================================================
<link href="{{ URL::asset('public/css/common.css') }}" rel="stylesheet" type="text/css">
