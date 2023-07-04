	<?php  
$connect = mysqli_connect("localhost", "root", "", "trainning");
$sql = "INSERT INTO department(DID, Max,DName,number,ID) VALUES('".$_POST["DID"]."', '".$_POST["Max"]."','".$_POST["DName"]."','".$_POST["number"]."','".$_POST["ID"]."')";  
if(mysqli_query($connect, $sql))  
{  
     echo 'Data Inserted';  
}  
 ?>