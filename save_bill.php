<?php
session_start();
include('connect.php');
$a1 = $_POST['invoice'];
$ar = $_POST['amount'];
//$c = $_POST['cus_name'];




$result = $db->prepare("SELECT sum(price) FROM sales_list WHERE invoice_no = '$a1' ");
		$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
            $a = $row['sum(price)'];
			
			
		}


$result = $db->prepare("SELECT sum(profit) FROM sales_list WHERE invoice_no = '$a1' ");
		$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
        $profit = $row['sum(profit)'];	
		}


$result = $db->prepare("SELECT sum(price) FROM sales_list WHERE invoice_no = '$a1' and type='Service'");
		$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
        $labor_cost = $row['sum(price)'];	
		}




$result = $db->prepare("SELECT * FROM sales_list WHERE invoice_no = '$a1' ");
		$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
        $id = $row['product_id'];
		$qty = $row['qty'];
			
$sql = "UPDATE product 
        SET qty=qty-?
		WHERE product_id=?";
$q = $db->prepare($sql);
$q->execute(array($qty,$id));
		}



$b = $ar-$a;
$c = "active";
// query
$sql = "UPDATE  sales SET amount=?,balance=?,action=?,profit=?,labor_cost=? WHERE invoice_number=?";
$ql = $db->prepare($sql);
$ql->execute(array($a,$b,$c,$profit,$labor_cost,$a1));

$result1 = $db->prepare("SELECT * FROM sales WHERE invoice_number='$a1' ");
		$result1->bindParam(':userid', $a1);
		$result1->execute();
		for($i=0; $row1 = $result1->fetch(); $i++){
		$vehicle_no=$row1['vehicle_no'];	
		}



        $result = $db->prepare("SELECT * FROM customer WHERE vehicle_no='$vehicle_no' ");
		$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
		$customer_id=$row['customer_id'];
		$vehicle_no=$row['vehicle_no'];

		$result1 = $db->prepare("SELECT * FROM sales WHERE vehicle_no='$vehicle_no' and action='active' ORDER by transaction_id DESC limit 0,1 ");
		$result1->bindParam(':userid', $res);
		$result1->execute();
		for($i=0; $row1 = $result1->fetch(); $i++){
		$date=$row1['date'];	
		}


	
       $result1 = $db->prepare("SELECT * FROM sales WHERE vehicle_no='$vehicle_no' and action='active' ORDER by transaction_id DESC limit 1,1 ");
		$result1->bindParam(':userid', $res);
		$result1->execute();
		for($i=0; $row1 = $result1->fetch(); $i++){
		$date1=$row1['date'];	
		}
			
	    $result1 = $db->prepare("SELECT * FROM sales WHERE vehicle_no='$vehicle_no' and action='active' ORDER by transaction_id DESC limit 2,1 ");
		$result1->bindParam(':userid', $res);
		$result1->execute();
		for($i=0; $row1 = $result1->fetch(); $i++){
		$date2=$row1['date'];	
		}
			
	    $result1 = $db->prepare("SELECT * FROM sales WHERE vehicle_no='$vehicle_no' and action='active' ORDER by transaction_id DESC limit 3,1 ");
		$result1->bindParam(':userid', $res);
		$result1->execute();
		for($i=0; $row1 = $result1->fetch(); $i++){
		$date3=$row1['date'];
		}
			
		$result1 = $db->prepare("SELECT * FROM sales WHERE vehicle_no='$vehicle_no' and action='active' ORDER by transaction_id DESC limit 4,1 ");
		$result1->bindParam(':userid', $res);
		$result1->execute();
		for($i=0; $row1 = $result1->fetch(); $i++){
		$date4=$row1['date'];
		}
			
		$result1 = $db->prepare("SELECT * FROM sales WHERE vehicle_no='$vehicle_no' and action='active' ORDER by transaction_id DESC limit 5,1 ");
		$result1->bindParam(':userid', $res);
		$result1->execute();
		for($i=0; $row1 = $result1->fetch(); $i++){
		$date5=$row1['date'];
		}
			 
			//echo $rs1;
			
                  $date =  $date;
				  $sday= strtotime( $date1);
                  $nday= strtotime($date);
                  $tdf= abs($nday-$sday);
                  $nbday1= $tdf/86400;
                  $rs1= intval($nbday1);
		 
			      $date =  $date1;
				  $sday= strtotime( $date2);
                  $nday= strtotime($date);
                  $tdf= abs($nday-$sday);
                  $nbday1= $tdf/86400;
                  $rs2= intval($nbday1);
			
			      $date =  $date2;
				  $sday= strtotime( $date3);
                  $nday= strtotime($date);
                  $tdf= abs($nday-$sday);
                  $nbday1= $tdf/86400;
                  $rs3= intval($nbday1);
			
			      $date =  $date3;
				  $sday= strtotime( $date4);
                  $nday= strtotime($date);
                  $tdf= abs($nday-$sday);
                  $nbday1= $tdf/86400;
                  $rs4= intval($nbday1);
			
			      $date =  $date4;
				  $sday= strtotime( $date5);
                  $nday= strtotime($date);
                  $tdf= abs($nday-$sday);
                  $nbday1= $tdf/86400;
                  $rs5= intval($nbday1);
			
			$xb=5;$last_day=$rs5;
			if($rs1>1000){ $rs1=0; $last_day=0;}
			if($rs2>1000){ $rs2=0;$xb=1; $last_day=$rs1;}
			if($rs3>1000){ $rs3=0;$xb=2; $last_day=$rs2;}
			if($rs4>1000){ $rs4=0;$xb=3; $last_day=$rs3;}
			if($rs5>1000){ $rs5=0;$xb=4; $last_day=$rs4;}
			
			
			
			$f_rs=$rs1+$rs2+$rs3+$rs4+$rs5;
			$f_rs= $f_rs/$xb;
			
			$reset=$f_rs+$last_day;
			$reset=$reset/2;
			$reset= number_format($reset,0);
			
$sql = "UPDATE customer 
        SET day=?
		WHERE customer_id=?";
$q = $db->prepare($sql);
$q->execute(array($reset,$customer_id));

		}


header("location: bill.php?id=$a1");


?>