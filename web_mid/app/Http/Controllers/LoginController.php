<?php

namespace App\Http\Controllers;

use App\Models\all_user;
use App\Models\buyer;
use App\Models\login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    function get_client_ip()
    {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if (isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if (isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if (isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if (isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }

    public function Login(Request $request)
    {
        if (Cookie::has('token')) {
            $value = Cookie::get('token');
            $instance = login::where('token', $value)->where('logout_time', "NULL")->first();
            if (!empty($instance)) {

                $r = "Already logged in. " . $instance->user->email;
                session()->put("entity", $instance->user->entity);
                session()->put("email", $instance->user->email);
                session()->put("token", $value);

                return redirect()->route("BuyerDashboard");
            } else {
                $r = "Not logged in.";
            }
        } else {
            $r = "Not logged in.";
        }

        // $user = all_user::where('email', "rh140035@gmail.com")->first();
        // dd($user->logged_session);
        //dd($request->getClientIp());

        //$ip = trim(shell_exec("dig +short myip.opendns.com @resolver1.opendns.com"));
        //dd(exec('getmac'));

        return view('login')->with("output", $r);
    }

    public function LoginSubmit(Request $request)
    {
        $user = all_user::where('email', $request->email)->first();
        if (!empty($user)) {

            if (Hash::check($request->password, $user->password)) {
                //$r = "Login Successful. " . $user->entity;
                $token = Str::random(128);
                $l1 = new login();
                $l1->login_time = date('h:i:s A m/d/Y', strtotime(date('h:i:s A m/d/Y')));
                $l1->all_users_id = $user->id;
                $l1->token = $token;
                $l1->save();

                // $r = "Login Successful. " . $user->entity . $token;

                // if ($user->entity == 'buyer') {
                //     $user2 = buyer::where('email', $user->email)->first();
                // }
                


                //Set cookie: Cookie::queue(Cookie::make('cookieName', 'value', $minutes));
                // Get cookie: $value = $request->cookie('cookieName'); or $value = Cookie::get('cookieName');
                // Forget/remove cookie: Cookie::queue(Cookie::forget('cookieName'));
                // Check if cookie exist: Cookie::has('cookiename'); or $request->hasCookie('cookiename') will return true or false

                // if ($request->has("logedin")) {
                //     $lifetime = time() + 60 * 60 * 24 * 365; // one year
                //     Cookie::queue(Cookie::make('token', $token, $lifetime));
                // }
                
                return redirect()->route("BuyerDashboard");
            } else {
                $r = "Incorrect Password";
            }
        } else {
            $r = "Incorrect Email";
        }
        return response("Invalid User", 401);
    }
}
