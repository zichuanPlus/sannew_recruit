<form class="form-horizontal" method="post" action="">

    {{ csrf_field() }}

    <div class="form-group">
        <label for="name" class="col-sm-2 control-label">姓名：</label>
        <div class="col-sm-5">
            <input type="text" name="Student[name]"
                   value="{{ old('Student')['name'] ? old('Student')['name'] : $student->name }}"
                   class="form-control" id="name" placeholder="请输入学生姓名">
        </div>
        <div class="col-sm-5">
            <p class="form-control-static text-danger">{{ $errors->first('Student.name') }}</p>
        </div>
    </div>
    <div class="form-group">
        <label for="idcard_number" class="col-sm-2 control-label">身份证号：</label>

        <div class="col-sm-5">
            <input type="text" name="Student[idcard_number]"
                   value="{{ old('Student')['idcard_number'] ?  old('Student')['idcard_number'] : $student->idcard_number }}"
                   class="form-control" id="idcard_number" placeholder="请输入学生身份证号">
        </div>
        <div class="col-sm-5">
            <p class="form-control-static text-danger">{{ $errors->first('Student.idcard_number') }}</p>
        </div>
    </div>
    <div class="form-group">
        <label for="phone" class="col-sm-2 control-label">手机号：</label>

        <div class="col-sm-5">
            <input type="text" name="Student[phone]"
                   value="{{ old('Student')['phone'] ?  old('Student')['phone'] : $student->phone }}"
                   class="form-control" id="phone" placeholder="请输入手机号">
        </div>
        <div class="col-sm-5">
            <p class="form-control-static text-danger">{{ $errors->first('Student.phone') }}</p>
        </div>
    </div>
    <div class="form-group">
        <label for="exam_time" class="col-sm-2 control-label">考试/面试时间：</label>

        <div class="col-sm-5">
            <input type="text" name="Student[exam_time]"
                   value="{{ old('Student')['exam_time'] ?  old('Student')['exam_time'] : $student->exam_time }}"
                   class="form-control" id="exam_time" placeholder="yyyy-MM-dd"
                   onFocus="WdatePicker({startDate:'%y-%M-01',dateFmt:'yyyy-MM-dd',alwaysUseStartDate:true})">
        </div>
        <div class="col-sm-5">
            <p class="form-control-static text-danger">{{ $errors->first('Student.exam_time') }}</p>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">考试状态：</label>

        <div class="col-sm-5">
            @foreach($student->getAdmitStatus() as $ind=>$val)
                <label class="radio-inline">
                    <input type="radio" name="Student[admit_status]"
                           @if(isset($student->admit_status))
                           {{$student->admit_status == $ind ? 'checked' : ''  }}
                           @else
                           checked="checked"
                           @endif
                           value="{{ $ind }}"> {{ $val }}
                </label>
            @endforeach
        </div>
        <div class="col-sm-5">
            <p class="form-control-static text-danger">{{ $errors->first('Student.admit_status') }}</p>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-7 text-right">
            <button type="submit" class="btn btn-primary">提交</button>
        </div>
    </div>
</form>