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
	<div class="" style="margin:60px 10px">
		<fieldset>
			<input type="search" ng-model="s" placeholder="search....">
			<table class="table table-striped" ng-init="maintenance()">
				<thead>
				</thead>
				<tbody>
				</tbody>
			</table>
			<p ng-if="hasil_load.length == 0">data yang anda cari tidak ada</p>
		</fieldset>
</body>
</html>