@extends('admin.includes.master.master')
@section('main_header_title', 'Dashboard')
@endsection
@section('sub_header_title', 'overview & stats')
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
			<li class="active">Dashboard</li>
		</ul><!--.breadcrumb-->
	</div>
@endsection
@section('content')
<div class="row-fluid">
	<div class="span12 center">
		<div class="infobox infobox-green infobox-medium infobox-dark">
				<div class="infobox-progress">
					<div class="easy-pie-chart percentage" data-percent="61" data-size="39">
						<span class="percent">61</span>
						%
					</div>
				</div>

				<div class="infobox-data">
					<div class="infobox-content">Monthly</div>
					<div class="infobox-content">Visitors</div>
				</div>
		</div>
		<div class="infobox infobox-blue infobox-medium infobox-dark">
			<div class="infobox-chart">
				<span class="sparkline" data-values="3,4,2,3,4,4,2,2"></span>
			</div>

			<div class="infobox-data">
				<div class="infobox-content">Sales ( Daily )</div>
				<div class="infobox-content">$32,000</div>
			</div>
		</div>
		<div class="infobox infobox-orange infobox-medium infobox-dark">
			<div class="infobox-icon">
				<i class="icon-basket"></i>
			</div>
			<div class="infobox-data">
				<div class="infobox-content">New Orders</div>
				<div class="infobox-content">1,205</div>
			</div>
		</div>	
		<div class="infobox infobox-red infobox-medium infobox-dark">
			<div class="infobox-icon">
				<i class=" icon-tag"></i>
			</div>
			<div class="infobox-data">
				<div class="infobox-content">Critical Products</div>
				<div class="infobox-content">1,205</div>
			</div>
		</div>			
		<div class="infobox infobox-grey infobox-medium infobox-dark">
			<div class="infobox-icon">
				<i class="icon-users"></i>
			</div>
			<div class="infobox-data">
				<div class="infobox-content">Visitors</div>
				<div class="infobox-content">1,205</div>
			</div>
		</div>	
	</div>
</div>
<div class="hr hr32 hr-dotted"></div>

  <div class="row-fluid">
	<!-- interactive chart -->
	<div class="widget-container-span">
		<div class="widget-box light-border">
			<div class="widget-header header-color-dark">
				<h5 class="smaller">Visitors TODAY</h5>

				<div class="widget-toolbar">
				 Real time
					 <div class="btn-group" id="realtime" data-toggle="btn-toggle">
						  <button type="button" class="btn btn-info btn-mini active" data-toggle="on">On</button>
						  <button type="button" class="btn btn-info btn-mini" data-toggle="off">Off</button>
					 </div>
				</div>
			</div>

			<div class="widget-body">
				<div class="widget-main">
					  <div id="interactive" style="height: 300px;"></div>
				</div>
			</div>
		</div>
	</div>
	  <!-- end interactive chart -->
  </div>
<div class="row-fluid">
	<div class="span6">
		<div class="widget-container-span">
			<div class="widget-box light-border">
				<div class="widget-header header-color-dark">
					<h5 class="smaller">Popular Views</h5>

					<div class="widget-toolbar">
					<!-- toolbar here pull-right -->
					</div>
				</div>

				<div class="widget-body">
					<div class="widget-main">
						  <div id="donut-chart" style="height: 287px;"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="span6">
		<div class="widget-container-span">
			<div class="widget-box light-border">
				<div class="widget-header header-color-dark">
					<h5 class="smaller">Yearly Sales</h5>

					<div class="widget-toolbar">
					<!-- toolbar here pull-right -->
					</div>
				</div>

				<div class="widget-body">
					<div class="widget-main" style="margin-right: 20px;">
					<br>
						 <canvas id="barChart"></canvas>
					</div>
				</div>
			</div>
		</div>		  
	</div>
</div>
@endsection
@section('myscripts')
<script>
	$('.easy-pie-chart.percentage').each(function(){
		var $box = $(this).closest('.infobox');
		var barColor = $(this).data('color') || (!$box.hasClass('infobox-dark') ? $box.css('color') : 'rgba(255,255,255,0.95)');
		var trackColor = barColor == 'rgba(255,255,255,0.95)' ? 'rgba(255,255,255,0.25)' : '#E2E2E2';
		var size = parseInt($(this).data('size')) || 50;
		$(this).easyPieChart({
			barColor: barColor,
			trackColor: trackColor,
			scaleColor: false,
			lineCap: 'butt',
			lineWidth: parseInt(size/10),
			animate: /msie\s*(8|7|6)/.test(navigator.userAgent.toLowerCase()) ? false : 1000,
			size: size
		});
	});
	$('.sparkline').each(function(){
		var $box = $(this).closest('.infobox');
		var barColor = !$box.hasClass('infobox-dark') ? $box.css('color') : '#FFF';
		$(this).sparkline('html', {tagValuesAttribute:'data-values', type: 'bar', barColor: barColor , chartRangeMin:$(this).data('min') || 0} );
	});
