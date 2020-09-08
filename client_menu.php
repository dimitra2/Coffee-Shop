<?php
session_start();
include("connect_db.php");

if(isset($_SESSION['loggedin'])!=true)
{
	header('Location:login.php');
	exit();
}
?>

<!DOCTYPE html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Καφενείο</title>
    <link href="css/style.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<style>
		#ellinikos,#espresso,#cappuccino,#frape,#filtrou,#tiropita,#xortopita,#tost,#koulouri,#keik,
		#ellinikos2,#espresso2,#cappuccino2,#frape2,#filtrou2,#tiropita2,#xortopita2,#tost2,#koulouri2,#keik2
		{
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
          <li class="selected"><a href="">Νέα Παραγγελία</a></li>
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
			<form method="POST" id="myForm" action="">
			<input type="text" name="ell" id="ell" readonly="true" style="width:15px;border:none;" value=" 0"><label>xΕλληνικός</label><br>
			<input type="text" name="esp" id="esp" readonly="true" style="width:15px;border:none;" value=" 0"><label>χEspresso</label><br>
			<input type="text" name="cap" id="cap" readonly="true" style="width:15px;border:none;" value=" 0"><label>xCappuccino</label><br>
			<input type="text" name="fra" id="fra" readonly="true" style="width:15px;border:none;" value=" 0"><label>xΦραπέ</label><br>
			<input type="text" name="fil" id="fil" readonly="true" style="width:15px;border:none;" value=" 0"><label>xΦίλτρου</label><br>
			<input type="text" name="tir" id="tir" readonly="true" style="width:15px;border:none;" value=" 0"><label>xΤυρόπιτα</label><br>
			<input type="text" name="xor" id="xor" readonly="true" style="width:15px;border:none;" value=" 0"><label>xΧορτόπιτα</label><br>
			<input type="text" name="tos" id="tos" readonly="true" style="width:15px;border:none;" value=" 0"><label>xΤοστ</label><br>
			<input type="text" name="kou" id="kou" readonly="true" style="width:15px;border:none;" value=" 0"><label>xΚουλούρι</label><br>
			<input type="text" name="kei" id="kei" readonly="true" style="width:15px;border:none;" value=" 0"><label>xΚέικ</label><br><br>
			<input id="end" type="text" name ="pros" placeholder="Διεύθυνση,Πάτρα" style="width:170px; padding:5px;" required><br><br>
			<select onchange = "selectChanged(this.value)" name="choice" style="width:170px; padding:5px;outline:0;">
				<option value="1">Καφενείο_1</option>
				<option value="2">Καφενείο_2</option>
			</select><br><br>
			<input type="submit" name="butt" id="butt" value="καταχώριση παραγγελίας"><br>
			</form><br>
			<div id="map" style="width:200px;height:150px;"></div>
          </div>
          <div class="sidebar_base"></div>
        </div>
    </div>
    <div id="content">
		<h2>Διάλεξε τα προϊόντα μας</h2><br>
    	<input type="submit" value="+Ελληνικός  1,2€" id="ellinikos" name="ellinikos">
		<input type="submit" value="-Ελληνικός  1,2€" id="ellinikos2" name="ellinikos2">
		
		<input type="submit" value="+Espresso  1,1€" id="espresso" name="espresso">
		<input type="submit" value="-Espresso  1,1€" id="espresso2" name="espresso2"><br>
		
		<input type="submit" value="+Cappuccino  1,5€" id="cappuccino" name="cappuccino">
		<input type="submit" value="-Cappuccino  1,5€" id="cappuccino2" name="cappuccino2">
		
		<input type="submit" value="+Φραπέ  1,5€" id="frape" name="frape">
		<input type="submit" value="-Φραπέ  1,5€" id="frape2" name="frape2"><br>
		
		<input type="submit" value="+Φίλτρου  1,3€" id="filtrou" name="filtrou">
		<input type="submit" value="-Φίλτρου  1,3€" id="filtrou2" name="filtrou2">
		
		<input type="submit" value="+Τιρόπιτα  1,7€" id="tiropita" name="tiropita">
		<input type="submit" value="-Τιρόπιτα  1,7€" id="tiropita2" name="tiropita2"><br>
		
		<input type="submit" value="+Χορτόπιτα  1,8€" id="xortopita" name="xortopita">
		<input type="submit" value="-Χορτόπιτα  1,8€" id="xortopita2" name="xortopita2">
		
		<input type="submit" value="+Τοστ  2€" id="tost" name="tost">
		<input type="submit" value="-Τοστ  2€" id="tost2" name="tost2"><br>
		
		<input type="submit" value="+Κουλούρι  0,5€" id="koulouri" name="koulouri">
		<input type="submit" value="-Κουλούρι  0,5€" id="koulouri2" name="koulouri2">
		
		<input type="submit" value="+Κέικ  2€" id="keik" name="keik">
		<input type="submit" value="-Κέικ  2€" id="keik2" name="keik2"><br>
    </div>
    </div>
 </div>
	
	<script>
		var c1=0,c2=0,c3=0,c4=0,c5=0,c6=0,c7=0,c8=0,c9=0,c10=0;
			$(document).ready(function()
			{
			$("#ellinikos").click(function(){
				c1.innerHTML = c1++;
				$("#ell").val(c1);   
			});
		
			$("#ellinikos2").click(function(){
				c1.innerHTML = c1--;
				if(c1>=0)
					$("#ell").val(c1);   
				else
					c1=0;
			});
			
			$("#espresso").click(function(){
				c2.innerHTML = c2++;
				$("#esp").val(c2);   
			});
			
			$("#espresso2").click(function(){
				c2.innerHTML = c2--;
				if(c2>=0)
				$("#esp").val(c2);  
				else
					c2=0;			
			});
			
			$("#cappuccino").click(function(){
				c3.innerHTML = c3++;
				$("#cap").val(c3);   
			});
			
			$("#cappuccino2").click(function(){
				c3.innerHTML = c3--;
				if(c3>=0)
				$("#cap").val(c3); 
				else
					c3=0;
			});
			
			$("#frape").click(function(){
				c4.innerHTML = c4++;
				$("#fra").val(c4);   
			});
			
			$("#frape2").click(function(){
				c4.innerHTML = c4--;
				if(c4>=0)
				$("#fra").val(c4);  
				else
					c4=0;
			});
			
			$("#filtrou").click(function(){
				c5.innerHTML = c5++;
				$("#fil").val(c5);   
			});
			
			$("#filtrou2").click(function(){
				c5.innerHTML = c5--;
				if(c5>=0)
				$("#fil").val(c5);
				else
					c5=0;
			});
			
			$("#tiropita").click(function(){
				c6.innerHTML = c6++;
				$("#tir").val(c6);   
			});
			
			$("#tiropita2").click(function(){
				c6.innerHTML = c6--;
				if(c6>=0)
				$("#tir").val(c6);  
				else
					c6=0;
			});
			
			$("#xortopita").click(function(){
				c7.innerHTML = c7++;
				$("#xor").val(c7);   
			});
			
			$("#xortopita2").click(function(){
				c7.innerHTML = c7--;
				if(c7>=0)
				$("#xor").val(c7);  
				else
					c7=0;
			});
			
			$("#tost").click(function(){
				c8.innerHTML = c8++;
				$("#tos").val(c8);   
			});
			
			$("#tost2").click(function(){
				c8.innerHTML = c8--;
				if(c8>=0)
				$("#tos").val(c8);   
				else
					c8=0;
			});
			
			$("#koulouri").click(function(){
				c9.innerHTML = c9++;
				$("#kou").val(c9);   
			});
			
			$("#koulouri2").click(function(){
				c9.innerHTML = c9--;
				if(c9>=0)
				$("#kou").val(c9);  
				else
					c9=0;
			});
			
			$("#keik").click(function(){
				c10.innerHTML = c10++;
				$("#kei").val(c10);   
			});
			
			$("#keik2").click(function(){
				c10.innerHTML = c10--;
				if(c10>=0)
				$("#kei").val(c10);   
				else
					c10=0;
			});
			
		});
	 </script>
	
</body>
</html>


<?php
if(isset($_POST['butt']))
{
	$dieuthunsi_pelati = explode(",",$_POST['pros']);
	
	if($dieuthunsi_pelati[1]=="Πάτρα"|| $dieuthunsi_pelati[1]=="ΠΑΤΡΑ" || $dieuthunsi_pelati[1]=="πατρα")
	{
	$query = mysqli_query($db,"SELECT * FROM price");
	$price = mysqli_fetch_assoc($query);
	$money =  $price['ellinikos']*$_POST['ell'] + $price['espresso']*$_POST['esp'] + $price['cappuccino']*$_POST['cap'] + $price['frape']*$_POST['fra'] + $price['filtrou']*$_POST['fil'] +$price['tiropita']*$_POST['tir'] + $price['xortopita']*$_POST['xor'] + $price['tost']*$_POST['tos'] + $price['koulouri']*$_POST['kou'] + $price['keik']*$_POST['kei'];
			
	if($money>0)
	{
		if($res = mysqli_query($db,"INSERT INTO efood(ell,esp,cap,fra,fil,tir,xort,tos,kou,kei,address,state,kwd_kat,money)VALUES('$_POST[ell]','$_POST[esp]','$_POST[cap]','$_POST[fra]','$_POST[fil]','$_POST[tir]','$_POST[xor]','$_POST[tos]','$_POST[kou]','$_POST[kei]','$_POST[pros]','on_its_way','$_POST[choice]',$money)"))
		{
			$query2 = mysqli_query($db,"UPDATE katastima SET tziros = tziros + $money where kwd = '$_POST[choice]'");
			$query3 = mysqli_query($db,"UPDATE items SET `tiropita` = tiropita - '$_POST[tir]',`xortopita` = xortopita - '$_POST[xor]' ,`tost` = tost - '$_POST[tos]',`koulouri` = koulouri - '$_POST[kou]',`keik` = keik - '$_POST[kei]' where id = '$_POST[choice]'");
			
			
		}
		echo"<script>alert('Η παραγγελία σας δόθηκε στο κατάστημα και είναι καθοδόν')</script>";
	}
	else
		echo"<script>alert('Διαλέξτε αγαθό')</script>";
	}
	else
	{
		echo "<script>alert('Η Παραγγελία πρέπει να είναι στην μορφή Διεύθυνση,Πάτρα')</script>";
		echo "<script>window.location.href='client_menu.php'</script>";
	}
}
?>
