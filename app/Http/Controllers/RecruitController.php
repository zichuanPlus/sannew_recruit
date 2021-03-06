<?php
namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class RecruitController extends Controller{
    /**
     * 添加学生数据
     */
    public function add(Request $request){
        if($request->isMethod('POST')){

            //记录上次输入
            $request->flash();
            $validator = $this->inputValidate($request);
            if($validator->fails()){
                return redirect()->back()->withErrors($validator);
            }
            $data = $request->input('Student');
            $studentCard = Student::where('idcard_number',$data['idcard_number'])->first();
            if($studentCard != null){
                return redirect()->back()->with('error','添加失败！输入的身份证号已存在！');
            }
            $studentPhone = Student::where('phone',$data['phone'])->first();
            if($studentPhone != null){
                return redirect()->back()->with('error','添加失败！输入的手机号已存在');
            }

            $data['exam_time'] = strtotime($data['exam_time']);
            Student::create($data);
            return redirect('lists')->with('success','添加成功');
        }

        $student = new Student();
        return view('input',[
            'student'=>$student
        ]);
    }

    /**
     * 查找结果  -1：不存在   1：通过  0：未通过
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function queryResult(){
        $idcard = Input::get('idcardOrPhone');
        $studentCard = Student::where('idcard_number',$idcard)->first();
        $studentPhone = Student::where('phone',$idcard)->first();
        $student = $studentCard;
        if($student == null){
            $student = $studentPhone;
        }

        if($student != null){
            $student->exam_time = date('Y-m-d',$student->exam_time);
        }
        return view('result',[
            'student'=>$student
        ]);

    }

    public function allStudents(){
        $students = Student::all();
        foreach ($students as $student){
            $student->exam_time = date('Y-m-d', $student->exam_time);
        }
        return view('list',[
            'students'=>$students
        ]);
    }

    public function update(Request $request, $id){
        $student = Student::find($id);
        $idcard_old = $student['idcard_number'];
        $phone_old = $student['phone'];

        if($request->isMethod('POST')){
            $validator = $this->inputValidate($request);
            if($validator->fails()){
                $request->flash();
                return redirect()->back()->withErrors($validator);
            }

            $data = $request->input('Student');
            $student['name']=$data['name'];
            $student['idcard_number']=$data['idcard_number'];
            $student['phone']=$data['phone'];
            $student['exam_time']=strtotime($data['exam_time']);
            $student['admit_status']=$data['admit_status'];

            //判定是否存在重复手机号和身份证号
            if($idcard_old != $student['idcard_number']){
                $studentCard = Student::where('idcard_number',$student['idcard_number'])->first();
                if($studentCard != null){
                    $request->flash();
                    return redirect()->back()->with('error','修改失败！输入的身份证号已存在！');
                }
            }
            if($phone_old != $student['phone']){
                $studentPhone = Student::where('phone',$student['phone'])->first();
                if($studentPhone != null){
                    $request->flash();
                    return redirect()->back()->with('error','修改失败！输入的手机号已存在');
                }
            }

            if($student->save()){
                return redirect('lists')->with('success','修改成功-'.$id);
            }
        }
        $student->exam_time = date('Y-m-d', $student->exam_time);
        return view('update',[
            'student'=>$student
        ]);
    }

    private function inputValidate($request){
        $validator = \Validator::make($request->input(),[
            'Student.name'=>'required|min:4|max:20',
            'Student.idcard_number'=>'required',
            'Student.phone'=>'required|regex:/^1[34578][0-9]{9}$/',
            'Student.exam_time'=>'required'
        ],[
            'required'=>':attribute 为必填项',
            'min'=>':attribute 长度不符合要求',
            'max'=>':attribute 长度不符合要求',
            'integer'=>':attribute 必须为数字',
            'regex'=>':attribute 不合法',
        ],[
            'Student.name'=>'姓名',
            'Student.idcard_number'=>'身份证号',
            'Student.phone'=>'手机号',
            'Student.exam_time'=>'考试/面试时间'
        ]);
        return $validator;
    }


    public function delete($id){
        $student = Student::find($id);

        if($student->delete()){
            return redirect('lists')->with('success','删除成功-'.$id);
        }else{
            return redirect('lists')->with('error','删除失败-'.$id);
        }
    }
}