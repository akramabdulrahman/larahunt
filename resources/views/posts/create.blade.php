@extends('layouts.app')

@section('title', 'Post a new hunt')

@section('content')
<div class="container">
    <h1>Post a new hunt</h1>
    <p>Find something new and interesting? Hunt it!</p>

    <form method="post" action={{route('store_post_path')}}>
        <input type="hidden" name="_token" value="{{csrf_token()}}">

        <label for="title">Title</label>
        <div><input type="text" name="title" value="{{old('title')}}"></div>

        <label for="url">URL</label>
        <div><input type="text" name="url" value="{{old('url')}}"></div>

        <label for="description">Description</label>
        <div><textarea name="description" cols="30" rows="5">{{old('description')}}</textarea></div>

        <div><button class="button--primary" type="submit">Submit</button></div>
    </form>
</div>
@endsection
