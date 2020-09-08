
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type = "text/javascript" src = "http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
		<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
		<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
		<title>Καφενείο</title>
		<link href="css/style.css" rel="stylesheet">
		<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
	</head>1
	
	<body>
	
  <div id="main">
    <div id="header">
      <div id="logo">
        <div id="logo_text">
          <h1><a href="index.php">Το <span class="logo_colour"> Καφενείο</span></a></h1>
          <h2>Web Project</h2>

        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
          <li><a href="admin/admin_login.php" id="admin">Σύνδεση Admin</a></li>
          <li><a href="manager/manager_login.php" id="manager">Σύνδεση Υπεύθυνου</a></li>
          <li><a href="dianomeas/deliv_login.php" id="dianomeas">Σύνδεση Διανομέα</a></li>
		  <li class="selected"><a href="register.php">Εγγραφή Χρήστη</a></li>
          <li><a href="login.php">Σύνδεση Χρήστη</a></li>
        </ul>
      </div>
    </div>
    <div id="content_header"></div>
    <div id="site_content"><center>
	<div>
        <div class="sidebar_top"></div>
        <div class="sidebar_item searchForm">
          <h3>Στοιχεία Χρήστη</div></h3>
          <form method="POST" action="">
            <p>
              Username :&nbsp;&nbsp;<input class="search" type="text" name="username"/>
              <br><br> Password :&nbsp;&nbsp;&nbsp;<input class="search" type="password" name="password" required/>
			  <br><br> Όνομα :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="search" type="text" name="name" required/>
			  <br><br> E-mail :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="search" type="email" name="email" required/>
			  <br><br> Διεύθυνση :&nbsp;<input class="search" type="text" name="address" required/>
			  <br><br> Τηλέφωνο :&nbsp;&nbsp;<input class="search" type="text" id="phone" name="phone" value="" required/>
            </p>
            <p style="padding-top: 15px"><input class="myButton" type="submit" name="submit" value="Kαταχώριση" /></p>
          </form>
        </div>
      </div></center>
    </div>
  
</body>
</html>	

<?php
	session_start();
	include("connect_db.php");
	
	if(isset($_POST['submit']))
	{		
		
		$query = "INSERT INTO client(username, password, name, email, address, phone) VALUES('$_POST[username]', '$_POST[password]', '$_POST[name]', '$_POST[email]', '$_POST[address]', '$_POST[phone]')";
		$result = mysqli_query($db,$query);
		
		if($result==true)
		{
			echo"<script>alert('Συγχαρητήρια, ολοκληρώσατε την εγγραφή σας')</script>";
			echo "<script>window.location.replace('index.php')</script>";
		}
		else
		{
			echo"<script>alert('Το username υπάρχει ήδη, δώστε ενα αλλο!')</script>";
		}
	}
?>