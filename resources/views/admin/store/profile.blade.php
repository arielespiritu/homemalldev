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
				<a href="/">Home</a>

				<span class="divider">
					<i class="icon-angle-right arrow-icon"></i>
				</span>
			</li>
			<li class="active">Store Profile</li>
		</ul><!--.breadcrumb-->
	</div>

@endsection
@section('content')
	<div class="widget-box">
		<div class="widget-header">
			<h4>Store Profile</h4>
			<span class="widget-toolbar">
				<a href="#" data-action="reload">
					<i class="icon-refresh"></i>
				</a>

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
								<img id="store_logo"  src="{{URL::asset('assets/avatars/142.jpg')}}" />
								<br>
								<br>
								<input type="file" id="store_logo_file"  accept="image/gif, image/jpeg, image/png"  class="ace-file-input" name="file-input"/>
								<button id="store_logo_btncancel" onClick="cancel_upload('#store_logo_btncancel','#store_logo_file','#store_logo','{{URL::asset('assets/avatars/142.jpg')}}')" class="btn btn-small btn-danger" style="display:none">Cancel</button>
							</span>
							<br>
							<br>
@foreach($userinfo as $user_info)
	
		

@endforeach
							<div class="control-group">
								<label class="control-label" for="form-field-1">Store Name </label>
								<div class="controls">
								@if($userLevel == 'STORE ADMIN')
									<input type="text" class="span12" id="form-field-1" placeholder="" value="{{$user_info->showStoreInfo->store_name}} " disabled />
								@else
									
								@endif
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="form-field-1">Store Description</label>
								<div class="controls">
									@if($userLevel == 'STORE ADMIN')
									<textarea class="span12 limited" rows="3" id="form-field-9" style="resize:none;" data-maxlength="50" >{{$user_info->showStoreInfo->store_description}}</textarea>
									@else
									<textarea class="span12 limited" rows="3" id="form-field-9" style="resize:none;" data-maxlength="50" disabled>{{$user_info->showStoreInfo->store_description}}</textarea>
									@endif	
								</div>
							</div>
							<div class="row-fluid span12" style="margin:0px;">
								<div class="span6">
									<div class="control-group">
										<label class="control-label" for="form-field-1"> <i class="icon-screen-smartphone "></i> Store Mobile</label>
										<div class="controls">
											@if($userLevel == 'STORE ADMIN')
											<input type="text" class="  span12 input-mask-phone" id="form-field-1" value="{{$user_info->showStoreInfo->store_mobile}}" placeholder="(+639)9999-99999-9"  />
											@else
											<input type="text" class="  span12 input-mask-phone" id="form-field-1" value="{{$user_info->showStoreInfo->store_mobile}}" placeholder="(+639)9999-99999-9" disabled />	
											@endif	
										</div>
									</div>				
								</div>
								<div class="span6">
									<div class="control-group">
										<label class="control-label" for="form-field-1"><i class="icon-phone"></i> Store Tel. Num</label>
										<div class="controls">
											@if($userLevel == 'STORE ADMIN')
											<input type="text" class=" span12 input-mask-tel" id="form-field-1" value="{{$user_info->showStoreInfo->store_tel_num}}" placeholder="(02)-0000-000" />
											@else
											<input type="text" class=" span12 input-mask-tel" id="form-field-1" value="{{$user_info->showStoreInfo->store_tel_num}}" placeholder="(02)-0000-000" disabled />	
											@endif
										</div>
									</div>				
								</div>
							</div>
							<div class="row-fluid span12" style="margin:0px;">
								<div class="span6"  >
										<label class="control-label" for="form-field-1">Store City</label>
										<div class="controls " >
											@if($userLevel == 'STORE ADMIN')
											<select class="span12" style="width:100%;" id="store_profile_city" data-placeholder="Choose a Country...">
											@else
											<select class="span12" style="width:100%;" id="store_profile_city" data-placeholder="Choose a Country..." disabled>
											@endif	
													<option value="" />
													<option value="AL" />Alabama
													<option value="AK" />Alaska
													<option value="AZ" />Arizona
													<option value="AR" />Arkansas
													<option value="CA" />California
													<option value="CO" />Colorado
													<option value="CT" />Connecticut
													<option value="DE" />Delaware
													<option value="FL" />Florida
													<option value="GA" />Georgia
													<option value="HI" />Hawaii
													<option value="ID" />Idaho
													<option value="IL" />Illinois
													<option value="IN" />Indiana
													<option value="IA" />Iowa
													<option value="KS" />Kansas
													<option value="KY" />Kentucky
													<option value="LA" />Louisiana
													<option value="ME" />Maine
													<option value="MD" />Maryland
													<option value="MA" />Massachusetts
													<option value="MI" />Michigan
													<option value="MN" />Minnesota
													<option value="MS" />Mississippi
													<option value="MO" />Missouri
													<option value="MT" />Montana
													<option value="NE" />Nebraska
													<option value="NV" />Nevada
													<option value="NH" />New Hampshire
													<option value="NJ" />New Jersey
													<option value="NM" />New Mexico
													<option value="NY" />New York
													<option value="NC" />North Carolina
													<option value="ND" />North Dakota
													<option value="OH" />Ohio
													<option value="OK" />Oklahoma
													<option value="OR" />Oregon
													<option value="PA" />Pennsylvania
													<option value="RI" />Rhode Island
													<option value="SC" />South Carolina
													<option value="SD" />South Dakota
													<option value="TN" />Tennessee
													<option value="TX" />Texas
													<option value="UT" />Utah
													<option value="VT" />Vermont
													<option value="VA" />Virginia
													<option value="WA" />Washington
													<option value="WV" />West Virginia
													<option value="WI" />Wisconsin
													<option value="WY" />Wyoming
												</select>
										</div>
								</div>
								<div class="span6">
									<div class="control-group">
										<label class="control-label" for="form-field-1">Store Area</label>
										<div class="controls">
											@if($userLevel == 'STORE ADMIN')
											<select class="span12"  onChange=""style="width:100%;" id="store_profile_area" data-placeholder="Choose a Country...">
											@else
											<select class="span12"  onChange=""style="width:100%;" id="store_profile_area" data-placeholder="Choose a Country..."disabled>
											@endif
													<option value="" />
													<option value="AL" />Alabama
													<option value="AK" />Alaska
													<option value="AZ" />Arizona
													<option value="AR" />Arkansas
													<option value="CA" />California
													<option value="CO" />Colorado
													<option value="CT" />Connecticut
													<option value="DE" />Delaware
													<option value="FL" />Florida
													<option value="GA" />Georgia
													<option value="HI" />Hawaii
													<option value="ID" />Idaho
													<option value="IL" />Illinois
													<option value="IN" />Indiana
													<option value="IA" />Iowa
													<option value="KS" />Kansas
													<option value="KY" />Kentucky
													<option value="LA" />Louisiana
													<option value="ME" />Maine
													<option value="MD" />Maryland
													<option value="MA" />Massachusetts
													<option value="MI" />Michigan
													<option value="MN" />Minnesota
													<option value="MS" />Mississippi
													<option value="MO" />Missouri
													<option value="MT" />Montana
													<option value="NE" />Nebraska
													<option value="NV" />Nevada
													<option value="NH" />New Hampshire
													<option value="NJ" />New Jersey
													<option value="NM" />New Mexico
													<option value="NY" />New York
													<option value="NC" />North Carolina
													<option value="ND" />North Dakota
													<option value="OH" />Ohio
													<option value="OK" />Oklahoma
													<option value="OR" />Oregon
													<option value="PA" />Pennsylvania
													<option value="RI" />Rhode Island
													<option value="SC" />South Carolina
													<option value="SD" />South Dakota
													<option value="TN" />Tennessee
													<option value="TX" />Texas
													<option value="UT" />Utah
													<option value="VT" />Vermont
													<option value="VA" />Virginia
													<option value="WA" />Washington
													<option value="WV" />West Virginia
													<option value="WI" />Wisconsin
													<option value="WY" />Wyoming
												</select>
										</div>
									</div>				
								</div>
							</div>			
						</div>
						<div class="span6">
								<h4><b>STORE OWNER INFORMATION</b></h4>
								<div class="row-fluid">
									<span class="profile-picture span6">
										<input type="hidden" id="owner_image_status" class="" name="file-input" />
										<center><img id="owner_image"  src="{{URL::asset('assets/avatars/user.jpg')}}" /><center>
										<input type="file" id="owner_image_file" class="ace-file-input" name="file-input"/>
										<button id="owner_image_btncancel" onClick="cancel_upload('#owner_image_btncancel','#owner_image_file','#owner_image','{{URL::asset('assets/avatars/user.jpg')}}')" class="btn btn-small btn-danger" style="display:none">Cancel</button>
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
											<input type="text" class=" span12 input-mask-phone" id="form-field-1" placeholder="(+639)9999-99999-9" />
											@else
											<input type="text" class=" span12 input-mask-phone" id="form-field-1" placeholder="(+639)9999-99999-9" disabled />
											@endif	
										</div>
									</div>				
								</div>
								<div class="span6">
									<div class="control-group">
									<label class="control-label" for="form-field-1"><i class="icon-phone"></i> Owner Tel. Num</label>
										<div class="controls">
											@if($userLevel == 'STORE ADMIN')
											<input type="text" class=" span12 input-mask-tel" id="form-field-1" value="{{$user_info->owner_tel_num}}" placeholder="(02)-0000-000" />
											@else
											<input type="text" class=" span12 input-mask-tel" id="form-field-1" value="{{$user_info->owner_tel_num}}" placeholder="(02)-0000-000" disabled />
											@endif
										</div>				
								</div>
							</div>
							<div class="row-fluid span12" style="margin:0px;">
								<div class="span6"  >
										<label class="control-label" for="form-field-1"><i class="icon-envelope-letter"></i> Email</label>
										<div class="controls " >
											@if($userLevel == 'STORE ADMIN')
												<input type="email" class=" span12 " id="form-field-1" value="{{$user_info->owner_email}}"  />
											@else
												<input type="email" class=" span12" id="form-field-1" value="{{$user_info->owner_email}}"  disabled />	
											@endif	
										</div>
								</div>
								<div class="span6">
									<div class="control-group">
										<label class="control-label" for="form-field-1">Gender</label>
										<div class="controls">
											@if($userLevel == 'STORE ADMIN')
											<select class="span12"  onChange=""style="width:100%;" id="store_owner_gender" data-placeholder="Choose a Country...">
											@else
											<select class="span12"  onChange=""style="width:100%;" id="store_owner_gender" data-placeholder="Choose a Country..." disabled>	
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
											<select class="" style="width:100%;" id="store_owner_city" data-placeholder="Choose a Country...">
											@else
											<select class="" style="width:100%;" id="store_owner_city" data-placeholder="Choose a Country...">
											@endif
													<option value="" />
													<option value="AL" />Alabama
													<option value="AK" />Alaska
													<option value="AZ" />Arizona
													<option value="AR" />Arkansas
													<option value="CA" />California
													<option value="CO" />Colorado
													<option value="CT" />Connecticut
													<option value="DE" />Delaware
													<option value="FL" />Florida
													<option value="GA" />Georgia
													<option value="HI" />Hawaii
													<option value="ID" />Idaho
													<option value="IL" />Illinois
													<option value="IN" />Indiana
													<option value="IA" />Iowa
													<option value="KS" />Kansas
													<option value="KY" />Kentucky
													<option value="LA" />Louisiana
													<option value="ME" />Maine
													<option value="MD" />Maryland
													<option value="MA" />Massachusetts
													<option value="MI" />Michigan
													<option value="MN" />Minnesota
													<option value="MS" />Mississippi
													<option value="MO" />Missouri
													<option value="MT" />Montana
													<option value="NE" />Nebraska
													<option value="NV" />Nevada
													<option value="NH" />New Hampshire
													<option value="NJ" />New Jersey
													<option value="NM" />New Mexico
													<option value="NY" />New York
													<option value="NC" />North Carolina
													<option value="ND" />North Dakota
													<option value="OH" />Ohio
													<option value="OK" />Oklahoma
													<option value="OR" />Oregon
													<option value="PA" />Pennsylvania
													<option value="RI" />Rhode Island
													<option value="SC" />South Carolina
													<option value="SD" />South Dakota
													<option value="TN" />Tennessee
													<option value="TX" />Texas
													<option value="UT" />Utah
													<option value="VT" />Vermont
													<option value="VA" />Virginia
													<option value="WA" />Washington
													<option value="WV" />West Virginia
													<option value="WI" />Wisconsin
													<option value="WY" />Wyoming
												</select>
										</div>
								</div>
								<div class="span6">
									<div class="control-group">
										<label class="control-label" for="form-field-1">Store Area</label>
										<div class="controls">
											@if($userLevel == 'STORE ADMIN')
											<select class=""  onChange=""style="width:100%;" id="store_owner_area" data-placeholder="Choose a Country...">
											@else
											<select class=""  onChange=""style="width:100%;" id="store_owner_area" data-placeholder="Choose a Country..." disabled>	
											@endif
										
													<option value="" />
													<option value="AL" />Alabama
													<option value="AK" />Alaska
													<option value="AZ" />Arizona
													<option value="AR" />Arkansas
													<option value="CA" />California
													<option value="CO" />Colorado
													<option value="CT" />Connecticut
													<option value="DE" />Delaware
													<option value="FL" />Florida
													<option value="GA" />Georgia
													<option value="HI" />Hawaii
													<option value="ID" />Idaho
													<option value="IL" />Illinois
													<option value="IN" />Indiana
													<option value="IA" />Iowa
													<option value="KS" />Kansas
													<option value="KY" />Kentucky
													<option value="LA" />Louisiana
													<option value="ME" />Maine
													<option value="MD" />Maryland
													<option value="MA" />Massachusetts
													<option value="MI" />Michigan
													<option value="MN" />Minnesota
													<option value="MS" />Mississippi
													<option value="MO" />Missouri
													<option value="MT" />Montana
													<option value="NE" />Nebraska
													<option value="NV" />Nevada
													<option value="NH" />New Hampshire
													<option value="NJ" />New Jersey
													<option value="NM" />New Mexico
													<option value="NY" />New York
													<option value="NC" />North Carolina
													<option value="ND" />North Dakota
													<option value="OH" />Ohio
													<option value="OK" />Oklahoma
													<option value="OR" />Oregon
													<option value="PA" />Pennsylvania
													<option value="RI" />Rhode Island
													<option value="SC" />South Carolina
													<option value="SD" />South Dakota
													<option value="TN" />Tennessee
													<option value="TX" />Texas
													<option value="UT" />Utah
													<option value="VT" />Vermont
													<option value="VA" />Virginia
													<option value="WA" />Washington
													<option value="WV" />West Virginia
													<option value="WI" />Wisconsin
													<option value="WY" />Wyoming
												</select>
										</div>
									</div>				
								</div>
							</div>						
						</div>		
					</div>
				</div>	
				<div class="row-fluid">
					<div class="control-group">
						<label class="control-label center" for="form-field-1"><i class="icon-film"></i><b> ABOUT STORE</b></label>
						<div class="controls">
						@if($userLevel == 'STORE ADMIN')
						<textarea class="span12 limited" rows="10" id="form-field-9" style="resize:none;" data-maxlength="50">{{$user_info->showStoreInfo->store_about}}</textarea>
						@else
						<textarea class="span12 limited" rows="10" id="form-field-9" style="resize:none;" data-maxlength="50" disabled >{{$user_info->showStoreInfo->store_about}}</textarea>	
						@endif	
						</div>
					</div>					
				</div>
				@if($userLevel == 'STORE ADMIN')	
				<div class="row-fluid wizard-actions">
			    @else
				<div class="row-fluid wizard-actions" style="display:none">
				@endif	
					<button class="btn btn-success btn-next" data-last="Finish ">
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
document.getElementById('store_logo_status').value="Nothing_Change";
document.getElementById('owner_image_status').value="Nothing_Change";

