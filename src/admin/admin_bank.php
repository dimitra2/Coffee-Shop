<?php
include('../connect_db.php');
session_start();

if(isset($_SESSION['loggedin'])!=true)
{
    header('Location:admin_login.php');
    exit();
}
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
          <li><a href="admin_add.php">Αποθέματα</a></li>
		   <li class="selected"><a href="admin_bank.php">Έγγραφα Τράπεζας</a></li>
          <li><a href="logout.php?logout">Αποσύνδεση</a></li>
        </ul>
      </div>
    </div>
    <div id="content_header"></div>
    <div id="site_content">
    <div id="content">
		<h2>XML Αρχεία</h2><hr><br>
		<ul>
			<li><a href="manager_account.php">Υπεύθυνος</a></li>
			<li><a href="deliv_account.php">Διανομέας</li>
		</ul>
    </div>
    </div>
 </div>
</body>
</html>
