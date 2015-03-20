<nav class="navigation row">
    <div class="col-md-4">
        @if ($currentUser)
            <a class="button" href="{{route('create_post_path')}}">New Post</a>
        @endif
    </div>

    <header class="col-md-4">
        <a href="/"><h1>Larahunt</h1></a>
    </header>

    <div class="col-md-4">
        <div class="profile">
            @if ($currentUser)
                <a href="{{route('account_path')}}" class="profile--name">{{$currentUser->name}}</a>
                <a href="{{route('account_path')}}" class="profile--image"><img src="{{$currentUser->gravatar}}"></a>
                <a class="button" href="{{route('auth_logout_path')}}">Logout</a>
            @endif

            @if (!$currentUser)
                <a class="button" href="{{route('auth_login_path')}}">Login with GitHub</a>
            @endif
        </div>
    </div>
</nav>
