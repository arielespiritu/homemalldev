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
	<meta property="fb:app_id" content="1680023458893396"/>
	@if(isset($fb_seo_meta))
	<meta property="og:url"           content="<?php echo('http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']); ?>" />
	<meta property="og:type"          content="website" />
	<meta property="og:title"         content="{{strtoupper($fb_seo_meta['title'])}}" />
	<meta property="og:description"   content="{{$fb_seo_meta['description']}}" />
	<meta property="og:image"         content="{{ URL::asset($fb_seo_meta['image']) }}" />
	<meta property="og:image" content="http://sysidedev.com/asset/img/homemalllogo.jpg" />
	@endif
	
    <title>
       HomemallPH - @yield('title')
    </title>
	
	<meta name="_token" content="{!! csrf_token() !!}"/>
    <meta name="keywords" content="">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link href="{{ URL::asset('assets/client/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/client/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/client/css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/client/css/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/client/css/owl.theme.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/client/css/style.default.css') }}" rel="stylesheet" id="theme-stylesheet">
    <link href="{{ URL::asset('assets/client/css/custom.css') }}" rel="stylesheet">
	<link href="{{ URL::asset('assets/client/css/hover.css') }}" rel="stylesheet">
    <script src="{{ URL::asset('assets/client/js/respond.min.js') }}"></script>


