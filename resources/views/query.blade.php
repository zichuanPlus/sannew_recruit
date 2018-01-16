@extends('layouts.app2')
@section('title')
    结果查询
    @endsection
@section('header')
    自主招生考试结果查询
@endsection

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            <form action="{{url('queryResult')}}" method="post" class="form form-horizontal responsive" id="demoform">
                <?php echo csrf_field(); ?>
                <div class="row cl">
                    <label class="control-label col-xs-6">请输入要查询的身份证号码或手机号：</label>
                    <div class="col-xs-4">
                        <input type="text" class="form-control" placeholder="" name="idcardOrPhone" id="idcardOrPhone" autocomplete="off">
                    </div>
                </div>
                    <div class="row cl" style="height: 20px"></div>
                <div class="row cl">
                    <div class="text-right col-xs-10" >
                        <input class="btn btn-primary" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
                    </div>
                </div>
            </form>
        </div>
    </div>
    @endsection