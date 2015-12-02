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
			<li class="active">Products </li>
		</ul><!--.breadcrumb-->
	</div>
@endsection
@section('content')
<div class="row-fluid">
	<div class="widget-box span12 collapsed">
			<div class="widget-header widget-header-small header-color-dark">
				<h5>Add Product Here</h5>
				<div class="widget-toolbar">
					<a href="javascript:;" data-action="collapse">
						<i class="icon-chevron-down"></i>
					</a>
				</div>
			</div>
		<div class="widget-body">
			<div class="widget-main">
				<br>
				<div class="row-fluid" >
					<div class="span4">
						<div class="control-group">
							<label class="control-label" >Product Type <a href="javascript:;"  onClick="messageInfo('product_type')" class="pull-right"><li class="icon-info" style="Color:red"> what ?</li></a></label>
							<div class="controls">
								<select class="span12" id="product_type" onChange="isChildorParent(this.value)" style="width:100%;" data-placeholder="Choose Category" >
									<option value="" />
									<option selected value="main"/>Main Product
									<option value="child"/>Child Product
								</select>
							</div>
						</div>						
					</div>	
					<div class="control-group span2">
						<label class="control-label" >Market</label>
						<div class="controls">
							<select class="span12" onChange="showChild_category_info(this.value)" id="child_market_info" style="width:100%;"  data-placeholder="Choose Category" > 
								<option value="" />
								@foreach($market_info as $market)
									<option value="{{$market->MI1}}" />{{$market->MN2}} 
								@endforeach										
							</select>	
						</div>
					</div>	
					<div class="control-group span3">
						<label class="control-label" >Category</label>
						<div class="controls">
							<select class="span12" style="width:100%;" onChange=" showChild_sub_category(this.value)" id="child_category_info" data-placeholder="Choose Category" >
								<option value="" />
							</select>	
						</div>
					</div>
					<div class="control-group span3">
						<label class="control-label" >Sub Category</label>
						<div class="controls">
							<select class="span12" style="width:100%;" onChange="getProduct(this.value)" id="child_sub_category_info" data-placeholder="Choose Sub category" >
								<option value="" />
							</select>	
						</div>
					</div>					
				</div>
				<div class="row-fluid">			
					<div class="span12" >
						<div class="control-group">
							<label class="control-label" >Product Name </label>
							<div class="controls">
								<select class="span12" id="product_main_names" onChange="addChildInfo(this.value)" style="width:100%;" data-placeholder="Choose Product main" >

								</select>
							</div>
						</div>						
					</div>				
				</div>
				<div class="hr hr-18 dotted hr-double"></div>
				<div class="row-fluid">
					<div class="span6" id="product_information_div">
						<div class="widget-box span12">
							<div class="widget-header widget-header-small header-color-dark ">
								<h5>Product Information</h5>
							</div>

							<div class="widget-body">
								<div class="widget-main">
								
									<div class="control-group">
										<input id="product_information_status" value="NEW" style="display:none"/>
										<label class="control-label" ><li class="icon-basket"></li> Product Name</label>
										<div class="controls">
											<input type="text" class="span12" id="product_name" placeholder=""  />
										</div>
									</div>					
									<div class="control-group">
										<label class="control-label" >Product description</label>
										<div class="controls">
												<textarea class="span12 limited" rows="3" id="product_description" style="resize:none;" data-maxlength="50"></textarea>
										</div>
									</div>	
									<div class="span12" style="margin:0px;">
										<div class="control-group span4">
											<label class="control-label" >Market</label>
											<div class="controls">
												<select class="span12" onChange="showCategoryInfo(this.value)" id="market_info" style="width:100%;"  data-placeholder="Choose Category" > 
													<option value="" />
													@foreach($market_info as $market)
														<option value="{{$market->MI1}}" />{{$market->MN2}} 
													@endforeach										
												</select>	
											</div>
										</div>		
										<div class="control-group span4">
											<label class="control-label" >Category</label>
											<div class="controls">
												<select class="span12" style="width:100%;" onChange="showSubCategoryInfo(this.value)" id="product_category" data-placeholder="Choose Category" >
													<option value="" />
												</select>	
											</div>
										</div>
										<div class="control-group span4">
											<label class="control-label" >Sub Category</label>
											<div class="controls">
												<select class="span12" style="width:100%;" onchange="" id="product_sub_category" data-placeholder="Choose Category" >
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
											<label class="control-label" >Brand</label>
											<div class="controls">
												<select class="span12"  id="brand_info" style="width:100%;"  data-placeholder="Choose Category" > 
													<option value="" />
														<option value=""/>
												</select>	
											</div>
										</div>
										<div class="control-group span6">
											<label class="control-label" >Add More Brand?</label>
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
															<input type="text" class="span10" id="add_brand_input" placeholder="Brand Name"  />
															<button class="btn btn-default btn-mini span2 pull-right" onClick="addBrand('add_brand_input')">add</button>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>	
									<div class="span12" style="margin:0px;">
										<div class="control-group span12">
											<label class="control-label" >Product Status:</label>
											<div class="controls">
												<select class="span12" style="width:100%;" id="product_info_status" data-placeholder="Choose Category" >
													<option value="" />
												@foreach($indicator as $price_status)
													<option value="{{$price_status->id}}" />{{$price_status->indicator_name}} 
												@endforeach	
												</select>	
											</div>
										</div>
									</div>
									<div class="control-group">
										<div class="controls">
										<label class="control-label" >Product Ranged: </label>							
												<textarea class="span12 limited" rows="4" id="product_ranged" placeholder="EG. 2 to 3 days timeframe" style="resize:none;" data-maxlength="50"></textarea>
										</div>
									</div>								
								</div>
							</div>
						</div>
					</div>
					<div class="span6"  id="product_complex_div">
						<div class="widget-box span12">
							<div class="widget-header widget-header-small header-color-dark">
								<h5>Product Complex Description</h5>
							</div>
							<div class="widget-body">
								<div class="widget-main"  style="height:515px; overflow-y: scroll;">
									<div class="span12">
										<div class="control-group span12">
											<input id="product_complex_status" value="NEW" style="display:none"/>
											<label class="control-label" >Description Type<a href="javascript:;"  onClick="messageInfo('variant_info')" class="pull-right"><li class="icon-info" style="Color:red"> No data ?</li></a></label>
											<div class="controls">
												<div class="span12">
													<select class="span12" style="width:100%;"  id="description_type" data-placeholder="Choose Variant Type" >
														<option value="" />
													</select>	
												</div>	
											</div>
										</div>	
									</div>
									<div class="span12" style="margin:0px;">
										<div class="row-fluid">
											<div class="control-group span10">
												<div class="controls">
													<input type="text" class="span12" id="description_name" placeholder="Variant Name"  />
												</div>
											</div>						 					
											<div class="span2">
												<button class="btn btn-default btn-mini span12 pull-right" id="variant_add_btn" onClick="addVariants()">add</button>
											</div>									
										</div>	
										<br>											
									</div>	
									<table id="variant_tbl" class="table table-striped table-bordered table-hover"  >
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
					<div class="span12" style="margin:0px;">
						<div class="widget-box span12">
							<div class="widget-header widget-header-small header-color-dark">
								<h5>Combination (temp lang d ko lang ilalagay)</h5>
							</div>
							<div class="widget-body">
								<div class="widget-main" >
									<div class="row-fluid span12" style="margin-bottom:30px;">
										<input type="text" id="product_combo_image_result" value="NO IMAGES" style="display:none"/> 
										<center>
											<div class="widget-box span12" id="sample">
												<div class="widget-header ">
												<h5>Images</h5>
												</div>
												<div class="widget-body">
													<div class="widget-main">
													<a href="javascript:;"  onClick="messageInfo('upload_other_image')" class="pull-left"><li class="icon-info" style="Color:red"><b> Read Rules First</b></li></a>
														<br>
														<div id="other_images_result" >
														</div>
														<div class="hr hr-18 dotted hr-double"></div>									
														<div class="row-fluid">
															<input type="file" id="product_other_file" name="files[]" onChange="multipleImgViews()" multiple="multiple"  accept="image/gif, image/jpeg, image/png"  class="ace-file-input" name="file-input"/>						
															<button id="product_other_cancel" onClick='getDrectory("product_other_cancel","product_other_file","cancelOther")' style="display:none"  class="btn btn-small btn-danger" >Cancel</button>
														</div>
													</div>
												</div>
											</div>
										</center>	
									</div>
									<div class="row-fluid span12" style="margin:0px;">
										<div class="control-group span2">
											<label class="control-label" >Sale Price</label>
											<div class="controls">
												<input type="text" class="span12" onkeypress='return event.charCode >= 48 && event.charCode <= 57' onpaste="return false;" maxlength='9' ondrop="return false;" id="product_saleprice" placeholder=""  />
											</div>
										</div>
										<div class="control-group span2">
											<label class="control-label" >Retail Price</label>
											<div class="controls">
												<input type="text" class="span12" onkeypress='return event.charCode >= 48 && event.charCode <= 57' onpaste="return false;"  maxlength='9' ondrop="return false;" id="product_retailprice" placeholder=""  />
											</div>
										</div>	
										<div class="control-group span2">
											<label class="control-label"  >Product Cost</label>
											<div class="controls">
												<input type="text" class="span12" onkeypress='return event.charCode >= 48 && event.charCode <= 57' onpaste="return false;"  maxlength='9' ondrop="return false;" id="product_cost" placeholder=""  />
											</div>
										</div>
										<div class="control-group span2">
											<label class="control-label" >Quantity:</label>
											<div class="controls">
												<input type="text" class="span12" onkeypress='return event.charCode >= 48 && event.charCode <= 57' onpaste="return false;"  maxlength='9' ondrop="return false;"  id="product_quantity" placeholder=""  />
											</div>
										</div>		
										<div class="control-group span2">
											<div class="controls">
												<label class="control-label" > Active Price: </label>							
												<select class="span12" style="width:100%; " id="combo_active_price" data-placeholder="Choose Active Price" >
														<option value="" />
													@foreach($product_status as $product_stat)
														<option value="{{$product_stat->id}}" />{{$product_stat->indicator_name}} 
													@endforeach	
												</select>	
											</div>
										</div>	
										<div class="control-group span2">
											<div class="controls">
												<label class="control-label" >Status: </label>							
												<select class="span12" style="width:100%;" id="combo_status" data-placeholder="Choose Status" >
														<option value="" />
													@foreach($indicator as $price_status)
														<option value="{{$price_status->id}}" />{{$price_status->indicator_name}} 
													@endforeach	
												</select>		
											</div>
										</div>									
										<div id="product_combinations" class="span12 row-fluid" style="margin: 0px;">
										</div>
									</div>	
									<input id="select_values"  style="display:none" />
									<input id="product_combo_result" value="NOT YET SAVE" style="display:none"/>
									<label> &nbsp;</label>
								</div>
							</div>
						</div>
					</div>					
				</div>
				<div class="hr hr-18 dotted hr-double"></div>				
				<div class="row-fluid wizard-actions">
					<button onClick="resetFieldsChild()"  class="btn btn-danger btn-next" data-last="Finish ">
						Reset Product
						<i class="fa-save"></i>
					</button>				
					<button onClick="addProduct()" id="addProduct_btn" class="btn btn-success btn-next" data-last="Finish ">
						<i id="loading" style="font-size:5px; font-color: white; display:none;" class="spinner-loader"></i>
						Add Product
					</button>
				</div>			
			</div>
		</div>
	</div>		
