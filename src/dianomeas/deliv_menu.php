<?php
include('../connect_db.php');
session_start();

if(isset($_SESSION['loggedin'])!=true)
{
    header('Location:deliv_login.php');
    exit();
}

if(isset($_POST['sub']))
{
	$time = time();
	$query = mysqli_query($db,"UPDATE deliv SET `current_adr` = '$_POST[current_adr]',`time_1` = $time where username='$_SESSION[username]'");
	echo "<script>window.location.href='deliv_paraggelies.php'</script>";
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
          <li class="selected"><a href="">Έναρξη Βάρδιας</a></li>
		  <li><a href="logout.php?logout">Αποσύνδεση</a></li>
        </ul>
      </div>
    </div>
    <div id="content_header"></div>
    <div id="site_content">
    <div id="content">
		<h2>Πληκτρολογήστε διεύθυνση</h2><hr><br>
		<center>
		<form method="POST">
			<table border="1">
				<tr><td>Διεύθυνση:</td><td><input type="text" id="dest" name="current_adr" required size="50"></td></tr>
				<tr><td colspan="2"><div align="center"><input type="submit" name="sub" value="Αποθήκευση"></td></tr></div>
			</table>
		</form><br>
		<div id="map" style="width:500px;height:400px;"></div>
		</center>
    </div>
    </div>
 </div>
 
 <script>
      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 38.24765, lng: 21.733321},
          zoom: 14
        });
        var card = document.getElementById('pac-card');
        var input = document.getElementById('dest');

        map.controls[google.maps.ControlPosition.TOP_RIGHT].push(card);

        var autocomplete = new google.maps.places.Autocomplete(input);

        autocomplete.bindTo('bounds', map);

        var infowindow = new google.maps.InfoWindow();
        var infowindowContent = document.getElementById('infowindow-content');
        infowindow.setContent(infowindowContent);
        var marker = new google.maps.Marker({
          map: map,
          anchorPoint: new google.maps.Point(0, -29)
        });

        autocomplete.addListener('place_changed', function() {
          infowindow.close();
          marker.setVisible(false);
          var place = autocomplete.getPlace();
          if (!place.geometry) {
            window.alert("Λάθος διεύθυνση");
            return;
          }

          if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
          } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);
          }
          marker.setPosition(place.geometry.location);
          marker.setVisible(true);

          var address = '';
          if (place.address_components) {
            address = [
              (place.address_components[0] && place.address_components[0].short_name || ''),
              (place.address_components[1] && place.address_components[1].short_name || ''),
              (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');
          }

          infowindowContent.children['place-icon'].src = place.icon;
          infowindowContent.children['place-name'].textContent = place.name;
          infowindowContent.children['place-address'].textContent = address;
          infowindow.open(map, marker);
        });
		
        function setupClickListener(id, types) {
          var radioButton = document.getElementById(id);
          radioButton.addEventListener('click', function() {
            autocomplete.setTypes(types);
          });
        }
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAQYGPbuJsmApaHj4dBf3hGpodqWZ9TEfo&libraries=places&callback=initMap"></script>
</body>
</html>
