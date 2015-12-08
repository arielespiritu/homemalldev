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
											<input type="text" class="span12" id="product_input_id-{{$prodinfo->id}}" style="display:none" value="{{$prodinfo->product_name}}" placeholder="Sub category Name" />
										</center>
									</td>	
									<td>
										<center>
										<p  id="combo_parag_id-{{$prodinfo->id}}" >{{$prodinfo->getSubCategoryName->SCN3}}</p>
											<select class="span12" id="product_combo_id-{{$prodinfo->id}}"  style="width:100%; z-index:999; display:none"  data-placeholder="Choose Status">
															<option value="" />
												@foreach($sub_cat as $subcategory)
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
										@if($prodinfo->getStatus->id == '9')
											<p  id="product_status_name-{{$prodinfo->id}}" style="display:none">PUBLISH</p>
											<input class="switch-input" onChange='changeStat("product_status_name-{{$prodinfo->id}}","{{$prodinfo->id}}")' type="checkbox" checked/>
											
										@else
											<p  id="product_status_name-{{$prodinfo->id}}"  style="display:none">NOT PUBLISH</p>
											<input class="switch-input" id="" style="" onChange='changeStat("product_status_name-{{$prodinfo->id}}","{{$prodinfo->id}}")' type="checkbox"/>
											
										@endif
											<span class="switch-label"  data-on="ACTIVE" data-off="INACTIVE"></span> 
											<span class="switch-handle"></span> 
										</label>
										</div>										
									</td>	
									<td>
										1.00
									</td>		
									<td class="td-actions">
										<div class="hidden-phone visible-desktop action-buttons">
											<a class="blue" id="product_btn_save-{{$i}}" onClick="btn_save('{{$prodinfo->id}}','product_input_id-{{$prodinfo->id}}','product_combo_id-{{$prodinfo->id}}','product_btn_edit-{{$i}}','product_btn_save-{{$i}}','product_btn_cancel-{{$i}}')" style="display:none" href="javascript:;">
												<i class="icon-save bigger-130"></i>
											</a>										
											<a class="orange" id="product_btn_view-{{$i}}" onClick="" href="/HMadmin/Product/{{$prodinfo->id}}">
												<i class="icon-zoom-in bigger-130"></i>
											</a>
											<a class="green" id="product_btn_edit-{{$i}}" onClick="visibility('product_btn_edit-{{$i}}','product_btn_save-{{$i}}','product_btn_cancel-{{$i}}','{{$prodinfo->id}}','edit')" href="javascript:;">
												<i class="icon-pencil bigger-130"></i>
											</a>
											<a class="red" id="product_btn_cancel-{{$i}}" style="display:none" onClick="visibility('product_btn_edit-{{$i}}','product_btn_save-{{$i}}','product_btn_cancel-{{$i}}','{{$prodinfo->id}}','cancel')" href="javascript:;">
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
														<a class="blue" id="product_btn_save-phone-{{$i}}" onClick="btn_save('{{$prodinfo->id}}','product_input_id-{{$prodinfo->id}}','product_combo_id-{{$prodinfo->id}}','product_btn_edit-phone-{{$i}}','product_btn_save-phone-{{$i}}','product_btn_cancel-phone-{{$i}}')" style="display:none" href="javascript:;">
															<i class="icon-save bigger-130"></i>
														</a>
													</li>
													<li>
														<a class="orange" id="product_btn_view-phone-{{$i}}" onClick="" href="javascript:;">
															<i class="icon-zoom-in bigger-130"></i>
														</a>
													</li>
													<li>
														<a class="green" id="product_btn_edit-phone-{{$i}}" onClick="visibility('product_btn_edit-phone-{{$i}}','product_btn_save-phone-{{$i}}','product_btn_cancel-phone-{{$i}}','{{$prodinfo->id}}','edit')" href="javascript:;">
															<i class="icon-pencil bigger-130"></i>
														</a>
													</li>
													<li>
														<a class="red" id="product_btn_cancel-phone-{{$i}}" style="display:none" onClick="visibility('product_btn_edit-phone-{{$i}}','product_btn_save-phone-{{$i}}','product_btn_cancel-phone-{{$i}}','{{$prodinfo->id}}','cancel')" href="javascript:;">
															<i class="icon-close bigger-130"></i>
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
var jsonSubCategory =<?php echo json_encode($sub_cat); ?>;
//createChosen(getchosenCount,"product_combo_id-");