</head>

 <body id="mainbody">
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5&appId=1680023458893396";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<?php
$cart_data=cartData();
?>

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
							<li><a href="/My-Account/Wishlist"><i class="fa fa-star nav-heart"></i>Wishlist</a></li>
							<li class="hidden-xs hidden-sm"><a href="/Cart"><i class="fa fa-shopping-cart nav-heart"></i>Cart&nbsp;<span class="badge" style="background:red" id="badge-cart" >{{$cart_data['datas2']}}</span></a></li>
						@endforeach
					@else
						<li><a href="/auth/login" ><i class="fa fa-user nav-user"></i>Login</a></li>
						<li><a href="/My-Account/Favorites"><i class="fa fa-heart nav-heart"></i>Favorites</a></li>
						<li><a href="/My-Account/Wishlist"><i class="fa fa-star nav-heart"></i>Wishlist</a></li>
						<li class="hidden-xs hidden-sm"><a href="/Cart"><i class="fa fa-shopping-cart cart-cart"></i>Cart&nbsp;<span class="badge" style="background:red"  id="badge-cart2">{{$cart_data['datas2']}}</span></a></li>
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
    <div class="navbar navbar-default yamm navbar-md " role="navigation" id="navbar" style="z-index:999; background:white" >
        <div class="container">
            <div class="navbar-header" >
				
				<div class="navbar-collapse collapse right" id="search-not-mobile" >
				
					<div class="col-md-2">
						<a href="/market" ><img src="{{ URL::asset('assets/img/logo-banner.png') }}" alt="homemall logo"  class="hidden-xs hidden-sm " style="z-index:1; position:absolute; left:0px  top:0px; height:130px;" id="biglogos"></a>
					</div>
					<div class="col-md-8">
							 <div class="col-md-12" style="margin-top:40px;" id="dummy-div">
							 </div>
							<div class="col-md-12 " id="popular-search">
								<ul class="navs-popular-serches">
									<b>Popular Searches :</b>
									<li><a href="/Store/1">Samsung</a></li>|
									<li><a href="/about/">Table</a></li>|
									<li><a href="/work/">T-Shirts</a></li>|
									<li><a href="/clients/">Food</a></li>
								</ul>
							</div>
							<div class="col-md-12" style="margin-top:8px;" >
								<div class="input-group" id="searchbar" style="border: 5px solid red; background:red; z-index:999;">
								  <input type="text" class="form-control flat input-danger"  placeholder="Search for...">
								  <span class="input-group-btn">
									<button class="btn btn-danger flat " type="button">Go!</button>
								  </span>
								</div>
							</div>
							 <div class="col-md-12" style="margin-top:20px;" id="dummy-div2">
							 </div>
					</div>
					<div class="col-md-2" style="margin-top:15px;display:none" id="cart-side">
						<div class="col-md-12"  >
							<a href="/Cart" style="font-size:18px;"><i class="fa fa-shopping-cart" style="color:blue "></i>Cart</a>&nbsp;&nbsp;<span class="circle-num "  id="badge-cart4">{{$cart_data['datas2']}}</span>
						</div>
					</div>
                </div>
               
                <div class="navbar-buttons" style="padding:0px;">
                    <button type="button" class="navbar-toggle btn-sm flat" data-toggle="collapse" data-target="#navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <i class="fa fa-align-justify"></i>
                    </button>
                    <a class="btn btn-default navbar-toggle btn-sm flat" href="/Cart">
                        <i class="fa fa-shopping-cart cart-cart"></i> <span class="badge"  id="badge-cart3" style="background:red">{{$cart_data['datas2']}}</span> <span class="hidden-xs"> </span>
                    </a>
                </div>
				<a href="/market" >
					<img src="{{ URL::asset('assets/img/logo-small.png') }}" alt="homemall logo" class="visible-xs" style="margin-top:10px;margin-left:13px"><span class="sr-only"></span>
				</a>

            </div>
			<form class="navbar-form navbar-toggle " id="search-toggle" role="search">
				<div class="input-group" style="padding:0px; margin-left:-10px; margin-right:-12px;">
					<input type="text" class="form-control input-xs flat" placeholder="Search">
					<span class="input-group-btn">
						<button type="submit" class="btn btn-default btn-sm flat"><i class="fa fa-search"></i></button>
					</span>
				</div>
			</form>
        </div>
		<div class="navbar-collapse collapse" id="navigation" style="background:white; margin-top:10px; alignment:center; width:100%;" >
			<div class="container" >
                <ul class="nav navbar-nav navbar-left" id="nav_menu" >
				<li ><a href="/market">Market</a></li>
			@if(isset($market_data))
				@foreach($market_data as $market_data )
					@if (count($market_data->category) > 0)
						<li class="dropdown yamm-fw">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">
							@if($market_data->id==1)
							<i class="fa fa-shopping-basket"></i> &nbsp;
							@elseif($market_data->id==2)
							<i class="fa fa-mobile"></i> &nbsp;
							@elseif($market_data->id==3)
							<i class="fa fa-shopping-bag"></i> &nbsp;
							@elseif($market_data->id==4)
							<i class="fa fa-mobile"></i> &nbsp;
							@endif
							{{$market_data->market_name}}
							<b class="caret"></b></a>
								<ul class="dropdown-menu" >
								<li>
									<div class="yamm-content">
										<div class="row">
												<div class="col-sm-12" style="padding:0px;">
													<div class="col-sm-12">
													<ul>
														<li ><a href="/{{$market_data->market_name}}/Category/All" ><h5 class="text-danger">All Categories</h5></a>
														</li>
													</ul>
													</div>
												</div>
												@if(isset($market_data->category))
													@foreach($market_data->category as $category )
														<div class="col-sm-3">
															<ul>
																<li ><a href="/{{$market_data->market_name}}/Category/{{str_replace(' ','-',$category->category_name)}}/All" >{{$category->category_name}}</a>
																</li>
															</ul>
														</div>
													@endforeach
												@endif
										</div>
									</div>
								</li>
							</ul>
						</li>
					@else
						<li ><a href="/market">{{$market_data->market_name}}</a>
						</li>
					@endif
				@endforeach
			@endif
                </ul>
			</div>
        </div>
    </div>

	
	<style>
	.sidebar-nav-fixed {
		padding: 7px 0;
		position:fixed;
		right:0px;
		top:0;
		width:40px;
		height:100%;
		z-index:1000;
		border-radius:0px;
		background:black;
		border: 0px;
	}
	.row-fluid > .span-fixed-sidebar {
		margin-left: 290px;
	}
	.side-icon{
		color:red;
		margin:auto;
		padding-top:10px; padding-bottom:10px;
	}
	.side-icon:hover{
		color:red;
	}	
	h4 span { 
		 display: block;
		 color:white;

	}
	.sidebar-nav-fixed li a:hover
	{
	color: black;
	}
	.fixed-nav-bar {
	  position: fixed;
	  top: 0;
	  left: 0;
	  z-index: 9999;
	  width: 100%;
	  height: 50px;
	  background-color: #00a087;
	}
	</style>

	<div >
	<div class="container-fluid">
	  <div class="row-fluid row">
		<div class="span3">
		  <div class="well sidebar-nav-fixed hidden-sm hidden-xs" id="sidebar">
			<ul class="nav nav-side " style="margin-top:190px; ">
			  <li><a href="/My-Account/Favorites" ><i class="fa fa-heart side-icon"></i></a></li>
			  <li><a href="/My-Account/Wishlist"><i class="fa fa-star side-icon"></i></a></li>
			</ul>
			<ul class="nav nav-side" style="">
			  <li></li>

			  <li id="back_top"><a href="#" id="back-to-top" style="bottom:0px; margin-bottom:10px; color:red; position:fixed;"><i class="fa fa-arrow-up side-icon"></i><small>TOP</small></a></li>
			</ul>
		  </div>
		  
		
		  
		  
		</div>
	  </div>
	
	</div>
	@yield('content')
	</div>	
    
 

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


