
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en"> <!--<![endif]-->

<head>
    <meta charset="utf-8" />
    <title>HomemallPH</title>
    <meta name="author" content="ukieweb" />
    <meta name="keywords" content="soon, css3, template, html5 template" />
    <meta name="description" content="Clock - Page Template" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <!-- Font Awesome -->
    <link type="text/css" media="all" href="{{ URL::asset('assets/fonts/font-awesome-4.2.0/css/font-awesome.min.css') }}" rel="stylesheet" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Libs CSS -->
    <link type="text/css" media="all" href="{{ URL::asset('assets/boostrap-files/css/bootstrap.min.css') }}" rel="stylesheet"/>
    <!-- Template CSS -->
    <link type="text/css" media="all" href="{{ URL::asset('assets/css/style.css') }}" rel="stylesheet"/>
    <!-- Responsive CSS -->
    <link type="text/css" media="all" href="{{ URL::asset('assets/css/respons.css') }}" rel="stylesheet" />
    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="144x144" href="{{ URL::asset('assets/img/favicons/apple-touch-icon-144x144.png') }}" />
    <link rel="apple-touch-icon" sizes="114x114" href="{{ URL::asset('assets/img/favicons/apple-touch-icon-144x144.png') }}" />
    <link rel="apple-touch-icon" sizes="72x72" href="{{ URL::asset('assets/img/favicons/apple-touch-icon-72x72.png') }}" />
    <link rel="apple-touch-icon" href="{{ URL::asset('assets/img/favicons/apple-touch-icon.png') }}" />
    <link rel="shortcut icon" href="{{ URL::asset('assets/img/favicons/favicon.png') }}" />
    <!-- Google Fonts -->
	
    <link href='http://fonts.googleapis.com/css?family=Exo+2:400,100,100italic,200,200italic,300,300italic,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic' rel='stylesheet' type='text/css'>

</head>
<style>
@import url(http://fonts.googleapis.com/css?family=Cherry+Swash);
body, html{
    margin:0;
    padding:0;
    color:#222;
	font-family: 'Cherry Swash', trebuchet ms, cursive; 
	font-size:1.5em
}
a{color:#930; text-decoration:none}
#wrap{
	position:fixed;; 
	z-index:-1; 
	top:0; 
	left:0; 
	background-color:black
}
#wrap img.bgfade{
    position:absolute;
    top:0;
    display:none;
    width:100%;
    height:100%;
	z-index:-1
}
.container{
	height: 100%;
	width:100%; 
	margin:0px; 
	background:#fff; -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=80)"; 
	background-color:rgba(0,0,0,.25); 
	padding:1em; 
	text-shadow: 1px 1px 5px #fff
}
.btn-transparent{

	background-color: rgba(0,0,0,.65);
	color: #fff;
	border: 1px solid #fff;
	width:100%;
	/* CSS Transition */
	-webkit-transition: background .2s ease-in-out, border .2s ease-in-out;
	-moz-transition: background .2s ease-in-out, border .2s ease-in-out;
	-ms-transition: background .2s ease-in-out, border .2s ease-in-out;
	-o-transition: background .2s ease-in-out, border .2s ease-in-out;
	transition: background .2s ease-in-out, border .2s ease-in-out;

}

