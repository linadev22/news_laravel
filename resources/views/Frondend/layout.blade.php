<!DOCTYPE html>
<!--
	24 News by FreeHTML5.co
	Twitter: https://twitter.com/fh5co
	Facebook: https://fb.com/fh5co
	URL: https://freehtml5.co
-->
<html lang="en" class="no-js">
<!-- {{asset('Frond/')}} -->
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Noto+Serif+Khmer:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

    * {
        font-family: "Noto Serif Khmer", serif;
        /* font-optical-sizing: auto; */
        font-weight: 500;
        font-style: normal;

    }

    /* * {
        font-family: "Poppins", sans-serif;
        font-weight: 200;
        font-style: normal;
    } */
</style>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>24 News</title>
    <link href="{{asset('Frond/css/media_query.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('Frond/css/bootstrap.css')}}" rel="stylesheet" type="text/css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="{{asset('Frond/css/animate.css')}}" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <link href="{{asset('Frond/css/owl.carousel.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('Frond/css/owl.theme.default.css')}}" rel="stylesheet" type="text/css" />
    <!-- Bootstrap CSS -->
    <link href="{{asset('Frond/css/style_1.css')}}" rel="stylesheet" type="text/css" />
    <!-- Modernizr JS -->
    <script src="{{asset('Frond/js/modernizr-3.5.0.min.js')}}"></script>

</head>

<body>
    <!-- Start header -->
    @include('Frondend.body.header')
    <!-- end header -->

    @yield('layout')




    <!-- start About -->
    @include('Frondend.body.about')
    <!-- end about -->

    <!-- start footer -->
    @include('Frondend.body.footer')
    <!-- end footer -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="{{asset('Frond/js/owl.carousel.min.js')}}"></script>
    <!--<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <!-- Waypoints -->
    <script src="{{asset('Frond/js/jquery.waypoints.min.js')}}"></script>
    <!-- Main -->
    <script src="{{asset('Frond/js/main.js')}}"></script>


</body>

</html>