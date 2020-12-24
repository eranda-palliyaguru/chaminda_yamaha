<?php

session_start();

include('connect.php');

$a = $_POST['id_no'];
$b = $_POST['birthday'];
$c = $_POST['cus_name'];
$d = $_POST['phone_no'];
$e = $_POST['address'];
$f =  $_POST['email'];


$a1 = $_POST['id_no1'];
$b1 = $_POST['birthday1'];
$c1 = $_POST['cus_name1'];
$d1 = $_POST['phone_no1'];
$e1 = $_POST['address1'];









// query

$sql = "INSERT INTO lone_customer (name,contact,address,email,birthday,nic,g_name,g_contact,g_address,g_birthday,g_nic) VALUES (:a,:b,:c,:d,:e,:f,:a1,:b1,:c1,:e1,:f1)";

$ql = $db->prepare($sql);

$ql->execute(array(':a'=>$c,':b'=>$d,':c'=>$e,':d'=>$f,':e'=>$b,':f'=>$a,':a1'=>$c1,':b1'=>$d1,':c1'=>$e1,':e1'=>$b1,':f1'=>$a1));

header("location: cus_view.php");





?>