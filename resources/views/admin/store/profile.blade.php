@extends('admin.includes.master.master')
@section('main_header_title', 'Profile')
@endsection
@section('sub_header_title', 'Store Information ')
@endsection
@section('breadcrumbs')
	<div class="breadcrumbs" id="breadcrumbs">
		<ul class="breadcrumb">
			<li>
				<i class="icon-home home-icon"></i>
				<a href="/HMadmin">Home</a>

				<span class="divider">
					<i class="icon-angle-right arrow-icon"></i>
				</span>
			</li>
			<li class="active">Store Profile</li>
		</ul><!--.breadcrumb-->
	</div>

@endsection
@section('content')

@foreach($userinfo as $user_info)
@endforeach

	<div class="widget-box">
		<div class="widget-header">
			<h4>Store Profile</h4>
			<span class="widget-toolbar">


				<a href="#" data-action="collapse">
					<i class="icon-chevron-up"></i>
				</a>
			</span>
		</div>

		<div class="widget-body">
			<div class="widget-main">	
				<div class="row-fluid">
					<div class="span12">
						<div class="span6">
						<h4><b>STORE INFORMATION </b></h4>
							<span class="profile-picture">
								<input type="hidden" id="store_logo_status" class="span6" name="file-input" />
								<!--<input type="hidden" style="display:none" id="store_id" value="{{$user_info->showStoreInfo->id}}" class="span6"/> -->
								<input type="hidden" style="display:none" id="store_id" value="{{$user_info->showStoreInfo->id}}" class="span6"/>
								
								@if(File::exists('assets/img/store/'.$user_info->showStoreInfo->store_name.'/logo/'.$user_info->showStoreInfo->id.'.jpg'))
									<img id="store_logo"  src="{{URL::asset('assets/img/store/'.$user_info->showStoreInfo->store_name.'/logo/'.$user_info->showStoreInfo->id.'.jpg')}}" />
									<input type="hidden" id="default_store_logo" value="{{URL::asset('assets/img/store/'.$user_info->showStoreInfo->store_name.'/logo/'.$user_info->showStoreInfo->id.'.jpg')}}" class="span6" name="file-input" />
								@elseif(File::exists('assets/img/store/'.$user_info->showStoreInfo->store_name.'/logo/'.$user_info->showStoreInfo->id.'.jpeg'))
									<img id="store_logo"  src="{{URL::asset('assets/img/store/'.$user_info->showStoreInfo->store_name.'/logo/'.$user_info->showStoreInfo->id.'.jpeg')}}" />
									<input type="hidden" id="default_store_logo" value="{{URL::asset('assets/img/store/'.$user_info->showStoreInfo->store_name.'/logo/'.$user_info->showStoreInfo->id.'.jpeg')}}" class="span6" name="file-input" />
								@elseif(File::exists('assets/img/store/'.$user_info->showStoreInfo->store_name.'/logo/'.$user_info->showStoreInfo->id.'.png'))
									<img id="store_logo"  src="{{URL::asset('assets/img/store/'.$user_info->showStoreInfo->store_name.'/logo/'.$user_info->showStoreInfo->id.'.png')}}" />		
   									<input type="hidden" id="default_store_logo" value="{{URL::asset('assets/img/store/'.$user_info->showStoreInfo->store_name.'/logo/'.$user_info->showStoreInfo->id.'.png')}}" class="span6" name="file-input" />	
								@else
									
								@endif
								<br>
								<br>
								@if($userLevel == 'STORE ADMIN')
								<input type="file" id="store_logo_file"  accept="image/gif, image/jpeg, image/png"  class="ace-file-input" name="file-input"/>
								<button id="store_logo_btncancel" onClick="cancel_upload('#store_logo_btncancel','#store_logo_file','#store_logo','default_store_logo','store_logo_status','store_logo_file')" class="btn btn-small btn-danger" style="display:none">Cancel</button>
								@else
								@endif	
							</span>
							<br>
							<br>

							<div class="control-group">
								<label class="control-label" for="form-field-1">Store Name </label>
								<div class="controls">
								@if($userLevel == 'STORE ADMIN')
									<input type="hidden" class="span12" id="store_name" placeholder="" value="{{$user_info->showStoreInfo->store_name}} "  />
									<input type="text" class="span12"  placeholder="" value="{{$user_info->showStoreInfo->store_name}} " disabled />
								@else
									
								@endif
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="form-field-1">Store Description</label>
								<div class="controls">
									@if($userLevel == 'STORE ADMIN')
									<textarea class="span12 limited" rows="3" id="store_description"  style="resize:none;" data-maxlength="50" >{{$user_info->showStoreInfo->store_description}}</textarea>
									@else
									<textarea class="span12 limited" rows="3"  style="resize:none;" data-maxlength="50" disabled>{{$user_info->showStoreInfo->store_description}}</textarea>
									@endif	
								</div>
							</div>
							<div class="row-fluid span12" style="margin:0px;">
								<div class="span6">
									<div class="control-group">
										<label class="control-label" for="form-field-1"> <i class="icon-screen-smartphone "></i> Store Mobile</label>
										<div class="controls">
											@if($userLevel == 'STORE ADMIN')
											<input type="text" class="  span12 input-mask-phone" id="store_mobile" value="{{$user_info->showStoreInfo->store_mobile}}" placeholder="(+63)9999-999999-9"  />
											@else
											<input type="text" class="  span12 input-mask-phone"  value="{{$user_info->showStoreInfo->store_mobile}}" placeholder="(+63)9999-999999-9" disabled />	
											@endif	
										</div>
									</div>				
								</div>
								<div class="span6">
									<div class="control-group">
										<label class="control-label" for="form-field-1"><i class="icon-phone"></i> Store Tel. Num</label>
										<div class="controls">
											@if($userLevel == 'STORE ADMIN')
											<input type="text" class=" span12 input-mask-tel" id="store_tel_num" value="{{$user_info->showStoreInfo->store_tel_num}}" placeholder="(02)-0000-000" />
											@else
											<input type="text" class=" span12 input-mask-tel"  value="{{$user_info->showStoreInfo->store_tel_num}}" placeholder="(02)-0000-000" disabled />	
											@endif
										</div>
									</div>				
								</div>
							</div>
							<div class="row-fluid span12" style="margin:0px;">
								<div class="span6"  >
										<label class="control-label" for="form-field-1">Store City </label>
										<div class="controls " >
											@if($userLevel == 'STORE ADMIN')
											<select class="span12" onChange="store_getArea(this.value)" style="width:100%;" id="store_profile_city" data-placeholder="Choose a City...">
											@else
											<select class="span12" style="width:100%;" id="store_profile_city" data-placeholder="Choose a Country..." disabled>
											@endif	
													<option value="" />
													@foreach($cities as $city)
														@if($user_info->showStoreInfo->store_city == $city->CT1)
														<option selected value="{{$city->CT1}}" />{{$city->CTN2}}
														@else
														<option value="{{$city->CT1}}" />{{$city->CTN2}}
														@endif	
													
													@endforeach
												</select>
										</div>
								</div>
								<div class="span6">
									<div class="control-group">
										<label class="control-label" for="form-field-1">Store Area</label>
										<div class="controls">
											@if($userLevel == 'STORE ADMIN')
											<select class="span12"  onChange="" style="width:100%;" id="store_profile_area" data-placeholder="Choose a City...">
											@else
											<select class="span12"  onChange=""style="width:100%;" id="store_profile_area1" data-placeholder="Choose a Area..."disabled>
											@endif
												<option value="" />
											</select>
										</div>
									</div>				
								</div>
							</div>		
							<div class="row-fluid span12" style="margin:0px;">
								<label class="control-label center" for="form-field-1"><i class="icon-film"></i><b> Complete Address</b></label>
								<textarea class="span12 limited" rows="10" id="store_complete_address" style="resize:none;" data-maxlength="50">{{$user_info->showStoreInfo->store_complete_address}}</textarea>
							</div>								
						</div>
						<div class="span6">
								<h4><b>STORE OWNER INFORMATION</b></h4>
								<div class="row-fluid">
									<span class="profile-picture span6">
										<input type="hidden" id="owner_image_status" class="" name="file-input" />
										<center>
										@if(File::exists('assets/img/store/'.$user_info->showStoreInfo->store_name.'/ownerimage/'.$user_info->showStoreInfo->id.'.jpg'))
											<img id="owner_picture"  src="{{URL::asset('assets/img/store/'.$user_info->showStoreInfo->store_name.'/ownerimage/'.$user_info->showStoreInfo->id.'.jpg')}}" />
											<input type="hidden" id="default_owner_image" value="{{URL::asset('assets/img/store/'.$user_info->showStoreInfo->store_name.'/ownerimage/'.$user_info->showStoreInfo->id.'.jpg')}}" class="span6" name="file-input" />	
										@elseif(File::exists('assets/img/store/'.$user_info->showStoreInfo->store_name.'/ownerimage/'.$user_info->showStoreInfo->id.'.jpeg'))
											<img id="owner_picture"  src="{{URL::asset('assets/img/store/'.$user_info->showStoreInfo->store_name.'/ownerimage/'.$user_info->showStoreInfo->id.'.jpeg')}}" />
											<input type="hidden" id="default_owner_image" value="{{URL::asset('assets/img/store/'.$user_info->showStoreInfo->store_name.'/ownerimage/'.$user_info->showStoreInfo->id.'.jpeg')}}" class="span6" name="file-input" />	
										@elseif(File::exists('assets/img/store/'.$user_info->showStoreInfo->store_name.'/ownerimage/'.$user_info->showStoreInfo->id.'.png'))
											<img id="owner_picture"  src="{{URL::asset('assets/img/store/'.$user_info->showStoreInfo->store_name.'/ownerimage/'.$user_info->showStoreInfo->id.'.png')}}" />
											<input type="hidden" id="default_owner_image" value="{{URL::asset('assets/img/store/'.$user_info->showStoreInfo->store_name.'/ownerimage/'.$user_info->showStoreInfo->id.'.png')}}" class="span6" name="file-input" />	
										@else
											
										@endif	
										</center>
										@if($userLevel == 'STORE ADMIN')
										<input type="file" id="owner_image_file" class="ace-file-input" name="file-input"/>
										<button id="owner_image_btncancel" onClick="cancel_upload('#owner_image_btncancel','#owner_image_file','#owner_picture','default_owner_image','owner_image_status','owner_image_file')" class="btn btn-small btn-danger" style="display:none">Cancel</button>
										@else
										@endif	
									</span>
								</div>	
							<br>
							<div class="control-group">
								<label class="control-label" for="form-field-1">Owner Name</label>
								<div class="controls">
									<input type="text" class="span12" id="form-field-1" value="{{$user_info->owner_name}}" placeholder="" disabled />
								</div>
							</div> 
							<div class="row-fluid span12" style="margin:0px;">
								<div class="span6">
									<div class="control-group">
										<label class="control-label" for="form-field-1"><i class="icon-screen-smartphone"></i> Owner Mobile</label>
										<div class="controls">
											@if($userLevel == 'STORE ADMIN')
											<input type="text" class=" span12 input-mask-phone" id="owner_mobile" value="{{$user_info->owner_mobile}}" placeholder="(+63)9999-999999-9" />
											@else
											<input type="text" class=" span12 input-mask-phone" placeholder="(+63)9999-999999-9" disabled />
											@endif	
										</div>
									</div>				
								</div>
								<div class="span6">
									<div class="control-group">
									<label class="control-label" for="form-field-1"><i class="icon-phone"></i> Owner Tel. Num</label>
										<div class="controls">
											@if($userLevel == 'STORE ADMIN')
											<input type="text" class=" span12 input-mask-tel" id="owner_tel_num" value="{{$user_info->owner_tel_num}}" placeholder="(02)-0000-000" />
											@else
											<input type="text" class=" span12 input-mask-tel"  value="{{$user_info->owner_tel_num}}" placeholder="(02)-0000-000" disabled />
											@endif
										</div>				
								</div>
							</div>
							<div class="row-fluid span12" style="margin:0px;">
								<div class="span6"  >
										<label class="control-label" for="form-field-1"><i class="icon-envelope-letter"></i> Email</label>
										<div class="controls " >
											@if($userLevel == 'STORE ADMIN')
												<input type="email" class=" span12 " id="owner_email" value="{{$user_info->owner_email}}"  />
											@else
												<input type="email" class=" span12" id="" value="{{$user_info->owner_email}}"  disabled />	
											@endif	
										</div>
								</div>
								<div class="span6">
									<div class="control-group">
										<label class="control-label" for="form-field-1">Gender</label>
										<div class="controls">
											@if($userLevel == 'STORE ADMIN')
											<select class="span12"  onChange=""style="width:100%;" id="store_owner_gender" data-placeholder="Choose a Gender...">
											@else
											<select class="span12"  onChange=""style="width:100%;" data-placeholder="Choose a Gender..." disabled>	
											@endif	
													<option value="" />Please Select
													@if($user_info->showStoreInfo->owner_gender == 'MALE' || 'male')
														<option value="FEMALE" />FEMALE
														<option selected value="MALE" />MALE
													@else
														<option selected value="FEMALE" />FEMALE
														<option  value="MALE" />MALE														
													@endif		
												</select>
										</div>
									</div>				
								</div>
							</div>		
							<div class="row-fluid span12" style="margin:0px;">
								<div class="span6"  >
										<label class="control-label" for="form-field-1">Store City</label>
										<div class="controls " >
											@if($userLevel == 'STORE ADMIN')
											<select class="" onChange="owner_getArea(this.value)" style="width:100%;" id="store_owner_city" data-placeholder="Choose a City...">
											@else
											<select class="" style="width:100%;"  data-placeholder="Choose a City..." disabled >
											@endif
													<option value="" />
													@foreach($cities as $city)
													@if($city->city_id == $user_info->owner_city)
													<option selected value="{{$city->CT1}}" />{{$city->CT1}}	
													@else
													<option value="{{$city->CT1}}" />{{$city->CTN2}}
													@endif
												
													@endforeach
											</select>
										</div>
								</div>						
								<div class="span6">
									<div class="control-group">
										<label class="control-label" for="form-field-1">Store Area</label>
										<div class="controls">
											@if($userLevel == 'STORE ADMIN')
											<select class="" style="width:100%;" id="store_owner_area" data-placeholder="Choose a Area...">
											@else
											<select class=""  onChange=""style="width:100%;"  data-placeholder="Choose a Area..." disabled>	
											@endif
											<option value="" />
												</select>
										</div>
									</div>				
								</div>
							</div>	
							<div class="row-fluid span12" style="margin:0px;">
								<label class="control-label center" for="form-field-1"><i class="icon-film"></i><b> Complete Address</b></label>
								<textarea class="span12 limited" rows="10" id="owner_complete_address" style="resize:none;" data-maxlength="50">{{$user_info->owner_complete_address}}</textarea>
							</div>		
						</div>		
					</div>
				</div>	
				<div class="row-fluid">
					<div class="control-group">
						<label class="control-label center" for="form-field-1"><i class="icon-film"></i><b> ABOUT STORE</b></label>
						<div class="controls">
						@if($userLevel == 'STORE ADMIN')
						<textarea class="span12 limited" rows="10" id="store_about" style="resize:none;" data-maxlength="50">{{$user_info->showStoreInfo->store_about}}</textarea>
						@else
						<textarea class="span12 limited" rows="10"  style="resize:none;" data-maxlength="50" disabled >{{$user_info->showStoreInfo->store_about}}</textarea>	
						@endif	
						</div>
					</div>					
				</div>
				@if($userLevel == 'STORE ADMIN')	
				<div class="row-fluid wizard-actions">
			    @else
				<div class="row-fluid wizard-actions" style="display:none">
				@endif	
					<button onClick="updateInfo()"  class="btn btn-success btn-next" data-last="Finish ">
						Save Info
						<i class="fa-save"></i>
					</button>
					
				</div>
			</div>
		</div>
	</div>
