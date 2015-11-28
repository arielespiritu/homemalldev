@extends('layouts.master')
@section('head')
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>HomeMallPH - Coming soon</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Raleway:400,300">
        <link rel="stylesheet" href="seria/css/bootstrap.min.css">
        <!--link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css"-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="seria/css/animate.css">
        <!--link rel="stylesheet" href="seria/ultimate-flat-social-icons/ultm-css/ultm.css"-->
		<link rel="stylesheet" href="seria/css/form-elements.css">
        <link rel="stylesheet" href="seria/css/style.css">
        <link rel="stylesheet" href="seria/css/media-queries.css">
    	

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <style>
			html {
			    position: relative;
			    min-height: 100%;
			}
			.carousel-fade .carousel-inner .item {
			    opacity: 0;
			    transition-property: opacity;
			}
			.carousel-fade .carousel-inner .active {
			    opacity: 1;
			}
			.carousel-fade .carousel-inner .active.left,
			.carousel-fade .carousel-inner .active.right {
			    left: 0;
			    opacity: 0;
			    z-index: 1;
			}
			.carousel-fade .carousel-inner .next.left,
			.carousel-fade .carousel-inner .prev.right {
			    opacity: 1;
			}
			.carousel-fade .carousel-control {
			    z-index: 2;
			}
			@media all and (transform-3d),
			(-webkit-transform-3d) {
			    .carousel-fade .carousel-inner > .item.next,
			    .carousel-fade .carousel-inner > .item.active.right {
			        opacity: 0;
			        -webkit-transform: translate3d(0, 0, 0);
			        transform: translate3d(0, 0, 0);
			    }
			    .carousel-fade .carousel-inner > .item.prev,
			    .carousel-fade .carousel-inner > .item.active.left {
			        opacity: 0;
			        -webkit-transform: translate3d(0, 0, 0);
			        transform: translate3d(0, 0, 0);
			    }
			    .carousel-fade .carousel-inner > .item.next.left,
			    .carousel-fade .carousel-inner > .item.prev.right,
			    .carousel-fade .carousel-inner > .item.active {
			        opacity: 1;
			        -webkit-transform: translate3d(0, 0, 0);
			        transform: translate3d(0, 0, 0);
			    }
			}
			.item:nth-child(1) {
			    /*background: url(https://ununsplash.imgix.net/photo-1417021423914-070979c8eb34?q=75&fm=jpg&s=55746bd56e02a131b1e48c12196ea866) no-repeat center center fixed;*/
			    background: url(/seria/img/background/4.jpg) no-repeat center center fixed;
			    -webkit-background-size: cover;
			    -moz-background-size: cover;
			    -o-background-size: cover;
			    background-size: cover;
			}
			.item:nth-child(2) {
			    /*background: url(https://ununsplash.imgix.net/reserve/oY3ayprWQlewtG7N4OXl_DSC_5225-2.jpg?q=75&fm=jpg&s=85ab821f3fa535036a68155aab571bad) no-repeat center center fixed;*/
			    background: url(/seria/img/background/5.jpg) no-repeat center center fixed;
			    -webkit-background-size: cover;
			    -moz-background-size: cover;
			    -o-background-size: cover;
			    background-size: cover;
			}
			.item:nth-child(3) {
			    /*background: url(https://unsplash.imgix.net/photo-1414073875831-b47709631146?q=75&fm=jpg&s=731b6d5150eea8bafa63ae8194e72ebd) no-repeat center center fixed;*/
			    background: url(/seria/img/background/6.jpg) no-repeat center center fixed;
			    -webkit-background-size: cover;
			    -moz-background-size: cover;
			    -o-background-size: cover;
			    background-size: cover;
			}
			.carousel {
			    z-index: -99;
			}
			.carousel .item {
			    position: fixed;
			    width: 100%;
			    height: 100%;
			}
			.title {
			  text-align: center;
			  margin-top: 20px;
			  padding: 10px;
			  text-shadow: 2px 2px #000;
			  color: #FFF;
			}
        </style>
