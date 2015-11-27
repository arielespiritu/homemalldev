@extends('client.master.master')

@section('title', 'Market Place')

@section('content')

    <div id="all">
		<div id="main-slider" > 
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
	</div>
		<div id="hot" style="margin-top:80px;">
			<?php 
				$bg=array("#f6ecb7","#103f71","#ca27f4","#4a79f5"); 
				$num = 0;
			?>
			@foreach($market_data as $markets_datas )
			<?php $count=0; ?>
				
                <div class="box"  style="background:{{$bg[$num]}}; padding:0px; margin-top:50px;  margin-bottom:12px;">
                    <center><img class="img-responsive" style="margin-top:-80px;" src="{{ URL::asset('assets/img/market/'.strtolower($markets_datas->market_name).'-add.png') }}" alt=""></center>
                </div>
				<div style="clear: both;"></div>
				   <div class="container">

						<div style="clear: both;"></div>
                        <div class="col-md-12 market box" >
							
							<div class="col-md-3 same-height-row" style="padding:0px; ">
								<div class="col-md-12  market-logo" >
									 <a  href="/market/{{strtolower($markets_datas->market_name)}}"><center><img class="img-responsive" src="{{ URL::asset('assets/img/market/'.strtolower($markets_datas->market_name).'.png') }}" alt=""></center></a>
								</div>
							</div>
							<div class="col-md-9 same-height-row" style="padding:0px; ">
								<div class="col-md-4  col-xs-6 store-logo" >
									<div class="wraptocenter"><span></span><img src="{{ URL::asset('assets/img/store/store1.png') }}" alt="..."></div>
								</div>
								<div class="col-md-4 col-xs-6 store-logo" >
									<div class="wraptocenter"><span></span><img src="{{ URL::asset('assets/img/store/store2.png') }}" alt="..."></div>
								</div>
								<div class="col-md-4 col-xs-6 store-logo" >
									<div class="wraptocenter"><span></span><img src="{{ URL::asset('assets/img/store/store3.jpg') }}" alt="..."></div>
								</div>
								<div class="col-md-4 col-xs-6 store-logo" >
									<div class="wraptocenter"><span></span><img src="{{ URL::asset('assets/img/store/store4.png') }}" alt="..."></div>
								</div>
								<div class="col-md-4 col-xs-6 store-logo" >
									<div class="wraptocenter"><span></span><img src="{{ URL::asset('assets/img/store/store6.png') }}" alt="..."></div>
								</div>
								<div class="col-md-4 col-xs-6 store-logo" >
									<div class="wraptocenter"><span></span><img src="{{ URL::asset('assets/img/store/store7.jpg') }}" alt="..."></div>
								</div>
								<div class="col-md-4 col-xs-6 store-logo" >
									<div class="wraptocenter"><span></span><img src="{{ URL::asset('assets/img/store/store4.png') }}" alt="..."></div>
								</div>
								<div class="col-md-4 col-xs-6 store-logo" >
									<div class="wraptocenter"><span></span><img src="{{ URL::asset('assets/img/store/store6.png') }}" alt="..."></div>
								</div>
								<div class="col-md-4  col-xs-6 store-logo" >
									<div class="wraptocenter"><span></span><img src="{{ URL::asset('assets/img/store/store7.jpg') }}" alt="..."></div>
								</div>							
							</div>
                        </div>
                </div>
				
				
				
				<div class="container" >

						@foreach($markets_datas->category as $category )
							@if($count<4)
							
							<?php $count++; ?>
								<div class="col-md-3 col-xs-6" style="padding:2px">
									<div class="box">
										<a href="/market/{{strtolower($markets_datas->market_name)}}/category/product/{{str_replace(' ','-',$category->category_name)}}"> <center><img class="img-responsive" src="{{ URL::asset('assets/img/category/'.$markets_datas->market_name.'/'.$count.'.png') }}" alt=""></center></a>
										<div class="list-group" style="margin-bottom:0px; border-radius: 0px 0px 0px 0px;" >
										  <a href="/product/details/sample" class="list-group-item category-products" >
											<img class="alignleft" src="{{ URL::asset('assets/img/store/samplestore/product/1.jpg') }}" alt="..." >
											<h5 class="list-group-item-heading">Product Name</h5>
											<p class="list-group-item-text">P 100.00</p>
										  </a>
										  <a href="/product/details/sample1" class="list-group-item category-products" >
											<img class="alignleft" src="{{ URL::asset('assets/img/store/samplestore/product/1.jpg') }}" alt="..." >
											<h5 class="list-group-item-heading">Product Name</h5>
											<p class="list-group-item-text">P 100.00</p>
										  </a>
										   <a href="/product/details/sample2" class="list-group-item category-products" >
											<img class="alignleft" src="{{ URL::asset('assets/img/store/samplestore/product/1.jpg') }}" alt="..." >
											<h5 class="list-group-item-heading">Product Name</h5>
											<p class="list-group-item-text">P 100.00</p>									
										  </a>
										</div>
									</div>
								</div>
							@endif
						@endforeach	
						<div class="col-md-12 " style="padding:0px; margin-top:-10px;"  >
							<div id="textbox">
								  <a  href="/market/{{strtolower($markets_datas->market_name)}}" class="alignright" style="margin-top:-20px;">See More</a>
							</div>
						</div>
					</div>

                </div>
     		<?php $num++; ?>
			@endforeach	
				
			
           <div class="container" >
				<div class="col-md-12" style="padding:2px; margin-top:-25px;">
					<div class="col-md-12 box" >
							<h3 class="text-uppercase text-center">Brands</h3>
							<p class="lead text-center">Choose your branded items!</p>
					</div>
				</div>
			</div>
            <div class="container" >
                <div class="col-md-12" style="padding:2px; margin-top:-25px;" >
                    <div class="box" >
                        <div id="get-inspired" class="owl-carousel owl-theme">
                            <div class="item">
                               <div class="col-sm-12 " style="padding:0px;  ">
									<div class="col-sm-12 same-height-row" style="padding:0px; ">							
										<div class="col-sm-2 col-xs-6 store-logo" >
											<div class="wraptocenter"><span></span><img src="{{ URL::asset('assets/img/store/store1.png') }}" alt="..."></div>
										</div>
										<div class="col-sm-2 col-xs-6 store-logo" >
											<div class="wraptocenter"><span></span><img src="{{ URL::asset('assets/img/store/store2.png') }}" alt="..."></div>
										</div>
										<div class="col-sm-2 col-xs-6 store-logo" >
											<div class="wraptocenter"><span></span><img src="{{ URL::asset('assets/img/store/store3.jpg') }}" alt="..."></div>
										</div>
										<div class="col-sm-2 col-xs-6 store-logo" >
											<div class="wraptocenter"><span></span><img src="{{ URL::asset('assets/img/store/store4.png') }}" alt="..."></div>
										</div>
										<div class="col-sm-2 col-xs-6 store-logo" >
											<div class="wraptocenter"><span></span><img src="{{ URL::asset('assets/img/store/store6.png') }}" alt="..."></div>
										</div>
										<div class="col-sm-2 col-xs-6 store-logo" >
											<div class="wraptocenter"><span></span><img src="{{ URL::asset('assets/img/store/store7.jpg') }}" alt="..."></div>
										</div>
										<div class="col-sm-2 col-xs-6 store-logo" >
											<div class="wraptocenter"><span></span><img src="{{ URL::asset('assets/img/store/store4.png') }}" alt="..."></div>
										</div>
										<div class="col-sm-2 col-xs-6 store-logo" >
											<div class="wraptocenter"><span></span><img src="{{ URL::asset('assets/img/store/store6.png') }}" alt="..."></div>
										</div>
										<div class="col-sm-2 col-xs-6 store-logo" >
											<div class="wraptocenter"><span></span><img src="{{ URL::asset('assets/img/store/store7.jpg') }}" alt="..."></div>
										</div>
										<div class="col-sm-2 col-xs-6 store-logo" >
											<div class="wraptocenter"><span></span><img src="{{ URL::asset('assets/img/store/store4.png') }}" alt="..."></div>
										</div>
										<div class="col-sm-2 col-xs-6 store-logo" >
											<div class="wraptocenter"><span></span><img src="{{ URL::asset('assets/img/store/store6.png') }}" alt="..."></div>
										</div>
										<div class="col-sm-2 col-xs-6 store-logo" >
											<div class="wraptocenter"><span></span><img src="{{ URL::asset('assets/img/store/store7.jpg') }}" alt="..."></div>
										</div>
										<div class="col-sm-2 col-xs-6 store-logo" >
											<div class="wraptocenter"><span></span><img src="{{ URL::asset('assets/img/store/store1.png') }}" alt="..."></div>
										</div>
										<div class="col-sm-2 col-xs-6 store-logo" >
											<div class="wraptocenter"><span></span><img src="{{ URL::asset('assets/img/store/store2.png') }}" alt="..."></div>
										</div>
										<div class="col-sm-2 col-xs-6 store-logo" >
											<div class="wraptocenter"><span></span><img src="{{ URL::asset('assets/img/store/store3.jpg') }}" alt="..."></div>
										</div>
										<div class="col-sm-2 col-xs-6 store-logo" >
											<div class="wraptocenter"><span></span><img src="{{ URL::asset('assets/img/store/store4.png') }}" alt="..."></div>
										</div>
										<div class="col-sm-2 col-xs-6 store-logo" >
											<div class="wraptocenter"><span></span><img src="{{ URL::asset('assets/img/store/store6.png') }}" alt="..."></div>
										</div>
										<div class="col-sm-2 col-xs-6 store-logo" >
											<div class="wraptocenter"><span></span><img src="{{ URL::asset('assets/img/store/store7.jpg') }}" alt="..."></div>
										</div>
										<div class="col-sm-2 col-xs-6 store-logo" >
											<div class="wraptocenter"><span></span><img src="{{ URL::asset('assets/img/store/store4.png') }}" alt="..."></div>
										</div>
										<div class="col-sm-2 col-xs-6 store-logo" >
											<div class="wraptocenter"><span></span><img src="{{ URL::asset('assets/img/store/store6.png') }}" alt="..."></div>
										</div>
										<div class="col-sm-2 col-xs-6 store-logo" >
											<div class="wraptocenter"><span></span><img src="{{ URL::asset('assets/img/store/store7.jpg') }}" alt="..."></div>
										</div>
										<div class="col-sm-2 col-xs-6 store-logo" >
											<div class="wraptocenter"><span></span><img src="{{ URL::asset('assets/img/store/store4.png') }}" alt="..."></div>
										</div>
										<div class="col-sm-2 col-xs-6 store-logo" >
											<div class="wraptocenter"><span></span><img src="{{ URL::asset('assets/img/store/store6.png') }}" alt="..."></div>
										</div>
										<div class="col-sm-2 col-xs-6 store-logo" >
											<div class="wraptocenter"><span></span><img src="{{ URL::asset('assets/img/store/store7.jpg') }}" alt="..."></div>
										</div>													
									</div>
								</div>	
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class=""  >
                <div class="container" >
					<div class="col-md-12" style="padding:2px; margin-top:-25px;" >
						<div class="col-md-12 box" >
							<h3 class="text-uppercase text-center">Trending</h3>
							<p class="lead text-center">Check our new and hottest items!</p>
						</div>
						<div class="col-md-12" style="padding:0px">
						@for ($x = 0; $x < 18; $x++)
							<div class="col-md-2 col-xs-6" style="padding:2px; margin-top:-23px;">
									<div class="box">
											<a href="/product/details/sample"><center><img class="img-responsive" src="{{ URL::asset('assets/img/category/grocery/1.png') }}" alt=""></center></a>
											<div class="item-desc" style="padding:10px" >
												<a href="/product/details/sample"><h4 >Product Namessssssss</h4>
												<a href="/product/details/sample"><p >P 100.00</p></h4>
												<div id="navcontainer">
												<ul>
													<li><a href="" ><i class="fa fa-shopping-cart cart " ></i></a></li>
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
            </div>
        </div>
		
		<div style="background:#fff;" >
		<div class="container">
            <div class="row">
			<br>
				<div class="col-md-12" style="padding:0px;">
					<div class="col-md-2 img-footer" style="padding:20px;" >
						<center>
							<img class="" src="{{ URL::asset('assets/img/convenience.png') }}" alt="..." >
							<h4 class="text-center">Convenience</h4>
							<p class="text-center">You don't need to get dressed and  drive to your favorite store.</p>
						</center>
					</div>
					<div class="col-md-2 img-footer" style="padding:20px" >
						<center>
							<img class="" src="{{ URL::asset('assets/img/DeliveryIcon.png') }}" alt="..." >
							<h4 class="text-center">Shipping</h4>
							<p class="text-center"> We ship first in National Capital Region (NCR) with our logisctic partner.</p>
						</center>
					</div>
					<div class="col-md-2 img-footer" style="padding:20px" >
						<center>
							<img class="" src="{{ URL::asset('assets/img/SafePayment.png') }}" alt="..." >
							<h4 class="text-center">Payment</h4>
							<p class="text-center"> Pay with the world’s most popular and secure payment methods..</p>
						</center>
					</div>
					<div class="col-md-2 img-footer" style="padding:20px" >
						<center>
							<img class="" src="{{ URL::asset('assets/img/ShopWithConfidence.png') }}" alt="..." >
							<h4 class="text-center">Shop with Confidence</h4>
							<p class="text-center"> Our Buyer Protection covers your purchase from click to delivery..</p>
						</center>
					</div>
					<div class="col-md-2 img-footer" style="padding:20px" >
						<center>
							<img class="" src="{{ URL::asset('assets/img/HelpCenter.png') }}" alt="..." >
							<h4 class="text-center">24/7 Help Center</h4>
							<p class="text-center"> Round-the-clock assistance for a smooth shopping experience..</p>
						</center>
					</div>
					<div class="col-md-2" style="padding:20px" >
						<center>
						</br>
							<img class="" src="{{ URL::asset('assets/img/1googlePlay.png') }}" alt="..." style="height:30px; width:120px;" >
							<h4 class="text-center">Andriod app</h4>
							<p class="text-center"> Download the app and get the world of HomeMallPH at your fingertips..</p>
						</center>
					</div>
				
				</div>

			</div>
		</div>
	</div>
						
@endsection


@section('page-script')
	

	<script type="text/javascript">
	
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