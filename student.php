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
<a href="student.php"><i class="fa fa-asterisk fa-fw w3-margin-right w3-text-teal"></i>عرض بيانات الطلاب</a>
<br>
<a href="companesed.php"><i class="fa fa-asterisk fa-fw w3-margin-right w3-text-teal"></i>عرض بيانات الشركات</a>
<br>
<a href="departmented.php"><i class="fa fa-asterisk fa-fw w3-margin-right w3-text-teal"></i>عرض بيانات الاقسام</a>
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
	  <h2>بيانات الطلاب</h2>
<html>  
    <head>  
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    </head>  
    <body>  
        <div class="container">  
            <br />  
            <br />
			<br />
			<div class="table-responsive">  
				<span id="result"></span>
				<div id="live_data"></div>                 
			</div>  
		</div>
    </body>  
</html>  
<script>  
$(document).ready(function(){  
    function fetch_data()  
    {  
        $.ajax({  
            url:"selectstudent.php",  
            method:"POST",  
            success:function(data){  
				$('#live_data').html(data);  
            }  
        });  
    }  
    fetch_data();  
    $(document).on('click', '#btn_add', function(){  
        var username = $('#username').text();  
        var password = $('#password').text(); 
		var email = $('#email').text(); 
		var phone_number = $('#phone_number').text(); 
		
        if(username == '')  
        {  
            alert("ادخل الاسم");  
            return false;  
        }  
        if(password == '')  
        {  
            alert("ادخل الرقم السري");  
            return false;  
        }
		if(email == '')  
        {  
            alert("ادخل البريد الالكتروني");  
            return false;  
        } 
		if(phone_number == '')  
        {  
            alert("ادخل رقم الهاتف");  
            return false;  
        } 
        $.ajax({  
            url:"insertstudent.php",  
            method:"POST",  
            data:{username:username, password:password,email:email,phone_number:phone_number},  
            dataType:"text",  
            success:function(data)  
            {  
                alert(data);  
                fetch_data();  
            }  
        })  
    });  
    
	function edit_data(id, text, column_name)  
    {  
        $.ajax({  
            url:"editstudent.php",  
            method:"POST",  
            data:{id:id, text:text, column_name:column_name},  
            dataType:"text",  
            success:function(data){  
                
				$('#result').html("<div class='alert alert-success'>"+data+"</div>");
            }  
        });  
    }  
    $(document).on('blur', '.username', function(){  
        var id = $(this).data("id1");  
        var username = $(this).text();  
        edit_data(id, username, "username");  
    });  
    $(document).on('blur', '.password', function(){  
        var id = $(this).data("id2");  
        var password = $(this).text();  
        edit_data(id,password, "password");  
    });  
	    $(document).on('blur', '.email', function(){  
        var id = $(this).data("id2");  
        var email = $(this).text();  
        edit_data(id,email, "email");  
    });  
	    $(document).on('blur', '.phone_number', function(){  
        var id = $(this).data("id2");  
        var phone_number = $(this).text();  
        edit_data(id,phone_number, "phone_number");  
    });  
    $(document).on('click', '.btn_delete', function(){  
        var id=$(this).data("id3");  
        if(confirm("Are you sure you want to delete this?"))  
        {  
            $.ajax({  
                url:"deletestudent.php",  
                method:"POST",  
                data:{id:id},  
                dataType:"text",  
                success:function(data){  
                    alert(data);  
                    fetch_data();  
                }  
            });  
        }  
    });  
});  
</script>
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
