<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">

    <title>
       HomemallPH - @yield('title')
    </title>

    <meta name="keywords" content="">

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- styles -->
    <link href="{{ URL::asset('assets/client/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/client/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/client/css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/client/css/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/client/css/owl.theme.css') }}" rel="stylesheet">
    <!-- theme stylesheet -->
    <link href="{{ URL::asset('assets/client/css/style.default.css') }}" rel="stylesheet" id="theme-stylesheet">
    <!-- your stylesheet with modifications -->
    <link href="{{ URL::asset('assets/client/css/custom.css') }}" rel="stylesheet">
    <script src="{{ URL::asset('assets/client/js/respond.min.js') }}"></script>
     <!-- <link rel="shortcut icon" href="favicon.png">-->


</head>
 <body >
	
	@yield('content')

    <script src="{{ URL::asset('assets/client/js/jquery-1.11.0.min.js') }}"></script>
    <script src="{{ URL::asset('assets/client/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('assets/client/js/jquery.cookie.js') }}"></script>
    <script src="{{ URL::asset('assets/client/js/waypoints.min.js') }}"></script>
    <script src="{{ URL::asset('assets/client/js/modernizr.js') }}"></script>
    <script src="{{ URL::asset('assets/client/js/bootstrap-hover-dropdown.js') }}"></script>
    <script src="{{ URL::asset('assets/client/js/owl.carousel.min.js') }}"></script>
    <script src="{{ URL::asset('assets/client/js/front.js') }}"></script>
	<script src="{{ URL::asset('assets/client/js/jquery.unveil.js') }}"></script>

</body>
<script>

$(window).load(function(){
			$('img.bgfade').hide();
			var dg_H = $(window).height();
			var dg_W = $(window).width();
			$('#wrap').css({'height':dg_H,'width':dg_W});
			function anim() {
				$("#wrap img.bgfade").first().appendTo('#wrap').fadeOut(2000);
				$("#wrap img").first().fadeIn(2000);
				setTimeout(anim, 10000);
			}
			anim();

			$("img").unveil(1000);
			//$("img").trigger("lookup");
			 $(window).scroll(function () { 
				console.log($(window).scrollTop());
				if ($(window).scrollTop() > 150) {
					$('#navbar').addClass('navbar-fixed-top');
				}
				if ($(window).scrollTop() < 151) {
					$('#navbar').removeClass('navbar-fixed-top');
				}
			  });

			})
			$(window).resize(function(){
			//window.location.href=window.location.href
			})

</script>
@yield('page-script')
</html>