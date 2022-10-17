@extends('layouts.adminlayout')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User List</title>
</head>
<body>
    @section('content')
        
    <table class="table table-border">
        <tr>
            <th>Name</th>
            <th>ID</th>
            <th>Email</th>
            <th>DOB</th>
            <th>Gender</th>
            <th>Address</th>
            {{-- <th>Action</th> --}}
            <th>Action</th>
            <th>Action</th>
        </tr>
        @foreach($users as $user)
        <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->id}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->dob}}</td>
            <td>{{$user->gender}}</td>
            <td>{{$user->address}}</td>
            {{-- <td><a href="/studentEdit/{{$student->name}}/{{$student->id}}">Details</a></td> --}}
            <td><a href= " {{ url('/admin/edit', [$user->id]) }} ">Details</a></td>
            <td><a href="/admin/delete/{{$user->id}}">Delete</a></td>  
            </tr>
        @endforeach
    </table>

    @endsection
</body>
</html>