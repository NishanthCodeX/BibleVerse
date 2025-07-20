<!DOCTYPE html>
<html lang="en">
@include('layout.head')
<style>
    .navbar-toggler:focus {
        outline: none !important;
        box-shadow: none !important;
    }
</style>
<body>
    @include('layout.menu')
    @yield('content')
    @include('layout.footer')
</body>
</html>