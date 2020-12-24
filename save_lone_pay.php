<?php
session_start();
include('connect.php');
date_default_timezone_set("Asia/Colombo");
$amount = $_POST['amount'];
$amount1 = $_POST['amount'];
$id=$_POST['id'];

$result = $db->prepare("SELECT * FROM lone WHERE id= :userid");
$result->bindParam(':userid', $id);
$result->execute();
for($i=0; $row = $result->fetch(); $i++){
$cus=$row['customer_name'];
$monthly_payment=$row['monthly_pay'];
$balance=$row['amount_due'];
$balance1=$row['amount_due'];
$rate=$row['rate'];
$olld_dela=$row['dela'];
$day=$row['pay_day'];
$next_da=$row['next_date'];

$terms=$row['term'];
$ins=$row['ins'];
$regi=$row['regi'];
$commission=$row['commission'];

}



// Dela checking //
$amount=$amount+$olld_dela;




// ower payment checking //
$ower=$amount-$monthly_payment;

$f1=$amount/$monthly_payment; 
$f1=number_format($f1,2);
  $split = explode(".", $f1);
   $term = $split[0];
$pu=$monthly_payment*$term;
$pu=$amount-$pu;
$pr=$monthly_payment-$pu;

		// Interest cale //		   
for($month = 0; $month < (int)$term; $month++) {
 
$interest1 = $balance1 * $rate / 1200;
$principal = $monthly_payment - $interest1;	

$balance1 -= $principal;

$interest2+=$interest1;

}
$term_pay=$monthly_payment*$term;
$principal1=$term_pay-$interest2;
// Checking minimam pay amount //
$pay_value=$principal1;
$sha=$balance-$pay_value;

$monthly_payment=$monthly_payment*$term;
$adu=$monthly_payment; 
$dela=$amount-$adu;
 


$y=date("Y");
$m1=date("m");

    $split = explode("-", $next_da);
            $y= $split[0];
			$m1= $split[1];

if($m=="12"){$y=$y+1;$m="01";}
$m=$m1+$term;
if($m<10){$m="0".$m;}
if($day<10){$day="0".$day;}

$next_date=$y."-".$m."-".$day;



$interest2=number_format($interest2,2);
$interest2 = (float) strtr($interest2, [',' => '',]); 
// Lone deta Update // 
$sql = "UPDATE lone 
        SET amount_due=amount_due-? 
		WHERE id=?";
$q = $db->prepare($sql);
$q->execute(array($pay_value,$id));

$sql = "UPDATE lone 
        SET interest_due=interest_due-? 
		WHERE id=?";
$q = $db->prepare($sql);
$q->execute(array($interest2,$id));

$sql = "UPDATE lone 
        SET dela=? 
		WHERE id=?";
$q = $db->prepare($sql);
$q->execute(array($dela,$id));

$sql = "UPDATE lone 
        SET term_due=term_due-? 
		WHERE id=?";
$q = $db->prepare($sql);
$q->execute(array($term,$id));

$sql = "UPDATE lone 
        SET next_date=? 
		WHERE id=?";
$q = $db->prepare($sql);
$q->execute(array($next_date,$id));


$g=0;
$a=date("ymdhis");
$c = "active";
$date=date("Y-m-d");
$cashi = $_SESSION['SESS_FIRST_NAME'];
// query
$sql = "INSERT INTO lone_pay (invoice_number,cashier,date,lone_id,amount,interest,due_date,name,user_balance,dela) VALUES (:a,:b,:c,:d,:e,:f,:g,:h,:n,:dela)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$cashi,':c'=>$date,':d'=>$id,':e'=>$amount1,':f'=>$interest2,':g'=>$g,':h'=>$cus,':n'=>$sha,':dela'=>$olld_dela));

header("location: bill.php?id=$a");


?>