<?php  
	$connect = mysqli_connect("localhost", "root", "", "trainning");
	$sql = "DELETE FROM company WHERE ID = '".$_POST["ID"]."'";  
	if(mysqli_query($connect, $sql))  
	{  
		echo 'Data Deleted';  
	}  
 ?>