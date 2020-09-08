<?php
	include("../connect_db.php");
	session_start();

	if (isset($_GET['exit'])) 
	{
		$query =mysqli_query($db,"SELECT * FROM deliv where username='$_SESSION[username]'");;
		$row = mysqli_fetch_array($query);
		
		$duration = time()-$row['time_1'];
		$duration = $duration /3600;
		
		$profit = 5*$duration + 0.1*$row['distance'];
		$success = mysqli_query($db,"UPDATE deliv SET `profit` = profit + $profit where username='$_SESSION[username]'");
		
		if($success)
		{
			$success2 = mysqli_query($db,"UPDATE deliv SET `distance` = 0 where username='$_SESSION[username]'");
		    echo "<script>window.location.replace('deliv_menu.php')</script>";
		}
		
		exit;
	}
?>