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
	<link href="../css/mystyle.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
</head>
<body>
  <div id="main">
    <div id="header">
      <div id="logo">
        <div id="logo_text">
          <h1><a href="../index.php">Το <span class="logo_colour"> Καφενείο</span></a></h1>
          <h2>Web Project</h2>
        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
          <li class="selected"><a href="admin_login.php" id="admin">Σύνδεση Admin</a></li>
          <li><a href="../manager/manager_login.php" id="manager">Σύνδεση Υπεύθυνου</a></li>
          <li><a href="../dianomeas/deliv_login.php" id="dianomeas">Σύνδεση Διανομέα</a></li>
		  <li><a href="../register.php">Εγγραφή Χρήστη</a></li>
          <li><a href="../login.php">Σύνδεση Χρήστη</a></li>
        </ul>
      </div>
    </div>
    <div id="content_header"></div>
    <div id="site_content">
      <div id="content">
        <h1 style="text-align:center;margin-top:80px;">Login - Register</h1>
			<form class="login" method="POST">
				<input type="text" placeholder="Username" id="username" name="username" required>  
				<input type="password" placeholder="Password" id="password" name="password" required>  
				<input type="submit" value="Sign In" id="submit" name="submit">
			</form>
      </div>
    </div>
    <div id="content_footer"></div>
  </div>
</body>
</html>

<?php
	if(isset($_POST['submit']))
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		$query =mysqli_query($db,"SELECT * FROM admin WHERE username='$username' AND password= '$password' " );
	
	if($row = mysqli_fetch_array( $query))
	{
		$_SESSION['loggedin'] = true;
		$_SESSION['username'] = $row['username'];
			
		echo "<script>alert('Eπιτυχής σύνδεση admin')</script>";
		echo "<script>window.location.href='admin_add.php'</script>";
	}
	else
			echo "<script>javascript:alert('Λάθος στοιχεία admin')</script>";
	} 
?>