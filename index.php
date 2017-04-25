<?php include "/data/koneksi.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<script src='assets/jquery/jquery.min.js'></script>         
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
	<script src="js/angular.js"></script>
	<script src="js/app.js"></script>
	<!-- <title><marquee>managemen optical node geographic info</marquee>/title> -->
	<script>	
    var marker;
      function initialize() {
		  
		// Variabel untuk menyimpan informasi (desc)
		var infoWindow = new google.maps.InfoWindow;
		
		//  Variabel untuk menyimpan peta Roadmap
		var mapOptions = {
          mapTypeId: google.maps.MapTypeId.ROADMAP
        } 
		
		// Pembuatan petanya
		var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
              
        // Variabel untuk menyimpan batas kordinat
		var bounds = new google.maps.LatLngBounds();

		// Pengambilan data dari database
		<?php

			$input_search = @$_POST['inputSearch'];
			$search = @$_POST['search'];
			$mrt = mysqli_query($koneksi,"select * from odp where olt='OLT-MRT'");
			$mip = mysqli_query($koneksi,"select * from odp where olt='OLT-MIP'");
			
			//pencarian
				if ($search) {
					if ($input_search=="") {				
						$query1 = mysqli_query($koneksi,"select * from odp where olt='OLT-MRT'");
						$query2 = mysqli_query($koneksi,"select * from odp where olt='OLT-MIP'");
						//tampilkan olt
						$queri = mysqli_query($koneksi,"select * from olt");
						while ($datas = mysqli_fetch_array($queri))
							{
								$nama = $datas['nama_olt'];
								$lat = $datas['lat'];
								$lon = $datas['lon'];
								$lok = $datas['lokasi'];
								$ip = $datas['ip'];
								
								echo ("addMarkerOlt($lat, $lon, '<b> $nama <br> $ip <br> $lok <br> $lat, $lon');\n");                        
							}

					} else { 
						$query1 = mysqli_query($koneksi,"select * from odp where nama_label like '%$input_search%' and olt='OLT-MRT'");
						$query2 = mysqli_query($koneksi,"select * from odp where nama_label like '%$input_search%'  and olt='OLT-MIP' ");
						$query = mysqli_query($koneksi,"select * from odp where nama_label like '%$input_search%'");
						//$queri = mysqli_query($koneksi,"select * from olt");
					}
				} else {
					$query1 = mysqli_query($koneksi,"select * from odp where olt='OLT-MRT'");
					$query2 = mysqli_query($koneksi,"select * from odp where olt='OLT-MIP'");
					//tampilkan olt
					$queri = mysqli_query($koneksi,"select * from olt");
					while ($datas = mysqli_fetch_array($queri))
					{
						$nama = $datas['nama_olt'];
						$lat = $datas['lat'];
						$lon = $datas['lon'];
						$lok = $datas['lokasi'];
						$ip = $datas['ip'];
						
						echo ("addMarkerOlt($lat, $lon, '<b> $nama <br> $ip <br> $lok <br> $lat, $lon');\n");                        
					}
				}				
			
				//pengambilan data ODP dari DB
				if (mysqli_num_rows($query1)>=1 || mysqli_num_rows($query2)>=1){
					while ($data = mysqli_fetch_array($query1))
					{
						$nama = $data['nama_label'];
						$lat = $data['lat'];
						$lon = $data['lon'];
						$dist = $data['distribusi_core'];
						$lok = $data['lokasi'];
						$ven = $data['vendor'];
						
						echo ("addMarkerMRT($lat, $lon, '<b> $nama <br> $dist <br> $lok <br> $ven <br> $lat, $lon');\n");                        
					}
					while ($data = mysqli_fetch_array($query2))
					{
						$nama = $data['nama_label'];
						$lat = $data['lat'];
						$lon = $data['lon'];
						$dist = $data['distribusi_core'];
						$lok = $data['lokasi'];
						$ven = $data['vendor'];
						
						echo ("addMarkerDLA($lat, $lon, '<b> $nama <br> $dist <br> $lok <br> $ven <br> $lat, $lon');\n");                        
					}
					
				} elseif(mysqli_num_rows($query)>=1) {
					while ($data = mysqli_fetch_array($query))
					{
						$nama = $data['nama_label'];
						$lat = $data['lat'];
						$lon = $data['lon'];
						$dist = $data['distribusi_core'];
						$lok = $data['lokasi'];
						$ven = $data['vendor'];
						
						echo ("addMarkerMRT($lat, $lon, '<b> $nama <br> $dist <br> $lok <br> $ven <br> $lat, $lon');\n");                        
					}	
				} else {
					echo "document.getElementById('map-canvas').innerHTML='<h1>data tidak ada</h1>'";
				}



      ?>
      	//addMarkerOlt(-7.570126,112.48450,'OLT DLANGGU <br> ip=172.23.8.8 <br><a href="facebook.com">fb</a>');

      	function addMarkerOlt(lat, lng, ket) {
			var lokasi = new google.maps.LatLng(lat, lng);
			bounds.extend(lokasi);
			var marker = new google.maps.Marker({
				map: map,
				position: lokasi,
				icon : "img/c.png"
			});       
			map.fitBounds(bounds);
			bindInfoWindow(marker, map, infoWindow, ket);
		 }
		  
		// Proses membuat marker ODP
		function addMarkerMRT(lat, lng, ket) {
			var lokasi = new google.maps.LatLng(lat, lng);
			bounds.extend(lokasi);
			var marker = new google.maps.Marker({
				map: map,
				position: lokasi
				// icon : "img/j.png"
			});       
			map.fitBounds(bounds);
			bindInfoWindow(marker, map, infoWindow, ket);
		 }

		 function addMarkerDLA(lat, lng, ket) {
			var lokasi = new google.maps.LatLng(lat, lng);
			bounds.extend(lokasi);
			var marker = new google.maps.Marker({
				map: map,
				position: lokasi,
				icon : "img/orange-dot.png"
			});       
			map.fitBounds(bounds);
			bindInfoWindow(marker, map, infoWindow, ket);
		 }
		
		// Menampilkan informasi pada masing-masing marker yang diklik
        function bindInfoWindow(marker, map, infoWindow, html) {
          google.maps.event.addListener(marker, 'click', function() {
            infoWindow.setContent(html);
            infoWindow.open(map, marker);
          });
        }
 
        }
      	google.maps.event.addDomListener(window, 'load', initialize);
    
	</script>
