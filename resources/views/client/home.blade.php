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
       HomeMallPH
    </title>

    <meta name="keywords" content="">

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100' rel='stylesheet' type='text/css'>
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
<body>

    <!-- *** TOPBAR ***
 _________________________________________________________ -->  
    <div id="top" style="background:#000">
        <div class="container" >
            <div class="col-md-6 offer" data-animate="fadeInDown">
                <a href="#" class="btn btn-default btn-sm" style="color:black" >Merchant Login</a>  <a href="#">&nbsp;Be a seller now!</a>
            </div>
            <div class="col-md-6" data-animate="fadeInDown">
                <ul class="menu">
                    <li><a href="#" data-toggle="modal" data-target="#login-modal">Login</a>
                    </li>
                    <li><a href="register.html">Register</a>
                    </li>
                    <li><a href="contact.html">Contact</a>
                    </li>
                    <li><a href="#">Recently viewed</a>
                    </li>
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

    <!-- *** TOP BAR END *** -->

    <!-- *** NAVBAR ***
 _________________________________________________________ -->

    <div class="navbar navbar-default yamm navbar-md " role="navigation" id="navbar" >
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand home" href="index.html" style="padding-top:4px;">
                    <img src="{{ URL::asset('assets/img/logo.png') }}" alt="homemall logo" class="hidden-xs" style="margin-left:10px">
                    <img src="{{ URL::asset('assets/img/logo-small.png') }}" alt="homemall logo" class="visible-xs" style="margin-top:10px"><span class="sr-only">Obaju - go to homepage</span>
                </a>
                <div class="navbar-buttons">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <i class="fa fa-align-justify"></i>
                    </button>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
                        <span class="sr-only">Toggle search</span>
                        <i class="fa fa-search"></i>
                    </button>
                    <a class="btn btn-default navbar-toggle" href="basket.html">
                        <i class="fa fa-shopping-cart"></i>  <span class="hidden-xs">3 items in cart</span>
                    </a>
                </div>
            </div>
            <!--/.navbar-header -->

            <div class="navbar-collapse collapse" id="navigation" >

                <ul class="nav navbar-nav navbar-left" >
                    <li class="active"><a href="index.html">Home</a>
                    </li>
                    <li class="dropdown yamm-fw">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">Groceries <b class="caret"></b></a>
                        <ul class="dropdown-menu" >
                            <li>
                                <div class="yamm-content">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h5>Clothing</h5>
                                            <ul>
                                                <li><a href="category.html">T-shirts</a>
                                                </li>
                                                <li><a href="category.html">Shirts</a>
                                                </li>
                                                <li><a href="category.html">Pants</a>
                                                </li>
                                                <li><a href="category.html">Accessories</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-3">
                                            <h5>Shoes</h5>
                                            <ul>
                                                <li><a href="category.html">Trainers</a>
                                                </li>
                                                <li><a href="category.html">Sandals</a>
                                                </li>
                                                <li><a href="category.html">Hiking shoes</a>
                                                </li>
                                                <li><a href="category.html">Casual</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-3">
                                            <h5>Accessories</h5>
                                            <ul>
                                                <li><a href="category.html">Trainers</a>
                                                </li>
                                                <li><a href="category.html">Sandals</a>
                                                </li>
                                                <li><a href="category.html">Hiking shoes</a>
                                                </li>
                                                <li><a href="category.html">Casual</a>
                                                </li>
                                                <li><a href="category.html">Hiking shoes</a>
                                                </li>
                                                <li><a href="category.html">Casual</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-3">
                                            <h5>Featured</h5>
                                            <ul>
                                                <li><a href="category.html">Trainers</a>
                                                </li>
                                                <li><a href="category.html">Sandals</a>
                                                </li>
                                                <li><a href="category.html">Hiking shoes</a>
                                                </li>
                                            </ul>
                                            <h5>Looks and trends</h5>
                                            <ul>
                                                <li><a href="category.html">Trainers</a>
                                                </li>
                                                <li><a href="category.html">Sandals</a>
                                                </li>
                                                <li><a href="category.html">Hiking shoes</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.yamm-content -->
                            </li>
                        </ul>
                    </li>

                    <li class="dropdown yamm-fw">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">Apparel <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="yamm-content">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h5>Clothing</h5>
                                            <ul>
                                                <li><a href="category.html">T-shirts</a>
                                                </li>
                                                <li><a href="category.html">Shirts</a>
                                                </li>
                                                <li><a href="category.html">Pants</a>
                                                </li>
                                                <li><a href="category.html">Accessories</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-3">
                                            <h5>Shoes</h5>
                                            <ul>
                                                <li><a href="category.html">Trainers</a>
                                                </li>
                                                <li><a href="category.html">Sandals</a>
                                                </li>
                                                <li><a href="category.html">Hiking shoes</a>
                                                </li>
                                                <li><a href="category.html">Casual</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-3">
                                            <h5>Accessories</h5>
                                            <ul>
                                                <li><a href="category.html">Trainers</a>
                                                </li>
                                                <li><a href="category.html">Sandals</a>
                                                </li>
                                                <li><a href="category.html">Hiking shoes</a>
                                                </li>
                                                <li><a href="category.html">Casual</a>
                                                </li>
                                                <li><a href="category.html">Hiking shoes</a>
                                                </li>
                                                <li><a href="category.html">Casual</a>
                                                </li>
                                            </ul>
                                            <h5>Looks and trends</h5>
                                            <ul>
                                                <li><a href="category.html">Trainers</a>
                                                </li>
                                                <li><a href="category.html">Sandals</a>
                                                </li>
                                                <li><a href="category.html">Hiking shoes</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="banner">
                                                <a href="#">
                                                    <img src="img/banner.jpg" class="img img-responsive" alt="">
                                                </a>
                                            </div>
                                            <div class="banner">
                                                <a href="#">
                                                    <img src="img/banner2.jpg" class="img img-responsive" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.yamm-content -->
                            </li>
                        </ul>
                    </li>

                    <li class="dropdown yamm-fw">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">Gadgets <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="yamm-content">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h5>Shop</h5>
                                            <ul>
                                                <li><a href="index.html">Homepage</a>
                                                </li>
                                                <li><a href="category.html">Category - sidebar left</a>
                                                </li>
                                                <li><a href="category-right.html">Category - sidebar right</a>
                                                </li>
                                                <li><a href="category-full.html">Category - full width</a>
                                                </li>
                                                <li><a href="detail.html">Product detail</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-3">
                                            <h5>User</h5>
                                            <ul>
                                                <li><a href="register.html">Register / login</a>
                                                </li>
                                                <li><a href="customer-orders.html">Orders history</a>
                                                </li>
                                                <li><a href="customer-order.html">Order history detail</a>
                                                </li>
                                                <li><a href="customer-wishlist.html">Wishlist</a>
                                                </li>
                                                <li><a href="customer-account.html">Customer account / change password</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-3">
                                            <h5>Order process</h5>
                                            <ul>
                                                <li><a href="basket.html">Shopping cart</a>
                                                </li>
                                                <li><a href="checkout1.html">Checkout - step 1</a>
                                                </li>
                                                <li><a href="checkout2.html">Checkout - step 2</a>
                                                </li>
                                                <li><a href="checkout3.html">Checkout - step 3</a>
                                                </li>
                                                <li><a href="checkout4.html">Checkout - step 4</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-3">
                                            <h5>Pages and blog</h5>
                                            <ul>
                                                <li><a href="blog.html">Blog listing</a>
                                                </li>
                                                <li><a href="post.html">Blog Post</a>
                                                </li>
                                                <li><a href="faq.html">FAQ</a>
                                                </li>
                                                <li><a href="text.html">Text page</a>
                                                </li>
                                                <li><a href="text-right.html">Text page - right sidebar</a>
                                                </li>
                                                <li><a href="404.html">404 page</a>
                                                </li>
                                                <li><a href="contact.html">Contact</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.yamm-content -->
                            </li>
                        </ul>
                    </li>
					
					 <li class="dropdown yamm-fw">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">Furniture <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="yamm-content">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h5>Shop</h5>
                                            <ul>
                                                <li><a href="index.html">Homepage</a>
                                                </li>
                                                <li><a href="category.html">Category - sidebar left</a>
                                                </li>
                                                <li><a href="category-right.html">Category - sidebar right</a>
                                                </li>
                                                <li><a href="category-full.html">Category - full width</a>
                                                </li>
                                                <li><a href="detail.html">Product detail</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-3">
                                            <h5>User</h5>
                                            <ul>
                                                <li><a href="register.html">Register / login</a>
                                                </li>
                                                <li><a href="customer-orders.html">Orders history</a>
                                                </li>
                                                <li><a href="customer-order.html">Order history detail</a>
                                                </li>
                                                <li><a href="customer-wishlist.html">Wishlist</a>
                                                </li>
                                                <li><a href="customer-account.html">Customer account / change password</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-3">
                                            <h5>Order process</h5>
                                            <ul>
                                                <li><a href="basket.html">Shopping cart</a>
                                                </li>
                                                <li><a href="checkout1.html">Checkout - step 1</a>
                                                </li>
                                                <li><a href="checkout2.html">Checkout - step 2</a>
                                                </li>
                                                <li><a href="checkout3.html">Checkout - step 3</a>
                                                </li>
                                                <li><a href="checkout4.html">Checkout - step 4</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-3">
                                            <h5>Pages and blog</h5>
                                            <ul>
                                                <li><a href="blog.html">Blog listing</a>
                                                </li>
                                                <li><a href="post.html">Blog Post</a>
                                                </li>
                                                <li><a href="faq.html">FAQ</a>
                                                </li>
                                                <li><a href="text.html">Text page</a>
                                                </li>
                                                <li><a href="text-right.html">Text page - right sidebar</a>
                                                </li>
                                                <li><a href="404.html">404 page</a>
                                                </li>
                                                <li><a href="contact.html">Contact</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.yamm-content -->
                            </li>
                        </ul>
                    </li>
                </ul>

            </div>
            <!--/.nav-collapse -->

            <div class="navbar-buttons" style="padding:0px;">

                <div class="navbar-collapse collapse right" id="basket-overview"  >
                    <a href="basket.html" class="btn btn-default navbar-btn btn-sm flat" style="margin-right:10px"><i class="fa fa-shopping-cart"></i><span class="hidden-sm" >3 items in cart</span></a>
                </div>
                <!--/.nav-collapse -->

                <div class="navbar-collapse collapse right" id="search-not-mobile" >
                    <button type="button" class="btn navbar-btn btn-default  btn-sm flat" data-toggle="collapse" data-target="#search">
                        <span class="sr-only">Toggle search</span>
                        <i class="fa fa-search"></i>
                    </button>
                </div>

            </div>

            <div class="collapse clearfix" id="search">

                <form class="navbar-form" role="search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search">
                        <span class="input-group-btn">

			<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>

		    </span>
                    </div>
                </form>

            </div>
            <!--/.nav-collapse -->

        </div>
        <!-- /.container -->
    </div>
    <!-- /#navbar -->

    <!-- *** NAVBAR END *** -->

    <div id="all">
	
			<div id="main-slider" >
					<div class="item" style="background:#da0b5e; padding:20px; " >
						<center><img src="{{ URL::asset('assets/img/banner1.png') }}" alt="" class="img-responsive"></center>
					</div>
					<div class="item" style="padding:20px; " >
						<center><img class="img-responsive" src="{{ URL::asset('assets/img/banner2.png') }}" alt=""></center>
					</div>	
			 </div>
		 </div>
    
                   
               
            <!-- *** ADVANTAGES HOMEPAGE ***
 _________________________________________________________ -->
 
					
				
 
            <div id="advantages" >
                <div class="container">
                        <div class="col-sm-12 market" data-animate="fadeInUp">
							<div id="textbox">
							  <h4 class="alignleft">Grocery</h4>
							  <a  href="" class="alignright">See more</a>
							</div>
							<div style="clear: both;"></div>
							<div class="col-sm-3 same-height-row" style="padding:0px">
								<div class="col-sm-12 market-logo" >
									 <center><img class="img-responsive" src="{{ URL::asset('assets/img/market/grocery.png') }}" alt=""></center>
								</div>
							</div>
							<div class="col-sm-9 same-height-row" style="padding:0px">
								<div class="col-sm-4 store-logo" >
									<div class="wraptocenter"><span></span><img src="{{ URL::asset('assets/img/store/store1.png') }}" alt="..."></div>
									
								</div>
								<div class="col-sm-4 store-logo" >
									<div class="wraptocenter"><span></span><img src="{{ URL::asset('assets/img/store/store2.png') }}" alt="..."></div>
								</div>
								<div class="col-sm-4 store-logo" >
									<div class="wraptocenter"><span></span><img src="{{ URL::asset('assets/img/store/store3.jpg') }}" alt="..."></div>
								</div>
								<div class="col-sm-4 store-logo" >
									<div class="wraptocenter"><span></span><img src="{{ URL::asset('assets/img/store/store4.png') }}" alt="..."></div>
								</div>
								<div class="col-sm-4 store-logo" >
									<div class="wraptocenter"><span></span><img src="{{ URL::asset('assets/img/store/store6.png') }}" alt="..."></div>
								</div>
								<div class="col-sm-4 store-logo" >
									<div class="wraptocenter"><span></span><img src="{{ URL::asset('assets/img/store/store7.jpg') }}" alt="..."></div>
								</div>
								<div class="col-sm-4 store-logo" >
									<div class="wraptocenter"><span></span><img src="{{ URL::asset('assets/img/store/store4.png') }}" alt="..."></div>
								</div>
								<div class="col-sm-4 store-logo" >
									<div class="wraptocenter"><span></span><img src="{{ URL::asset('assets/img/store/store6.png') }}" alt="..."></div>
								</div>
								<div class="col-sm-4 store-logo" >
									<div class="wraptocenter"><span></span><img src="{{ URL::asset('assets/img/store/store7.jpg') }}" alt="..."></div>
								</div>							
							</div>

                        </div>
                    <!-- /.row -->
                </div>
                <!-- /.container -->
				
				  <div class="container">
                        <div class="col-sm-12 market" data-animate="fadeInUp">
							<div id="textbox">
							  <h4 class="alignleft">Furniture</h4>
							  <a  href="" class="alignright">See more</a>
							</div>
							<div style="clear: both;"></div>
							<div class="col-sm-3 same-height-row" style="padding:0px">
								<div class="col-sm-12 market-logo" >
									 <center><img class="img-responsive" src="{{ URL::asset('assets/img/market/furniture.png') }}" alt=""></center>
								</div>
							</div>
							<div class="col-sm-9 same-height-row" style="padding:0px">							
								<div class="col-sm-4 store-logo" >
									<div class="wraptocenter"><span></span><img src="{{ URL::asset('assets/img/store/store1.png') }}" alt="..."></div>
								</div>
								<div class="col-sm-4 store-logo" >
									<div class="wraptocenter"><span></span><img src="{{ URL::asset('assets/img/store/store2.png') }}" alt="..."></div>
								</div>
								<div class="col-sm-4 store-logo" >
									<div class="wraptocenter"><span></span><img src="{{ URL::asset('assets/img/store/store3.jpg') }}" alt="..."></div>
								</div>
								<div class="col-sm-4 store-logo" >
									<div class="wraptocenter"><span></span><img src="{{ URL::asset('assets/img/store/store4.png') }}" alt="..."></div>
								</div>
								<div class="col-sm-4 store-logo" >
									<div class="wraptocenter"><span></span><img src="{{ URL::asset('assets/img/store/store6.png') }}" alt="..."></div>
								</div>
								<div class="col-sm-4 store-logo" >
									<div class="wraptocenter"><span></span><img src="{{ URL::asset('assets/img/store/store7.jpg') }}" alt="..."></div>
								</div>
								<div class="col-sm-4 store-logo" >
									<div class="wraptocenter"><span></span><img src="{{ URL::asset('assets/img/store/store4.png') }}" alt="..."></div>
								</div>
								<div class="col-sm-4 store-logo" >
									<div class="wraptocenter"><span></span><img src="{{ URL::asset('assets/img/store/store6.png') }}" alt="..."></div>
								</div>
								<div class="col-sm-4 store-logo" >
									<div class="wraptocenter"><span></span><img src="{{ URL::asset('assets/img/store/store7.jpg') }}" alt="..."></div>
								</div>	
							</div>


                        </div>
                    <!-- /.row -->
                </div>
                <!-- /.container -->
				
				 <div class="container">
                        <div class="col-sm-12 market" data-animate="fadeInUp">
							<div id="textbox">
							  <h4 class="alignleft">Gadgets</h4>
							  <a  href="" class="alignright">See more</a>
							</div>
							<div style="clear: both;"></div>
							<div class="col-sm-3 same-height-row" style="padding:0px">
								<div class="col-sm-12 market-logo" >
									 <center><img class="img-responsive" src="{{ URL::asset('assets/img/market/gadgets.png') }}" alt=""></center>
								</div>
							</div>
							<div class="col-sm-9 same-height-row" style="padding:0px">							
								<div class="col-sm-4 store-logo" >
									<div class="wraptocenter"><span></span><img src="{{ URL::asset('assets/img/store/store1.png') }}" alt="..."></div>
								</div>
								<div class="col-sm-4 store-logo" >
									<div class="wraptocenter"><span></span><img src="{{ URL::asset('assets/img/store/store2.png') }}" alt="..."></div>
								</div>
								<div class="col-sm-4 store-logo" >
									<div class="wraptocenter"><span></span><img src="{{ URL::asset('assets/img/store/store3.jpg') }}" alt="..."></div>
								</div>
								<div class="col-sm-4 store-logo" >
									<div class="wraptocenter"><span></span><img src="{{ URL::asset('assets/img/store/store4.png') }}" alt="..."></div>
								</div>
								<div class="col-sm-4 store-logo" >
									<div class="wraptocenter"><span></span><img src="{{ URL::asset('assets/img/store/store6.png') }}" alt="..."></div>
								</div>
								<div class="col-sm-4 store-logo" >
									<div class="wraptocenter"><span></span><img src="{{ URL::asset('assets/img/store/store7.jpg') }}" alt="..."></div>
								</div>
								<div class="col-sm-4 store-logo" >
									<div class="wraptocenter"><span></span><img src="{{ URL::asset('assets/img/store/store4.png') }}" alt="..."></div>
								</div>
								<div class="col-sm-4 store-logo" >
									<div class="wraptocenter"><span></span><img src="{{ URL::asset('assets/img/store/store6.png') }}" alt="..."></div>
								</div>
								<div class="col-sm-4 store-logo" >
									<div class="wraptocenter"><span></span><img src="{{ URL::asset('assets/img/store/store7.jpg') }}" alt="..."></div>
								</div>	
							</div>


                        </div>
                    <!-- /.row -->
                </div>
                <!-- /.container -->
				
				 <div class="container">
                        <div class="col-sm-12 market" data-animate="fadeInUp" >
							<div id="textbox" >
							  <h4 class="alignleft">Apparel</h4>
							  <a  href="" class="alignright">See more</a>
							</div>
							<div style="clear: both;"></div>
							<div class="col-sm-3 same-height-row" style="padding:0px">
								<div class="col-sm-12 market-logo" >
									 <center><img class="img-responsive" src="{{ URL::asset('assets/img/market/apparel.png') }}" alt=""></center>
								</div>
							</div>
							<div class="col-sm-9 same-height-row" style="padding:0px">							
								<div class="col-sm-4 store-logo ">
									<div class="wraptocenter"><span></span><img src="{{ URL::asset('assets/img/store/store1.png') }}" alt="..." ></div>
								</div>
								<div class="col-sm-4 store-logo" >
									<div class="wraptocenter"><span></span><img src="{{ URL::asset('assets/img/store/store2.png') }}" alt="..."></div>
								</div>
								<div class="col-sm-4 store-logo" >
									<div class="wraptocenter"><span></span><img src="{{ URL::asset('assets/img/store/store3.jpg') }}" alt="..."></div>
								</div>
								<div class="col-sm-4 store-logo" >
									<div class="wraptocenter"><span></span><img src="{{ URL::asset('assets/img/store/store4.png') }}" alt="..."></div>
								</div>
								<div class="col-sm-4 store-logo" >
									<div class="wraptocenter"><span></span><img src="{{ URL::asset('assets/img/store/store6.png') }}" alt="..."></div>
								</div>
								<div class="col-sm-4 store-logo" >
									<div class="wraptocenter"><span></span><img src="{{ URL::asset('assets/img/store/store7.jpg') }}" alt="..."></div>
								</div>
								<div class="col-sm-4 store-logo" >
									<div class="wraptocenter"><span></span><img src="{{ URL::asset('assets/img/store/store4.png') }}" alt="..."></div>
								</div>
								<div class="col-sm-4 store-logo" >
									<div class="wraptocenter"><span></span><img src="{{ URL::asset('assets/img/store/store6.png') }}" alt="..."></div>
								</div>
								<div class="col-sm-4 store-logo" >
									<div class="wraptocenter"><span></span><img src="{{ URL::asset('assets/img/store/store7.jpg') }}" alt="..."></div>
								</div>	
							</div>


                        </div>
                    <!-- /.row -->
                </div>
                <!-- /.container -->
				
				
				
            </div>
         
            <!-- ____________________________________________________________ -->
        <div id="hot">
                <div class="box"  style="background:#f6ecb7; padding:0px; margin-top:70px;  margin-bottom:0px;">
                    <center><img class="img-responsive" style="margin-top:-80px;" src="{{ URL::asset('assets/img/market/grocery-add.png') }}" alt=""></center>
                </div>
				
				<div class="container">
                    <div class="col-sm-12" style="padding:0px" data-animate="fadeInUp">
                        <div class="col-sm-3" style="padding:10px">
                            <div class="box">
                                 <center><img class="img-responsive" src="{{ URL::asset('assets/img/category/grocery/breads.png') }}" alt=""></center>
								<div class="list-group" style="margin-bottom:0px; border-radius: 0px 0px 0px 0px;" >
								  <a href="#" class="list-group-item category-products" >
									<img class="alignleft" src="{{ URL::asset('assets/img/store/samplestore/product/1.jpg') }}" alt="..." >
									<h5 class="list-group-item-heading">Product Name</h5>
									<p class="list-group-item-text">P 100.00</p>
								  </a>
								  <a href="#" class="list-group-item category-products" >
									<img class="alignleft" src="{{ URL::asset('assets/img/store/samplestore/product/1.jpg') }}" alt="..." >
									<h5 class="list-group-item-heading">Product Name</h5>
									<p class="list-group-item-text">P 100.00</p>
								  </a>
								   <a href="#" class="list-group-item category-products" >
									<img class="alignleft" src="{{ URL::asset('assets/img/store/samplestore/product/1.jpg') }}" alt="..." >
									<h5 class="list-group-item-heading">Product Name</h5>
									<p class="list-group-item-text">P 100.00</p>
									
								  </a>
								</div>
                            </div>
                        </div>
						<div class="col-sm-3" style="padding:10px">
                            <div class="box">
                                  <center><img class="img-responsive" src="{{ URL::asset('assets/img/category/grocery/fruits.png') }}" alt=""></center>
								  <div class="list-group" style="margin-bottom:0px; border-radius: 0px 0px 0px 0px;" >
								  <a href="#" class="list-group-item category-products" >
									<img class="alignleft" src="{{ URL::asset('assets/img/store/samplestore/product/1.jpg') }}" alt="..." >
									<h5 class="list-group-item-heading">Product Name</h5>
									<p class="list-group-item-text">P 100.00</p>
								  </a>
								  <a href="#" class="list-group-item category-products" >
									<img class="alignleft" src="{{ URL::asset('assets/img/store/samplestore/product/1.jpg') }}" alt="..." >
									<h5 class="list-group-item-heading">Product Name</h5>
									<p class="list-group-item-text">P 100.00</p>
								  </a>
								   <a href="#" class="list-group-item category-products" >
									<img class="alignleft" src="{{ URL::asset('assets/img/store/samplestore/product/1.jpg') }}" alt="..." >
									<h5 class="list-group-item-heading">Product Name</h5>
									<p class="list-group-item-text">P 100.00</p>
									
								  </a>
								</div>
                            </div>
                        </div>
						<div class="col-sm-3" style="padding:10px">
                            <div class="box">
                                  <center><img class="img-responsive" src="{{ URL::asset('assets/img/category/grocery/condiments.png') }}" alt=""></center>
								  <div class="list-group" style="margin-bottom:0px; border-radius: 0px 0px 0px 0px;" >
								  <a href="#" class="list-group-item category-products" >
									<img class="alignleft" src="{{ URL::asset('assets/img/store/samplestore/product/1.jpg') }}" alt="..." >
									<h5 class="list-group-item-heading">Product Name</h5>
									<p class="list-group-item-text">P 100.00</p>
								  </a>
								  <a href="#" class="list-group-item category-products" >
									<img class="alignleft" src="{{ URL::asset('assets/img/store/samplestore/product/1.jpg') }}" alt="..." >
									<h5 class="list-group-item-heading">Product Name</h5>
									<p class="list-group-item-text">P 100.00</p>
								  </a>
								   <a href="#" class="list-group-item category-products" >
									<img class="alignleft" src="{{ URL::asset('assets/img/store/samplestore/product/1.jpg') }}" alt="..." >
									<h5 class="list-group-item-heading">Product Name</h5>
									<p class="list-group-item-text">P 100.00</p>
									
								  </a>
								</div>
                            </div>
                        </div>
						<div class="col-sm-3" style="padding:10px">
                            <div class="box">
                                  <center><img class="img-responsive" src="{{ URL::asset('assets/img/category/grocery/beverages.png') }}" alt=""></center>
								  <div class="list-group" style="margin-bottom:0px; border-radius: 0px 0px 0px 0px;" >
								  <a href="#" class="list-group-item category-products" >
									<img class="alignleft" src="{{ URL::asset('assets/img/store/samplestore/product/1.jpg') }}" alt="..." >
									<h5 class="list-group-item-heading">Product Name</h5>
									<p class="list-group-item-text">P 100.00</p>
								  </a>
								  <a href="#" class="list-group-item category-products" >
									<img class="alignleft" src="{{ URL::asset('assets/img/store/samplestore/product/1.jpg') }}" alt="..." >
									<h5 class="list-group-item-heading">Product Name</h5>
									<p class="list-group-item-text">P 100.00</p>
								  </a>
								   <a href="#" class="list-group-item category-products" >
									<img class="alignleft" src="{{ URL::asset('assets/img/store/samplestore/product/1.jpg') }}" alt="..." >
									<h5 class="list-group-item-heading">Product Name</h5>
									<p class="list-group-item-text">P 100.00</p>
									
								  </a>
								</div>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container -->
				
				<div class="box"  style="background:#103f71; padding:0px; margin-top:50px; margin-bottom:0px; ">
                    <center><img class="img-responsive" style="margin-top:-80px;" src="{{ URL::asset('assets/img/market/furniture-add.png') }}" alt=""></center>
                </div>
				
				<div class="container">
                    <div class="col-sm-12" style="padding:0px" data-animate="fadeInUp">
                        <div class="col-sm-3" style="padding:10px">
                            <div class="box" >
                                 <center><img class="img-responsive" src="{{ URL::asset('assets/img/category/furniture/Bed.png') }}" alt=""></center>
								   <div class="list-group" style="margin-bottom:0px; border-radius: 0px 0px 0px 0px;" >
								  <a href="#" class="list-group-item category-products" >
									<img class="alignleft" src="{{ URL::asset('assets/img/store/samplestore/product/1.jpg') }}" alt="..." >
									<h5 class="list-group-item-heading">Product Name</h5>
									<p class="list-group-item-text">P 100.00</p>
								  </a>
								  <a href="#" class="list-group-item category-products" >
									<img class="alignleft" src="{{ URL::asset('assets/img/store/samplestore/product/1.jpg') }}" alt="..." >
									<h5 class="list-group-item-heading">Product Name</h5>
									<p class="list-group-item-text">P 100.00</p>
								  </a>
								   <a href="#" class="list-group-item category-products" >
									<img class="alignleft" src="{{ URL::asset('assets/img/store/samplestore/product/1.jpg') }}" alt="..." >
									<h5 class="list-group-item-heading">Product Name</h5>
									<p class="list-group-item-text">P 100.00</p>
									
								  </a>
								</div>
                            </div>
                        </div>
						<div class="col-sm-3" style="padding:10px">
                            <div class="box">
                                  <center><img class="img-responsive" src="{{ URL::asset('assets/img/category/furniture/Dining.png') }}" alt=""></center>
								    <div class="list-group" style="margin-bottom:0px; border-radius: 0px 0px 0px 0px;" >
								  <a href="#" class="list-group-item category-products" >
									<img class="alignleft" src="{{ URL::asset('assets/img/store/samplestore/product/1.jpg') }}" alt="..." >
									<h5 class="list-group-item-heading">Product Name</h5>
									<p class="list-group-item-text">P 100.00</p>
								  </a>
								  <a href="#" class="list-group-item category-products" >
									<img class="alignleft" src="{{ URL::asset('assets/img/store/samplestore/product/1.jpg') }}" alt="..." >
									<h5 class="list-group-item-heading">Product Name</h5>
									<p class="list-group-item-text">P 100.00</p>
								  </a>
								   <a href="#" class="list-group-item category-products" >
									<img class="alignleft" src="{{ URL::asset('assets/img/store/samplestore/product/1.jpg') }}" alt="..." >
									<h5 class="list-group-item-heading">Product Name</h5>
									<p class="list-group-item-text">P 100.00</p>
									
								  </a>
								</div>
                            </div>
                        </div>
						<div class="col-sm-3" style="padding:10px">
                            <div class="box">
                                  <center><img class="img-responsive" src="{{ URL::asset('assets/img/category/furniture/HomeDecor.png') }}" alt=""></center>
								    <div class="list-group" style="margin-bottom:0px; border-radius: 0px 0px 0px 0px;" >
								  <a href="#" class="list-group-item category-products" >
									<img class="alignleft" src="{{ URL::asset('assets/img/store/samplestore/product/1.jpg') }}" alt="..." >
									<h5 class="list-group-item-heading">Product Name</h5>
									<p class="list-group-item-text">P 100.00</p>
								  </a>
								  <a href="#" class="list-group-item category-products" >
									<img class="alignleft" src="{{ URL::asset('assets/img/store/samplestore/product/1.jpg') }}" alt="..." >
									<h5 class="list-group-item-heading">Product Name</h5>
									<p class="list-group-item-text">P 100.00</p>
								  </a>
								   <a href="#" class="list-group-item category-products" >
									<img class="alignleft" src="{{ URL::asset('assets/img/store/samplestore/product/1.jpg') }}" alt="..." >
									<h5 class="list-group-item-heading">Product Name</h5>
									<p class="list-group-item-text">P 100.00</p>
									
								  </a>
								</div>
                            </div>
                        </div>
						<div class="col-sm-3" style="padding:10px">
                            <div class="box">
                                  <center><img class="img-responsive" src="{{ URL::asset('assets/img/category/furniture/Sofa.png') }}" alt=""></center>
								    <div class="list-group" style="margin-bottom:0px; border-radius: 0px 0px 0px 0px;" >
								  <a href="#" class="list-group-item category-products" >
									<img class="alignleft" src="{{ URL::asset('assets/img/store/samplestore/product/1.jpg') }}" alt="..." >
									<h5 class="list-group-item-heading">Product Name</h5>
									<p class="list-group-item-text">P 100.00</p>
								  </a>
								  <a href="#" class="list-group-item category-products" >
									<img class="alignleft" src="{{ URL::asset('assets/img/store/samplestore/product/1.jpg') }}" alt="..." >
									<h5 class="list-group-item-heading">Product Name</h5>
									<p class="list-group-item-text">P 100.00</p>
								  </a>
								   <a href="#" class="list-group-item category-products" >
									<img class="alignleft" src="{{ URL::asset('assets/img/store/samplestore/product/1.jpg') }}" alt="..." >
									<h5 class="list-group-item-heading">Product Name</h5>
									<p class="list-group-item-text">P 100.00</p>
									
								  </a>
								</div>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container -->
				
                <div class="box"  style="background:#ca27f4; padding:0px; margin-top:50px;  margin-bottom:0px;">
                    <center><img class="img-responsive" style="margin-top:-80px;" src="{{ URL::asset('assets/img/market/apparel-add.png') }}" alt=""></center>
                </div>
				<div class="container">
                    <div class="col-sm-12" style="padding:0px" data-animate="fadeInUp">
                        <div class="col-sm-3" style="padding:10px">
                            <div class="box" >
                                 <center><img class="img-responsive" src="{{ URL::asset('assets/img/category/apparel/MensPolo.png') }}" alt=""></center>
								   <div class="list-group" style="margin-bottom:0px; border-radius: 0px 0px 0px 0px;" >
								  <a href="#" class="list-group-item category-products" >
									<img class="alignleft" src="{{ URL::asset('assets/img/store/samplestore/product/1.jpg') }}" alt="..." >
									<h5 class="list-group-item-heading">Product Name</h5>
									<p class="list-group-item-text">P 100.00</p>
								  </a>
								  <a href="#" class="list-group-item category-products" >
									<img class="alignleft" src="{{ URL::asset('assets/img/store/samplestore/product/1.jpg') }}" alt="..." >
									<h5 class="list-group-item-heading">Product Name</h5>
									<p class="list-group-item-text">P 100.00</p>
								  </a>
								   <a href="#" class="list-group-item category-products" >
									<img class="alignleft" src="{{ URL::asset('assets/img/store/samplestore/product/1.jpg') }}" alt="..." >
									<h5 class="list-group-item-heading">Product Name</h5>
									<p class="list-group-item-text">P 100.00</p>
									
								  </a>
								</div>
                            </div>
                        </div>
						<div class="col-sm-3" style="padding:10px">
                            <div class="box">
                                  <center><img class="img-responsive" src="{{ URL::asset('assets/img/category/apparel/MensWatches.png') }}" alt=""></center>
								    <div class="list-group" style="margin-bottom:0px; border-radius: 0px 0px 0px 0px;" >
								  <a href="#" class="list-group-item category-products" >
									<img class="alignleft" src="{{ URL::asset('assets/img/store/samplestore/product/1.jpg') }}" alt="..." >
									<h5 class="list-group-item-heading">Product Name</h5>
									<p class="list-group-item-text">P 100.00</p>
								  </a>
								  <a href="#" class="list-group-item category-products" >
									<img class="alignleft" src="{{ URL::asset('assets/img/store/samplestore/product/1.jpg') }}" alt="..." >
									<h5 class="list-group-item-heading">Product Name</h5>
									<p class="list-group-item-text">P 100.00</p>
								  </a>
								   <a href="#" class="list-group-item category-products" >
									<img class="alignleft" src="{{ URL::asset('assets/img/store/samplestore/product/1.jpg') }}" alt="..." >
									<h5 class="list-group-item-heading">Product Name</h5>
									<p class="list-group-item-text">P 100.00</p>
									
								  </a>
								</div>
                            </div>
                        </div>
						<div class="col-sm-3" style="padding:10px">
                            <div class="box">
                                  <center><img class="img-responsive" src="{{ URL::asset('assets/img/category/apparel/WomensClothes.png') }}" alt=""></center>
								    <div class="list-group" style="margin-bottom:0px; border-radius: 0px 0px 0px 0px;" >
								  <a href="#" class="list-group-item category-products" >
									<img class="alignleft" src="{{ URL::asset('assets/img/store/samplestore/product/1.jpg') }}" alt="..." >
									<h5 class="list-group-item-heading">Product Name</h5>
									<p class="list-group-item-text">P 100.00</p>
								  </a>
								  <a href="#" class="list-group-item category-products" >
									<img class="alignleft" src="{{ URL::asset('assets/img/store/samplestore/product/1.jpg') }}" alt="..." >
									<h5 class="list-group-item-heading">Product Name</h5>
									<p class="list-group-item-text">P 100.00</p>
								  </a>
								   <a href="#" class="list-group-item category-products" >
									<img class="alignleft" src="{{ URL::asset('assets/img/store/samplestore/product/1.jpg') }}" alt="..." >
									<h5 class="list-group-item-heading">Product Name</h5>
									<p class="list-group-item-text">P 100.00</p>
									
								  </a>
								</div>
                            </div>
                        </div>
						<div class="col-sm-3" style="padding:10px">
                            <div class="box">
                                  <center><img class="img-responsive" src="{{ URL::asset('assets/img/category/apparel/WomensFootwear.png') }}" alt=""></center>
								    <div class="list-group" style="margin-bottom:0px; border-radius: 0px 0px 0px 0px;" >
								  <a href="#" class="list-group-item category-products" >
									<img class="alignleft" src="{{ URL::asset('assets/img/store/samplestore/product/1.jpg') }}" alt="..." >
									<h5 class="list-group-item-heading">Product Name</h5>
									<p class="list-group-item-text">P 100.00</p>
								  </a>
								  <a href="#" class="list-group-item category-products" >
									<img class="alignleft" src="{{ URL::asset('assets/img/store/samplestore/product/1.jpg') }}" alt="..." >
									<h5 class="list-group-item-heading">Product Name</h5>
									<p class="list-group-item-text">P 100.00</p>
								  </a>
								   <a href="#" class="list-group-item category-products" >
									<img class="alignleft" src="{{ URL::asset('assets/img/store/samplestore/product/1.jpg') }}" alt="..." >
									<h5 class="list-group-item-heading">Product Name</h5>
									<p class="list-group-item-text">P 100.00</p>
									
								  </a>
								</div>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container -->
				
			<div class="box"  style="background:#4a79f5; padding:0px; margin-top:50px;  margin-bottom:0px;">
                    <center><img class="img-responsive" style="margin-top:-84px;" src="{{ URL::asset('assets/img/market/gadgets-add.png') }}" alt=""></center>
                </div>
				<div class="container">
                    <div class="col-sm-12" style="padding:0px" data-animate="fadeInUp">
                        <div class="col-sm-3" style="padding:10px">
                            <div class="box" >
                                 <center><img class="img-responsive" src="{{ URL::asset('assets/img/category/gadget/Cameras.png') }}" alt=""></center>
								   <div class="list-group" style="margin-bottom:0px; border-radius: 0px 0px 0px 0px;" >
								  <a href="#" class="list-group-item category-products" >
									<img class="alignleft" src="{{ URL::asset('assets/img/store/samplestore/product/1.jpg') }}" alt="..." >
									<h5 class="list-group-item-heading">Product Name</h5>
									<p class="list-group-item-text">P 100.00</p>
								  </a>
								  <a href="#" class="list-group-item category-products" >
									<img class="alignleft" src="{{ URL::asset('assets/img/store/samplestore/product/1.jpg') }}" alt="..." >
									<h5 class="list-group-item-heading">Product Name</h5>
									<p class="list-group-item-text">P 100.00</p>
								  </a>
								   <a href="#" class="list-group-item category-products" >
									<img class="alignleft" src="{{ URL::asset('assets/img/store/samplestore/product/1.jpg') }}" alt="..." >
									<h5 class="list-group-item-heading">Product Name</h5>
									<p class="list-group-item-text">P 100.00</p>
									
								  </a>
								</div>
                            </div>
                        </div>
						<div class="col-sm-3" style="padding:10px">
                            <div class="box">
                                  <center><img class="img-responsive" src="{{ URL::asset('assets/img/category/gadget/Laptop.png') }}" alt=""></center>
								    <div class="list-group" style="margin-bottom:0px; border-radius: 0px 0px 0px 0px;" >
								  <a href="#" class="list-group-item category-products" >
									<img class="alignleft" src="{{ URL::asset('assets/img/store/samplestore/product/1.jpg') }}" alt="..." >
									<h5 class="list-group-item-heading">Product Name</h5>
									<p class="list-group-item-text">P 100.00</p>
								  </a>
								  <a href="#" class="list-group-item category-products" >
									<img class="alignleft" src="{{ URL::asset('assets/img/store/samplestore/product/1.jpg') }}" alt="..." >
									<h5 class="list-group-item-heading">Product Name</h5>
									<p class="list-group-item-text">P 100.00</p>
								  </a>
								   <a href="#" class="list-group-item category-products" >
									<img class="alignleft" src="{{ URL::asset('assets/img/store/samplestore/product/1.jpg') }}" alt="..." >
									<h5 class="list-group-item-heading">Product Name</h5>
									<p class="list-group-item-text">P 100.00</p>
									
								  </a>
								</div>
                            </div>
                        </div>
						<div class="col-sm-3" style="padding:10px">
                            <div class="box">
                                  <center><img class="img-responsive" src="{{ URL::asset('assets/img/category/gadget/Mobile.png') }}" alt=""></center>
								    <div class="list-group" style="margin-bottom:0px; border-radius: 0px 0px 0px 0px;" >
								  <a href="#" class="list-group-item category-products" >
									<img class="alignleft" src="{{ URL::asset('assets/img/store/samplestore/product/1.jpg') }}" alt="..." >
									<h5 class="list-group-item-heading">Product Name</h5>
									<p class="list-group-item-text">P 100.00</p>
								  </a>
								  <a href="#" class="list-group-item category-products" >
									<img class="alignleft" src="{{ URL::asset('assets/img/store/samplestore/product/1.jpg') }}" alt="..." >
									<h5 class="list-group-item-heading">Product Name</h5>
									<p class="list-group-item-text">P 100.00</p>
								  </a>
								   <a href="#" class="list-group-item category-products" >
									<img class="alignleft" src="{{ URL::asset('assets/img/store/samplestore/product/1.jpg') }}" alt="..." >
									<h5 class="list-group-item-heading">Product Name</h5>
									<p class="list-group-item-text">P 100.00</p>
									
								  </a>
								</div>
                            </div>
                        </div>
						<div class="col-sm-3" style="padding:10px">
                            <div class="box">
                                  <center><img class="img-responsive" src="{{ URL::asset('assets/img/category/gadget/MobileAccessories.png') }}" alt=""></center>
								    <div class="list-group" style="margin-bottom:0px; border-radius: 0px 0px 0px 0px;" >
								  <a href="#" class="list-group-item category-products" >
									<img class="alignleft" src="{{ URL::asset('assets/img/store/samplestore/product/1.jpg') }}" alt="..." >
									<h5 class="list-group-item-heading">Product Name</h5>
									<p class="list-group-item-text">P 100.00</p>
								  </a>
								  <a href="#" class="list-group-item category-products" >
									<img class="alignleft" src="{{ URL::asset('assets/img/store/samplestore/product/1.jpg') }}" alt="..." >
									<h5 class="list-group-item-heading">Product Name</h5>
									<p class="list-group-item-text">P 100.00</p>
								  </a>
								   <a href="#" class="list-group-item category-products" >
									<img class="alignleft" src="{{ URL::asset('assets/img/store/samplestore/product/1.jpg') }}" alt="..." >
									<h5 class="list-group-item-heading">Product Name</h5>
									<p class="list-group-item-text">P 100.00</p>
									
								  </a>
								</div>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container -->
            <!-- *** GET INSPIRED ***
 _________________________________________________________ -->
            <div class="container" data-animate="fadeInUpBig">
                <div class="col-md-12">
                    <div class="box slideshow">
                        <h3>Get Inspired</h3>
                        <p class="lead">Get the inspiration from our world class designers</p>
                        <div id="get-inspired" class="owl-carousel owl-theme">
                            <div class="item">
                                <a href="#">
                                    <img src="img/getinspired1.jpg" alt="Get inspired" class="img-responsive">
                                </a>
                            </div>
                            <div class="item">
                                <a href="#">
                                    <img src="img/getinspired2.jpg" alt="Get inspired" class="img-responsive">
                                </a>
                            </div>
                            <div class="item">
                                <a href="#">
                                    <img src="img/getinspired3.jpg" alt="Get inspired" class="img-responsive">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- *** GET INSPIRED END *** -->

            <!-- *** BLOG HOMEPAGE ***
 _________________________________________________________ -->

            <div class="box text-center" data-animate="fadeInUp">
                <div class="container">
                    <div class="col-md-12">
                        <h3 class="text-uppercase">From our blog</h3>

                        <p class="lead">What's new in the world of fashion? <a href="blog.html">Check our blog!</a>
                        </p>
                    </div>
                </div>
            </div>

            

            <!-- *** BLOG HOMEPAGE END *** -->


        </div>
        <!-- /#content -->

        <!-- *** FOOTER ***
 _________________________________________________________ -->
        <div id="footer" data-animate="fadeInUp">
            <div class="container">
                <div class="row">
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
                            <li><a href="#" data-toggle="modal" data-target="#login-modal">Login</a>
                            </li>
                            <li><a href="register.html">Regiter</a>
                            </li>
                        </ul>

                        <hr class="hidden-md hidden-lg hidden-sm">

                    </div>
                    <!-- /.col-md-3 -->

                    <div class="col-md-3 col-sm-6">

                        <h4>Top categories</h4>

                        <h5>Men</h5>

                        <ul>
                            <li><a href="category.html">T-shirts</a>
                            </li>
                            <li><a href="category.html">Shirts</a>
                            </li>
                            <li><a href="category.html">Accessories</a>
                            </li>
                        </ul>

                        <h5>Ladies</h5>
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

                        <p><strong>Obaju Ltd.</strong>
                            <br>13/25 New Avenue
                            <br>New Heaven
                            <br>45Y 73J
                            <br>England
                            <br>
                            <strong>Great Britain</strong>
                        </p>

                        <a href="contact.html">Go to contact page</a>

                        <hr class="hidden-md hidden-lg">

                    </div>
                    <!-- /.col-md-3 -->



                    <div class="col-md-3 col-sm-6">

                        <h4>Get the news</h4>

                        <p class="text-muted">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>

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
                            <a href="#" class="facebook external" data-animate-hover="shake"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="twitter external" data-animate-hover="shake"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="instagram external" data-animate-hover="shake"><i class="fa fa-instagram"></i></a>
                            <a href="#" class="gplus external" data-animate-hover="shake"><i class="fa fa-google-plus"></i></a>
                            <a href="#" class="email external" data-animate-hover="shake"><i class="fa fa-envelope"></i></a>
                        </p>


                    </div>
                    <!-- /.col-md-3 -->

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
                    <p class="pull-right">Template by <a href="http://bootstrapious.com/e-commerce-templates">Bootstrap Ecommerce Templates</a> with support from <a href="http://kakusei.cz">Designové předměty</a> 
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
			
			
			 $(window).scroll(function () { 

				console.log($(window).scrollTop());

				if ($(window).scrollTop() > 550) {
				  $('#navbar').addClass('navbar-fixed-top');
				}

				if ($(window).scrollTop() < 551) {
				  $('#navbar').removeClass('navbar-fixed-top');
				}
			  });
			
			
			
			})
			$(window).resize(function(){
			window.location.href=window.location.href
			})
			
			
			
		

			

</script>
</html>