<!DOCTYPE html>
<html lang="en">
<head>
<title>@yield('title')</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="OneTech shop project">
<meta name="viewport" content="width=device-width, initial-scale=1">
@yield('link-css')

</head>

<body>

<div class="super_container">

    <!-- Header -->
    @include('frontend.includes.header')
    <!--End Header -->

    <!-- content -->
    @yield('content')
    <!--End content -->

    <!-- newsletter -->
    @include('frontend.includes.newsletter')
    <!--End newsletter -->

    <!-- Footer -->
    @include('frontend.includes.footer')
    <!--End Footer -->
</div>



@yield('link-js')
</body>

</html>
