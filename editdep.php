<?php  
	$connect = mysqli_connect("localhost", "root", "", "trainning");
	$DID = $_POST["DID"];  
	$text = $_POST["text"];  
	$column_name = $_POST["column_name"];  
	$sql = "UPDATE department SET ".$column_name."='".$text."' WHERE DID='".$DID."'";  
	if(mysqli_query($connect, $sql))  
	{  
		echo 'Data Updated';  
	}  
 ?>