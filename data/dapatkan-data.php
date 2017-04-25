<?php
	include '../data/koneksi.php';
	$perintah_sql = "SELECT * FROM odp";
	$datas = [];
	$i=1;
	$result = mysqli_query($koneksi,$perintah_sql);
	while ($row=mysqli_fetch_array($result)) {
		$temp_data = [];
		$temp_data['no'] = $i++;
		$temp_data['id'] = $row['id'];
		$temp_data['nama_label'] = $row['nama_label'];
		$temp_data['nama_frame'] = $row['nama_frame'];
		$temp_data['vendor'] = $row['vendor'];
		$temp_data['lat'] = $row['lat'];
		$temp_data['lon'] = $row['lon'];
		$temp_data['distribusi_core'] = $row['distribusi_core'];
		$temp_data['olt'] = $row['olt'];
		$temp_data['lokasi'] = $row['lokasi'];
		//$temp_data['keterangan'] = $row['keterangan'];
		$temp_data['tanggal_uji_terima'] = $row['tanggal_uji_terima'];

		array_push($datas,$temp_data);
	}
	// $banyak_data = count($data);
	echo json_encode($datas);	
?>