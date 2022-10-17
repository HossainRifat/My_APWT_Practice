@extends('layouts.layout')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @section('content')
    
    <div class="reg">
        <div class="reg-content">
            <div class="left-content">
                <div class="reg-img-login">
                    <img src="/img/login.png" alt="">
                </div>
            </div>
            <div class="right-content">
                <h2>Login</h2>
                <h4>Welcome back to xyz website!</h4>
               
                <div class="reg-border">
                    <form  method="post" action="">
                        {{ csrf_field() }}
                        
                        <label>Email</label>
                        <input type="Email" placeholder="Enter your email" name="email">
                        @if ($errors->has('email'))
                            <span>
                                <p>{{$errors->first("email")}}</p>
                            </span>
                        @endif
                        <label>Password</label>
                        <input type="password" placeholder="Enter your password" name="pass">
                 
                            <span>
                                @isset($output)
                                <p class="login-output">{{$output}}</p>
                            @endisset
                            
                            </span>
                        
                        <input type="submit" name="submit" value="Signup">
                    </form>
                </div>
            </div>
            
        </div>
        
    </div>

    @endsection
</body>
</html>