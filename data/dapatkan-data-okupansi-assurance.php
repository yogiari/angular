<?php
	include '../data/koneksi.php';
	$perintah_sql = "SELECT * FROM user a JOIN okupansi b ON a.nik=b.nik_petugas JOIN frame_odp c ON b.id_frame_odp=c.id_frame_odp JOIN jabatan d ON a.jabatan=d.id_jabatan WHERE a.jabatan=3
		";
	$datas = [];
	$i=1;
	$result = mysqli_query($koneksi,$perintah_sql);
	while ($row=mysqli_fetch_array($result)) {
		$temp_data = [];
		$temp_data['no'] = $i++;
		$temp_data['id_okupansi'] = $row['id_okupansi'];
		$temp_data['nik'] = $row['nik'];
		$temp_data['nama'] = $row['nama'];
		$temp_data['id_frame_odp'] = $row['id_frame_odp'];
		$temp_data['nama_frame'] = $row['nama_frame'];

		array_push($datas,$temp_data);
	}
	
	
	echo json_encode($datas);	
?>