/*
///
///
/ DONUT CHART			
///
///
*/  
      var donutData = [
          {label: "Series2", data: 30, color: "#3c8dbc"},
          {label: "Series3", data: 20, color: "#0073b7"},
          {label: "Series4", data: 50, color: "#00c0ef"}
        ];
        $.plot("#donut-chart", donutData, {
          series: {
            pie: {
              show: true,
              radius: 1,
              innerRadius: 0.5,
              label: {
                show: true,
                radius: 2 / 3,
                formatter: labelFormatter,
                threshold: 0.1
              }

            }
          },
          legend: {
            show: false
          }
        });	
      function labelFormatter(label, series) {
        return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">'
                + label
                + "<br>"
                + Math.round(series.percent) + "%</div>";
      }	
/*
///
///
/END  DONUT CHART			
///
///
*/
/*
///
///
/ INTERACTIVE CHART			
///
///
*/	

        var data = [], totalPoints = 100;
        function getRandomData() {

          if (data.length > 0)
            data = data.slice(1);

          // Do a random walk
          while (data.length < totalPoints) {

            var prev = data.length > 0 ? data[data.length - 1] : 50,
                    y = prev + Math.random() * 10 - 5;

            if (y < 0) {
              y = 0;
            } else if (y > 100) {
              y = 100;
            }

            data.push(y);
          }

          // Zip the generated y values with the x values
          var res = [];
          for (var i = 0; i < data.length; ++i) {
            res.push([i, data[i]]);
          }

          return res;
        }

        var interactive_plot = $.plot("#interactive", [getRandomData()], {
          grid: {
            borderColor: "#f3f3f3",
            borderWidth: 1,
            tickColor: "#f3f3f3"
          },
          series: {
            shadowSize: 0, // Drawing is faster without shadows
            color: "#3c8dbc"
          },
          lines: {
            fill: true, //Converts the line chart to area chart
            color: "#3c8dbc"
          },
          yaxis: {
            min: 0,
            max: 100,
            show: true
          },
          xaxis: {
            show: true
          }
        });

        var updateInterval = 500; //Fetch data ever x milliseconds
        var realtime = "on"; //If == to on then fetch data every x seconds. else stop fetching
        function update() {

          interactive_plot.setData([getRandomData()]);

          // Since the axes don't change, we don't need to call plot.setupGrid()
          interactive_plot.draw();
          if (realtime === "on")
            setTimeout(update, updateInterval);
        }

        //INITIALIZE REALTIME DATA FETCHING
        if (realtime === "on") {
          update();
        }
        //REALTIME TOGGLE
        $("#realtime .btn").click(function () {
          if ($(this).data("toggle") === "on") {
            realtime = "on";
          }
          else {
            realtime = "off";
          }
          update();
        });	
/*
///
///
/ END INTERACTIVE CHART			
///
///
*/ 
/*
///
///
/  Bar CHART			
///
///
*/
        var areaChartData = {
          labels: ["January", "February", "March", "April", "May", "June", "July"],
          datasets: [
            {
             // label: "Electronics",
              fillColor: "rgba(210, 214, 222, 1)",
              //strokeColor: "rgba(210, 214, 222, 1)",
              //pointColor: "rgba(210, 214, 222, 1)",
              //pointStrokeColor: "#c1c7d1",
              //pointHighlightFill: "#fff",
              //pointHighlightStroke: "rgba(220,220,220,1)",
              data: [1, 59, 80, 81, 56, 55, 40]
            },
            {
              // label: "Electronics",
              // fillColor: "rgba(210, 214, 222, 1)",
              // strokeColor: "rgba(210, 214, 222, 1)",
              // pointColor: "rgba(210, 214, 222, 1)",
              // pointStrokeColor: "#c1c7d1",
              // pointHighlightFill: "#fff",
              // pointHighlightStroke: "rgba(220,220,220,1)",
              data: [28, 48, 40, 19, 86, 27, 90]
            }
          ]
        };
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        var barChartCanvas = $("#barChart").get(0).getContext("2d");
        var barChart = new Chart(barChartCanvas);
        var barChartData = areaChartData;
        barChartData.datasets[1].fillColor = "#00a65a";
        barChartData.datasets[1].strokeColor = "#00a65a";
        barChartData.datasets[1].pointColor = "#00a65a";
        var barChartOptions = {
          //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
          scaleBeginAtZero: true,
          //Boolean - Whether grid lines are shown across the chart
          scaleShowGridLines: true,
          //String - Colour of the grid lines
          scaleGridLineColor: "rgba(0,0,0,.05)",
          //Number - Width of the grid lines
          scaleGridLineWidth: 1,
          //Boolean - Whether to show horizontal lines (except X axis)
          scaleShowHorizontalLines: true,
          //Boolean - Whether to show vertical lines (except Y axis)
          scaleShowVerticalLines: true,
          //Boolean - If there is a stroke on each bar
          barShowStroke: true,
          //Number - Pixel width of the bar stroke
          barStrokeWidth: 2,
          //Number - Spacing between each of the X value sets
          barValueSpacing: 5,
          //Number - Spacing between data sets within X values
          barDatasetSpacing: 1,
          //String - A legend template
          legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
          //Boolean - whether to make the chart responsive
          responsive: true,
          maintainAspectRatio: true
        };

        barChartOptions.datasetFill = false;
        barChart.Bar(barChartData, barChartOptions);
/*
///
///
/  END Bar CHART			
///
///
*/		
</script>
@endsection
