<html>
    <head>
        <title>@yield('title')</title>
        @stack('scripts')
    </head>
    <body>
        @section('sidebar')
        主页面的sidebar
        @show
        <div class="container">
            @yield('content')
        </div>
    </body> 
</html>