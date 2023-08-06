@extends('layouts.app')
@section('content')
<h3>Show User</h3>
    <div class="from-group">
        <label for="name"> Name</label>
        <input type="text" name="name" placeholder="Username" class="form-control" readonly value="{{$user->name ?? old('name')}}">
    </div>
    <div class="from-group">
        <label for="email"> Email</label>
        <input type="email" name="email" placeholder="Email" class="form-control" readonly {{$user->email ?? old('email')}}>
    </div>
    <div class="from-group">
    <div class="from-group">
        <label for="roles"> Roles</label>
        @foreach ($user->roles as $role)
            {{$role->name}} {{!$loop->last ? ', ' : ''}}
        @endforeach
    </div>
@endsection