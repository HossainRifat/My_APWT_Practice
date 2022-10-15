@extends("layouts.app");
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student</title>
</head>
<body>
    @section('content')
    <div class="reg">
        <div class="reg-content">
            <div class="left-content">
                <div class="reg-img">
                    <img src="/img/reg.png" alt="">
                </div>
            </div>
            <div class="right-content">
                <h2>Update Student Information</h2>
                <h4>Just a Step way to become our Member!</h4>
                <div class="reg-border">
                    <form  method="post" action="{{route('studentEdit')}}">
                        {{ csrf_field() }}
                        <label>Name</label><br>
                        <input type="text" placeholder="Enter your name" name="First_Name" value="{{$student->name}}">
                        @if ($errors->has('First_Name'))
                            <span>
                                <p>{{$errors->first("First_Name")}}</p>
                            </span>
                        @endif
                        <label>Id</label><br>
                        <input type="text" readonly name="id" value="{{$student->id}}">
                        <label>Email</label>
                        <input type="Email" placeholder="Enter your email" name="email" value="{{$student->email}}">
                        @if ($errors->has('email'))
                            <span>
                                <p>{{$errors->first("email")}}</p>
                            </span>
                        @endif
                        <label>Gender</label>
                        <input type="text" placeholder="Enter your gender" name="gender" value="{{$student->gender}}">
                        @if ($errors->has('gender'))
                            <span>
                                <p>{{$errors->first("gender")}}</p>
                            </span>
                        @endif
                        <label>Age</label>
                        <input type="text" placeholder="Enter your age" name="age" value="{{$student->age}}">
                        @if ($errors->has('age'))
                            <span>
                                <p>{{$errors->first("age")}}</p>
                            </span>
                        @endif
                        <label>Address</label>
                        <textarea name="address" rows="3" placeholder="Enter address">{{$student->address}}</textarea>
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