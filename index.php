<!DOCTYPE html>

<html>

<?php 
include("head.php");
include("connect.php");
?>
<body class="hold-transition skin-blue sidebar-mini">

<?php 

include_once("auth.php");

$r=$_SESSION['SESS_LAST_NAME'];
$r1=$_SESSION['SESS_FIRST_NAME'];



if($r =='Cashier'){



include_once("sidebar2.php");

}

if($r =='admin'){



include_once("sidebar.php");

}

if($r1=="Mr.Chaminda"){header("location: index2.php");}

?>





    <!-- /.sidebar -->

  </aside>



  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1>

        Home

        <small>Preview</small>

      </h1>

      

    </section>



    <!-- Main content -->

    <section class="content">



	

	

	<?php

		include('connect.php');

 date_default_timezone_set("Asia/Colombo");

 $cash=$_SESSION['SESS_FIRST_NAME'];



                  $date =  date("Y-m-d");					
$result = $db->prepare("SELECT sum(labor_cost) FROM sales WHERE action='active' AND  date='$date' ");
				$result->bindParam(':userid', $date);
                $result->execute();
                for($i=0; $row = $result->fetch(); $i++){
				  $labor=$row['sum(labor_cost)'];
				}
			

				$result = $db->prepare("SELECT sum(profit) FROM sales WHERE action='active' AND  date='$date' ");
					$result->bindParam(':userid', $date);
                $result->execute();
                for($i=0; $row = $result->fetch(); $i++){
				  $profit=$row['sum(profit)'];
				}

$result = $db->prepare("SELECT sum(amount) FROM sales WHERE  action='active' AND  date='$date'  ");
			$result->bindParam(':userid', $date);
                $result->execute();
                for($i=0; $row = $result->fetch(); $i++){				  
				  $amount=$row['sum(amount)'];
				}		
		
				$result = $db->prepare("SELECT sum(amount) FROM sales WHERE  action='active' AND  date='$date' AND customer_name='Unknown customer' ");
					$result->bindParam(':userid', $date);
                $result->execute();
                for($i=0; $row = $result->fetch(); $i++){
				  $dr_amount=$row['sum(amount)'];

				}	

$result = $db->prepare("SELECT sum(amount) FROM expenses_records WHERE  date = '$date' ");
				$result->bindParam(':userid', $date);
                $result->execute();
                for($i=0; $row = $result->fetch(); $i++){
				$ex=$row['sum(amount)'];
				}


		$month1=date("Y-m-01");
		$month2=date("Y-m-31");
		
		$result = $db->prepare("SELECT * FROM model ");
				$result->bindParam(':userid', $date);
                $result->execute();
                for($i=0; $row = $result->fetch(); $i++){
				$model_name=$row['name'];
					$model_id=$row['id'];
				
				$result1 = $db->prepare("SELECT sum(amount) FROM sales WHERE  model='$model_name' AND  date BETWEEN '$month1' AND '$month2' ");
					$result1->bindParam(':userid', $date);
                $result1->execute();
                for($i=0; $row1 = $result1->fetch(); $i++){
				  $model_amount=$row1['sum(amount)'];
				}
$sql = "UPDATE model 
        SET amount=?
		WHERE id=?";
$q = $db->prepare($sql);
$q->execute(array($model_amount,$model_id));
				
				}
		
		
		$result1 = $db->prepare("SELECT sum(amount) FROM model ");
					$result1->bindParam(':userid', $date);
                $result1->execute();
                for($i=0; $row1 = $result1->fetch(); $i++){
				  $month_amount=$row1['sum(amount)'];
				}
		$date=date("Y-m-d");
		$result = $db->prepare("SELECT count(id) FROM job WHERE  date='$date' ORDER by id DESC ");
				$result->bindParam(':userid', $date);
                $result->execute();
                for($i=0; $row = $result->fetch(); $i++){
				$job_count=$row['count(id)'];	
				}

	
		//oooooooooooooooooooooooooooooo YAMAHA 2 ooooooooooooooooooooooooooooooooooooooooo
	
		include('connect2.php');
		
		$result = $db->prepare("SELECT sum(labor_cost) FROM sales WHERE action='active' AND  date='$date' ");
				$result->bindParam(':userid', $date);
                $result->execute();
                for($i=0; $row = $result->fetch(); $i++){
				  $labor2=$row['sum(labor_cost)'];
				}
		
		
		