</div>		
<!--<br>
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
-->
@endsection
@section('myscripts')
<script>
var jsonCategory =<?php echo json_encode($category_info); ?>;
var jsonBrand =<?php echo json_encode($brand_info); ?>;
var jsonVariants =<?php echo json_encode($variants); ?>;
var jsonSubCategory =<?php echo json_encode($sub_cat); ?>;

$("#product_main_names").chosen({ width: '100%' });
$("#market_info").chosen({ width: '100%' });
$("#product_type").chosen({ width: '100%' });
$("#product_category").chosen({ width: '100%' });
$("#product_sub_category").chosen({ width: '100%' });
$("#brand_info").chosen({ width: '100%' });
$("#add_brand").chosen({ width: '100%' });
$("#active_price").chosen({ width: '100%' });
$("#product_status").chosen({ width: '100%'});
$("#description_type").chosen({ width: '100%'});
$("#child_category_info").chosen({ width: '100%'});
$("#child_market_info").chosen({ width: '100%'});
$("#child_sub_category_info").chosen({ width: '100%'});
$("#combo_status").chosen({ width: '100%'});
$("#combo_active_price").chosen({ width: '100%'});
 
 //noSpecialChar('#product_name');
 noSpecialChar('#product_description');
 noSpecialChar('#add_subcat_input');
 noSpecialChar('#add_brand_input');
 noSpecialChar('#product_ranged');
 noSpecialChar('#description_name');


