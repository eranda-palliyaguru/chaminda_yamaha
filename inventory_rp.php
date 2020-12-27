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
        Inventory Report
        <small>Preview</small>
      </h1>
      
    </section>








   <section class="content">

     <div class="box">
            <div class="box-header">
              <h3 class="box-title">Inventory Report</h3>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">

                <thead>
                <tr>
                  <th>Code</th>
				  <th>Name</th>
                  <th>Sell QTY</th>
				  <th>QTY</th>

                </tr>

                </thead>

                <tbody>
				<?php
   $d1=$_GET['d1'];
   $d2=$_GET['d2'];
   $type=$_GET['type'];
if($type==1){include("connect.php");}
if($type==2){include("connect2.php");}

   $tot=0;
   $result1 = $db->prepare("SELECT * FROM product   ");
   $result1->bindParam(':userid', $date);
   $result1->execute();
   for($i=0; $row = $result1->fetch(); $i++){
	$code=$row['code'];


	$result = $db->prepare("SELECT count(id) FROM sales_list WHERE code = '$code' and action='1' and  date BETWEEN '$d1' AND '$d2' ");
	$result->bindParam(':userid', $res);
	$result->execute();
		for($i=0; $row1 = $result->fetch(); $i++){
            $b = $row1['count(id)'];
          }

		if($b==0){}else{


			?>
                <tr>
				  <td><?php echo $row['code'];?></td>
				  <td><?php echo $row['name'];?></td>
                  <td><?php echo $b;?></td>
                  <td><?php echo $row['qty'];?></td>

<?php }	} ?>
                </tr>


                </tbody>
                <tfoot>

                </tfoot>
              </table>
				<center>
				<h3>Total Rs.<?php // echo $tot; ?>.00</h3>
      </center>
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
<!-- ./wrapper -->

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


	$('#datepicker').datepicker({  autoclose: true, datepicker: true,  format: 'yyyy-mm-dd '});
    $('#datepicker').datepicker({ autoclose: true });



	$('#datepickerd').datepicker({  autoclose: true, datepicker: true,  format: 'yyyy-mm-dd '});
    $('#datepickerd').datepicker({ autoclose: true  });

</script>
</body>
</html>
