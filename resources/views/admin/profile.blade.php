@extends('profile')
@section('title','admin')
@section('options')


    <form action="{{route('admin.register')}}" method="get">@csrf <button class="btn btn-primary btn-user btn-block"> Add new account</button></form>
    <form action="{{route('admin.liststud')}}" method="get">@csrf <button class="btn btn-primary btn-user btn-block"> View all students</button></form>
     <form action="{{route('admin.archive')}}" method="get">@csrf <button class="btn btn-primary btn-user btn-block"> View archived students</button></form>
    <form action="{{route('admin.addsubj_view')}}" method="get" >@csrf <button class="btn btn-primary btn-user btn-block"> Add new subject</button></form>
    <form action="{{route('admin.listsubj')}}" method="get">@csrf <button class="btn btn-primary btn-user btn-block"> View all subjects</button></form>
    <form action="{{route('admin.logout')}}" method="post">@csrf @method('post') <button class="btn btn-primary btn-user btn-block"> Log Out </button></form>
    <form action="{{route('admin.changePass_index')}}" method="post">@csrf @method('get') <button class="btn btn-primary btn-user btn-block"> change password </button></form>

@endsection
