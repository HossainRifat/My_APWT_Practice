<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class User{
    var $name;
    var $age;
    var $gender;
    var $email;
    var $address;

    function __construct($name, $age, $gender, $email, $address)
    {
        $this->name=$name;
        $this->age=$age;
        $this->gender=$gender;
        $this->email=$email;
        $this->address=$address;
    }
}

class pagesController extends Controller
{
    

    function Login(){
        return view("student.login");
    }

    function Registration(){
        return view("student.registration");
    }

    function LoginSubmit(Request $request){
        $student = Student::where('email',$request->email)->first(); 
        if(!empty($student)){
            if($request->pass == $student->password){
                $r = "Login Successful";
            }
            else{
                $r = "Incorrect Password";
            }
        }
        else{
            $r = "Incorrect Email";
        }
        return view('student.login')->with("output",$r);
    }

    function RegSubmit(Request $request){
        $this->validate($request,[
            "First_Name"=>"required | min:5",
            "age"=>"required",
            "gender"=>"required",
            "email"=>"email",
            "address"=>"required | min:3",
            "password"=>"required | min:5"
        ]
    );

    //$u1 = new User($request->First_Name,$request->age,$request->gender,$request->email,$request->address);
    // $u1->name = $request->First_Name;
    // $u1->age = $request->age;
    // $u1->gender = $request->gender;
    // $u1->email = $request->email;
    // $u1->address = $request->address
    //return view('/regshow')->with('user',$u1);
    
    $student = new Student();
    $student->name = $request->First_Name;
    $student->email = $request->email;
    $student->address = $request->address;
    $student->gender = $request->gender;
    $student->age = $request->age;
    $student->password = $request->password;
    $student->save();
    
    return redirect()->route('/studentlist');
    }

    function Contact(){
        return view("contact");
    }
}
