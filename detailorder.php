<?php 
    session_start(); 
    include 'ceksession.php';
	include 'data/koneksi.php';
	
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
	<script type="text/javascript">
		function autofill(){
			// var o = $('#o').val();
			// alert(o);
			var o = $('#o').val();
			var b = $.ajax({
				url : 'search.php',
				data : 'o='+o
			}).success(function(data){
				var json = data,
				obj = JSON.parse(json);
				$('#teknisi').val(obj.teknisi);
				$('#pelapor').val(obj.pelapor);
				// console.log(obj);
			});
			// console.log();	
		}
	</script>
</head>
<body ng-app="MyApp" ng-controller="MyCtrl">
	<?php include 'header.php'; ?>
	<div class="" style="margin:60px 10px;">	
		<div class="centered" style="margin: auto; max-width: 500px;">
			<table class="table">
				<tr>
					<td>
						PILIH ODP
					</td>
					<td>
						<!-- <input type="text" name="o" id="o" onkeyup="autofill()"> -->
						<input ng-model='orderText.id' type="text" list="odp" placeholder="search odp" size="50" id="o" oninput="autofill()" name="o">
						<datalist id="odp">
						<?php 
							$qry=mysqli_query($koneksi,"SELECT * FROM odp");
							while ($t=mysqli_fetch_array($qry)) {
								echo "<option name='odp' id='odp' value='$t[id]'>$t[nama_label]</option>";
							};
						?>
						</datalist>
					</td>
				</tr>
				<tr>
					<td>TEKNISI</td>
					<td>
						<input ng-model="orderText.teknisi" type="text" name="teknisi" id="teknisi" disabled>
					</td>
				</tr>
				<tr>
					<td>PELAPOR</td>
					<td>
						<input ng-model="orderText.pelapor" type="text" name="pelapor" id="pelapor" disabled>
					</td>
				</tr>
				<tr>
					<!-- <td>
						KATEGORI KERUSAKAN
					</td>
					<td>	
						<select ng-model="orderText.kategori">
							<?php 
							// $qr=mysqli_query($koneksi,"SELECT * FROM kategori");
							// while ($a=mysqli_fetch_array($qr)) {
							// 	echo "<option name='list' id='list' value='$a[id_kategori]'>$a[nama_kategori]</option>";
							// }
							?>
						</select>
					</td> -->
				</tr>
				<tr>
					<td>KETERANGAN</td>
					<td>
						<textarea ng-model='orderText.keterangan' placeholder="tambahkan keterangan jika ada" style="width: 380px;height: 100px;"></textarea>
					</td>
				</tr>
				<tr>
					<td>
						<!-- <input type="submit" class="btn btn-primary" value="SIMPAN" ng-click="simpanData()"> -->
						<button type="button" class="btn btn-primary" ng-click="simpanOrder()">SIMPAN</button>
					</td>
				</tr>
			</table>
		  </div>
		</div>
	</div>
	<!-- <style type="text/css">
		td{padding: 10px;};
	</style> -->