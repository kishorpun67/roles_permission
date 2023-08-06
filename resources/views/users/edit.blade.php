@extends('layouts.app')
@section('content')
<h3>Edit User</h3>
<form action="{{route('users.update', $user->id)}}" method="post">
    @csrf
    @method('put')
    <div class="from-group">
        <label for="name"> Name</label>
        <input type="text" name="name" placeholder="Username" class="form-control" value="{{$user->name ?? old('name')}}">
        @error('name')
            <p class="text-danger">{{$message}}</p>
        @enderror
    </div>
    <div class="from-group">
        <label for="email"> Email</label>
        <input type="email" name="email" placeholder="Email"  class="form-control" value={{$user->email ?? old('email')}}>
        @error('email')
            <p class="text-danger">{{$message}}</p>
        @enderror
    </div>
    <div class="from-group">
    <div class="from-group">
        <label for="roles"> Roles</label>
        <select name="roles[]" multiple id="" class="form-control">
            <option value="">Select</option>
            @foreach ($roles as $role)
                <option value="{{$role->id}}" @if (in_array($role->id, $user->roles->pluck('id')->toArray()))
                    selected="selected"
                @endif>{{$role->name}}</option>
            @endforeach
        </select>
        @error('roles')
            <p class="text-danger">{{$message}}</p>
        @enderror
    </div>
    <button type="submit" class="btn btn-sm btn-dark mt-5">Update</button>
</form>
@endsection