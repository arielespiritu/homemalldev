@extends('admin.includes.master.master')
@section('main_header_title', 'Products')
@endsection
@section('sub_header_title', 'Product Information ')
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
			<li class="active">Products</li>
		</ul><!--.breadcrumb-->
	</div>
@endsection
@section('content')

<div id="accordion2" class="accordion">
	<div class="accordion-group">
		<div class="accordion-heading">
			<a href="#collapseOne" data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle collapsed">
				<li class="icon-plus"></li> Add Product
			</a>
		</div>
		<div class="accordion-body collapse"  id="collapseOne">
			<div class="accordion-inner">
				<center>
				<div class="row-fluid">
					<div class="span12">
						<center><span class="profile-picture ">
							<img id="avatar" class=""  src="{{URL::asset('assets/avatars/user.jpg')}}" />
						</span>
						</center>			
						<input type="file" id="store_logo_file"  accept="image/gif, image/jpeg, image/png"  class="ace-file-input" name="file-input"/>						
					</div>
				</div>
				</center>
					<div class="hr hr-18 dotted hr-double"></div>
				<div class="row-fluid" >
					<div class="span6">
						<div class="control-group">
							<label class="control-label" for="form-field-1"><li class="icon-basket"></li> Product Name</label>
							<div class="controls">
								<input type="text" class="span12" id="form-field-1" placeholder=""  />
							</div>
						</div>					
						<div class="control-group">
							<label class="control-label" for="form-field-1">Product description</label>
							<div class="controls">
									<textarea class="span12 limited" rows="3" id="form-field-9" style="resize:none;" data-maxlength="50"></textarea>
							</div>
						</div>	
						<div class="span12" style="margin:0px;">
							<div class="control-group span4">
								<label class="control-label" for="form-field-1">Market</label>
								<div class="controls">
									<select class="span12" onChange="showCategoryInfo(this.value)" id="market_info" style="width:100%;"  data-placeholder="Choose Category" > 
										<option value="" />
										@foreach($market_info as $market)
											<option value="{{$market->id}}" />{{$market->market_name}} 
										@endforeach										
									</select>	
								</div>
							</div>						
							<div class="control-group span4">
								<label class="control-label" for="form-field-1">Category</label>
								<div class="controls">
									<select class="span12" style="width:100%;" onChange="showSubCategoryInfo(this.value)" id="product_category" data-placeholder="Choose Category" >
										<option value="" />
									</select>	
								</div>
							</div>
							<div class="control-group span4">
								<label class="control-label" for="form-field-1">Sub Category</label>
								<div class="controls">
									<select class="span12" style="width:100%;" onchange="alert(this.value)" id="product_sub_category" data-placeholder="Choose Category" >
										<option value="" />
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
							<div class="control-group span6">
								<label class="control-label" for="form-field-1">Brand</label>
								<div class="controls">
									<select class="span12"  id="brand_info" style="width:100%;"  data-placeholder="Choose Category" > 
										<option value="" />
											<option value=""/>
									</select>	
								</div>
							</div>
							<div class="control-group span6">
								<label class="control-label" for="form-field-1">Add More Brand?</label>
								<div class="controls">
									<select class="span12" id="add_brand" onChange="visibleBrand(this.value)" style="width:100%;" data-placeholder="Choose Category" >
										<option value="" />
										<option value="1" />Yes
										<option value="0" />No
									</select>
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
												<input type="text" class="span10" id="add_subcat_input" placeholder="Brand Name"  />
												<button class="btn btn-default btn-mini span2 pull-right" onClick="">add</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>						
						<div class="span12" style="margin:0px;">
							<div class="control-group span4">
								<label class="control-label" for="form-field-1">Sale Price</label>
								<div class="controls">
									<input type="text" class="span12" onkeypress='return event.charCode >= 48 && event.charCode <= 57' onpaste="return false;" maxlength='9' ondrop="return false;" id="form-field-1" placeholder=""  />
								</div>
							</div>
							<div class="control-group span4">
								<label class="control-label" for="form-field-1">Retail Price</label>
								<div class="controls">
									<input type="text" class="span12" onkeypress='return event.charCode >= 48 && event.charCode <= 57' onpaste="return false;"  maxlength='9' ondrop="return false;" id="form-field-1" placeholder=""  />
								</div>
							</div>	
							<div class="control-group span4">
								<label class="control-label"  for="form-field-1">Product Cost</label>
								<div class="controls">
									<input type="text" class="span12" onkeypress='return event.charCode >= 48 && event.charCode <= 57' onpaste="return false;"  maxlength='9' ondrop="return false;" id="form-field-1" placeholder=""  />
								</div>
							</div>
						</div>
						<div class="span12" style="margin:0px;">
							<div class="control-group span6">
								<label class="control-label" for="form-field-1">Choose your Active Price:</label>
								<div class="controls">
									<select class="span12" style="width:100%;" id="active_price" data-placeholder="Choose Category" >
										<option value="" />
									@foreach($indicator as $price_status)
										<option value="{{$price_status->id}}" />{{$price_status->indicator_name}} 
									@endforeach	
									</select>	
								</div>
							</div>
							<div class="control-group span2">
								<label class="control-label" for="form-field-1">Quantity:</label>
								<div class="controls">
									<input type="text" class="span12" onkeypress='return event.charCode >= 48 && event.charCode <= 57' onpaste="return false;"  maxlength='9' ondrop="return false;"  id="form-field-1" placeholder=""  />
								</div>
							</div>	
							<div class="control-group span4">
								<div class="controls">
									<label class="control-label" for="form-field-1">Product Status: </label>							
									<select class="span12" style="width:100%; " id="product_status" data-placeholder="Choose Category" >
											<option value="" />
										@foreach($product_status as $product_stat)
											<option value="{{$product_stat->id}}" />{{$product_stat->indicator_name}} 
										@endforeach	
									</select>	
								</div>
							</div>
						</div>
						<div class="control-group">
							<div class="controls">
							<label class="control-label" for="form-field-1">Product Ranged: </label>							
									<textarea class="span12 limited" rows="4" id="form-field-9" style="resize:none;" data-maxlength="50"></textarea>
							</div>
						</div>	
					</div>
					<div class="span6">
						<div class="widget-box span12">
							<div class="widget-header">
								<h5>Product Variants(Optional)</h5>

								<div class="widget-toolbar">
									<a href="#" data-action="collapse">
										<i class="icon-chevron-up"></i>
									</a>
								</div>
							</div>

							<div class="widget-body">
								<div class="widget-main">
									<div class="span12" style="margin:0px;">
										<div class="control-group span6">
											<label class="control-label" for="form-field-1">Sale Price</label>
											<div class="controls">
												<input type="text" class="span12" id="form-field-1" placeholder="" disabled />
											</div>
										</div>
										<div class="control-group span6">
											<label class="control-label" for="form-field-1">Retail Price</label>
											<div class="controls">
												<input type="text" class="span12" id="form-field-1" placeholder="" disabled />
											</div>
										</div>	
									</div>								
									<table id="sample-table-2" class="table table-striped table-bordered table-hover">
										<thead>
											<tr>
												<th class="center">
													<label>
														<input type="checkbox" />
														<span class="lbl"></span>
													</label>
												</th>
												<th>Domain</th>
												<th>Price</th>
												<th class="hidden-480">Clicks</th>

												<th class="hidden-phone">
													<i class="icon-time bigger-110 hidden-phone"></i>
													Update
												</th>
												<th class="hidden-480">Status</th>

												<th></th>
											</tr>
										</thead>

										<tbody>
											<tr>
												<td class="center">
													<label>
														<input type="checkbox" />
														<span class="lbl"></span>
													</label>
												</td>

												<td>
													<a href="#">once.com</a>
												</td>
												<td>$20</td>
												<td class="hidden-480">1,400</td>
												<td class="hidden-phone">Apr 04</td>

												<td class="hidden-480">
													<span class="label label-info arrowed arrowed-righ">Sold</span>
												</td>

												<td class="td-actions">
													<div class="hidden-phone visible-desktop action-buttons">
														<a class="blue" href="#">
															<i class="icon-zoom-in bigger-130"></i>
														</a>

														<a class="green" href="#">
															<i class="icon-pencil bigger-130"></i>
														</a>

														<a class="red" href="#">
															<i class="icon-trash bigger-130"></i>
														</a>
													</div>

													<div class="hidden-desktop visible-phone">
														<div class="inline position-relative">
															<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown">
																<i class="icon-caret-down icon-only bigger-120"></i>
															</button>

															<ul class="dropdown-menu dropdown-icon-only dropdown-yellow pull-right dropdown-caret dropdown-close">
																<li>
																	<a href="#" class="tooltip-info" data-rel="tooltip" title="View">
																		<span class="blue">
																			<i class="icon-zoom-in bigger-120"></i>
																		</span>
																	</a>
																</li>

																<li>
																	<a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
																		<span class="green">
																			<i class="icon-edit bigger-120"></i>
																		</span>
																	</a>
																</li>

																<li>
																	<a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
																		<span class="red">
																			<i class="icon-trash bigger-120"></i>
																		</span>
																	</a>
																</li>
															</ul>
														</div>
													</div>
												</td>
											</tr>
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
 <br>
