<?php  
$connect = mysqli_connect("localhost", "root", "", "trainning");
$sql = "INSERT INTO accounts(username, password,email,type,phone_number) VALUES('".$_POST["username"]."', '".$_POST["password"]."','".$_POST["email"]."','طالب','".$_POST["phone_number"]."')";  
if(mysqli_query($connect, $sql))  
{  
     echo 'Data Inserted';  
}  
 ?>