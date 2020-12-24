<!DOCTYPE html>
<html>
<head>
	<?php
		  include("connect2.php");
	

			?>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>COLOR Biznaz | Invoice</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body onload="window.print() " style=" font-size: 13px; font-family: arial;">
<?php
$sec = "1";
?><meta http-equiv="refresh" content="<?php echo $sec;?>;URL='sales_rp.php?d1=<?php echo $_GET['d1']; ?>&d2=<?php echo $_GET['d2']; ?>'">	
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">

            <div class="box-body">

    <table id="example1" class="table table-bordered table-striped">
			  
                <thead>
                <tr>
					<th>Date</th>
                  <th>Invoice no</th>
				  <th>Vehicle No</th>
                  
				  <th>Customer Name</th>
					
					<th>F/S</th>
                  
					<th>Labor Cost</th>
                  <th>Part Price</th>
				  
				  <th>Amount</th>
                  
                </tr>
				
                </thead>
				
                <tbody>
				<?php
   $d1=$_GET['d1'];
				$d2=$_GET['d2'];
			 $tot=0;
   $result = $db->prepare("SELECT * FROM sales WHERE action='active' and date BETWEEN '$d1' AND '$d2'  ");
				$result->bindParam(':userid', $date);
                $result->execute();
                for($i=0; $row = $result->fetch(); $i++){
				
				$type=$row['type'];
				$id=$row['invoice_number'];
				
			?>
                <tr>
				  <td><?php echo $row['date'];?></td>
				  <td><?php echo $row['invoice_number'];?></td>
				  <td><?php echo $row['vehicle_no'];?></td>
                  <td><?php echo $row['customer_name'];?></td>
					
					<td><?php if($type=="fs"){ echo "X"; } ;?></td>
                  
				  <td><?php echo $row['labor_cost'];?></td>
                  <td><?php echo $row['amount']-$row['labor_cost'];?></td>
                  <td><?php echo $row['amount'];?></td>
				  
				  
				  
				   <?php 
					$tot+=$row['amount'];
					$labor+=$row['amount']-$row['labor_cost'];
				}
				
				?>
                </tr>
               
                
                </tbody>
                <tfoot>
                
				
				<tr>
					<th></th>
                  <th></th>
					<th></th>
					<th>Total </th>
					
					<th>F/S</th>
                  
                  <th><?php echo $tot-$labor; ?>.00</th>
				  <th><?php echo $labor; ?>.00</th>
				  <th><?php echo $tot; ?>.00</th>
                  
                </tr>
				
				
				<?php 
					$hold=0;
					$result = $db->prepare("SELECT sum(amount) FROM expenses_records WHERE  date BETWEEN '$d1' AND '$d2'  ");
				$result->bindParam(':userid', $date);
                $result->execute();
                for($i=0; $row = $result->fetch(); $i++){
				$ex=$row['sum(amount)'];
				}
	$result1 = $db->prepare("SELECT * FROM hold_amount WHERE date='$d2' ORDER by id DESC limit 0,1 ");
		$result1->bindParam(':userid', $res);
		$result1->execute();
		for($i=0; $row1 = $result1->fetch(); $i++){
		$hold=$row1['amount'];
		}
		$result1 = $db->prepare("SELECT * FROM hold_amount  ORDER by id DESC limit 1,1 ");
		$result1->bindParam(':userid', $res);
		$result1->execute();
		for($i=0; $row1 = $result1->fetch(); $i++){
		$hold1=$row1['amount'];
		$hold_date=$row1['date'];
		}
			
					
					$total=$hold1+$tot-$ex;
					?>
                </tfoot>
              </table>
				<table >
				<thead>
                <tr>
					<th>Description</th>
                  <th>Amount</th>
                </tr>
				</thead>
				
					<tr>
					<th>Bill Total</th>
                  <th>Rs.<?php echo $tot; ?>.00</th>
                </tr>
					<tr>
					<th>Expenses</th>
                  <th>Rs.<?php echo $ex; ?></th>
                </tr>
					
					<tr>
					<th>Hold Amount (<?php echo $hold_date; ?>)</th>
                  <th>Rs.<?php echo $hold1; ?>.00</th>
                </tr>
					<tr>
					<th>Total</th>
                  <th>Rs.<?php echo $total; ?>.00</th>
                </tr>
					<tr>
					<th>-</th>
                  <th>-</th>
                </tr>
					
					<tr>
					<th>Hold Amount</th>
                  <th>Rs.<?php echo $hold; ?>.00</th>
                </tr>
					<tr>
					<th>Balance</th>
                  <th>Rs.<?php echo $total-$hold; ?>.00</th>
                </tr>
					
					
					
					<tfoot>
					</tfoot>
					</table>

            </div>
  </section>
</div>
</body>
</html>