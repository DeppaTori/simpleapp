<html>
    <head>
        <title>Admin - @yield('title')</title>
    </head>
    <body>
        @section('sidebar')
            <p><a href=" {{ $urls["index"] }}">Dashboard</a> | <a href=" {{ $urls["add"] }}">Daftar Baru</a></p>
    
        @show

        <div class="container">
            @yield('content')
        </div>
    </body>
</html>

