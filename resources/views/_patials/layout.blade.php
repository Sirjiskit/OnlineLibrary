<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Online Library :: {{ $title }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
    <!-- Styles -->
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

    </style>
</head>

<body>
    <nav class="mnb navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <i class="ic fa fa-bars"></i>
                </button>
                <div style="padding: 15px 0;">
                    <a href="#" id="msbo"><i class="ic fa fa-bars"></i></a>
                </div>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                            aria-expanded="false">Admin <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Logout</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="navbar-form navbar-right">
                    <input type="text" class="form-control" placeholder="Search...">
                </form>
            </div>
        </div>
    </nav>
    <!--msb: main sidebar-->
    <div class="msb" id="msb">
        <nav class="navbar navbar-default" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <div class="brand-wrapper">
                    <!-- Brand -->
                    <div class="brand-name-wrapper">
                        <a class="navbar-brand" href="#">
                            MY TASK
                        </a>
                    </div>

                </div>

            </div>

            <!-- Main Menu -->
            <div class="side-menu-container">
                <ul class="nav navbar-nav">

                    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <!-- Dropdown-->
                    <li class="panel panel-default @if ($menu == 'list_book' || $menu == 'add_book') active @endif" id="dropdown">
                        <a data-toggle="collapse" href="#dropdown-lvl1" aria-expanded="@if ($menu == 'list_book' || $menu == 'add_book') true @endif">
                            <i class="fa fa-book"></i> Book Management
                            <span class="caret"></span>
                        </a>
                        <!-- Dropdown level 1 -->
                        <div id="dropdown-lvl1" class="panel-collapse collapse @if ($menu == 'list_book' || $menu == 'add_book') in @endif" aria-expanded="@if ($menu == 'list_book' || $menu == 'add_book') true @endif">
                            <div class="panel-body">
                                <ul class="nav navbar-nav">
                                    <li class="@if ($menu == 'list_book') active @endif"><a href="{{ route('books.index') }}">List</a></li>
                                    <li class="@if ($menu == 'add_book') active @endif"><a href="{{ route('books.create') }}">Add</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li><a href="#"><span class="glyphicon glyphicon-signal"></span> Link</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </div>
    <!--main content wrapper-->
    <div class="mcw">
        <!--navigation here-->
        <!--main content view-->
        <div class="cv">
            <div>
                <div class="content">
                    <div class="content-sb">

                    </div>
                    <div class="content-bx container">
                        <div class="row">
                            <div class="col-md-12">
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src='https://code.jquery.com/jquery-3.1.1.min.js'></script>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'>
        < script src = "{{ asset('assets/js/script.js') }}" >
    </script>
</body>

</html>