@endsection
@section('myscripts')
<script>
var last_gritter;
document.getElementById('store_logo_status').value="Nothing_Change";
document.getElementById('owner_image_status').value="Nothing_Change";

var store_savedcity= "{{$user_info->showStoreInfo->store_city}}";
store_getArea(store_savedcity);

var owner_savedcity= "{{$user_info->owner_city}}";
owner_getArea(owner_savedcity);



function store_getArea(value)
{	
	var savedArea= "{{$user_info->showStoreInfo->store_area}}";
    var x = document.getElementById("store_profile_area");
    document.getElementById("store_profile_area").options.length = 0;
    var option = document.createElement("option");
    option.text = "";
    option.value = "";
    x.add(option);
	
	//alert(value);
	var jsoncity =<?php echo json_encode($cities); ?>;
//	
	for (i=0;i<jsoncity.length;i++)
	{
		if(jsoncity[i].CT1 == value)
		{
			
			for(getarea=0;getarea<jsoncity[i].view_all_locations.length;getarea++)
			{
			//	alert(jsoncity[i].view_all_locations[getarea].LMA3+"-"+jsoncity[i].view_all_locations[getarea].LI1);
				var option = document.createElement("option");	
				option.text =jsoncity[i].view_all_locations[getarea].LMA3;
				option.value =jsoncity[i].view_all_locations[getarea].LI1;
				x.add(option);
			}
		}
		$("#store_profile_area").trigger("liszt:updated");
	}
		document.getElementById("store_profile_area").value = savedArea;
}
function owner_getArea(value)
{	
	var savedArea= "{{$user_info->owner_area}}";
    var x = document.getElementById("store_owner_area");
    document.getElementById("store_owner_area").options.length = 0;
    var option = document.createElement("option");
    option.text = "";
    option.value = "";
    x.add(option);
	
	//alert(value);
	var jsoncity =<?php echo json_encode($cities); ?>;
	for (i=0;i<jsoncity.length;i++)
	{
		if(jsoncity[i].CT1 == value)
		{
			
			for(getarea=0;getarea<jsoncity[i].view_all_locations.length;getarea++)
			{
			//	alert(jsoncity[i].view_all_locations[getarea].major_area+"-"+jsoncity[i].view_all_locations[getarea].id);
				var option = document.createElement("option");	
				option.text =jsoncity[i].view_all_locations[getarea].LMA3;
				option.value =jsoncity[i].view_all_locations[getarea].LI1;
				x.add(option);
			}
		}
		$("#store_owner_area").trigger("liszt:updated");
	}
	document.getElementById("store_owner_area").value = savedArea;
}
	$("#store_logo_file").change(function() {
		var val = $(this).val();
		
		
		switch(val.substring(val.lastIndexOf('.') + 1).toLowerCase()){
			 case 'jpg': case 'png':
					readURL(this,"#store_logo");
					document.getElementById('store_logo_status').value="New_Image";
					getDrectory("#store_logo_file","#store_logo_btncancel");
				break;
			default:
					$(this).val('');
				
					 $("#store_logo").attr('src',document.getElementById('default_store_logo').value);
					// error message here
					last_gritter = $.gritter.add({
						title: 'Ooopss!! the file is not an image',
						text: 'accept only JPEG or PNG file/s!',
						class_name: 'gritter-error gritter-center'
					});
					document.getElementById('store_logo_status').value="Nothing_Change";
				break;
					
		}
		
	});
	$("#owner_image_file").change(function() {
		var val = $(this).val();
		
		switch(val.substring(val.lastIndexOf('.') + 1).toLowerCase()){
			 case 'jpg': case 'png':
					readURL(this,"#owner_picture");
					document.getElementById('owner_image_status').value="New_Image";
					getDrectory("#owner_image_file","#owner_image_btncancel");
				break;
			default:
					$(this).val('');
					 $("#owner_picture").attr('src',document.getElementById('default_owner_image').value);
					// error message here
					last_gritter = $.gritter.add({
						title: 'Ooopss!! the file is not an image',
						text: 'accept only JPEG or PNG file/s!',
						class_name: 'gritter-error gritter-center'
					});
					document.getElementById('owner_image_status').value="Nothing_Change";
				break;
		}
	});
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
    }
}
$(function() {
	$("#store_profile_area").chosen(); 
	$("#store_profile_city").chosen(); 
	$("#store_owner_city").chosen(); 
	$("#store_owner_area").chosen(); 
	$('.input-mask-tel').mask('(99) 999-9999');
	$('.input-mask-phone').mask('(+99) 9999-99999-9');
	});
