<!DOCTYPE html>
<html>
<head>
	<?php
		  include("connect.php");
	
	$invo = $_GET['id'];
	$co = substr($invo,0,2) ;
			?>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>CLOUD ARM | Invoice</title>
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
<body >
<?php
$sec = "1";
?>	
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
	  
	  
	<a href="index.php" class="btn btn-primary btn-xs"><h1>Back</h1></a>  
	  
	  <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
           <h3>CHAMINDA MOTORS.</h3>
	  <p>NO.196/A,Weyangoda Rd,Minuwangaoda. <br>
	  Authorized Dealer For Yamaha <br>
	  	  BR no- .wy/8940 <br>
	  	  <b>Invoice no.<?php echo $_GET['id']; ?> </b><br>
	<h5><b>Tel: 011-2283245 </b><br><b>Mobile: 077-3301106 </b><br>	
		  Date:<?php date_default_timezone_set("Asia/Colombo"); 
    echo date("Y-m-d"); echo "  Time-";  echo date("h:ia")  ?>
			</h5></p>
	  
        </div>
        <!-- /.col -->
		  
		  
		  
		  
        <div class="col-xs-6">
          <small class="pull-right">
        
			
			</small></div> 
        <!-- /.col -->
		  <div class="col-xs-4">
          <h3>Payment</h3>
      </div></div>
  
<div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
				<th>Lone id</th>
				<th>Customer Name</th>
				<th>Date</th>
                  <th>Pay Amount</th>
                  
                </tr>
                </thead>
                <tbody>
				<?php
			date_default_timezone_set("Asia/Colombo");
		$hh=date("Y-m-d");
		$invo=$_GET['id'];
					$tot_amount=0;
				$result = $db->prepare("SELECT * FROM lone_pay WHERE   invoice_number='$invo'");
					$result->bindParam(':userid', $date);
                $result->execute();
                for($i=0; $row = $result->fetch(); $i++){
			?>
                <tr>
				<td><?php echo $row['lone_id'];?></td>
				<td><?php echo $row['name'];?></td>
                  <td><?php echo $row['date'];?></td>
				  <td>Rs.<?php echo $row['amount'];?></td>
                  
                  <?php } ?>
                 </tr>
                </tbody>
                <tfoot>
                </tfoot>
              </table>
	  
	
            </div>
        </div>
  </section>
</div>
</body>
</html>