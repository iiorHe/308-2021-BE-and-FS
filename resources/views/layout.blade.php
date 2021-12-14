<!doctype html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cover.css') }}">
    <script src="{{ asset("js/jquery-3.6.0.min.js") }}"></script>
    <script src="{{ asset("js/bootstrap.min.js") }}"></script>
    <script src="{{ asset("js/popper.min.js") }}"></script> 
    <title>@yield("app-title")</title>
</head>
<body class="text-center">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <header class="masthead mb-auto">
            <div class="inner">
                <h3 class="masthead-brand">@yield("app-title")</h3>
                <nav class="nav justify-content-end">
                    @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a id="" class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                    <a class=" nav-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                            </li>
                        @endguest
                </nav>
                <nav class="nav nav-masthead justify-content-center">
                    <a class=nav-link href="/secret">Secret</a>
                    <a class="nav-link" href="/">Home</a>
                    <a class = "nav-link" href="/project">Project</a>
                    <a class="nav-link" href="/dev/0/games">Games</a>
                    <a class="nav-link" href="/devs">Developers</a>
                </nav>
            </div>
        </header>
        <main role="main" class="inner cover">
            <h1 class="cover-heading">@yield("page-title")</h1>

            @yield("page-content")
        </main>
        <footer class="mastfoot mt-auto">
            <div class="inner">
                @yield("page-footer")
            </div>
        </footer>
    </div>
</body>
</html>