.src-transparent {
  background-color: rgba(0,0,0,.65);
  color: #fff;
}
#tag-line {
  color: #fff;
  font-size:15px
}
</style>
<body >

	<div id="wrap">
		<img class="bgfade" src="{{ URL::asset('assets/img/aa.png') }}">
		<img class="bgfade" src="{{ URL::asset('assets/img/bb.png') }}">
		<img class="bgfade" src="{{ URL::asset('assets/img/cc.png') }}">
		<img class="bgfade" src="{{ URL::asset('assets/img/dd.png') }}">
	</div>
			
	
		<!-- Load page -->
		<div class="animationload">
			<div class="loader"></div>
		</div>
		<!-- End load page -->

		<!-- Content Wrapper -->
		<div id="wrapper">
		</br>
		</br>
			<center>
			<img src="{{ URL::asset('assets/img/icon.png') }}" class="img-responsive" alt="HomeMallPH">
			</center>
			<div class="col-md-6 col-md-offset-3 col-md-12" > 
				<div class="col-md-12"> 
					<div style="height:100px"><center><p  id="tag-line">dsdssds</p></center></br></br></div>
					<div class="input-group">
						<input type="text" class="form-control input-lg src-transparent" placeholder="Quick Search" >
						<span class="input-group-btn">
						<button type="submit" class="btn btn-default btn-lg src-transparent" ><i class="fa fa-search"></i></button>
						</span>
					</div></br>
				</div>
				<div class="col-md-6 col-md-offset-3"> 
					<a  href="/market" class="btn btn-default btn-transparent btn-lg " >Shop Now</a>
				</div>
			</div>
			
			<div class="col-md-12 "> 
			</br>
				<!-- <div id="watch">
					<div class="dash days_dash">
						<div class="digit"></div>
						<div class="digit"></div>
						<span class="dash_title">Days</span>
					</div>
					<div class="dash hours_dash">
						<div class="digit"></div>
						<div class="digit"></div>
						<span class="dash_title">Hours</span>
					</div>
					<div class="dash minutes_dash">
						<div class="digit"></div>
						<div class="digit"></div>
						<span class="dash_title">Min</span>
					</div>
					<div class="dash seconds_dash">
						<div class="digit"></div>
						<div class="digit"></div>
						<span class="dash_title">Sec</span>
					</div>
				</div> -->
			</div>
		</div>
		

		<!-- Footer -->
	 
			

				<!-- footer socials -->
				<div class="row">

					<div class="footer_socials col-sm-12 text-center">

						<div class="contact_icons">
							<ul class="contact_socials clearfix">
								<!-- social icons -->
								<br>
								<li><a class="ukie_social" href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a class="ukie_social" href="#"><i class="fa fa-twitter"></i></a></li>
								<!--
									<li><a class="ukie_social" href="#"><i class="fa fa-behance"></i></a></li>
									<li><a class="ukie_social" href="#"><i class="fa fa-pinterest"></i></a></li>
									<li><a class="ukie_social" href="#"><i class="fa fa-digg"></i></a></li>
									<li><a class="ukie_social" href="#"><i class="fa fa-deviantart"></i></a></li>
									<li><a class="ukie_social" href="#"><i class="fa fa-envelope-square"></i></a></li>
									<li><a class="ukie_social" href="#"><i class="fa fa-delicious"></i></a></li>
									<li><a class="ukie_social" href="#"><i class="fa fa-instagram"></i></a></li>
									<li><a class="ukie_social" href="#"><i class="fa fa-dropbox"></i></a></li>
									<li><a class="ukie_social" href="#"><i class="fa fa-skype"></i></a></li>
									<li><a class="ukie_social" href="#"><i class="fa fa-tumblr"></i></a></li>
									<li><a class="ukie_social" href="#"><i class="fa fa-vimeo-square"></i></a></li>
									<li><a class="ukie_social" href="#"><i class="fa fa-flickr"></i></a></li>
									<li><a class="ukie_social" href="#"><i class="fa fa-github-alt"></i></a></li>
									<li><a class="ukie_social" href="#"><i class="fa fa-renren"></i></a></li>
									<li><a class="ukie_social" href="#"><i class="fa fa-vk"></i></a></li>
									<li><a class="ukie_social" href="#"><i class="fa fa-xing"></i></a></li>
									<li><a class="ukie_social" href="#"><i class="fa fa-weibo"></i></a></li>
									<li><a class="ukie_social" href="#"><i class="fa fa-rss"></i></a></li>
								-->
							</ul>
						</div>

						<div class="copyright">@ SYSIDE INC. , 2015 All Right Reserved</div>

					</div>


				</div>
				<!-- end footer socials -->
			<!-- end container -->
	  
    

    <!-- Scripts -->
    <script src="{{ URL::asset('assets/js/jquery-1.11.2.min.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('assets/boostrap-files/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('assets/js/modernizr.custom.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('assets/js/jquery.nicescroll.min.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('assets/js/jquery.lwtCountdown-1.0.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('assets/js/scripts.js') }}" type="text/javascript"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<script>
	var x = 0;
	var tags = ["ang lupet ang lupet ang lupet ang lupet ang lupet ang lupet ang lupet ang lupet", 
	"wow fantastic wow fantastic wow fantastic wow fantastic wow fantastic wow fantastic wow fantastic wow fantastic wow fantastic",
	"ganda mo mot! ganda mo mot! ganda mo mot! ganda mo mot! ganda mo mot! ganda mo mot!"];
	
			$(window).load(function(){
			$('img.bgfade').hide();
			var dg_H = $(window).height();
			var dg_W = $(window).width();
			$('#wrap').css({'height':dg_H,'width':dg_W});
			function anim() {
				$("#wrap img.bgfade").first().appendTo('#wrap').fadeOut(1500);
				$("#wrap img").first().fadeIn(1500);
				$("#tag-line").text(tags[x]).fadeIn(3000);
				//document.getElementById("tag-line").innerHTML = tags[x];
				x++;
				if(x>=3){
				 x=0;
				}
				setTimeout(anim, 10000);
			}
			anim();})
			$(window).resize(function(){window.location.href=window.location.href})

	</script>
</body>
</html>