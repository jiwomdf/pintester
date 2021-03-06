<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/home') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                        <form action="{{ url('/doSearch') }}" method="GET">
                    <input type="text" name="search" placeholder="search by name">
        <input type="submit" value="submit">
    </form>
                    </ul>
                    
                   
    
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else                            
                            <li>
                                <a href="/viewCart">Cart</a>
                            </li>
                            <li>
                                <!-- jiwo add MyPost -->
                                <a href="{{url('/MyPost/'.Auth::user()->id)}}">My Post</a>
                            </li>
                            <li>
                            <li>
                                <a href="{{url('/viewTransaction/'.Auth::user()->id)}}">History</a>
                            </li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                   Profile  <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{url('profile/')}}">My Profile</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>

                            @if(Auth::user()->role_id === 2)
                            <!-- tambahin dropdown buat manage -->
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                   Manage  <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{url('/viewcategory')}}">View Category</a> 
                                    </li>
                                    <li>
                                        <a href="{{url('/manageuser')}}">Manage User</a>
                                    </li>                                    
                                </ul>
                                
                            </li>
                            @endif

                            </li>

                            <img src="{{'pp/'.Auth::user()->pp }}" class="dropdown" alt="" style="heigh:50px;width:50px;border-radius:100%;margin-top:8px;">
                            <span>{{Auth::user()->name }}</span>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')

        <div class="container navbar-default">
            waktu : <span id="time"></span>
        </div>
        <div class="container navbar-default">
            <a href="/basedFollow">Filter by Follow Post</a>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        var d = new Date();
        document.getElementById("time").innerHTML = d;
</script>
</body>
</html>
