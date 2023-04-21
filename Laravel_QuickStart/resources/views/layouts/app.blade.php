<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Laravel Quickstart - Basic</title>
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('fontawesome/all.min.css')}}">
    </head>
    <body>
        <div class="container border border-1">
            <nav class="navbar">
                Task List
            </nav>
        </div>
        @yield('content')
    </body>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('fontawesome/all.min.js')}}"></script>
</html>
