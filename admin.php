<?php 
	session_start(); 
	include 'ceksession.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>MAP ODP</title>
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<script src='assets/jquery/jquery.min.js'></script>         
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script> -->
	<script src="js/angular.js"></script>
	<script src="js/app.js"></script>
	<script src="js/dirPagination.js"></script>
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script> -->
</head>
<body ng-app="MyApp" ng-controller="MyCtrl">
	<?php include 'header.php'; ?>
	<!-- datanya -->
	<div class="container" style="margin:60px 10px">
		<fieldset>
			<table class="table table-center">
				<tr>
					<td><input type="search" ng-model="s" placeholder="search...."></td>
					<td><p>JUMLAH DATA TOTAL : {{dataODP.length}}</p>
						<p>JUMLAH DATA MOJOKERTO 1 : {{(dataODP| filter: {"olt": "OLT-MRT"}).length}} </p>
						<p>JUMLAH DATA MOJOKERTO 2 : {{(dataODP| filter: {"olt": "OLT-MIP"}).length}} </p>
					</td>
					<td><i>Input dari data File xls anda: *note hanya ms.excel 2007 kebawah </i>
						<form enctype='multipart/form-data' action='data/upload-file.php' method='post' ">
						<input type='file' name='filename' size='100'> 
						<input type='submit' name='submit' value='Upload'></form>
					</td>
				</tr>
			</table>
			<table class="table table-striped" ng-init="dapatkanData()">
				<thead>
					<th>NO</th>
					<th><a href="" ng-click="ord='nama_label'; boolname=!boolname; ordval=boolname">NAMA LABEL </a></th>
					<th><a href="" ng-click="ord='nama_frame'; boolname=!boolname; ordval=boolname">NAMA FRAME </a></th>
					<th><a href="" ng-click="ord='lat'; boolname=!boolname; ordval=boolname ">LATITUDE </a></th>
					<th><a href="" ng-click="ord='lon'; boolname=!boolname; ordval=boolname ">LONGTITUDE</a></th>
					<th><a href="" ng-click="ord='distribusi_core'; boolname=!boolname; ordval=boolname ">DISTRIBUSI CORE</a></th>
					<th><a href="" ng-click="ord='olt'; boolname=!boolname; ordval=boolname ">OLT</a></th>
					<th><a href="" ng-click="ord='lokasi'; boolname=!boolname; ordval=boolname ">LOKASI</a></th>
					<th><a href="" ng-click="ord='vendor'; boolname=!boolname; ordval=boolname ">VENDOR </a></th>
					<th><a href="" ng-click="ord='tglUT'; boolname=!boolname; ordval=boolname ">TANGGAL UJI TERIMA</a></th>
				</thead>
				<tbody>
					<tr>
						<td></td>
						<td><input type="text" ng-model="odpText.nama_label" maxlength="20"></td>
						<td>
							<select ng-model="odpText.nama_frame" maxlength="20">
							<option ng-repeat="item in dataFrame" value="{{item.nama_frame}}">{{item.id_frame_odp}},{{item.nama_frame}}</option>
							</select>
						</td>	
						<td><input type="number" ng-model="odpText.lat" maxlength="20"></td>
						<td><input type="number" ng-model="odpText.lon" maxlength="20"></td>
						<td><input type="text" ng-model="odpText.distribusi_core" style="width:40px"></td>
						<td><select ng-model="odpText.olt"><option value="olt-mrt">OLT-MRT</option><option value="olt-mip">OLT-MIP</option></select></td>
						<td><input type="text" ng-model="odpText.lokasi" maxlength="50"></td>
						<td><input type="text" ng-model="odpText.vendor" maxlength="20"></td>
						<td><input type="date" ng-model="odpText.tglUT" maxlength="20"></td>
						<td>
							<input type="submit" class="btn btn-primary" value="SIMPAN" ng-click="simpanData()">
							<!-- <button type="button" class="btn btn-primary" ng-click="simpanData()">tambah</button> -->
						</td>
					</tr>
					<tr dir-paginate="item in dataODP | filter:s | orderBy:ord:ordval | itemsPerPage:5">
						<td>{{item.no}}</td>
						<td>{{item.nama_label}}</td>
						<td>{{item.nama_frame}}</td>
						<td>{{item.lat}}</td>
						<td>{{item.lon}}</td>
						<td>{{item.distribusi_core}}</td>
						<td>{{item.olt}}</td>
						<td>{{item.lokasi}}</td>
						<td>{{item.vendor}}</td>
						<td>{{item.tanggal_uji_terima}}</td>
						<td>
							<input type="submit" class="btn btn-primary" value="UBAH" ng-click="ubah(item,odpText)">
							<input type="submit" class="btn btn-primary" value="HAPUS" ng-click="hapusData(item.nama_label)">
						</td>
					</tr>
				</tbody>
			</table>
			<p ng-if="hasil_load.length == 0">data yang anda cari tidak ada</p>
			<!-- <p>total data  : {{ totalHalaman }}</p> -->
			<dir-pagination-controls
				max-size="0"
				direction-links="true"
				boundary-links="true" >
			</dir-pagination-controls>
		</fieldset>
	</div>
</body>
</html>