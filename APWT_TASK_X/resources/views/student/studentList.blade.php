@extends('layouts.app')
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
        @foreach($students as $student)
        <tr>
            <td>{{$student->name}}</td>
            <td>{{$student->id}}</td>
            <td>{{$student->email}}</td>
            <td>{{$student->age}}</td>
            <td>{{$student->gender}}</td>
            <td>{{$student->address}}</td>
            {{-- <td><a href="/studentEdit/{{$student->name}}/{{$student->id}}">Details</a></td> --}}
            <td><a href= " {{ url('/studentEdit', [$student->id]) }} ">Details</a></td>
            <td><a href="/studentDelete/{{$student->id}}">Delete</a></td>  
            </tr>
        @endforeach
    </table>
    

    @endsection


</body>
</html>