<div class="row-fluid">

	<table id="sample-table-2" class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th class="center">
					<label>
						<input type="checkbox" />
						<span class="lbl"></span>
					</label>
				</th>
				<th>Domain</th>
				<th>Price</th>
				<th class="hidden-480">Clicks</th>

				<th class="hidden-phone">
					<i class="icon-time bigger-110 hidden-phone"></i>
					Update
				</th>
				<th class="hidden-480">Status</th>

				<th></th>
			</tr>
		</thead>

		<tbody>
			<tr>
				<td class="center">
					<label>
						<input type="checkbox" />
						<span class="lbl"></span>
					</label>
				</td>

				<td>
					<a href="#">once.com</a>
				</td>
				<td>$20</td>
				<td class="hidden-480">1,400</td>
				<td class="hidden-phone">Apr 04</td>

				<td class="hidden-480">
					<span class="label label-info arrowed arrowed-righ">Sold</span>
				</td>

				<td class="td-actions">
					<div class="hidden-phone visible-desktop action-buttons">
						<a class="blue" href="#">
							<i class="icon-zoom-in bigger-130"></i>
						</a>

						<a class="green" href="#">
							<i class="icon-pencil bigger-130"></i>
						</a>

						<a class="red" href="#">
							<i class="icon-trash bigger-130"></i>
						</a>
					</div>

					<div class="hidden-desktop visible-phone">
						<div class="inline position-relative">
							<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown">
								<i class="icon-caret-down icon-only bigger-120"></i>
							</button>

							<ul class="dropdown-menu dropdown-icon-only dropdown-yellow pull-right dropdown-caret dropdown-close">
								<li>
									<a href="#" class="tooltip-info" data-rel="tooltip" title="View">
										<span class="blue">
											<i class="icon-zoom-in bigger-120"></i>
										</span>
									</a>
								</li>

								<li>
									<a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
										<span class="green">
											<i class="icon-edit bigger-120"></i>
										</span>
									</a>
								</li>

								<li>
									<a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
										<span class="red">
											<i class="icon-trash bigger-120"></i>
										</span>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</td>
			</tr>
		</tbody>
	</table>
