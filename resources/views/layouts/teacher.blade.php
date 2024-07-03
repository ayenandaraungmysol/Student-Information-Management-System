<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--<title>{{ config('app.name', 'Laravel') }}</title>-->

    <title>{{ 'Student Information Management System Admin' }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
        <div class="row g-0">
            <nav class="col-2 bg-light pe-3">
                <h1 class="h4 py-3 text-center text-primary">
                    <img src="{{asset('images/logo.png')}}" width="50">
                    <span class="d-none d-lg-inline">
                    TEACHER
                    </span>
                </h1>
                <div class="list-group text-center text-lg-start">
                    <span class="list-group-item disabled d-none d-lg-block">
                        <small>STUDENTS</small>
                    </span>
                    <a href="{{route('teacher.students')}}" class="list-group-item list-group-item-action ">
                        <i class="fas fa-user-graduate"></i>
                        <span class="d-none d-lg-inline">All Students</span>
                    </a>
                </div>



            </nav>

            <main class="col-10 bg-light">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="flex-fill mt-5">
                        <i class="fas fa-user text-center"></i>
                        <div class="d-none d-lg-inline">{{ Auth::user()->name }}</div><span>< {{ Auth::user()->teacher->designation}} ></span><br>
                        <div class="d-none d-lg-inline">Grade: {{ Auth::user()->teacher->grade}}</div>
                        {{--<div class="d-none d-lg-inline">Teacher Class Id: {{ Auth::user()->teacher->class_id}}</div>--}}
                        @if (Auth::user()->teacher->class_id === 1)
                        <div class="d-none d-lg-inline">(Class: A)</div>
                        @elseif (Auth::user()->teacher->class_id === 2)
                        <div class="d-none d-lg-inline">(Class: B) </div>
                        @else
                        <div class="d-none d-lg-inline">(Class: C) </div>
                        @endif
                    </div>
                    <div class="mt-5">
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();"><i class="fas fa-sign-out"></i> {{ __('Logout') }}</a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>


                </nav>
                <div>
                    @yield('content')
                </div>
            </main>
        </div>

    </div>



    <!--<div id="app">


        <main class="py-4">

        </main>
    </div>-->
</body>
</html>
