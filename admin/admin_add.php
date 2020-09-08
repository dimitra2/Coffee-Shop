<?php
include('../connect_db.php');
session_start();
?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Καφενείο</title>
    <link href="../css/style.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<style>
		#ellinikos,#espresso,#cappuccino,#frape,#filtrou,#tiropita,#xortopita,#tost,#koulouri,#keik{
			width:135px;
			padding:22px;
			border:none;
		}
	</style>
</head>
<body>
  <div id="main">
    <div id="header">
      <div id="logo">
        <div id="logo_text">
          <h1><a href="">Το <span class="logo_colour"> Καφενείο</span></a></h1>
          <h2>Web Project</h2>
        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
          <li class="selected"><a href="admin_add.php">Καταστήματα</a></li>
		   <li><a href="admin_bank.php">Έγγραφα Τράπεζας</a></li>
          <li><a href="logout.php?logout">Αποσύνδεση</a></li>
        </ul>
      </div>
    </div>
    <div id="content_header"></div>
    <div id="site_content">
    <div id="content">
		<h2>Προσθήκη Καταστήματος</h2><hr><br>
		<form method="POST">
			<table border="1">
				<tr><td>Ονόμα καταστήματος:</td><td><input type="text" name="brand" required></td></tr>
				<tr><td>Διεύθυνση:</td><td><input type="text" name="address"  required></td></tr>
				<tr><td>Latitude:</td><td><input type="text" name="lat"  required></td></tr>
				<tr><td>Longitude:</td><td><input type="text" name="lng"  required></td></tr>
				<tr><td colspan="2"><div align="center"><input type="submit" name="add" value="Αποθήκευση"></td></tr>
			</table>
		</form>
    </div>
    </div>
 </div>
</body>
</html>

<?php

if(isset($_SESSION['loggedin'])!=true)
{
    header('Location:admin_login.php');
    exit();
}

if(isset($_POST['add']))
{
	$query = mysqli_query($db,"INSERT INTO katastima(name,address,lat,lng,tziros)VALUES('$_POST[brand]','$_POST[address]','$_POST[lat]','$_POST[lng]','0')");
	
	if($query==true)
		echo"<script>alert('Επιτυχής Καταχώρηση καταστήματος')</script>";
	else
		echo"<script>alert('Αποτυχημένη Καταχώρηση καταστήματος')</script>";
}
?>