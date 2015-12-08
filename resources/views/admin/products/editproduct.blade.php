@extends('admin.includes.master.master')
@section('main_header_title', 'Products')
@endsection
@section('sub_header_title', 'Edit Product Information ')
@endsection
@section('breadcrumbs')
	<div class="breadcrumbs" id="breadcrumbs">
		<ul class="breadcrumb">
			<li>
				<i class="icon-home home-icon"></i>
				<a href="/">Home</a>
				<span class="divider">
					<i class="icon-angle-right arrow-icon"></i>
				</span>
			</li>
			<li class="active">Edit Product </li>
		</ul><!--.breadcrumb-->
	</div>
@endsection
@section('content')
<div class="row-fluid">
	<div class="widget-box span12 ">
		<div class="widget-header widget-header-small header-color-dark">
			<h5>Edit Product</h5>
			<div class="widget-toolbar">
				<a href="javascript:;" data-action="collapse">
					<i class="icon-chevron-down"></i>
				</a>
			</div>
		</div>
@foreach($productinformation as $productparent)		
@endforeach
		<div class="widget-body">
			<div class="widget-main">
				<div class="row-fluid">
					<div class="span12" style="padding-left:20px;padding-right:20px;" id="product_information_div">
						<div class="widget-box span12 collapsed" >
							<div class="widget-header widget-header-small header-color-dark ">
								<h5>Update Product Information Here...</h5>
								<div class="widget-toolbar">
									<a href="javascript:;" data-action="collapse">
										<i class="icon-chevron-down"></i>
									</a>
								</div>								
							</div>
							<div class="widget-body">
								<div class="widget-main">
									<div class="control-group"> 
										<label class="control-label" ><li class="icon-basket"></li> Product Name</label>
										<div class="controls">
											<input type="text" class="span12" id="product_name" value="{{$productparent->product_name}}" placeholder=""  />
										</div>
									</div>					
									<div class="span12" style="margin:0px;">
										<div class="control-group span4">
											<label class="control-label" >Market </label>
											<div class="controls">
												<select class="span12" onChange="showCategoryInfo(this.value)" id="market_info" style="width:100%;"  data-placeholder="Choose Market" > 
													<option value="" />
													@foreach($market_info as $market)
														@if($productparent->getSubCategoryName->getCategory->MI1 == $market->MI1)
															<option selected value="{{$market->MI1}}" />{{$market->MN2}} 
														@else
															<option value="{{$market->MI1}}" />{{$market->MN2}} 
														@endif	
													@endforeach														
												</select>	
											</div>
										</div>		
										<div class="control-group span4">
											<label class="control-label" >Category</label>
											<div class="controls">
												<select class="span12" style="width:100%;" onChange="showSubCategoryInfo(this.value)" id="product_category" data-placeholder="Choose Category" >
													<option value="" />
													@foreach($category_info as $cat_info)
														@if($cat_info->MI1 == $productparent->getSubCategoryName->getCategory->MI1)
															@if($cat_info->CI1 == $productparent->getSubCategoryName->CI1)
																<option selected value="{{$cat_info->CI1}}" >{{$cat_info->CN2}}</option>
															@else
																<option  value="{{$cat_info->CI1}}" >{{$cat_info->CN2}}</option>
															@endif
														@endif
													@endforeach
												</select>	
											</div>
										</div>
										<div class="control-group span4">
											<label class="control-label" >Sub Category</label>
											<div class="controls">
												<select class="span12" style="width:100%;" onchange="" id="product_sub_category" data-placeholder="Choose Category" >
													<option value="" />
													@foreach($sub_cat as $subcateg)
														@if($subcateg->CI1 == $productparent->getSubCategoryName->CI1)
															@if($productparent->getSubCategoryName->SC1 == $subcateg->SC1 )
																<option selected value="{{$subcateg->SC1}}" />{{$subcateg->SCN3}}
															@else
																<option  value="{{$subcateg->SC1}}" />{{$subcateg->SCN3}}
															@endif
														@endif
													@endforeach
												</select>	
											</div>
										</div>	
									</div>
									<div class="span12" id="add_sub_category" style="margin:0px; display:none">
										<div id="add_subcat" class="accordion">
											<div class="accordion-group">
												<div class="accordion-heading">
													<a href="#accor" data-parent="#add_subcat" data-toggle="collapse" class="accordion-toggle collapsed">
														Add Sub Category Here....
													</a>
												</div>
												<div class="accordion-body collapse" id="accor">
													<div class="accordion-inner">
														<div class="row-fluid">
															<input type="text" class="span10" id="add_subcat_input" placeholder="Sub category Name"  />
															<button class="btn btn-default btn-mini span2 pull-right" onClick="addSubcat('add_subcat_input')">add</button>
														</div>
													
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="span12" style="margin:0px;">
										<div class="control-group span4">
											<label class="control-label" >Brand</label>
											<div class="controls"> 		
												<select class="span12"  id="brand_info" style="width:100%;"  data-placeholder="Choose Category" > 
													<option value="" />
														<option value=""/>
														@foreach($brand_info as $brand)
															@if($productparent->getSubCategoryName->getCategory->MI1 == $brand->MI1)
																@if($productparent->brand_id ==  $brand->BI1 )
																	<option selected value="{{$brand->BI1}}"/>{{$brand->BN2}}
																@else
																	<option  value="{{$brand->BI1}}"/>{{$brand->BN2}}
																@endif																	
															@endif
															
														@endforeach
												</select>	
											</div>
										</div>
										<div class="control-group span4">
											<label class="control-label" >Add More Brand?</label>
											<div class="controls">
												<select class="span12" id="add_brand" onChange="visibleBrand(this.value)" style="width:100%;" data-placeholder="Choose Category" >
													<option value="" />
													<option value="1" />Yes
													<option selected value="0" />No
												</select>
											</div>
										</div>
										<div class="control-group span4">
											<div class="control-group span12">
												<label class="control-label" >Product Status:</label>
												<div class="controls">
													<select class="span12" style="width:100%;" id="product_info_status" data-placeholder="Choose Category" >
														<option value="" />
														@foreach($product_status as $prod_status)
															@if($prod_status->id == $productparent->getStatus->id)
																<option selected value="{{$prod_status->id}}" />{{$prod_status->indicator_name}} 
															@else
																<option value="{{$prod_status->id}}" />{{$prod_status->indicator_name}} 
															@endif
														@endforeach															
													</select>	
												</div>
											</div>										
										</div>										
									</div>					
									<div class="span12" id="add_brand_name" style="margin:0px; display:none">
										<div id="addBrand" class="accordion">
											<div class="accordion-group">
												<div class="accordion-heading">
													<a href="#accor1" data-parent="#addBrand" data-toggle="collapse" class="accordion-toggle collapsed">
														Add Brand here..
													</a>
												</div>
												<div class="accordion-body collapse" id="accor1">
													<div class="accordion-inner">
														<div class="row-fluid">
															<input type="text" class="span10" id="add_brand_input" placeholder="Brand Name"  />
															<button class="btn btn-default btn-mini span2 pull-right" onClick="addBrand('add_brand_input')">add</button>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>	
									<div class="row-fluid">
										<div class="span6">
											<div class="control-group">
												<label class="control-label" >Product description</label>
												<div class="controls">
														<textarea class="span12 limited" rows="4" id="product_description" style="resize:none;" data-maxlength="50">{{$productparent->product_description}}</textarea>
												</div>
											</div>										
										</div>	
										<div class="span6">									
											<div class="control-group">
												<div class="controls">
												<label class="control-label" >Product Ranged: </label>							
														<textarea class="span12 limited" rows="4" id="product_ranged" placeholder="EG. 2 to 3 days timeframe" style="resize:none;" data-maxlength="50">{{$productparent->product_description}}</textarea>
												</div>
											</div>	
										</div>	
									</div>	
									<div class="hr hr-18 dotted hr-double"></div>				
									<div class="row-fluid wizard-actions">
										<button onClick="" id="addProduct_btn" class="btn btn-success btn-next" data-last="Finish ">
											<i id="loading" style="font-size:5px; font-color: white; display:none;" class="spinner-loader"></i>
											Update Information
										</button>
									</div>									
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span12"  style="margin:0px;">
						<div class="widget-box span12" style="padding:20px;">
							<div class="widget-header widget-header-small header-color-dark">
								<h5>Product Variants</h5>
							</div>
							<div class="widget-body " style="overflow:scroll;" >
								<div class="widget-main" >
										<table id="variant_tbl" class="table table-striped table-bordered table-hover"  >
											<thead>
												<tr>
													<th>ID</th>
													<th>Product Features</th>
													<th>Sale Price</th>
													<th>Retail Price</th>
													<th>Product Cost</th>
													<th>Active Price</th>
													<th>Status</th>
													<th>Quantity</th>
													<th></th>
												</tr>
											</thead>
											<tbody>
											
											@foreach( $productparent->getChild as $productChild)
												<tr>
													<th style="width: 1%">{{$productChild->id}}</th>
													<th style="width: 19%">
														@foreach($productChild->getCombo as $getcombo)
															{{$getcombo->getProductVariant->getVariant->VN2}} : {{$getcombo->getProductVariant->variant_name_value}} <br> 
														@endforeach
													</th>
													<th style="width: 10%"> &#8369; {{$productChild->sale_price}}</th>
													<th style="width: 10%"> &#8369; {{$productChild->retail_price}}</th>
													<th style="width: 10%"> &#8369; {{$productChild->product_cost}}</th>
													<th style="width: 10%">{{$productChild->getPriceStatus->indicator_name}}</th>
													<th style="width: 10%">
														<div style="padding:0px; margin:0px;">
															<label class="switch" style="padding:0px;">
														@if($productChild->getStatus->id == '9')
																<p  id="" style="display:none">PUBLISH</p>
																<input class="switch-input" onChange='' type="checkbox" checked/>
														@else
																<p  id=""  style="display:none">NOT PUBLISH</p>
																<input class="switch-input" id="" style="" onChange='' type="checkbox"/>
														@endif	
																<span class="switch-label"  data-on="ACTIVE" data-off="INACTIVE"></span> 
																<span class="switch-handle"></span> 
															</label>
														</div>														
													</th>
													
													
													<th style="width: 10%"></th>
													<th style="width: 20%"></th>
												</tr>											
											@endforeach

											</tbody>
										</table>
								</div>
							</div>
						</div>
					</div>					
				</div>
			</div>
		</div>
	</div>		