isChildorParent(document.getElementById('product_type').value);


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
			//alert(result);
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
				$('#product_sub_category').append('<option value='+jsonParse.SC1+'>'+jsonParse.SCN3+'</option>');
				$("#product_sub_category").trigger("liszt:updated");	
				
			}

		});			
	
	}
}

function isChildorParent(value)
{
	//alert(value)
	if(value=='child')
	{
		$("#product_complex_div").fadeOut();
		$("#product_information_div").fadeOut();
		$("#product_main_names").attr('disabled', false).trigger("liszt:updated");
		// product information
		$('#market_info').prop('disabled', true).trigger("liszt:updated");
		$('#product_category').prop('disabled', true).trigger("liszt:updated");
		$('#brand_info').prop('disabled', true).trigger("liszt:updated");
		$('#add_brand').prop('disabled', true).trigger("liszt:updated");
		$('#product_sub_category').prop('disabled', true).trigger("liszt:updated");
		$('#active_price').prop('disabled', true).trigger("liszt:updated");
		//product complex
		$('#description_type').prop('disabled', true).trigger("liszt:updated");
		document.getElementById("variant_add_btn").disabled = true;
		document.getElementById("description_name").disabled = true;
		//
		$('#child_market_info').prop('disabled', false).trigger("liszt:updated");
		$('#child_category_info').prop('disabled', false).trigger("liszt:updated");
		$('#child_sub_category_info').prop('disabled', false).trigger("liszt:updated");		
	}
	else
	{
		$("#product_complex_div").fadeIn();
		$("#product_information_div").fadeIn();		
		$("#product_main_names").attr('disabled', true).trigger("liszt:updated");
		// product information
		$('#market_info').prop('disabled', false).trigger("liszt:updated");
		$('#product_category').prop('disabled', false).trigger("liszt:updated");
		$('#brand_info').prop('disabled', false).trigger("chosen:updated");
		$('#add_brand').prop('disabled', false).trigger("liszt:updated");
		$('#product_sub_category').prop('disabled', false).trigger("liszt:updated");
		$('#active_price').prop('disabled', false).trigger("liszt:updated");
		//product complex
		$('#description_type').prop('disabled', false).trigger("liszt:updated");
		document.getElementById("variant_add_btn").disabled = false;
		document.getElementById("description_name").disabled = false;
		//
		$('#child_market_info').prop('disabled', true).trigger("liszt:updated");
		$('#child_category_info').prop('disabled', true).trigger("liszt:updated");
		$('#child_sub_category_info').prop('disabled', true).trigger("liszt:updated");
		
	}
}
function addProduct()
{
	var arrayParent= [];
	var child={};
	var getSelect= document.getElementById('select_values').value;
//product information
	var product_combo_result = document.getElementById('product_combo_result').value;
	
	var product_name = document.getElementById('product_name').value;
	var product_description = document.getElementById('product_description').value;
	var market_info = document.getElementById('market_info').value;
	var product_category = document.getElementById('product_category').value;
	var product_sub_category = document.getElementById('product_sub_category').value;
	var brand_info = document.getElementById('brand_info').value;
	var product_info_status = document.getElementById('product_info_status').value;
	var product_ranged = document.getElementById('product_ranged').value;
//product 	
	var product_saleprice = document.getElementById('product_saleprice').value;
	var product_retailprice = document.getElementById('product_retailprice').value;
	var product_cost = document.getElementById('product_cost').value;
	var product_quantity = document.getElementById('product_quantity').value;
	var combo_active_price = document.getElementById('combo_active_price').value;
	var combo_status = document.getElementById('combo_status').value;
	
	var selectValues = document.getElementById('select_values').value;

	var formData = new FormData();
	var countFiles=0;
	
	if(getSelect === '' || getSelect === null)
	{
		last_gritter = $.gritter.add({
			title: 'Something Wrong',
			text: 'Your Product Complex Is Empty Please Create product complex ',
			class_name: 'gritter-error gritter-center'
		});			
	}
	else
	{
		getSelect = getSelect.split(',');
		for(i=0; i<getSelect.length;i++)
		{
				var selectobject= document.getElementById(getSelect[i]);
				var y = 1;
				//alert(selectobject.value);
				formData.append("default_"+getSelect[i],selectobject.value); 
				while(selectobject.options[y]) 
				{
					child={};
					child[getSelect[i]]=selectobject.options[y].value;
					//alert(selectobject.options[y].value);	
					//alert(child[getSelect[i]]);	
					arrayParent.push(child);
					y++;
				}
				//alert();
				formData.append(getSelect[i],JSON.stringify(arrayParent)); 
				arrayParent= [];
		}
			formData.append('product_name',product_name); 
			formData.append('product_description',product_description); 
			formData.append('market_info',market_info); 
			formData.append('product_sub_category',product_sub_category); 
			formData.append('brand_info',brand_info); 
			formData.append('product_info_status',product_info_status); 
			formData.append('brand_info',brand_info); 
			formData.append('product_category',product_category); 
			formData.append('product_ranged',product_ranged); 
			
			formData.append('product_saleprice',product_saleprice); 
			formData.append('product_retailprice',product_retailprice); 
			formData.append('product_cost',product_cost); 
			formData.append('product_quantity',product_quantity); 
			formData.append('combo_active_price',combo_active_price); 
			formData.append('combo_status',combo_status); 
			formData.append('product_combo_result',product_combo_result); 
			
			formData.append('selectValues',selectValues); 
			
			
			jQuery.each(jQuery('#product_other_file')[0].files, function(i, file) {
			countFiles++;
			formData.append('image-'+i, file);
		});
		// $('#loading').fadeIn();
		// $('#addProduct_btn').prop('disabled', true);
			//alert(countFiles);
			formData.append('imagecount',countFiles); 
			$.ajax({
				type: "POST",
				url: "/HMadmin/Products/addProduct",     // Url to which the request is send
				data:formData,
				contentType: false,       // The content type used when sending data to the server.
				processData:false,        // To send DOMDocument or non processed data file it is set to false		
				success: function(result)   // A function to be called if request succeeds
			{
				alert(result);
				var jsonResponse=  JSON.parse(result);
				if(jsonResponse[0].success == '1')
				{
					//alert('1');
					document.getElementById('product_combo_result').value = jsonResponse[0].data;
					document.getElementById('product_complex_status').value='SAVED';
					resetFieldsChild();
					last_gritter = $.gritter.add({
						title: 'Huray!!!',
						text: 'Product was Succesfully Added you can now Add more product Subordinates',
						class_name: 'gritter-success gritter-center'
					});					
					// $('#loading').fadeOut();
					// $('#addProduct_btn').prop('disabled', false);	
					
				}
				else
				{
					messageResult='';
					for(i= 0; i<jsonResponse[0].data.length;i++)
					{
						messageResult+=jsonResponse[0].data[i]+'<br>';
					}
						last_gritter = $.gritter.add({
							title: 'Something Wrong',
							text: messageResult,
							class_name: 'gritter-error gritter-center'
						});	
						// $('#loading').fadeOut();
						// $('#addProduct_btn').prop('disabled', false);	
				}
			}
			});	
		
	}
}
function addBrand(id)
{
	var getValue = document.getElementById(id).value;
	var mkrt_id = document.getElementById("market_info").value;
	if(getValue == '' || getValue == null)
	{
		last_gritter = $.gritter.add({
			title: 'Ooppss, Something Wrong',
			text: 'Empty Field Occured',
			class_name: 'gritter-error gritter-center'
		});		
	}
	else if(mkrt_id == '' || getValue == null)
	{
		last_gritter = $.gritter.add({
			title: 'Ooppss, Something Wrong',
			text: 'Please Select your Market',
			class_name: 'gritter-error gritter-center'
		});			
	}	
	else
	{
		$.post("/HMadmin/Products/addBrand",
		{
			temp_mrktid:mkrt_id,
			brand_name:getValue,
		},
		function(result)
		{
			//alert(result);
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
					text: 'Your added Sub category name is on the Brand Dropdown',
					class_name: 'gritter-success gritter-center'
				});	
				var jsonParse=  JSON.parse(result);
				$('#brand_info').append('<option value='+jsonParse.BI1+'>'+jsonParse.BN2+'</option>');
				$("#brand_info").trigger("liszt:updated");	
			}
		});		
	}	
}
function showChild_category_info(MI1)
{
	var x1= document.getElementById("child_category_info");
    document.getElementById("child_category_info").options.length = 0;
	$("#child_category_info").trigger("liszt:updated");
	
    document.getElementById("child_sub_category_info").options.length = 0;
	$("#child_sub_category_info").trigger("liszt:updated");	
	
	var x = document.getElementById("child_category_info");
    document.getElementById("child_category_info").options.length = 0;
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
		$("#child_category_info").trigger("liszt:updated");	
}
function getProduct(SC1)
{
	$.post("/HMadmin/Products/getProducts",
	{
		tempChild_subcat:SC1,
	},
	function(result)
	{	
		var x = document.getElementById("product_main_names");
		document.getElementById("product_main_names").options.length = 0;
		var option = document.createElement("option");
		option.text = "";
		option.value = "";
		x.add(option);	
		var jsonProduct=  JSON.parse(result);
		for(getProdNames= 0;getProdNames < jsonProduct.length;getProdNames++)
		{
			var option = document.createElement("option");
			option.text = jsonProduct[getProdNames].product_name;
			option.value = jsonProduct[getProdNames].id;
			x.add(option);	
		}
		$("#product_main_names").trigger("liszt:updated");
	});
}
function addChildInfo(value)
{
	$.post("/HMadmin/Products/viewChild",
	{
		product_info:value,
	},
	function(result)
	{
		alert(result);
	});		
}
function showChild_sub_category(CI1)
{
	var x1= document.getElementById("child_sub_category_info");
	document.getElementById("child_sub_category_info").options.length = 0;
	var option = document.createElement("option");
	option.text = "";
	option.value = "";
	x1.add(option);	
		for(getSubCategory=0;getSubCategory<jsonSubCategory.length;getSubCategory++)
		{
			if(jsonSubCategory[getSubCategory].CI1 == CI1)
			{
				var option = document.createElement("option");	
				option.text =jsonSubCategory[getSubCategory].SCN3;
				option.value =jsonSubCategory[getSubCategory].SC1;
				x1.add(option);
			}
		}
		$("#child_sub_category_info").trigger("liszt:updated");		
}
function showCategoryInfo(MI1)
{
	visibilityaccordion("#add_sub_category","out");
///category	
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
function noSpecialChar(id)
{
	$(id).bind('input', function() {
	$(this).val($(this).val().replace(/[^a-z0-9\s\w]/gi, ''));
	});
}
function readURL(input,displayTo) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $(displayTo).attr('src', e.target.result);
	//		var getImagesize = input.files[0].size/1024;
	//		var newimage = new Image();
	//		var imagex = e.target.result;
	//		newimage.src = imagex;		
	//		alert(getImagesize.toFixed(0) +"KB" + "width-"+newimage.width);			
        }
        reader.readAsDataURL(input.files[0]);
		getDrectory("product_default_image","product_default_cancel",'not cancel');
		 
    }
}
function getDrectory(changefrom,changeto,checkifcancel,imgsrclear)
{
	if(checkifcancel=='cancel')
	{
	 document.getElementById(changeto).value="";
	 $("#product_primary_image").attr('src',"");
	}
	else if(checkifcancel=='cancelOther')
	{
		 document.getElementById(changeto).value="";
		 $("#other_images_result").empty();
		 document.getElementById('product_combo_image_result').value='NO IMAGES';
	}
		 $("#"+changeto).fadeIn("slow");
		 $("#"+changefrom).fadeOut("slow");
}
function removeElement(element)
{
    $(element).remove();
}

