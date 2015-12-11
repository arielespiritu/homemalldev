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
	<meta name="_token" content="{!! csrf_token() !!}"/>
    <meta name="keywords" content="">
	
	@yield('head')
	
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
 <!--<body style="background:url({{ URL::asset('assets/img/bg.jpg') }});">-->
 <body >
    <!-- *** TOPBAR ***
 _________________________________________________________ -->  
    <div id="top" style="background:#000">
        <div class="container"  >
            <div class="col-md-6 offer" style="padding:0px" >
                <a href="/HMadmin"  style="color:white" ><i class="fa fa-user nav-user"></i>Merchant Login</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="/HMadmin">&nbsp;Be a seller now!</a>
            </div>
            <div class="col-md-6 " style="padding:0px">
                <ul class="menu">
					@if(isset($user))
						@foreach($user as $user)
							<li><a href="/My-Account/Info"><i class="fa fa-user nav-user"></i>Hi&nbsp;&nbsp;{{ucfirst($user->member->fname)}}</a></li>
							<li><a href="/auth/logout" >Logout</a></li>
							<li><a href="/My-Account/Favorites"><i class="fa fa-heart nav-heart"></i>Favorites</a></li>
							<li><a href="/My-Account/Wishlist"><i class="fa fa-star nav-star"></i>Wishlist</a></li>
						@endforeach
					@else
						<li><a href="/auth/login" ><i class="fa fa-user nav-user"></i>Login</a></li>
						<li><a href="/My-Account/Favorites"><i class="fa fa-heart nav-heart"></i>Favorites</a></li>
						<li><a href="/My-Account/Wishlist"><i class="fa fa-star nav-star"></i>Wishlist</a></li>
					@endif  
                </ul>
            </div>
        </div>
        <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
            <div class="modal-dialog modal-sm">

                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="Login">Customer login</h4>
                    </div>
                    <div class="modal-body">
                        <form action="customer-orders.html" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" id="email-modal" placeholder="email">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="password-modal" placeholder="password">
                            </div>
                            <p class="text-center">
                                <button class="btn btn-primary"><i class="fa fa-sign-in"></i> Log in</button>
                            </p>
                        </form>
                        <p class="text-center text-muted">Not registered yet?</p>
                        <p class="text-center text-muted"><a href="register.html"><strong>Register now</strong></a>! It is easy and done in 1&nbsp;minute and gives you access to special discounts and much more!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
	@yield('content')
		
    
 

        <!-- *** FOOTER ***
 _________________________________________________________ -->
        <div id="footer" >
            <div class="container">
                <div class="row">
				<div class="col-md-12" style="padding:16px">
                    <div class="col-md-3 col-sm-6">
                        <h4>Pages</h4>

                        <ul>
                            <li><a href="text.html">About us</a>
                            </li>
                            <li><a href="text.html">Terms and conditions</a>
                            </li>
                            <li><a href="faq.html">FAQ</a>
                            </li>
                            <li><a href="contact.html">Contact us</a>
                            </li>
                        </ul>

                        <hr>

                        <h4>User section</h4>

                        <ul>
                            <li><a href="#" data-toggle="modal" data-target="#login-modal">Member Login</a>
                            </li>
                            <li><a href="/HMadmin">Merchant Login</a>
                            </li>
                        </ul>

                        <hr class="hidden-md hidden-lg hidden-sm">

                    </div>
                    <!-- /.col-md-3 -->

                    <div class="col-md-3 col-sm-6">

                        <h4>Top Market</h4>

                        <h5>Groceries</h5>

                        <ul>
                            <li><a href="category.html">Liquor and Beverages</a>
                            </li>
                            <li><a href="category.html">Bakery</a>
                            </li>
                            <li><a href="category.html">Fruits and Veggies</a>
                            </li>
                        </ul>

                        <h5>Apparel</h5>
                        <ul>
                            <li><a href="category.html">T-shirts</a>
                            </li>
                            <li><a href="category.html">Skirts</a>
                            </li>
                            <li><a href="category.html">Pants</a>
                            </li>
                            <li><a href="category.html">Accessories</a>
                            </li>
                        </ul>

                        <hr class="hidden-md hidden-lg">

                    </div>
                    <!-- /.col-md-3 -->

                    <div class="col-md-3 col-sm-6">

                        <h4>Where to find us</h4>
						<img class="" src="{{ URL::asset('assets/img/logohm.png') }}" alt="HomemallPH logo" style="height:100px; width:100px;">
						<br>
						<br>
                        <p><strong>SYSIDE INC.</strong>
                            <br>3 Queen Street, Forest Hills
                            <br>Novaliches, Quezon City
                            <br>1117
							<br>
                            <strong>Philippines</strong>
							<br>homemallph@gmail.com
							<br>
                        </p>

                        <a href="contact.html" style="color:#ff3333">Go to contact page</a>

                        <hr class="hidden-md hidden-lg">

                    </div>
                    <!-- /.col-md-3 -->



                    <div class="col-md-3 col-sm-6">

                        <h4>Get the news and latest products!</h4>

                        <p class="text-muted">By subscribing to us you will get latest news and product trends.</p>

                        <form>
                            <div class="input-group">

                                <input type="text" class="form-control">

                                <span class="input-group-btn">

			    <button class="btn btn-default" type="button">Subscribe!</button>

			</span>

                            </div>
                            <!-- /input-group -->
                        </form>

                        <hr>

                        <h4>Stay in touch</h4>

                        <p class="social">
                            <a href="#" class="facebook external" ><i class="fa fa-facebook"></i></a>
                            <a href="#" class="twitter external" ><i class="fa fa-twitter"></i></a>
                          
                        </p>


                    </div>
                    <!-- /.col-md-3 -->

                </div>
				</div>
                <!-- /.row -->

            </div>
            <!-- /.container -->
        </div>
        <!-- /#footer -->

        <!-- *** FOOTER END *** -->




        <!-- *** COPYRIGHT ***
 _________________________________________________________ -->
        <div id="copyright">
            <div class="container">
                <div class="col-md-6">
                    <p class="pull-left">© 2015 SYSIDE Inc.</p>

                </div>
                <div class="col-md-6">
                    <p class="pull-right">Template by <a href="http://bootstrapious.com/e-commerce-templates" style="color:#ff3333">Bootstrap Ecommerce Templates</a> modified by <a href="" style="color:#ff3333">SYSIDE INC.</a> 
                        <!-- Not removing these links is part of the licence conditions of the template. Thanks for understanding :) -->
                    </p>
                </div>
            </div>
        </div>
        <!-- *** COPYRIGHT END *** -->



    </div>
    <!-- /#all -->

    <!-- *** SCRIPTS TO INCLUDE ***
 _________________________________________________________ -->
    <script src="{{ URL::asset('assets/client/js/jquery-1.11.0.min.js') }}"></script>
    <script src="{{ URL::asset('assets/client/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('assets/client/js/jquery.cookie.js') }}"></script>
    <script src="{{ URL::asset('assets/client/js/waypoints.min.js') }}"></script>
    <script src="{{ URL::asset('assets/client/js/modernizr.js') }}"></script>
    <script src="{{ URL::asset('assets/client/js/bootstrap-hover-dropdown.js') }}"></script>
    <script src="{{ URL::asset('assets/client/js/owl.carousel.min.js') }}"></script>
    <script src="{{ URL::asset('assets/client/js/front.js') }}"></script>
	<script src="{{ URL::asset('assets/client/js/jquery.unveil.js') }}"></script>
	@yield('page-script')

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
			
	$.ajaxSetup({
		headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
	});		
			
		

			

</script>

</html>