@extends('client.master.master')

@section('title', 'Market Place')

@section('content')

			<div class="container">
				<div class="col-md-12 market "  style="padding:0px; margin-top:-15px;" >
					
					<div class="col-md-3 same-height-row" style="padding:0px;" >
						<div class="col-md-12  market-logo box" >
							 <a href="/{{$market}}"><center><img class="img-responsive" src="{{ URL::asset('assets/img/market/'.$market.'.png') }}" alt=""></center></a>
						</div>
					</div>
					<div class="col-md-9 same-height-row market-slide">
						<div id="main-slider" style="padding-bottom:0px;">
							<div class="item" style="background:#32ace8;" >
								<center><img class="img-responsive" src="{{ URL::asset('assets/img/market/slides/'.$market.'/slide1.png') }}" alt=""></center>
							</div>
							<div class="item"  >
								<center><img class="img-responsive" src="{{ URL::asset('assets/img/market/slides/'.$market.'/slide2.png') }}" alt=""></center>
							</div>							
						</div>		
					</div>
				</div>
				<div class="col-md-4 col-xs-12 same-height-row" style="padding:0px; ">
					<div id="textbox">
						  <h4 class="alignleft">{{$market}} Store List</h4>
					</div>
				</div>
				<div class="col-md-8  col-xs-12 same-height-row" style="padding:0px; ">
					<div id="textbox">
						  <div id="navcontainer" >
								<ul>
									<li><a href="/{{$market}}/Stores/Online" class="alignright-market">Online</a></li>
									<li><a href="/{{$market}}/Stores/Most-Visited" class="alignright-market" >Most Visited</a></li>
									<li><a href="/{{$market}}/Stores/New" class="alignright-market">New</a></li>
									<li><a href="/{{$market}}/Stores/All" class="alignright-market">All</a></li>
								</ul>
							</div>
					</div>
				</div>
				<div style="clear: both;"></div>
            </div>
            <div id="advantages" >
                <div class="container">
					<div class="col-md-12 market box" >
						<div class="col-md-12 same-height-row" style="padding:0px; ">
							<div class="col-md-3  col-xs-6 store-logo" >
								<div class="wraptocenter"><span></span><img src="{{ URL::asset('assets/img/store/store1.png') }}" alt="..."></div>
							</div>
							<div class="col-md-3 col-xs-6 store-logo" >
								<div class="wraptocenter"><span></span><img src="{{ URL::asset('assets/img/store/store2.png') }}" alt="..."></div>
							</div>
							<div class="col-md-3 col-xs-6 store-logo" >
								<div class="wraptocenter"><span></span><img src="{{ URL::asset('assets/img/store/store3.jpg') }}" alt="..."></div>
							</div>
							<div class="col-md-3 col-xs-6 store-logo" >
								<div class="wraptocenter"><span></span><img src="{{ URL::asset('assets/img/store/store4.png') }}" alt="..."></div>
							</div>
							<div class="col-md-3 col-xs-6 store-logo" >
								<div class="wraptocenter"><span></span><img src="{{ URL::asset('assets/img/store/store6.png') }}" alt="..."></div>
							</div>
							<div class="col-md-3 col-xs-6 store-logo" >
								<div class="wraptocenter"><span></span><img src="{{ URL::asset('assets/img/store/store7.jpg') }}" alt="..."></div>
							</div>
							<div class="col-md-3 col-xs-6 store-logo" >
								<div class="wraptocenter"><span></span><img src="{{ URL::asset('assets/img/store/store4.png') }}" alt="..."></div>
							</div>
							<div class="col-md-3 col-xs-6 store-logo" >
								<div class="wraptocenter"><span></span><img src="{{ URL::asset('assets/img/store/store6.png') }}" alt="..."></div>
							</div>
							<div class="col-md-3  col-xs-6 store-logo" >
								<div class="wraptocenter"><span></span><img src="{{ URL::asset('assets/img/store/store7.jpg') }}" alt="..."></div>
							</div>							
						</div>
					</div>
                </div>
            </div>
         
		
			<div class="container">
				<div class="col-md-12 " style="padding:0px" >
					<div class="col-md-12" style="padding:2px">
						<div id="textbox">
						  <h4 class="alignleft">Category</h4>
						   <a  href="/{{$market}}/Category/All" class="alignright" >See All Category</a>
						</div>
						<div style="clear: both;"></div>
					</div>
				@foreach($market_data_category as $market_data_category )
				<?php $count=0; ?>
					@foreach($market_data_category->category as $category )
						@if($count<4)
						<?php $count++; ?>
								<div class="col-md-3 col-xs-6" style="padding:2px">
									<div class="box">
										<a href="/{{$market_data_category->market_name}}/Category/{{str_replace(' ','-',$category->category_name)}}/All"> <center><img class="img-responsive"  data-src="{{ URL::asset('assets/img/category/'.strtolower($market_data_category->market_name).'/'.$category->id.'.png') }}" data-src-retina="{{ URL::asset('assets/img/category/'.strtolower($market_data_category->market_name).'/'.$category->id.'.png') }}" src="{{ URL::asset('assets/img/loading.gif') }}" alt="" /></center></a>
										<div class="list-group" style="margin-bottom:0px; border-radius: 0px 0px 0px 0px;" >
										  <a href="/Product/Details/sample" class="list-group-item category-products" >
											<img class="alignleft" src="{{ URL::asset('assets/img/store/samplestore/product/1.jpg') }}" alt="..." >
											<h5 class="list-group-item-heading">Product Name</h5>
											<p class="list-group-item-text">P 100.00</p>
										  </a>
										  <a href="/Product/Details/sample1" class="list-group-item category-products" >
											<img class="alignleft" src="{{ URL::asset('assets/img/store/samplestore/product/1.jpg') }}" alt="..." >
											<h5 class="list-group-item-heading">Product Name</h5>
											<p class="list-group-item-text">P 100.00</p>
										  </a>
										   <a href="/Product/Details/sample2" class="list-group-item category-products" >
											<img class="alignleft" src="{{ URL::asset('assets/img/store/samplestore/product/1.jpg') }}" alt="..." >
											<h5 class="list-group-item-heading">Product Name</h5>
											<p class="list-group-item-text">P 100.00</p>									
										  </a>
										</div>
									</div>
								</div>
						@endif
					@endforeach	
				@endforeach	
				</div>
			</div>
			<div class="container" >
				<div class="col-md-12" style="padding:5px; margin-top:-20px;">
							<div class="col-md-4 col-xs-12 same-height-row" style="padding:0px; ">
							<div id="textbox">
								  <h4 class="alignleft">Products</h4>
							</div>
							</div>
							<div class="col-md-8 col-xs-12 same-height-row" style="padding:0px; ">
							<div id="textbox">
								  <div id="navcontainer" >
										<ul>
											<li><a href="/{{$market}}/Product/Sale" class="alignright-market">Sale</a></li>
											<li><a href="/{{$market}}/Product/Popular" class="alignright-market" >Popular</a></li>
											<li><a href="/{{$market}}/Product/New" class="alignright-market">New</a></li>
											<li><a href="/{{$market}}/Product/All" class="alignright-market">All</a></li>
										</ul>
									</div>
							</div>
							</div>
				<div style="clear: both;"></div>
				</div>	
			</div>
                <div class="container" >
					<div class="col-md-12" style="padding:2px; margin-top:20px;" >
						<div class="col-md-12" style="padding:0px">
						@for ($x = 0; $x < 12; $x++)
							<div class="col-md-2 col-xs-6" style="padding:2px; margin-top:-25px;">
									<div class="box">
											<a href="/Product/Details/sample"><center><img class="img-responsive" src="{{ URL::asset('assets/img/category/grocery/1.png') }}" alt=""></center></a>
											<div class="item-desc" style="padding:10px" >
												<a href="/Product/Details/sample"><h4 >Product Namessssssss</h4></a>
												<a href="/Product/Details/sample"><p >P 100.00</p></a>
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
                </div>
			 <!--<div class="container">
				<div id="myCarousel" class="carousel slide" data-ride="carousel">
					<div class="carousel-inner">
						<div class="item active">
						</div>
						 <div class="item">
						</div>
						<div class="item">
						</div>
						<div class="item">
						</div>	
						</div>
						<ul class="nav nav-pills nav-justified">
						  <li data-target="#myCarousel" data-slide-to="0" class="active"><a href="#">About<small>Lorem ipsum dolor sit</small></a></li>
						  <li data-target="#myCarousel" data-slide-to="1"><a href="#">Projects<small>Lorem ipsum dolor sit</small></a></li>
						  <li data-target="#myCarousel" data-slide-to="2"><a href="#">Portfolio<small>Lorem ipsum dolor sit</small></a></li>
						  <li data-target="#myCarousel" data-slide-to="3"><a href="#">Services<small>Lorem ipsum dolor sit</small></a></li>
						</ul>
				</div>
			</div> -->
			
			
			
			
			
			
        
						
