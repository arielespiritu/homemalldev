@extends('admin.includes.master.master')
@section('main_header_title', 'Products')
@endsection
@section('sub_header_title', 'Add Product ')
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
	<div class="widget-box span12 ">
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
					<div class="span12" id="product_information_div">
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
									<div class="span12" style="margin:0px;">
										<div class="control-group span4">
											<label class="control-label" >Market </label>
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
										<div class="control-group span4">
											<label class="control-label" >Brand</label>
											<div class="controls">
												<select class="span12" onChange="alert(this.value)"  id="brand_info" style="width:100%;"  data-placeholder="Choose Category" > 
													<option value="" />
														<option value=""/>
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
													@foreach($indicator as $price_status)
														<option value="{{$price_status->id}}" />{{$price_status->indicator_name}} 
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
														<textarea class="span12 limited" rows="4" id="product_description" style="resize:none;" data-maxlength="50"></textarea>
												</div>
											</div>										
										</div>	
										<div class="span6">									
											<div class="control-group">
												<div class="controls">
												<label class="control-label" >Product Ranged: </label>							
														<textarea class="span12 limited" rows="4" id="product_ranged" placeholder="EG. 2 to 3 days timeframe" style="resize:none;" data-maxlength="50"></textarea>
												</div>
											</div>	
										</div>	
									</div>	
									<div class="row-fluid">	
										<div class="span12">	
											<div class="control-group">
												<label class="control-label " for="form-field-tags">Keywords:</label>
												<div class="controls">
													<input type="text" name="tags"  id="parent_keywords" value=" " placeholder="Enter tags ..." />
												</div>
											</div>									
										</div>									
									</div>									
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span12"  id="product_complex_div">
						<div class="widget-box span12">
							<div class="widget-header widget-header-small header-color-dark">
								<h5>Product Complex Description</h5>
							</div>
							<div class="widget-body">
								<div class="widget-main"  style="height:300px; overflow-y: scroll;">
									<div class="span12">
										<div class="control-group span4">
											<input id="product_complex_status" value="NEW" style="display:none"/>
											<div class="controls">
												<div class="span12">
													<select class="span12" style="width:100%;"  id="description_type" data-placeholder="Choose Variant Type" >
														<option value="" />
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
											<button class="btn btn-default btn-mini span12 pull-right" id="variant_add_btn" onClick="addVariants()">add</button>
										</div>										
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
								<h5>Product Variants</h5>
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
										<div  class="row-fluid" style="margin: 0px;">
											<div id="product_combinations" class="span12">
	
											</div>
										</div>
									</div>	
									<input id="select_values" style="display:none"  />
									<input id="product_combo_result" value="NOT YET SAVE" style="display:none"/>
									
									
									<label> &nbsp;</label>
								</div>
							</div>
						</div>
					</div>					
				</div>
				<div class="hr hr-18 dotted hr-double"></div>				
				<div class="row-fluid wizard-actions">
					<button onClick="window.location.reload()"  class="btn btn-danger btn-next" data-last="Finish ">
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
$("#product_info_status").chosen({ width: '100%'});
</script>
<script  src="{{URL::asset('assets/adminscript/product/addproduct.js')}}"></script> 
@endsection
