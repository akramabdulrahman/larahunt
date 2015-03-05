@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Your Account</h1>
    <p>Here you can manage your Larahunt account.</p>

    <h2>Profile</h2>

    <img src="{{$currentUser->gravatar}}" alt="{{$currentUser->name}}">

    <p><strong>Username:</strong> {{$currentUser->username}}</p>
    <p><strong>Email:</strong> {{$currentUser->email}}</p>
</div>
@stop
