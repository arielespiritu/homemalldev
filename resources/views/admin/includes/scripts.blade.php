	<script type="text/javascript">
		window.jQuery || document.write("<script src='assets/js/jquery-2.0.3.min.js'>"+"<"+"/script>");		
		if("ontouchend" in document) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
	</script>
	<script src="{{URL::asset('assets/js/jquery.min.js')}}"></script>
	<script src="{{URL::asset('assets/js/bootstrap.min.js')}}"></script>
	<script src="{{URL::asset('assets/js/x-editable/bootstrap-editable.min.js')}}"></script>
	<script src="{{URL::asset('assets/js/x-editable/ace-editable.min.js')}}"></script>
	<script src="{{URL::asset('assets/js/ace-elements.min.js')}}"></script>
	<script src="{{URL::asset('assets/js/ace.min.js')}}"></script>
	<script src="{{URL::asset('assets/js/jquery.gritter.min.js')}}"></script>
	<script src="{{URL::asset('assets/js/jquery.maskedinput.min.js')}}"></script>
	<!--store profile -->
		<script src="{{URL::asset('assets/js/chosen.jquery.min.js')}}"></script>
	<!-- end -->
	<!--data tables -->
			<script src="{{URL::asset('assets/js/jquery.dataTables.min.js')}}"></script>
			<script src="{{URL::asset('assets/js/jquery.dataTables.bootstrap.js')}}"></script>
			<script src="{{URL::asset('assets/js/spin.min.js')}}"></script>
	<!--data tables -->
	<!-- dashboardcharts -->
		<script src="{{URL::asset('assets/js/jquery.easy-pie-chart.min.js')}}"></script>
		<script src="{{URL::asset('assets/js/ace-elements.min.js')}}"></script>
		<script src="{{URL::asset('assets/js/jquery.sparkline.min.js')}}"></script>
		<script src="{{URL::asset('assets/js/Chart.js')}}"></script>
		<script src="{{URL::asset('assets/js/flot/jquery.flot.min.js')}}"></script>
		<script src="{{URL::asset('assets/js/flot/jquery.flot.pie.min.js')}}"></script>
		<script src="{{URL::asset('assets/js/flot/jquery.flot.resize.min.js')}}"></script>
	<!-- tags -->
		<script src="{{URL::asset('assets/js/bootstrap-tag.min.js')}}"></script>	
		<script src="{{URL::asset('assets/js/Scroller.js')}}"></script>	
<script>
	$.ajaxSetup({
		headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
	});	
</script>
	
	