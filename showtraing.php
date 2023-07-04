<?php
// We need to use sessions, so you should always start sessions using the below code.
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
// We don't have the password or email info stored in sessions, so instead, we can get the results from the database.
$stmt = $con->prepare('SELECT password, email,type,phone_number FROM accounts WHERE id = ?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $_SESSION['Cid']);
$stmt->execute();
$stmt->bind_result($password, $email,$type,$phone_number);
$stmt->fetch();
$stmt->close();
?>
<!DOCTYPE html>
<html>
<head>
<title>منظومة التدريب المياداني</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5,h6 {font-family: "Roboto", sans-serif}
</style>
</head>
<body class="w3-light-grey">

<!-- Page Container -->
<div class="w3-content w3-margin-top" style="max-width:1400px;">

  <!-- The Grid -->
  <div class="w3-row-padding">
  
    <!-- Left Column -->
    <div class="w3-third">
    
      <div class="w3-white w3-text-grey w3-card-4">
        
         <div class="w3-container">
          <h3><i class="fa fa-briefcase fa-fw w3-margin-right w3-large w3-text-teal"></i><?=$_SESSION['name']?></h3>
          <h3><i class="fa fa-home fa-fw w3-margin-right w3-large w3-text-teal"></i><?=$type?></h3>
          <h3><i class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-teal"></i><?=$email?></h3>
          <h3><i class="fa fa-phone fa-fw w3-margin-right w3-large w3-text-teal"></i><?=$phone_number?></h3>
          <hr>
<a href="Company.php"><i class="fa fa-asterisk fa-fw w3-margin-right w3-text-teal"></i>التسجيل في شركة تدريب</a>
<br>
<a href="addtrainngd.php"><i class="fa fa-asterisk fa-fw w3-margin-right w3-text-teal"></i>اضافة بيانات تدريب</a>
<br>
<a href="showtraing.php"><i class="fa fa-asterisk fa-fw w3-margin-right w3-text-teal"></i>عرض سجلات التدريب</a>
<br>
<a href="conco.php"><i class="fa fa-asterisk fa-fw w3-margin-right w3-text-teal"></i>عرض خلاصة التدريب</a>
<br>
<a href="logout.php"><i class="fa fa-asterisk fa-fw w3-margin-right w3-text-teal"></i>تسجيل الخروج</a>
<br>
   
        </div>
		
      </div><br>

    <!-- End Left Column -->
    </div>

    <!-- Right Column -->
    <div class="w3-twothird">
    
      <div class="w3-container w3-card w3-white w3-margin-bottom">
        <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-suitcase fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>اهلا بك <?=$_SESSION['name']?></h2>
      </div>

<?php 



  $con = mysqli_connect("localhost","root","","trainning");

$stuID=$_SESSION['Cid']; 
  if(!$con){
    die("Connection Error");
  }
    global $con;
    $query = "select * from registration where CID ='$stuID'";
    $result = mysqli_query($con,$query);
    



?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
 <style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
  font-size:22px
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
 
</head>
<body class="bg-dark">
    <div class="container">
      <div class="row mt-5">
        <div class="col">
          <div class="card mt-5">
            <div class="card-header">
              <h2 class="display-6 text-center">بيانات التدريب</h2>
            </div>
            <div class="card-body">
              <table id="customers">
                <tr class="bg-dark text-white">
                  <td> المهام التي قمت بها </td>
                  <td> عدد الساعات </td>
                  
                  
                  <td> - </td>
                </tr>
                <tr>
                <?php 

                  while($row = mysqli_fetch_assoc($result))
                  {
					    
						
                ?>
                  <td><?php echo $row['details']; ?></td>
                  <td><?php echo $row['hours']; ?></td>
                  
                 
				                   
                </tr>
                <?php    
                  }
                
                ?>
                
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
</body>
</html>
    <!-- End Right Column -->
    </div>
    
  <!-- End Grid -->
  </div>
  
  <!-- End Page Container -->
</div>

<footer class="w3-container w3-teal w3-center w3-margin-top">
  <p>تواصل معنا علي مواقع التواصل الاجتماعي</p>
  <i class="fa fa-facebook-official w3-hover-opacity"></i>
  <i class="fa fa-instagram w3-hover-opacity"></i>
  <i class="fa fa-snapchat w3-hover-opacity"></i>
  <i class="fa fa-pinterest-p w3-hover-opacity"></i>
  <i class="fa fa-twitter w3-hover-opacity"></i>
  <i class="fa fa-linkedin w3-hover-opacity"></i>
 
</footer>

</body>
</html>
