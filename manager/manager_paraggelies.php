<?php
    include('../connect_db.php');
	session_start();

	if(isset($_SESSION['loggedin'])!=true)
	{
		header('Location:manager_login.php');
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
          <li><a href="manager_menu.php">Αποθέματα</a></li>
		   <li class="selected"><a href="manager_paraggelies.php">Παραγγελίες</a></li>
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
		<h2>Εκρεμείς Παραγγελίες</h2><br><br>
		<div id="order"></div> <br>
		<script>  
		 $(document).ready(function(){  
			  function show()  
				{  
				   $.ajax({  
						url:"show.php",  
						method:"GET",  
						success:function(data){  
							$('#order').html(data);  
						}  
				   });  
				}  
			  show();  
		});  
		</script>
    </div>
 </div>
 	
</body>
</html>