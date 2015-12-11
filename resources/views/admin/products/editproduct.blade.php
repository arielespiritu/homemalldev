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
									<div class="row-fluid">	
										<div class="span12">	
											<div class="control-group">
												<label class="control-label " for="form-field-tags">Keywords:</label>
												<div class="controls">
												<?php $key = ''; ?>
												@foreach($tags as $keywords)
													@if($key == '')
														<?php  
														$key = $keywords->tag_description;
														?>
													@else
														<?php  
														$key = $key.','.$keywords->tag_description;
														?>
													@endif			
												@endforeach
											
													<input type="text" name="tags"  id="parent_keywords" value="<?php echo $key; ?>" placeholder="Enter tags ..." />
												</div>
											</div>									
										</div>									
									</div>									
									<div class="hr hr-18 dotted hr-double"></div>				
									<div class="row-fluid wizard-actions">
										<button onClick="update_info('{{$productparent->id}}')" id="addProduct_btn" class="btn btn-success btn-next" data-last="Finish ">
											<i id="loading" style="font-size:5px; font-color: white; display:none;" class="spinner-loader"></i>
											Update Information
										</button>
									</div>									
								</div>
							</div>
						</div>
					</div>
					<div class="row-fluid">
						<div class="span12" style="padding-left:20px;padding-right:20px;"  id="product_complex_div">
							<div class="widget-box span12 collapsed">
								<div class="widget-header widget-header-small header-color-dark">
									<h5>Product Complex Description</h5>
								<div class="widget-toolbar">
									<a href="javascript:;" data-action="collapse">
										<i class="icon-chevron-down"></i>
									</a>
								</div>										
								</div>
								<div class="widget-body">
									<div class="widget-main"  style="height:300px; overflow-y: scroll;">
										<div class="span12">
											<div class="control-group span4">
												<input id="product_complex_status" value="NEW" style="display:none"/>
												<div class="controls">
													<div class="span12">
														<select class="span12" style="width:100%;" onChange="showSelectedVariants(this.value,'{{$productparent->id}}','product_variant_tbl')" id="description_type" data-placeholder="Choose Variant Type" >
															<option value="" />
															@foreach($variants as $getVariants)
																@if($getVariants->MI1 ==  $productparent->getSubCategoryName->getCategory->MI1)
																	<option value="{{$getVariants->VT1}}" />{{$getVariants->VN2}}
																@endif	
															@endforeach
														</select>	
													</div>	
												</div>
											</div>	
											<div class="control-group span6">
												<div class="controls">
													<input type="text" class="span12" id="description_name" placeholder="Variant Name"  />
												</div>
											</div>											
											<div class="span2">
												<button class="btn btn-default btn-mini span12 pull-right" id="variant_add_btn" onClick="addVariants('{{$productparent->id}}')">add</button>
											</div>										
										</div>
										<table id="product_variant_tbl" class="table table-striped table-bordered table-hover"  >
											<thead>
												<tr>
													<th>Description Type</th>
													<th>Description Value</th>
													<th></th>
												</tr>
											</thead>
											<tbody>
											</tbody>
										</table>
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
													<th style="width: 10%">
														<center>
															<p id="child_parag_sale-{{$productChild->id}}">&#8369; {{$productChild->sale_price}}</p>
															<input type="text" class="span12" id="child_input_sale-{{$productChild->id}}" style="display:none" value="{{$productChild->sale_price}}" placeholder="Sale Price" />
														</center>	
													</th>
													<th style="width: 10%"> 
														<center>
															<p id="child_parag_retail-{{$productChild->id}}">&#8369; {{$productChild->retail_price}}</p>
															<input type="text" class="span12" id="child_input_retail-{{$productChild->id}}" style="display:none" value="{{$productChild->retail_price}}" placeholder="Retail Price" />														
														</center>
													</th>
													<th style="width: 10%">
													<center>
														<p id="child_parag_cost-{{$productChild->id}}">&#8369; {{$productChild->product_cost}}</p>
														<input type="text" class="span12" id="child_input_cost-{{$productChild->id}}" style="display:none" value="{{$productChild->product_cost}}" placeholder="Product Cost" />														
													</center>
													</th>
													<th style="width: 15%">
														<center>
															<p id="child_parag_pricestat-{{$productChild->id}}">{{$productChild->getPriceStatus->indicator_name}}</p>
															<select class="span12" id="child_combo_pricestat-{{$productChild->id}}"  style="width:100%; z-index:999; display:none"  data-placeholder="Choose Status">
																			<option value="" />
																@foreach($price_status as $price_stat)
																	@if($price_stat->id == $productChild->getPriceStatus->id)
																			<option selected value="{{$price_stat->id}}" />{{$price_stat->indicator_name}}
																	@else
																			<option value="{{$price_stat->id}}" />{{$price_stat->indicator_name}}
																	@endif
																@endforeach	
															</select>	
														</center>
													</th>
													<th style="width: 10%">
														<center>
															<div style="padding:0px; margin:0px;">
																<label class="switch" style="padding:0px;">
																@if($productChild->getStatus->id == '9')
																	<p  id="child_status_name-{{$productChild->id}}" style="display:none">PUBLISH</p>
																	<input class="switch-input" onChange='changeStat("child_status_name-{{$productChild->id}}","{{$productChild->id}}")' type="checkbox" checked/>
																@else
																	<p  id="child_status_name-{{$productChild->id}}" style="display:none">NOT PUBLISH</p>
																	<input class="switch-input" id="" onChange='changeStat("child_status_name-{{$productChild->id}}","{{$productChild->id}}")' style="" onChange='' type="checkbox"/>
																@endif	
																	<span class="switch-label"  data-on="ACTIVE" data-off="INACTIVE"></span> 
																	<span class="switch-handle"></span> 
																</label>
															</div>
														</center>
													</th>
													<th style="width: 5%">
														@foreach($productChild->getInventory as $inv)
														@endforeach													
														<center>
															{{$inv->total_inv}} 
														</center>
													</th>
													<th style="width: 10%">
														<div class="hidden-phone visible-desktop action-buttons">
															<a class="blue" style="display:none" id="child_btnsave-{{$productChild->id}}" onclick="btn_actions('{{$productChild->id}}','save')" href="javascript:;">
																<i class="icon-save bigger-130"></i>
															</a>										
															<a class="orange" id="child_btnview-{{$productChild->id}}"  href="javascript:;">
																<i class="icon-zoom-in bigger-130"></i>
															</a>
															<a class="green" id="child_btnedit-{{$productChild->id}}" onclick="btn_actions('{{$productChild->id}}','edit')"  href="javascript:;">
																<i class="icon-pencil bigger-130"></i>
															</a>
															<a class="red" style="display:none" id="child_btncancel-{{$productChild->id}}" onclick="btn_actions('{{$productChild->id}}','cancel')"  href="javascript:;">
																<i class="icon-close bigger-130"></i>
															</a>											
														</div>
														<div class="hidden-desktop visible-phone">
															<div class="inline position-relative">
																<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown">
																	<i class="icon-caret-down icon-only bigger-120"></i>
																</button>

																<ul class="dropdown-menu dropdown-icon-only dropdown-yellow pull-right dropdown-caret dropdown-close">
																	<li>
																		<a class="blue" style="display:none" id="child_btnphonesave-{{$productChild->id}}"  href="javascript:;">
																			<i class="icon-save bigger-130"></i>
																		</a>
																	</li>
																	<li>
																		<a class="orange" id="child_btnphoneview-{{$productChild->id}}"  onClick="" href="javascript:;">
																			<i class="icon-zoom-in bigger-130"></i>
																		</a>
																	</li>
																	<li>
																		<a class="green" id="child_btnphoneedit-{{$productChild->id}}" href="javascript:;">
																			<i class="icon-pencil bigger-130"></i>
																		</a>
																	</li>
																	<li>
																		<a class="red" style="display:none" id="child_btnphonedelete-{{$productChild->id}}" href="javascript:;">
																			<i class="icon-close bigger-130"></i>
																		</a>													
																	</li>
																</ul>
															</div>
														</div>														
													</th>
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
				option.value =jsonBrand[getBrand].BI1;
				x1.add(option);
			}
			else
			{
				//alert('0');
			}
		}	
		$("#brand_info").trigger("liszt:updated");
	
