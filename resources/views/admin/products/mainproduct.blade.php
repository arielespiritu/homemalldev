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
	<div class="span12 widget-container-span" >
		<div class="widget-box"> 
			<div class="widget-header widget-header widget-header-small header-color-dark">
				<h5>Product Main</h5>
				<div class="widget-toolbar">
					<a href="javascript:;" onClick="reloadDatatable('tbl_product_main')"  data-action="reload">
						<i class="icon-refresh"></i>
					</a>
				</div>
			</div>
			<div class="widget-body" style="overflow:scroll" >
				<div class="widget-main">
					<div class="row-fluid">
						<table id="tbl_product_main" class="table table-striped table-bordered table-hover">
							<thead >
								<tr>
									<th style="width:5%;">ID</th>
									<th style="width:40%;">Product Name</th>
									<th class="" style="width:20%;">Sub Category</th>
									<th class=""style="width:15%;">Product Status</th>
									<th class="" style="width:10%;">Quantity</th>
									<th class="" style="width:10%;"></th>
								</tr>
							</thead>
							<tbody>
							<?php $i=0 ?>
							@foreach($productinformation as $prodinfo)
							
							
								<tr>
									<td>
										<p>{{$prodinfo->id}}</p>
									</td>								
									<td>
										<center>
											<p id="product_parag_id-{{$prodinfo->id}}">{{$prodinfo->product_name}}</p>
											<input type="text" class="span12" id="product_input_id-{{$prodinfo->id}}" value="{{$prodinfo->product_name}}" placeholder="Sub category Name" />
										</center>
									</td>	
									<td>
										<center>
										<p  id="product_combo_parag_id-{{$prodinfo->id}}" >{{$prodinfo->getSubCategoryName->SCN3}}</p>
											<select class="span12" style="width:100%; " id="product_combo_id-{{$i}}" data-placeholder="Choose Status">
													<option value="" />
												@foreach($sub_cat as $subcategory)
													<option value="{{$subcategory->id}}" />{{$subcategory->SCN3}} 
													@if($prodinfo->getSubCategoryName->CI1 == $subcategory->CI1)
														@if($prodinfo->getSubCategoryName->SC1 == $subcategory->SC1 )
															<option selected value="{{$subcategory->id}}" />{{$subcategory->SCN3}}
														@else
															<option value="{{$subcategory->id}}" />{{$subcategory->SCN3}}
														@endif	
													@else
													@endif
												@endforeach	
											</select>	
										
										</center>
									</td>
									<td>
											<div>
											<label class="switch" style="padding:0px;">
											@if($prodinfo->getStatus->indicator_name == 'PUBLISH')
												<h6 style="display:none">ACTIVE</h6>
												<input class="switch-input" id="" style="" onChange="" type="checkbox" checked/>
												
											@else
												<h6 style="display:none">INACTIVE</h6>
												<input class="switch-input" id="" style="" onChange="" type="checkbox"/>
												
											@endif
												
												<span class="switch-label" data-on="ACTIVE" data-off="INACTIVE"></span> 
												<span class="switch-handle"></span> 
											</label>
											</div>										
									</td>	
									<td>
										1.00
									</td>		
									<td class="td-actions">
										<div class="hidden-phone visible-desktop action-buttons">
											<a class="blue" onClick="getdata('{{$i}}')" href="javascript:;">
												<i class="icon-zoom-in bigger-130"></i>
											</a>

											<a class="green" href="javascript:;">
												<i class="icon-pencil bigger-130"></i>
											</a>
										</div>

										<div class="hidden-desktop visible-phone">
											<div class="inline position-relative">
												<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown">
													<i class="icon-caret-down icon-only bigger-120"></i>
												</button>

												<ul class="dropdown-menu dropdown-icon-only dropdown-yellow pull-right dropdown-caret dropdown-close">
													<li>
														<a href="javascript:;" onClick="getdata('{{$i}}')" class="tooltip-info" data-rel="tooltip"  title="View">
															<span class="blue">
																<i class="icon-zoom-in bigger-120"></i>
															</span>
														</a>
													</li>
													<li>
														<a href="javascript:;" class="tooltip-success" data-rel="tooltip" title="Edit">
															<span class="green">
																<i class="icon-edit bigger-120"></i>
															</span>
														</a>
													</li>
												</ul>
											</div>
										</div>
									</td>									
								</tr>
								<?php $i++; ?>
							@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('myscripts')
