<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Καφενείο</title>
    <link  rel="stylesheet" href="css/style.css">
	<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
</head>
<body>
  <div id="main">
    <div id="header">
      <div id="logo">
        <div id="logo_text">
          <h1><a href="index.php">Το <span class="logo_colour"> Καφενείο</span></a></h1>
          <h2>Web Project</h2>
        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
          <li><a href="admin/admin_login.php" id="admin">Σύνδεση Admin</a></li>
          <li><a href="manager/manager_login.php" id="manager">Σύνδεση Υπεύθυνου</a></li>
          <li><a href="dianomeas/deliv_login.php" id="dianomeas">Σύνδεση Διανομέα</a></li>
		  <li><a href="register.php">Εγγραφή νέου Πελάτη</a></li>
          <li><a href="login.php">Σύνδεση Πελάτη</a></li>
        </ul>
      </div>
    </div>
    <div id="content_header"></div>
    <div id="site_content">
      <div id="content">
        <h1>Καταστήματα</h1>
        <div id="xarths"></div>
      </div>
    </div>
    <div id="content_footer"></div>
  </div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<script>
	
	var shops = [
	['Καφενείο_1','Ερμού 63, Πάτρα','38.246710','21.736210'],
	['Καφενείο_2','Δημ. Γούναρη 106-116, Πάτρα','38.241704','21.736900']
	];	
	
	function initMap()
	{
		var point = new google.maps.LatLng(38.246710, 21.736210);
		var mapLoc = document.getElementById("xarths");
		var mapFeatures = {center: point, zoom: 16};
		var map = new google.maps.Map(mapLoc, mapFeatures);

		createMarkers(map,shops)

		google.maps.event.addListener(marker,'click',function() 
		{
			infowindow.open(map,marker);
		});
	}
	
	function createMarkers(map,shops)
	  {
			var marker, i

			for (i = 0; i < shops.length; i++)
			{
				 var name = shops[i][0]
				 var dieythinsi = shops[i][1]
				 var lat = shops[i][2]
				 var lng = shops[i][3]
				 
				latlng = new google.maps.LatLng(lat, lng);

				var marker = new google.maps.Marker({map: map, title: name , position: latlng});
		   
				var content = "<u>Kαταστημα:</u>" + name +  "<br><u>Διεύθυνση:</u>" + dieythinsi + "<br><u>Συντεταγμενες:</u>" + lat + "," + lng

				var infowindow = new google.maps.InfoWindow()

				google.maps.event.addListener(marker,'click', (function(marker,content,infowindow)
				{
					return function() 
					{
						infowindow.setContent(content);
						infowindow.open(map,marker);
					};
				})(marker,content,infowindow));

			}
	  }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAQYGPbuJsmApaHj4dBf3hGpodqWZ9TEfo&callback=initMap">
</script>
</body>
</html>
