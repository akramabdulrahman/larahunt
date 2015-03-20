<nav class="navigation row">
    <div class="col-md-4">
        @if ($currentUser)
            <a class="button" href="{{route('create_post_path')}}">New Post</a>
        @endif
    </div>

    <header class="col-md-4">
        <a href="/"><h1>Larahunt</h1></a>
    </header>

    <div class="col-md-4 navigation--right">
        @if ($currentUser)
            <div class="profile col-md-4">
                <a href="{{route('account_path')}}">{{$currentUser->name}}</a>
                <a href="{{route('account_path')}}"><img src="{{$currentUser->gravatar}}"></a>
            </div>
            <div class="col-md-2">
                <a class="button" href="{{route('auth_logout_path')}}">Logout</a>
            </div>
        @endif

        @if (!$currentUser)
            <div class="col-md-12">
                <a class="button" href="{{route('auth_login_path')}}">Login with GitHub</a>
            </div>
        @endif
    </div>
</nav>
