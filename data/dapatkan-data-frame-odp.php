<?php
	include '../data/koneksi.php';
	$perintah_sql = "SELECT * FROM frame_odp";
	$datas = [];
	$result = mysqli_query($koneksi,$perintah_sql);
	while ($row=mysqli_fetch_array($result)) {
		$temp_data = [];
		$temp_data['id_frame_odp'] = $row['id_frame_odp'];
		$temp_data['nama_frame'] = $row['nama_frame'];
		
		array_push($datas,$temp_data);
	}
	// $banyak_data = count($data);
	echo json_encode($datas);	
?>