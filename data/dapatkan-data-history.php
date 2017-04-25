<?php
	include '../data/koneksi.php';
	$perintah_sql = "SELECT * 
		FROM tiket a JOIN odp b ON a.odp=b.id JOIN user c ON a.petugas_pelapor=c.nik JOIN user d ON a.petugas_maintenance=d.nik JOIN kategori e ON a.kategori=e.id_kategori
		WHERE status='selesai'";
	$data = [];
	$result = mysqli_query($koneksi,$perintah_sql);
	while ($row=mysqli_fetch_array($result)) {
		//print_r($row);
		$temp_data = [];
		$temp_data['id_tiket'] = $row['id_tiket'];
		$temp_data['nama_label'] = $row['nama_label'];
		$temp_data['petugas_pelapor'] = $row[22];
		$temp_data['tanggal_lapor'] = $row['tanggal_lapor'];
		$temp_data['petugas_maintenance'] = $row[29];
		$temp_data['tanggal_selesai'] = $row['tanggal_selesai'];
		$temp_data['kategori'] = $row['nama_kategori'];
		$temp_data['keterangan'] = $row['keterangan'];
		array_push($data,$temp_data);
	}
	// $banyak_data = count($data);
	echo json_encode($data);

	
?>