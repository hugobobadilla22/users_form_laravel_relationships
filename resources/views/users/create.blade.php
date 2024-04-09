@extends('layouts.app')

@section('title', 'Add New User')

@section('content')
    <h1>Add a New User</h1>
    <form action="" method="POST">
        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" placeholder="Your name">
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="text" name="email" id="email" placeholder="Your email">
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" placeholder="Your password">
        </div>
        <select name="role" id="role">
            @foreach ($roles as $role)
                <option value="{{ $role->name }}">{{ ucfirst($role->name) }}</option>
            @endforeach
        </select>
        <input type="submit" value="Create">
    </form>
@endsection