function getDrectory(changefrom,changeto)
{
	 $(changeto).fadeIn("slow");
	 $(changefrom).fadeOut("slow");
}
function cancel_upload(changefrom,changeto,returnimageID,returnImageto,status,clearinputID)
{
	getDrectory(changefrom,changeto);
	 $(returnimageID).attr('src',document.getElementById(returnImageto).value);
	 document.getElementById(status).value="Nothing_Change";
	 document.getElementById(clearinputID).value="";
}
function updateInfo()
{
	var store_logo_status=document.getElementById('store_logo_status').value;
	var store_description=document.getElementById('store_description').value;
	var store_mobile=document.getElementById('store_mobile').value;
	var store_tel_num=document.getElementById('store_tel_num').value;
	var store_profile_city=document.getElementById('store_profile_city').value;
	var store_profile_area=document.getElementById('store_profile_area').value;
	var store_about=document.getElementById('store_about').value;
	var store_complete_address=document.getElementById('store_complete_address').value;
	var store_name=document.getElementById('store_name').value;
	var store_logo_file = $('#store_logo_file');
	store_logo_file[0].files[0]
	var store_id=document.getElementById('store_id').value;
	
	var owner_image_status=document.getElementById('owner_image_status').value;
	var owner_mobile=document.getElementById('owner_mobile').value;
	var owner_tel_num=document.getElementById('owner_tel_num').value;
	var owner_email=document.getElementById('owner_email').value;
	var store_owner_gender=document.getElementById('store_owner_gender').value;
	var store_owner_city=document.getElementById('store_owner_city').value;
	var store_owner_area=document.getElementById('store_owner_area').value;
	var owner_complete_address=document.getElementById('owner_complete_address').value;
	var owner_image_file = $('#owner_image_file');
	
	var formData = new FormData();	
	//store
	formData.append('store_logo_status', store_logo_status);  
	formData.append('store_logo_file', store_logo_file[0].files[0]); 
	formData.append('store_description', store_description); 
	formData.append('store_mobile', store_mobile); 
	formData.append('store_tel_num', store_tel_num); 
	formData.append('store_profile_city', store_profile_city); 
	formData.append('store_profile_area', store_profile_area); 
	formData.append('store_complete_address', store_complete_address); 
	formData.append('store_name', store_name); 
	
	formData.append('store_about', store_about); 
	formData.append('store_id', store_id); 
	//owner 
	formData.append('owner_image_status', owner_image_status); 
	formData.append('owner_image_file', owner_image_file[0].files[0]); 
	formData.append('owner_mobile', owner_mobile); 
	formData.append('owner_tel_num', owner_tel_num); 
	formData.append('owner_email', owner_email); 
	formData.append('store_owner_gender', store_owner_gender); 
	formData.append('store_owner_city', store_owner_city); 
	formData.append('store_owner_area', store_owner_area); 
	formData.append('store_owner_area', store_owner_area); 
	formData.append('owner_complete_address', owner_complete_address); 
	
	// alert(store_logo_status+""+store_description+""+store_mobile+""+store_tel_num+""+store_profile_city+""+store_profile_area+""+store_about);
	// alert(owner_image_status+""+owner_mobile+""+owner_tel_num+""+owner_email+""+store_owner_gender+""+store_owner_city+""+store_owner_area);
	
	$.ajax({
		type: "POST",
		url: "/HMadmin/Store-Profile/Update",     // Url to which the request is send
		data:formData,
		contentType: false,       // The content type used when sending data to the server.
		processData:false,        // To send DOMDocument or non processed data file it is set to false		
		success: function(result)   // A function to be called if request succeeds
	{
		if(result == '1')
		{
			document.getElementById("owner_image_status").value="Nothing_Change";
			document.getElementById("store_logo_status").value="Nothing_Change";
			document.getElementById("store_logo_file").value="";			
			document.getElementById("owner_image_file").value="";			
			getDrectory("#store_logo_btncancel","#store_logo_file");
			getDrectory("#owner_image_btncancel","#owner_image_file");
			
			
			last_gritter = $.gritter.add({
				title: 'Huraayy!!! Your Information is Up-to-date',
				text: 'Please Reload the page to See Changes',
				class_name: 'gritter-success gritter-center'
			});
		}
		else
		{
			last_gritter = $.gritter.add({
				title: 'Ooopss!! Something Wrong',
				text: result,
				class_name: 'gritter-error gritter-center'
			});			
		}
		$('body,html').animate({
		scrollTop: 0
		}, 500);		
	}
	});	
	
}

</script>
@endsection
