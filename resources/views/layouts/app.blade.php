<!-- Stored in resources/views/layouts/app.blade.php -->

<html>
    <head>
        <title>App Name - @yield('title')</title>
    </head>
    <body>
<style>
.sidebar {
    width: 250px;
    float: left;
    background-color: #dedede;
    overflow: hidden;
}

.container{
    width:600px;
    float: left
}
</style>

        <div class="sidebar">
        @section('sidebar')
            This is the master sidebar.
        @show

        </div>

        <div class="container">
            @yield('content')
        </div>
    </body>
</html>
