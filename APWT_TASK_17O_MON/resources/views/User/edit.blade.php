@extends('layouts.userLayout')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
</head>
<body>
    @section('content')
    <div class="reg">
        <div class="reg-content">
            <div class="left-content">
                <h1>Hello {{$user->name}}. Your Edit Board</h1>
                <h4>Update & Edit Your Personal Information.</h4>
                <div class="reg-img">
                    {{-- <img src="/img/reg.png" alt=""> --}}
                </div>
            </div>
            <div class="right-content">
                <h2>Personal Information</h2>
                <h4>Just a Step way to become our Member!</h4>
                <div class="reg-border">
                    <form  method="post" action="/user/edit">
                        {{ csrf_field() }}
                        <label>Name</label><br>
                        <input type="text"   placeholder="Enter your name" name="First_Name" value="{{$user->name}}">
                        @if ($errors->has('First_Name'))
                            <span>
                                <p>{{$errors->first("First_Name")}}</p>
                            </span>
                        @endif
                        <label>Email</label>
                        <input type="Email"   placeholder="Enter your email" name="email" value="{{$user->email}}">
                        @if ($errors->has('email'))
                            <span>
                                <p>{{$errors->first("email")}}</p>
                            </span>
                        @endif
                        <label>Password</label>
                        <input type="password"  placeholder="Enter your password" name="password" value="{{$user->password}}">
                        @if ($errors->has('password'))
                            <span>
                                <p>{{$errors->first("password")}}</p>
                            </span>
                        @endif
                        <label>Gender</label><br>
                        <input type="radio" name="gender"  value="male" class="form-check-input">
                        <label >Male</label>
                        <input type="radio" name="gender"   value="female" class="form-check-input">
                        <label >Female</label>
                        <input type="radio" name="gender"  value="other" class="form-check-input">
                        <label >Other</label><br>
                        @if ($errors->has('gender'))
                            <span>
                                <p>{{$errors->first("gender")}}</p>
                            </span>
                        @endif
                        <label>Date of birth</label>
                        <input type="date" placeholder="Enter your age" name="age">
                        @if ($errors->has('age'))
                            <span>
                                <p>{{$errors->first("age")}}</p>
                            </span>
                        @endif
                        <label>Address</label>
                        <textarea name="address" rows="3"   placeholder="Enter address">{{$user->address}}</textarea>
                        @if ($errors->has('address'))
                            <span>
                                <p>{{$errors->first("address")}}</p>
                            </span>
                        @endif
                        <input type="submit" name="submit" value="Update">
                    </form>
                </div>
            </div>
            
        </div>
        <div class="errors">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>  
    </div>
    @endsection
</body>
</html>