</div>	
@endsection
@section('myscripts')
<script>
$("#market_info").chosen({ width: '100%' });
$("#product_category").chosen({ width: '100%' });
$("#brand_info").chosen({ width: '100%' });
$("#description_type").chosen({ width: '100%'});
$("#product_sub_category").chosen({ width: '100%' });
$("#product_info_status").chosen({ width: '100%'});
var jsonCategory =<?php echo json_encode($category_info); ?>;
var jsonBrand =<?php echo json_encode($brand_info); ?>;
var jsonVariants =<?php echo json_encode($variants); ?>;
var jsonVariants =<?php echo json_encode($sub_cat); ?>;

function showCategoryInfo(MI1)
{
//category	
	var x1= document.getElementById("product_sub_category");
    document.getElementById("product_sub_category").options.length = 0;
	$("#product_sub_category").trigger("liszt:updated");
	
	
	var x = document.getElementById("product_category");
    document.getElementById("product_category").options.length = 0;
    var option = document.createElement("option");
    option.text = "";
    option.value = "";
    x.add(option);	
		for(getCategory=0;getCategory<jsonCategory.length;getCategory++)
		{
			if(jsonCategory[getCategory].MI1 == MI1)
			{
				var option = document.createElement("option");	
				option.text =jsonCategory[getCategory].CN2;
				option.value =jsonCategory[getCategory].CI1;
				x.add(option);
			}
		}
		$("#product_category").trigger("liszt:updated");
//brand 

//alert(JSON.stringify(jsonBrand));
	var x1 = document.getElementById("brand_info");
    document.getElementById("brand_info").options.length = 0;
    var option = document.createElement("option");
    option.text = "";
    option.value = "";
    x1.add(option);
		for(getBrand=0;getBrand<jsonBrand.length;getBrand++)
		{
			//alert(jsonBrand[getBrand].MI1+""+MI1);
			if(jsonBrand[getBrand].MI1 == MI1)
			{
				//alert('1');
				var option = document.createElement("option");	
				option.text =jsonBrand[getBrand].BN2;
				option.value =jsonBrand[getBrand].BN1;
				x1.add(option);
			}
			else
			{
				//alert('0');
			}
		}	
	$("#brand_info").trigger("liszt:updated");
	var x2 = document.getElementById("description_type");
    document.getElementById("description_type").options.length = 0;
    var option = document.createElement("option");
    option.text = "";
    option.value = "";
    x2.add(option);
	for(getVariants=0;getVariants<jsonVariants.length;getVariants++)
	{
		//alert(jsonVariants[getVariants].variant_name+""+jsonVariants[getVariants].id);
		if(jsonVariants[getVariants].MI1 == MI1)
		{
			var option = document.createElement("option");	
			option.text =jsonVariants[getVariants].VN2;
			option.value =jsonVariants[getVariants].VT1;
			x2.add(option);
		}
	}	
	$("#description_type").trigger("liszt:updated");
}
function showSubCategoryInfo(subkey)
{

	$.post("/HMadmin/Products/viewSubCat",
	{
		temp_subkey: subkey,
	},
	function(result)
	{
		
		var x4 = document.getElementById("product_sub_category");
		document.getElementById("product_sub_category").options.length = 0;
		var option = document.createElement("option");
		option.text = "";
		option.value = "";
		x4.add(option);		
		
		var jsonSubCat= JSON.parse(result);
		var jsonSub=JSON.parse(JSON.stringify(jsonSubCat[0].data));
		
		for(geti=0;geti < jsonSub.length; geti++)
		{
			var option = document.createElement("option");	
			option.text =jsonSub[geti].SCN3;
			option.value =jsonSub[geti].SC1;
			x4.add(option);			
		}
		$("#product_sub_category").trigger("liszt:updated");
	});	
}
</script>


@endsection
