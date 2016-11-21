<!doctype html>
<html ng-app="app">
@include('layouts.header')
<body>

        <!-- Section Started -->
@yield('content')
        <!-- Section Collapsed -->

<!-- Section Started -->
<section id="">
</section>
<!-- Section Collapsed -->

@include('layouts.footer')
 	<script src="{{asset('custom/js/jquery.js')}}"></script>
	<script src="{{asset('custom/js/price-range.js')}}"></script>
    <script src="{{asset('custom/js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{asset('custom/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('custom/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('custom/js/main.js')}}"></script>
</body>
</html>

