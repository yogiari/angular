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
	<script src="js/angular.js"></script>
	<script src="js/app.js"></script>
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script> -->
</head>
<body ng-app="MyApp" ng-controller="MyCtrl">
	<?php include 'header.php'; ?>
	<!-- datanya -->
	<div class="" style="margin:60px 10px">
		<fieldset>
			<input type="search" ng-model="s" placeholder="search....">
			<table class="table table-striped" ng-init="dapatkanDataOlt()">
				<thead>
					<th>NO</th>
					<th><a href="" ng-click="ord='namaOLT'; boolname=!boolname; ordval=boolname">NAMA LABEL </a></th>
					<th><a href="" ng-click="ord='lat'; boolname=!boolname; ordval=boolname ">LATITUDE </a></th>
					<th><a href="" ng-click="ord='lon'; boolname=!boolname; ordval=boolname ">LONGTITUDE</a></th>
					<th><a href="" ng-click="ord='ipOLT'; boolname=!boolname; ordval=boolname ">IP OLT</a></th>
					<th><a href="" ng-click="ord='lokasi'; boolname=!boolname; ordval=boolname ">LOKASI</a></th>
					<th><a href="" ng-click="ord='keterangan'; boolname=!boolname; ordval=boolname ">KETERANGAN</a></th>
				</thead>
				<tbody>
					<tr>
						<td></td>
						<td><input type="text" ng-model="oltText.namaOLT" maxlength="20"></td>
						<td><input type="text" ng-model="oltText.lat" maxlength="20"></td>
						<td><input type="text" ng-model="oltText.lon" maxlength="20"></td>
						<td><input type="text" ng-model="oltText.ipOLT" maxlength="20"></td>
						<td><input type="text" ng-model="oltText.lokasi" maxlength="50"></td>
						<td><input type="text" ng-model="oltText.keterangan" maxlength="50"></td>
						<td>
							<input type="submit" class="btn btn-primary" value="SIMPAN" ng-click="simpanDataOlt()">
							<!-- <button type="button" class="btn btn-primary" ng-click="simpanData()">tambah</button> -->
						</td>
					</tr>
					<tr ng-repeat="item in (hasil_load = (dataOlt | filter:s | orderBy:ord:ordval ))">
						<td>{{$index + 1}}</td>
						<td>{{item.namaOLT}}</td>
						<td>{{item.lat}}</td>
						<td>{{item.lon}}</td>
						<td>{{item.ipOLT}}</td>
						<td>{{item.lokasi}}</td>
						<td>{{item.keterangan}}</td>
						<td>
							<input type="submit" class="btn btn-primary" value="UBAH" ng-click="ubahOlt(item,oltText)">
							<input type="submit" class="btn btn-primary" value="HAPUS" ng-click="hapusDataOlt(item.id)">
						</td>
					</tr>
				</tbody>
			</table>
			<p ng-if="hasil_load.length == 0">data yang anda cari tidak ada</p>
			<!-- <p>total data  : {{ totalHalaman }}</p> -->
		</fieldset>
	</div>
</body>
</html>