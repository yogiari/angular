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
			<table class="table table-striped" ng-init="dapatkanData()">
				<thead>
					<th>NO</th>
					<th><a href="" ng-click="ord='nama_label'; boolname=!boolname; ordval=boolname">NAMA LABEL </a></th>
					<th><a href="" ng-click="ord='latitude'; boolname=!boolname; ordval=boolname ">LATITUDE </a></th>
					<th><a href="" ng-click="ord='longitude'; boolname=!boolname; ordval=boolname ">LONGTITUDE</a></th>
					<th><a href="" ng-click="ord='lokasi'; boolname=!boolname; ordval=boolname ">LOKASI</a></th>
					<th><a href="" ng-click="ord='distribusi'; boolname=!boolname; ordval=boolname ">DISTRIBUSI</a></th>
					<th><a href="" ng-click="ord='core'; boolname=!boolname; ordval=boolname ">CORE</a></th>
					<th><a href="" ng-click="ord='kapasitas'; boolname=!boolname; ordval=boolname ">KAPASITAS</a></th>
					<!-- <th><a href="" ng-click="ord='keterangan'; boolname=!boolname; ordval=boolname ">KETERANGAN</a></th> -->
				</thead>
				<tbody>
					<tr ng-repeat="item in (hasil_load = (dataODP | filter:s | orderBy:ord:ordval ))">
						<td>{{$index + 1}}</td>
						<td>{{item.nama_label}}</td>
						<td>{{item.latitude}}</td>
						<td>{{item.longitude}}</td>
						<td>{{item.lokasi}}</td>
						<td>{{item.distribusi}}</td>
						<td>{{item.core}}</td>
						<td>{{item.kapasitas}}</td>
						<!-- <td>{{item.keterangan}}</td> -->
						<td>
							<a class="btn btn-primary" href="detailorder.php?r={{item.nama_label}}" ng-click="detailorder(item.nama_label)">ORDER</a>
						</td>
					</tr>
				</tbody>
			</table>
			<p ng-if="hasil_load.length == 0">data yang anda cari tidak ada</p>
			<!-- <p>total data  : {{ totalHalaman }}</p> -->
		</fieldset>
	</div>

  <!-- modal -->
  <!-- <div class="modal fade" id="myModal">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" ng-click="close()" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title"></h4>
          </div>
          <div class="modal-body">
            <p>silahkan isi teknisi</p>

        <form class="form-horizontal" role="form">
          <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Nama Label</label>
            <div class="col-sm-10">
              {{index+1}}
            </div>
          </div>
          <div class="form-group">
            <label for="age" class="col-sm-2 control-label">Age</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" id="inputPassword3" placeholder="Age" ng-model="age">
            </div>
          </div>
        </form>

          </div>
          <div class="modal-footer">
            <button type="button" ng-click="close()" class="btn btn-primary" data-dismiss="modal">OK</button>
            <button type="button" ng-click="cancel()" class="btn">Cancel</button>
          </div>
        </div>
      </div>
  </div> -->
</body>
</html>