<script>
var getchosenCount= "{{$i}}";

createChosen(getchosenCount,"product_combo_id-");


function createChosen(countNum,additionalIDkey)
{
	for(i=0;i< countNum;i++)
	{
		$("#"+additionalIDkey+i).chosen({ width: '100%'});
	}
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////
$(function() {
	var oTable1 = $('#tbl_product_main').dataTable( {
	"aoColumns": [
	  { "bSortable": false },
	  null, null,null, null, 
	  { "bSortable": false }
	] } );
});
function getdata(s)
{
	var oTable = document.getElementById('tbl_product_main');
	 var oCells = oTable.rows.item(s).cells;
	 var cellVal = oCells.item(1).innerHTML;
	 alert(cellVal);
	
}
function reloadDatatable(id)
{
var gate="<?php echo  Crypt::encrypt('devANONE') ?>";
		$.post("/HMadmin/Products/reload-products",
		{
			gates:gate,
		},
		function(result)
		{		
			var resultJson=JSON.parse(result);
			//alert(result);
			var row = 0;
			$('#tbl_product_main').dataTable().fnClearTable();
			for(rI=0;rI<resultJson.length;rI++)
			{
				row=rI+1;
				var setToggle="";
				var setStatus=""
				if(resultJson[rI].get_status.indicator_name == 'PUBLISH')
				{
					setToggle='checked';
					setStatus='ACTIVE';
				}
				else
				{
					setToggle='';
					setStatus='INACTIVE';
				}
				$('#tbl_product_main').dataTable().fnAddData( [
					""+resultJson[rI].id,
					""+resultJson[rI].product_name,
					""+resultJson[rI].get_sub_category_name.SCN3,
					
					'<div>'+
					'<label class="switch" style="padding:0px;">'+
						'<h6 style="display:none">'+setStatus+'</h6>'+
						'<input class="switch-input" id="" style="" onChange="" type="checkbox" '+setToggle+'/>'+
					'<span class="switch-label" data-on="ACTIVE" data-off="INACTIVE"></span> '+
						'<span class="switch-handle"></span> '+
					'</label>'+
					'</div>',						
					
					"1",
					'	<div class="hidden-phone visible-desktop action-buttons">'+
					'		<a class="blue" onClick="getdata('+row+')" href="javascript:;">'+
					'			<i class="icon-zoom-in bigger-130"></i>'+
					'		</a>'+

					'		<a class="green" href="javascript:;">'+
					'			<i class="icon-pencil bigger-130"></i>'+
					'		</a>'+
					'	</div>'+							
					'<div class="hidden-desktop visible-phone">'+
						'<div class="inline position-relative">'+
						'	<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown">'+
						'		<i class="icon-caret-down icon-only bigger-120"></i>'+
						'	</button>'+
						'	<ul class="dropdown-menu dropdown-icon-only dropdown-yellow pull-right dropdown-caret dropdown-close">'+
						'		<li>'+
						'			<a href="javascript:;" onClick="getdata('+row+')" class="tooltip-info" data-rel="tooltip" tooltip="quick edit" title="View">'+
						'				<span class="blue">'+
						'					<i class="icon-zoom-in bigger-120"></i>'+
						'				</span>'+
						'			</a>'+
						'		</li>'+
						'		<li>'+
						'			<a href="javascript:;" class="tooltip-success" data-rel="tooltip" title="Edit">'+
						'				<span class="green">'+
						'					<i class="icon-edit bigger-120"></i>'+
						'				</span>'+
						'			</a>'+
						'		</li>'+
						'	</ul>'+
						'</div>'+
					'</div>'
					] );
			}
		});
}
</script>
@endsection
