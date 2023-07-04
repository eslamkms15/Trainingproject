<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'trainning';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

$CID= $_GET['CID'];
$DID= $_GET['DID'];
$sql = "INSERT INTO registration (CID, DID)
VALUES ('$CID','$DID')";

if ($con->query($sql) === TRUE) {
  echo "تم التسجيل في قسم التدريب في الشركة";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$con->close();
?>