<?php
session_start();
include('connect.php');
date_default_timezone_set("Asia/Colombo");
$cus = $_POST['cus'];
$value = $_POST['value'];
$down = $_POST['down'];
$amount = $_POST['amount'];
$term = $_POST['term'];
$rate = $_POST['rate'];
$ins = $_POST['ins'];
$model = $_POST['model'];
$color = $_POST['color'];
$engine_no = $_POST['engine_no'];
$chassis_no = $_POST['chassis_no'];
$type = $_POST['type'];


if($type=="1"){$regi=7500+2000;$pra=3;}
if($type=="2"){$regi=6550+3000;$pra=0;}

//$value = number_format($value,2);

$comm=$value/100*$pra;

$sr=$ins+$regi+$comm;
$amount=$amount+$sr;

$tmp = pow((1 + ($rate / 1200)), ($term ));
$f= number_format(($amount * $tmp) * ($rate / 1200) / ($tmp - 1),2);
$f = (float) strtr($f, [',' => '',]); 

$f1=$f;


$f1 = number_format($f1,2); 
$f1 = (float) strtr($f1, [',' => '',]); 


$interest=$f*$term;
$interest=$interest-$amount;

$day=date("d");
if($day>26){ $day=25; }



$sql = "UPDATE lone_customer 
        SET engine_no=?
		WHERE id=?";
$q = $db->prepare($sql);
$q->execute(array($engine_no,$cus));

$sql = "UPDATE lone_customer 
        SET chassis_no=?
		WHERE id=?";
$q = $db->prepare($sql);
$q->execute(array($chassis_no,$cus));

$sql = "UPDATE lone_customer 
        SET model=?
		WHERE id=?";
$q = $db->prepare($sql);
$q->execute(array($model,$cus));

$sql = "UPDATE lone_customer 
        SET color=?
		WHERE id=?";
$q = $db->prepare($sql);
$q->execute(array($color,$cus));

$act=1;
$sql = "UPDATE lone_customer 
        SET action=?
		WHERE id=?";
$q = $db->prepare($sql);
$q->execute(array($act,$cus));


$result = $db->prepare("SELECT * FROM lone_customer WHERE id = '$cus' ");
		$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
        $name = $row['name'];	
		}

 

$c = "active";
$date=date("Y-m-d");
$cashi = $_SESSION['SESS_FIRST_NAME'];
// query
$sql = "INSERT INTO lone (customer_name,cus_id,vehicle_value,down,amount,amount_due,interest,interest_due,term,term_due,monthly_pay,pay_day,date,action,ins,rate,type,regi,commission,next_date) VALUES (:a,:b,:c,:d,:e,:e,:f,:f,:g,:g,:h,:j,:k,:l,:m,:ra,:type,:regi,:com,:next)";
$ql = $db->prepare($sql);
$ql->execute(array(':a'=>$name,':b'=>$cus,':c'=>$value,':d'=>$down,':e'=>$amount,':f'=>$interest,':g'=>$term,':h'=>$f1,':j'=>$day,':k'=>$date ,':l'=>$c,':m'=>$ins,':ra'=>$rate,':type'=>$type,':regi'=>$regi,':com'=>$comm,':next'=>$date));

header("location: bill.php?id=$a1&vehicle_no=$vehicle_no");


?>