@endsection


@section('page-script')
	

	<script type="text/javascript">
		// $(document).ready( function() {
			// $('#myCarousel').carousel({
				// interval:   4000
			// });
			
			// var clickEvent = false;
			// $('#myCarousel').on('click', '.nav a', function() {
					// clickEvent = true;
					// $('.nav li').removeClass('active');
					// $(this).parent().addClass('active');		
			// }).on('slid.bs.carousel', function(e) {
				// if(!clickEvent) {
					// var count = $('.nav').children().length -1;
					// var current = $('.nav li.active');
					// current.removeClass('active').next().addClass('active');
					// var id = parseInt(current.data('slide-to'));
					// if(count == id) {
						// $('.nav li').first().addClass('active');	
					// }
				// }
				// clickEvent = false;
			// });
		// });
		function viewAnnouncement(id,date){
			var announcement_id = id;
			var announcement_date = date;
			$.post("/getAnnouncement", {announcement_id: announcement_id}, function(result){	
				var obj = JSON.parse(result);
				$("#announcement_preview").show();
				document.getElementById("announce_title").innerHTML = obj[0].title.replace(/\n/g, "<br />");;
				document.getElementById("announce_desc").innerHTML = obj[0].description.replace(/\n/g, "<br />");;
				document.getElementById("announce_date").innerHTML = "&nbsp;&nbsp;"+announcement_date;
				$('html, body').animate({ scrollTop: 0 }, 'fast');
			});
		}
		
		$(function() {
				var oTable1 = $('#sample-table-2').dataTable( {
				"aoColumns": [
			      { "bSortable": false },
			      null, null, null,
				  { "bSortable": false }
				] } );
				

			})
	</script>
	
	
	
@endsection