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
            $validator = $this->inputValidate($request);
            if($validator->fails()){
                return redirect()->back()->withErrors($validator);
            }

            $data = $request->input('Student');
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
        return view('result',[
            'student'=>$student
        ]);

    }

    public function allStudents(){
        $students = Student::all();
        return view('list',[
            'students'=>$students
        ]);
    }

    public function update(Request $request, $id){
        $student = Student::find($id);

        if($request->isMethod('POST')){
            $validator = $this->inputValidate($request);
            if($validator->fails()){
                return redirect()->back()->withErrors($validator);
            }

            $data = $request->input('Student');
            $student['name']=$data['name'];
            $student['idcard_number']=$data['idcard_number'];
            $student['phone']=$data['phone'];
            $student['admit_status']=$data['admit_status'];

            if($student->save()){
                return redirect('lists')->with('success','修改成功-'.$id);
            }
        }
        return view('update',[
            'student'=>$student
        ]);
    }

    private function inputValidate($request){
        $validator = \Validator::make($request->input(),[
            'Student.name'=>'required|min:4|max:20',
            'Student.idcard_number'=>'required',
            'Student.phone'=>'required|regex:/^1[34578][0-9]{9}$/'
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