@extends('layouts.app2')

@section('content')

    @include('validator')
    @include('message')

    <div class="panel panel-default">
        <div class="panel-heading">修改学生</div>
        <div class="panel-body">
            @include('_form')
        </div>
    </div>
    <div class="row cl text-right">
        <a href="{{url('lists')}}" class="btn btn-primary active " role="button" aria-pressed="true">返回列表</a>
    </div>
@stop