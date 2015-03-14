<nav class="navigation">
	<ul>
		<li><a class="button--primary" href="{{route('about')}}">About</a></li>
		@if ($currentUser)
			<li><a class="button--primary" href="{{route('create_post_path')}}">New Post</a></li>
		@endif
	</ul>

	<header>
		<a href="/"><h1>Larahunt</h1></a>
	</header>

	<ul>
		@if (!$currentUser)
			<li><a class="button--primary" href="{{route('auth_login_path')}}">Login with GitHub</a></li>
		@else
			<li class="navigation--profile">
				<p><a href="{{route('account_path')}}">{{$currentUser->name}}</a></p>
				<a href="{{route('account_path')}}"><img src="{{$currentUser->gravatar}}"></a>
			</li>
			<li>
				<a class="button--primary" href="{{route('auth_logout_path')}}">Logout</a>
			</li>
		@endif
	</ul>
</nav>
