<nav class="navigation">
	<ul>
		<li><a href="/">New Post</a></li>
	</ul>

	<header>
		<a href="/"><h1>Larahunt</h1></a>
	</header>

	<ul>
		@if (!$currentUser)
			<li><a href="{{route('auth_login_path')}}">Login with GitHub</a></li>
		@else
			<li class="navigation--profile">
				<p>{{$currentUser->name}}</p>
				<img src="{{$currentUser->gravatar}}">
			</li>
			<li>
				<a href="{{route('auth_logout_path')}}">Logout</a>
			</li>
		@endif
	</ul>
</nav>
