@extends('layouts.app')
@section('content')
    <h3>All Users</h3>
    <a href="{{route('users.create')}}" class="btn btn-dark mb-2">Add User</a>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Sno.</th>
                <th>Name</th>
                <th>Email</th>
                <th>Roles</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        @foreach ($user->roles as $role)
                            {{$role->name}} {{!$loop->last ? ', ' : ''}}
                        @endforeach
                    </td>
                    <td>
                        <a href="{{route('users.show', $user->id)}}" class="btn btn-small btn-dark">View</a>
                        <a href="{{route('users.edit', $user->id)}}" class="btn btn-small btn-dark">Edit</a>
                        <form action="{{route('users.destroy', $user->id)}}" method="post" class="d-inline">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </form>

                    </td>

                </tr>
            @endforeach

        </tbody>
    </table>
@endsection