//variants
//alert(JSON.stringify(jsonVariants));
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
function changeStat(id,prodkey)
{
	var x = document.getElementById(id).innerHTML;
	var indicatorKey;
	if(x == 'PUBLISH')
	{
		indicatorKey ='10';
		document.getElementById(id).innerHTML = 'NOT PUBLISH';
	}
	else
	{
		indicatorKey ='9';
		document.getElementById(id).innerHTML = 'PUBLISH';
	}
		$.post("/HMadmin/Products/Edit-Product/QuickEditStatChild",
		{
			temp_indicator:indicatorKey,
			temp_childkey:prodkey,
		},
		function(result)
		{
		});
}
function btn_actions(id,status)
{
	if(status == 'edit')
	{
		$("#child_btncancel-"+id).fadeIn("slow");
		$("#child_btnsave-"+id).fadeIn("slow");
		
		$("#child_btnphonesave-"+id).fadeIn("slow");
		$("#child_btnphonecancel-"+id).fadeIn("slow");
		
		$("#child_btnedit-"+id).fadeIn("slow");
		$("#child_btnephonedit-"+id).fadeIn("slow");
		
		$("#child_parag_cost-"+id).fadeOut("slow");
		$("#child_parag_retail-"+id).fadeOut("slow");
		$("#child_parag_sale-"+id).fadeOut("slow");
		$("#child_parag_pricestat-"+id).fadeOut("slow");
		
		$("#child_input_cost-"+id).fadeIn("slow");
		$("#child_input_retail-"+id).fadeIn("slow");
		$("#child_input_sale-"+id).fadeIn("slow");
		$("#child_combo_pricestat-"+id).fadeIn("slow");
	}
	else if(status == 'save')
	{
		var sale_price=  parseFloat(document.getElementById('child_input_sale-'+id).value);
		var retail_price= parseFloat(document.getElementById('child_input_retail-'+id).value);
		var cost_price=	  parseFloat(document.getElementById('child_input_cost-'+id).value);
		var price_status= document.getElementById('child_combo_pricestat-'+id).value;
		$.post("/HMadmin/Products/Edit-Product/QuickEditChild",
		{
			temp_childkey:id,
			temp_sale_price:sale_price,
			temp_retail_price:retail_price,
			temp_cost_price:cost_price,
			temp_price_status:price_status,
		},
		function(result)
		{
			if(result != '0')
			{
				document.getElementById("child_parag_sale-"+id).innerHTML=sale_price.toFixed(2);
				document.getElementById("child_parag_retail-"+id).innerHTML=retail_price.toFixed(2);
				document.getElementById("child_parag_cost-"+id).innerHTML=cost_price.toFixed(2);
				document.getElementById("child_parag_pricestat-"+id).innerHTML=""+document.getElementById('child_combo_pricestat-'+id).options[document.getElementById('child_combo_pricestat-'+id).selectedIndex].text;
					
			}
			$("#child_btncancel-"+id).fadeOut("slow");
			$("#child_btnsave-"+id).fadeOut("slow");
			
			$("#child_btnphonecancel-"+id).fadeOut("slow");
			$("#child_btnphonesave-"+id).fadeOut("slow");
			
			$("#child_btnedit-"+id).fadeIn("slow");
			$("#child_btnphoneedit-"+id).fadeIn("slow");
			$("#child_parag_cost-"+id).fadeIn("slow");
			$("#child_parag_retail-"+id).fadeIn("slow");
			$("#child_parag_sale-"+id).fadeIn("slow");
			$("#child_parag_pricestat-"+id).fadeIn("slow");
			
			$("#child_input_cost-"+id).fadeOut("slow");
			$("#child_input_retail-"+id).fadeOut("slow");
			$("#child_input_sale-"+id).fadeOut("slow");
			$("#child_combo_pricestat-"+id).fadeOut("slow");			
		});			
	}
	else
	{
		$("#child_btncancel-"+id).fadeOut("slow");
		$("#child_btnsave-"+id).fadeOut("slow");
		
		$("#child_btnphonecancel-"+id).fadeOut("slow");
		$("#child_btnphonesave-"+id).fadeOut("slow");
		
		$("#child_btnedit-"+id).fadeIn("slow");
		$("#child_btnphoneedit-"+id).fadeIn("slow");
		$("#child_parag_cost-"+id).fadeIn("slow");
		$("#child_parag_retail-"+id).fadeIn("slow");
		$("#child_parag_sale-"+id).fadeIn("slow");
		$("#child_parag_pricestat-"+id).fadeIn("slow");		
		
		$("#child_input_cost-"+id).fadeOut("slow");
		$("#child_input_retail-"+id).fadeOut("slow");
		$("#child_input_sale-"+id).fadeOut("slow");
		$("#child_combo_pricestat-"+id).fadeOut("slow");			
	}
}
function showSelectedVariants(id,temp_key,tbl)
{
	$.post("/HMadmin/Products/showSelectedVariant",
	{
		temp_key:temp_key,
		temp_variantKey:id,
	},
	function(result)
	{
		var resultJson = JSON.parse(result);
		$('#'+tbl+' tbody').empty();
		for(getI=0;getI<resultJson.length;getI++)
		{
			var btns=''+
			''+
			'	<a class="red"   id ="btn_variant_cancel-'+resultJson[getI].id+'" onClick= delVariants("btn_variant_row-'+resultJson[getI].id+'","'+temp_key+'","'+resultJson[getI].id+'")  href="javascript:;">'+
			'	<i class="icon-trash bigger-130"></i>'+
			'	</a>';			
			$('#'+tbl).append('<tr id ="btn_variant_row-'+resultJson[getI].id+'"><td>'+resultJson[getI].get_variant.VN2+'</td><td>'+resultJson[getI].variant_name_value+'</td><td>'+btns+'</td></tr>');
		}
	});
}
function delVariants(key,temp_key,temp_prod_key)
{
	$.post("/HMadmin/Products/Edit-Product/delSelectedVariant",
	{
		temp_key:temp_key,
		temp_variantKey:temp_prod_key,
	},
	function(result)
	{
		if(result =='2')
		{
			last_gritter = $.gritter.add({
				title: 'Unable To Delete',
				text: 'This Data Is In Use In Product. Cannot Delete this data',
				class_name: 'gritter-error gritter-center'
			});				
			
		}
		else if(result =='1')
		{
			$('#'+key).remove();
			last_gritter = $.gritter.add({
				title: 'Up-To-Date',
				text: 'Successfully Deleted',
				class_name: 'gritter-success gritter-center'
			});				
		}
	});
}
function addVariants(temp_id)
{	  
	var variantName= document.getElementById('description_name').value;
    var x = document.getElementById("description_type").selectedIndex;
    var y = document.getElementById("description_type").options;	
   	var variant_info=y[x].text;
	variant_name = variantName;
	variant_type = variant_info;
	var checkifNew= document.getElementById('product_complex_status').value;
	if(variantName == '' || variant_info == '')
	{
		last_gritter = $.gritter.add({
			title: 'Something Wrong',
			text: 'Description Type Fields are Required',
			class_name: 'gritter-error gritter-center'
		});			
	}
	else if(checkifhasinTable("product_variant_tbl",variant_type,variant_name)=='true')
	{
		last_gritter = $.gritter.add({
			title: 'Something Wrong',
			text: 'Already Exist in table',
			class_name: 'gritter-error gritter-center'
		});					
	}
	else
	{
			var prod_info_id = temp_id;
			$.post("/HMadmin/Products/addVariant",
			{
				variant_name:variant_name,
				variant_type:variant_type,
				product_info_id:prod_info_id,
			},
			function(result)
			{
				alert(result);
					
				action_btn = 	
					'<div class="hidden-phone visible-desktop action-buttons">'+
						'<a class="red" href="javascript:;" onClick= delVariants("btn_variant_row_result-'+result+'","'+prod_info_id+'","'+result+'")>'+
							'<i class="icon-trash bigger-130"></i>'+
						'</a>'+
					'</div>';
				$('#product_variant_tbl').append('<tr id="btn_variant_row_result-'+result+'" ><td>'+variant_type+'</td><td>'+variant_name+'</td><td>'+action_btn+'</td></tr>');
		});	
	}
}
function checkifhasinTable(tableid,type,description)
{
	var rows = document.getElementById(tableid).getElementsByTagName('tbody')[0].getElementsByTagName('tr').length;
	var bool='false';
	for(y=0;y< rows;y++)
	{
		if(document.getElementById(tableid).rows[y+1].cells[0].innerHTML == type && document.getElementById(tableid).rows[y+1].cells[1].innerHTML == description )
		{
			bool='true';
		}
	}	
	return bool;
}
function update_info(id)
{
	var product_name = document.getElementById('product_name').value;
	var product_description = document.getElementById('product_description').value;
	var market_info = document.getElementById('market_info').value;
	var product_category = document.getElementById('product_category').value;
	var product_sub_category = document.getElementById('product_sub_category').value;
	var brand_info = document.getElementById('brand_info').value;
	var product_info_status = document.getElementById('product_info_status').value;
	var product_ranged = document.getElementById('product_ranged').value;	
	var parent_keywords = document.getElementById('parent_keywords').value;	
	
	if(product_name == '' || product_description == '' || market_info == '' || product_category == '' || product_sub_category == '' || product_info_status == '')
	{
		last_gritter = $.gritter.add({
			title: 'Something Wrong',
			text: 'Please Complete Fields in Product Information',
			class_name: 'gritter-error gritter-center'
		});					
	}
	else
	{
		$.post("/HMadmin/Products/Edit-Product/LongEditParent",
		{
			temp_idkey: id,
			product_name:product_name,
			product_description:product_description,
			product_sub_category:product_sub_category,
			brand_info:brand_info,
			product_info_status:product_info_status,
			product_ranged:product_ranged,
			parent_keywords:parent_keywords,
		
		},
		function(result)
		{	
		 response = result.split('--');
		last_gritter = $.gritter.add({
			title: response[2],
			text: response[0],
			class_name: 'gritter-'+response[1]+' gritter-center'
		});	
		});		
	}	
}
function noSpecialChar(id)
{
	$(id).bind('input', function() {
	$(this).val($(this).val().replace(/[^a-z0-9.\s\w]/gi, ''));
	});
}
var tag_input = $('#parent_keywords');
if(! ( /msie\s*(8|7|6)/.test(navigator.userAgent.toLowerCase())) ) 
	tag_input.tag({placeholder:tag_input.attr('placeholder')});
else {
	//display a textarea for old IE, because it doesn't support this plugin or another one I tried!
	tag_input.after('<textarea id="'+tag_input.attr('id')+'" class="span12" name="'+tag_input.attr('name')+'" rows="3">'+tag_input.val()+'</textarea>').remove();
	// $('#form-field-tags').autosize({append: "\n"});
}
</script>


@endsection