@endsection
@section('body')    
        <!-- Background Carousel -->
		<div class="carousel slide carousel-fade" data-ride="carousel">
		    <!-- Wrapper for slides -->
		    <div class="carousel-inner" role="listbox">
	        	<div class="item active">
	        	</div>
	        	<div class="item">
	        	</div>
	        	<div class="item">
	        	</div>
	    	</div>
		</div>
		
		<!-- Top menu -->
		<nav>
			<a class="scroll-link" href="#top-content">Top</a>
			<a class="scroll-link" href="#subscribe">Subscribe</a>
			<a class="scroll-link" href="#features">The project</a>
			<a class="scroll-link" href="#testimonials">Testimonials</a>
			<a class="scroll-link" href="#about-us">About</a>
			<a class="scroll-link" href="#contact">Contact</a>
			<div class="hide-menu">
				<a href=""><i class="fa fa-bars"></i></a>
			</div>
		</nav>
		<div class="show-menu">
			<a href=""><i class="fa fa-bars"></i></a>
		</div>
		
        <!-- Top content -->
        <div class="top-content" style="height: 100%;">
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 text">
                        	<div class="logo">  {{-- wow fadeInDown --}}
                        		<a href="/coming-soon2"><img src="seria/img/logo2.png" height="180px" /></a>
                        	</div>
                            <!--h1 class="wow fadeInLeftBig">HomeMallPH</h1-->
                            <h1 class="wow fadeInLeftBig">We are coming soon</h1>
                            <div class="description wow fadeInLeftBig">
                            	We are working very hard to add new features and improve the usability of our site. 
                            	In the meantime scroll down to know a little more about this new project.
                            </div>
                            <div class="row" style="margin-top:20px;">
	               				 <div class="col-sm-12 wow fadeInLeftDown">
									<form class="form-inline" role="form">
										<div class="form-group">
											<input type="text" name="text" placeholder="I am searching for..." class="form-control flat input-lg">
											<a href="/market" class="btn btn-primary flat btn-lg">Search</a>
										<a href="/market" class="btn btn-success flat btn-lg">Go to Marketplace</a>
										</div>
										
									</form>
								</div>
							</div>

                            <div class="timer wow fadeInUp">
                            	<div class="days-wrapper">
                                    <span class="days"></span> <br>days
                                </div> 
                                <span class="slash">/</span> 
                                <div class="hours-wrapper">
                                    <span class="hours"></span> <br>hours
                                </div> 
                                <span class="slash">/</span> 
                                <div class="minutes-wrapper">
                                    <span class="minutes"></span> <br>minutes
                                </div> 
                                <span class="slash">/</span> 
                                <div class="seconds-wrapper">
                                    <span class="seconds"></span> <br>seconds
                                </div>
                            </div>
        			

        					<div class="row" style="margin-top: 30px;">
								<div class="col-md-12 wow fadeInUp">
									<div class="social">
										<a href="#" class="btn btn-theme"><i class="fa fa-facebook"></i></a>
										<a href="#" class="btn btn-theme"><i class="fa fa-twitter"></i></a>
										<a href="#" class="btn btn-theme"><i class="fa fa-google-plus"></i></a>
										<a href="#" class="btn btn-theme"><i class="fa fa-dribbble"></i></a>
										<a href="#" class="btn btn-theme"><i class="fa fa-linkedin"></i></a>
									</div>
								</div>
							</div>
							
                            <div class="scroll-page wow fadeInUp">
                            	<a class="scroll-link" href="#subscribe"><i class="fa fa-chevron-down"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   
        <!-- Subscription form -->
        <div class="subscribe-container section-container" style="background-color: rgba(0,0,0,0.8);">
	        <div class="container">
	            <div class="row">
	                <div class="col-sm-12 subscribe section-description wow fadeIn">
	                    <h2>Email updates</h2>
	                    <p>Sign up now to our newsletter and you'll be one of the first to know when we're ready:</p>
	                    <form class="form-inline" role="form" action="assets/subscribe.php" method="post">
	                    	<div class="form-group">
	                    		<label class="sr-only" for="subscribe-email">Email address</label>
	                        	<input style="border:1px solid #444;" type="text" name="email" placeholder="Enter your email..." class="subscribe-email form-control" id="subscribe-email">
	                        </div>
	                        <button type="submit" class="btn">Subscribe</button>
	                    </form>
	                    <div class="success-message"></div>
	                    <div class="error-message"></div>
	                    <div class="scroll-page">
                        	<a class="scroll-link" href="#features"><i class="fa fa-chevron-down"></i></a>
                        </div>
	                </div>
	            </div>
	        </div>
        </div>
        
        <!-- Features -->
        <div class="features-container section-container">
	        <div class="container">
	            <div class="row">
	                <div class="col-sm-12 features section-description wow fadeIn">
	                    <h2>About the project</h2>
	                    <p>
	                    	The project is aiming for the usability of the website for faster and clearer transactions.
	                    </p>
	                </div>
	            </div>
	            <div class="row">
                	<div class="col-sm-4 features-box wow fadeInUp">
	                	<div class="features-box-icon">
	                		<i class="fa fa-eye"></i>
	                	</div>
	                    <h3>Easy To Use</h3>
	                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.</p>
                    </div>
                    <div class="col-sm-4 features-box wow fadeInDown">
	                	<div class="features-box-icon">
	                		<i class="fa fa-pencil"></i>
	                	</div>
	                    <h3>Improved Design</h3>
	                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.</p>
                    </div>
                    <div class="col-sm-4 features-box wow fadeInUp">
	                	<div class="features-box-icon">
	                		<i class="fa fa-cloud"></i>
	                	</div>
	                    <h3>New data structure</h3>
	                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.</p>
                    </div>
	            </div>
	            <div class="row">
	            	<div class="col-sm-12">
	            		<div class="modal-button">
                        	<button class="btn" data-toggle="modal" data-target="#modal-features">Learn more</button>
                        </div>
                        <div class="scroll-page">
                        	<a class="scroll-link" href="#testimonials"><i class="fa fa-chevron-down"></i></a>
                        </div>
	            	</div>
	            </div>
	        </div>
        </div>

        <!-- Testimonials -->
        <div class="testimonials-container section-container" style="background-color:rgba(0,0,0,0.8);">
	        <div class="container">
	            <div class="row">
	                <div class="col-sm-12 testimonials section-description wow fadeIn">
	                    <h2>Our clients</h2>
	                    <div class="testimonial-active"></div>
		                    <div class="testimonial-single">
		                    	<p  style="color:#444;">
		                    		Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit 
		                    		lobortis nisl ut aliquip ex ea commodo consequat. Ut wisi enim ad minim veniam, 
		                    		quis nostrud exerci tation ullamcorper suscipit lobortis nisl.
		                    		<br>
		                    		<a href="">John Doe, johndoe.com</a>
		                    	</p>
		                    	<div class="testimonial-single-image">
		                    		<img src="seria/img/testimonials/1.jpg" alt="" data-at2x="seria/img/testimonials/1.jpg">
		                    	</div>
		                    </div>
		                    <div class="testimonial-single">
		                    	<p>
		                    		Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt 
		                    		ut labore et. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor 
		                    		incididunt ut labore et.
		                    		<br>
		                    		<a href="">Jane Jonsson, blog.jane.com</a>
		                    	</p>
		                    	<div class="testimonial-single-image">
		                    		<img src="seria/img/testimonials/2.jpg" alt="" data-at2x="seria/img/testimonials/2.jpg">
		                    	</div>
		                    </div>
		                    <div class="testimonial-single">
		                    	<p>
		                    		Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit 
		                    		lobortis nisl ut aliquip ex ea commodo consequat. Ut wisi enim ad minim veniam, 
		                    		quis nostrud exerci tation ullamcorper suscipit lobortis nisl.
		                    		<br>
		                    		<a href="">John Doe, johndoe.com</a>
		                    	</p>
		                    	<div class="testimonial-single-image">
		                    		<img src="seria/img/testimonials/3.jpg" alt="" data-at2x="seria/img/testimonials/3.jpg">
		                    	</div>
		                    </div>
		                    <div class="testimonial-single">
		                    	<p>
		                    		Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt 
		                    		ut labore et. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor 
		                    		incididunt ut labore et.
		                    		<br>
		                    		<a href="">Jane Jonsson, blog.jane.com</a>
		                    	</p>
		                    	<div class="testimonial-single-image">
		                    		<img src="seria/img/testimonials/4.jpg" alt="" data-at2x="seria/img/testimonials/4.jpg">
		                    	</div>
		                    </div>
	                    <div class="scroll-page">
                        	<a class="scroll-link" href="#about-us"><i class="fa fa-chevron-down"></i></a>
                        </div>
	                </div>
	            </div>
	        </div>
        </div>
        
        <!-- About us -->
        <div class="about-us-container section-container">
	        <div class="container">
	            <div class="row">
	                <div class="col-sm-12 about-us section-description wow fadeIn">
	                    <h2>About our team</h2>
	                    <p>
	                    	Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut 
	                    	aliquip ex ea commodo consequat. Ut wisi enim ad minim veniam, quis nostrud.
	                    </p>
	                </div>
	            </div>
	            <div class="row">
	                <div class="col-sm-4 about-us-box wow fadeInUp">
		                <div class="about-us-photo">
		                	<img src="seria/img/team/1.jpg" alt="" data-at2x="assets/img/team/1.jpg">
		                </div>
	                    <h3>John Doe</h3>
	                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.</p>
	                    <div class="about-us-social">
		                	<a class="ultm ultm-facebook ultm-32 ultm-square ultm-gray-to-color" href=""></a>
		                	<a class="ultm ultm-dribbble ultm-32 ultm-square ultm-gray-to-color" href=""></a>
		                    <a class="ultm ultm-twitter ultm-32 ultm-square ultm-gray-to-color" href=""></a>
		                </div>
	                </div>
	                <div class="col-sm-4 about-us-box wow fadeInDown">
		                <div class="about-us-photo">
		                	<img src="seria/img/team/2.jpg" alt="" data-at2x="assets/img/team/2.jpg">
		                </div>
	                    <h3>Tim Brown</h3>
	                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.</p>
	                    <div class="about-us-social">
		                	<a class="ultm ultm-facebook ultm-32 ultm-square ultm-gray-to-color" href=""></a>
		                	<a class="ultm ultm-dribbble ultm-32 ultm-square ultm-gray-to-color" href=""></a>
		                    <a class="ultm ultm-twitter ultm-32 ultm-square ultm-gray-to-color" href=""></a>
		                </div>
	                </div>
	                <div class="col-sm-4 about-us-box wow fadeInUp">
		                <div class="about-us-photo">
		                	<img src="seria/img/team/3.jpg" alt="" data-at2x="assets/img/team/3.jpg">
		                </div>
	                    <h3>Sarah Red</h3>
	                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.</p>
	                    <div class="about-us-social">
		                	<a class="ultm ultm-facebook ultm-32 ultm-square ultm-gray-to-color" href=""></a>
		                	<a class="ultm ultm-dribbble ultm-32 ultm-square ultm-gray-to-color" href=""></a>
		                    <a class="ultm ultm-twitter ultm-32 ultm-square ultm-gray-to-color" href=""></a>
		                </div>
	                </div>
	            </div>
	            <div class="row">
	            	<div class="col-sm-12">
	            		<div class="modal-button">
                        	<button class="btn" data-toggle="modal" data-target="#modal-about-us">Learn more</button>
                        </div>
                        <div class="scroll-page">
                        	<a class="scroll-link" href="#contact"><i class="fa fa-chevron-down"></i></a>
                        </div>
	            	</div>
	            </div>
	        </div>
        </div>
        
        <!-- Contact us -->
        <div class="contact-container section-container section-container-full-bg" style="background-color: rgba(0,0,0,0.9);">
	        <div class="container">
	            <div class="row">
	                <div class="col-sm-12 contact section-description wow fadeIn">
	                    <h2>Contact us</h2>
	                    <p>
	                    	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut 
		                    labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.
	                    </p>
	                </div>
	            </div>
	            <div class="row">
	                <div class="col-sm-7 contact-form wow fadeInLeft">
	                    <h3>Send us a message</h3>
	                    <form role="form" action="assets/contact.php" method="post">
	                    	<div class="form-group">
	                    		<label class="sr-only" for="contact-email">Email</label>
	                        	<input type="text" name="email" placeholder="Email..." class="contact-email form-control" id="contact-email">
	                        </div>
	                        <div class="form-group">
	                        	<label class="sr-only" for="contact-subject">Subject</label>
	                        	<input type="text" name="subject" placeholder="Subject..." class="contact-subject form-control" id="contact-subject">
	                        </div>
	                        <div class="form-group">
	                        	<label class="sr-only" for="contact-message">Message</label>
	                        	<textarea name="message" placeholder="Message..." class="contact-message form-control" id="contact-message"></textarea>
	                        </div>
	                        <button type="submit" class="btn">Send it</button>
	                    </form>
	                </div>
	                <div class="col-sm-5 contact-address wow fadeInUp">
	                    <h3>Contact details</h3>
	                    <p><i class="fa fa-map-marker"></i>3 Queen, Forest Hills, Novaliches, Quezon City 1117</p>
	                    <p><i class="fa fa-phone"></i>Phone: 737-1234</p>
	                    <p><i class="fa fa-envelope"></i>Email: <a href="">support@sysidedev.com</a></p>
	                </div>
	            </div>
	            <div class="row">
	            	<div class="col-sm-12">
	            		<div class="scroll-page">
                        	<a class="scroll-link" href="#top-content"><i class="fa fa-chevron-up"></i></a>
                        </div>
	            	</div>
	            </div>
	        </div>
        </div>
        
        <!-- Footer -->
        <footer>
	        <div class="container">
	            <div class="row">
                    <div class="col-sm-7 footer-copyright">
                    	&copy; HomeMallPH | <a href="http://www.sysidedev.com">Syside</a>.
                    </div>
                    <div class="col-sm-5 footer-social">
                    	<a class="ultm ultm-facebook ultm-32 ultm-square ultm-gray-to-color" href=""></a>
	                	<a class="ultm ultm-dribbble ultm-32 ultm-square ultm-gray-to-color" href=""></a>
	                    <a class="ultm ultm-twitter ultm-32 ultm-square ultm-gray-to-color" href=""></a>
	                    <a class="ultm ultm-google-plus-1 ultm-32 ultm-square ultm-gray-to-color" href=""></a>
	                    <a class="ultm ultm-pinterest ultm-32 ultm-square ultm-gray-to-color" href=""></a>
                    </div>
	            </div>
	        </div>
        </footer>
        
        
        <!-- MODAL: About the project -->
        <div class="modal fade" id="modal-features" tabindex="-1" role="dialog" aria-labelledby="modal-features-label" aria-hidden="true">
        	<div class="modal-dialog">
        		<div class="modal-content">
        			<div class="modal-header">
        				<button type="button" class="close" data-dismiss="modal">
        					<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
        				</button>
        				<h4 class="modal-title" id="modal-features-label">About the project</h4>
        			</div>
        			<div class="modal-body">
        				<p><img src="assets/img/modal/1.jpg" alt="" data-at2x="assets/img/modal/1.jpg"></p>
        				<p>
	                    	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut 
	                    	labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.
	                    </p>
	                    <ul>
	                    	<li>Easy To Use</li>
	                    	<li>Awesome Design</li>
	                    	<li>Cloud Based</li>
	                    </ul>
	                    <p>
	                    	Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea 
	                    	commodo consequat nostrud tation.
	                    </p>
        			</div>
        			<div class="modal-footer">
        				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        			</div>
        		</div>
        	</div>
        </div>
        
        <!-- MODAL: About our team -->
        <div class="modal fade" id="modal-about-us" tabindex="-1" role="dialog" aria-labelledby="modal-about-us-label" aria-hidden="true">
        	<div class="modal-dialog">
        		<div class="modal-content">
        			<div class="modal-header">
        				<button type="button" class="close" data-dismiss="modal">
        					<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
        				</button>
        				<h4 class="modal-title" id="modal-about-us-label">About our team</h4>
        			</div>
        			<div class="modal-body">
        				<p><img src="assets/img/modal/2.jpg" alt="" data-at2x="assets/img/modal/2.jpg"></p>
        				<p>
	                    	Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea 
	                    	commodo consequat nostrud tation.
	                    </p>
        				<p>
	                    	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut 
	                    	labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.
	                    </p>
        			</div>
        			<div class="modal-footer">
        				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        			</div>
        		</div>
        	</div>
        </div>
@endsection
@section('javascripts')
    <!-- Javascript -->
        <script src="seria/js/jquery-1.11.1.min.js"></script>
        <script src="seria/js/bootstrap.min.js"></script>
        <script src="seria/js/jquery.backstretch.min.js"></script>
        <script src="seria/js/wow.min.js"></script>
        <script src="seria/js/retina-1.1.0.min.js"></script>
        <!--script src="seria/js/jquery.countdown.min.js"></script-->
        <script src="seria/js/jquery.countdown.min.js"></script>
        <script src="seria/js/scripts.js"></script>

        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->
@endsection


