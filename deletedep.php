<?php  
	$connect = mysqli_connect("localhost", "root", "", "trainning");
	$sql = "DELETE FROM department WHERE DID = '".$_POST["DID"]."'";  
	if(mysqli_query($connect, $sql))  
	{  
		echo 'Data Deleted';  
	}  
 ?>