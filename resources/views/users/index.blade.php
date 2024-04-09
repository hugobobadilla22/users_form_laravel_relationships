@extends('layouts.app')

@section('title', 'Users')

@section('content')
    <h1>Active Users</h1>
    @forelse ($users as $user)
        <div>
            <p><strong>Name: </strong>{{ $user->name }}</p>
            <p><strong>Email: </strong>{{ $user->name }}</p>
            @foreach ($user->roles as $role)
                <p><strong>Roles: </strong>{{ $user->roles->name }}</p>
            @endforeach
        </div>
    @empty
        <p>No data.</p>
    @endforelse
@endsection