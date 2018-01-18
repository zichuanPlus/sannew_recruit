@extends('layouts.app2')
@section('title')
    数据输入
    @endsection
@section('header')
    数据输入
@endsection
@section('leftmenu')
    <div class="list-group">
        <a href="{{ url('lists') }}" class="list-group-item
                    {{ Request::getPathInfo() != '/input' ? 'active' : '' }}
                ">学生列表</a>
        <a href="{{ url('input') }}" class="list-group-item
                    {{ Request::getPathInfo() == '/input' ? 'active' : '' }}
                ">新增学生</a>
    </div>
    @endsection
@section('content')
    @include('message')
    <div class="panel panel-default">
        <div class="panel-body">
            @include('_form')
        </div>
    </div>
    @endsection
