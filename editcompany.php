<?php  
	$connect = mysqli_connect("localhost", "root", "", "trainning");
	$ID = $_POST["ID"];  
	$text = $_POST["text"];  
	$column_name = $_POST["column_name"];  
	$sql = "UPDATE company SET ".$column_name."='".$text."' WHERE ID='".$ID."'";  
	if(mysqli_query($connect, $sql))  
	{  
		echo 'Data Updated';  
	}  
 ?>