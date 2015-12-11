@extends('client.master.master')

	@foreach($ProductInfo as $ProductInfo)
	
@section('title',ucFirst($ProductInfo->product_name).' Details')

@section('content')

			
		<div class="col-md-12" style="background:white; margin-top:-15px; padding:0px;">
			<div class="col-md-4 col-md-offset-4 col-xs-12 store-logo-detais"  style="padding:5px;">
				<a href="/Store/1"><div class="wraptocenter"><span></span><img style=" border:1px solid #d3d3d3;" src="{{ URL::asset(getStoreBanner($ProductInfo->store->store_name)) }}" alt="..."></div></a>
			</div>
			<div class="col-md-12" style="padding:0px; margin-top:-18px;">
				<ul class="navs">
					<li><a href="/Store/1">Home</a></li>
					<li><a href="/about/">Products</a></li>
					<li><a href="/work/">About</a></li>
					<li><a href="/clients/">Contact</a></li>
					<li><a href="javascript:void()">
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
										<div class="carousel-inner" id="div-prod-img-display1">
										<?php $count=0;?>
										@if(count($ImageFiles)==0)
											<div class="item active">
													<img src="{{ URL::asset('assets/img/noimage.png')}}">
											</div>
										@else
											@foreach($ImageFiles as $ImageFiles)
												@if($count==0)
												<div class="item active">
													<img src="{{ URL::asset($ImageFiles['dirname'].'/'.$ImageFiles['basename'])}}">
												
												</div>
												@else
												<div class="item">
													<img src="{{ URL::asset($ImageFiles['dirname'].'/'.$ImageFiles['basename'])}}">
												</div>
												@endif
												<?php $count++;?>
											@endforeach
										@endif
										</div>
									</div> 
								<div class="clearfix">
									<div id="thumbcarousel" class="carousel slide"   style=" border:1px solid transparent;" data-interval="false">
										<div class="carousel-inner">							
											<div class="item active" style="padding:2px" id="div-prod-img-display2">
											<?php $count2=0;?>
											@if(count($ImageFiles)==0)
												<div style="padding:2px;" data-target="#carousel" data-slide-to="{{$count2}}" class="thumb"><img  style=" border:1px solid #d3d3d3;" src="{{ URL::asset('assets/img/noimage.png')}}"></div>
											@else
												@foreach($OtherFiles as $other)
													<div style="padding:2px;" data-target="#carousel" data-slide-to="{{$count2}}" class="thumb"><img  style=" border:1px solid #d3d3d3;" src="{{ URL::asset($other['dirname'].'/'.$other['basename'])}}"></div>
												<?php $count2++;?>
												@endforeach
											@endif
											</div>
										</div><!-- /carousel-inner -->
									</div> <!-- /thumbcarousel -->
								</div><!-- /clearfix -->
								</div>
						</div>
					</div>

					<div class="col-md-7 " style="padding:0px; "  >
						<div class="col-md-12 " style="padding:0px;">
							<div class="col-md-12 " >
								<h3>{{ucwords(strtolower($ProductInfo->product_name))}}</h3>
								<?php $count3=0;?>
								@foreach($ProductInfo->product as $products)
									@if($count3==0)
									<h4 class="text-danger">Price :&nbsp;&nbsp;&#8369;&nbsp;&nbsp;<strong id="price_view">{{$products->sale_price}}</strong></h4>
									@endif
									<?php $count3++;?>
								@endforeach
							</div>
							<div class="col-md-12" style="padding:0px;">
								<div class="col-md-6 " >	
									<h4>Variants</h4>
									<div id="thumbcarousel1" class="carousel slide " data-interval="false" style="border:1px solid transparent;">
										<div class="carousel-inner">
											<div class="item active" id="variants_view">
											
											<?php $counts=0;?>
											@foreach($ProductInfo->product as $product)
												@if($product->product_status==9)
													<?php 
													if($product->active_price==7){
														$price = $product->sale_price;
													}
													else{
														$price = $product->retail_price;
													}
													?>
													@if($counts==0)
														<input type="hidden" value="{{$product->id}}" id="spdct">
														<div style="padding:2px;" class="thumb"><a href="javascript:void()"  id="imglnk{{$product->id}}" onclick="select({{$product->id}},{{$counts}},{{$ProductInfo->id}},{{$price}})"><img id="img{{$counts}}" src="{{ URL::asset(getSingleImageProduct($product->id,$ProductInfo->store->store_name)) }}"></a></div>
													@else
														<div style="padding:2px;" class="thumb"><a href="javascript:void()" id="imglnk{{$product->id}}"  onclick="select({{$product->id}},{{$counts}},{{$ProductInfo->id}},{{$price}})"><img  id="img{{$counts}}"  src="{{ URL::asset(getSingleImageProduct($product->id,$ProductInfo->store->store_name)) }}"></a></div>
													@endif
													<?php $counts++;?>
												@endif	
											@endforeach
											<input type="hidden" value="{{$counts}}" id="spdctcnt">
											</div>
										</div>
									</div>
								</div>
								<div id="variants_container" >
								<?php $count4=0;?>
								<?php $groupCount=0;?>
								@foreach($ProductInfo->productVariantGroup as $productVariantGroup)
								<?php $groupCount++;?>
									<div class="col-md-12 " id="complex_desc_view">
										<h4>{{ucwords(strtolower($productVariantGroup->variant->variant_name))}}</h4>
										<div class="col-md-12" style="padding:0px" >
											<ul class="navs-variant">
											@foreach($ProductInfo->productVariant as $productVariant)
												@if($productVariant->variant_id==$productVariantGroup->variant_id)
													<li ><a href="javascript:void()" onclick="getCombo({{$productVariant->id}} , {{$ProductInfo->id}} )" class="group{{$groupCount}} not-active" id="variant{{$productVariant->id}}"> {{ucwords(strtolower($productVariant->variant_name_value))}}</a></li>
													<?php $count4++;?>
												@endif
											@endforeach
											</ul>
										</div>
									</div>
									<?php $count4=0;?>
								@endforeach
								<input type="hidden" value="{{$groupCount}}" id="grpCnt">
								</div>
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
									<div style="z-index:3">
										<div class="fb-like" data-href="<?php echo('http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']); ?>" data-layout="standard" data-action="like" data-show-faces="true" data-share="true" ></div>
									</div>
								</div>
							</div>
						</div>
						
					</div>
					
					<div class="col-md-12" style="padding:10px; "  >
							<div  class="col-md-12 no-padding">
							    <h3>Product Description</h3>
							  	<hr>
								<p>{{ucFirst($ProductInfo->product_description)}}</p>
							</div>
					
							<div class="col-md-12 no-padding" >
								<h3>Reviews / Comments / Concerns</h3>
								<hr>
								<div class="col-md-12 no-padding" style="z-index:0">
									<p><strong>RULES:</strong> Feel free to comment in our products! Please do not use foul words. Thank you.</p>
								</div >
								<div class="col-md-12 no-padding" >
									<div class="fb-comments" data-href="<?php echo('http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']); ?>" data-width="100%" data-numposts="5"></div>
								</div>
							</div>
						 
					</div>
				</div>
				 <div class="col-md-12" style="padding:0px; " >
						<center><h3>Related Product</h3></center>
							 @for ($x = 0; $x < 8; $x++)
								<div class="col-md-3 col-xs-6" style="padding:2px;">
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
			
			<div class="col-md-3 " style="padding:2px; "  >				
				<div class="col-md-12 box" style="padding:10px; background:white;">
				<!-- *** MENUS AND FILTERS ***________ -->
				<h4>{{ucFirst($ProductInfo->store->store_name)}} Category</h4>
				<ul class="nav nav-pills nav-stacked category-menu">
					<li>
						@foreach($store_market_data as $store_market_data )
							@if(count($store_market_data->category)>0)
								<h4>{{$store_market_data->market_name}}</h4>
							@endif
							@foreach($store_market_data->category as $categorys )
								<a href="/{{$store_market_data->market_name}}/Category/{{str_replace(' ','-',$categorys->category_name)}}/All">{{$categorys->category_name}} <span class="badge pull-right"></span></a>
								<ul>
									@foreach($categorys->subCategory as $subCategorys)
										@if(count($subCategorys->products)>0)
											<li style="padding:3px"><a href="category.html" class="link">{{$subCategorys->sub_category_name}} <span class="badge pull-right">
												<?php $itemCount=0; ?>
												@foreach($subCategorys->products as $products)
													@if($products->product_status==9)
														<?php $itemCount++; ?>
													@endif
												@endforeach
												{{$itemCount}}
											</span></a> </li>
										@endif
									@endforeach
								</ul>
							@endforeach
						@endforeach
					</li>
				</ul>
				
				</div>
			</div> 
		</div> 	
		<!-- *** MENUS AND FILTERS END *** -->
		</div>
			
			@endforeach	
						
