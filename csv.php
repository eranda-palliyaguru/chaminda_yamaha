<?php 

$interest=$_REQUEST['rete'];
$years=$_REQUEST['term'];
$totalLoan=$_REQUEST['amount'];
$ins=$_REQUEST['ins'];
$value=$_REQUEST['value'];
$type=$_REQUEST['type'];

if($type=="1"){$regi=7500+2000;$pra=3;}
if($type=="2"){$regi=6550+3000;$pra=0;}

$value=$value/100;
$value=$value*$pra;
$sr=$ins+$regi+$value;
//$sr=$sr/$years;
$totalLoan=$totalLoan+$sr;
$tmp = pow((1 + ($interest / 1200)), ($years ));
$f= number_format(($totalLoan * $tmp) * ($interest / 1200) / ($tmp - 1),2);
$f = (float) strtr($f, [',' => '',]); 


//$value = number_format($value,2);

//$f=$f+$sr;
$f = number_format($f,0); 

    
echo "වාරිකයක වටිනාකම-  Rs ".$f;
echo "\r\n";
//echo $sr;
//echo $f*$years;


?>
