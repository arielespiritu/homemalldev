<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>HM-ADMIN</title>
	<meta name="description" content="overview &amp; stats" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />		
		
		@include('admin.includes.stylesheets')
		
	</head>
	<body>
@foreach($userinfo as $user_info)
@endforeach


		<div class="navbar">
			<div class="navbar-inner">
				<div class="container-fluid">
					<a href="/HMadmin" class="brand">
						<small>
							<i class="icon-home"></i>
							<strong>HM ADMIN</strong>
						</small>
					</a><!--/.brand-->
					<ul class="nav ace-nav pull-right">
						<li class="grey">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="icon-tasks"></i>
								<span class="badge badge-grey">4</span>
							</a>
							<ul class="pull-right dropdown-navbar dropdown-menu dropdown-caret dropdown-closer">
								<li class="nav-header">
									<i class="icon-ok"></i>
									4 Tasks to complete
								</li>
								<li>
									<a href="#">
										<div class="clearfix">
											<span class="pull-left">Software Update</span>
											<span class="pull-right">65%</span>
										</div>

										<div class="progress progress-mini ">
											<div style="width:65%" class="bar"></div>
										</div>
									</a>
								</li>
								<li>
									<a href="#">
										<div class="clearfix">
											<span class="pull-left">Hardware Upgrade</span>
											<span class="pull-right">35%</span>
										</div>

										<div class="progress progress-mini progress-danger">
											<div style="width:35%" class="bar"></div>
										</div>
									</a>
								</li>

								<li>
									<a href="#">
										<div class="clearfix">
											<span class="pull-left">Unit Testing</span>
											<span class="pull-right">15%</span>
										</div>

										<div class="progress progress-mini progress-warning">
											<div style="width:15%" class="bar"></div>
										</div>
									</a>
								</li>

								<li>
									<a href="#">
										<div class="clearfix">
											<span class="pull-left">Bug Fixes</span>
											<span class="pull-right">90%</span>
										</div>

										<div class="progress progress-mini progress-success progress-striped active">
											<div style="width:90%" class="bar"></div>
										</div>
									</a>
								</li>

								<li>
									<a href="#">
										See tasks with details
										<i class="icon-arrow-right"></i>
									</a>
								</li>
							</ul>
						</li>

						<li class="purple">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="icon-bell-alt icon-animated-bell"></i>
								<span class="badge badge-important">8</span>
							</a>

							<ul class="pull-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-closer">
								<li class="nav-header">
									<i class="icon-warning-sign"></i>
									8 Notifications
								</li>
								<li>
									<a href="#">
										<div class="clearfix">
											<span class="pull-left">
												<i class="btn btn-mini no-hover btn-pink icon-comment"></i>
												New Comments
											</span>
											<span class="pull-right badge badge-info">+12</span>
										</div>
									</a>
								</li>

								<li>
									<a href="#">
										<i class="btn btn-mini btn-primary icon-user"></i>
										Bob just signed up as an editor ...
									</a>
								</li>
								<li>
									<a href="#">
										<div class="clearfix">
											<span class="pull-left">
												<i class="btn btn-mini no-hover btn-success icon-shopping-cart"></i>
												New Orders
											</span>
											<span class="pull-right badge badge-success">+8</span>
										</div>
									</a>
								</li>
								<li>
									<a href="#">
										<div class="clearfix">
											<span class="pull-left">
												<i class="btn btn-mini no-hover btn-info icon-twitter"></i>
												Followers
											</span>
											<span class="pull-right badge badge-info">+11</span>
										</div>
									</a>
								</li>

								<li>
									<a href="#">
										See all notifications
										<i class="icon-arrow-right"></i>
									</a>
								</li>
							</ul>
						</li>
						<li class="green">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="icon-envelope icon-animated-vertical"></i>
								<span class="badge badge-success">5</span>
							</a>

							<ul class="pull-right dropdown-navbar dropdown-menu dropdown-caret dropdown-closer">
								<li class="nav-header">
									<i class="icon-envelope-alt"></i>
									5 Messages
								</li>

								<li>
									<a href="#">
										<img src="assets/avatars/avatar.png" class="msg-photo" alt="Alex's Avatar" />
										<span class="msg-body">
											<span class="msg-title">
												<span class="blue">Alex:</span>
												Ciao sociis natoque penatibus et auctor ...
											</span>

											<span class="msg-time">
												<i class="icon-time"></i>
												<span>a moment ago</span>
											</span>
										</span>
									</a>
								</li>
								<li>
									<a href="#">
										<img src="assets/avatars/avatar3.png" class="msg-photo" alt="Susan's Avatar" />
										<span class="msg-body">
											<span class="msg-title">
												<span class="blue">Susan:</span>
												Vestibulum id ligula porta felis euismod ...
											</span>

											<span class="msg-time">
												<i class="icon-time"></i>
												<span>20 minutes ago</span>
											</span>
										</span>
									</a>
								</li>
								<li>
									<a href="#">
										<img src="assets/avatars/avatar4.png" class="msg-photo" alt="Bob's Avatar" />
										<span class="msg-body">
											<span class="msg-title">
												<span class="blue">Bob:</span>
												Nullam quis risus eget urna mollis ornare ...
											</span>

											<span class="msg-time">
												<i class="icon-time"></i>
												<span>3:15 pm</span>
											</span>
										</span>
									</a>
								</li>

								<li>
									<a href="#">
										See all messages
										<i class="icon-arrow-right"></i>
									</a>
								</li>
							</ul>
						</li>
						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								@if(File::exists('assets/img/store/'.$user_info->showStoreInfo->store_name.'/ownerimage/'.$user_info->showStoreInfo->id.'.jpg'))
									<img class="nav-user-photo" id="owner_image"  src="{{URL::asset('assets/img/store/'.$user_info->showStoreInfo->store_name.'/ownerimage/'.$user_info->showStoreInfo->id.'.jpg')}}" />
								@elseif(File::exists('assets/img/store/'.$user_info->showStoreInfo->store_name.'/ownerimage/'.$user_info->showStoreInfo->id.'.jpeg'))
									<img class="nav-user-photo" id="owner_image"  src="{{URL::asset('assets/img/store/'.$user_info->showStoreInfo->store_name.'/ownerimage/'.$user_info->showStoreInfo->id.'.jpeg')}}" />
								@elseif(File::exists('assets/img/store/'.$user_info->showStoreInfo->store_name.'/ownerimage/'.$user_info->showStoreInfo->id.'.png'))
									<img  class="nav-user-photo" id="owner_image"  src="{{URL::asset('assets/img/store/'.$user_info->showStoreInfo->store_name.'/ownerimage/'.$user_info->showStoreInfo->id.'.png')}}" />
								@else
									
								@endif							
								<span class="user-info">
									<small>Welcome,</small>
									Jason
								</span>
								<i class="icon-caret-down"></i>
							</a>
							<ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-closer">
								<li>
									<a href="#">
										<i class="icon-cog"></i>
										Settings
									</a>
								</li>
								<li>
									<a href="#">
										<i class="icon-user"></i>
										Profile
									</a>
								</li>
								<li class="divider"></li>
								<li>
									<a href="javascript:;" onclick="logout()">
										<i class="icon-off"></i>
										Logout
									</a>
								</li>
							</ul>
						</li>
					</ul><!--/.ace-nav-->
				</div><!--/.container-fluid-->
			</div><!--/.navbar-inner-->
		</div>
		<div class="main-container container-fluid">
			<a class="menu-toggler" id="menu-toggler" href="#">
				<span class="menu-text"></span>
			</a>
			<div class="sidebar" id="sidebar">
				<ul class="nav nav-list">
					<li class="active">
						<a href="/HMadmin">
							<i class=" icon-bar-chart"></i>
							<span class="menu-text"> Dashboard  </span>
						</a>
					</li>
					<li>
						<a href="#" class="dropdown-toggle">
							<i class="icon-home"></i>
							<span class="menu-text"> My Store </span>

							<b class="arrow icon-angle-down"></b>
						</a>

						<ul class="submenu">
							<li>
								<a href="/HMadmin/Store-Profile">
									<i class="icon-double-angle-right"></i>
									Store Profile
								</a>
							</li>
							<li>
								<a href="/HMadmin/Store-Users">
									<i class="icon-double-angle-right"></i>
									Store Users
								</a>
							</li>
							<li>
								<a href="/HMadmin/Store-Banner">
									<i class="icon-double-angle-right"></i>
									Store Banner
								</a>
							</li>							
						</ul>
					</li>
					<li>
						<a href="#" class="dropdown-toggle">
							<i class="icon-handbag"></i>
							<span class="menu-text"> My Products </span>

							<b class="arrow icon-angle-down"></b>
						</a>

						<ul class="submenu">
							<li>
								<a href="/HMadmin/Products">
									<i class="icon-double-angle-right"></i>
									Products Information
								</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="#" class="dropdown-toggle">
							<i class="icon-notebook"></i>
							<span class="menu-text"> Inventory </span>

							<b class="arrow icon-angle-down"></b>
						</a>

						<ul class="submenu">
							<li>
								<a href="form-elements.html">
									<i class="icon-double-angle-right"></i>
									Products Information
								</a>
							</li>
							<li>
								<a href="form-wizard.html">
									<i class="icon-double-angle-right"></i>
									Wizard &amp; Validation
								</a>
							</li>
							<li>
								<a href="wysiwyg.html">
									<i class="icon-double-angle-right"></i>
									Wysiwyg &amp; Markdown
								</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="#" class="dropdown-toggle">
							<i class="icon-book-open"></i>
							<span class="menu-text"> Orders </span>

							<b class="arrow icon-angle-down"></b>
						</a>

						<ul class="submenu">
							<li>
								<a href="form-elements.html">
									<i class="icon-double-angle-right"></i>
									Form Elements
								</a>
							</li>
							<li>
								<a href="form-wizard.html">
									<i class="icon-double-angle-right"></i>
									Wizard &amp; Validation
								</a>
							</li>
							<li>
								<a href="wysiwyg.html">
									<i class="icon-double-angle-right"></i>
									Wysiwyg &amp; Markdown
								</a>
							</li>
						</ul>
					</li>					
				</ul><!--/.nav-list-->
				<div class="sidebar-collapse" id="sidebar-collapse">
					<i class="icon-double-angle-left"></i>
				</div>
			</div>
			<div class="main-content">
				@yield('breadcrumbs')
				<div class="page-content">
					<div class="page-header position-relative">
						<h1>
							@yield('main_header_title')
							<small>
								<i class="icon-double-angle-right"></i>
							@yield('sub_header_title')
							</small>
						</h1>
					</div><!--/.page-header-->
					@yield('content')
				</div><!--/.page-content-->
			</div><!--/.main-content-->
		</div><!--/.main-container-->
				<div class="ace-settings-container" id="ace-settings-container">
					<div class="btn btn-app btn-mini btn-warning ace-settings-btn" id="ace-settings-btn">
						<i class="icon-cog bigger-150"></i>
					</div>

					<div class="ace-settings-box" id="ace-settings-box">
						<div>
							<div class="pull-left">
								<select id="skin-colorpicker" class="hide">
									<option data-class="default" value="#438EB9" />#438EB9
									<option data-class="skin-1" value="#222A2D" />#222A2D
									<option data-class="skin-2" value="#C6487E" />#C6487E
									<option data-class="skin-3" value="#D0D0D0" />#D0D0D0
								</select>
							</div>
							<span>&nbsp; Choose Skin</span>
						</div>

						<div>
							<input type="checkbox" class="ace-checkbox-2" id="ace-settings-header" />
							<label class="lbl" for="ace-settings-header"> Fixed Header</label>
						</div>

						<div>
							<input type="checkbox" class="ace-checkbox-2" id="ace-settings-sidebar" />
							<label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
						</div>

						<div>
							<input type="checkbox" class="ace-checkbox-2" id="ace-settings-breadcrumbs" />
							<label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
						</div>

						<div>
							<input type="checkbox" class="ace-checkbox-2" id="ace-settings-rtl" />
							<label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
						</div>
					</div>
				</div><!--/#ace-settings-container-->
		
		<a href="#" id="btn-scroll-up" style="position:fixed" class="btn-scroll-up btn btn-small btn-inverse">
			<i class="icon-double-angle-up icon-only bigger-110"></i>
		</a>
		
		@include('admin.includes.scripts')
		
		@yield('myscripts')

	</body>
	<script>
function logout()
{	
	$.get("/HMadmin/logout",
	function(result)
	{
		window.location.reload();
	});
}
</script>
</html>
