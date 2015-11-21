@extends('client.master.master')

@section('title', 'Member Login')

@section('content')

 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
		<div class="container">	
			<div class="col-md-12" style="padding:0px; ">
				<div class="row">
					<div class="col-md-12 " >
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
								<div class="form-group col-md-12">
									<input type="text" class="form-control input-md" placeholder="Email" name="email">
								</div>
								<div class="form-group col-md-12">
									<input type="password" class="form-control input-md" placeholder="Password" name="password">
								</div>
								<div class="form-group col-md-12">
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
								<div class="form-group col-md-6 col-md-12">
									<input type="text" class="form-control input-md" placeholder="First Name" name="firstname" value="">
								</div>
								<div class="form-group col-md-6 col-md-12">
									<input type="text" class="form-control input-md" placeholder="Last Name" name="lastname" value="">
								</div>
								<div class="form-group col-md-6 col-md-12">
									Birthday<input class="form-control" id="date" type="date" placeholder="Birthday" max="2030-01-01" min="2015-01-01" name="birthday" />
								</div>
								<div class="form-group col-md-6 col-md-12">
									Gender<select class="form-control" id="gender" name="gender">
										<option>Male</option>
										<option>Female</option>
									 </select>
								</div>
								<div class="form-group col-md-12 col-md-12">
									<div class="input-group">
									  <span class="input-group-addon" id="sizing-addon2">+63</span>
									  <input type="text" class="form-control input-md" placeholder="Mobile" aria-describedby="sizing-addon2" id="mobile" value="" name="mobile">
									</div>
								</div>
								<div class="form-group col-md-12">
									<input type="text" class="form-control input-md" placeholder="Email" name="email" value="">
								</div>
								<div class="form-group col-md-12">
									<input type="password" class="form-control input-md" placeholder="Password" name="password">
								</div>
								<div class="form-group col-md-12">
									<input type="password" class="form-control input-md" placeholder="Confirm Password" name="password_confirmation">
								</div>
								
								<div class="form-group col-md-12">
								<p>By clicking Sign Up, you agree to our <a href="">Terms</a> and <a href="">Conditions</a>.</p>
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
	<script src="{{URL::asset('assets/js/jquery.maskedinput.min.js')}}"></script>
	<script type="text/javascript">
		$('#mobile').mask('999999999');
	</script>
	
	
	
@endsection