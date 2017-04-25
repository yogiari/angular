<<<<<<< HEAD
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
	<div class="" style="margin:60px 10px">
		<table class="table table-striped" ng-init="dapatkanHistory()">
			<thead>
				<th>NO</th>
				<th><a href="" ng-click="ord='id_tiket'; boolname=!boolname; ordval=boolname">NO TIKET </a></th>
				<th><a href="" ng-click="ord='nama_label'; boolname=!boolname; ordval=boolname">NAMA LABEL </a></th>
				<th><a href="" ng-click="ord='petugas_pelapor'; boolname=!boolname; ordval=boolname ">PETUGAS PELAPOR</a></th>				
				<th><a href="" ng-click="ord='tanggal_lapor'; boolname=!boolname; ordval=boolname ">TANGGAL LAPOR</a></th>
				<th><a href="" ng-click="ord='petugas_maintenance'; boolname=!boolname; ordval=boolname ">PETUGAS MAINTENANCE</a></th>
				<th><a href="" ng-click="ord='tanggal_selesai'; boolname=!boolname; ordval=boolname ">TANGGAL SELESAI</a></th>
				<th><a href="" ng-click="ord='kategori'; boolname=!boolname; ordval=boolname ">KATEGORI SEBAB</a></th>
				<th><a href="" ng-click="ord='keterangan'; boolname=!boolname; ordval=boolname ">KETERANGAN</a></th>
				<!-- <th><a href="" ng-click="ord='gambar'; boolname=!boolname; ordval=boolname ">FOTO</a></th> -->
			</thead>
			<tbody>
				<tr ng-repeat="item in (hasil_load = (dataH | filter:s | orderBy:ord:ordval ))">
					<td>{{$index + 1}}</td>
					<td>{{item.id_tiket}}</td>
					<td>{{item.nama_label}}</td>
					<td>{{item.petugas_pelapor}}</td>					
					<td>{{item.tanggal_lapor}}</td>
					<td>{{item.petugas_maintenance}}</td>
					<td>{{item.tanggal_selesai}}</td>
					<td>{{item.kategori}}</td>
					<td>{{item.keterangan}}</td>
					<!-- <td><img src="{{item.gambar}}" class="img-responsive" alt=""></td> -->
				</tr>
			</tbody>
		</table>
	</div>
</body>
=======
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
	<div class="" style="margin:60px 10px">
		<table class="table table-striped" ng-init="dapatkanHistory()">
			<thead>
				<th>NO</th>
				<th><a href="" ng-click="ord='id_tiket'; boolname=!boolname; ordval=boolname">NO TIKET </a></th>
				<th><a href="" ng-click="ord='nama_label'; boolname=!boolname; ordval=boolname">NAMA LABEL </a></th>
				<th><a href="" ng-click="ord='petugas_pelapor'; boolname=!boolname; ordval=boolname ">PETUGAS PELAPOR</a></th>				
				<th><a href="" ng-click="ord='tanggal_lapor'; boolname=!boolname; ordval=boolname ">TANGGAL LAPOR</a></th>
				<th><a href="" ng-click="ord='petugas_maintenance'; boolname=!boolname; ordval=boolname ">PETUGAS MAINTENANCE</a></th>
				<th><a href="" ng-click="ord='tanggal_selesai'; boolname=!boolname; ordval=boolname ">TANGGAL SELESAI</a></th>
				<th><a href="" ng-click="ord='kategori'; boolname=!boolname; ordval=boolname ">KATEGORI SEBAB</a></th>
				<th><a href="" ng-click="ord='keterangan'; boolname=!boolname; ordval=boolname ">KETERANGAN</a></th>
				<!-- <th><a href="" ng-click="ord='gambar'; boolname=!boolname; ordval=boolname ">FOTO</a></th> -->
			</thead>
			<tbody>
				<tr ng-repeat="item in (hasil_load = (dataH | filter:s | orderBy:ord:ordval ))">
					<td>{{$index + 1}}</td>
					<td>{{item.id_tiket}}</td>
					<td>{{item.nama_label}}</td>
					<td>{{item.petugas_pelapor}}</td>					
					<td>{{item.tanggal_lapor}}</td>
					<td>{{item.petugas_maintenance}}</td>
					<td>{{item.tanggal_selesai}}</td>
					<td>{{item.kategori}}</td>
					<td>{{item.keterangan}}</td>
					<!-- <td><img src="{{item.gambar}}" class="img-responsive" alt=""></td> -->
				</tr>
			</tbody>
		</table>
	</div>
</body>
>>>>>>> 191a45d039c667b0e064c453c45715fe6f8349b8
</html>