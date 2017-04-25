<?php
	include '../data/koneksi.php';
	$perintah_sql = "SELECT * FROM user a JOIN jabatan b ON a.jabatan=b.id_jabatan WHERE b.id_jabatan=2";
	$datas = [];
	$result = mysqli_query($koneksi,$perintah_sql);
	while ($row=mysqli_fetch_array($result)) {
		$temp_data = [];
		$temp_data['nik'] = $row['nik'];
		$temp_data['nama'] = $row['nama'];
		$temp_data['alamat'] = $row['alamat'];
		$temp_data['no_hp'] = $row['no_hp'];
		$temp_data['password'] = $row['password'];

		array_push($datas,$temp_data);
	}
	// $banyak_data = count($data);
	echo json_encode($datas);	
?>