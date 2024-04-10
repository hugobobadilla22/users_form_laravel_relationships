@extends('layouts.app')

@section('title', 'Users')

@section('content')
    <h1>Active Users</h1>
    <a href="{{ route('user.create') }}">Create a new user</a>
    @forelse ($users as $user)
        <div>
            <p><strong>Name: </strong>{{ $user->name }}</p>
            <p><strong>Email: </strong>{{ $user->email }}</p>
            <p><strong>Roles: </strong></p>
            <ul>
                @foreach ($user->roles as $role)
                    <li>{{ $role->name }}</li>
                @endforeach
            </ul>
            <div class="actions">
                <a href="{{ route('user.edit', $user->id) }}">Edit</a>
                <form action="{{ route('user.destroy', $user->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Delete">
                </form>
            </div>
        </div>
    @empty
        <p>No data.</p>
    @endforelse
@endsection