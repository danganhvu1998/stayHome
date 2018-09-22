<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SHF') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="/goods/view">
                    SHF-StayHomeForever
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    
                    <ul class="navbar-nav mr-auto">
                        <li><a class="nav-link" href="/user_require/confirm"><b>My Stuffs</b></a></li>
                        <li><a class="nav-link" href="/require/all"><b>Let's Go Out</b></a></li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                            <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        Document<span class="caret"></span>
                                    </a>
    
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="/docs/eng">
                                            English
                                        </a>
                                        <a class="dropdown-item" href="/docs/jap">
                                            日本語
                                        </a>
                                    </div>
                                </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} ({{ Auth::user()->point }} point) <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/user/view">
                                        View Profile
                                    </a>
                                    <a class="dropdown-item" href="/user/setting">
                                        Edit Profile
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Document<span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/docs/eng">
                                        English
                                    </a>
                                    <a class="dropdown-item" href="/docs/jap">
                                        日本語
                                    </a>
                                   
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @yield('content')
                <hr>
                <div class="">
                    <ul>
                        <li>Testing time will end at <b class="text-primary">23:59 31/October/2018</b>. Before that, you have infinity point. Feel free to use! In testing time, guarantee that every order before 11h30AM every Saturday and Sunday will be deliverd before 12h30PM.</li>
                        <li>The point you gain in testing time will not lose after that. For example, if you gain <b>10</b> points and use <b>3</b>, you will have extra <b>7</b> points. Gain 3 use 7, you got no extra!</li> 
                        <li>After testing time, first 4 people will have <b>10 + extra point</b>. Other will have <b>3 + extra point</b>. New registers have nothing</li>
                        <li>If you find any bugs, or any ideas to improve SHF, please fell free to inform me at <b class="text-danger">danganhvu1998@gmail.com</b>. Thank you!(Of course, extra point!)</li>
                        <li>Currently only for Dormy Kawaguchi. Why <b class="text-primary">kyatod.science</b>? On Sale!</li>
                        <li>Trouble? Please read: <a href="/docs/eng">English</a> or <a href="/docs/jap">日本語(not yet)</a></li>
                        <li>Trouble with login? Sorry reset password will not work. Email me: <b>danganhvu1998@gmail.com</b></li>
                    </ul>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
