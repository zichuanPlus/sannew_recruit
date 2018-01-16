@extends('layouts.app2')
<style type="text/css">
    .result{
        font-size: 28px;
        font-weight: bold;
        color:black;
    }
</style>
@section('title')
    查询结果
@endsection
@section('header')
    查询结果：
@endsection

@section('content')
    <table class="table table-border table-bg table-bordered">
        <tbody>
        @if($student == null)
            <tr><th class="warning">未查询到该学生考试信息。</th></tr>
        @else
            <tr><th>姓名</th><td>{{$student->name}}</td></tr>
            <tr><th>身份证号</th><td>{{$student->idcard_number}}</td></tr>
            <tr><th>手机号</th><td>{{$student->phone}}</td></tr>
            <tr><th>考试结果</th><td>{{$student->getAdmitStatus($student->admit_status)}}</td></tr>
        @endif
        </tbody>
    </table>
    <div class="row cl text-right">
        <a href="{{url('query')}}" class="btn btn-primary active " role="button" aria-pressed="true">继续查询</a>
    </div>

    @endsection

