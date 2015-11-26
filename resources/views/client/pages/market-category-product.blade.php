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
            </div>
			<div class="container">
			<div class="col-md-12" style="padding:2px">
						<div id="textbox">
						  <h4 class="alignleft">{{ucfirst($category_name)}}</h4>
						</div>
						<div style="clear: both;"></div>
					</div>
				<div class="col-md-12 " style="padding:0px; margin-bottom:40px;" >
					<div class="col-md-12 col-xs-12" style="padding:2px">
								@for ($x = 0; $x < 12; $x++)
									<div class="col-md-2 col-xs-6" style="padding:2px; ">
											<div class="box">
													<a href="/product/details/sample"><center><img class="img-responsive" src="{{ URL::asset('assets/img/category/grocery/1.png') }}" alt=""></center></a>
													<div class="item-desc" style="padding:10px" >
														<a href="/product/details/sample"><h4 >Product Namessssssss</h4></a>
														<a href="/product/details/sample"><p >P 100.00</p></a>
														<div id="navcontainer">
														<ul>
															<li><a href="" ><i class="fa fa-shopping-cart cart" ></i></a></li>
															<li><a href=""><i class="fa fa-heart heart" ></i></a></li>
															<li><a href=""><i class="fa fa-star star" ></i></a></li>
														</ul>
														</div>
														
													</div>
											</div>
									</div>
								@endfor	
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