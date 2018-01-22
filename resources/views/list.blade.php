@extends('layouts.app2')
@section('title')
    学生列表
@endsection
@section('header')
    学生列表
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
        <table class="table table-striped table-hover table-responsive">
            <thead>
            <tr>
                <th>ID</th>
                <th>姓名</th>
                <th>考试/面试时间</th>
                <th>身份证号</th>
                <th>手机号</th>
                <th>考试状态</th>
                <th width="120">操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($students as $student)
                <tr>
                    <th scope="row">{{ $student->id }}</th>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->exam_time }}</td>
                    <td>{{ $student->idcard_number }}</td>
                    <td>{{ $student->phone }}</td>
                    <td>{{ $student->getAdmitStatus($student->admit_status) }}</td>
                    <td>
                        <a href="{{ url('update', ['id' => $student->id]) }}">修改</a>
                        <a href="{{ url('delete', ['id' => $student->id]) }}"
                           onclick="if (confirm('确定要删除吗？') == false) return false;">删除</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection