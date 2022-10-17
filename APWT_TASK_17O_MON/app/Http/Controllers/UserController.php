<?php

namespace App\Http\Controllers;

use App\Models\All_user;
use App\Models\Login;
use App\Models\Uuser;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function Dash()
    {
        return view("user.dash");
    }


    function Profile()
    {
        return view("User.profile");
    }

    function RegSubmit(Request $request)
    {
        $this->validate(
            $request,
            [
                "First_Name" => "required | min:5",
                "age" => "required",
                "gender" => "required",
                "email" => "email",
                "address" => "required | min:3",
                "password" => "required | min:5"
            ]
        );

        $u1 = new All_user();
        $u1->email = $request->email;
        $u1->password = $request->password;
        $u1->entity = "user";
        $u1->save();

        $student = new Uuser();
        $student->name = $request->First_Name;
        $student->email = $request->email;
        $student->address = $request->address;
        $student->gender = $request->gender;
        $student->dob = $request->age;
        $student->password = $request->password;
        $student->save();

        return redirect()->route('Login');
    }

    function Edit(){

        if(session()->get("entity") == "user"){

            $user = Uuser::where('email',session()->get("email"))->first();
            if($user){
                return view("User.edit")->with("user",$user);
            }
            else{
                session()->forget(["entity","email","token"]);
                return redirect()->route("Login");
            }
            
        }
    }

    function EditSubmit(Request $request){

        $this->validate(
            $request,
            [
                "First_Name" => "required | min:5",
                "age" => "required",
                "gender" => "required",
                "email" => "email",
                "address" => "required | min:3",
                "password" => "required | min:5"
            ]
        );
        
        $user = Uuser::where('email',session()->get("email"))->first();
        if($user){

            $user2 = All_user::where('email',session()->get("email"))->first();
            $user2->email = $request->email;
            $user2->password = $request->password;
            $user2->save();

            $user->name = $request->First_Name;
            $user->email = $request->email;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->dob = $request->age;
            $user->password = $request->password;
            $user->save();

            session()->put("entity","user");
            session()->put("email",$request->email);


            return redirect()->route("Dashboard");
        }
        else{
            session()->forget(["entity","email","token"]);
            return redirect()->route("Login");
        }
    }

    function Dashboard(){
        
        if(session()->get("entity") == "user"){

            $user = Uuser::where('email',session()->get("email"))->first();
            if($user){
                return view("User.dash")->with("user",$user);
            }
            else{
                session()->forget(["entity","email","token"]);
                return redirect()->route("Login");
            }
            
        }
        
    }

    function DashboardSubmit(){

        // $this->validate(
        //     $request,
        //     [
        //         "First_Name" => "required | min:5",
        //         "age" => "required",
        //         "gender" => "required",
        //         "email" => "email",
        //         "address" => "required | min:3",
        //         "password" => "required | min:5"
        //     ]
        // );
        
        // $user = Uuser::where('email',session()->get("email"))->first();
        // if($user){

        //     $user2 = All_user::where('email',session()->get("email"))->first();
        //     $user2->email = $request->email;
        //     $user2->password = $request->password;
        //     $user2->save();

        //     $user->name = $request->First_Name;
        //     $user->email = $request->email;
        //     $user->address = $request->address;
        //     $user->gender = $request->gender;
        //     $user->dob = $request->age;
        //     $user->password = $request->password;
        //     $user->save();

        //     session()->put("entity","user");
        //     session()->put("email",$request->email);


        //     return redirect()->route("Dashboard");
        // }
        // else{
        //     session()->forget(["entity","email","token"]);
        //     return redirect()->route("Login");
        // }
        return redirect()->route("Edit");
    }

    function Logout(){
        $l1 = Login::where('token',session()->get("token"))->first();
        $l1->logout_time = now()->toDateTimeString();
        $l1->save();

        session()->forget(['entity', 'email', 'token']);
        return redirect()->route("Login");
    }
}
