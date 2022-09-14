@extends('profile')
@section('title','user')
{{--@section('GPA')--}}
@section('options')
    <form action="{{route('user.listsubj')}}" method="post">@csrf @method('get') <button class="btn btn-primary btn-user btn-block"> Enroll in a course </button></form>
    <form action="{{route('user.courses')}}" method="post">@csrf @method('post') <button class="btn btn-primary btn-user btn-block"> view uncompleted courses</button></form>
    <form action="{{route('user.completed')}}" method="post">@csrf @method('post') <button class="btn btn-primary btn-user btn-block"> view completed courses </button></form>
    <form action="{{route('user.fees')}}" method="post">@csrf @method('post') <button class="btn btn-primary btn-user btn-block"> My fees </button></form>
    <form action="{{route('user.logout')}}" method="post">@csrf @method('post') <button class="btn btn-primary btn-user btn-block"> Log Out </button></form>
    <form action="{{route('user.changePass_index')}}" method="post">@csrf @method('get') <button class="btn btn-primary btn-user btn-block"> change password </button></form>


@endsection
