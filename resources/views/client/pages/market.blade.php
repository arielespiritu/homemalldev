@extends('client.master.master')

@section('title', 'HomemallPH - Market Place')

@section('content')

    <div id="all">
					
			<div id="main-slider" style="margin-top:-15px;"> 
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
   
		<div id="hot" style="margin-top:10px;">
			<div class="container" >
				<div class="col-md-12" style="padding:0px;" >
					<div class="col-md-12 box" >
						<img class="img-responsive" src="{{ URL::asset('assets/img/market/featuredItem.png') }}" alt="Homemallph Market">
					</div>
					<div class="col-md-12" style="padding:0px" id="featured-products">
					<?php $countss = 0;$order = array();?>
					@foreach($featured_products as $featured_products )
						<div class="col-md-2 col-xs-6" style="padding:2px; margin-top:-25px;">
							@if(count($featured_products->product_info)>0)
								@if($countss<12)
								<?php $countss++;?>
								<div class="box" style="position: relative;" >
									<img class="img-responsive" style="position: absolute;top: 0px; left: 0;"  src="{{ URL::asset('assets/img/sale.png') }}" alt="">
									<a href="/Product/Details/{{$featured_products->product_info->id}}/{{encodeUrlRoute($featured_products->product_info->product_name)}}">
									<center>
									<?php $countimg=0;?>
									@foreach($featured_products->product_info->product as $products )
										@if($countimg==0)
											<?php $countimg++; $order['data1'] = $products->id;?>
												<img class="img-responsive"  data-src="{{ URL::asset(getSingleImageProduct($products->id,$featured_products->product_info->store->store_name)) }}" src="{{ URL::asset('assets/img/loading.gif') }}" alt="">
										@endif
									@endforeach	
									</center></a>
									<div class="item-desc" style="padding:10px" >
										<a href="/Product/Details/{{$featured_products->product_info->id}}/{{encodeUrlRoute($featured_products->product_info->product_name)}}"><h4 >{{$featured_products->product_info->product_name}}</h4></a>
										<?php $count=0; $order['data2'] = $featured_products->product_info->product_name;?>
										@foreach($featured_products->product_info->product as $product )
											@if($count==0)
												<?php $count++;
												$order['data3'] = $product->sale_price; 
												$order['data4'] = 1;?>
												<h4><p >&#8369;&nbsp;&nbsp;{{$product->sale_price}}</p></h4>
											@endif
										@endforeach	
										<button onclick="addCart({{json_encode($order)}})" class="btn btn-default pull-right btn-xs" style="margin-top:-30px; padding:4px 3px 4px 3px;"><i class="fa fa-shopping-cart cart-cart"></i></button>
									</div>
									
								</div>
								@endif
							@endif
						</div>
					@endforeach	
					</div>
				</div>
			</div>
			<div class="container" >
				<div class="col-md-12" style="padding:0px; margin-top:-24px; margin-bottom:-26px" >
						<div class="col-md-12 box" >
							<img class="img-responsive" src="{{ URL::asset('assets/img/market/markets.png') }}" alt="Homemallph Market">
						</div>
				</div>
			</div>			

			<?php 
				$bg=array("#f6ecb7","#103f71","#ca27f4","#4a79f5"); 
				$num = 0;
			?>
			@foreach($market_data as $markets_datas )
			<?php $count=0; ?>
			<div class="box"  style="background:{{$bg[$num]}}; padding:0px; margin-top:80px;  margin-bottom:10px;">
				<center><img class="img-responsive" style="margin-top:-80px;" src="{{ URL::asset('assets/img/market/'.$markets_datas->market_name.'-add.png') }}" alt=""></center>
			</div>
			<div style="clear: both;"></div>
			<div class="container">
					<div style="clear: both;"></div>
					<div class="col-md-12 market box" >
						
						<div class="col-md-3 same-height-row" style="padding:0px; ">
							<div class="col-md-12  market-logo" >
								 <a  href="/{{$markets_datas->market_name}}"><center><img class="img-responsive" src="{{ URL::asset('assets/img/market/'.$markets_datas->market_name.'.png') }}" alt=""></center></a>
							</div>
						</div>
						<div class="col-md-9 same-height-row" style="padding:0px; ">
						@foreach($featured_store as $stores )
							@if($stores->market_id==$markets_datas->id)
								<a href="/Store/{{$stores->store_id}}" ><div class="col-md-4  col-xs-6 store-logo" >
									<div class="wraptocenter"><span></span><img src="{{ URL::asset(getStoreBanner($stores->store->store_name)) }}" alt="..."></div>
								</div></a>	
							@endif
						@endforeach
						</div>
					</div>
                </div>

				<div class="container" >
						@foreach($featured_category as $category )
							@if($category->category->market_id==$markets_datas->id)
								<div class="col-md-3 col-xs-6" style="padding:2px; margin-bottom:-22px;">
									<div class="box">
										<a href="/{{$markets_datas->market_name}}/Category/{{str_replace(' ','-',$category->category->category_name)}}/All"> <center><img class="img-responsive"  data-src="{{ URL::asset('assets/img/category/'.$markets_datas->market_name.'/'.$category->category->id.'.png') }}" data-src-retina="{{ URL::asset('assets/img/category/'.$markets_datas->market_name.'/'.$category->category->id.'.png') }}" src="{{ URL::asset('assets/img/loading.gif') }}" alt="" /></center></a>
										<div class="list-group" style="margin-bottom:0px; border-radius: 0px 0px 0px 0px; " >
										<?php $prodCounts=0; ?>
										@foreach($category->categoryProduct as $products )
													@if($prodCounts<3)
														<a href="/Product/Details/{{$products->products->id}}/{{encodeUrlRoute($products->products->product_name)}}" class="list-group-item category-products"  >
															<?php $imgCounts=0; ?>
															@foreach($products->products->product as $productss )
																@if($imgCounts==0)
																<img class="alignleft"  data-src="{{ URL::asset(getSingleImageProduct($productss->id,$products->products->store->store_name)) }}" data-src-retina="" src="{{ URL::asset('assets/img/loading.gif') }}" alt="" />
																<?php $imgCounts++; ?>
																@endif
															@endforeach	
															<div class="item-desc-prod "  >
																<b><h5 class="list-group-item-heading">{{$products->products->product_name}}</h5></b>
																<p class="list-group-item-text">P 100.00</p>
															</div>
														</a>
													<?php $prodCounts++; ?>	
													@endif
										@endforeach	
										</div>
									</div>
								</div>
							@endif
						@endforeach	
                </div>
			<?php $num++; ?>
			@endforeach	
				
			
           <div class="container" >
				<div class="col-md-12" style="padding:2px; margin-top:-4px;">
					<div class="col-md-12 box" >
						<img class="img-responsive" src="{{ URL::asset('assets/img/market/brands.png') }}" alt="Homemallph Market">
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
										@foreach($brands_data as $brands_data )
										<div class="col-sm-2 col-xs-6 store-logo" >
											<div class="wraptocenter"><span></span><img src="{{ URL::asset('assets/img/brand/'.$brands_data->id.'.png') }}" alt="..."></div>
										</div>	
										@endforeach	
									</div>
								</div>	
                            </div>
                        </div>
                    </div>
                </div>
            </div>
					
			<div class="container" >
				<div class="col-md-12" style="padding:2px; margin-top:-25px;" >
					<div class="col-md-12 box" >
						<img class="img-responsive" src="{{ URL::asset('assets/img/market/trends.png') }}" alt="Homemallph Market">
					</div>
					<div class="col-md-12" style="padding:0px">
						@foreach($featured_trend as $featured_trend )
							<div class="col-md-2 col-xs-6" style="padding:2px; margin-top:-23px;">
								@if(count($featured_trend->product_info)>0)
								
									<?php $countss++;?>
									<div class="box" >
										<a href="/Product/Details/{{$featured_trend->product_info->id}}/{{encodeUrlRoute($featured_trend->product_info->product_name)}}">
										<center>
										<?php $countimg=0;?>
										@foreach($featured_trend->product_info->product as $products )
											@if($countimg==0)
												<?php $countimg++;?>
													<img class="img-responsive"  data-src="{{ URL::asset(getSingleImageProduct($products->id,$featured_trend->product_info->store->store_name)) }}" src="{{ URL::asset('assets/img/loading.gif') }}" alt="">
											@endif
										@endforeach	
										</center></a>
										<div class="item-desc" style="padding:10px" >
											<a href="/Product/Details/{{$featured_trend->product_info->id}}/{{encodeUrlRoute($featured_trend->product_info->product_name)}}"><h4 >{{$featured_trend->product_info->product_name}}</h4></a>
											<?php $count=0;?>
											@foreach($featured_trend->product_info->product as $product )
												@if($count==0)
													<?php $count++;?>
													<h4><p >&#8369;&nbsp;&nbsp;{{$product->sale_price}}</p></h4>
												@endif
											@endforeach	
											<button class="btn btn-default pull-right btn-sm" style="margin-top:-30px; padding:4px 3px 4px 3px;"><i class="fa fa-shopping-cart cart-cart"></i></button>
										</div>
									</div>
								
								@endif
							</div>
						@endforeach	
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

			
			
			
	function addCart(data){
		try{
			var response = $.ajax({
				type: "POST",
				url: "/cart/addcart",
				data: {data1:data.data1 ,data2:data.data2, data3:data.data3, data4:data.data4},
				async: false
			}).responseText;
			var datas = JSON.parse(response);
			if(datas.success==true){
				var elem1 = document.getElementsByClassName("badge-cart1");
				var elem2 = document.getElementById("badge-cart2");
				var elem3 = document.getElementById("badge-cart3");
				var elem4 = document.getElementById("badge-cart4");
				if ( elem1 ) {
				 elem1.innerHTML=datas.data.datas2+"";
				}
				if ( elem2 ) {
				elem2.innerHTML=datas.data.datas2+"";
				}
				if ( elem3 ) {
				elem3.innerHTML=datas.data.datas2+"";
				}
				if ( elem4) {
				elem4.innerHTML=datas.data.datas2+"";
				}
			}
		}catch(err){
			alert(err.message);
		}
	}		
	</script>
	
	
	
@endsection