function addVariants()
{	  
	var variantName= document.getElementById('description_name').value;
    var x = document.getElementById("description_type").selectedIndex;
    var y = document.getElementById("description_type").options;	
   	var variant_info=y[x].text;
	variant_name = variantName;
	variant_type = variant_info;
	var checkifNew= document.getElementById('product_complex_status').value;
	if(checkifNew == 'SAVED')
	{
		var prod_info_id = document.getElementById("product_combo_result").value;	
		$.post("/HMadmin/Products/addVariant",
		{
			variant_name:variant_name,
			variant_type:variant_type,
			product_info_id:prod_info_id,
		},
		function(result)
		{
			//alert(result);
		});			
		
		
	}
	if(variantName == '' || variant_info == '')
	{
		last_gritter = $.gritter.add({
			title: 'Something Wrong',
			text: 'Description Type Fields are Required',
			class_name: 'gritter-error gritter-center'
		});			
	}
	else if(checkifhasinTable("variant_tbl",variant_type,variant_name)=='true')
	{
		last_gritter = $.gritter.add({
			title: 'Something Wrong',
			text: 'Already Exist in table',
			class_name: 'gritter-error gritter-center'
		});					
	}
	else
	{
		action_btn = 	
								'<div class="hidden-phone visible-desktop action-buttons">'+
									'<a class="red" href="javascript:;" onClick= delRow("'+variant_type.split(' ').join('_')+'","'+variant_name.split(' ').join('_')+'")>'+
										'<i class="icon-trash bigger-130"></i>'+
									'</a>'+
								'</div>'+
								'<div class="hidden-desktop visible-phone">'+
									'<div class="inline position-relative">'+
										'<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown">'+
											'<i class="icon-caret-down icon-only bigger-120"></i>'+
										'</button>'+
										'<ul class="dropdown-menu dropdown-icon-only dropdown-yellow pull-right dropdown-caret dropdown-close">'+
											'<li>'+
												'<a href="javascript:;" onClick= delRow("'+variant_type.split(' ').join('_')+'","'+variant_name.split(' ').join('_')+'") class="tooltip-error" data-rel="tooltip" title="Delete">'+
													'<span class="red">'+
														'<i class="icon-trash bigger-120"></i>'+
													'</span>'+
												'</a>'+
											'</li>'+
										'</ul>'+
									'</div>'+
								'</div>';

		$('#variant_tbl').append('<tr><td>'+variant_type+'</td><td>'+variant_name+'</td><td>'+action_btn+'</td></tr>');
		getTableValues("variant_tbl");		
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
function getTableValues(tableid)
{

	var rows = document.getElementById(tableid).getElementsByTagName('tbody')[0].getElementsByTagName('tr').length;
	var x = document.getElementById(tableid).rows[1].cells[0].innerHTML;
	var arrayList= document.getElementById('select_values');
	var selectstags = [];
	for(y=0;y< rows;y++)
	{
		
		var cell0value=document.getElementById(tableid).rows[y+1].cells[0].innerHTML;
		var cell0description=document.getElementById(tableid).rows[y+1].cells[1].innerHTML;
		cell0value = cell0value.split(' ').join('_');
		if(arrayList.value=='' || arrayList.value == null)
		{
			cell0value = cell0value.split(' ').join('_');
			selectstags.push(cell0value);
			creatingSelects(cell0value,selectstags);
			$("#"+cell0value+" option:last").after($('<option value="'+cell0description.split(' ').join('_')+'">'+cell0description+'</option>'));	
			$("#"+cell0value).trigger("liszt:updated");
		}
		else
		{
			
			selectstags = arrayList.value.split(",");
			if(selectstags.indexOf(cell0value) > -1)
			{

				var exist='false';
				$('#'+cell0value+' option').each(function(){
					if (this.value == cell0description.split(' ').join('_')) {
						exist= 'true';
					}
				});
				
				if(exist=='false')
				{

					$("#"+cell0value+" option:last").after($('<option value="'+cell0description.split(' ').join('_')+'">'+cell0description+'</option>'));	
					$("#"+cell0value).trigger("liszt:updated");
					

				}
				else
				{
				
				}

			}
			else
			{
				
				selectstags.push(cell0value);
				creatingSelects(cell0value,selectstags);
				$("#"+cell0value+" option:last").after($('<option value="'+cell0description.split(' ').join('_')+'">'+cell0description+'</option>'));				
				// var x1= document.getElementById(cell0value);
				// var option = document.createElement("option");
				// option.text = cell0description;
				// option.value = cell0description;
				// x1.add(option);	
				$("#"+cell0value).trigger("liszt:updated");
			}
			
		}
	}
	arrayList.value=selectstags;
	
}

function validateDuplicate(cell0value)
{
	$('#'+cell0value+' option').each(function(){
	if (this.value == cell0description) {
		return 'true';
	}
	else
	{
		return 'false';
	}
});
}
function creatingSelects(values,optionlist)
{
	//$('#product_combinations').html('');
var getselectLabels = values.split(',');

	for(i=0;i<getselectLabels.length;i++)
	{
		//alert(getselectLabels[i]);
		var selectList = '<div class="control-group span4 style="margin:0px;">'+
						 '<label class="control-label" >'+getselectLabels[i].split('_').join(' ')+'</label>'+
						 '<div class="controls">'+
						 '<select id="'+getselectLabels[i].split(' ').join('-')+'" onChange="alert(this.id)" data-placeholder="Choose '+toTitleCase(getselectLabels[i]).split('_').join(' ') +'"  class="span12" style="width:100%;">';
		selectList += "<option values='0'></option>";
		selectList += "</select></div></div>";
		$('#product_combinations').append(selectList);
		$("#"+getselectLabels[i]).chosen({ width: '100%'});
		
	}
	
}
function resetFieldsChild()
{
	var getSelects = document.getElementById('select_values').value.split(',');
	for(i=0;i< getSelects.length;i++)
	{ 
		$('#'+getSelects[i]).find('option:selected').removeAttr('selected');
		$('#'+getSelects[i]).trigger("liszt:updated");
	}
	getDrectory("product_other_cancel","product_other_file","cancelOther");
	document.getElementById('product_saleprice').value='';
	document.getElementById('product_retailprice').value='';
	document.getElementById('product_cost').value='';
	document.getElementById('product_quantity').value='';	
	
	
	
}
function deleteElement(count,id)
{
	if(count <= 1)
	{
		$("#"+ id).remove();
		$("#"+id).trigger("liszt:updated");
	}
}	
function delRow(type,description)
  {
	var checkifNew= document.getElementById('product_complex_status').value;
	if(checkifNew == 'NEW')
	{
	var current = window.event.srcElement;
	while ( (current = current.parentElement)  && current.tagName !="TR");
	current.parentElement.removeChild(current);	  
	 var selectobject=document.getElementById(type);
	 var getProductcomboStatus=  document.getElementById('product_combo_result').value;
	 if(getProductcomboStatus == 'NOT YET SAVE')
	 {
	  for (var i=0; i<selectobject.length; i++)
		{
			if (selectobject.options[i+1].value.split(' ').join('_') == description || selectobject.options[i+1].value == description  )
			{
				selectobject.remove(i+1);
				$("#"+type).trigger("liszt:updated");
			}
			else
			{
				
			}
		}		 
	 }
	}
	else if(checkifNew == 'SAVED')
	{
		last_gritter = $.gritter.add({
		title: 'Oppps.. DATA is in use',
		text: 'You Cannot delete data after adding a product Go to Edit Section to modify ',
		class_name: 'gritter-info gritter-center'
		});			
	}
  }
function showSubCategoryInfo(CI1)
{
visibilityaccordion("#add_sub_category","in");

	var x1= document.getElementById("product_sub_category");
    document.getElementById("product_sub_category").options.length = 0;
    var option = document.createElement("option");
    option.text = "";
    option.value = "";
    x1.add(option);	
		for(getSubCategory=0;getSubCategory<jsonSubCategory.length;getSubCategory++)
		{
			if(jsonSubCategory[getSubCategory].CI1 == CI1)
			{
				var option = document.createElement("option");	
				option.text =jsonSubCategory[getSubCategory].SCN3;
				option.value =jsonSubCategory[getSubCategory].SC1;
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
function messageInfo(messagetype)
{
	if(messagetype == 'variant_info')
	{
		last_gritter = $.gritter.add({
		title: 'No Data In Description',
		text: 'The Product Description is Depends on the market place you Selected if there is no data in Selected Market place, you may Contact HomemallPH to request A Variants info',
		class_name: 'gritter-info gritter-center'
		});			
		
	}
	else if(messagetype == 'product_type')
	{
		last_gritter = $.gritter.add({
		title: 'What is Product Type?',
		text: 'product is categorized by its type such as: <b>MAIN</b> and <b>CHILD</b> product. MAIN product is the default product and the Child Product is the Related to the Main Product',
		class_name: 'gritter-info gritter-center'
		});		
		
	}
	else if(messagetype == 'upload_other_image')
	{
		last_gritter = $.gritter.add({
		title: 'Upload Other Images',
		text: '1. LIMIT 5 images Only <br>2. PNG or JPG Only <br>3. less than 1mb Only <br> if some images you selected is not Display on the panel it may have Encounter this rules',
		class_name: 'gritter-info gritter-center'
		});		
		
	}

	
}
        window.onload = function () {
            var fileUpload = document.getElementById("product_other_file");
            fileUpload.onchange = function () {
                if (typeof (FileReader) != "undefined") {
                    var dvPreview = document.getElementById("other_images_result");
                    dvPreview.innerHTML = "";
                    var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
                    for (var i = 0; i < fileUpload.files.length; i++) {
														
                        var file = fileUpload.files[i];
                        if (regex.test(file.name.toLowerCase())) {
							var getid=0;
                            var reader = new FileReader();
							reader.fileName = file.name;
							reader.fileSize = file.size;
							reader.fileWidth = file.width;
							reader.fileHeight = file.height;
                            reader.onload = function (e) 
							{
								if(getid <5)
								{
									var checkifextension= e.target.fileName.split('.').pop()
									if(getKiloBytes(e.target.fileSize) < 1 )
									{
										if(checkifextension.toLowerCase() == 'png' || checkifextension.toLowerCase() == 'jpg' )
										{
										//	$("#other_images_result").append('<span class="profile-picture" id="span_image-'+getid+'"><a href="javascript:;" onClick= removeElement("#span_image-'+getid+'")><li class="icon-close red icon-large pull-right" style="position:static;"></li></a><img id="other_image-'+getid+'" class=""  src="'+e.target.result+'" style="width:120px; height:100px;" /></span>');									
											$("#other_images_result").append('<span class="profile-picture" id="span_image-'+getid+'"></a><img id="other_image-'+getid+'" class=""  src="'+e.target.result+'" style="width:120px; height:100px;" /></span>');									
											document.getElementById('product_combo_image_result').value='HAS IMAGES';
										}
									}
								}
                            }
                            reader.readAsDataURL(file);
                        } else {
                            dvPreview.innerHTML = "";
                            return false;
                        }
                    }
					getDrectory("product_other_file","product_other_cancel",'not cancel');
                } else {
                    //alert("This browser does not support HTML5 FileReader.");
					 dvPreview.innerHTML = "";
                }
            }

        };
		
function formatSizeUnits(bytes){
        if      (bytes>=1000000000) {bytes=(bytes/1000000000).toFixed(2)+' GB';}
        else if (bytes>=1000000)    {bytes=(bytes/1000000).toFixed(2)+' MB';}
        else if (bytes>=1000)       {bytes=(bytes/1000).toFixed(2)+' KB';}
        else if (bytes>1)           {bytes=bytes+' bytes';}
        else if (bytes==1)          {bytes=bytes+' byte';}
        else                        {bytes='0 byte';}
        return bytes;
}
function getKiloBytes(bytes)
{
	bytes=(bytes/1000000).toFixed(2)
	return bytes;
}

</script>

@endsection
