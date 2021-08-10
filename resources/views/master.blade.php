<!doctype html>
<html lang="en">
@include('include/head_link')
<body>
@include('include/header')
@include('include/messages')
    @yield('content')
@include('include/js')
</body>
</html>
