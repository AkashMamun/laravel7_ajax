<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(){
        $students = Student::orderBy('id','DESC')->get();
        return view('student',compact('students'));
    }
    public function addStudent(Request $request){
        $student = new Student();
        $student->firstname = $request->firstname;
        $student->lastname = $request->lastname;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->save();
        // return $student;

        return response()->json($student);
    }
}