</head>
<body onload="initialize()" ng-app="MyApp" ng-controller="MyCtrl" >
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand"></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
        <!-- form search -->
        	<form class="navbar-form navbar-left" role="search" action="" method="POST">
			  <div class="form-group">
			    <input type="search" class="form-control" name="inputSearch" placeholder="cari ODP...">
			  </div>
			  <input type="submit" name="search" value="cari" class="btn btn-success">
			  <div style="color:white">
			  TOTAL MOJOKERTO1 : <?php echo mysqli_num_rows($mrt); ?> , MOJOKERTO2 : <?php echo mysqli_num_rows($mip); ?>
			  </div>
			</form>
			<!-- form login -->
	         <ul class="nav navbar-nav navbar-right">
	            <form action="session.php" method="post" class="navbar-form navbar-left" role="login">
	        		<div class="form-group">
	          			<input type="text" name="user" class="form-control" placeholder="username admin" required="true">
	           			<input type="password" name="pass" class="form-control" placeholder="password admin" required="true">
	        		</div>
	        		<input type="submit" name="login" value="MASUK" class="btn btn-success">
	      		</form>
	      	</ul>
        </div>     
    </div>
</nav>
<div id="map-canvas"></div>
</body>
<!-- style bootstrap jquery map -->
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
<script src='assets/jquery/jquery.min.js'></script>         
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC26jTbusb3apCyzxodwo8btyjasPCmevE&callback=initMap"></script>
<style>
	body{
		width:auto;
		height:100%;
	}
	#map-canvas{
		width:auto;
		height:600px;
		margin-top:57px;
	}
	.header{
		width:auto;
		background:grey;
		height:25px;
	}
	ul li{
		list-style:none;
		display:inline;
		float:right;
	}
	
</style>
</html>
