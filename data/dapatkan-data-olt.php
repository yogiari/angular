<?php
	include '../data/koneksi.php';
	$perintah_sql = "SELECT * FROM olt";
	$data = [];
	$result = mysqli_query($koneksi,$perintah_sql);
	while ($row=mysqli_fetch_array($result)) {
		$temp_data = [];
		$temp_data['id'] = $row['id'];
		$temp_data['namaOLT'] = $row['namaOLT'];
		$temp_data['ipOLT'] = $row['ipOLT'];
		$temp_data['lat'] = $row['lat'];
		$temp_data['lon'] = $row['lon'];
		$temp_data['lokasi'] = $row['lokasi'];
		$temp_data['keterangan'] = $row['keterangan'];

		array_push($data,$temp_data);
	}
	
	echo json_encode($data);

?>