</body>
<script>

		$(window).load(function(){
		itemCountCart();
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
				if ($(window).scrollTop() > 500) {
					$('#navbar').addClass('navbar-fixed-top');
					$('#back_top').show();	
					$('#nav_menu').hide();	
					$('#popular-search').hide();
					$('#dummy-div').hide();
					$('#dummy-div2').hide();
					$('#cart-side').show();
				}
				if ($(window).scrollTop() < 100) {
					$('#navbar').removeClass('navbar-fixed-top');
					$('#back_top').hide();
					$('#nav_menu').show();	
					$('#popular-search	').show();	
					$('#dummy-div').show();	
					$('#dummy-div2').show();	
					$('#biglogos').show();
					$('#cart-side').hide();				
				}
			});

			
		})
		$(window).resize(function(){
		//window.location.href=window.location.href
		})
			
	$.ajaxSetup({
		headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
	});		
			
		
	if ($('#back-to-top').length) {
		var scrollTrigger = 100, // px
			backToTop = function () {
				var scrollTop = $(window).scrollTop();
				if (scrollTop > scrollTrigger) {
					$('#back-to-top').addClass('show');
				} else {
					$('#back-to-top').removeClass('show');
				}
			};
		backToTop();
		$(window).on('scroll', function () {
			backToTop();
		});
		$('#back-to-top').on('click', function (e) {
			e.preventDefault();
			$('html,body').animate({
				scrollTop: 0
			}, 700);
		});
	}
			
	function itemCountCart(){
		try{
			var response = $.ajax({
				type: "GET",
				url: "/cart/getitemcount",
				async: false
			}).responseText;
			var datas = JSON.parse(response);
			if(datas.success==true){
				var elem1 = document.getElementsByClassName("badge-cart1");
				var elem2 = document.getElementById("badge-cart2");
				var elem3 = document.getElementById("badge-cart3");
				var elem4 = document.getElementById("badge-cart4");
				if ( elem1 ) {
				 elem1.innerHTML=datas.data;
				}
				if ( elem2 ) {
				elem2.innerHTML=datas.data;
				}
				if ( elem3 ) {
				elem3.innerHTML=datas.data;
				}
				if ( elem4) {
				elem4.innerHTML=datas.data;
				}
			}
		}catch(err){
			alert(err.message);
		}
	}	
</script>
@yield('page-script')
</html>