@extends('layouts.app')
@section('content')
    <h3>Add New User</h3>
    <form action="{{route('users.store')}}" method="post">
        @csrf
        <div class="from-group">
            <label for="name"> Name</label>
            <input type="text" name="name" placeholder="Username" class="form-control">
            @error('name')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="from-group">
            <label for="email"> Email</label>
            <input type="email" name="email" placeholder="Email" class="form-control">
            @error('email')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="from-group">
            <label for="password"> Password</label>
            <input type="password" name="password" placeholder="password" class="form-control">
            @error('password')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="from-group">
            <label for="roles"> Roles</label>
            <select name="roles[]" multiple id="" class="form-control">
                <option value="">Select</option>
                @foreach ($roles as $role)
                    <option value="{{$role->id}}">{{$role->name}}</option>
                @endforeach
            </select>
            @error('roles')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-sm btn-dark mt-5">Submit</button>
    </form>
@endsection