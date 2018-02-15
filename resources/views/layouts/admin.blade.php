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
        <link href="{{ asset('css/all.css') }}" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-default navbar-static-top">
                <div class="container">
                    <div class="navbar-header">

                        <!-- Collapsed Hamburger -->
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                            <span class="sr-only">Toggle Navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        <!-- Branding Image -->
                        <a class="navbar-brand" href="{{ url('/') }}">
                            {{ config('app.name', 'Laravel') }}
<!--                             <img alt="Brand" src="/img/logo.jpeg">-->
                        </a>
                    </div>

                    <div class="collapse navbar-collapse" id="app-navbar-collapse">
                        <!-- Left Side Of Navbar -->
                        <ul class="nav navbar-nav">
                            &nbsp;
                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="nav navbar-nav navbar-right">
                            <!-- Authentication Links -->
                            <li><a href="/admin/users">Users</a></li>
                            <li><a href="/admin/agencies">Agencies</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    Omar <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
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
                        </ul>
                    </div>
                </div>
            </nav>
            @if(session()->has('flash_message_success'))
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            @if(is_array(session()->get('flash_message_success')))
                            @foreach(session()->get('flash_message_success') as $message)
                            <strong>Success!</strong> {{ $message }}
                            @endforeach
                            @else
                            <strong>Success!</strong> {{ session()->get('flash_message_success') }}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @if(session()->has('flash_message_error'))
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            @if(is_array(session()->get('flash_message_error')))
                            @foreach(session()->get('flash_message_error') as $message)
                            <strong>Error!</strong> {{ $message }}
                            @endforeach
                            @else
                            <strong>Error!</strong> {{ session()->get('flash_message_error') }}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endif

            @yield('content')
        </div>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/all.js') }}"></script>
        <script>
                                               function deleteModel(event, form_id, message) {
                                                   event.preventDefault();
                                                   if (confirm(message)) {
                                                       document.getElementById(form_id).submit();
                                                       return true;
                                                   }
                                                   return false;
                                               }
        </script>
        @stack('scripts')

    </body>
</html>
