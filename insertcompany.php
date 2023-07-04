<?php  
$connect = mysqli_connect("localhost", "root", "", "trainning");
$sql = "INSERT INTO company(Name, Address) VALUES('".$_POST["Name"]."', '".$_POST["Address"]."')";  
if(mysqli_query($connect, $sql))  
{  
     echo 'Data Inserted';  
}  
 ?>