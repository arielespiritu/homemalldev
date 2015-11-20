<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Login Page- HMadmin</title>
	<meta name="description" content="HM Merchant Login Page" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
@include('admin.includes.stylesheets')
</head>
<body class="login-layout">
<br>
<br>
	<div class="main-container container-fluid ">
		<div class="main-content">
			<div class="row-fluid">
					<div class="login-container ">
						<div class="row-fluid">
							<div class="center">
								<h1>
									<i class="icon-home white"></i>
									<span class="red">HM</span>
									<span class="white">Admin</span>
								</h1>
								<h4 class="blue">&#64; <a href="http://www.homemallph.com" target="_blank" style="color:white">www.HomemallPH.com</a></h4>
							</div>
						</div>
						<div class="space-6"></div>
						<div class="row-fluid">
							<div class="position-relative">
								<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body">
<div id="login_result" class="alert" style="display:none;">
	<button type="button" class="close" onClick="$('#login_result').fadeOut('slow');">
		<i class="icon-remove"></i>
	</button>
		<p id="login_result_body"></p>
	<br/>
</div>									
										<div class="widget-main">
											<h4 class="header blue lighter bigger">
												<i class="icon-home red"></i>
												Please Enter Your Information
											</h4>
											<div class="space-6"></div>
												<fieldset>
													<label>
														<span class="block input-icon input-icon-right">
															<input type="text" id="login_username" class="span12" placeholder="Username" />
															<i class="icon-user"></i>
														</span>
													</label>
													<label>
														<span class="block input-icon input-icon-right">
															<input type="password" id="login_password" class="span12" placeholder="Password" />
															<i class="icon-lock"></i>
														</span>
													</label>
													<div class="space"></div>
													<div class="clearfix">
														<label class="inline">
															<input type="checkbox" />
															<span class="lbl"> Remember Me</span>
														</label>
														<button onclick="loginAuth()" class="width-35 pull-right btn btn-small btn-primary">
															<i class="icon-key"></i>
															<i class="fa fa-spinner fa-spin"></i>
															Login
														</button>
													</div>
													<div class="space-4"></div>
												</fieldset>
										</div><!--/widget-main-->
									</div><!--/widget-body-->
								</div><!--/login-box-->
							</div><!--/position-relative-->
						</div>
					</div>
			</div><!--/.row-fluid-->
		</div>
	</div><!--/.main-container-->
</body>
@include('admin.includes.scripts')
<script>
function alert_message(alerttype,headertext,content)
{
	$("#login_result").hide();
	$("#login_result").removeClass();
	$("#login_result").addClass("alert");	
	$("#login_result").addClass(alerttype);
	document.getElementById('login_result_body').innerHTML="<strong"+headertext+"</strong> "+content;
	$("#login_result").fadeIn("slow");
	//clearInterval(intervalExiting("#login_result",5600));
	//intervalExiting("#login_result",5600);
}
function intervalExiting(id,interval)
{
	var interval=setInterval(function() {
		
		$(id).fadeOut();
	}, interval);
}
function loginAuth()
{	
	var login_username=document.getElementById('login_username').value;
	var login_password=document.getElementById('login_password').value;
	var tkn ="{!! csrf_token() !!}";
	$.post("/HMadmin/loginauth",
	{
		tempname:login_username,
		temppass:login_password,
	},
	function(result)
	{
		var resultarray= JSON.parse(result);
		if(resultarray[0].success[0]==1)
		{
			if(resultarray[0].session==tkn)
			{
				window.location.reload();
			}
			else
			{
				alert_message("alert-error","Opps!! ","Something Wrong Please Reload the page");
			}
		}
		else
		{
			
			
			var messageResult="";
			for(i=0; i<resultarray[0].data.length; i++)
			{
				messageResult=messageResult+"<br>"+resultarray[0].data[i];
				//alert(messageResult);
			}
			alert_message("alert-error","Opps!! ",messageResult);			
		}
	});	
}
</script>
</html>
