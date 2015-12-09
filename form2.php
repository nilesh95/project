<?php
session_start();
$er=mysqli_connect('mysql.hostinger.in','u760524697_event','webapp2015','u760524697_web');

 if( isset( $_SESSION['name'] ) )
 {
if(isset($_POST['submit']))
{
	$noc=$_POST['noc'];
	$cc=$_POST['cc'];
	$yy=$_POST['yy'];
	$nm=$_SESSION['name'];
	$query="INSERT INTO class_details(email,cname,ccode,year,code) values('$nm','$noc','$cc',$yy,'$nm@$cc.$yy')";
	$search=mysqli_query($er,$query);
	if($search)
	{
		header("location:tindex.php");
	}
}
}
?>
<form action="form2.php" method="POST">
Name Of Course:<input type="text" name="noc">
Course Code:<input type="text" name="cc">
Year:<input type="text" name="yy">
<input type="submit" name="submit">
</form> 