$result = $db->prepare("SELECT sum(profit) FROM sales WHERE action='active' AND  date='$date' ");
				$result->bindParam(':userid', $date);
                $result->execute();
                for($i=0; $row = $result->fetch(); $i++){
				  $profit2=$row['sum(profit)'];
				}

$result = $db->prepare("SELECT sum(amount) FROM sales WHERE  action='active' AND  date='$date'  ");
				$result->bindParam(':userid', $date);
                $result->execute();
                for($i=0; $row = $result->fetch(); $i++){
				  $amount2=$row['sum(amount)'];

				}		
				$result = $db->prepare("SELECT sum(amount) FROM sales WHERE  action='active' AND  date='$date' AND customer_name='Unknown customer' ");
					$result->bindParam(':userid', $date);
                $result->execute();
                for($i=0; $row = $result->fetch(); $i++){
				  $dr_amount2=$row['sum(amount)'];

				}	

$result = $db->prepare("SELECT sum(amount) FROM expenses_records WHERE  date = '$date' ");
				$result->bindParam(':userid', $date);
                $result->execute();
                for($i=0; $row = $result->fetch(); $i++){
				$ex2=$row['sum(amount)'];
				}


		$month1=date("Y-m-01");
		$month2=date("Y-m-31");
		
		$result = $db->prepare("SELECT * FROM model ");
				$result->bindParam(':userid', $date);
                $result->execute();
                for($i=0; $row = $result->fetch(); $i++){
				$model_name2=$row['name'];
				$model_id2=$row['id'];
				
				$result1 = $db->prepare("SELECT sum(amount) FROM sales WHERE  model='$model_name2' AND  date BETWEEN '$month1' AND '$month2' ");
					$result1->bindParam(':userid', $date);
                $result1->execute();
                for($i=0; $row1 = $result1->fetch(); $i++){
				  $model_amount2=$row1['sum(amount)'];
				}
$sql = "UPDATE model 
        SET amount=?
		WHERE id=?";
$q = $db->prepare($sql);
$q->execute(array($model_amount2,$model_id2));
				
				}
		
		
		$result1 = $db->prepare("SELECT sum(amount) FROM model ");
					$result1->bindParam(':userid', $date);
                $result1->execute();
                for($i=0; $row1 = $result1->fetch(); $i++){
				  $month_amount2=$row1['sum(amount)'];
				}
		
		
		
		
		
		
				date_default_timezone_set("Asia/Colombo");
				$date=date("Y-m-d");
		
		
		
		
			?>
	 
	 <?php     $r=$_SESSION['SESS_LAST_NAME'];
if($r =='Cashier'){
	?>
<?php }
else{
 ?>
        

	<?php 

}

 ?>

<div class="row">
	  
	  

	
	

	
	  </div>
	<div class="row">
		
				<div class="col-md-12">
 <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Lone</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th >Id.</th>
                    <th>customer name</th>
                    <th>Amount</th>
					  <th>Balance</th>
					<th>Pay Day</th> 
					 <th>Terms pay </th>
					 <th>Terms pay total</th>
					  <th>Terms Balence</th>
					  <th>Date</th>
					  <th>Next Pay Date</th>
            
                  </tr>
                  </thead>
                  <tbody>
					  <?php include('connect.php');
			$result = $db->prepare("SELECT * FROM lone WHERE action='0' ORDER by id DESC ");
				$result->bindParam(':userid', $date);
                $result->execute();
                for($i=0; $row = $result->fetch(); $i++){
			$loid=$row['id'];
		    $con_date=$row['next_date'];
$result1 = $db->prepare("SELECT * FROM lone_pay WHERE do='' and lone_id='$loid' ORDER by id DESC limit 0,1");
				
					$result1->bindParam(':userid', $date);
                $result1->execute();
                for($i=0; $row1 = $result1->fetch(); $i++){
				  
				  $lodate=$row1['date'];
				}				
	if($lodate==""){$lodate=$row['date'];}	
	$split = explode("-", $lodate);
   $y = $split[0];
   $m = $split[1];
   $d=$row['pay_day'];
					if($m=="12"){$y=$y+1;}else{$m=$m+1;}
	$con_date1=$y."-".$m."-".$d;
$dateNow=date("Y-m-d");	
$datetime1 = new DateTime($dateNow);
$datetime2 = new DateTime($con_date);
$interval = $datetime1->diff($datetime2);
$rina= $interval->format('%R%a');			
					
if($rina<0){					
  ?>
                  <tr style="background-color:#FF0004">				
				<?php }else{	  ?>
		<tr>
	<?php }  ?>
                    <td><?php echo $row['id'];?></td>
                    <td><?php echo $row['customer_name'];?></td>
                    <td>Rs.<?php echo $row['amount'];?></td>
				    <td>Rs.<?php echo $row['amount_due'];?></td>
					<td><?php echo $row['pay_day'];?></td>  
		            <td>Rs.<?php echo $row['monthly_pay'];?></td> 
					<td><?php 
$result1 = $db->prepare("SELECT count(amount) FROM lone_pay WHERE do='' and lone_id='$loid'");
				
					$result1->bindParam(':userid', $date);
                $result1->execute();
                for($i=0; $row1 = $result1->fetch(); $i++){
				  
				  $lotot=$row1['count(amount)'];
				}	
				echo $lotot;
				$ba=$row['term']-$lotot;
						?></td>
				<td><?php echo $ba;?></td>
			   <td><?php echo $row['date'];?></td>
			   <td><?php echo $row['next_date'];?></td>
                  </tr>
                  
                  <?php } ?>
					  
                  </tbody>
					
                </table>
              </div>
              <!-- /.table-responsive -->
				
            </div>
	 
	 
	 </div></div>
		
		
		
		
		
		</div>

      <!-- SELECT2 EXAMPLE -->

      <div class="box box-info">

        <div class="box-header with-border">

          <h3 class="box-title"><?php echo date("Y")-1 ?> to <?php echo date("Y") ?> Sales Chart</h3>



		  

		  

		  

		  

          <div class="chart">

        <canvas id="lineChart" style="height:250px"></canvas>

		</div>

		 <!-- Main content -->

		

		

		

		  </div>

		  </div>

		

		

		

		

		

		

		

		

	

  </div>

  <!-- /.content-wrapper -->

  <?php

  include("dounbr.php");

