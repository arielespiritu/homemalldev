@extends('client.master.master')

@section('title', 'Member Login')

@section('content')

 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
		<div class="container">	
			<div class="col-md-12" >
				<div class="row">
					<div class="col-md-12 ">
						@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
						@endif
					</div>
					<div class="col-md-5 col-md-12 ">
						<div class="col-md-12 " style="background:#fff; padding:15px; margin-bottom:20px;">
							<form  role="form" method="POST" action="/auth/login" >
								<input type="hidden" name="_token" value="{{ csrf_token() }}"> 
								<h4 class="blue">Member Login</h4>
								</br>
								<div class="form-group">
									<input type="text" class="form-control input-md" placeholder="Email" name="email">
								</div>
								<div class="form-group">
									<input type="password" class="form-control input-md" placeholder="Password" name="password">
								</div>
								<div class="form-group">
									<button type="submit" class="btn btn-default btn-md btn-block">Sign In</button>
									</br>
									<span><a href="#">Forgot Password?</a></span>
								</div>
							</form>
						</div>	
					</div>	
					
					<div class="col-md-7 col-md-12" >
						<div class="col-md-12" style="background:#fff; padding:15px">					
							<form method="POST" action="/auth/register">
							{!! csrf_field() !!}
								<h4 class="blue">New Member Registration</h4>
								</br>
								<div class="form-group">
									<input type="text" class="form-control input-md" placeholder="Email" name="email" value="{{ old('email') }}">
								</div>
								<div class="form-group">
									<input type="password" class="form-control input-md" placeholder="Password" name="password">
								</div>
								<div class="form-group">
									<input type="password" class="form-control input-md" placeholder="Confirm Password" name="password_confirmation">
								</div>
								<div class="form-group">
									<button type="submit" class="btn btn-default btn-md btn-block">Sign Up</button>
									</br>
								</div>
							</form>
						</div>	
					</div>	
				</div>
			</div>	
		</div>		
			


			
			</br>
			</br>
			</br>
   
						
@endsection


@section('page-script')
	

	<script type="text/javascript">
	
		function viewAnnouncement(id,date){
			var announcement_id = id;
			var announcement_date = date;
			$.post("/getAnnouncement", {announcement_id: announcement_id}, function(result){	
				var obj = JSON.parse(result);
				$("#announcement_preview").show();
				document.getElementById("announce_title").innerHTML = obj[0].title.replace(/\n/g, "<br />");;
				document.getElementById("announce_desc").innerHTML = obj[0].description.replace(/\n/g, "<br />");;
				document.getElementById("announce_date").innerHTML = "&nbsp;&nbsp;"+announcement_date;
				$('html, body').animate({ scrollTop: 0 }, 'fast');
			});
		}
		
		$(function() {
				var oTable1 = $('#sample-table-2').dataTable( {
				"aoColumns": [
			      { "bSortable": false },
			      null, null, null,
				  { "bSortable": false }
				] } );
				

			})
	</script>
	
	
	
@endsection