function createChosen(countNum,additionalIDkey)
{
	// alert(countNum+"-"+additionalIDkey);
	for(i=0;i< countNum;i++)
	{
		if(i == countNum )
		{
			break;
		}
		else
		{
			$("#"+additionalIDkey+i).chosen({ width: '100%'});

		}
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
function visibility(idedit,idSave,idcancel,productkey,status)
{
	if(status == 'edit' )
	{
		$("#"+idedit).fadeOut("slow");
		$("#"+idcancel).fadeIn("slow");
		$("#"+idSave).fadeIn("slow");
		$("#product_input_id-"+productkey).fadeIn("slow");
		$("#product_combo_id-"+productkey).fadeIn("slow");
		$("#product_parag_id-"+productkey).fadeOut("slow");
		$("#combo_parag_id-"+productkey).fadeOut("slow");
	}
	else
	{
		$("#"+idedit).fadeIn("slow");
		$("#"+idcancel).fadeOut("slow");
		$("#"+idSave).fadeOut("slow");
		$("#product_input_id-"+productkey).fadeOut("slow");
		$("#product_combo_id-"+productkey).fadeOut("slow");
		$("#product_parag_id-"+productkey).fadeIn("slow");
		$("#combo_parag_id-"+productkey).fadeIn("slow");		
	}
}
function  getData(s)
{
	var oTable = document.getElementById('tbl_product_main');
	var oCells = oTable.rows.item(s).cells;
	var cellVal = oCells.item(1).innerHTML;
	alert(cellVal);
		
}
function changeStat(id,prodkey)
{
	alert(id+""+prodkey);
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
		$.post("/HMadmin/Products/Edit-Product/QuickEditStatus",
		{
			temp_indicator:indicatorKey,
			temp_prodkey:prodkey,
		},
		function(result)
		{
			//alert(result);
		});
}
function btn_save(prod_key,prod_name,subkey,idedit,idSave,idcancel)
{	
	alert(prod_key+"-"+prod_name+"-"+subkey+"-"+idedit+"-"+idSave+"-"+idSave);
	var  prod_name = document.getElementById(prod_name).value;
	var  subkey1=   document.getElementById(subkey).value;
		$.post("/HMadmin/Products/Edit-Product/QuickEdit",
		{
			temp_prodkey:prod_key,
			temp_prodname:prod_name,
			temp_subKey:subkey1,
		},
		function(result)
		{
			
			if(result == '1')
			{
				document.getElementById("product_parag_id-"+prod_key).innerHTML=""+prod_name;
				document.getElementById("combo_parag_id-"+prod_key).innerHTML=""+document.getElementById(subkey).options[document.getElementById(subkey).selectedIndex].text;
				visibility(idedit,idSave,idcancel,prod_key,"save");
			}
			else
			{
				visibility(idedit,idSave,idcancel,prod_key,"save");			
			}
		});		
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
			var row = 0;
			$('#tbl_product_main').dataTable().fnClearTable();
			for(rI=0;rI<resultJson.length;rI++)
			{
				
				var setToggle="";
				var setStatus=""
				if(resultJson[rI].get_status.indicator_name == 'PUBLISH')
				{
					setToggle='checked';
					setStatus='PUBLISH';
				}
				else
				{
					setToggle='';
					setStatus='NOT PUBLISH';
				}
				$('#tbl_product_main').dataTable().fnAddData( [
					""+resultJson[rI].id,
					""+'<center><p id="product_parag_id-'+resultJson[rI].id+'">'+resultJson[rI].product_name+'</p>'+
					'<input type="text" class="span12" style="display:none" id="product_input_id-'+resultJson[rI].id+'" value="'+resultJson[rI].product_name+'" placeholder="Sub category Name" /></center>',
					
					""+'<center><p  id="combo_parag_id-'+resultJson[rI].id+'" >'+resultJson[rI].get_sub_category_name.SCN3+'</p>'+
					'<select class="span12" style="width:100%; z-index:999; display:none" id="product_combo_id-'+resultJson[rI].id+'" data-placeholder="Choose Status">'+stringBuilder(<?php echo $prodinfo->getSubCategoryName->CI1;?>,resultJson[rI].get_sub_category_name.SC1)+'</select></center>',
					'<div>'+
					'<label class="switch" style="padding:0px;">'+
						'<p id="product_status_name-'+resultJson[rI].id+'" style="display:none">'+setStatus+'</p>'+
						'<input class="switch-input" id="" onChange= changeStat("product_status_name-'+resultJson[rI].id+'","'+resultJson[rI].id+'") style="" onChange="" type="checkbox" '+setToggle+'/>'+
					'<span class="switch-label" data-on="ACTIVE" data-off="INACTIVE"></span> '+
						'<span class="switch-handle"></span> '+
					'</label>'+
					'</div>',						
					
					"1",
					'	<div class="hidden-phone visible-desktop action-buttons">'+
					'		<a class="blue" id="product_btn_save-'+rI+'" onClick= btn_save("'+resultJson[rI].id+'","product_input_id-'+resultJson[rI].id+'","product_combo_id-'+resultJson[rI].id+'","product_btn_edit-'+rI+'","product_btn_save-'+rI+'","product_btn_cancel-'+rI+'") style="display:none" href="javascript:;">'+
					'			<i class="icon-save bigger-130"></i>'+
					'		</a>'+										
					'		<a class="orange" id="product_btn_view-'+rI+'" onClick="" href="/HMadmin/Product/'+resultJson[rI].id+'">'+
					'			<i class="icon-zoom-in bigger-130"></i>'+
					'		</a>'+
					'		<a class="green" id="product_btn_edit-'+rI+'" onClick= visibility("product_btn_edit-'+rI+'","product_btn_save-'+rI+'","product_btn_cancel-'+rI+'","'+resultJson[rI].id+'","edit")  href="javascript:;">'+
					'			<i class="icon-pencil bigger-130"></i>'+
					'		</a>'+
					'		<a class="red" id="product_btn_cancel-'+rI+'" style="display:none" onClick= visibility("product_btn_edit-'+rI+'","product_btn_save-'+rI+'","product_btn_cancel-'+rI+'","'+resultJson[rI].id+'","cancel") href="javascript:;">'+
					'			<i class="icon-close bigger-130"></i>'+
					'		</a>'+
					'	</div>'+							
					'<div class="hidden-desktop visible-phone">'+
						'<div class="inline position-relative">'+
						'	<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown">'+
						'		<i class="icon-caret-down icon-only bigger-120"></i>'+
						'	</button>'+
						'	<ul class="dropdown-menu dropdown-icon-only dropdown-yellow pull-right dropdown-caret dropdown-close">'+
						'		<li>'+
							'		<a class="blue" id="product_btn_save-phone-'+rI+'" onClick= btn_save("'+resultJson[rI].id+'","product_input_id-'+resultJson[rI].id+'","product_combo_id-'+resultJson[rI].id+'","product_btn_edit-phone-'+rI+'","product_btn_save-phone-'+rI+'","product_btn_cancel-phone-'+rI+'") style="display:none" href="javascript:;">'+
							'			<i class="icon-save bigger-130"></i>'+
							'		</a>'+										
						'		</li>'+						
						'		<li>'+						
							'		<a class="orange" id="product_btn_view-phone-'+rI+'" onClick="" href="javascript:;">'+
							'			<i class="icon-zoom-in bigger-130"></i>'+
							'		</a>'+
						'		</li>'+						
						'		<li>'+						
							'		<a class="green" id="product_btn_edit-phone-'+rI+'" onClick= visibility("product_btn_edit-phone-'+rI+'","product_btn_save-phone-'+rI+'","product_btn_cancel-phone-'+rI+'","'+resultJson[rI].id+'","edit")  href="javascript:;">'+
							'			<i class="icon-pencil bigger-130"></i>'+
							'		</a>'+
						'		</li>'+						
						'		<li>'+						
							'		<a class="red" id="product_btn_cancel-phone-'+rI+'" style="display:none" onClick= visibility("product_btn_edit-phone-'+rI+'","product_btn_save-phone-'+rI+'","product_btn_cancel-phone-'+rI+'","'+resultJson[rI].id+'","cancel") href="javascript:;">'+
							'			<i class="icon-close bigger-130"></i>'+
							'		</a>'+
						'		</li>'+						
						'	</ul>'+
						'</div>'+
					'</div>'
					] );
			row=rI+1;
			}
		});
}
function stringBuilder(catid,subid)
{
	var valueOptions='<option value=""></option>';
	for(getSubCategory=0;getSubCategory<jsonSubCategory.length;getSubCategory++)
	{
		if(jsonSubCategory[getSubCategory].CI1 == catid )
		{
			if(jsonSubCategory[getSubCategory].SC1 == subid)
			{
				valueOptions+='<option selected value="'+jsonSubCategory[getSubCategory].SC1+'">'+jsonSubCategory[getSubCategory].SCN3+'</option>';	
			}
			else
			{
				valueOptions+='<option value="'+jsonSubCategory[getSubCategory].SC1+'">'+jsonSubCategory[getSubCategory].SCN3+'</option>';	
			}
		}
	}
	return valueOptions;
}
</script>
@endsection
