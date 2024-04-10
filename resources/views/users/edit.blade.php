@extends('layouts.app')

@section('title', 'Update User | ' . $user->name)

@section('content')
    <h1>Update User</h1>
    <a href="{{ route('user.index') }}">Back to home</a>
    <form action="{{ route('user.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" placeholder="Your name" value="{{ old('name', $user->name) }}">
            @error('name')
                <p>{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="text" name="email" id="email" placeholder="Your email" value="{{ old('email', $user->email) }}">
            @error('email')
                <p>{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" placeholder="Your password">
            @error('password')
                <p>{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="role1">Admin</label>
            <input type="checkbox" name="role[]" id="role1" value="1">
            <label for="role2">Staff</label>
            <input type="checkbox" name="role[]" id="role2" value="2">
            <label for="role3">User</label>
            <input type="checkbox" name="role[]" id="role3" value="3">
            @error('role')
                <p>{{ $message }}</p>
            @enderror
        </div>
        <input type="submit" value="Update">
    </form>
@endsection