</div>

@endsection
@section('myscripts')
<script>
$("#market_info").chosen({ width: '100%' });
$("#product_category").chosen({ width: '100%' });
$("#product_sub_category").chosen({ width: '100%' });
$("#brand_info").chosen({ width: '100%' });
$("#add_brand").chosen({ width: '100%' });
$("#active_price").chosen({ width: '100%' });
$("#product_status").chosen({ width: '100%'});
//var jsonBrand =<?php echo json_encode($brand_info); ?>;
//alert(JSON.stringify(jsoncity[i].view_all_locations));

var last_gritter;
function addSubcat(id)
{
	var getValue = document.getElementById(id).value;
	var category_id = document.getElementById("product_category").value;
	if(getValue == '' || getValue == null)
	{
		last_gritter = $.gritter.add({
			title: 'Ooppss, Something Wrong',
			text: 'Empty Field Occured',
			class_name: 'gritter-error gritter-center'
		});		
	}
	else
	{
		$.post("/HMadmin/Products/addSub",
		{
			temp_catid:category_id,
			sub_name:getValue,
		},
		function(result)
		{
			if(result == '0')
			{
				last_gritter = $.gritter.add({
					title: 'Error Occured',
					text: 'Please Contact the Administrator or please try again',
					class_name: 'gritter-error gritter-center'
				});					
			}
			else if(result == '2')
			{
				last_gritter = $.gritter.add({
					title: 'Something Wrong',
					text: 'the Sub category name is Exist Try to change the name or just look in the sub category dropdown',
					class_name: 'gritter-error gritter-center'
				});				
				
			}
			else
			{
				last_gritter = $.gritter.add({
					title: 'Add Succesfull',
					text: 'Your added Sub category name is on the Sub Category Dropdown',
					class_name: 'gritter-success gritter-center'
				});	
				var jsonParse=  JSON.parse(result);
				$('#product_sub_category').append('<option value='+jsonParse.id+'>'+jsonParse.sub_category_name+'</option>');
				$("#product_sub_category").trigger("liszt:updated");	
				
			}

		});			
	
	}
}
function showCategoryInfo(market_id)
{
	visibilityaccordion("#add_sub_category","out");
///category	
	
	var jsonCategory =<?php echo json_encode($category_info); ?>;
	var x = document.getElementById("product_category");
    document.getElementById("product_category").options.length = 0;
    var option = document.createElement("option");
    option.text = "";
    option.value = "";
    x.add(option);	
		for(getCategory=0;getCategory<jsonCategory.length;getCategory++)
		{
			if(jsonCategory[getCategory].market_id == market_id)
			{
				var option = document.createElement("option");	
				option.text =jsonCategory[getCategory].category_name;
				option.value =jsonCategory[getCategory].id;
				x.add(option);
			}
		}
		$("#product_category").trigger("liszt:updated");
//brand 
	var jsonBrand =<?php echo json_encode($brand_info); ?>;
//alert(JSON.stringify(jsonBrand));
	var x1 = document.getElementById("brand_info");
    document.getElementById("brand_info").options.length = 0;
    var option = document.createElement("option");
    option.text = "";
    option.value = "";
    x1.add(option);
		for(getBrand=0;getBrand<jsonBrand.length;getBrand++)
		{
			
			if(jsonBrand[getBrand].market_id == market_id)
			{
				var option = document.createElement("option");	
				option.text =jsonBrand[getBrand].brand_name;
				option.value =jsonBrand[getBrand].id;
				x1.add(option);
			}
		}	
		$("#brand_info").trigger("liszt:updated");
		
}
function showSubCategoryInfo(category_id)
{
visibilityaccordion("#add_sub_category","in");
	var jsonSubCategory =<?php echo json_encode($sub_cat); ?>;
	var x1= document.getElementById("product_sub_category");
    document.getElementById("product_sub_category").options.length = 0;
    var option = document.createElement("option");
    option.text = "";
    option.value = "";
    x1.add(option);	
		for(getSubCategory=0;getSubCategory<jsonSubCategory.length;getSubCategory++)
		{
			if(jsonSubCategory[getSubCategory].category_id == category_id)
			{
				var option = document.createElement("option");	
				option.text =jsonSubCategory[getSubCategory].sub_category_name;
				option.value =jsonSubCategory[getSubCategory].id;
				x1.add(option);
			}
		}
		$("#product_sub_category").trigger("liszt:updated");	
}
function visibleBrand(yesNo)
{
	
	if(yesNo=='1')
	{
		visibilityaccordion("#add_brand_name","in")
	}
	else
	{
		visibilityaccordion("#add_brand_name","out")
	}
}
function visibilityaccordion(id,fade)
{
	//add_sub_category
	if(fade == 'out')
	{
		$(id).fadeOut();	
	}
	else
	{
		$(id).fadeIn();	
	}
	
}
function toTitleCase(str)
{
    return str.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
}
</script>
@endsection
