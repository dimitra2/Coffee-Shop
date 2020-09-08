<?php  
 include("../connect_db.php");
 
 session_start();
 
 $kodikos_katastimatos = $_SESSION['id'];
 
 $result = mysqli_query($db, "SELECT * FROM efood where state <> 'delivered' and kwd_kat = $kodikos_katastimatos");  
 
 $from_server= '<div><table><tr><th>Parrag</th><th>Ελληνικός</th><th>Espresso</th> <th>Cappuccino</th><th>Φραπέ</th><th>Φίλτρου</th>
					 <th>Τυρόπιτα</th> <th>Χορτόπιτα</th><th>Τοστ</th><th>Κουλούρι</th><th>Κέικ</th><th>Διεύθυνση</th>
					 <th>Κατάσταση</th><th>Αξία</th></tr>';  
				
      while($row = mysqli_fetch_array($result))  
      {  
           $from_server .= '<tr><td>'.$row["id"].'</td><td>'.$row["ell"].'</td><td>'.$row["esp"].'</td><td>'.$row["cap"].'</td><td>'
		   
		   .$row["fra"].'</td><td>'.$row["fil"].'</td><td>'.$row["tir"].'</td><td>'.$row["xort"].'</td><td>'.$row["tos"].'</td><td>'
		   
		   .$row["kou"].'</td><td>'.$row["kei"].'</td><td>'.$row["address"].'</td><td>'.$row["state"].'</td><td>'
		   
		   .$row["money"].'</td><td></tr>';  
      }  
	  
	$from_server .= '</table>  </div>';  
	
	
	echo $from_server;  
 ?>