@endsection


@section('page-script')
<script>
		
	$(document).ready(function() {
		var spdct = $("#spdct").val();
		$("#imglnk"+spdct).trigger('click');
		$("#img"+spdct).addClass('active-variant-img');

	});

	
	

	function select(pid,cnt,piid,prc){
	removeAllActive();
			deactivateAll();
				var response = $.ajax({
					type: "POST",
					url: "/details/get-product-variant-combo-select",
					data: {c:pid},
					async: false
				}).responseText;
				var data = JSON.parse(response);
				for(y=0;y<data.length;y++){
					var id = data[y].product_variant_id;
					$('#variant'+id).addClass('active');
					$('#variant'+id).removeClass('not-active');
				}
				document.getElementById('price_view').innerHTML=prc.toFixed(2);
				
	resetSelected(cnt);		
	getImage(pid,piid);
	}
	function resetSelected(cnt){
		var spdctcnt = parseInt($('#spdctcnt').val());
		for(x = 0; x < spdctcnt  ;x++){
			$("#img"+x).removeClass('active-variant-img');
			$('#img'+x).addClass('not-active-variant-img');
		}
		$("#img"+cnt).removeClass('not-active-variant-img');
		$("#img"+cnt).addClass('active-variant-img');
	}
	function getImage(pid,piid){
		var response = $.ajax({
					type: "POST",
					url: "/details/get-product-variant-combo-select-img",
					data: {pid:pid ,piid : piid},
					async: false
				}).responseText;
				
		var data = JSON.parse(response);
		var div = document.getElementById('div-prod-img-display1');
		var div2 = document.getElementById('div-prod-img-display2');
		div.innerHTML = "";
		div2.innerHTML = "";
		var pth1 = window.location.origin+"/assets/img/noimage.png";
		if(data.length==0){
			var images1 = '<div class="item active">'+
				'<img src="'+pth1+'">'+
			'</div>'; 
			var images11 = '<div style="padding:2px;" data-target="#carousel" data-slide-to="0" class="thumb"><img  style=" border:1px solid #d3d3d3;" src="'+pth1+'"></div>'; 
			div.innerHTML = div.innerHTML + images1;
			div2.innerHTML = div2.innerHTML + images11;
						
		}else{

			
			for(x = 0; x < data.length ; x++){
				var pth2=window.location.origin+"/"+data[x].dirname+"/"+data[x].basename;
				if(x==0){
					var images2 = '<div class="item active"><img src="'+pth2+'"></div>'; 
					var images22 = '<div style="padding:2px;" data-target="#carousel" data-slide-to="'+x+'" class="thumb"><img  style=" border:1px solid #d3d3d3;" src="'+pth2+'"></div>'; 
					div.innerHTML = div.innerHTML + images2;
					div2.innerHTML = div2.innerHTML + images22;
				}else{
					var images3 = '<div class="item"><img src="'+pth2+'"></div>'; 
					var images33 = '<div style="padding:2px;" data-target="#carousel" data-slide-to="'+x+'" class="thumb"><img  style=" border:1px solid #d3d3d3;" src="'+pth2+'"></div>'; 
					div.innerHTML = div.innerHTML + images3;
					div2.innerHTML = div2.innerHTML + images33;
				}
				
			}
		}	
	}
	function removeAllActive(){
		var grpCnt = parseInt($('#grpCnt').val());
		for(x = 0; x< grpCnt + 1  ;x++){
			$('.group'+x).removeClass('active');
		}
	}
	function deactivateAll(){
		var grpCnt = parseInt($('#grpCnt').val());
		for(x = 0; x< grpCnt + 1  ;x++){
			$('.group'+x).addClass('not-active');
		}
	}
	// function getCombo(id,infoid){
		// $.post("/details/get-product-variant-combo", {a : infoid, b: id}, function(result){
			// removeAllActive();
			// deactivateAll();
			// var obj = JSON.parse(result);	
			// for(x=0;x<obj.length;x++){
				// var product_id = obj[x].product_id;
				// var response = $.ajax({
					// type: "POST",
					// url: "/details/get-product-variant-combo-select",
					// data: {c:product_id},
					// async: false
				// }).responseText;
				// var data = JSON.parse(response);
				// for(y=0;y<data.length;y++){
					// var id = data[y].product_variant_id;
					// $('#variant'+id).addClass('active');
					// $('#variant'+id).removeClass('not-active');
				// }
			// }
							
		// });
	// }

	
</script>	
	
@endsection