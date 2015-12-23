<?php


if(isset($_POST['submit'])) 
{
	  include_once 'db_functions.php';
        $db = new DB_Functions();
	$email="test";
	$i=0;
    $regId=array();
	$msg=array();
    $message = $_POST["message"];
     
    include_once './gcm.php';
     
    $gcm = new GCM();
	$c=new DB_Connect();
	$d=$c->connect();
	$res = mysqli_query($d,"SELECT * FROM gcm_users WHERE email = '$email'") or die(mysql_error());
	while ($row = mysqli_fetch_array($res)) {
	$regId[$i] = $row["gcm_regid"];
	$msg[$i]= $message ;
	$i=$i+1;
	}
	for($j=0;$j<sizeof($regId);$j=$j+1)
	{
    $registatoin_ids = array($regId[$j]);
    $message = array("price" => $msg[$j]);
 
    $result = $gcm->send_notification($registatoin_ids, $message);
 
    echo $result;
	}
}
?>