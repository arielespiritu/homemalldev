@extends('admin.includes.master.master')
@section('main_header_title', 'Users')
@endsection
@section('sub_header_title', 'Store Users ')
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
			<li class="active">Store Users</li>
		</ul><!--.breadcrumb-->
	</div>
@endsection
@section('content')
<div class="row-fluid">
	<div class="span5">
	<center>
		<span class="profile-picture">
			<img id="avatar" class="editable" alt="Alex's Avatar" src="{{URL::asset('assets/avatars/user.jpg')}}" />
		</span>
	</center>
<div class="row-fluid">	
<center>
		<div class="width-80 label label-info label-large arrowed-in arrowed-in-right">
			<div class="inline position-relative">

				<a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
					<p id="user_status" style="display:none" >light-green</p>
					<i id="user_curr_status" class="icon-circle light-green middle"></i>
					&nbsp;
						<span class="white middle bigger-120">Alex M. Doe</span>	
				</a>

				<ul class="align-left dropdown-menu dropdown-caret dropdown-lighter">
					<li class="nav-header"> Change Status </li>
					<li>
						<a href="javascript:;" onClick="change_user_Status('user_status','light-green')">
							<i class="icon-circle light-green"></i>
							&nbsp;
							<span class="light-green">Available</span>
						</a>
					</li>
					<li>
						<a href="javascript:;" onClick="change_user_Status('user_status','red')">
							<i class="icon-circle red"></i>
							&nbsp;
							<span class="red">Busy</span>
						</a>
					</li>
					<li>
						<a href="javascript:;" onClick="change_user_Status('user_status','grey')">
							<i class="icon-circle grey"></i>
							&nbsp;
							<span class="grey">Invisible</span>
						</a>
					</li>
				</ul>
			</div>
		</div>
</div>
	<br>
	</div>
	<div class="span7">
		<div class="profile-user-info profile-user-info-striped">
			<div class="profile-info-row">
				<div class="profile-info-name"> Username </div>
				<div class="profile-info-value">
					<span class="editable" id="user_username">marlon</span>
				</div>
			</div>

			<div class="profile-info-row">
				<div class="profile-info-name"> Main </div>
				<div class="profile-info-value">
					<p id="user_main">Quezon City</p>
				</div>
			</div>
			<div class="profile-info-row">
				<div class="profile-info-name"> Branch </div>
				<div class="profile-info-value">
					<p id="user_branch">Novaliches</p>
				</div>
			</div>			
			<div class="profile-info-row">
				<div class="profile-info-name"> Location </div>
				<div class="profile-info-value">
					<i class="icon-map-marker light-orange bigger-110"></i>
					<span class="editable" id="country">Quezon City</span>
					<span class="editable" id="city">Novaliches</span>
				</div>
			</div>			
			<div class="profile-info-row">
				<div class="profile-info-name"> Store name </div>
				<div class="profile-info-value">
					<span class="editable" id="user_store_name">MAPALAD Store</span>
				</div>
			</div>
			<div class="profile-info-row">
				<div class="profile-info-name"> Store Owner </div>
				<div class="profile-info-value">
					<span class="editable" id="user_store_owner">Juanito Mapalad</span>
				</div>
			</div>

			<div class="profile-info-row">
				<div class="profile-info-name"> User type </div>
				<div class="profile-info-value">
					<p id="user_type">STORE BRANCH USER</p>
				</div>
			</div>
		</div>	
	</div>
</div>
<div class="hr hr32 hr-dotted"></div>
<div class="row-fluid">
	<div class="span12 widget-container-span">
		<div class="widget-box">
			<div class="widget-header header-color-default">
				<h5 class="bigger lighter blue">
					<i class="icon-table"></i>
					Tables & Colors
				</h5>
			</div>

			<div class="widget-body">
				<div class="widget-main no-padding">
					<table class="table table-striped table-bordered table-hover">
						<thead>
							<tr>
								<th>
									<i class="icon-user"></i>
									User
								</th>

								<th>
									<i>@</i>
									Email
								</th>
								<th class="hidden-480">Status</th>
							</tr>
						</thead>

						<tbody>
							<tr>
								<td class="">Alex</td>

								<td>
									<a href="#">alex@email.com</a>
								</td>

								<td class="hidden-480">
									<span class="label label-warning">Pending</span>
								</td>
							</tr>

							<tr>
								<td class="">Fred</td>

								<td>
									<a href="#">fred@email.com</a>
								</td>

								<td class="hidden-480">
									<span class="label label-success arrowed-in arrowed-in-right">Approved</span>
								</td>
							</tr>

							<tr>
								<td class="">Jack</td>

								<td>
									<a href="#">jack@email.com</a>
								</td>

								<td class="hidden-480">
									<span class="label label-warning">Pending</span>
								</td>
							</tr>

							<tr>
								<td class="">John</td>

								<td>
									<a href="#">john@email.com</a>
								</td>

								<td class="hidden-480">
									<span class="label label-inverse arrowed">Blocked</span>
								</td>
							</tr>

							<tr>
								<td class="">James</td>

								<td>
									<a href="#">james@email.com</a>
								</td>

								<td class="hidden-480">
									<span class="label label-info arrowed-in arrowed-in-right">Online</span>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div><!--/span-->
</div><!--/row-->

@endsection
@section('myscripts')
<script>


	function change_user_Status(id,changeto)
	{

		var getcurrStat= document.getElementById(id).innerHTML;
		$("#user_curr_status").removeClass(""+getcurrStat);
		$("#user_curr_status").addClass(changeto);
		document.getElementById(id).innerHTML=changeto;
		
	}
	$(function() {
		var oTable1 = $('#sample-table-2').dataTable( {
		"aoColumns": [
		  { "bSortable": false },
		  null, null,null, null, null,
		  { "bSortable": false }
		] } );
		
		
		$('table th input:checkbox').on('click' , function(){
			var that = this;
			$(this).closest('table').find('tr > td:first-child input:checkbox')
			.each(function(){
				this.checked = that.checked;
				$(this).closest('tr').toggleClass('selected');
			});
				
		});
	
	
		$('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
		function tooltip_placement(context, source) {
			var $source = $(source);
			var $parent = $source.closest('table')
			var off1 = $parent.offset();
			var w1 = $parent.width();
	
			var off2 = $source.offset();
			var w2 = $source.width();
	
			if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
			return 'left';
		}
	})

</script>
@endsection
