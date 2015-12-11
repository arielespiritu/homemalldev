@extends('client.master.template-master')

@section('title', 'Store 1')

@section('head')
		<link href="{{ URL::asset('assets/templates/template1/css/jquery.bxslider.css') }}">
		<link href="{{ URL::asset('assets/templates/template1/css/style.css') }}" rel="stylesheet">
@endsection
	
@section('content')

	<header>
	    <div class="container" >
	        <div class="row">

	        	<!-- Logo -->
	            <div class="col-lg-3 col-md-3 hidden-sm hidden-xs">
	            	<div class="well logo store-logo">
	            		<a href="index.html">
							<div class="wraptocenter"><span></span><img src="{{ URL::asset('assets/img/banner2.png') }}" alt="..."></div>
	            		</a>
	            	</div>
	            </div>
	            <!-- End Logo -->

				<!-- Search Form -->
	            <div class="col-lg-6 col-md-5 col-sm-7 col-xs-12">
	            	<div class="well">
	                    <form action="">
	                        <div class="input-group">
	                            <input type="text" class="form-control input-search input-lg flat" placeholder="Enter something to search"/>
	                            <span class="input-group-btn">
	                                <button class="btn btn-default no-border-left flat btn-lg" type="submit"><i class="fa fa-search"></i></button>
	                            </span>
								<span class="input-group-btn hidden-md hidden-lg">
	                                <button class="btn btn-default no-border-left flat btn-lg" ><i class="fa fa-shopping-cart"></i><span class="badge">1</span></button>
	                            </span>
	                        </div>
	                    </form>
	                </div>
	            </div>
	            <!-- End Search Form -->

	            <!-- Shopping Cart List -->
	            <div class="col-lg-3 col-md-3 hidden-sm hidden-xs">
	            	<div class="pull-right">
						<h3><a href="" class="link"><i class="fa fa-shopping-cart" style="color:blue"></i>&nbsp;&nbsp;Cart&nbsp;&nbsp;</a><span class="circle-num" >1</span></h3>
						<p class="text-center" style="margin-top:-10px;">P 100.00</p>		
	            	</div>
	            </div>
	            <!-- End Shopping Cart List -->
	        </div>
	    </div>
    </header>

	<!-- Navigation -->
    <nav class="navbar navbar-inverse" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- text logo on mobile view -->
                <a class="navbar-brand visible-xs" href="index.html" style="padding-top:35px; color:white;">Store 1 Online Shop</a>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="/tem1" class="active">Home</a></li>
                    <li><a href="/tem1catalog">Products</a></li>
                    <li><a href="/tem1cart">About</a></li>
                    <li><a href="/tem1checkout">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navigation -->

    <div class="container main-container" style="margin-top:-19px;">
        <div class="row">
        	<!-- Slider -->
   
                <div id="main-slider" style="margin-top:-19px; margin-bottom:20px;"> 
					<div class="item" style="background:#a22221;">
						<center><img class="img-responsive" src="{{ URL::asset('assets/img/banner4.png') }}" alt=""></center>
					</div>	
					<div class="item"  style="background:#b3a387;">
						<center><img src="{{ URL::asset('assets/img/banner1.png') }}" alt="" class="img-responsive"></center>
					</div>
					<div class="item" style="background:#32ace8;" >
						<center><img class="img-responsive" src="{{ URL::asset('assets/img/banner2.png') }}" alt=""></center>
					</div>
					<div class="item" >
						<center><img class="img-responsive" src="{{ URL::asset('assets/img/banner3.png') }}" alt=""></center>
					</div>						
				</div>
           
            <!-- End Slider -->

            <!-- End Product Selection -->
        </div>

        <div class="row">
        	<div class="col-lg-3 col-md-3 col-sm-12 no-padding">

        		<!-- Categories -->
        		<div class="col-lg-12 col-md-12 col-sm-6">
	        		<div class="no-padding">
	            		<span class="title">CATEGORIES</span>
	            	</div>
				
				
					<div id="main_menu ">
                        <div class="list-group panel panel-cat ">
						<?php $x=0;?>
                    
						@foreach($store_market_data as $store_market_data )
							@if(count($store_market_data->category)>0)
							<h4>{{$store_market_data->market_name}}</h4>
							@endif
							@foreach($store_market_data->category as $categorys )
							<?php $x++;?>
							<a href="#sub{{$x}}" class="list-group-item" data-toggle="collapse" data-parent="#main_menu">{{$categorys->category_name}}<i class="fa fa-caret-down pull-right"></i></a>
							<div class="collapse list-group-sub" id="sub{{$x}}">	
									@foreach($categorys->subCategory as $subCategorys)
										<a href="" class="list-group-item">{{$subCategorys->sub_category_name}}</a>
									@endforeach
							</div>
							@endforeach
						@endforeach	
						
                        </div>
                    </div>

				</div>
				<!-- End Categories -->

				<!-- Best Seller -->
				<div class="col-lg-12 col-md-12 col-sm-6" >
					<div class="no-padding">
	            		<span class="title">BEST SELLER</span>
	            	</div>
					<div class="hero-feature">
		                <div class="thumbnail ">
		                	<a href="detail.html" class="link-p">
		                    	<img src="{{ URL::asset(imagePath('assets/img/store/samplestore/product/1/0')) }}" alt="">
		                	</a>
		                <div class="item-desc" style="padding:10px" >
							<a href="/Product/Details/1/Ariel-Sample"><h3>Sample</h3>
							<a href="/Product/Details/1/Ariel-Sample" ><p >&#8369;&nbsp;&nbsp;0.00</p></h4>
							<div id="navcontainer">
							<ul>
								<li><a href=""><i class="fa fa-shopping-cart cart "  ></i></a></li>
								<li><a href="" class="alignright-icon"><i class="fa fa-heart heart" ></i></a></li>
								<li><a href="" class="alignright-icon"><i class="fa fa-star star"  ></i></a></li>
							</ul>
							</div>
						</div>
		                </div>
		            </div>
		            <div class="hero-feature hidden-sm">
		                <div class="thumbnail ">
		                	<a href="detail.html" class="link-p">
		                    	<img src="{{ URL::asset(imagePath('assets/img/store/samplestore/product/1/0')) }}" alt="">
		                	</a>
		                    <div class="item-desc" style="padding:10px" >
							<a href="/Product/Details/1/Ariel-Sample"><h3>Sample</h3>
							<a href="/Product/Details/1/Ariel-Sample" ><p >&#8369;&nbsp;&nbsp;0.00</p></h4>
							<div id="navcontainer">
							<ul>
								<li><a href=""><i class="fa fa-shopping-cart cart "  ></i></a></li>
								<li><a href="" class="alignright-icon"><i class="fa fa-heart heart" ></i></a></li>
								<li><a href="" class="alignright-icon"><i class="fa fa-star star"  ></i></a></li>
							</ul>
							</div>
						</div>
		                </div>
		            </div>
				</div>
				<!-- End Best Seller -->

        	</div>

        	<div class="clearfix visible-sm"></div>

			<!-- Featured -->
        	<div class="col-lg-9 col-md-9 col-sm-12 no-padding">
			@if(count($featured_products)>0)
				<div class="col-lg-12 col-sm-12">
            		<span class="title">FEATURED PRODUCTS</span>
            	</div>
			@else
			
			@endif
			@foreach($featured_products as $featured_products )
				<div class="col-md-4 col-sm-4 col-xs-6 ">
						<div class="thumbnail">
							<a href="detail.html" class="link-p">
								<img src="{{ URL::asset(imagePath('assets/img/store/samplestore/product/1/0')) }}" alt="">
							</a>
								<?php $count=0;?>
									<div class="item-desc" style="padding:10px" >
											<a href="/Product/Details/1/Ariel-Sample"><h3>{{$featured_products->product_info->product_name}}</h3>
											@foreach($featured_products->product_info->product as $product )
												@if($count==0)
													<a href="/Product/Details/1/Ariel-Sample" ><p >&#8369;&nbsp;&nbsp;{{$product->sale_price}}</p></h4>
												@endif
												<?php $count++;?>
											@endforeach	
											<div id="navcontainer">
											<ul>
												<li><a href=""><i class="fa fa-shopping-cart cart "  ></i></a></li>
												<li><a href="" class="alignright-icon"><i class="fa fa-heart heart" ></i></a></li>
												<li><a href="" class="alignright-icon"><i class="fa fa-star star"  ></i></a></li>
											</ul>
											</div>
									</div>
								</p>
						</div>
					</div>
			<?php $count=0;?>
			@endforeach	

	            
        	</div>
        	<!-- End Featured -->

        	<div class="clearfix visible-sm"></div>
			
			<!-- Adidas Category -->
        	<div class="col-lg-9 col-md-9 col-sm-12">
				<div class="col-lg-12 col-sm-12">
            		<span class="title">PRODUCTS</span>
            	</div>
	            @for($x=0;$x<6;$x++)
	            <div class="col-md-4 col-sm-4 col-xs-6 ">
	                <div class="thumbnail">
	                	<a href="detail.html" class="link-p">
	                    	<img src="{{ URL::asset(imagePath('assets/img/store/samplestore/product/1/0')) }}" alt="">
	                	</a>
	                    <div class="item-desc" style="padding:10px" >
							<a href="/Product/Details/1/Ariel-Sample"><h3>Sample</h3>
							<a href="/Product/Details/1/Ariel-Sample" ><p >&#8369;&nbsp;&nbsp;0.00</p></h4>
							<div id="navcontainer">
							<ul>
								<li><a href=""><i class="fa fa-shopping-cart cart "  ></i></a></li>
								<li><a href="" class="alignright-icon"><i class="fa fa-heart heart" ></i></a></li>
								<li><a href="" class="alignright-icon"><i class="fa fa-star star"  ></i></a></li>
							</ul>
							</div>
						</div>
	                </div>
	            </div>
				@endfor
			</div>
			<!-- End Adidas Category -->

        </div>
	</div>
	
@endsection


@section('page-script')
    <script src="{{ URL::asset('assets/templates/template1/jquery.bxslider.min.js') }}"></script>	
    <script src="{{ URL::asset('assets/templates/template1/jquery.blImageCenter.js') }}"></script>	
    <script src="{{ URL::asset('assets/templates/template1/js/mimity.js') }}"></script>	
@endsection
