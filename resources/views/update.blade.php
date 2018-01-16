@extends('layouts.app2')

@section('content')

    @include('validator')

    <div class="panel panel-default">
        <div class="panel-heading">修改学生</div>
        <div class="panel-body">
            @include('_form')
        </div>
    </div>
@stop