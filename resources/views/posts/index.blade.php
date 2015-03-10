@extends('layouts.app')

@section('content')
	<div class="container posts">
		<h2>The most popular Laravel news, packages and products, every day!</h2>
		@foreach($days as $day => $posts)
			<section>
				<h3>{{$day}} <span>{{head($posts)->published_at->format('F jS')}}</span></h3>
				@foreach($posts as $post)
					<article class="post">
						<!--<aside>
							<a href="">&#9650;</a>
						</aside>-->
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
			</section>
		@endforeach
	</div>
@endsection
