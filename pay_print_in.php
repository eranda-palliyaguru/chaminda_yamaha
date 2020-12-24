<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>COLOR BIZNAZ | Invoice</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body onload="window.print() " style=" font-size: 13px; font-family: arial;">
<?php

$sec = "1";
?><meta http-equiv="refresh" content="<?php echo $sec;$d1=$_GET['d1'];?>;URL='terms.php'">	
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          <i class="fa fa-globe"></i> Centralinvestment.
		  
          <small class="pull-right">Date:<?php date_default_timezone_set("Asia/Colombo"); 
	                                                        echo date("Y-m-d")  ?></small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">
       
        <address>
          <strong></strong>
          <?php


		  
		  include("connect.php");
				
				
				
				$d1=$_GET['d1'];
				//$d2=$_GET['d2'];
		  
$result = $db->prepare("SELECT * FROM sales WHERE transaction_id='$d1'     ORDER by transaction_id DESC");
				
					$result->bindParam(':userid', $date);
                $result->execute();
                for($i=0; $row = $result->fetch(); $i++){
				  
				  
							
			
			echo ' <label>Name:  </label>';
			echo  $row['name'];
			
			
			
			
			?>
          <?php

			echo ' <label>Order id :  </label>';
			
			echo  $row['order_id'];
			
				}?><br>
         
        </address>
      </div>
      <!-- /.col -->
      
      
      <!-- /.col -->
    </div>
    <!-- /.row -->
<div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
				
				<th>Date</th>
                  
                  <th>Amount</th>
                  <th>Terms</th>
                  <th>Interest</th>
				   <th>Cashier</th>
				   
                  
                </tr>
                </thead>
                <tbody>
				<?php
   
  
			
				include("connect.php");
				
				
				
				$d1=$_GET['d1'];
				//$d2=$_GET['d2'];
				//$d3=$_SESSION['SESS_FIRST_NAME'];
				//$d3=$_GET['d3'];
				$result = $db->prepare("SELECT * FROM sales WHERE   transaction_id='$d1'   ORDER by transaction_id DESC");
				
					$result->bindParam(':userid', $date);
                $result->execute();
                for($i=0; $row = $result->fetch(); $i++){
				$do=$row['do'];
				if($do=="delete"){
				echo '<tr class="alert alert-warning record" style="color: #fff; background:rgb(255, 95, 66);">';
				}
				else{
				echo '<tr class="record">';
				}
				
				
			?>
                
				
				<td><?php echo $row['date'];?></td>
                  
                  <td>Rs.<?php echo $row['amount'];?>
                  </td>
                  <td><?php echo $row['due_date'];?></td>
                  <td>Rs.<?php echo $row['interest'];?></td>
				   <td><?php echo $row['cashier'];?></td>
                  
				  
				  
				  
				  <?php 
				  
				  
				  
				  				
				  
					  ?>
					 
<?php				  
				 
				  
				  
				  
				  
				}
				   ?>
				  
				  
				  
                </tr>
               
                
                </tbody>
				
                <tfoot>
                
				
				
				
				 
				
				
                </tfoot>
              </table>
            </div>
    <!-- Table row -->
   
    <!-- /.row -->

   <td>Software by color biz</td>
	
	<br><br><br>
	<td>_______________________</td>
	<br>
	<td>Cashier</td>
        </div>
      
      <!-- /.col -->
    
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>
