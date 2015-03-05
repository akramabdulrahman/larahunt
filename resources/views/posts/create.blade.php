@extends('layouts.app')

@section('title', 'Post a new hunt')

@section('content')
<div class="container">
    <h1>Post a new hunt</h1>
    <p>Find something new and interesting? Hunt it!</p>

    <form action="post">
        <div>
            <label for="title">Title</label>
            <input type="text" name="title">
        </div>

        <div>
            <label for="url">URL</label>
            <input type="text" name="url">
        </div>

        <div>
            <label for="description">Description</label>
            <textarea name="description" cols="30" rows="10"></textarea>
        </div>

        <div>
            <button class="button--primary" type="submit">Submit</button>
        </div>
    </form>

    <p>Nice Hunt!</p>
    <p>Your hunt is now under review by our moderator team.</p>
    <p>Please note that hundreds of products are submitted each day and unfortunately many of them won't make the homepage. For this reason, there isn't a set time in which a product may be posted. If yours does, we'll let you know!</p>
    <p>Until then, happy hunting. :)</p>
</div>
@endsection
