<?php
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'trainning';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
if(isset($_POST['submit']))
{    
     $details = $_POST['details'];
     $hours = $_POST['hours'];
	 $stuid = $_SESSION['Cid'];
     $sql = " UPDATE registration SET details = '$details', hours = '$hours' WHERE CID ='$stuid' ";
     if (mysqli_query($con, $sql)) {
        echo "تم اضافة بيانات التدريب";
		header("Location:home.php");
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
     }
     mysqli_close($con);
}
?>