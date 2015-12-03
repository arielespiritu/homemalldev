@extends('client.master.master')

	@foreach($ProductInfo as $ProductInfo)
	
@section('title',ucFirst($ProductInfo->product_name).' Details')

@section('content')

			
				<div class="col-md-12" style="background:white; margin-top:-15px; padding:0px;">
					<div class="col-md-4 col-md-offset-4 col-xs-12 store-logo-detais" >
						<div class="wraptocenter"><span></span><img src="{{ URL::asset('assets/img/store/store7.jpg') }}" alt="..."></div>
						
					</div>
					<div class="col-md-12" style="padding:0px;">
						<ul class="navs">
							<li><a href="/">Home</a></li>
							<li><a href="/about/">Products</a></li>
							<li><a href="/work/">About</a></li>
							<li><a href="/clients/">Contact</a></li>
							<li><a href="/clients/">
								<form class="navbar-form "  role="search" style="">
									<div class="input-group" style="padding:0px;width:100%">
										<input type="text" class="form-control input-xs flat" placeholder="Search">
										<span class="input-group-btn">
											<button type="submit" class="btn btn-default btn-sm flat"><i class="fa fa-search"></i></button>
										</span>
									</div>
								</form>
							</a></li>
						</ul>
					</div>
				</div>
	
			
			<div class="container">
			<div class="col-md-12 " style="padding:0px;margin-top:2px;" >
				<div class="col-md-9 " style="padding:2px; " >
					<div class="col-md-12 box" style="padding:0px; background:white" >
						<div class="col-md-5 " style="margin-top:-20px; padding:0px; " >
							<div class="col-sm-12" style="padding:7px;">

									<!-- /.ribbon -->
									<div class="col-sm-12" style="padding:0px;" id="mainImage">
										<div id="carousel" class="carousel slide" data-ride="carousel" >
											<div class="carousel-inner">
												<div class="item active">
													<img src="{{ URL::asset('assets/img/category/grocery/1.png') }}">
												</div>
												<div class="item">
													<img src="{{ URL::asset('assets/img/store/samplestore/product/1.jpg') }}">
												</div>
												<div class="item">
													<img src="{{ URL::asset('assets/img/category/grocery/3.png') }}">
												</div>
												<div class="item">
													<img src="{{ URL::asset('assets/img/category/grocery/4.png') }}">
												</div>
												<div class="item">
													<img src="{{ URL::asset('assets/img/category/grocery/1.png') }}">
												</div>
												<div class="item">
													<img src="{{ URL::asset('assets/img/category/grocery/2.png') }}">
												</div>
												<div class="item">
													<img src="{{ URL::asset('assets/img/category/grocery/3.png') }}">
												</div>
												<div class="item">
													<img src="{{ URL::asset('assets/img/category/grocery/4.png') }}">
												</div>
											</div>
										</div> 
									<div class="clearfix">
										<div id="thumbcarousel" class="carousel slide" style="border:1px solid transparent;" data-interval="false">
											<div class="carousel-inner">
												<div class="item active" >
													<div style="padding:2px;" data-target="#carousel" data-slide-to="0" class="thumb"><img src="{{ URL::asset('assets/img/category/grocery/1.png') }}"></div>
													<div style="padding:2px;" data-target="#carousel" data-slide-to="1" class="thumb"><img src="{{ URL::asset('assets/img/category/grocery/2.png') }}"></div>
													<div style="padding:2px;" data-target="#carousel" data-slide-to="2" class="thumb"><img src="{{ URL::asset('assets/img/category/grocery/3.png') }}"></div>
													<div style="padding:2px;" data-target="#carousel" data-slide-to="3" class="thumb"><img src="{{ URL::asset('assets/img/category/grocery/4.png') }}"></div>
												</div><!-- /item -->
												<div class="item" >
													<div style="padding:2px;" data-target="#carousel" data-slide-to="4" class="thumb"><img src="{{ URL::asset('assets/img/category/grocery/1.png') }}"></div>
													<div style="padding:2px;" data-target="#carousel" data-slide-to="5" class="thumb"><img src="{{ URL::asset('assets/img/category/grocery/2.png') }}"></div>
													<div style="padding:2px;" data-target="#carousel" data-slide-to="6" class="thumb"><img src="{{ URL::asset('assets/img/category/grocery/3.png') }}"></div>
													<div  style="padding:2px;" data-target="#carousel" data-slide-to="7" class="thumb"><img src="{{ URL::asset('assets/img/category/grocery/4.png') }}"></div>
												</div><!-- /item -->
											</div><!-- /carousel-inner -->
											<a class="left carousel-control" href="#thumbcarousel" role="button" data-slide="prev" >
												<span ><i class="fa fa-chevron-left" style="margin-top:60%;"></i></span>
											</a>
											<a class="right carousel-control" href="#thumbcarousel" role="button" data-slide="next">
												<span ><i class="fa fa-chevron-right" style="margin-top:60%;"></i></span>
											</a>
										</div> <!-- /thumbcarousel -->
									</div><!-- /clearfix -->
									</div> <!-- /col-sm-6 -->

							</div>
							
						
						</div>
						
						<div class="col-md-7 " style="padding:0px; "  >
							<div class="col-md-12 " style="padding:0px;">
								<div class="col-md-12 " >
									<h3>{{ucFirst($ProductInfo->product_name)}}</h3>
									<h4 class="text-danger"><small>Price :&nbsp;&nbsp;</small>&#8369;&nbsp;&nbsp;0.00</h4>
								</div>
								<div class="col-md-12" style="padding:0px;">
									<div class="col-md-6 " >
										<h4>Variants</h4>
										<div id="thumbcarousel1" class="carousel slide " data-interval="false" style="border:1px solid transparent;">
											<div class="carousel-inner">
												<div class="item active" >
													<div style="padding:2px;" data-target="#carousel" data-slide-to="0" class="thumb"><img src="{{ URL::asset('assets/img/category/grocery/1.png') }}"></div>
													<div style="padding:2px;" data-target="#carousel" data-slide-to="1" class="thumb"><img src="{{ URL::asset('assets/img/category/grocery/2.png') }}"></div>
													<div style="padding:2px;" data-target="#carousel" data-slide-to="2" class="thumb"><img src="{{ URL::asset('assets/img/category/grocery/3.png') }}"></div>
													<div style="padding:2px;" data-target="#carousel" data-slide-to="3" class="thumb"><img src="{{ URL::asset('assets/img/category/grocery/4.png') }}"></div>
													<div style="padding:2px;" data-target="#carousel" data-slide-to="4" class="thumb"><img src="{{ URL::asset('assets/img/category/grocery/1.png') }}"></div>
													<div style="padding:2px;" data-target="#carousel" data-slide-to="5" class="thumb"><img src="{{ URL::asset('assets/img/category/grocery/2.png') }}"></div>
													<div style="padding:2px;" data-target="#carousel" data-slide-to="6" class="thumb"><img src="{{ URL::asset('assets/img/category/grocery/3.png') }}"></div>
													<div  style="padding:2px;" data-target="#carousel" data-slide-to="7" class="thumb"><img src="{{ URL::asset('assets/img/category/grocery/4.png') }}"></div>
												</div>
											</div>
										</div>
									</div>
									@foreach($ProductInfo->productVariantGroup as $productVariantGroup)
									<div id="variants_container" >
										<div class="col-md-12 " >
											<h4>{{$productVariantGroup->variant->variant_name}}</h4>
											<div class="col-md-12" style="padding:0px" >
												<ul class="navs-variant">
												@foreach($ProductInfo->productVariant as $productVariant)
													@if($productVariant->variant_id==$productVariantGroup->variant_id)
													<li ><a href="javascript:void()"> {{$productVariant->variant_name_value}}</a></li>
													@endif
												@endforeach
												</ul>
											</div>
										</div>
									</div>
									@endforeach
									<div class="col-md-12 " >
										<h4>Quantity</h4>
										<div class="input-group">
											  <input type="number" max="100" min="1" class="form-control input-md" placeholder="quantity" aria-describedby="sizing-addon2" id="quantity" value="1" name="quantity">
										</div>
										<ul id="menu">
										  <li>Inventory: 0</li>
										  <li>Sales: 0</li>
										  <li>Orders: 0</li>
										</ul>
										
									</div>
									<div class="col-md-12 " >
										<a href="/HMadmin" class="btn btn-default btn-md flat" style="color:black" ><i class="fa fa-shopping-cart cart-cart-cart" ></i>Add to Cart</a>
										<a href="/HMadmin" class="btn btn-default btn-md flat" style="color:black" ><i class="fa fa-heart heart" ></i>To Favorites</a>
										<a href="/HMadmin" class="btn btn-default btn-md flat" style="color:black" ><i class="fa fa-star star" ></i>To Wishlist</a>
										</br>
										</br>
									</div>
									
								</div>
								
							</div>
						</div>
						<div class="col-md-12" style="padding:10px; "  >
							  <ul class="nav nav-tabs">
								<li class="active"><a data-toggle="tab" href="#home">Product Description</a></li>
								<li><a data-toggle="tab" href="#menu1">Review</a></li>
							  </ul>

							  <div class="tab-content">
								<div id="home" class="tab-pane fade in active">
								  <h3>Product Description</h3>
								  <p>{{ucFirst($ProductInfo->product_description)}}</p>
								</div>
								<div id="menu1" class="tab-pane fade">
										<fieldset class="rating" onclick="javascript:void()">
											<h3>Reviews</h3>
											<input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="Rocks!">5 stars</label>
											<input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="Pretty good">4 stars</label>
											<input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="Meh">3 stars</label>
											<input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="Kinda bad">2 stars</label>
											<input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="Sucks big time">1 star</label>
										</fieldset>
									<div class="col-md-12" style="padding:10px; "  >
										<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
									</div>
								
								</div>
							  </div>
						</div>
						
					</div>
				</div>
				
				<div class="col-md-3 " style="padding:2px; "  >
					
					<div class="col-md-12 box" style="padding:10px; background:white;">
					
                    <!-- *** MENUS AND FILTERS ***________ -->
                    <h4>{{ucFirst($ProductInfo->store->store_name)}} Category</h4>
                      
                            <ul class="nav nav-pills nav-stacked category-menu">
                                <li>
                                    <a href="category.html">Men <span class="badge pull-right">42</span></a>
                                    <ul>
                                        <li><a href="category.html" class="link">T-shirts</a>
                                        </li>
                                        <li><a href="category.html" class="link">Shirts</a>
                                        </li>
                                        <li><a href="category.html" class="link">Pants</a>
                                        </li>
                                        <li><a href="category.html" class="link">Accessories</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="category.html">Ladies  <span class="badge pull-right">123</span></a>
                                    <ul>
                                        <li><a href="category.html" class="link">T-shirts</a>
                                        </li>
                                        <li><a href="category.html" class="link">Skirts</a>
                                        </li>
                                        <li><a href="category.html" class="link">Pants</a>
                                        </li>
                                        <li><a href="category.html" class="link">Accessories</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="category.html">Kids  <span class="badge pull-right">11</span></a>
                                    <ul>
                                        <li><a href="category.html" class="link">T-shirts</a>
                                        </li>
                                        <li><a href="category.html" class="link">Skirts</a>
                                        </li>
                                        <li><a href="category.html" class="link">Pants</a>
                                        </li>
                                        <li><a href="category.html" class="link">Accessories</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        
         
					</div>
                </div> 
			</div> 	
                    <!-- *** MENUS AND FILTERS END *** -->
               <div class="col-md-12" style="padding:0px; " >
					<center><h3>Related Product</h3></center>
						 @for ($x = 0; $x < 12; $x++)
							<div class="col-md-2 col-xs-6" style="padding:2px;">
									<div class="box" style="padding:0px;">
											<a href="/product/details/sample"><center><img class="img-responsive"  data-src="{{ URL::asset('assets/img/category/grocery/1.png') }}" data-src-retina="{{ URL::asset('assets/img/category/grocery/1.png') }}" src="{{ URL::asset('assets/img/loading.gif') }}" /></center></a>
											<div class="item-desc" style="padding:10px" >
												<a href="/product/details/sample"><h4 >Product Namessssssss</h4></a>
												<a href="/product/details/sample"><p >P 100.00</p></a>
												<div id="navcontainer">
												<ul>
													<li><a href="" ><i class="fa fa-shopping-cart cart" ></i></a></li>
													<li><a href="" class="alignright-icon"><i class="fa fa-heart heart" ></i></a></li>
													<li><a href="" class="alignright-icon"><i class="fa fa-star star" ></i></a></li>
												</ul>
												</div>
												
											</div>
									</div>
							</div>
						@endfor	
					</div>
				</div>
			
			@endforeach	
						
@endsection


@section('page-script')
<script>
</script>	
	
@endsection