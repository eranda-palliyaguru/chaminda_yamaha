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

include_once("sidebar2.php");
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
		
		<div class="col-md-6">
              <div class="form-group">
                <label>Customer</label>
				  <div class="input-group">
				   <div class="input-group-addon">
                    <i class="fa fa-motorcycle"></i>
                  </div>
					 <form action="terms2.php" method="get">
					  
                <select type="text" name="id"    class="form-control select2"  >					   
					<?php include('connect.php');
					$result = $db->prepare("SELECT * FROM lone WHERE action = '' ");
		$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){ ?>
					  <option value="<?php echo $row['id']; ?>"><?php echo $row['customer_name']; ?>	</option>
		<?php } ?>			  
					  </select>
		
					  
					  <input class="btn btn-info" type="submit" value="Submit" >
					  
					  </form>
                  </div>
                  </div>
				</div>
		
		
		
      <h1>
        Payment
        <small>Preview</small>
      </h1>
      
    </section>

	  
	  
<br><br><br>	  
	  
	  
    <!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Select2</h3>

          
        <!-- /.box-header -->
		<div class="form-group">
              
	
			
			
		
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
               
                
				</div>
              </div>
			  
			  
			  <div class="form-group">
              
				
        
		
        </div>
      </div>
	   				  
											  
      <!-- /.box -->
<div class="form-group">
			   <?php
			   

include('connect.php');
$hh=$_GET['id'];
$result = $db->prepare("SELECT * FROM lone WHERE id= :userid");
$result->bindParam(':userid', $hh);
$result->execute();
for($i=0; $row = $result->fetch(); $i++){
$cus=$row['customer_name'];
$day_interest= 0;
$credit =  $row['amount'];
$credit2 =  $row['amount_due'];
$monthly_payment=$row['monthly_pay'];
		$balance=$row['amount_due'];
		$rate=$row['rate'];

$h1=$row['amount'];
$h2=$row['amount_due'];
$h3=$h1/100;
$h41=$h2/$h3;
$h4=100-$h41;
$h4=number_format($h4,2);
}
 
                    $interest = $balance * $rate / 1200;
                    $principal = $monthly_payment - $interest;
	$interest=number_format($interest,0);

			   ?>
			<div class="box-body">
              <table id="example" class="table table-bordered table-hover">      
<tbody>
				
	           <tr >
                  <td>Customer Name </td>
                  <td><?php  echo $cus;   ?></td>                  
                </tr>
	        
                <tr >
                  <td>Term Amount </td>
                   <td>Rs.<?php echo number_format($monthly_payment, 2) ?></td>                 
                </tr>

				<tr >
                  <td>Loan Balance </td>
                 <td>Rs.<?php echo number_format($balance, 2) ?></td>                 
                </tr>
				
				








</tbody>
                
              </table>
            </div>				
			  
              
		
		<h4><label>Today Cloce Amount </label>  Rs.<?php 
//$today_interast=$interest;
 ?> </h4>
       <div class="progress progress-sm active">
                      <div class="progress-bar progress-bar-success progress-bar-striped" style="width: <?php echo $h4;?>%"></div>
                    </div> <span class="badge bg-green"><?php echo $h4;?>%</span>
			 <form method="post" action="save_lone_pay.php"> 
			  <div class="box-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>amount</label>
                <input type="number" name="amount"  value="" class="form-control pull-right" min="<?php echo $interest; ?>"  >
				  <input type="hidden" name="id" value="<?php echo $hh; ?>">
                
                  </div>
				</div>
              </div>
              </div>
			  
			  
			  <input class="btn btn-info" name="com" type="submit" valu="Submit" >
			  
			  </form>
          <!-- /.box -->

		  
		  <?php
		  $result = $db->prepare("SELECT * FROM lone_pay WHERE  lone_id=:userid  ORDER by id DESC");
				
					$result->bindParam(':userid', $hh);
                $result->execute();
                for($i=0; $row = $result->fetch(); $i++){
                   $do=$row['do'];
					 ?> 
		<h5>    <?php echo $row['date'];
		        if($do=="delete"){
		         ?>  <span class="badge bg-red"><?php }
		        else{ ?>
		        <span class="badge bg-green">
		            
		        <?php } ?>
		        Rs.<?php echo $row['amount'];?> </span> </h5>			 
					 
				<?php } ?>		 
		  
        </div>
        <!-- /.col (left) -->
       

        
            <!-- /.box-body -->
            
            </div>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col (right) -->
      </div>
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
<script src="js/jquery.js"></script>
<!-- jQuery 2.2.3 -->
<script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="../../plugins/select2/select2.full.min.js"></script>
<!-- InputMask -->
<script src="../../plugins/input-mask/jquery.inputmask.js"></script>
<script src="../../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="../../plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="../../plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="../../plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- bootstrap color picker -->
<script src="../../plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="../../plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="../../plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="../../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Page script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();

    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("YYYY/MM/DD", {"placeholder": "YYYY/MM/DD"});
    //Datemask2 mm/dd/yyyy
    $("#datemask2").inputmask("YYYY/MM/DD", {"placeholder": "YYYY/MM/DD"});
    //Money Euro
    $("[data-mask]").inputmask();

    //Date range picker
    $('#reservation').daterangepicker();
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'YYYY/MM/DD h:mm A'});
    //Date range as a button
    $('#daterange-btn').daterangepicker(
        {
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate: moment()
        },
        function (start, end) {
          $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
    );

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass: 'iradio_minimal-red'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });

    //Colorpicker
    $(".my-colorpicker1").colorpicker();
    //color picker with addon
    $(".my-colorpicker2").colorpicker();

    //Timepicker
    $(".timepicker").timepicker({
      showInputs: false
    });
  });
</script>

  <script type="text/javascript">
$(function() {


$('input[name=com]').click(function(){

//Save the link in a variable called element
$(this).hide();

//Find the id of the link that was clicked


});

});
</script>
</body>
</html>
