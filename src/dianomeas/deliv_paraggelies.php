<?php
include('../connect_db.php');
session_start();

if(isset($_SESSION['loggedin'])!=true)
{
    header('Location:deliv_login.php');
    exit();
}

$query =mysqli_query($db,"SELECT * FROM efood where state='on_its_way'");

if(isset($_POST['sub1']))
{
	$query3 =mysqli_query($db,"SELECT * FROM efood where id='$_POST[num]' AND state='on_its_way'");
	$res = mysqli_fetch_array($query3);
	
	$query4 =mysqli_query($db,"SELECT * FROM deliv where username='$_SESSION[username]'");
	$res2 = mysqli_fetch_array($query4);
	
	
	$from = $res2['current_adr'];
	$to = $res['address'];
	
	$time = 0;
	$from = urlencode($from);
	$to = urlencode($to);
	$data = file_get_contents("http://maps.googleapis.com/maps/api/distancematrix/json?origins=$from&destinations=$to&language=en-EN&sensor=false");
	$data = json_decode($data);
	
	$distance = 0;
	error_reporting(0);
	
	foreach($data->rows[0]->elements as $road) 
	{
		$time += $road->duration->value;
		$distance += $road->distance->value;
	}
	
	
	$distance2 = $distance/1000;
	
	$query2 = mysqli_query($db,"UPDATE efood SET `state` = 'delivered' where id='$_POST[num]'");
	
	$query5 = mysqli_query($db,"UPDATE deliv SET `distance` = distance + '$distance2', `current_adr`='$res[address]' where username='$_SESSION[username]'");
	
	 echo "<script>window.location.replace('deliv_paraggelies.php')</script>";
}

?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Καφενείο</title>
    <link href="../css/style.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
		<li class="selected"><a href="">Παράδοση</a></li>
		<li><a href="exit.php?exit">Έξοδος</a></li>
        </ul>
      </div>
    </div>
    <div id="content_header"></div>
    <div id="site_content">
    <div id="content">
		<h2>Παραγγελίες</h2><hr><br>   
		<table border='2'>
			<tr><th>id</th><th>ελλην.</th><th>εσπρέσσο</th><th>καπουτσίνο</th><th>φραπέ</th><th>φίλτρου</th><th>τυρόπιτα</th><th>χορτόπιτα</th><th>τόστ</th><th>κουλούρια</th><th>κεικ</th><th>διεύθυνση</th><th>κατάσταση</th><th>shop</th><th>αξία</th></tr>
			<?php
				
				while($row = mysqli_fetch_assoc($query)) 
				{
					
					echo "<tr><td>$row[id]</td><td>$row[ell]</td><td>$row[esp]</td><td>$row[cap]</td><td>$row[fra]</td><td>$row[fil]</td><td>$row[tir]</td><td>$row[xort]</td><td>$row[tos]</td><td>$row[kou]</td><td>$row[kei]</td><td>$row[address]</td><td>$row[state]</td><td>$row[kwd_kat]</td><td>$row[money] €</td></tr>";
				}
			?>
		</table><hr><br>
		<center>
		<form method="POST">
			<table border="1">
				<tr><td>Κωδικός Παραγγελίας:</td><td><input type="text" id="num" name="num" required></td></tr>
				<tr><td colspan="2"><div align="center"><input type="submit" id="sub1" name="sub1" value="Επιβεβαίωση"></td></tr></div>
			</table>
		</form><br>
		</center>
    </div>
    </div>
</body>
</html>