$("#store_logo_file").change(function() {
    var val = $(this).val();
	var last_gritter;
    switch(val.substring(val.lastIndexOf('.') + 1).toLowerCase()){
        case 'gif': case 'jpg': case 'png':
				readURL(this,"#store_logo");
				document.getElementById('store_logo_status').value="New_Image";
				getDrectory("#store_logo_file","#store_logo_btncancel");
            break;
        default:
				$(this).val('');
				 $("#store_logo").attr('src',"{{URL::asset('assets/avatars/142.jpg')}}");
				// error message here
				last_gritter = $.gritter.add({
					title: 'Ooopss!! the file is not an image',
					text: 'accept only JPEG or PNG file/s!',
					class_name: 'gritter-error gritter-center'
				});
				document.getElementById('store_logo_status').value="Change_err";
            break;
    }
});
$("#owner_image_file").change(function() {
    var val = $(this).val();
	var last_gritter;
    switch(val.substring(val.lastIndexOf('.') + 1).toLowerCase()){
        case 'gif': case 'jpg': case 'png':
				readURL(this,"#owner_image");
				document.getElementById('owner_image_status').value="New_Image";
				getDrectory("#owner_image_file","#owner_image_btncancel");
            break;
        default:
				$(this).val('');
				 $("#owner_image").attr('src',"{{URL::asset('assets/avatars/142.jpg')}}");
				// error message here
				last_gritter = $.gritter.add({
					title: 'Ooopss!! the file is not an image',
					text: 'accept only JPEG or PNG file/s!',
					class_name: 'gritter-error gritter-center'
				});
				document.getElementById('owner_image_status').value="Change_err";
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
	$('.input-mask-phone').mask('(999) 9999-9999-9');

	});
function getDrectory(changefrom,changeto)
{
	 $(changeto).fadeIn("slow");
	 $(changefrom).fadeOut("slow");
}
function cancel_upload(changefrom,changeto,returnimageID,returnImageto)
{
	getDrectory(changefrom,changeto);
	 $(returnimageID).attr('src',returnImageto);
}
</script>
@endsection
