@extends('client.master.master')

@section('title', 'Market Place')

@section('content')

			<div class="container">
				<div class="col-md-12 market "  style="padding:0px;" >
					
					<div class="col-md-3 same-height-row" style="padding:0px;" >
						<div class="col-md-12  market-logo box" >
							 <center><img class="img-responsive" src="{{ URL::asset('assets/img/market/'.$market.'.png') }}" alt=""></center>
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
						@if($type=='online')
							<?php $types="Online"; ?>
						@elseif($type=='most-visited')
							<?php $types="Most Visited"; ?>
						@elseif($type=='new')
							<?php $types="New"; ?>
						@elseif($type=='all')
							<?php $types="All"; ?>
						@endif
						  <h4 class="alignleft">{{ucfirst($market)}} {{$types}} Store</h4>
					</div>
				</div>
				<div class="col-md-8 col-xs-12 same-height-row" style="padding:0px; ">
					<div id="textbox">
						  <div id="navcontainer" >
								<ul>
									<li><a href="/market/{{$market}}/stores/online" class="alignright-market">Online</a></li>
									<li><a href="/market/{{$market}}/stores/most-visited" class="alignright-market" >Most Visited</a></li>
									<li><a href="/market/{{$market}}/stores/new" class="alignright-market">New</a></li>
									<li><a href="/market/{{$market}}/stores/all" class="alignright-market">All</a></li>
								</ul>
							</div>
					</div>
				</div>
				<div style="clear: both;"></div>
            </div>
            <div id="advantages" >
                <div class="container">
					<div class="col-md-12 market box" style="margin-bottom:40px;" >
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