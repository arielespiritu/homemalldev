@extends('client.master.master')

@section('title', 'Market Place')

@section('content')

			<div class="container">
				<div class="col-md-12 market "  style="padding:0px;" >
					
					<div class="col-md-3 same-height-row" style="padding:0px; ">
						<div class="col-md-12  market-logo box" >
						@if($market=='grocery')
							<?php $market="Grocery"; ?>
							<center><img class="img-responsive" src="{{ URL::asset('assets/img/market/grocery.png') }}" alt=""></center>
						@elseif($market=='apparel')
							<?php $market="Apparel"; ?>
							<center><img class="img-responsive" src="{{ URL::asset('assets/img/market/apparel.png') }}" alt=""></center>
						@elseif($market=='gadget')
							<?php $market="Gadget"; ?>
							<center><img class="img-responsive" src="{{ URL::asset('assets/img/market/gadgets.png') }}" alt=""></center>
						@elseif($market=='furniture')
							<?php $market="Furniture"; ?>	
							<center><img class="img-responsive" src="{{ URL::asset('assets/img/market/furniture.png') }}" alt=""></center>
						@endif
							 
						</div>
					</div>
					<div class="col-md-9 same-height-row" style="padding:0px; ">
						
								<div id="main-slider" style="padding:0px; margin-bottom:0px;">
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
					</div>
				</div>
            </div>

			<div class="container">
				<div class="col-md-12 " style="padding:0px; margin-bottom:40px;" >
					<div class="col-md-12" style="padding:2px">
						<div id="textbox">
						  <h4 class="alignleft">{{$market}} Categories</h4>
						</div>
						<div style="clear: both;"></div>
					</div>
					<div class="col-md-3 col-xs-6" style="padding:2px">
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
					<div class="col-md-3  col-xs-6" style="padding:2px">
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
					<div class="col-md-3 col-xs-6" style="padding:2px">
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
					<div class="col-md-3 col-xs-6" style="padding:2px">
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
			</div>
			
						
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