?>

  <!-- /.control-sidebar -->

  <!-- Add the sidebar's background. This div must be placed

       immediately after the control sidebar -->

  <div class="control-sidebar-bg"></div>



<!-- ./wrapper -->



<!-- jQuery 2.2.3 -->

<script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>

<!-- Bootstrap 3.3.6 -->

<script src="../../bootstrap/js/bootstrap.min.js"></script>

<!-- ChartJS 1.0.1 -->

<script src="../../plugins/chartjs/Chart.min.js"></script>

<!-- FastClick -->

<script src="../../plugins/fastclick/fastclick.js"></script>

<!-- AdminLTE App -->

<script src="../../dist/js/app.min.js"></script>

<!-- AdminLTE for demo purposes -->

<script src="../../dist/js/demo.js"></script>







 <?php

 include("chart.php");

?>





<!-- page script -->

<script>

  $(function () {

    /* ChartJS

     * -------

     * Here we will create a few charts using ChartJS

     */



    //--------------

    //- AREA CHART -

    //--------------



    // Get context with jQuery - using jQuery's .get() method.

    var areaChartCanvas = $("#lineChart").get(0).getContext("2d");

    // This will get the first returned node in the jQuery collection.

    var areaChart = new Chart(areaChartCanvas);



    var areaChartData = {

      labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],

      datasets: [

        {

          label: <?php echo date("Y")-1 ?> + " SALES ",

          fillColor: "rgba(210, 214, 222, 1)",

          strokeColor: "rgba(210, 214, 222, 1)",

          pointColor: "rgba(210, 214, 222, 1)",

          pointStrokeColor: "#c1c7d1",

          pointHighlightFill: "#fff",

          pointHighlightStroke: "rgba(220,220,220,1)",

          data:  [<?php  echo $m1t; ?>, <?php  echo $m2t; ?>, <?php  echo $m3t; ?>, <?php  echo $m4t; ?>, <?php  echo $m5t; ?>, <?php  echo $m6t; ?>, <?php  echo $m7t; ?>, <?php  echo $m8t; ?>, <?php  echo $m9t; ?>, <?php  echo $m10t; ?>, <?php  echo $m11t; ?>, <?php  echo $m12t; ?>]

        },

        {

          label: <?php echo date("Y") ?> + " SALES ",

          fillColor: "rgba(60,141,188,0.9)",

          strokeColor: "rgba(60,141,188,0.8)",

          pointColor: "#3b8bba",

          pointStrokeColor: "rgba(60,141,188,1)",

          pointHighlightFill: "#fff",

          pointHighlightStroke: "rgba(60,141,188,1)",

          data: [<?php  echo $m1; ?>, <?php  echo $m2; ?>, <?php  echo $m3; ?>, <?php  echo $m4; ?>, <?php  echo $m5; ?>, <?php  echo $m6; ?>, <?php  echo $m7; ?>, <?php  echo $m8; ?>, <?php  echo $m9; ?>, <?php  echo $m10; ?>, <?php  echo $m11; ?>, <?php  echo $m12; ?>] 

        }

      ]

    };



    var areaChartOptions = {

      //Boolean - If we should show the scale at all

      showScale: true,

      //Boolean - Whether grid lines are shown across the chart

      scaleShowGridLines: false,

      //String - Colour of the grid lines

      scaleGridLineColor: "rgba(0,0,0,.05)",

      //Number - Width of the grid lines

      scaleGridLineWidth: 1,

      //Boolean - Whether to show horizontal lines (except X axis)

      scaleShowHorizontalLines: true,

      //Boolean - Whether to show vertical lines (except Y axis)

      scaleShowVerticalLines: true,

      //Boolean - Whether the line is curved between points

      bezierCurve: true,

      //Number - Tension of the bezier curve between points

      bezierCurveTension: 0.3,

      //Boolean - Whether to show a dot for each point

      pointDot: false,

      //Number - Radius of each point dot in pixels

      pointDotRadius: 4,

      //Number - Pixel width of point dot stroke

      pointDotStrokeWidth: 1,

      //Number - amount extra to add to the radius to cater for hit detection outside the drawn point

      pointHitDetectionRadius: 20,

      //Boolean - Whether to show a stroke for datasets

      datasetStroke: true,

      //Number - Pixel width of dataset stroke

      datasetStrokeWidth: 2,

      //Boolean - Whether to fill the dataset with a color

      datasetFill: true,

      //String - A legend template

      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",

      //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container

      maintainAspectRatio: true,

      //Boolean - whether to make the chart responsive to window resizing

      responsive: true

    };



    //Create the line chart

    areaChart.Line(areaChartData, areaChartOptions);



    //-------------

    //- LINE CHART -

    //--------------

    var lineChartCanvas = $("#lineChart").get(0).getContext("2d");

    var lineChart = new Chart(lineChartCanvas);

    var lineChartOptions = areaChartOptions;

    lineChartOptions.datasetFill = false;

    lineChart.Line(areaChartData, lineChartOptions);



    //-------------

    //- PIE CHART -

    //-------------

    // Get context with jQuery - using jQuery's .get() method.

    var pieChartCanvas = $("#pieChart").get(0).getContext("2d");

    var pieChart = new Chart(pieChartCanvas);

    var PieData = [

      {

        value: 700,

        color: "#f56954",

        highlight: "#f56954",

        label: "Chrome"

      },

      {

        value: 500,

        color: "#00a65a",

        highlight: "#00a65a",

        label: "IE"

      },

      {

        value: 400,

        color: "#f39c12",

        highlight: "#f39c12",

        label: "FireFox"

      },

      {

        value: 600,

        color: "#00c0ef",

        highlight: "#00c0ef",

        label: "Safari"

      },

      {

        value: 300,

        color: "#3c8dbc",

        highlight: "#3c8dbc",

        label: "Opera"

      },

      {

        value: 100,

        color: "#d2d6de",

        highlight: "#d2d6de",

        label: "Navigator"

      }

    ];

    var pieOptions = {

      //Boolean - Whether we should show a stroke on each segment

      segmentShowStroke: true,

      //String - The colour of each segment stroke

      segmentStrokeColor: "#fff",

      //Number - The width of each segment stroke

      segmentStrokeWidth: 2,

      //Number - The percentage of the chart that we cut out of the middle

      percentageInnerCutout: 50, // This is 0 for Pie charts

      //Number - Amount of animation steps

      animationSteps: 100,

      //String - Animation easing effect

      animationEasing: "easeOutBounce",

      //Boolean - Whether we animate the rotation of the Doughnut

      animateRotate: true,

      //Boolean - Whether we animate scaling the Doughnut from the centre

      animateScale: false,

      //Boolean - whether to make the chart responsive to window resizing

      responsive: true,

      // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container

      maintainAspectRatio: true,

      //String - A legend template

      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"

    };

    //Create pie or douhnut chart

    // You can switch between pie and douhnut using the method below.

    pieChart.Doughnut(PieData, pieOptions);



    //-------------

    //- BAR CHART -

    //-------------

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

  });

</script>

</body>

</html>

