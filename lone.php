<!DOCTYPE html>
<html>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<link href="css/style.css" rel="stylesheet">
<script src="script.js"></script>
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
      <h1>
        Lone Form
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Lone Form</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- SELECT2 EXAMPLE -->
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Add Lone</h3>

          
        <!-- /.box-header -->
		<div class="form-group">
              
		<form method="post" action="save_lone.php">
		
        <div class="box-body">
         
	   				  
											  
      <!-- /.box -->
<div class="form-group">
              
	
	
	
	<div class="box-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Customer</label>
				  <div class="input-group">
				   <div class="input-group-addon">
                    <i class="fa fa-motorcycle"></i>
                  </div>
                <select type="text" name="cus"    class="form-control select2"  >					   
					<?php include('connect.php');
					$result = $db->prepare("SELECT * FROM lone_customer WHERE action = '0' ");
		$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){ ?>
					  <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?>	</option>
		<?php } ?>			  
					  </select>
                  </div>
                  </div>
				</div>

			  
			  
			  <div class="form-group">
                <label>Type</label>
				  <div class="input-group">
				   <div class="input-group-addon">
                    <i class="fa fa-code-fork"></i>
                  </div>
                <select type="text" name="type" id="type"    class="form-control select2"  >
				<option value="1">Brand New</option>
				<option value="2">Recondition</option>
				</select>
                  </div>
                  </div> 
			  
			  
			  
              </div>
		</div>
	
	<div class="box-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Vehicle value  (යතුරුපැදියේ මිල)</label>
				  <div class="input-group">
				   <div class="input-group-addon">
                    <i class="fa fa-motorcycle"></i>
                  </div>
                <input type="text" name="value" onkeyup="sum();" id="value"   class="form-control"  required>
                  </div>
                  </div>
				</div>
			  
			  <div class="form-group">
               <label>Down Payment(මූලික ගෙවීම)</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-arrow-down"></i>
                  </div>
               <input type="text" class="form-control" name="down" onkeyup="sum();" id="down" required >  
                </div>
				
		
        </div>
              </div>
		</div>
	
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Credit Amount (ණය මුදල)</label>
				  <div class="input-group">
				   <div class="input-group-addon">
                    <i class="fa fa-usd"></i>
                  </div>
                <input type="text" class="form-control" name="amount" id="amount" readonly>
                  </div>
                  </div>
				</div>
			  
			   <div class="form-group">
                <label>	Term (වාරික ගණන)</label>
				  <div class="input-group">
				   <div class="input-group-addon">
                    <i class="fa fa-navicon"></i>
                  </div>
                <input type="number" class="form-control" id="term" name="term" >
                  </div>
                  </div>
			  
              </div>
              </div>
	
	
	
	<div class="box-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>	Rate</label>
				  <div class="input-group">
				   <div class="input-group-addon">
                    %
                  </div>
                <input type="text" name="rate" id="rate" class="form-control pull-right"  >
                  </div>
                  </div>
				</div>
			  
			  
			   <div class="col-md-6">
              <div class="form-group">
                <label>	Insurance</label>
				  <div class="input-group">
				   <div class="input-group-addon">
                   <i class="fa fa-get-pocket"></i>
                  </div>
                <input type="text" name="ins" id="ins" class="form-control pull-right"  >
                  </div>
                  </div>
				</div>
			  
              </div>
              </div>
	
	
	<div class="box-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
               <label>Model (මාදිලිය)</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-motorcycle"></i>
                  </div>
               <input type="text" class="form-control" name="model" required >  
                </div>
        </div>
				</div>
			  
			  <div class="form-group">
               <label>Color (වර්නය)</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-paint-brush"></i>
                  </div>
               <input type="text" class="form-control" name="color" required >  
                </div>
        </div>
              </div>
		</div>
      
		
	
	
	<div class="box-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Engine Number</label>
                 <div class="input-group">
				   <div class="input-group-addon">
                    <i class="fa fa-gears"></i>
                  </div>
                <input type="text" name="engine_no" class="form-control pull-right"  >
                  </div>  
                  </div>
				</div>
			  
			  
			  <div class="form-group">
                <label>	Chassis No</label>
				  <div class="input-group">
				   <div class="input-group-addon">
                    <i class="fa fa-code-fork"></i>
                  </div>
                <input type="text" name="chassis_no" class="form-control pull-right"  >
                  </div>
                  </div> 
              </div>
              </div>
	
		  <input class="btn btn-warning" id="submit" onclick="myFunction()" type="button" value="Find">
			  <input class="btn btn-info" type="submit" value="Submit" >
			  
			  </form>
          <!-- /.box -->

        </div>
        <!-- /.col (left) -->
       

			
			
			
			

	<br>

			
			
        
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
	
	
	
$(document).ready(function(){
$("#submit").click(function(){
var name = $("#amount").val();
var email = $("#term").val();
var password = $("#rate").val();
var ins = $("#ins").val();
var value = $("#value").val();
var type = $("#type").val();

// Returns successful data submission message when the entered information is stored in database.
var dataString = 'amount='+ name + '&term='+ email + '&rete='+ password + '&ins='+ ins + '&type='+ type + '&value='+ value ;
if(name==''||email==''||password=='')
{
alert("Please Fill All Fields");
}
else
{
// AJAX Code To Submit Form.
$.ajax({
type: "POST",
url: "csv.php",
data: dataString,
cache: false,
success: function(result){
alert(result);

}
});
}
return false;
});
});

	
	
	
function sum() {
            var amount = document.getElementById('value').value;
            var doun = document.getElementById('down').value;
            var result = parseInt(amount) - parseInt(doun);
            if (!isNaN(result)) {
                document.getElementById('amount').value = result;	
            }
        }
	
</script>
</body>
</html>
