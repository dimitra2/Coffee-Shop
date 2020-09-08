 <?php
    include('../connect_db.php');
	session_start();

	if(isset($_SESSION['loggedin'])!=true)
	{
		header('Location:manager_login.php');
		exit();
	}
	
	$query = mysqli_query($db,"SELECT * FROM items where id = '$_SESSION[id]'");
	$row = mysqli_fetch_assoc($query);
	
	if(isset($_POST['update']))
	{
		$query2 = mysqli_query($db,"UPDATE items SET `tiropita` = '$_POST[tiropita]',`xortopita` = '$_POST[xortopita]',`tost` = '$_POST[tost]',`koulouri` = '$_POST[koulouri]',`keik` = '$_POST[keik]' where id = '$_SESSION[id]'");
		
		if($query2)
		{
			echo "<script>alert('Eπιτυχής ενημέρωση αποθεμάτων καταστήματος')</script>";
			echo "<script>window.location.href='manager_menu.php'</script>";
		}
		else
			echo "<script>alert('Αποτυχημένη ενημέρωση αποθεμάτων')</script>";
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
          <li class="selected"><a href="manager_menu.php">Αποθέματα</a></li>
		   <li><a href="manager_paraggelies.php">Παραγγελίες</a></li>
          <li><a href="logout.php?logout">Αποσύνδεση</a></li>
        </ul>
      </div>
    </div>
    <div id="content_header"></div>
    <div id="site_content">
	<div id="sidebar_container">
        <div class="sidebar">
          <div class="sidebar_top"></div>
          <div class="sidebar_item">
            <h3>Καλώς όρισες <?php echo $_SESSION['username'] ?></h3>
			<hr><br><br>
          </div>
          <div class="sidebar_base"></div>
        </div>
    </div>
    <div id="content">
		<h2>Έλεγχος αποθεμάτων</h2><br>
		<div>
    </div>

	<br>

    <form action="" method="POST">
    <table border="1">
	  <input type="hidden" name="kwd">
       <tr><td>Προσθέστε Ποσότητα Τυρόπιτας:</td><td><input type="number" name="tiropita" value="<?php echo $row['tiropita'];?>" min="<?php echo $row['tiropita'];?>"></td></tr>
       <tr><td>Προσθέστε Ποσότητα Χορτόπιτας:</td><td><input type="number" name="xortopita" value="<?php echo $row['xortopita'];?>" min="<?php echo $row['xortopita'];?>"></td></tr>
        <tr><td>Προσθέστε Ποσότητα Τοστ:</td><td><input type="number" name="tost" value="<?php echo $row['tost'];?>" min="<?php echo $row['tost'];?>"></td></tr>
        <tr><td>Προσθέστε Ποσότητα Κουλουριού:</td><td><input type="number" name="koulouri" value="<?php echo $row['koulouri'];?>" min="<?php echo $row['koulouri'];?>"></td></tr>
        <tr><td>Προσθέστε Ποσότητα Κέϊκ:</td><td><input type="number" name="keik" value="<?php echo $row['keik'];?>" min="<?php echo $row['keik'];?>"></td></tr>
        <tr><td colspan="2"><div align="center"><input type="submit" name="update" value="Αποθήκευση αλλαγών"></td></tr>
    </table>
	</form>
	
    </div>
    </div>
 </div>
	
</body>
</html>