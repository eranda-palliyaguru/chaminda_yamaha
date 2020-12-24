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



if($r =='Cashier'){



header("location:./../../../index.php");

}

if($r =='admin'){



include_once("sidebar.php");

}

?>









<link rel="stylesheet" href="datepicker.css"

        type="text/css" media="all" />

    <script src="datepicker.js" type="text/javascript"></script>

    <script src="datepicker.ui.min.js"

        type="text/javascript"></script>

 <script type="text/javascript">

     

		 $(function(){

        $("#datepicker1").datepicker({ dateFormat: 'yy/mm/dd' });

        $("#datepicker2").datepicker({ dateFormat: 'yy/mm/dd' });

       

    });



    </script>

    <!-- /.sidebar -->

  </aside>



  <!-- Content Wrapper. Contains page content -->

     <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1>

        Month END

        <small>Preview</small>

      </h1>

      <ol class="breadcrumb">

        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

        <li><a href="#">Forms</a></li>

        <li class="active">PRODUCT</li>

      </ol>

    </section>

   

   

   
<form action="month_end.php" method="get">   
	<center>
	
			  
			  
			<strong>

From :<input type="text" style="width:223px; padding:4px;" name="d1" id="datepicker" value="" autocomplete="off" /> 
To:<input type="text" style="width:223px; padding:4px;" name="d2" id="datepickerd"  value="" autocomplete="off"/>

 <button class="btn btn-info" style="width: 123px; height:35px; margin-top:-8px;margin-left:8px;" type="submit">
 <i class="icon icon-search icon-large"></i> Search
 </button>
 
</strong>  
			  
		<br>	  
			  
         <h4> Report from&nbsp;<i class=" text-primary "><?php echo $_GET['d1'] ?></i>&nbsp;to&nbsp;<i class=" text-primary "><?php echo $_GET['d2'] ?> </i>  </h4>
			 
			 </center>
			 </form>
   

   

   

  <a href="month_end_print.php?d1=<?php echo $_GET['d1'] ?>&d2=<?php echo $_GET['d2'] ?>"> <input class="btn btn-info" name="com" type="submit" valu="Print" ></a>

   <section class="content">

   

     <div class="box box-success">

            <div class="box-header">

              <h3 class="box-title">Month END Data</h3>

		

            </div>

            <!-- /.box-header -->

			

            <div class="box-body">

              <table id="example1" class="table table-bordered table-striped">

			  

                <thead>

                <tr>

				<th>Model</th>

					<th>M/C no</th>

                  <th>MILAGE</th>

				  <th>F/S</th>
                  <th>W/S</th>
					<th>P/W/S</th>
				

				  

				 

                </tr>

				

                </thead>

				

                <tbody>

				<?php

   $date1=$_GET['d1'];
					$date2=$_GET['d2'];
$cus_id=0;
   $result = $db->prepare("SELECT * FROM sales where action='active' and date BETWEEN '$date1' and '$date2' ORDER by transaction_id ASC  ");

				$result->bindParam(':userid', $date);

                $result->execute();

                for($i=0; $row = $result->fetch(); $i++){	
					$cus_id=$row['customer_id'];
					$id=$row['vehicle_no'];
					
					$result1 = $db->prepare("SELECT * FROM customer where customer_id ='$cus_id' ORDER by model ASC  ");

				$result1->bindParam(':userid', $id);

                $result1->execute();

                for($i=0; $row1 = $result1->fetch(); $i++){
$type=$row['type'];
			?>

                <tr class="record" >
<?php
					if($cus_id>0){
?>				<td><?php echo $row1['model'];?></td>

			      <td><?php echo $row1['vehicle_no'];?></td>

                  <td><?php echo $row['km'];?></td>  

				  <td><?php if($type=="Free  Service"){ echo "X"; } ;?></td>
					<td><?php if($type=="Warranty Service"){ echo "X"; } ;?></td>

				  <td><?php if($type=="Normal Service"){ echo "X"; } ;?><?php if($type==""){ echo "X"; } ;?></td>

			<?php}else{ ?>	 

             <td><?php echo $row['model'];?></td>

			      <td><?php echo $row['vehicle_no'];?></td>

                  <td><?php echo $row['km'];?></td>  

				  <td></td>
					<td></td>

				  <td>X</td>     

                  

				  

				 

				  

				   <?php 
				}
				}

				}

				?>

                </tr>

               

                

                </tbody>

                <tfoot>

                

				

				

				

				

				

				

                </tfoot>

              </table>

            </div>

            <!-- /.box-body -->

          </div>

          <!-- /.box -->

        </div>

        <!-- /.col -->

      

   

   

   



    <!-- Main content -->

    


      <!-- /.row -->



    </section>

    <!-- /.content -->

   </div>

  <!-- /.content-wrapper -->

 <?php

  include("dounbr.php");

?>

  <!-- /.control-sidebar -->

  <!-- Add the sidebar's background. This div must be placed

       immediately after the control sidebar -->

  <div class="control-sidebar-bg"></div>

</div>

<!-- jQuery 2.2.3 -->
<script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<script src="../../plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
	
	
	$('#datepicker').datepicker({  autoclose: true, datepicker: true,  format: 'yyyy-mm-dd'});
    $('#datepicker').datepicker({ autoclose: true });
	
	
	
	$('#datepickerd').datepicker({  autoclose: true, datepicker: true,  format: 'yyyy-mm-dd'});
    $('#datepickerd').datepicker({ autoclose: true  });
	
</script>
</body>
</html>