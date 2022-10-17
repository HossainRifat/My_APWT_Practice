<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\All_user;
use App\Models\Login;
use App\Models\User;
use App\Models\Uuser;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function Edit(Request $request)
    {
        $user = Uuser::where('id',$request->id)->first();
            if($user){
                return view("admin.edit")->with("user",$user);
            }
            else{
                return redirect()->route("Userlist");
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
        
        $user = Uuser::where('id', $request->id)->first();
        if($user){

            $user2 = All_user::where('email', $user->email)->first();
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

            return redirect()->route("Userlist");
        }
        else{

            return $user->id;
        }
    }

    function Userlist()
    {
        $users = Uuser::all(); 
        return view('Admin.user')->with('users', $users);
    }

    function RegSubmit(Request $request)
    {
        $this->validate(
            $request,
            [
                "First_Name" => "required | min:5",
                "email" => "email",
                "password" => "required | min:5"
            ]
        );

        $u1 = new All_user();
        $u1->email = $request->email;
        $u1->password = $request->password;
        $u1->entity = "admin";
        $u1->save();

        $admin = new admin();
        $admin->name = $request->First_Name;
        $admin->email = $request->email;
        $admin->password = $request->password;
        $admin->save();

        return redirect()->route('Login');
    }

    function Delete(Request $request){

        $l1 = Uuser::where('id', $request->id)->first();

        $l2 = All_user::where('email', $l1->email)->first();
        $l2->delete();

        $l1->delete();
        return redirect()->route("Userlist");
    }

    function Logout(){
        $l1 = Login::where('token',session()->get("token"))->first();
        $l1->logout_time = now()->toDateTimeString();
        $l1->save();

        session()->forget(['entity', 'email', 'token']);
        return redirect()->route("Login");
    }
}
