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
	<?php include 'header.php' ?>
	<!-- datanya -->
	<div class="" style="margin:60px 10px">
		<div class="centered" style="margin: auto; max-width: 500px;" ng-init="dapatkanDataMaintenance()">
				<!-- <p ng-repeat="item in maintain">{{item.nik}},{{item.nama}}</p>
				<p ng-repeat="o in okupansi">{{o.nik_petugas}},{{o.id_frame_odp}}</p> -->
			<table class="table table-center">
				<thead>
					<th> NO </th>
					<th><a href="" ng-click="ord='nama_label'; boolname=!boolname; ordval=boolname"> PETUGAS </a></th>
					<th><a href="" ng-click="ord='nama_frame'; boolname=!boolname; ordval=boolname"> FRAME ODP </a></th>
				</thead>
				<tbody>
					<tr>
						<td><input type="hidden" ng-model="maintenanceText.id_okupansi"/></td>
						<td>
							<select ng-model="maintenanceText.nik">
							<option ng-repeat="item in maintain" value="{{item.nik}}">{{item.nik}} || {{item.nama}}</option>
							</select>
						</td>
						<td>
							<select ng-model="maintenanceText.id_frame_odp">
							<option ng-repeat="item in dataFrame" value="{{item.id_frame_odp}}">{{item.id_frame_odp}} || {{item.nama_frame}}</option>
							</select>
						</td>	
						<td>
							<input type="submit" class="btn btn-primary" value="SIMPAN" ng-click="simpanDataMaintenance()">
							<!-- <button type="button" class="btn btn-primary" ng-click="simpanData()">tambah</button> -->
						</td>
					</tr>
					<!--<tr ng-repeat="item in (hasil_load = (okupansi | filter:s | orderBy:ord:ordval ))">-->
					<tr dir-paginate="item in okupansi | filter:s | orderBy:ord:ordval | itemsPerPage:5">
						<td>{{item.no}}</td>
						<td><input type="hidden" value="{{item.id_okupansi}}"/>{{item.nama}}</td>
						<td>{{item.nama_frame}}</td>
						<td>
							<input type="submit" class="btn btn-primary" value="UBAH" ng-click="ubahMaintenance(item,maintenanceText)">
							<input type="submit" class="btn btn-primary" value="HAPUS" ng-click="hapusDataMaintenance(item.id_okupansi)">
						</td>
					</tr>
				</tbody>
			</table>
			<!--pagination kontrol-->
					<dir-pagination-controls
					   max-size="100"
					   direction-links="true"
					   boundary-links="true" >
					</dir-pagination-controls>
		</div>
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
	<?php include 'header.php' ?>
	<!-- datanya -->
	<div class="" style="margin:60px 10px">
		<div class="centered" style="margin: auto; max-width: 500px;" ng-init="dapatkanDataMaintenance()">
				<!-- <p ng-repeat="item in maintain">{{item.nik}},{{item.nama}}</p>
				<p ng-repeat="o in okupansi">{{o.nik_petugas}},{{o.id_frame_odp}}</p> -->
			<table class="table table-center">
				<thead>
					<th> NO </th>
					<th><a href="" ng-click="ord='nama_label'; boolname=!boolname; ordval=boolname"> PETUGAS </a></th>
					<th><a href="" ng-click="ord='nama_frame'; boolname=!boolname; ordval=boolname"> FRAME ODP </a></th>
				</thead>
				<tbody>
					<tr>
						<td><input type="hidden" ng-model="maintenanceText.id_okupansi"/></td>
						<td>
							<select ng-model="maintenanceText.nik">
							<option ng-repeat="item in maintain" value="{{item.nik}}">{{item.nik}} || {{item.nama}}</option>
							</select>
						</td>
						<td>
							<select ng-model="maintenanceText.id_frame_odp">
							<option ng-repeat="item in dataFrame" value="{{item.id_frame_odp}}">{{item.id_frame_odp}} || {{item.nama_frame}}</option>
							</select>
						</td>	
						<td>
							<input type="submit" class="btn btn-primary" value="SIMPAN" ng-click="simpanDataMaintenance()">
							<!-- <button type="button" class="btn btn-primary" ng-click="simpanData()">tambah</button> -->
						</td>
					</tr>
					<!--<tr ng-repeat="item in (hasil_load = (okupansi | filter:s | orderBy:ord:ordval ))">-->
					<tr dir-paginate="item in okupansi | filter:s | orderBy:ord:ordval | itemsPerPage:5">
						<td>{{item.no}}</td>
						<td><input type="hidden" value="{{item.id_okupansi}}"/>{{item.nama}}</td>
						<td>{{item.nama_frame}}</td>
						<td>
							<input type="submit" class="btn btn-primary" value="UBAH" ng-click="ubahMaintenance(item,maintenanceText)">
							<input type="submit" class="btn btn-primary" value="HAPUS" ng-click="hapusDataMaintenance(item.id_okupansi)">
						</td>
					</tr>
				</tbody>
			</table>
			<!--pagination kontrol-->
					<dir-pagination-controls
					   max-size="100"
					   direction-links="true"
					   boundary-links="true" >
					</dir-pagination-controls>
		</div>
	</div>
</body>
>>>>>>> 191a45d039c667b0e064c453c45715fe6f8349b8
</html>