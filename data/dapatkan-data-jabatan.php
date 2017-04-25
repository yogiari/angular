<?php
	include '../data/koneksi.php';
	$perintah_sql = "SELECT * FROM jabatan";
	$datas = [];
	$i=1;
	$result = mysqli_query($koneksi,$perintah_sql);
	while ($row=mysqli_fetch_array($result)) {
		$temp_data = [];
		$temp_data['id_jabatan'] = $row['id_jabatan'];
		$temp_data['nama_jabatan'] = $row['nama_jabatan'];

		array_push($datas,$temp_data);
	}
	// $banyak_data = count($data);
	echo json_encode($datas);	
?>