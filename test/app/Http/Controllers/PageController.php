<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jenssegers\Agent\Facades\Agent;

class PageController extends Controller
{
    public function TestData()
    {
        $larinfo = geoip()->getClientIP();
        // 
        // $name = goto('https://api.ipify.org/?format=json');
        // $data = get('https://api.ipify.org/?format=json');
        // dd($data);

        $content =     file_get_contents("https://api.ipify.org/?format=json");
        $result  = json_decode($content);
        //dd($result->ip);
        $ipinfo = geoip()->getLocation($result->ip);
        $device_name = Agent::platform();
        $browser = Agent::browser();
        //dd($ipinfo);
        return view("welcome")->with("ip", $ipinfo)->with("device", $device_name)->with("browser", $browser);
    }
}
