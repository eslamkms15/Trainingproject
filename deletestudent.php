<?php  
	$connect = mysqli_connect("localhost", "root", "", "trainning");
	$sql = "DELETE FROM accounts WHERE id = '".$_POST["id"]."'";  
	if(mysqli_query($connect, $sql))  
	{  
		echo 'Data Deleted';  
	}  
 ?>