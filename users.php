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
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script> -->
</head>
<body ng-app="MyApp" ng-controller="MyCtrl">
	<?php include 'header.php'; ?>
	<!-- datanya -->
	<div class="" style="margin:60px 10px">
		<fieldset>
			<input type="search" ng-model="s" placeholder="search....">
			<table class="table table-striped" ng-init="dapatkanData()">
				<thead>
					<th>NO</th>
					<th><a href="" ng-click="ord='nama_label'; boolname=!boolname; ordval=boolname">NIK </a></th>
					<th><a href="" ng-click="ord='latitude'; boolname=!boolname; ordval=boolname ">NAMA </a></th>
					<th><a href="" ng-click="ord='longitude'; boolname=!boolname; ordval=boolname ">PASSWORD</a></th>
					<th><a href="" ng-click="ord='lokasi'; boolname=!boolname; ordval=boolname ">JABATAN</a></th>
				</thead>
				<tbody>
					<tr>
						<td></td>
						<td><input type="text" ng-model="odpText.nama_label" maxlength="50"></td>
						<td><input type="text" ng-model="odpText.latitude" maxlength="50"></td>
						<td><input type="text" ng-model="odpText.longitude" maxlength="50"></td>
						<td><select><option>admin</option><option>teknisi</option></select>
						</td>
						<td>
							<input type="submit" class="btn btn-primary" value="SIMPAN" ng-click="simpanData()">
							<!-- <button type="button" class="btn btn-primary" ng-click="simpanData()">tambah</button> -->
						</td>
					</tr>
					<tr ng-repeat="item in (hasil_load = (dataODP | filter:s | orderBy:ord:ordval ))">
						<td>1</td>
						<td>633487</td>
						<td>supeno nugroho</td>
						<td>adaapadenganmu</td>
						<td>teknisi</td>
						<td>
							<input type="submit" class="btn btn-primary" value="UBAH" ng-click="ubah(item,odpText)">
							<input type="submit" class="btn btn-primary" value="HAPUS" ng-click="hapusData(item.nama_label)">
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