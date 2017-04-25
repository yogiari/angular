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
	<div class="" style="margin:60px 10px">
		<fieldset>
			<table class="table table-striped" ng-init="dapatkanDataUser()">
				<thead>
					<th>NO</th>
					<th><a href="" ng-click="ord='nik'; boolname=!boolname; ordval=boolname">NIK </a></th>
					<th><a href="" ng-click="ord='nama'; boolname=!boolname; ordval=boolname">NAMA </a></th>
					<th><a href="" ng-click="ord='alamat'; boolname=!boolname; ordval=boolname ">ALAMAT </a></th>
					<th><a href="" ng-click="ord='no_hp'; boolname=!boolname; ordval=boolname ">NO TELP/HP</a></th>
					<th><a href="" ng-click="ord='password'; boolname=!boolname; ordval=boolname ">PASSWORD</a></th>
					<th><a href="" ng-click="ord='jabatan'; boolname=!boolname; ordval=boolname ">LEVEL/JABATAN</a></th>
					<th><a href="" ng-click="ord='foto'; boolname=!boolname; ordval=boolname ">FOTO</a></th>
				</thead>
				<tbody>
					<tr>
						<td></td>
						<!-- <td><input type="text" ng-model="userText.nik"></td> -->
						<td><input type="text" ng-model="userText.nik" name="nik"></td>
						<td><input type="text" ng-model="userText.nama" name="nama"></td>
						<td><input type="text" ng-model="userText.alamat" name="alamat"></td>
						<td><input type="text" ng-model="userText.no_hp" name="no_hp"></td>
						<td><input type="text" ng-model="userText.password" name="password"></td>
						<td>
							<select ng-model="userText.jabatan" name="jabatan">
							<option ng-repeat="item in jabatan" value="{{item.id_jabatan}}">{{item.id_jabatan}},{{item.nama_jabatan}}</option>
							</select>
						</td>	
						<!-- <td><input type="file" file-model="file" ng-model="userText.foto"></td> -->
						<td><input type="file" file-input="files" ng-model="userText.foto"></td>
						<td>
							<input type="submit" class="btn btn-primary" value="SIMPAN" ng-click="simpanDataUser()">
							<!-- <input type="submit" class="btn btn-primary" value="SIMPAN" ng-click="uploadFile()"> -->
						</td>
					</tr>
					<tr dir-paginate="item in user | filter:s | orderBy:ord:ordval | itemsPerPage:5">
						<td>{{item.no}}</td>
						<td>{{item.nik}}</td>
						<td>{{item.nama}}</td>
						<td>{{item.alamat}}</td>
						<td>{{item.no_hp}}</td>
						<td>{{item.password}}</td>
						<td>{{item.jabatan}}</td>
						<td><img style="width: 150px;height: 150px" src="./upload/{{item.foto}}"/></td>
						<td>
							<input type="submit" class="btn btn-primary" value="UBAH" ng-click="ubahUser(item,odpText)">
							<input type="submit" class="btn btn-primary" value="HAPUS" ng-click="hapusDataUser(item.nik)">
						</td>
					</tr>
				</tbody>
			</table>
			<p ng-if="hasil_load.length == 0">data yang anda cari tidak ada</p>
			<dir-pagination-controls
				max-size="0"
				direction-links="true"
				boundary-links="true" >
			</dir-pagination-controls>
		</fieldset> 

	<!-- <div class="file-upload">
        <input type="text" ng-model="name">
        <input type="file" file-model="myFile"/>
        <button ng-click="uploadFile()">upload me</button>
    </div> -->


	</div>
</body>
</html>