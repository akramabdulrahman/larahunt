@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2>The most popular Laravel news, packages and products, every day!</h2>
        </div>
    </div>
	<div class="posts">
		@foreach($days as $day => $posts)
			<section class="row">
                <div class="col-md-12">
    				<h3>{{$day}} <span>{{head($posts)->published_at->format('F jS')}}</span></h3>
    				@foreach($posts as $post)
    					<article class="post">
    						<aside>
    							<a href="{{route('post_vote_path', $post->id)}}">&#9650;</a>
    							<span>{{$post->votes->count()}}</span>
    						</aside>
    						<header>
    							<h4>
    								<a href="{{$post->url}}" target="_blank">{{$post->title}}</a>
    							</h4>
    							<p>{{$post->description}}</p>
    						</header>
    						@if ($post->user->gravatar)
    						<footer>
    							<img src="{{$post->user->gravatar}}" alt="{{$post->title}}">
    						</footer>
    						@endif
    					</article>
    				@endforeach
                </div>
			</section>
		@endforeach
	</div>
@endsection
