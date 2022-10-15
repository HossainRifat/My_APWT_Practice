<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    function StudentList(){
        $students = Student::all(); 
        return view('student.studentList')->with('students', $students);
    }

    function StudentEdit(Request $request){
        $student = Student::where('id',$request->id)->first(); 
        return view('student.studentEdit')->with('student', $student);
        
    }

    function StudentEditSubmit(Request $request){
        $student = Student::where('id',$request->id)->first();
        $student->name = $request->First_Name;
        $student->email = $request->email;
        $student->address = $request->address;
        $student->gender = $request->gender;
        $student->age = $request->age;
        $student->save();

        return redirect()->route('/studentlist');
    }

    function StudentDelete(Request $request){
        $student = Student::where('id',$request->id)->first();
        $student->delete();
        return redirect()->route('/studentlist');
    }
}
