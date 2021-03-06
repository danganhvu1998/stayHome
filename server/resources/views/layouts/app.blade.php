<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SHF - StayHomeForever</title>

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
                        <li><a class="nav-link" href="/user_require/finish/history"><b>History</b></a></li>
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
                                        <a class="dropdown-item" href="/home">
                                            CAMPAIGN
                                        </a>
                                        <a class="dropdown-item" href="/docs/eng">
                                            English
                                        </a>
                                        <a class="dropdown-item" href="/docs/jap">
                                            日本語
                                        </a>
                                    </div>
                                </li>
                        @else
                            @if (Auth::user()->id == 1)
                                <li><a class="nav-link" href="/admin/building"><b>Admin</b></a></li>
                            @endif
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
                                    <a class="dropdown-item" href="/home">
                                        CAMPAIGN
                                    </a>
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
                <div>
                    <div class="row">
                        <div class="col-md-8">
                            <ul>
                                <li>Testing time will end at <b class="text-primary">23:59 31/October/2018</b>. You always can check our running campaign <b><a href="/home">HERE</a></b></li>
                                <li><b class="text-danger">This is 100% free service that connect Buyer and Go-To-Market-er. Price is only approximate. Final price is on the bill, Buyer and Taker will decide how much money to pay</b></li>
                                <li>Trouble with login? Sorry reset password will not work. Email me: <b>danganhvu1998@gmail.com</b></li>
                                <li>Like us? Donate Now  ===> </li>
                            </ul>
                        </div>
                        <div class="col-md-4 text-center">
                            <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                                <input type="hidden" name="cmd" value="_s-xclick">
                                <input type="hidden" name="hosted_button_id" value="95VX9JHHCMSWS">
                                <input type="hidden" name="on0" value="Buy me a cup of coffee!">Buy me a cup of coffee!
                                <br>
                                <select name="os0">
                                    <option value="A small cup of coffee">A small cup of coffee ¥100 JPY</option>
                                    <option value="Big coffee cup">Big coffee cup ¥400 JPY</option>
                                    <option value="A bottle of coffee">A bottle of coffee ¥1,000 JPY</option>
                                    <option value="A tank of coffee">A tank of coffee ¥10,000 JPY</option>
                                </select><br><br>
                                <input type="hidden" name="currency_code" value="JPY">
                                <input type="image" src="https://www.paypalobjects.com/en_US/JP/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                                <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
